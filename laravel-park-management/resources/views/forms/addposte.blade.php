@extends('adminlte::page')

@section('title')
    poste
@endsection

@section('content_header')
    service {{ $service }}
@endsection
@section('content')
    @if (session()->has('msg'))
        <div class="mx-auto col-8 alert alert-success alert-dismissible bg-opacity-50 fade show ">{{ session()->get('msg') }}
        </div>
    @endif

    <div class="card w-75 mx-auto my-5">
        <div class="card-header">
            <h3 class="card-title">ajouter un poste au service {{ $service }}</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" action="{{route('storeposte')}}">
                  @csrf
                {{-- <div class="form-group">
                </div> --}}
                <label class="mb-3" for="inputGroupSelect01">l'utilusateur</label>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">user</label>
                        </div>
                        @if($service!='all')
                        <select name="user" class="custom-select" id="inputGroupSelect01">
                            <optgroup label="{{$service}}">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            </optgroup>
                        </select> 
                        @else
                            <select name="user" class="custom-select" id="inputGroupSelect01">
                           
                             
                                 @foreach ($users as $user)
                                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                                 @endforeach
                                </optgroup>
               
                        </select>
                        @endif
                    </div>
                    <label class="mb-3" for="inputGroupSelect01">selectinne la salle</label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">salle</label>
                            </div>
                            <select name="salle" class="custom-select" id="inputGroupSelect01">
                                <option selected>salle</option>
                                @foreach ($salles as $salle)
                                    <option value="{{ $salle->id }}">{{ $salle->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label class="mb-3" for="">affectation des materiels</label>
                        <div class="row">
                            @foreach ($types as $type)
                                <div class="form-group col-lg-4 col-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">{{$type->name}}</label>
                                        </div>
                                        <select name="{{$type->name}}" class="custom-select" id="inputGroupSelect01">
                                            <option value="0" selected>materiel disponible</option>
                                             
                                            @foreach ( $type->materiels as $materiel) 
                                                @if($materiel->poste_id==NULL){
                                                    <option value="{{ $materiel->id }}">{{ $materiel->modele->libelle }}</option>
                                                }
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <input class="btn btn-primary float-right mx-2 " type="submit" value="Submit">
            </form>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
@endsection
