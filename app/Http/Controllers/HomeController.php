<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function sukien(){
        return view('sukien');
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
}
