<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Payment extends Model
{
    use HasFactory, LogsActivity;

    // protected $fillable = ['productId', 'productDetails','projectId', 'customerId','customerDetails','unitPrice','unit','subTotal','flatDiscount','payable','paid','due','note'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('payment')
        ->setDescriptionForEvent(fn(string $eventName) => "Payment has been {$eventName}")
        ->logOnlyDirty()
        ->logOnly(['productId', 'productDetails','projectId', 'customerId','customerDetails','unitPrice','unit','subTotal','flatDiscount','payable','paid','due','note']);
        // Chain fluent methods for configuration options
    }
   
}

