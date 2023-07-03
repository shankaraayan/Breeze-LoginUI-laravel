<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\Donation;
use App\Services\Razorpay;
use Illuminate\Support\Facades\Session as FacadesSession;

class RazorpayPaymentController extends Controller
{

    protected Razorpay $razorpay;

    function __construct()
    {
        $this->razorpay = new Razorpay;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function pay(Request $req)
    {
        $name = $req->input('name');
        $scehme = $req->input('scehme');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $name = $req->input('name');
        $totalAmount = $req->input('totalAmount');

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create(array('receipt' => 123, 'amount' => $totalAmount * 100, 'currency' => 'INR'));
        $order_id = $order['id'];
        $status = $order['status'];

        $data = new Donation();

        $data->msg = $name . " - " . $phone . " - " . $email;
        $data->r_payment_id = 'Null';
        $data->amount = $totalAmount;
        $data->order_id = $order_id;
        $data->payment_status = $status;

        $data->save();

        $data = array('order_id' => $order_id, 'status' => $status);
        echo (json_encode($data));
    }

    public function paymentsuccess(Request $request)
    {
        $input = $request->all();
        $user = Donation::where('order_id', $input['order_id'])->first();
        $user->payment_status = "Paid";
        $user->r_payment_id = $input['payment_id'];
        $user->save();
        $order_id = array('order_id' => $input['order_id']);
        echo json_encode($order_id);
    }
}