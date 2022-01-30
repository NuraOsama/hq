<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Visit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'time',
        'phone',
        'photo',
        'type',
        'test_id',
        'address_id',
        'user_id',
        'appointment_id',
        'status',
        'accept',
        'offer_id',
        'choice',
    ];

    public function test(){
        return $this->belongsTo(Test::class, 'test_id');
    }
    public function offer(){
        return $this->belongsTo(Offer::class, 'offer_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function address(){
        return $this->belongsTo(Address::class, 'address_id');
    }
    public function rate(){
        return $this->hasOne(Rate::class, 'visit_id');
    }
    public function appointment(){
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
    public function result(){
        return $this->hasOne(Result::class, 'visit_id');
    }
}