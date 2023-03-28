<?php

namespace App\Http\Controllers;
use App\models\Service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showser()
    {
        $services=Service::All();
        
        return view('services')->with([
            'services'=>$services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addservice()
    {
        return view('addservice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeservice(Request $request)
    {
        //
        Service::create([
            'name' => $request->name,
            
        ]);

        $msg = "le service ". $request->name . " est bien ajouter";

        return redirect()->back()->with([
            'msg' => $msg
        ]);
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
    public function delete($id)
    {
        $service = service::find($id);
        $service->delete();
        $services = Service::All();

        return redirect()->back()->with([
            'services' => $services , 'msg' => 'le service est bien supprimer'
        ]);
    }
}