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
use App\Models\testdb;

class ClientController extends Controller
{
    private RegisterClient $registerClient;
    public function __construct(RegisterClient $registerClient)
    {
        $this->registerClient = $registerClient;
    }
   
    public function MainPage(Request $request)
    {
        return view('ClientSide.Pages.MainPage');
    }

    public function updateInformation(Request $request, $client_id)
    {
        $categories = DB::connection('mysql_waste_admin')->table('waste_category')->get();

    }



    public function RegisterClient(Request $request)
    {
        Validator::make($request->all(), [
            'binnie_id' => 'required|numeric',
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
        // $binnie_id = $this->getGenerateBinnieID();

        $this->registerClient->CreateClient(
            $client_id,
            $request->binnie_id,
            $request->first_name,
            $request->last_name,
            $request->username, 
            Hash::make($request->password)
        );

        return redirect()->route('loginPage')->with('success', 'Account created successfully');

    }

    private function getGenerateUserID(): string
    {
        do {
            $userId = $this->generateRandomUserID();
            $exists = DB::table('clients')->where('client_id', $userId)->exists();
        } while ($exists);

        return $userId;
    }

    private function getGenerateBinnieID(): int
    {
        do {
            $binnie_id = $this->generateRandomUserID();
            $exists = DB::table('clients')->where('client_id', $binnie_id)->exists();
        } while ($exists);

        return $binnie_id;
    }

    private function generateRandomUserID()
    {
        $result = random_int(111111,999999);

        return $result;
    }

    public function LoginClient(Request $request)
    {
        $credentials = Validator::make($request->all(), [
            'binnie_id' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $clients = DB::table('clients')->get();
        
        if(empty($request->username) && empty($request->password))
        {
            return redirect('/login')->with('error', 'Please required all fields');
        }

        $Getbinnie_id = DB::table('clients')->where('binnie_id' , $request->binnie_id)->first();

       if(!$Getbinnie_id)
       {
            return redirect('/login')->with('notFoundBinnieID', 'Binnie ID not found');
       }

       $client = DB::table('clients')->where('username', $request->username)->first();

       if(!$client || !Hash::check($request->password, $client->password))
       {
        return redirect('/login')->with('error', 'Account not found');
       }


        if (Auth::guard('client')->attempt($request->only('binnie_id','username', 'password'))) {
            $request->session()->regenerate();
            $user = Auth::guard('client')->user();
            return redirect()->route('main');
        }
    }

    public function LogoutClient(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('view');
    }



    public function registerItems(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'Metal' => 'required|numeric',
        'Paper' => 'required|numeric',
        'Plastic' => 'required|numeric'
       ]);

        if($validator->fails())
        {
            return Response()->json([
                'status' => false,
                'message' => $validator->errors()
            ],404);
        }

        $item = testdb::create([
            'Metal' => $request->Metal,
            'Paper' => $request->Paper,
            'Plastic'=> $request->Plastic,
        ]);

        return Response()->json([
            'status' => true,
            'message' => 'Created Sucessfully',
            'data' => $item
        ],201);

    }

}
    