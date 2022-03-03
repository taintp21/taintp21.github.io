<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentsModel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function createPayment(Request $request){
        ///////////////////payment
        $vnp_Version = "2.1.0";
        $vnp_Command = "pay";
        $vnp_TmnCode = env('VNP_TMN_CODE');
        $vnp_Amount = $request->giatien * 100; // vnpay *100
        $vnp_CurrCode = "VND";
        $vnp_IpAddr = $request->server("REMOTE_ADDR");
        $vnp_Locale = "vn";
        $vnp_OrderInfo = "Thanh toán vé";
        $vnp_ReturnUrl = route('vnpay.return');
        $vnp_TxnRef = randString(15);

        $inputData = array(
            "vnp_Version" => $vnp_Version,
            "vnp_Command" => $vnp_Command,
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => $vnp_CurrCode,
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        );

        ksort($inputData);

        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, env('VNP_HASH_SECRET'));//
            $vnp_Url .= 'vnp_SecureHashType=SHA512&vnp_SecureHash=' . $vnpSecureHash;
        }

        //validate
        $message = [
            'soluong.required' => 'Nhập số lượng vé cần mua',
            'soluong.numeric' => 'Phải là số!',
            'soluong.max' => 'Giới hạn tối đa 100 mỗi lần mua vé',
            'ngaysudung.required' => 'Chưa nhập ngày sử dụng vé',
            'hoten.required' => 'Chưa nhập thông tin liên hệ',
            'hoten.max' => 'Tối đa 50 ký tự',
            'dienthoai.required' => 'Chưa nhập số điện thoại',
            'dienthoai.max' => 'Số điện thoại tối đa 14 ký tự',
            'email.required' => 'Chưa nhập email',
            'email.regex' => 'Sai định dạng email',
            'sothe.required' => 'Chưa nhập số thẻ!',
            'hotenchuthe.required' => 'Chưa nhập họ tên chủ thẻ!',
            'hotenchuthe.regex' => "Họ tên viết không dấu",
            'ngayhethan.required' => 'Chưa nhập ngày hết hạn thẻ',
            'cvvcvc.required' => 'Chưa nhập CVV/CVC',
            'cvvcvc.regex' => 'Sai CVV/CVC'
        ];
        $request->validate([
            'soluong' => ['required', 'numeric', 'max:100'],
            'ngaysudung' => ['required'],
            'hoten' => ['required', 'max:50'],
            'dienthoai' => ['required', 'max:14'],
            'email' => ['required', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'sothe' => ['required'],
            'hotenchuthe' => ['required'],
            'ngayhethan' => ['required'],
            'cvvcvc' => ['required', 'regex:/^[0-9]{3,4}$/'],
        ],$message);

        //Add info
        $insertInfo = $request->all();
        $payments = new PaymentsModel();
        $payments->vnp_TxnRef = $vnp_TxnRef;
        $payments->giatien = $insertInfo['giatien'];
        $payments->soluong = $insertInfo['soluong'];
        $payments->ngaysudung = $insertInfo['ngaysudung'];
        $payments->hoten = $insertInfo['hoten'];
        $payments->dienthoai = $insertInfo['dienthoai'];
        $payments->email = $insertInfo['email'];
        $payments->sothe = $insertInfo['sothe'];
        $payments->hotenchuthe = $insertInfo['hotenchuthe'];
        $payments->ngayhethan = $insertInfo['ngayhethan'];
        $payments->cvvcvc = $insertInfo['cvvcvc'];

        $payments->save();
        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request){
        $vnp_ResponseCode = $request->query("vnp_ResponseCode");

        if($vnp_ResponseCode == 00){
            $vnp_TxnRef = $request->query("vnp_TxnRef");
            $QRvnp_TxnRef = QRCode::size(150)->generate($vnp_TxnRef);
            $nsd = PaymentsModel::select("ngaysudung")->where("vnp_TxnRef",$vnp_TxnRef)->first();
            $soluong = $request->query("vnp_Amount") / 100 / 90000; // 90000/1 vé
            return view('payment_return', compact('QRvnp_TxnRef', 'vnp_TxnRef', 'soluong', 'nsd'));
        }

        if($vnp_ResponseCode == 7){
            return view("payment_return_fail")->with("message", "Trừ tiền thành công. Giao dịch bị nghi ngờ (liên quan tới lừa đảo, giao dịch bất thường).");
        }
        if($vnp_ResponseCode == 9){
            return view("payment_return_fail")->with("message", "Giao dịch không thành công do: Thẻ/Tài khoản của khách hàng chưa đăng ký dịch vụ InternetBanking tại ngân hàng.");
        }
        if($vnp_ResponseCode == 10) return view("payment_return_fail")->with("message", "Giao dịch không thành công do: Khách hàng xác thực thông tin thẻ/tài khoản không đúng quá 3 lần");
        if($vnp_ResponseCode == 11) return view("payment_return_fail")->with("message", "Giao dịch không thành công do: Đã hết hạn chờ thanh toán. Xin quý khách vui lòng thực hiện lại giao dịch.");
        if($vnp_ResponseCode == 12) return view("payment_return_fail")->with("message", "Giao dịch không thành công do: Thẻ/Tài khoản của khách hàng bị khóa.");
        if($vnp_ResponseCode == 13) return view("payment_return_fail")->with("message", "Giao dịch không thành công do Quý khách nhập sai mật khẩu xác thực giao dịch (OTP). Xin quý khách vui lòng thực hiện lại giao dịch.");
        if($vnp_ResponseCode == 24) return view("payment_return_fail")->with("message", "Giao dịch không thành công do: Khách hàng hủy giao dịch");
        if($vnp_ResponseCode == 51) return view("payment_return_fail")->with("message", "Giao dịch không thành công do: Tài khoản của quý khách không đủ số dư để thực hiện giao dịch.");
        if($vnp_ResponseCode == 65) return view("payment_return_fail")->with("message", "Giao dịch không thành công do: Tài khoản của Quý khách đã vượt quá hạn mức giao dịch trong ngày.");
        if($vnp_ResponseCode == 75) return view("payment_return_fail")->with("message", "Ngân hàng thanh toán đang bảo trì.");
        if($vnp_ResponseCode == 79) return view("payment_return_fail")->with("message", "Giao dịch không thành công do: KH nhập sai mật khẩu thanh toán quá số lần quy định. Xin quý khách vui lòng thực hiện lại giao dịch");
        if($vnp_ResponseCode == 99) return view("payment_return_fail")->with("message", "Lỗi");
    }
}
