<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
  
class Product extends Model
{
    use HasFactory, LogsActivity;
  
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'name', 'detail'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('product')
        ->setDescriptionForEvent(fn(string $eventName) => "Product has been {$eventName}")
        ->logOnlyDirty()
        ->logOnly(['name', 'categoryId','manufacturerId', 'projectId','productCode','purchasePrice','salesPrice','discountPrice','discountStatus','productQuantity','totalAmount','dueAmount','details','productImage','publicationStatus','deletionStatus']);
        // Chain fluent methods for configuration options
    }

}