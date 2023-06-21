<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\BankDetails;
use App\Models\MemberTree;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $myReferral = MemberTree::where('referred_member', auth()->user()->my_referral)->first();

        return view('profile.edit', [
            'user' => $request->user(),
            'mySponser' => $myReferral->referral_by ?? 'NA',
        ]);
    }

    public function password_edit(Request $request): View
    {
        return view('profile.password-edit', [
            'user' => $request->user(),
        ]);
    }

    public function CodeEdit(): View
    {
        return view('profile.referral-code', []);
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function update_photo(Request $request): RedirectResponse
    {
        $request->validate([
            'photo' => 'required|image', // Adjust the maximum file size as needed
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('members', 'public'); // Store the uploaded file in the 'public' disk under the 'photos' directory
            $request->user()->userDetail()->updateOrCreate(
                [
                    'user_id' => auth()->user()->id,
                    'photo' => $path
                ]
            ); // Update the 'photo' column of the authenticated user with the file path
        }

        return Redirect::route('profile.edit')->with('status', 'saved');
    }

    public function update_aadhar(Request $request): RedirectResponse
    {
        $request->validate([
            'aadhar_no' => 'required|integer|min:12', // Adjust the maximum file size as needed
        ]);

        if ($request->referral_by) {
            MemberTree::updateOrCreate(
                ['referred_member' => auth()->user()->my_referral],
                [
                    'referred_member' => auth()->user()->my_referral,
                    'referral_by' => $request->referral_by,
                ]
            );
        }

        $request->user()->userDetail()->updateOrCreate(
            [
                'user_id' => auth()->user()->id,
            ],
            [
                'user_id' => auth()->user()->id,
                'aadhar_no' => $request->aadhar_no
            ]
        );

        if ($request->hasFile('aadhar_f')) {
            $path = $request->file('aadhar_f')->store('members', 'public'); // Store the uploaded file in the 'public' disk under the 'photos' directory
            $request->user()->userDetail->update(['aadhar_f' => $path]); // Update the 'photo' column of the authenticated user with the file path
        }

        if ($request->hasFile('aadhar_b')) {
            $path = $request->file('aadhar_b')->store('members', 'public'); // Store the uploaded file in the 'public' disk under the 'photos' directory
            $request->user()->userDetail->update(['aadhar_b' => $path]); // Update the 'photo' column of the authenticated user with the file path
        }

        return Redirect::route('profile.edit')->with('status', 'saved');
    }

    public function view_bank(Request $request)
    {
        $bankDetails = BankDetails::where('user_id',auth()->user()->id)->first();

        return view('bank-details.view', [
            'user' => $request->user(),
            'bankDetails' => $bankDetails,
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
