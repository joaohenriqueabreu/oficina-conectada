<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PaymentStatus
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
        $response = $next($request);

        /// Verifica status de pagamento do usuário                    
        if(Auth::user()->validPayment()){
            
            return $response;
            // return Auth::user()->customer_id;

        } else {

            if(Auth::user()->pendingPayment()){
                //return route('apps.pending');
                return redirect('/apps/pending');
            } else {
                //return route('apps.unauthorized');
                return redirect('/apps/unauthorized');
            }
        }

    }
}
