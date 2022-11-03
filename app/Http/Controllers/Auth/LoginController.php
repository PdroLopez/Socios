<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User as usuarios;
use Auth;
use Session;
use Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try{

            $user = Socialite::driver($provider)->user();

            Log::info("informacion del proveedor ");
            Log::info($provider);
            Log::info("email");
            Log::info($user->getEmail());
            Log::info("nombre");
            Log::info($user->getName());
            Log::info("id proveeodr");
            Log::info($user->getId());

            if($user->getEmail() != null){

                $usuarios = usuarios::where('email',$user->getEmail())->first();
                if(!$usuarios){
                    $usuarios = usuarios::create([
                        'email'=> $user->getEmail(),
                        'name'=>$user->getName(),
                        'password'=>bcrypt(123),
                        'proovedor_id'=>$user->getId(),
                        'proovedor'=>$provider,
                        'rol_id'=>3,
                    ]);
                }
                // $user->token;
                    Auth::login($usuarios, true);
                    return redirect($this->redirectTo);
            }else{
                return view('auth.register');
            }
        }catch(Exception $e){
            return view('auth.register');

        }
    }

    public function showLoginForm(Request $request)
    {
        if ($request->has('redirect_to')) {
            session()->put('redirect_to', $request->input('redirect_to'));
        }
        //dd(session()->get('consulta'));
        //dd($request);
        return view('auth.login');
    }

    public function redirectTo()
    {
        if (session()->has('redirect_to'))
            return session()->pull('redirect_to');

        return $this->redirectTo;
    }
}
