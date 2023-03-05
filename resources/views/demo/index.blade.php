<x-filament::page
    :class="\Illuminate\Support\Arr::toCssClasses([
        'filament-resources-list-records-page',
        'filament-resources-' . str_replace('/', '-', $this->getResource()::getSlug()),
    ])"
>
@if(Auth::user()->demos()->exists())
    {{ $this->table }}
@else
<x-filament::card>
    <h1 class="mt-4 text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 text-center">{{ __('Demo Mautic') }}</h1>
    <p class="mt-4 mb-4 text-lg text-slate-700 dark:text-slate-400 text-center">{{ __('Show the capabilities of Mautic to your clients') }}</p>
    <hr/>
    <p class="mt-4 mb-4 text-lg text-slate-700 dark:text-slate-400">{{ __('Demos are Mautic installations that are filled with data or empty that you can use with your clients, in order to protect you and us from spammers, we implemented some limits:') }}</p>
    <ul class="space-y-5 list-inside dark:text-gray-400">
        <li class="flex items-center mt-5 mb-5 text-lg text-slate-700 dark:text-slate-400">
            <svg class="w-5 h-5 mr-3 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ __('Demos will be deleted after 14 days from their creation') }}
        </li>
        <li class="flex items-center mt-5 mb-5 text-lg text-slate-700 dark:text-slate-400">
            <svg class="w-5 h-5 mr-3 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ __('Demos will not send real Emails or SMS, all the emails, SMS, API requests will be not be sent to live production environments, we will provide you with tools to show the end results.') }}
        </li>
        <li class="flex items-center mt-5 mb-5 text-lg text-slate-700 dark:text-slate-400">
            <svg class="w-5 h-5 mr-3 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ __('Demos has a limit of 100 leads for learning purposes') }}
        </li>
    </ul>
</x-filament::card>
@endif
</x-filament::page>
