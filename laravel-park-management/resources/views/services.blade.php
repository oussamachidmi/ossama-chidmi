@extends('adminlte::page')

@section('title')
    services
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
    services
@endsection
@section('content')
  @if (session()->has('msg'))
        <div style="width: 100%!important;background: rgba(31, 168, 35, 0.6)!important;"
            class="mx-auto alert alert-success alert-dismissible bg-opacity-75 fade show ">
            {{ session()->get('msg') }}
        </div>
    @endif
    <div class="card card-solid">

        <div style="margin:0 10 10 10" class="card-body">
            <div class="row">
                <div class="col-md-4 w-25 px-6">

                    <div style="width:80%!important ; margin-bottom:40px" class="card card-widget widget-user-2">

                        <div class="widget-user-header bg-info rounded-0">
                            <h3 class="">All</h3>
                            {{-- <h5 class="widget-user-desc">Etage:{{$service->etage_bureau}}</h5> --}}
                        </div>
                        <div class="card-footer p-0">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('users', 0) }}" class="nav-link">
                                        employees <span
                                            class="float-right badge bg-primary">{{ \App\Models\User::count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('showpostesall') }}" class="nav-link">
                                        postes de travaille <span class="float-right badge bg-info">5</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        tickets <span class="float-right badge bg-success">12</span>
                                    </a>
                                </li>
                        </div>
                    </div>
                </div>

                @foreach ($services as $service)
                    <div class="col-md-4 w-25 px-6">
                       
                        <div style="width:80%!important ; margin-bottom:40px" class="card card-widget widget-user-2">

                            <div class="widget-user-header bg-info rounded-0">
                                <h3 class="text-dark">{{ $service->name }}</h3>
                                <div class="float-right">
                                    @foreach($service->salles as $salle)
                                        <span class="badge badge-pill badge-primary">{{$salle->id}}</span>
                                    @endforeach
                                </div>
                                {{-- <h5 class="widget-user-desc">Etage:{{$service->etage_bureau}}</h5> --}}
                            </div>
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('users', $service->id) }}" class="nav-link">
                                            employees <span class="float-right badge bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('showpostes', $service->id) }}" class="nav-link">
                                            postes de travaille <span class="float-right badge bg-info">5</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            tickets <span class="float-right badge bg-success">12</span>
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                          <form id="{{ $service['id'] }}" action="{{ route('deleteservice', $service['id']) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a  style="color:red!important"
                                            onClick="
                                            event.preventDefault(); if(confirm('u sure ?')) document.getElementById({{ $service->id }}).submit()"
                                            type="submit"   class="nav-link" >supprimer</a>
                                    {{-- <a style="color:red!important" href="{{route('deleteservice',$service->id)}}" class="nav-link">
                                        supprimer <span class="float-right badge bg-success"></span>
                                    </a> --}}
                                </li>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-plus"></i> &nbsp ajouter un service
                </button>
        </div>
        {{-- ############################# --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ajouter une fornisseur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('storeservice') }}">
                            @csrf

                            <div class="mb-3 d-block my-4">
                                <label for="validationDefault01">Nom de service</label>
                                <input type="text" class="form-control" id="validationDefault01" name="name"
                                    placeholder="name" required>
                            </div>


                            
                            <div class="form-group my-8">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">sortie</button>
                                    <button type="submit" value="Submit" class="btn btn-primary">Enregistrement</button>
                        </form>
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
