<?php

namespace App\Http\Controllers\ClientSide;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Application\ClientSide\RegisterClient;
use App\Models\Client;

class ClientController extends Controller
{
    private RegisterClient $registerClient;
    public function __construct(RegisterClient $registerClient)
    {
        $this->registerClient = $registerClient;
    }
   
    public function RegisterClient(Request $request)
    {
        Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'confirm_password' => 'required|string|max:255',
        ]);

        if($request->confirm_password != $request->password)
        {
            return redirect('/register')->with('passwordMismatch', 'Password does not match');
        }

        if(DB::table('clients')->where('username', $request->username)->exists())
        {
            return redirect('/register')->with('usernameExists', 'Username already exists');
        }

        if(strlen($request->password) < 8)
        {
            return redirect('/register')->with('passlengthrequired', 'Password must be at least 8 characters');
        }

        $client_id = $this->getGenerateUserID();

        $this->registerClient->CreateClient(
            $client_id,
            $request->first_name,
            $request->last_name,
            $request->username, 
            Hash::make($request->password)
        );

        return redirect('/login')->with('success', 'Account created successfully');

    }

    private function getGenerateUserID(): string
    {
        do {
            $userId = $this->generateRandomUserID(6);
            $exists = DB::table('clients')->where('client_id', $userId)->exists();
        } while ($exists);

        return $userId;
    }

    private function generateRandomUserID(int $length = 10): string
    {
        $result = substr(bin2hex(random_bytes(ceil($length / 2))), 0, $length);

        return $result;
    }

    public function LoginClient(Request $request)
    {
        $credentials = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        $clients = DB::table('clients')->get();
        
        if(empty($request->username) && empty($request->password))
        {
            return redirect('/login')->with('error', 'Please required all fields');
        }

        // foreach($clients as $client)
        // {
        
        //     if($request->username != $client->username)
        //     {
        //         return back()->with('error', 'Account does not exist');
        //     }

        //     if(!Hash::check($client->password , Hash::make($request->password)))
        //     {
        //         return back()->with('error', 'Password is incorrect');
        //     }
        // }

        if(!Auth::guard('client')->attempt($request->only('username','password')))   
        {
            return redirect('/login')->with('error', 'Account not found');
        }

        if(Auth::guard('client')->attempt($request->only('username','password')))   
        {
            $request->session()->regenerate();
            Auth::guard('client')->user();
            return redirect('/login')->with('success', 'Welcome Back !');
        }
    }

    public function LogoutClient(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/login');
    }

}
    