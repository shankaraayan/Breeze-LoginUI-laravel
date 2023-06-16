<section>
    <header>

        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Complete Your payment') }}
        </h2>

    </header>

    <form method="post" action="{{ route('apply.post.update-payment') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="donation" :value="__('Donation Amount')" />
            <x-text-input id="donation" name="donation" type="number" class="mt-1 block w-full"
                placeholder="min 100.00 /-" />
            <x-input-error class="mt-2" :messages="$errors->get('donation')" />
        </div>

        {{ __('(Joining fees - 251 /- is manadetry.)') }}
        <div class="flex items-center gap-4">
            <x-secondary-button>{{ __('Pay') }}</x-secondary-button>

            @if (session('status') === 'updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Application is succefully submited.') }}</p>
            @endif
        </div>
    </form>

</section>
