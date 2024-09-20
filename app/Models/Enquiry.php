<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'FullName', 
        'EmailId', 
        'Subject', 
        'Description', 
        'PostingDate', 
        'Status'
    ];
}
