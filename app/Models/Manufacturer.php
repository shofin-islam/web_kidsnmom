<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacturer extends Model
{
   use HasFactory;

   protected $fillable=['manufacturerName','manufacturerDescription','publication_status'];
}
