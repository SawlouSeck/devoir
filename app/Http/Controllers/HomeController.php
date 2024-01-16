<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Candidat;
use App\Models\Programme;
use App\Models\Secteur;
use App\Models\Electeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function index()
    {
        $candidat=Candidat::all();

        if (auth()->user()->is_admin ==1){
        return view('dashboard');
        }
        else

            return view('user1Home',compact('candidat'));

    }
    public function liste()
    {
        $candidat = Candidat::all();
        return view('listeCand', compact('candidat'));

    }
    public function listePro()
    {
        $programme = Programme::all();
        return view('listePRO', compact('programme'));

    }
    public function listeSect()
    {
        $secteur = Secteur::all();
        return view('listeSect', compact('secteur'));

    }

}



