<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Work post in party application') }}
        </h2>
        @if ($msg)
            <span class="bg-red-100 text-red-800 text-lg font-medium mr-2 px-2.5 py-0.5 rounded">
                {{ $msg }}
            </span>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg grid grid-cols-2">
                <div class="max-w-xl p-2">
                    @include('apply-post.partials.apply-form')
                </div>
                @if ($application->status == 'created' || $application->status == 'failed')
                    <div class="max-w-xl p-2">
                        @include('apply-post.partials.complete-payment')
                    </div>
                @endif
            </div>

        </div>
    </div>


</x-app-layout>
