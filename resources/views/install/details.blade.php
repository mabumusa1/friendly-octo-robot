<x-filament::card>
    <p class="mb-3 mt-2 text-md font-medium">{{ __('You can login to your lab, using the credentials below') }}</p>
    <div class="flex flex-row">
        <div class="basis-1/4 mr-3"><p class="mb-3 text-md font-medium text-gray-500 dark:text-white">{{ __('Login URL: ') }}</p></div>
        <div class="basis-3/4"><a class="text-blue-600 inline-block underline" href="{{ __('https://:url.steercampaign.com', ['url' => $record->properties['id']]) }}">{{ __('https://:url.steercampaign.com', ['url' => $record->properties['id']]) }}</a></div>
    </div>
    <div class="flex flex-row">
        <div class="basis-1/4 mr-3"><p class="mb-3 text-md font-medium text-gray-500 dark:text-white">{{ __('Username: :name ', ['name' => $record->properties['mautic']['admin']['email'] ]) }}</p></div>
        <div class="basis-3/4"></div>
    </div>
    <div class="flex flex-row">
        <div class="basis-1/4 mr-3"><p class="mb-3 text-md font-medium text-gray-500 dark:text-white">{{ __('Password: :password ', ['password' => $record->properties['mautic']['admin']['password'] ] ) }}</p></div>
        <div class="basis-3/4"></div>
    </div>
    <hr />
    <div class="flex flex-col items-center pb-10">
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ __('If you are not done learning, you can always renew your installation') }}</span>
        <div class="flex mt-4 space-x-3 md:mt-6">


        <x-filament-support::link a type="xx" href="ss">
            {{ __('Acess the lab') }}
        </x-filament-support::button>

        </div>
    </div>
</x-filament::card>
