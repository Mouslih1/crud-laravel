<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function welcome() {
        return view('welcome');
    }

    public function index(){
        $etudiants = Etudiant::orderBy('nom', 'asc')->paginate(5);
        return view('etudiant', compact('etudiants'));
    }

    public function create(){
        $classes = Classe::all();
        return view('createEtudiant', compact('classes'));
    }

    public function edit(Etudiant $etudiant){
        $classes = Classe::all();
        return view('editEtudiant', compact('etudiant','classes'));
    }

    public function store(Request $request){
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "classes_id" => "required"
        ]);

        // sans fillable en peux fait en cette maniére
        /*Etudiant::create([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "classes_id" => $request->classes_id
        ]);*/
        
        Etudiant::create($request->all());
        return back()->with("success","Etudiant ajouter avec succé !");

    }

    public function update(Request $request,Etudiant $etudiant){
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "classes_id" => "required"
        ]);

        $etudiant->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "classes_id" => $request->classes_id
        ]);

        return back()->with("success","L'étudiant mis à jour avec succé !");

    }

    public function delete(Etudiant $etudiant){
        $nom_complet = $etudiant->nom." ".$etudiant->prenom;
        // Etudiant::find($etudiant)->delete();
        $etudiant->delete();

        return back()->with('successDelete',"L'étudiant '$nom_complet' est supprimer avec succé ");
    }
}
