<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    use HasFactory;
    protected $fillable = ['sender_firstname', 'sender_lastname', 'receiver_firstname', 'receiver_lastname', 'amount', 'transaction_status', 'transaction_type', 'account_number', 'time', 'amount'];
}
