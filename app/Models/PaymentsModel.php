<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "payments";
    protected $primaryKey = "id";
    protected $fillable = [
        "vnp_TxnRef",
        "giatien",
        "soluong",
        "ngaysudung",
        "hoten",
        "dienthoai",
        "email"
    ];
}
