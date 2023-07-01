<section>
    <header>

        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Complete Your payment') }}
        </h2>

    </header>

    <form method="post" action="" class="mt-6 space-y-6" id="contact-form">
        @csrf

        <div>
            <x-input-label for="donation" :value="__('Donation Amount')" />
            <x-text-input id="donation" name="donation" type="number" class="donation mt-1 block w-full"
                placeholder="min 100.00 /-" />
            <x-input-error class="mt-2" :messages="$errors->get('donation')" />
        </div>

        {{ __('(Joining fees - 251 /- is manadetry.)') }}
        <div class="flex buy_now1 items-center gap-4">
            <x-secondary-button>{{ __('Pay') }}</x-secondary-button>

            @if (session('status') === 'updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Application is succefully submited.') }}</p>
            @endif
        </div>
    </form>

</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var SITEURL = window.location.origin;
    $.ajaxSetup({
        headers: {
            // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.buy_now1', function(e) {
        var totalAmount = parseFloat($('.donation').val()) + 251;
        // var fees = 251;
        // alert(fees + totalAmount);
        var data = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "totalAmount": totalAmount,
        }

        $.ajax({
            method: "post",
            url: "{{ route('apply.post.update-payment') }}",
            dataType: 'json',
            data: data,
            success: function(response) {
                // console.log(response);
                var order_id = response.order_id
                var status = response.status
                // // razorpay
                var options = {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "key": "rzp_live_lAxoy4bjsirWVK",
                    "amount": totalAmount * 100, // 2000 paise = INR 20
                    "name": "Hindu Rashtrya Sangthan",
                    "description": "QUICK DONATION",
                    "image": "/images/logo/shankaraayan.png",
                    "handler": function(response) {
                        $.ajax({
                            method: "POST",
                            url: "{{ route('apply.post.paymentsuccess-payment') }}",
                            dataType: 'json',
                            data: {
                                payment_id: response.razorpay_payment_id,
                                order_id: order_id,
                                status: status
                            },
                            success: function(response) {
                                cconsole.log(response);
                                window.location.href = "thankyou?order_id=" +
                                    response.order_id;
                            }
                        });
                        window.location.href = SITEURL + '/' +
                            "{{ route('apply.post.paymentsuccess-payment') }}?payment_id=" +
                            response
                            .razorpay_payment_id + '&product_id=' + product_id +
                            '&amount=' + totalAmount + '&order_id=' + response.order_id;
                    },
                    "prefill": {
                        "contact": $('#phone').val(),
                        "email": $('#email').val(),
                        "name": $('#name').val(),
                    },
                    "theme": {
                        "color": "#528FF0"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });
    });
</script>
