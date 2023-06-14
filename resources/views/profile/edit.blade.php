<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                {{ __('Profile') }}
            </h2>
            <div class="w-12 h-12 rounded-2xl ml-2">
                @php
                    if (isset($user->userDetail->photo)) {
                        $photo = env('APP_URL') . '/storage/' . $user->userDetail->photo;
                    } else {
                        $photo = 'https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-538.jpg';
                    }
                @endphp
                <img class="object-fill" src="{{ @$photo }}" />
            </div>
            <div class="max-w-xl p-2 text-end">
                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                    {{ $user->my_referral }}
                </span>
            </div>
            <div class="max-w-xl p-2 text-end">

                @if ($user->status == 'active')
                    <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                        Profile - {{ ucFirst($user->status) }}
                    </span>
                @else
                    <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                        Profile - {{ $user->status }}
                    </span>
                @endif
            </div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg grid grid-cols-2">
                <div class="max-w-xl p-2">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="max-w-xl p-2">
                    @include('profile.partials.profile-picture')
                </div>

            </div>

            <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg grid grid-cols-2">
                <div class="max-w-xl p-2">
                    @include('profile.partials.update-aadhar-form')
                </div>
                <div class="max-w-xl p-2">
                    @include('profile.partials.aadhar-photo')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
