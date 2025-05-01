<?php

namespace App\Http\Controllers\Guest;

use App\Models\NoneUser;
use Illuminate\Http\Request;
use App\Models\MessageSupport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NonUserController extends Controller
{
    public function NoneUser(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string',
            'message' => 'required|string',
        ]);

        if($Validator->fails())
        {
            return redirect()->route('view')->with('error', 'Sent Feedback error');
        }

        $support_id = random_int(111111,999999);
        do
        {
            $exists = DB::table('message_support')->where('support_id', $support_id)->exists();
            if ($exists) {
                $support_id = random_int(111111,999999);
            }
        } while($exists);

        MessageSupport::create([
            'binnie_id' => null,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'message' => $request->message,
            'support_id' => $support_id,
        ]);
        
       

        return redirect()->route('view')->with('success' , 'Thanks for giving us a feedback!!!');
    }
}
