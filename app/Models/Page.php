<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'tblpages';
    public $timestamps = false; // Set to true if you have timestamp columns

    // app/Models/Page.php

    protected $fillable = [
        'type', 'detail', 'openignHrs', 'phoneNumber', 'emailId',
    ];
}

