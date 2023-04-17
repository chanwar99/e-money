<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUUID;

class Transaction extends Model
{
    use HasFactory, UsesUUID;

    protected $primaryKey = 'id';
    protected $fillable = [
        'transaction_type',
        'amount',
        'receiver_account_number',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function account()
    {
        return $this->belongsTo(Account::class, 'receiver_account_number');
    }
}