<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->authenticated_user;
        $token = $request->get('token');

        return view('about-us', compact(['user', 'token']));
    }
}
