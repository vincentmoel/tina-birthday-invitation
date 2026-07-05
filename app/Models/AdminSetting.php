<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'setting_key',
        'setting_value',
    ];
}
