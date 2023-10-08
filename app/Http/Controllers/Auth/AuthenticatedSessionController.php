<?php

namespace App\Http\Controllers\Auth;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Clients\CandidateTestingClient;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    private $candidateTestingClient;

    public function __construct(CandidateTestingClient $candidateTestingClient)
    {
        $this->candidateTestingClient = $candidateTestingClient;
    }
   

    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        // $client = new Client();
        // $loginEndpoint = 'https://candidate-testing.api.royal-apps.io/api/v2/token';
        
        // $response = $client->post($loginEndpoint, [
        //     'json' => [
        //         'email' => 'ahsoka.tano@royal-apps.io',
        //         'password' => 'Kryze4President',
        //     ],
        // ]);
        // $responseData = json_decode($response->getBody()->getContents());
        
        // return $responseData->token_key;
        $login_user = $this->candidateTestingClient->login();
        if($login_user){
            // return view('layouts.navigation', compact('login_user'));
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
            return redirect()->route('/');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
