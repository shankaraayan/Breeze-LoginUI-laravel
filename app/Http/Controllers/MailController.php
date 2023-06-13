<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send(Request $request) : bool
    {
        dd($request->all());
        return true;
    }
}
