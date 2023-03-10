<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use App\Models\Plan;
use Closure;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\ViewField;


class Checkout extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Checkout';

    protected static ?string $navigationLabel = 'Checkout';

    protected static ?string $slug = 'checkout';

    protected static string $view = 'filament.pages.checkout';
    public $period;
    public $planId;
    public $price;
    public $contacts;


    public function mount(): void
    {
        $plan = Plan::first();
        $this->pricingForm->fill([
            'period' => "monthly",
            'planId' => $plan->id,
            'price' => $plan->price,
            'contacts' => $plan->contacts
        ]);
    }
    protected function getViewData(): array
    {
        // Any user that reaches will be have a stripe customer
        $user = auth()->user();
        $stripeCustomer = $user->createOrGetStripeCustomer();

        return [
            'intent' => $user->createSetupIntent()
        ];
    }


    protected function getBillingFormSchema(): array
    {
        return [
            Card::make()
            ->schema([
                ViewField::make('stripe')->view('checkout.stripe', ['intent' => 'ss'])
            ])
        ];
    }

    protected function getPricingFormSchema(): array
    {
        return [
            Card::make()
            ->schema([
                Radio::make('period')
                ->label(__('Subscription Period'))
                ->inlineLabel()
                ->reactive()
                ->options([
                    'monthly' => 'Monthly',
                    'yearly' => 'Yearly',
                ])
                ->afterStateUpdated(function (Closure $set, Closure $get, $state) {
                    if($state == 'yearly'){
                        $set('planId', $get('planId')+1);
                        $set('price', Plan::find($get('planId'))->price);
                        $set('contacts', Plan::find($get('planId'))->contacts);
                    }else{
                        $set('planId', $get('planId')-1);
                        $set('price', Plan::find($get('planId'))->price);
                        $set('contacts', Plan::find($get('planId'))->contacts);
                    }
                }),

                Select::make('planId')
                ->label(__('Number of Contacts'))
                ->options(function (callable $get) {
                    return plan::where('period', $get('period'))->get()->pluck('contacts', 'id');
                })
                ->disablePlaceholderSelection()
                ->reactive()
                ->inlineLabel()
                ->afterStateUpdated(function (Closure $set, Closure $get, $state) {
                    $set('planId', $state);
                    $set('price', Plan::find($get('planId'))->price);
                    $set('contacts', Plan::find($get('planId'))->contacts);
                }),
            ])
        ];
    }
    protected function getForms(): array
    {
        return [
            'pricingForm' => $this->makeForm()
                ->schema($this->getPricingFormSchema()),
            'billingForm' => $this->makeForm()
                ->schema($this->getBillingFormSchema())
        ];
    }

    public function submit()
    {
        //return redirect()->route('purchase', ['id' => $this->planId]);
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return false;
    }

}
