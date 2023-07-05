@extends('layouts.master')
@section('page_title', 'Donate Us | Support Us')
@section('style')
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif;
        }
    </style>
@endsection

@section('body')

    <div class="p-3 donation-section section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Your donation will further our vision of ensuring a happy and healthy
                        childhood for India’s children. Donate to make a change.</p>
                    <div class="about-section section section-margin pt-0 pt-lg-5 pb-0  pb-xl-5">
                        <div class="container">
                            <div class="row mt-n1 pt-0  pt-xl-10 pb-6 pb-md-10 pb-lg-5 pb-xl-10 mb-5 mb-lg-0">
                                <div class="col-lg-6">

                                    <div class="section-title-2 mb-0">
                                        <h6 class="sub-title">Donation to Sangthan</h6>
                                        <h2 style="font-size:36px;" class="title">HELP US TRANSFORM HINDU SANGTHAN</h2>

                                        <br>
                                        <div class="contact-form">
                                            <form action="" method="post" id="contact-form"
                                                data-gtm-form-interact-id="0">
                                                @csrf
                                                <div class="form-group mb-3 mb-xl-4">
                                                    <input class="form-control" type="text" name="name" id="name"
                                                        required="" placeholder="Name:"
                                                        data-gtm-form-interact-field-id="1">
                                                </div>
                                                <div class="form-group mb-3 mb-xl-4">
                                                    <input class="form-control" type="text" name="phone" id="phone"
                                                        required="" placeholder="Phone:"
                                                        data-gtm-form-interact-field-id="2">
                                                </div>
                                                <div class="form-group mb-3 mb-xl-4">
                                                    <input class="form-control" type="email" name="email" id="email"
                                                        required="" value="" placeholder="Email:"
                                                        data-gtm-form-interact-field-id="3">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">₹</span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Amount (to the nearest Rupee)" placeholder="e.g. 5000"
                                                        id="custom" data-gtm-form-interact-field-id="0">

                                                </div>

                                                <button type="button" class="btn btn-primary btn-icon-right buy_now1">
                                                    <span>Donate Now</span>
                                                    <i class="icofont-double-right icon"></i>
                                                </button>
                                            </form>
                                        </div>

                                        <p style="font-size:12px;">Secure Payment · This site is protected by reCAPTCHA
                                            and the Google Privacy Policy and Terms of Service apply.
                                            <br>
                                            As per the Indian Income Tax Authority Rule, a donor is required to add
                                            their PAN number if they wish to receive the 80G certificate. Send your PAN
                                            Copy on support@shankaraayan.com with payment recipt
                                        </p>
                                    </div>
                                    <!--== Section Title End ==-->
                                </div>
                                <div class="col-lg-6">
                                    <img src="https://www.akhandrashtriyahindusena.com/wp-content/uploads/2021/03/329-copy.jpg"
                                        class="img img-fluid">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <!--UPI:7014875375@hdfcbank<br>-->
                                Cheque/DD/NEFT: Hindu Rashtra Sangthan<br>
                                A/c No: 01111111111<br>
                                IFSC Code: HDFC0005306<br>
                                Branch: HDFC BANK Munger, Patna, Bihar - 801010
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>Financial Details<br>
                                Permanent Account Number: ABI****81P<br>
                                80G Registration Number: **********F2022101<br>
                                From AY 2022-23 to AY 2025-26</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
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
            var totalAmount = parseFloat($('#custom').val());
            var data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "scheme": "Donation",
                "phone": $('#phone').val(),
                "email": $('#email').val(),
                "name": $('#name').val(),
                "totalAmount": totalAmount,
            }

            $.ajax({
                method: "post",
                url: "/api/auth/pay",
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
                                url: "/api/auth/paymentsuccess",
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
                                "/api/auth/paymentsuccess?payment_id=" +
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

@endsection
