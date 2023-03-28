<?php

namespace App\Http\Controllers;

use App\Models\marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marques=Marque::all();
        return view('marques')->with([
            'marques'=>$marques,'modeles'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.addmodele');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Marque::create([
            'name' => $request->name,
            'payes' => $request->pays,
      
        ]);

        return redirect('admin/marques')->with([
            'msg' => 'la marque '.$request->name.' et bien ajouté'
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(marque $marque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit(marque $marque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $marque = marque::find($id);
        $marque->update([
            'name' => $request->name,
            'pays' => $request->pays
        ]);
        return redirect()->route('marques')->with([
            'msg' => "la marque " . $request->name . "est bien modifie"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $modele = marque::find($id);
        $modele->delete();
        return redirect()->route('marques')->with([
            'msg' => 'la marque '. $modele->name.' est bien supprimé'
        ]);
    }
}