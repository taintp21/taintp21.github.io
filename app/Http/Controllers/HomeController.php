<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\sukien;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function sukien(){
        $sukien = DB::table('event')
                    ->select('id','images','title','location','fromDate','toDate','price')
                    ->get();
        return view('sukien', compact('sukien'));
    }
    public function lienhe(){
        return view('lienhe');
    }
    public function sendEmail(Request $req){
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'address' => $req->address,
            'message' => $req->message
        ];
        Mail::to('taintp21@gmail.com')->send(new ContactMail($data));
        return redirect()->back()->with('message', 'Gửi liên hệ thành công.<br> Vui lòng kiên nhẫn đợi phản hồi từ chúng tôi, bạn nhé!');
    }

    public function chitiet_sukien($id){
        $chitiet_sukien = sukien::find($id);
        return view('chitiet_sukien', compact('chitiet_sukien','id'));
    }

    public function formThanhToan(){
        return view('thanhtoan');
    }

    public function thanhtoan(Request $request){
        $message = [
            'soluong.required' => 'Nhập số lượng vé cần mua',
            'soluong.numeric' => 'Phải là số!',
            'soluong.max' => 'Vé mua hơi nhiều',
            'ngaysudung.required' => 'Chưa nhập ngày sử dụng vé',
            'hoten.required' => 'Chưa nhập thông tin liên hệ',
            'hoten.max' => 'Tối đa 50 ký tự',
            'dienthoai.required' => 'Chưa nhập số điện thoại',
            'dienthoai.max' => 'Số điện thoại tối đa 14 ký tự',
            'email.required' => 'Chưa nhập email',
            'email.regex' => 'Sai định dạng email',
            'sothe.required' => 'Chưa nhập số thẻ!',
            'hotenchuthe.required' => 'Chưa nhập họ tên chủ thẻ!',
            'ngayhethan.required' => 'Chưa nhập ngày hết hạn thẻ',
            'cvvcvc.required' => 'Chưa nhập CVV/CVC'
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
            'cvvcvc' => ['required'],
        ],$message);
    }
}
