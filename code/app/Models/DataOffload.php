<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOffload extends Model
{
    use HasFactory;

    protected $table = 'data_offload';

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'message',
    ];
}
