<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

     /**
     * Define table name
     * 
     * @return string
     */
    protected $table = 'discount';
    
     /**
     * Define fillable field in database
     * 
     * @return array
     */
    protected $fillable = [
        'name',
        'price_min_discount',
        'discount_in_percent',
        'max_discount',
        'status'
    ];
}
