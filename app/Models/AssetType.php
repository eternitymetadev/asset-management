<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'added_date', 'status',  'created_at', 'updated_at'
    ];
}