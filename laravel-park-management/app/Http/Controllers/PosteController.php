<?php

namespace App\Http\Controllers;

use App\Models\poste;
use App\Models\service;
use App\Models\salle;
use App\Models\user;
use App\Models\type;
use Illuminate\Support\Facades\DB;
use App\Models\materiel;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showpostes($id)
    {     
         $service = service::where('id',$id)->first()->name;
        if ($service != 'all') {
            $service_id = service::where('id', $id)->first()->id;
            $users = DB::select(DB::raw("select * from `users` where `service_id`=$service_id and `id` not in (select `user_id` from `postes` where `user_id` is not null)"));
            $salles = service::where('id', $service_id)->get()[0]->salles;
            $types = type::all();
        } else {

            $users = DB::select(DB::raw("select * from `users` where `id` not in (select `user_id` from `postes` where `user_id` is not null)"));
          
            // select * from `users` where `id` not in (select `user_id` from `postes` where `user_id` is not null);
            $salles = salle::all();
            $types = type::all();
            $services1 = service::all();
        }
        
        $salles=service::where('id',$id)->get()[0]->salles;
        $service=service::where('id',$id)->first();
        // $postes=Poste::where('salle_id',$salles);
        // dd($salles);
        
        return view('materiels.postes')->with([
             'salles'=>$salles ,
            'service' => $service, 'users' => $users, 'types' => $types
        ]);
    } 

    
      public function showpostesall()
    {   
        $salles=salle::all();
        // $service=service::where('id',$id)->get();
        // $postes=Poste::where('salle_id',$salles);
        // dd($salles);
        return view('materiels.postes')->with([
             'salles'=>$salles  , 'service'=>'all'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($service)
    {    
        if($service!='all'){
        $service_id=service::where('name',$service)->get('id')[0]->id;
        $users= DB::select(DB::raw("select * from `users` where `service_id`=$service_id and `id` not in (select `user_id` from `postes` where `user_id` is not null)"));
        if(count($users)) $users=[];
        dd($users);
        $salles = service::where('id',$service_id)->get()[0]->salles;    
        $types = type::all();
        return view('forms.addposte')->with([
                'service'=>$service , 'users'=>$users , 'salles'=>$salles ,'types'=>$types
            ]);
        }
        else {
            
            $users = DB::select(DB::raw("select * from `users` where `id` not in (select `user_id` from `postes` where `user_id` is not null)"));
            // select * from `users` where `id` not in (select `user_id` from `postes` where `user_id` is not null);
            
            $salles=salle::all();
            $types = type::all();
            $services1=service::all();

            return view('forms.addposte')->with([
                'service' => $service, 'users' => $users, 'salles' => $salles, 'types' => $types , 'services1'=>$services1
            ]);
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        Poste::create([
            'user_id'=>$request->user,
            'salle_id'=>$request->salle
        ]);
        
        $poste_id=Poste::all()->last()->id;
         
        // dd($poste_id);

        foreach ($request->all() as $key =>$value) {
            if ($key == '_token' or $key == "user" or $key == "salle"){
                $var=1;
            }
            else{  
                   if($value!=0)
                   {
                       $materiel=materiel::where('id',$value);
                    //    dd($materiel->get());
                   $materiel->update([
                       'poste_id'=> $poste_id
                   ]);}
            }
        }
         

        $service_id=User::where('id',$request->user)->first()->service_id;
        
        $users=Service::where('id', $service_id)->first()->users;
        
        
        $msg = 'le poste '.$poste_id . 'est bien ajouter dans la salle' . $request->salle;

        $path= 'admin/postes/' . $service_id;

        return redirect($path)->with([
            'msg' => $msg
        ]);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */

      
    public function delete($id)
    {  
    
        $post = Poste::find($id);
        $post->delete();
        
        $us=user::all();
      
        $users = Service::where('id', $us->service_id)->first()->users;
        return redirect()->back()->with([
            'msg'=>'le poste est bien supprimé', 'users'=>$users
        ]);
    }
} 