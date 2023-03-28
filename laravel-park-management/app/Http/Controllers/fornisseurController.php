<?php

namespace App\Http\Controllers;

use App\Models\fornisseur;
use App\Models\marque;
use Illuminate\Http\Request;

class fornisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornisseurs = fornisseur::all();
        return view('fornisseur')->with([
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
        fornisseur::create([
            'name' => $request->name,
            'ville' => $request->name,
            'telephone' => $request->name,
            'mail' => $request->mail
        ]);

        return redirect('admin/fornisseurs')->with([
            'msg' => 'le fornisseur'. $request->name.'et bien ajouté'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fornisseur  $fornisseur
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
     * @param  \App\Models\fornisseur  $fornisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fornisseur = fornisseur::find($id);
        $fornisseur->update([
            'name' => $request->name,
            'ville' => $request->name,
            'telephone' => $request->name,
            'mail' => $request->mail
        ]);
        return redirect()->route('fornisseurs')->with([
            'msg' => "le fornisseur " . $request->name . "est bien modifie"
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fornisseur  $fornisseur
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $fornisseur = fornisseur::find($id);
        $fornisseur->delete();
        return redirect()->route('fornisseurs')->with([
            'msg' => 'le fornisseur est bien supprimé'
        ]);
    }
}