<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WashingPoint extends Model

{
    use HasFactory;

    protected $table = 'tblwashingpoints';
    protected $primaryKey = 'id';
    
    const CREATED_AT = 'creationDate';
    const UPDATED_AT = 'creationDate';

    protected $fillable = [
        'washingPointName',
        'washingPointAddress',
        'contactNumber',
        'creationDate'
    ];

    public function carWashBookings()
    {
        return $this->hasMany(CarWashBooking::class, 'carWashPoint');
    }
   
   
}



  

    

