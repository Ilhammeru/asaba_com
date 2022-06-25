<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * Define table name
     * 
     * @return string
     */
    protected $table = 'setting';
    
    /**
     * Define fillable field in database
     * 
     * @return array
     */
    protected $fillable = [
        'name',
        'value'
    ];
}
