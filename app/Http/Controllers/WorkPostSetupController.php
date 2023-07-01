<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\MemberTree;
use App\Models\User;
use App\Models\UserWorkPost;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Razorpay\Api\Api;
use App\Services\Razorpay;

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

    public function update_payment(Request $request)
    {
        // return true;
        $totalAmount = $request->input('totalAmount');

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create(array('receipt' => 123, 'amount' => $totalAmount * 100, 'currency' => 'INR'));
        $order_id = $order['id'];
        $status = $order['status'];

        $data = new Donation();

        $data->msg = "Donation";
        $data->r_payment_id = 'Null';
        $data->amount = $totalAmount;
        $data->payment_status = $status;
        $data->order_id = $order_id;
        $data->user_id = auth()->user()->id;

        $data->save();

        $data = array('order_id' => $order_id, 'status' => $status);
        echo (json_encode($data));
    }

    public function paymentsuccess(Request $request)
    {
        $input = $request->all();
        // print_r($input);
        $user = Donation::where('order_id', $input['order_id'])->first();
        $user->payment_status = "Paid";
        $user->r_payment_id = $input['payment_id'];
        $user->save();

        $workPost = UserWorkPost::where('user_id', auth()->user()->id)->first();
        $workPost->status = 'done';
        $workPost->donation = $request->amount;
        $workPost->save();

        $order_id = array('order_id' => $input['order_id']);
        echo json_encode($order_id);
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

        $my_referral_code = $request->apply_for . rand(111, 9999);

        User::whereId(auth()->user()->id)->update([
            'my_referral' => $my_referral_code,
        ]);

        $userPost = UserWorkPost::updateOrCreate(
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