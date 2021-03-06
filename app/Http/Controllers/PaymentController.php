<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wizard\Steps\SetUserDataStep;
use Smajti1\Laravel\Wizard;
use App\Models\Categorie;
use App\Wizard\Steps\SetCartDataStep;
use App\Models\Evenement;
use App\Wizard\Steps\SetPaymentModeStep;
use App\Models\Ticket;
use App\Models\Client;

class PaymentController extends Controller
{
    public $steps = [
        'set-userdata-key' => SetUserDataStep::class,
        'set-cartdata-key'=>SetCartDataStep::class,
        'set-paymentmode-key'=>SetPaymentModeStep::class
    ];
    
    protected $wizard;
    
    public function __construct()
    {
        $this->wizard = new Wizard($this->steps, $sessionKeyName = 'payment');
    }
    
    public function wizard($step = null)
    {
        $categories=Categorie::all();
        $event=session('event');
        try {
            if (is_null($step)) {
                $step = $this->wizard->firstOrLastProcessed();
            } else {
                $step = $this->wizard->getBySlug($step);
            }
        } catch (StepNotFoundException $e) {
            abort(404);
        }
    
        return view('client.pages.wizard.base', compact('step', 'categories', 'event'));
    }
    
    public function wizardPost(Request $request, $step = null)
    {
        try {
            $step = $this->wizard->getBySlug($step);
        } catch (StepNotFoundException $e) {
            abort(404);
        }
    
        $this->validate($request, $step->rules($request));
        $step->process($request);
    
        return redirect()->route('wizard.step', [$this->wizard->nextSlug()]);
    }

    public function buy()
    {
        $sycapay=\Sycapay::getInstance();
        $resultat=$sycapay->hash_call();
        $categories=Categorie::all();

        if ($resultat['desc']=="SUCCESS") {
            $token=$resultat['token'];
            session(['token'=>$token]);
            return view('client.pages.wizard.buy', compact('categories'));
        }
        dd($resultat);
    }

    public function reservation()
    {
    }

    public function generate_ticket()
    {
        $ticket=new Ticket();
        $acheteur=new Client();
    }
}
