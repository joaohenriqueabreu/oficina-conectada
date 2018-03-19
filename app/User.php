<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Exceptions\JWTException;

use Hash, Auth, JWTAuth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getCustomerIdAttribute()
    {
        ///return Hash::make($this->id);
        return md5($this->id);
    }    

    public function subscription()
    {
        return $this->belongsTo('App\Subscription');
    }

    public function validPayment()
    {        
        return $this->payment_status == config('customer.payment.valid');
    }

    public function pendingPayment()
    {
        return $this->payment_status == config('customer.payment.pending');
    }

    /* *********************************
            Authorization Functions
    ********************************* */
    public function getClaimsAttribute()
    {
        return [            
            'customer_id' => $this->customer_id, 
            'email' => $this->email,
            'name' => $this->name,
            'subscription_id' => $this->subscription->id,            
        ];
    }    

    public function sendUserInformation()
    {
        return $this->claims;
    }

    public function sendUserToken()
    {        
        return JWTAuth::fromUser($this, $this->claims);            
    }

    public function sendUserQueryString()
    {
        return http_build_query($this->claims);                
    }

    public function sendAuthorized()
    {
        return [
            'message' => 'Success',
            'data' => $this->claims,
            'status' => 200,
        ];
    }

    public function sendUnauthorized()
    {
        return [
            'message' => 'Unauthorized', 'status' => 401
        ];
    }
}
