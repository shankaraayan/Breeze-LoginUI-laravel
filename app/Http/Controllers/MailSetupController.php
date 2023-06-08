<?php

namespace App\Http\Controllers;

use App\Models\UserMailSetup;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MailSetupController extends Controller
{
    public function edit(Request $request): View
    {
        $smtp_details = UserMailSetup::where('user_id',auth()->user()->id)->first();

        return view('setting.edit', [
            'user' => $request->user(),
            'user_smtp' => $smtp_details,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(),[
            "MAIL_SMTP" => 'required|max:4',
            "MAIL_HOST" => 'required',
            "MAIL_PORT" => 'required|integer',
            "MAIL_USERNAME" => 'required',
            "MAIL_PASSWORD" => 'required',
            "MAIL_ENCRYPTION" => 'required',
        ]);
        if ($validator->fails()) {
            // Redirect or return the user back with the validation errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

    $userMailSetting = UserMailSetup::updateOrCreate(
        ['user_id' => auth()->user()->id],
        $request->all()
    );

        return Redirect::route('mail.config.edit')->with('status', 'updated');
    }
}
