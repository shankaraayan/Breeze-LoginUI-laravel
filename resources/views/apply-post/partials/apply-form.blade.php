<section>
    <header>

        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Apply for Post in party.') }}
        </h2>

    </header>

    <form method="post" action="{{ route('apply.post.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Full Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $application->address ?? '')" autofocus
                autocomplete="smtp" placeholder="Address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Pincode')" />
            <x-text-input id="pincode" name="pincode" type="text" class="mt-1 block w-full" :value="old('pincode', $application->pincode ?? '')"
                placeholder="110001" />
            <x-input-error class="mt-2" :messages="$errors->get('pincode')" />
        </div>
        <div>
            <x-input-label for="district" :value="__('District')" />
            <x-text-input id="district" name="district" type="number" class="mt-1 block w-full" :value="old('district', $application->district ?? '')"
                placeholder="Delhi, Jaipur, Patna" />
            <x-input-error class="mt-2" :messages="$errors->get('district')" />
        </div>
        <div>
            <x-input-label for="apply_for" :value="__('Post (Which you want to apply)')" />
            <x-text-input id="apply_for" name="apply_for" type="text" class="mt-1 block w-full" :value="old('apply_for', $application->apply_for ?? '')"
                placeholder="District Manager, Volunteer" :disabled="$application->status == 'done'" />
            <x-input-error class="mt-2" :messages="$errors->get('apply_for')" />
        </div>
        <div>
            <x-input-label for="donation" :value="__('Donation Amount')" />
            <x-text-input id="donation" name="donation" type="number" class="mt-1 block w-full"
                placeholder="min 100.00 /-" />
            <x-input-error class="mt-2" :messages="$errors->get('donation')" />
        </div>
        {{ __('(Joining fees - 251 /- is manadetry.)') }}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Apply') }}</x-primary-button>

            @if (session('status') === 'updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Application is succefully submited.') }}</p>
            @endif
        </div>
    </form>

</section>
