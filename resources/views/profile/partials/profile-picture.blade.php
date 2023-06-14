<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile Picture here.") }}
        </p>
    </header>


    <form method="post" action="{{ route('profile.update.photo') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="photo" :value="__('Photo')" />
            <x-text-input id="photo" name="photo" type="file" class="mt-1 block w-full"  required :value="old('photo')" accept="image/*"  />
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

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
