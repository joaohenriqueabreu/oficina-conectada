<?php

namespace App\Http\Controllers\Auth;

use App;

use App\Models\Product;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;

use Auth;
use JWTAuth;

class AuthController extends Controller
{

    public function pending()
    {
        return view('errors.pending');
    }

    public function unauthorized()
    {
        return view('errors.unauthorized');
    }

    public function access($id)
    {
        $product = Product::find($id);
        $user = Auth::user();

        if(isset($product) && isset($user)){
            $redirect_url = 'http://authclient1.local/test';
            //$redirect_url = $product->callback_url;

            if($product->shouldEncrypt()){
                                                    
                return response()->redirectTo($redirect_url)
                        ->header('Authorization', "Bearer " . $product->sendAuthToken())
                        ->header($user->sendUserInformation()
                    );

            } else {       
                         
                return response()->redirectTo("$redirect_url?". 
                    $user->sendUserQueryString()
                );
            }            

        } else return back();
    }

    public function authorization($id)
    {
        return $this->access($id);        
    }
}
