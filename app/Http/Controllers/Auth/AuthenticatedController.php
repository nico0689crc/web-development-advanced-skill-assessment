<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Token;
use App\Http\Controllers\Controller;
use App\Helpers\TokenHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthenticatedController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
    
        $user = User::where('email', $request->get('email'))->first();

        if (!$user) {
            return redirect()->back()
                             ->withErrors(["email" => "These credentials do not match our records."])
                             ->withInput();
        }

        if (Hash::check($request->get('password'), $user->password)) {
            $token = TokenHelper::createJwt($user->id);

            Token::create([
                'user_id' => $user->id,
                'token' => hash('sha256', $token),
                'revoked' => false,
            ]);

            return redirect('/?token='.$token);
        } else {
            return redirect()->back()
                             ->withErrors(["email" => "These credentials do not match our records."])
                             ->withInput();
        }
    }

    public function destroy(Request $request)
    {
        $token = $request->get('token');

        if (!$token) {
            return redirect('/login');
        }

        $decodedToken = TokenHelper::validateJwt($token);

        if (!$decodedToken) {
            return redirect('/login');
        }

        $hashedToken = hash('sha256', $token);

        $tokenRecord = Token::where('token', $hashedToken)->first();

        if ($tokenRecord) {
            $tokenRecord->revoked = true;
            $tokenRecord->save();
        }

        return redirect('/login');
    }
}
