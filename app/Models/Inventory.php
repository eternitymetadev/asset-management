<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'assettype_id', 'name', 'brand', 'model', 'serial_no', 'unit', 'invoice_date', 'invoice_no', 'vendor', 'purchase_price', 'description', 'invoice_image', 'processor', 'ram', 'ssd', 'hdd', 'last_maintenace_date', 'maintenace_due_date', 'created_user_id', 'updated_user_id', 'assign_to', 'status', 'assigned_status', 'maintenance_status', 'upgrade_status', 'created_at', 'updated_at'
    ];

}