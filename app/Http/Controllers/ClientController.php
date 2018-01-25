<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\TypeEvenement;
use App\Models\Categorie;
use Illuminate\Support\Collection;

class ClientController extends Controller
{
    public $class_ticket=[];
    public function __construct()
    {
    }

    public function index()
    {
        //dd(session('class'));
        $events=Evenement::all();

        $types=TypeEvenement::all();
        $categories=Categorie::all();

        $types->load('activeevents.type', 'activeevents.lieu');
        $events=$events->reject(function ($e) {
            return $e->statut ==0;
        });

        $events->load('type', 'lieu', 'participants');

        return view('client.index', compact('events', 'types', 'categories'));
    }
    public function details($uuid=null)
    {
        $events=Evenement::all();

        $types=TypeEvenement::all();
        $categories=Categorie::all();
        if ($event = Evenement::where('uuid', $uuid)->first()) {
            $event->load('classeTickets', 'lieu', 'type');
        } else {
            $event = null;
        }
        return view('client.pages.details', compact('events', 'types', 'categories', 'event'));
    }

    public function paymentWizard($uuid=null)
    {
        $client=session('client');
        $events=Evenement::all();

        $types=TypeEvenement::all();
        $categories=Categorie::all();
        if ($event = Evenement::where('uuid', $uuid)->first()) {
            $event->load('classeTickets', 'lieu', 'type');
        } else {
            $event = null;
        }
        //dd($event);
        return view('client.pages.payment', compact('events', 'types', 'categories', 'event', 'client'));
    }

    public function storeData(Request $request)
    {
        if ($request->ajax()) {
            $flag=$request->input('flag');
            if ($flag) {
                switch ($flag) {
                    case 'user_data':
                    session(['user'=> $request->input('user')]);
                        break;
                    case 'payment_data':
                    session(['payment'=> $request->input('payment')]);
                        break;
                    default:
                         echo "401 unauthorized";
                }
                return response()->json('success');
            } else {
                return response()->json('error');
            }
        }
    }

    public function getData(Request $request)
    {
    }


    public function buy()
    {
        if ($request->ajax()) {
        }
    }
}
