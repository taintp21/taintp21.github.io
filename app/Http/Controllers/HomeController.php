<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\sukien;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function sukien(){
        $sukien = sukien::all();
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
}
