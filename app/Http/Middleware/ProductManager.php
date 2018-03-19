<?php

namespace App\Http\Middleware;

use App\Product;

use Closure;

class ProductManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->has('Authorization')){            
            $product = Product::where('public_token',$request->authorization)->first();
            if(isset($product))
                ///return $next($request);
                return route('auth.connect.authorize', $product->id);
        }
        
        return route('auth.unauthorized');
    }
}
