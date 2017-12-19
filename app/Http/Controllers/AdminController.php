<?php
/**
 * Created by PhpStorm.
 * User: kyle
 * Date: 13/12/17
 * Time: 13:45
 */

namespace App\Http\Controllers;

use App\Models\ClasseTicket;
use App\Models\Evenement;
use App\Models\Lieu;
use App\Models\TypeEvenement;
use Auth;
use Charts;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Models\TypeOrganisateur;

class AdminController extends Controller
{
    const PIC_DIR = 'pictures';

    public function __construct()
    {
        Date::setlocale('fr');
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $Types=array();
        $Lieux=array();
        $events=Evenement::where('admin_id', auth()->id())->get();
        $events->load('type', 'lieu');

        foreach ($events as $e) {
            array_push($Types, $e->type->type);
        }

        foreach ($events as $e) {
            array_push($Lieux, $e->lieu->label);
        }

        $eventsTypeChart = Charts::database($events, 'pie', 'google')
                  ->title("Classification par Categorie d'evenement")
                  ->responsive(false)
                  ->groupBy('type.type')
                  ->labels($Types);

        $eventsLieuChart=Charts::database($events, 'pie', 'google')
                  ->title("Classification par Lieu :")
                  ->responsive(false)
                  ->groupBy('lieu.label')
                  ->labels($Lieux);

        return view('admin.index', compact('eventsTypeChart', 'eventsLieuChart'));
    }

    //List Events
    public function listEvent()
    {
        $events = Evenement::where('admin_id', auth()->id())->paginate(3);
        return view('admin.Lists.listEvenement', compact('events'));
    }

    //Show form
    public function formEvent($uuid = null)
    {
        if ($event = Evenement::where('uuid', $uuid)->first()) {
            $event->load('classeTickets', 'lieu', 'type');
        } else {
            $event = null;
        }
        $types = TypeEvenement::all();
        $lieux = Lieu::all();
        return view('admin.Forms.ajouterEvenement', compact('event', 'lieux', 'types'));
    }

    //Save
    public function save(Request $request)
    {
        //        $this->validate($request,[
        //            'title'=>'required|unique',
        //            'description'=>'required'
        //        ]);
        $event = new Evenement();
        $uuid  = md5($request->input('title').time());

        $type               = TypeEvenement::find($request->input('type'));
        $lieu               = Lieu::find($request->input('lieu'));
        $event->title       = $request->input('title');
        $event->description = $request->input('description');
        $event->tickets     = 0;
        $event->begin       = $request->input('begin');
        $event->end         = $request->input('end');
        $event->statut      = 0;
        $event->uuid        = $uuid;

        $path = $request->file('picture')->store(
            $this::PIC_DIR,
            'public'
        );

        $event->admin()->associate(auth()->user());
        $event->picture = $path;
        $event->type()->associate($type);
        $lieu->evenement()->save($event);

        if (Auth::user()->role == 1) {
            $event->tickets     = $request->input('tickets');
            $vip           = new ClasseTicket();
            $vip->class    = 'VIP';
            $vip->quantity = $request->input('vip');
            $vip->price    = $request->input('prixvip');

            $public           = new ClasseTicket();
            $public->class    = 'PUBLIC';
            $public->quantity = $request->input('public');
            $public->price    = $request->input('prixpublic');
            $event->classeTickets()->save($vip);
            $event->classeTickets()->save($public);
        }
        $event->save();
        return view('admin.Lists.listEvenement');
    }

    //Update
    public function update(Request $request)
    {
    }

    //Delete
    public function delete($uuid = null)
    {
        $event = Evenement::where('uuid', $uuid);
    }

    //Go Prime
    public function goPrime()
    {
        dd("En cours de traitement...");
        Auth::user()->role = 1;
        Auth::user()->save();
        $events = Auth::user()->evenements()->get();
        foreach ($events as $event) {
            $vip           = new ClasseTicket();
            $vip->class    = 'VIP';
            $vip->quantity = 0;
            $vip->price    = 0;

            $public           = new ClasseTicket();
            $public->class    = 'PUBLIC';
            $public->quantity = 0;
            $public->price    = 0;
            $event->classeTickets()->save($vip);
            $event->classeTickets()->save($public);
        }
        return redirect()->intended('admin.index');
    }
}
