<?php
namespace App\Wizard\Steps;

use Smajti1\Laravel\Step;


class SetPaymentModeStep extends Step
{

    public static $label = 'Moyen de Paiement';
    public static $slug = 'set-payment-mode';
    public static $view = 'client.pages.wizard.paymentmode';

    public function process(\Illuminate\Http\Request $request)
    {
        // for example, create user
    dd($request);
        // next if you want save one step progress to session use
        $this->saveProgress($request);
    }

    public function rules(\Illuminate\Http\Request $request = null): array
    {
        return [];
    }
}