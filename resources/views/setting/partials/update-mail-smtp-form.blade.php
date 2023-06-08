<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Email SMTP Config') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's mail smtp details.") }}
        </p>
    </header>

    <form method="post" action="{{ route('mail.config.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('MAILER (smtp)')" />
            <x-text-input id="MAIL_SMTP" name="MAIL_SMTP" type="text" class="mt-1 block w-full" :value="old('smtp', $user_smtp->MAIL_SMTP ?? 'smtp')"  autofocus autocomplete="smtp" placeholder="smtp" />
            <x-input-error class="mt-2" :messages="$errors->get('MAIL_SMTP')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('MAIL HOST')" />
            <x-text-input id="MAIL_HOST" name="MAIL_HOST" type="text" class="mt-1 block w-full" :value="old('MAIL_HOST', $user_smtp->MAIL_HOST ?? '')"   placeholder="e.g. smtp.google.com"/>
            <x-input-error class="mt-2" :messages="$errors->get('MAIL_HOST')" />
        </div>
        <div>
            <x-input-label for="MAIL_PORT" :value="__('MAIL_PORT')" />
            <x-text-input id="MAIL_PORT" name="MAIL_PORT" type="number" class="mt-1 block w-full" :value="old('MAIL_PORT', $user_smtp->MAIL_PORT ?? '')"   placeholder="e.g. 567,486"/>
            <x-input-error class="mt-2" :messages="$errors->get('MAIL_PORT')" />
        </div>
        <div>
            <x-input-label for="MAIL_USERNAME" :value="__('MAIL USERNAME')" />
            <x-text-input id="MAIL_USERNAME" name="MAIL_USERNAME" type="text" class="mt-1 block w-full" :value="old('MAIL_USERNAME', $user_smtp->MAIL_USERNAME ?? '')"   placeholder="e.g. youremail@domain.com"/>
            <x-input-error class="mt-2" :messages="$errors->get('MAIL_USERNAME')" />
        </div>
        <div>
            <x-input-label for="PASSWORD" :value="__('MAIL PASSWORD')" />
            <x-text-input id="MAIL_PASSWORD" name="MAIL_PASSWORD" type="password" class="mt-1 block w-full" :value="old('MAIL_PASSWORD', $user_smtp->MAIL_PASSWORD ?? '')"  placeholder="SMTP Password"/>
            <x-input-error class="mt-2" :messages="$errors->get('MAIL_PASSWORD')" />
        </div>
        <div>
            <x-input-label for="text" :value="__('MAIL ENCRYPTION')" />
            <x-text-input id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" type="text" class="mt-1 block w-full" :value="old('MAIL_ENCRYPTION', $user_smtp->MAIL_ENCRYPTION ?? '')"  placeholder="e.g. tls"/>
            <x-input-error class="mt-2" :messages="$errors->get('MAIL_ENCRYPTION')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Mail-smtp Details Saved.') }}</p>
            @endif
        </div>
    </form>

</section>
