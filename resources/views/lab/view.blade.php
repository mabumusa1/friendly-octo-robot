<x-filament::page
    :widget-data="['record' => $record]"
    :class="\Illuminate\Support\Arr::toCssClasses([
        'filament-resources-view-record-page',
        'filament-resources-' . str_replace('/', '-', $this->getResource()::getSlug()),
        'filament-resources-record-' . $record->getKey(),
    ])"
>
<div class="grid grid-cols-8 gap-3">
    <div class="col-span-6 flex flex-col">
        <x-filament::card>
        <p class="mb-3 mt-2 text-md font-medium">{{ __('You can login to your lab, using the credentials below') }}</p>
        <div class="flex flex-row">
            <div class="basis-1/4 mr-3"><p class="mb-3 text-md font-medium text-gray-500 dark:text-white">{{ __('Login URL: ') }}</p></div>
            <div class="basis-3/4"><a class="text-blue-600 inline-block" href="https://.steercampaign.com">https://.steercampaign.com</a></div>
        </div>
        <div class="flex flex-row">
            <div class="basis-1/4 mr-3"><p class="mb-3 text-md font-medium text-gray-500 dark:text-white">{{ __('Username: ') }}</p></div>
            <div class="basis-3/4"></div>
        </div>
        <div class="flex flex-row">
            <div class="basis-1/4 mr-3"><p class="mb-3 text-md font-medium text-gray-500 dark:text-white">{{ __('Password: ') }}</p></div>
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
    </div>
    <div class="col-span-2 flex flex-col">
        <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 flex flex-col">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl mb-3 font-bold leading-none text-gray-900 dark:text-white">{{ __('Learning Resources') }}</h5>
           </div>
           <div class="flow-root">

                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                                  </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ __('Mautic Documentation') }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                                  </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ __('Training Videos') }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                                  </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ __('Get in touch with us') }}
                                </p>
                            </div>
                        </div>
                    </li>

                </ul>
           </div>
        </div>
    </div>
</div>
</x-filament::page>
