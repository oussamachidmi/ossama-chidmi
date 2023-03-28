<?php

namespace App\Http\Controllers;

use App\Models\panne;
use Illuminate\Http\Request;

class PanneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        panne::create([
            'materiel_id' => $request->materiel,
            'description' => $request->description,
            'emp_id' => auth()->user()->id
        ]);

        return redirect()->back()->with([
            'msg' => 'votre reclamation est bien recu'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\panne  $panne
     * @return \Illuminate\Http\Response
     */
    public function show(panne $panne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\panne  $panne
     * @return \Illuminate\Http\Response
     */
    public function edit(panne $panne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\panne  $panne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, panne $panne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\panne  $panne
     * @return \Illuminate\Http\Response
     */
    public function destroy(panne $panne)
    {
        //
    }
}