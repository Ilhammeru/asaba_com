<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    /**
     * Define table name
     * 
     * @return string
     */
    protected $table = 'user';
    
     /**
     * Define fillable field in database
     * 
     * @return array
     */
    protected $fillable = [
        'name',
    ];
}
