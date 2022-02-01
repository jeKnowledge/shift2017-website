<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CustomAuthorization
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
        switch ($request->route()->getName()) {
            case 'applications.show':
                if(Auth::user()->isShifter()){
                    if($request->route('application')->shifter->user->id != Auth::user()->id){
                        return redirect()->route('home');
                    }
                }
                break;
            case 'applications.edit':
                if(Auth::user()->isShifter()){
                    if($request->route('application')->shifter->user->id != Auth::user()->id){
                        return redirect()->route('home');
                    }
                }
                break;
            case 'applications.update':
                if(Auth::user()->isShifter()){
                    if($request->route('application')->shifter->user->id != Auth::user()->id){
                        return redirect()->route('home');
                    }
                }
                break;
            case 'applications.delete':
                if(Auth::user()->isShifter()){
                    if($request->route('application')->shifter->user->id != Auth::user()->id){
                        return redirect()->route('home');
                    }
                }
                break;
            case 'users.edit':
                if(Auth::user()->isShifter()){
                    if($request->route('user')->id != Auth::user()->id){
                        return redirect()->route('home');
                    }
                }
                break;
            case 'shifters.index':
                if(Auth::user()->isSilverPartner()){
                    return redirect()->route('home');
                }
                break;
            case 'shifters.show':
                if(Auth::user()->isSilverPartner()){
                    return redirect()->route('home');
                }
                break;
            default:
                # code...
                break;
        }

        return $next($request);
    }
}
