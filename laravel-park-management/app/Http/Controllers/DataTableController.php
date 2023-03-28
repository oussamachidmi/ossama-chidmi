<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Marque;
use App\Models\modele;
use DataTables;

class DataTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexusers()
    {
        return view('datatable.list');
    }
    public function indexmarques()
    {
        return view('datatable.list');
    }
    public function datatablemodeles()
    {
        return view('datatable.list');
    }
    public function getusers()
    {
        return datatables()->of(User::query())->make(true);
    }
    public function getmarques()
    {
        return datatables()->of(Marque::query())->make(true);
    }
    public function getmodeles()
    {

        return DataTables::of(modele::query())
            ->addColumn('modification',
            function (modele $modele) {
                return view('btn')->with([
                    'var'=>$modele
                ]);
            })
            ->rawColumns(['modification'])
            ->editColumn('marque_id', function (modele $modele) {
                return $modele->marque->name;
            })
            ->toJson();

      
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}