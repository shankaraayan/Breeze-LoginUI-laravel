<x-app-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                {{ __('My Referral') }}
            </h2>

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg grid grid-cols-2">
                <div class="max-w-xl p-2">
                    @include('profile.partials.referral-user-code')
                </div>

                <div class="max-w-xl p-2 flex items-center justify-center">
                    <div class="self-auto">
                        <x-secondary-button class="text-base px-4 py-2 rounded-lg" id="copyReferralButton">
                            {{ auth()->user()->my_referral }}
                        </x-secondary-button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var copyReferralButton = document.getElementById('copyReferralButton');
            var referralText = copyReferralButton.getAttribute('data-referral');

            // Initialize clipboard.js
            new ClipboardJS(copyReferralButton, {
                text: function () {
                    return referralText;
                }
            });

            // Add event listener for the copy action
            copyReferralButton.addEventListener('click', function () {
                // Add any additional logic or visual feedback you want here
                console.log('Text copied!');
            });
        });
    </script>


</x-app-layout>
