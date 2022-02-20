<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sukien extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $table = 'event';
    protected $primaryKey = 'id';
    protected $fillable = [
        'images',
        'title',
        'location',
        'fromDate',
        'toDate',
        'price',
        'content'
    ];
}
