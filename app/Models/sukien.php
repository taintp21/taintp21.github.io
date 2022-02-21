<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sukien extends Model
{
    use HasFactory;

    public $timestamps = false;
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
