<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Your Aadhar KYC') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 ">
            {{ __('Ensure your KYC should be original for Verification.') }}
        </p>
    </header>

    <form method="post" action="{{ route('update.aadhar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="sponser_code" :value="__('Your sponser code')" />
            <x-text-input id="referral_by" name="referral_by" type="text" class="mt-1 block w-full" :value="old('referral_by', $mySponser)" />
            <x-input-error :messages="$errors->get('referral_by')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="aadhar_no" :value="__('Aadhar 12 Digit Number')" />
            <x-text-input id="aadhar_no" name="aadhar_no" type="number" class="mt-1 block w-full" :value="old('aadhar_no', $user->userDetail->aadhar_no)" />
            <x-input-error :messages="$errors->get('aadhar_no')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="aadhar_f" :value="__('Aadhar Front Image')" />
            <x-text-input id="aadhar_f" name="aadhar_f" type="file" class="mt-1 block w-full" accept="image/*" />
            <x-input-error :messages="$errors->get('aadhar_f')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="aadhar_b" :value="__('Aadhar Back Image')" />
            <x-text-input id="aadhar_b" name="aadhar_b" type="file" class="mt-1 block w-full" accept="image/*" />
            <x-input-error :messages="$errors->get('aadhar_b')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'saved')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
