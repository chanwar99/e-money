<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $primaryKey = 'account_number';
    protected $fillable = [
        'account_number',
        'fullname',
        'address',
        'phone_number',
        'balance',
        'pin_number',
        'pin_number',
        'transfer_limit',
        'top_up_limit'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Generate account number before saving new account
        static::creating(function ($account) {
            $account->account_number = static::generateAccountNumber();
        });
    }

    protected static function generateAccountNumber()
    {
        // Generate random 10-digit number
        $accountNumber = mt_rand(1000000000, 9999999999);

        // Check if generated account number already exists, if yes generate again
        while (static::where('account_number', $accountNumber)->exists()) {
            $accountNumber = mt_rand(1000000000, 9999999999);
        }

        return $accountNumber;
    }
}