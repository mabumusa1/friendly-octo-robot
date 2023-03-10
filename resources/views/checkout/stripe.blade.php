<div class="flex flex-col">
    <h1 class="text-gray-800 text-xl font-medium mb-2">{{ __('Order Details') }}</h1>
</div>
<hr class="my-4">
 <div class="flex justify-between items-center">
    <span class="font-medium text-base">{{ __(':noContacts Contacts / :PlanName', ['noContacts' => $this->contacts, 'planName' => $this->period]) }}</span><span class="text-base font-medium">{{ $this->price }}</span>
  </div>
<hr class="my-4">
<input type="hidden" id="client_secret" value="{{ $intent->client_secret  }}">
<div id="card-element">
    <!-- Elements will create input elements here -->
</div>

<!-- We'll put the error messages in this element -->
<div id="card-element-errors" role="alert"></div>

<button id="card-button" data-secret="{{ $intent->client_secret }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
    {{ __('Place Order') }}
</button>

