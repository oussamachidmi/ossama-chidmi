<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use App\Models\User;
use App\Models\Salle;
use App\Models\modele;
use App\Models\poste;
use App\Models\Service;

use Illuminate\Http\Request;

class dashcontroller extends Controller
{

    public function users($id)
    {    
        $service=service::all(); 
        if ($id) {

            $users = user::where('service_id', $id)->paginate(9);
        } else if ($id == 0) {

            $users = User::paginate(9);
            // $service=Salle::find(1)->service->name; 
        }
        return view('users')->with([
            'users' => $users , 'services'=>$service
        ]);
    }


    public function adduser()
    {
        $services = Service::all();
        return view('auth.register1')->with([
            'services' => $services
        ]);
    }

    public function addmateriel()
    {
    }


    public function resetPassword()
    {
        //    $request=User::where('id',$id);
        return view('auth.reset-password');
    }

    public function profile()
    {
        return view('profile.update-profile-information-form');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function post($id)
    {   
        if($id==0){
           $post = auth()->user()->poste;
        }
        else{      
            $post = Poste::find($id);
        }
        return view('poste')->with([
            'post'=> $post
        ]);
    }


    


}