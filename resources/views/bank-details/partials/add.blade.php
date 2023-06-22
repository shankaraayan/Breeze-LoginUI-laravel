<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Bank Details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Please submit your original bank details, we need to verify your bank details.") }}
        </p>
    </header>

    <form method="post" action="{{ route('bank.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label  :value="__('Bank Name')" />
            <x-text-input id="bank_name" name="bank_name" type="text" class="mt-1 block w-full" :value="old('bank_name')" required autofocus autocomplete="bank_name" />
            <x-input-error class="mt-2" :messages="$errors->get('bank_name')" />
        </div>

        <div>
            <x-input-label  :value="__('IFSC')" />
            <x-text-input id="ifsc" name="ifsc" type="text" class="mt-1 block w-full" :value="old('ifsc')" required autocomplete="ifsc" />
            <x-input-error class="mt-2" :messages="$errors->get('ifsc')" />
        </div>

        <div>
            <x-input-label  :value="__('Account No.')" />
            <x-text-input id="account_no" name="account_no" type="text" class="mt-1 block w-full" :value="old('account_no')" required autocomplete="account_no" />
            <x-input-error class="mt-2" :messages="$errors->get('account_no')" />
        </div>

        <div>
            <x-input-label  :value="__('Account Holder')" />
            <x-text-input id="account_holder" name="account_holder" type="text" class="mt-1 block w-full" :value="old('account_holder')" required autocomplete="account_holder" />
            <x-input-error class="mt-2" :messages="$errors->get('account_holder')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Submit') }}</x-primary-button>

            @if (session('status') === 'saved')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
