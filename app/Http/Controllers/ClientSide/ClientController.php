<?php

namespace App\Http\Controllers\ClientSide;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Application\ClientSide\RegisterClient;


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
            return redirect()->back()->with('passwordMismatch', 'Passwords do not match');
        }

        if(DB::table('clients')->where('username', $request->username)->exists())
        {
            return redirect()->back()->with('usernameExists', 'Username already exists');
        }

        $client_id = $this->getGenerateUserID();

        $this->registerClient->CreateClient(
            $client_id,
            $request->first_name,
            $request->last_name,
            $request->username, 
            $request->password
        );

        return view('/login')->with('success', 'Account created successfully');

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



}
