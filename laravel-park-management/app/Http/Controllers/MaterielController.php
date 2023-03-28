<?php

namespace App\Http\Controllers;

use App\Models\caracter;
use App\Models\materiel;
use App\Models\Modele;
use App\Models\Marque;
use App\Models\poste;
use App\Models\contrat;
use App\Models\type;
use App\Models\fornisseur;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiels = materiel::all();
        $postes=poste::all();
        $contrats=contrat::all();
        $modeles=modele::all();
        $types=type::all();
        $marques=marque::all();
        $fornisseurs=fornisseur::all();
        return view('materiels')->with([
            'marques'=> $marques, 
            'materiels' => $materiels, 
            'types'=>$types,
            'contrats'=> $contrats, 
            'modeles' => $modeles,
            'postes' => $postes,
            'fornisseurs' => $fornisseurs
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $modeles = Modele::all();
        $marques = Marque::all();
        return view('addmateriel')->with([
            'marques' => $marques, 'modeles' => $modeles 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  type 
        // model_id
        // model_name
        // marque_id
        // marque_name
        // name_pays
        for($i=0;$i<$request->qantite;$i++){
            Materiel::create([
                'modele_id' => $request->modele_id,
                'contrat_id'=>$request->contrat_id,
                'poste_id'=> $request->poste_id,
                
            ]);
        }

          
            
            return redirect()->back()->with([
                'msg','les elemenents est bien ajouter'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\materiels  $materiels
     * @return \Illuminate\Http\Response
     */
    public function show(materiels $materiels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\materiels  $materiels
     * @return \Illuminate\Http\Response
     */
    public function edit(materiels $materiels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\materiels  $materiels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $materiel = materiel::find($id);
        $materiel->update([
            'modele_id' => $request->modele_id,
            'contrat_id' => $request->contrat_id,
            'poste_id' => $request->poste_id,
            'fornisseur_id' => $request->fornisseur_id,
            'type_id' => $request->type_id
        ]);
        return redirect()->route('materiels')->with([
            'msg' => "le materiel" . $request->id . "est bien modifie"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\materiels  $materiels
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $materiel = materiel::find($id);
        $materiel->delete();
        return redirect()->back()->with([
            'msg' => 'le materiel est bien supprimé'
        ]);
    }
}