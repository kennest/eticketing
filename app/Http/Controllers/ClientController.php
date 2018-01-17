<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\TypeEvenement;
use App\Models\Categorie;

class ClientController extends Controller
{
    public function index()
    {
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
}
