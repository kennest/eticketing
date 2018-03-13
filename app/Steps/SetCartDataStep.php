<?php
namespace App\Wizard\Steps;

use Smajti1\Laravel\Step;
use Illuminate\Http\Request;

class SetCartDataStep extends Step
{

    public static $label = 'Donnees Panier';
    public static $slug = 'set-cart-data';
    public static $view = 'client.pages.wizard.cartdata';

    public function process(Request $request)
    {
        // for example, create user
    
        // next if you want save one step progress to session use
        $this->saveProgress($request);
    }

    public function rules(Request $request = null): array
    {
        return [
            'montant' => 'required|integer',
            'destinataires'=>'required'
        ];
    }
}