<?php
namespace App\Wizard\Steps;

use Smajti1\Laravel\Step;
use Illuminate\Http\Request;


class SetPaymentModeStep extends Step
{

    public static $label = 'Moyen de Paiement';
    public static $slug = 'set-payment-mode';
    public static $view = 'client.pages.wizard.paymentmode';

    public function process(Request $request)
    {
        // for example, create user
    
        // next if you want save one step progress to session use
        $this->saveProgress($request);
    }

    public function rules(Request $request = null): array
    {
        return [];
    }
}