<x-app-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                {{ __('My Team') }}
            </h2>
            <p class="text-xl text-gray-800 pl-2">
                {{ $user->my_referral }}
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class=" p-2">
                    @include('my-team.partials.table-view')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
