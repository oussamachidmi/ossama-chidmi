@extends('adminlte::page')

@section('title')
    postes
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
    service
@endsection


@section('content')
    @if (session()->has('msg'))
        <div style="width: 90%!important;background: rgba(31, 168, 35, 0.6)!important;"
            class="mx-auto alert alert-success alert-dismissible bg-opacity-75 fade show ">
            {{ session()->get('msg') }}
        </div>
    @endif

    <!-- /.card-tools -->


    <!-- /.card-header -->
    <!-- /.card-tools 2 -->







    <!-- end /.card-tools -->


    {{-- <div class="card-body"> --}}

    @foreach ($salles as $salle)
        <div class="card card-outline card-primary my-5">
            <div class="card-header  active">
                <b> Salle </b> &nbsp: &nbsp{{ $salle->id }}
            </div>
            <div class="card-body d-flex align-content-end flex-wrap px-md-5">
                @foreach ($salle->postes as $poste)
                    <div class="mx-2   rounded-top ">
                        <div style="overflow:hidden" class="small-box rounded-top">
                            <div class="info-box bg-info my-0 rounded-0 ">
                                <span class="info-box-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 740 612">
                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path
                                            d="M400 32C426.5 32 448 53.49 448 80V336C448 362.5 426.5 384 400 384H266.7L277.3 416H352C369.7 416 384 430.3 384 448C384 465.7 369.7 480 352 480H96C78.33 480 64 465.7 64 448C64 430.3 78.33 416 96 416H170.7L181.3 384H48C21.49 384 0 362.5 0 336V80C0 53.49 21.49 32 48 32H400zM64 96V320H384V96H64zM592 32C618.5 32 640 53.49 640 80V432C640 458.5 618.5 480 592 480H528C501.5 480 480 458.5 480 432V80C480 53.49 501.5 32 528 32H592zM544 96C535.2 96 528 103.2 528 112C528 120.8 535.2 128 544 128H576C584.8 128 592 120.8 592 112C592 103.2 584.8 96 576 96H544zM544 192H576C584.8 192 592 184.8 592 176C592 167.2 584.8 160 576 160H544C535.2 160 528 167.2 528 176C528 184.8 535.2 192 544 192zM560 400C577.7 400 592 385.7 592 368C592 350.3 577.7 336 560 336C542.3 336 528 350.3 528 368C528 385.7 542.3 400 560 400z" />
                                    </svg></i>
                                </span>
                                <div class="info-box-content">
                                    @if ($poste->user != null)
                                        <span class="info-box-number">{{ $poste->user->name }}</span>
                                    @else
                                        <span class="info-box-number">sans utulisateur</span>
                                    @endif
                                    <span class="info-box-text">la date d'installation :
                                        {{ date('d-m-yy', strtotime($poste->created_at)) }}</span>
                                    <span class="info-box-text">nombre du materiel :
                                        {{ count($poste->materiels)}}</span>
                                        {{-- @if(!count($poste->materiels)) --}}
                                    
                                    {{-- @endif --}}
                                </div>
                               
                            </div>
                            <div style="overflow: hidden; height:100px!imporant;"
                                class="small-box-footer p-0 rounded-bottom">
                                <div class="row">
                                    <div class="w-75 my-0 h-110">
                                        <a href="{{route('poste',$poste->id)}}" class="btn btn-primary w-100 h-100  rounded-0 edit"
                                            >
                                   voir details </a>

                                    </div>
                                    <div class="w-25  my-0">
                                        <form id="{{ $poste['id'] }}" action="{{ route('deleteposte', $poste['id']) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button
                                            onClick="
                                                                                                    event.preventDefault(); if(confirm('u sure ?')) document.getElementById({{ $poste->id }}).submit()"
                                            type="submit" class="btn btn-danger w-100 h-100  rounded-0"><i
                                                            class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-plus"></i> &nbsp ajouter un poste
                </button>
            </div>
        </div>
    @endforeach

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ajouter un modele</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 

                <form method="POST" action="{{ route('storeposte') }}">
                        @csrf
                        
                        <label class="mb-3" for="inputGroupSelect01">l'utilusateur</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><a href="{{route('users',0)}}"><i class="fa fa-plus"></i></a></label>
                                </div>

                                @if ($service != 'all')
                                    <select name="user" class="custom-select" id="inputGroupSelect01">
                                        <optgroup label="{{ $service->name }}">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                @else
                                    
                              
                                        <select name="user" class="custom-select" id="inputGroupSelect01">



                                            <option value="aucune" disabled>aucune employe et disponible pour une autre
                                                poste</option>

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
                                                    <label class="input-group-text"
                                                        for="inputGroupSelect01">{{ $type->name }}</label>
                                                </div>
                                                <select name="{{ $type->name }}" class="custom-select"
                                                    id="inputGroupSelect01">
                                                    <option value="0" selected>materiel disponible</option>
       
                                                    @foreach ($type->modeles as $modele)
                                                        <optgroup label="{{$modele->libelle}}">
                                                    @foreach ($modele->materiels as $materiel)
                                                        @if ($materiel->poste_id == null)
                                                            <option value="{{ $materiel->id }}">
                                                                {{ $materiel->modele->libelle }}</option>
                                                        @endif
                                                    @endforeach
                                                    </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">sortie</button>
                                <button type="submit" value="Submit" class="btn btn-primary">Enregistrement</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    


    {{-- ############################# --}}


    <script src="/plugins/jquery/jquery.min.js" defer></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js" defer></script>
    <!-- DataTables  & Plugins -->
    <script src="/plugins/datatables/jquery.dataTables.min.js" defer></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js" defer></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js" defer></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js" defer></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js" defer></script>
    <script src="/plugins/jszip/jszip.min.js" defer></script>
    <script src="/plugins/pdfmake/pdfmake.min.js" defer></script>
    <script src="/plugins/pdfmake/vfs_fonts.js" defer></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.min.js" defer></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js" defer></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" defer></script>


    {{-- <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example1').DataTable();
            table.on("click", ".edit", function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }
                var data = table.row($tr).data();
                console.log(data);
                $('#ftype').val(data[1]);
                $('#fmodele').val(data[2]);
                $('#fcontrat').val(data[3]);
                $('#fposte').val(data[4]);
                let st = data[0];
                console.log(st);
                $('#editForm').attr('action', "/admin/updatemateriel/" + data[0]);
                $('#editModal').modal("show");
            });

        });
    </script> --}}
    {{-- <form method="POST" action="{{ route('storeposte') }}">
                        @csrf
                        
                        <label class="mb-3" for="inputGroupSelect01">l'utilusateur</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">user</label>
                                </div>

                                @if ($service != 'all')
                                    <select name="user" class="custom-select" id="inputGroupSelect01">
                                        <optgroup label="{{ $service }}">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                @else
                                    @if (!count($users))
                                        <select name="user" class="custom-select" id="inputGroupSelect01">


                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                            </optgroup>

                                        </select>
                                    @else
                                        <select name="user" class="custom-select" id="inputGroupSelect01">



                                            <option value="aucune" disabled>aucune employe et disponible pour une autre
                                                poste</option>

                                        </select>
                                    @endif
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
                                                    <label class="input-group-text"
                                                        for="inputGroupSelect01">{{ $type->name }}</label>
                                                </div>
                                                <select name="{{ $type->name }}" class="custom-select"
                                                    id="inputGroupSelect01">
                                                    <option value="0" selected>materiel disponible</option>
       
                                                    @foreach ($type->modeles as $modele)
                                                        <optgroup label="{{$modele->libelle}}">
                                                    @foreach ($modele->materiels as $materiel)
                                                        @if ($materiel->poste_id == null)
                                                            <option value="{{ $materiel->id }}">
                                                                {{ $materiel->modele->libelle }}</option>
                                                        @endif
                                                    @endforeach
                                                    </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">sortie</button>
                                <button type="submit" value="Submit" class="btn btn-primary">Enregistrement</button>
                    </form> --}}
@endsection
