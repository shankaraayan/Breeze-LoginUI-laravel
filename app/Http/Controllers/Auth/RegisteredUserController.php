<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $response = $this->generateEmail($request->email);

        while(User::where('new_email',$response['newEmail'])->exists()){
            $response = $this->generateEmail($request->email);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'new_email' => $response['newEmail'],
            'original_domain' => $response['original_domain'],
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    private function generateEmail($originalEmail)
    {
        $userEmail = $originalEmail;
        $userEmail = strstr($userEmail, '@', true);
        $emailArray = [
            "rand" => rand(11,999),
            "uniqid" => bin2hex(random_bytes(2)),
            "email" => $userEmail,
        ];
        shuffle($emailArray);
        $userEmail = implode('_', $emailArray);
        $response['newEmail'] = $userEmail.'@'.env('APP_DOMAIN');
        $response['original_domain'] = $userEmail.'@'.env('APP_URL');
        return $response;
    }

    //
}
