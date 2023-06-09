<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Razorpay
{
    protected $key, $secret;

    /** @var Api */
    protected $api;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->key =  config('payment.gateways.razorpay.key');
        $this->secret =  config('payment.gateways.razorpay.secret');
        $this->api = new Api($this->key, $this->secret);
    }

    public function createOrder(string $transactionId, int $amount): array
    {
        $order  = $this->api->order->create(array('receipt' => $transactionId, 'amount' => $amount, 'currency' => 'INR'));

        return [
            'gateway_details' => [
                'key' => $this->key,
                'transaction_id' => $transactionId,
                'merchant_order_id' => $order['id'],
                'amount' => $amount,
            ],
            'transaction_details' => [
                'merchant_order_id' => $order['id']
            ]
        ];
    }

    public function verifyTransaction(array $transactionDetails): bool
    {
        $request = request();

        try {

            $orderId = $transactionDetails['merchant_order_id'];
            $paymentId = $transactionDetails['merchant_payment_id'];
            $signature = $transactionDetails['merchant_signature'];

            $this->api->utility->verifyPaymentSignature([
                'razorpay_signature'  => $signature,
                'razorpay_payment_id'  => $paymentId,
                'razorpay_order_id' => $orderId
            ]);

            return true;
        } catch (SignatureVerificationError $e) {
            Log::error('Razorpay Error : ' . $e->getMessage());
            return false;
        } catch (\Exception $e) {
            Log::error("Razorpay transaction verification failed $request->transaction_id");
            return false;
        }
    }

    public function refund(string $paymentId, $amount): bool
    {
        try {
            $this->api->payment->fetch($paymentId)
                ->refund([
                    "amount" => round($amount * 100),
                    "speed" => "normal",
                    "notes" => [
                        "notes_key_1" => "Beam me up Scotty.",
                        "notes_key_2" => "Engage"
                    ],
                    "receipt" => "Receipt No. 31"
                ]);
            return true;
        } catch (\Exception $e) {
            Log::error("Razorpay refund failed $paymentId");
            return false;
        }
    }
}