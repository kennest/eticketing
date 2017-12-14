<?php
/**
 * Created by PhpStorm.
 * User: kyle
 * Date: 13/12/17
 * Time: 13:45
 */

namespace App\Http\Controllers;

use Jenssegers\Date\Date;
use App\Models\ClasseTicket;
use App\Models\Evenement;
use App\Models\Lieu;
use App\Models\TypeEvenement;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    const PIC_DIR = 'pictures';

    public function __construct()
    {
        Date::setLocale('fr');
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function listEvent()
    {
        $events = Evenement::where('admin_id', auth()->id())->paginate(4);
        return view('admin.Lists.listEvenement', compact('events'));
    }

    public function formEvent($uuid = null)
    {
        if ($event = Evenement::where('uuid',$uuid)->first()) {
            $event->load('classeTickets', 'lieu', 'type');
        } else {
            $event = null;
        }
        $types = TypeEvenement::all();
        $lieux = Lieu::all();
        return view('admin.Forms.ajouterEvenement', compact('event', 'lieux', 'types'));
    }

    public function save(Request $request)
    {
//        $this->validate($request,[
//            'title'=>'required|unique',
//            'description'=>'required'
//        ]);
        $event = new Evenement();
        $uuid = md5($request->input('title') . time());

        $type = TypeEvenement::find($request->input('type'));
        $lieu = Lieu::find($request->input('lieu'));

        $vip = new ClasseTicket();
        $vip->class = 'VIP';
        $vip->quantity = $request->input('vip');
        $vip->price = $request->input('prixvip');

        $public = new ClasseTicket();
        $public->class = 'PUBLIC';
        $public->quantity = $request->input('public');
        $public->price = $request->input('prixpublic');

        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->tickets = $request->input('tickets');
        $event->begin = $request->input('begin');
        $event->end = $request->input('end');
        $event->uuid = $uuid;

        $path = $request->file('picture')->store(
            $this::PIC_DIR, 'public'
        );

        $event->admin()->associate(auth()->user());
        $event->picture = $path;
        $event->type()->associate($type);
        $lieu->evenement()->save($event);
        $event->classeTickets()->save($vip);
        $event->classeTickets()->save($public);
        $event->save();
        dd($event);
    }

    public function update(Request $request)
    {

    }
}