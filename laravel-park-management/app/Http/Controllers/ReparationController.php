<?php

namespace App\Http\Controllers;

use App\Models\reparation;
use Illuminate\Http\Request;

class ReparationController extends Controller
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
        reparation::create([
            'id_panne' => $request->panne,
            'id_technicien' => auth()->user()->id,
        ]);

        return redirect()->back()->with([
            'msg' => 'votre reparation est bien recu'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function show(reparation $reparation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function edit(reparation $reparation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reparation $reparation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function destroy(reparation $reparation)
    {
        //
    }
}