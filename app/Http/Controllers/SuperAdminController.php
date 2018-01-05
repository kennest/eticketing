<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Categorie;
use App\Models\TypeEvenement;
use App\Models\Lieu;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.index');
    }

    public function organisateur()
    {
        $organisateurs=Admin::all();
        return view('superadmin.organisateur', compact('organisateurs'));
    }

    public function parametres()
    {
        $lieux=Lieu::all();
        $categories=Categorie::all();
        $types=TypeEvenement::all();
        return view('superadmin.parametres', compact('lieux', 'categories', 'types'));
    }

    //Permet de switcher de mode
    public function toggleMode(Request $request)
    {
        $admin=Admin::where('id', $request->input('id'))->first();
        if ($admin->role==1) {
            $admin->role=0;
        } else {
            $admin->role=1;
        }
        $admin->save();
        return redirect()->route('supadmin.org');
    }

    public function addCategorie(Request $request)
    {
    }

    public function delCategorie(Request $request)
    {
    }

    public function addType(Request $request)
    {
    }

    public function delType(Request $request)
    {
    }
}
