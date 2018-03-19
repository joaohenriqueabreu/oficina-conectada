<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscription
 * @package App\Models
 * @version March 19, 2018, 5:41 pm UTC
 *
 * @property string title
 * @property string description
 * @property decimal price
 * @property integer trial
 */
class Subscription extends Model
{
    use SoftDeletes;

    public $table = 'subscriptions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'price',
        'trial'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'trial' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function apps()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    
}
