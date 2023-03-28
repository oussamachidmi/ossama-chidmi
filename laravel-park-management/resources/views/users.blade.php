@extends('adminlte::page')

@section('title')
    user
@endsection

@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
@endsection

@section('content_header')
    profil page
@endsection
@section('content')
    @if (session()->has('msg'))
         <div style="width: 90%!important;background: rgba(31, 168, 35, 0.6)!important;"
            class="mx-auto alert alert-success alert-dismissible bg-opacity-75 fade show ">
            {{ session()->get('msg') }}
        </div>
    @endif
    {{-- <div style="display:flex;flex-direction:row;flex-wrap:wrap;margin:100px auto 100px auto; width:90%"> --}}
    <div class="card card-solid">
        {{-- <h1>{{ $msgs }}</h1> --}}
        <div class="card-body pd-0">
            <div class="row">

                @foreach ($users as $user)
                    @if ($user->email != auth()->user()->email)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $user->service->name }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ $user->name }}</b></h2>
                                            <p class="text-muted text-sm"><b>About: </b> {{ $user->email }}</p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span> Address: {{$user->adress}}
                                                    </li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span> Phone #: {{$user->telephone}}
                                                    52</li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ asset('storage') . '/profile-photos' . '/' . $user->profile_photo_path }}"
                                                alt="user-avatar" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                            <span class="w-50 my-0">
                                                <form id="{{ $user['id'] }}"
                                                    action="{{ route('deleteuser', $user['id']) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button
                                                    onClick="
                                                                event.preventDefault(); if(confirm('u sure ?')) document.getElementById({{ $user->id }}).submit()"
                                                    type="submit" class="btn btn-warning btn-sm"> <i
                                                        class="fas fa-trash"></i>
                                                </button>
                                            </span>
                                        </a>
                                        <a href="{{route('profile',$user->id)}}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> View Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <div  class="float-left" style="width: 200px!important ; display:block; margin:auto; margin-top:50px ">
                {{ $users->links() }}</div>
               <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-plus"></i> &nbsp ajouter une employeur
                </button>
        </div>
    </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ajouter une fornisseur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    

<form method="post" action="{{route('struser')}}" enctype="multipart/form-data">
  @csrf
      <div class="mb-3 d-block my-4">
        <label for="validationDefault01">Nom complet</label>
        <input type="text" class="form-control" id="validationDefault01" name="name" placeholder="name" required>
      </div>
      <div class="mb-3 my-4">
        <label for="validationDefaultUsername d-block">Email</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
          </div>
          <input type="text" class="form-control" name="Email" id="validationDefaultUsername" placeholder="email" aria-describedby="inputGroupPrepend2" required>
        </div>
        <div class="mb-3 d-block my-4">
            <label for="validationDefault01">password</label>
            <input type="password" class="form-control" id="validationDefault01" name="password" placeholder="name" required>
          </div>

        <div class="mb-3  my-4">
    <label  for="validationDefaultUsername d-block">Role</label>
            <select  id="role" name="role" class="custom-select" required>
              <option value="">Role</option>
              <option value="adm">administrateur</option>
              <option value="tec">technicien</option>
              <option value="log">logistique</option>
              <option value="emp">employé</option>
            </select>
            <div class="invalid-feedback">Example invalid custom select feedback</div>
        </div> 

        <div id="services" style="display:none" class="mb-3 col-md-6  my-4">
          <label for="validationDefaultUsername d-block">service</label>
        <select  name="service_id" class="custom-select">
              <option value="1">service</option>
              @foreach($services as $service)
              <option value="{{$service->id}}">{{$service->name}}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">Example invalid custom select feedback</div>
        </div>

        <div  style="margin-top:30px;" class="mb-3 col-md-6  my-8">
        <input type="file" name="profile_photo_path" class="custom-file-input" id="validatedCustomFile" required>
        <label class="custom-file-label" for="validatedCustomFile">photo de profile</label>
        <div class="invalid-feedback">Example invalid custom file feedback</div>
      </div>
   
      
    <div class="form-group my-8"> 

        <div class="modal-footer">
  
    <button class="btn btn-primary" type="submit">enregistrer</button> 
 </div>
  </form>

</div>

<script>
  function showrole(){
    if(document.getElementById('role').value=="emp"){
    document.getElementById('services').style.display="block";
  // if(document.getElementById('role').value=="log"){
  //   document.getElementById('services').value="2";
  // }
  }
  else 
  document.getElementById('services').style.display="none";
  }



     document.getElementById('role').addEventListener("change", showrole);

</script>
                    </div>

                    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous" defer>
    </script>
    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
@endsection
