<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;
use App\Models\User;
use App\Models\service;
use App\Models\Poste;



class userController extends Controller
{
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeuser(Request $request)
    {
        if($request->has('profile_photo_path')){
            $file=$request->profile_photo_path;
            $img_name=time()."-".$file->getClientOriginalName();
            // $img_name="ss";
            $file->move(public_path('storage')."/profile-photos",$img_name);
            //publicpath fonction qui fait la creation de la dossier uploads dans le dossier public si il n'existe pas
        }
         User::create([
             'name'=>$request->name,
             'email'=>$request->Email,
             'adress' => $request->adress,
             'telephone' => $request->telephone,
             'password'=>hash::make($request->password),
             'role'=>$request->role,
             'profile_photo_path'=>$img_name,
             'service_id'=>$request->service_id
         ]);

         $msg=$request->name." est bien ajouter" ;
      
        return redirect('admin/users/0')->with([
            'msg'=> $msg
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {   $user=user::find($id);
        $services=service::all();
        return view('profil')->with([
            'user'=>$user,'services'=>$services
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function updateuser(Request $request, $id)
    {   
        $user = User::find($id);
        if ($request->has('profile_photo_path')) {
            $file = $request->profile_photo_path;
            $img_name = time() . "-" . $file->getClientOriginalName();
            // $img_name="ss";
            $file->move(public_path('storage') . "/profile-photos", $img_name);
            
            //publicpath fonction qui fait la creation de la dossier uploads dans le dossier public si il n'existe pas
        }
        else $img_name=$user->profile_photo_path;
        
        $user->update([
            'name'=>$request->name,
            'adress'=>$request->adress,
            'mail'=>$request->mail,
            'telephone'=>$request->telephone,
            'password'=> hash::make($request->password),
            'role'=>$request->role,
            'service'=>$request->service,
             'profile_photo_path'=>$img_name
        ]);

        return redirect('admin/profile/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {    
        $user = User::find($id);
   
        $user->delete();
        return redirect()->route('users',$user->service_id)->with([
            'msg' => "l'utulisateur ". $user->name." est bien supprimé"
        ]);
    }
}   