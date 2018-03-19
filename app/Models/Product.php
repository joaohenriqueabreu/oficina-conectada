<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version March 19, 2018, 5:20 pm UTC
 *
 * @property string url
 * @property string email
 * @property string title
 * @property string description
 * @property string logo_url
 * @property boolean encrypt
 * @property string callback_url
 * @property string public_token
 * @property string private_token
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'url',
        'email',
        'title',
        'description',
        'logo_url',
        'encrypt',
        'callback_url',
        'public_token',
        'private_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'url' => 'string',
        'email' => 'string',
        'title' => 'string',
        'description' => 'string',
        'logo_url' => 'string',
        'encrypt' => 'boolean',
        'callback_url' => 'string',
        'public_token' => 'string',
        'private_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function subscriptions()
    {
        return $this->belongsToMany('App\Models\Subscription');
    }

    public function shouldEncrypt()
    {
        return $this->encrypt;
    }

    public function sendAuthToken()
    {        
        //return [
        //    'authorization' => $this->private_token,
        //];
        return $this->private_token;
    }

    
}
