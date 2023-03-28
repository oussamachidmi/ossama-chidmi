<?php

namespace App\Http\Controllers;

use App\Models\modele;
use App\Models\marque;
use App\Models\type;
use App\Models\caracter;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeles=Modele::all();
        $marques=marque::all();
        $types=type::all();
        $caracters=caracter::all();
        return view('modeles')->with([
            'modeles'=>$modeles ,'marques'=>$marques ,'types'=>$types ,'caracters'=> $caracters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $marques=Marque::all();
        return view('forms.addmodele')->with([
            'marques'=>$marques
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
        // dd($request);
        Modele::create([
            'libelle' => $request->libelle,
            'marque_id' => $request->marque_id,
            'year' => $request->year,
            'type' => $request->type
        ]);
        
        return redirect('admin/modeles')->with([
            'msg'=>'le modele et bien ajouté'
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function show(modele $modele)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function edit(modele $modele)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {  
        
        $modele=modele::find($id);
        $modele->update([
            'libelle' => $request->libelle,
            'year' => $request->year,
            'type' => $request->type,
            'marque_id'=>$request->marque_id
        ]);
        return redirect()->route('modeles')->with([
            'msg' => "le modele ". $request->name ."est bien modifie"
        ]);
    } 
        
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $modele = modele::find($id);
        $modele->delete();
        return redirect()->route('modeles')->with([
            'msg' => 'le modele est bien supprimé'
        ]);
    }
}