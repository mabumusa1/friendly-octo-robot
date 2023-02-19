<x-filament::page
    :class="\Illuminate\Support\Arr::toCssClasses([
        'filament-resources-list-records-page',
        'filament-resources-' . str_replace('/', '-', $this->getResource()::getSlug()),
    ])"
>
@if(Auth::user()->lab()->exists())
    {{ $this->table }}
@else
<x-filament::card>
    <h1 class="mt-4 text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 text-center">{{ __('Learn Mautic') }}</h1>
    <p class="mt-4 mb-4 text-lg text-slate-700 dark:text-slate-400 text-center">{{ __('You are one step away from getting your Mautic lab running.') }}</p>
    <hr/>
    <p class="mt-4 mb-4 text-lg text-slate-700 dark:text-slate-400">{{ __('Labs are training enviroments so they have limited capabilities, as such:') }}</p>
    <ul class="space-y-5 list-inside dark:text-gray-400">
        <li class="flex items-center mt-5 mb-5 text-lg text-slate-700 dark:text-slate-400">
            <svg class="w-5 h-5 mr-3 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ __('Labs with no activity for 7 days will be deleted, you can always create a new one') }}
        </li>
        <li class="flex items-center mt-5 mb-5 text-lg text-slate-700 dark:text-slate-400">
            <svg class="w-5 h-5 mr-3 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ __('Labs will not send real Emails or SMS, all the emails, SMS, API requests will be not be sent to live production environments ') }}
        </li>
        <li class="flex items-center mt-5 mb-5 text-lg text-slate-700 dark:text-slate-400">
            <svg class="w-5 h-5 mr-3 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ __('Labs has a limit of 100 leads for learning purposes') }}
        </li>
    </ul>
</x-filament::card>
@endif
</x-filament::page>
