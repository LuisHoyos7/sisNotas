<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Example
 * @package App\Models
 * @version April 12, 2018, 1:58 pm UTC
 *
 * @property string title
 * @property dateTime post_date
 * @property string body
 * @property string email
 */
class Example extends Model
{
    use SoftDeletes;

    public $table = 'examples';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'post_date',
        'body',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'post_date' => 'datetime',
        'body' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
}
