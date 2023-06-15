<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="p-12 mx-auto sm:px-6 lg:px-8 w-full grid grid-cols-5 gap-2 ">
        <div class="bg-white p-3 sm:rounded-lg">
            <ul class="list-non">
                <a href="">
                    <li class="hover:bg-gray-200 p-1 rounded-lg"><a href="{{ route('my.code.edit')}}">My Refrerral Code</a></li>
                </a>
                <li class="hover:bg-gray-200 p-1 rounded-lg" >My Team</li>
                <a href="">
                    <li class="hover:bg-gray-200 p-1 rounded-lg">Apply For Post</li>
                </a>
                <a href="">
                    <li class="hover:bg-gray-200 p-1 rounded-lg">Bank Details</li>
                </a>
            </ul>
        </div>
        <div class="col-span-4 p-3 bg-white sm:rounded-lg">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg grid grid-cols-2">
                        <div class="max-w-xl p-2">
                            @include('profile.partials.referral-user-code')
                        </div>

                        <div class="max-w-xl p-2 flex items-center justify-center">
                            <div class="self-auto">
                                <x-secondary-button class="text-base px-4 py-2 rounded-lg">
                                    {{ auth()->user()->my_referral }}
                                </x-secondary-button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
