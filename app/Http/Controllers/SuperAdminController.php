<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Categorie;
use App\Models\TypeEvenement;
use App\Models\Lieu;
use Psy\Util\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Banniere;

class SuperAdminController extends Controller
{
    const BANNER_DIR='banners';
    public $villes=[
        'Abengourou',
        'Abidjan',
        'Aboisso',
        'Adiaké',
        'Adzopé',
        'Agboville',
        'Agnibilékrou',
        'Akoupé',
        'Alépé',
        'Anyama',
        'Bingerville',
        'Bondoukou',
        'Bonoua',
        'Bouaflé',
        'Bouaké',
        'Bouandougou',
        'Bouna',
        'Dabou',
        'Daloa',
        'Danané',
        'Daoukro',
        'Dimbokro',
        'Divo',
        'Duékoué',
        'Gagnoa',
        'Grand-Bassam',
        'Grand-Lahou',
        'Issia',
        'Jacqueville',
        'Katiola',
        'Korhogo',
        'Lakota',
        'Man',
        'Odienné',
        'San-Pédro',
        'Sassandra',
        'Tabou',
        'Tanda',
        'Tiassalé',
        'Yamoussoukro',
                ];
    public function __construct()
    {
        $this->middleware('check.token')->except('login', 'doLogin');
    }
    public function index()
    {
        return view('superadmin.index');
    }

    public function login()
    {
        return view('superadmin.login');
    }

    public function doLogin(Request $request)
    {
        $code=$request->input('code');
        if ($code===env('APP_CODE')) {
            $token=md5(now());
            $request->session()->put('token', $token);
            //dd($request->session());
            return redirect()->intended(route('supadmin.index'));
        } else {
            return redirect()->intended(route('supadmin.index'));
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('token');
        return redirect()->intended(route('supadmin.login'));
    }

    public function organisateur()
    {
        $organisateurs=Admin::all();
        return view('superadmin.organisateur', compact('organisateurs'));
    }

    public function lieu($id=null)
    {
        $lieu=Lieu::find($id);
        $lieux=Lieu::all();
        $villes=$this->villes;
        return view('superadmin.components.lieu', compact('lieu', 'lieux', 'villes'));
    }

    public function categorie($id=null)
    {
        $categorie=Categorie::find($id);
        $categories=Categorie::all();
        return view('superadmin.components.categorie', compact('categorie', 'categories'));
    }

    public function type($id=null)
    {
        $type=TypeEvenement::find($id);
        $types=TypeEvenement::all();
        $types->load('categorie');
        $categories=Categorie::all();
        return view('superadmin.components.type', compact('type', 'types', 'categories'));
    }

    public function banner($id=null)
    {
        $banner=Banniere::find($id);
        $banners=Banniere::all();
        return view('superadmin.components.banner', compact('banner', 'banners'));
    }

    public function addbanner(Request $request)
    {
        $this->validate($request, [
            'picture'=>'required',
        ]);
                
        $banner=new Banniere();
        $path = $request->file('picture')
        ->store($this::BANNER_DIR, 'public');
        $banner->picture=$path;
        $banner->description=$request->input('description');
        $banner->save();
        return redirect()->route('supadmin.banner');
    }
    public function updatebanner(Request $request)
    {
        $banner=Banniere::find($request->input('id'));
        Storage::disk('public')->delete($banner->picture);
        $path = $request->file('picture')->store(
            $this::BANNER_DIR,
            'public'
        );
        $banner->picture=$path;
        $banner->description=$request->input('description');
        $banner->save();
        return redirect()->route('supadmin.banner');
    }
    //Permet de switcher de mode
    public function toggleMode(Request $request)
    {
        $admin=Admin::where('id', $request->input('id'))->first();
        if ($admin->role==0) {
            $admin->role=1;
        }
        $admin->save();
        return redirect()->route('supadmin.org');
    }

    public function addCategorie(Request $request)
    {
        $categorie=new Categorie();
        $categorie->categorie=$request->input('categorie');
        $categorie->save();
        return redirect()->route('supadmin.categorie');
    }

    public function updateCategorie(Request $request)
    {
        $categorie=Categorie();
        $categorie->categorie=$request->input('categorie');
        $categorie->save();
        return redirect()->route('supadmin.categorie');
    }

    public function delCategorie(Request $request)
    {
    }

    public function addLieu(Request $request)
    {
        $lieu=new Lieu();
        $lieu->label=$request->input('label');
        $lieu->town=$request->input('town');
        $lieu->district=$request->input('district');
        $lieu->save();
        return redirect()->route('supadmin.lieu');
    }

    public function updateLieu(Request $request)
    {
        $lieu=Lieu::find($request->input('id'));
        $lieu->label=$request->input('label');
        $lieu->town=$request->input('town');
        $lieu->district=$request->input('district');
        $lieu->save();
        return redirect()->route('supadmin.lieu');
    }
    public function addType(Request $request)
    {
        $type=new TypeEvenement();
        $type->type=$request->input('type');
        $type->categorie_id=$request->input('categorie_id');
        $type->save();
        return redirect()->route('supadmin.type');
    }

    public function updateType(Request $request)
    {
        $type=TypeEvenement::find($request->input('id'));
        $type->type=$request->input('type');
        $type->categorie_id=$request->input('categorie_id');
        $type->save();
        return redirect()->route('supadmin.type');
    }

    public function delOrganisateur($id=null)
    {
        $organisateur=Admin::find($id);
        $organisateur->delete();
        return redirect()->route('supadmin.org');
    }
}
