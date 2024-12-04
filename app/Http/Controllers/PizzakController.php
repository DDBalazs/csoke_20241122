<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pizzak;

class PizzakController extends Controller
{
    public function akcios(){
        return view('welcome', [
            'result' => pizzak::where('akcios',1)        //SELECT * FROM pizzak WHERE akcios = 1
                                ->get()
        ]);
    }

    public function adatlap($id){
        return view('adatlap', [
            'result' => pizzak::find($id)               //SELECT * FROM pizzak WHERE id = $id
        ]);
    }

    public function rnd(){
        /*$hossz = pizzak::count('id');
        $r = rand(1,$hossz);*/                            ##Gagyi verzió
        $r = pizzak::inRandomOrder()->first();
        return view('adatlap', [
            'result' => pizzak::find($r->id)
        ]);
    }

    public function osszes(){
        return view('osszes', [
            'result' => pizzak::all()                   //SELECT * FROM pizzak
        ]);
    }

    public function osszes2($p){
        switch($p){
            case 1:
                $sv = pizzak::orderBy('nev')->get();
            break;
            case 2:
                $sv = pizzak::orderBy('nev','DESC')->get();
            break;
            case 3:
                $sv = pizzak::orderBy('ar')->get();
            break;
            case 4:
                $sv = pizzak::orderBy('ar','DESC')->get();
            break;
        }

        return view('osszes', [
            'result' => $sv
        ]);

    }

    public function AddData(Request $req){
        //validálás
        $req->validate([
            'nev'           => 'required|unique:pizzak,nev',
            'feltet'        => 'required',
            'ar'            => 'required|numeric|min:2000|max:10000'
        ],[
            'nev.required'  => 'Nevet kötelező megadnod!',
            'feltet.required' => 'Pizza feltéteit kötelező megadnod!',
            'ar.required' => 'Árat kötelező megadnod!',
            'nev.unique' => 'Ez a pizzanév már foglalt!',
            'ar.numeric' => 'Csak számot adhat meg',
            'ar.min'    => "Minimum ár 2000Ft",
            'ar.max'    => "Maximum ár 10000Ft"
        ]);
        //adatbázisba írás
        $data           = new pizzak;
        $data->nev      = $req->nev;
        $data->feltet   = $req->feltet;
        $data->ar       = $req->ar;
        $data->Save();

        //visszajelzés a felhasználónak

        return view('succes',[
            'msg' => 'Sikeresen feltetted a pizzát: '.$req->nev
        ]);
    }

    public function Mod(){
        return view('mod', [
            'result'    => pizzak::all()
        ]);
    }
}
