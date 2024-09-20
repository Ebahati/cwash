<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarWashBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookingId',
        'packageType',
        'carWashPoint',
        'fullName',
        'mobileNumber',
        'washDate',
        'washTime',
        'message',
        'status',
    ];

    protected $table = 'tblcarwashbooking'; // Adjust if your table name is different

    public function washingPoint()
    {
        return $this->belongsTo(WashingPoint::class, 'carWashPoint');
    }

    
}
