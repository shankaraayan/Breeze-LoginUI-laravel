<?php

namespace App\Http\Controllers;

use App\Models\MemberTree;
use App\Models\UserWorkPost;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WorkPostSetupController extends Controller
{
    public function edit(Request $request): View
    {
        $application = UserWorkPost::where('user_id', auth()->user()->id)->first();
        if ($application->status == 'created') {
            $msg = 'Your Application is submitted, Please Completed your payment for further process. ';
        } elseif ($application->status == 'paid') {
            $msg = 'Your payment is done please wait for review.';
        } elseif ($application->status == 'rejected') {
            $msg = 'Your application is rejected please contact your upper channel.';
        } elseif ($application->status == 'refunded') {
            $msg = 'Your amount is refunded successfully, amount will be credited within 7 Working days';
        } elseif ($application->status == 'done') {
            $msg = 'Approved.';
        } elseif ($application->status == 'failed') {
            $msg = 'Your payment is failed, please try again';
        } else {
            $msg = '';
        }
        // dd($msg);

        return view('apply-post.edit', [
            'user' => $request->user(),
            'application' => $application,
            'msg' => $msg,
        ]);
    }

    public function update_payment()
    {
        //
    }

    public function update(Request $request): RedirectResponse
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "pincode" => 'required',
            "district" => 'required',
            "apply_for" => 'required',
            "donation" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userMailSetting = UserWorkPost::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $request->all()
        );

        return Redirect::route('apply.post.edit')->with('status', 'updated');
    }

    public function my_team(Request $request)
    {
        $members = MemberTree::where('referral_by', auth()->user()->my_referral)
            ->with([
                'referred_users',
                'referred_users.userDetail',
            ])
            ->get();
        // dd($members->toarray());
        return view('my-team.view', [
            'user' => $request->user(),
            'members' => $members
        ]);
    }
}