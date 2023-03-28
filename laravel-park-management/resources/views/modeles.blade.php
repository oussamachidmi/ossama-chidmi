@extends('adminlte::page')


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
@section('title')
    service
@endsection


@section('content_header')
    gestion de materiels
@endsection


@section('content')
    @if (session()->has('msg'))
        <div style="width: 100%!important;background: rgba(31, 168, 35, 0.6)!important;"
            class="mx-auto alert alert-success alert-dismissible bg-opacity-75 fade show ">
            {{ session()->get('msg') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title">vouz pouvez gerer tout les modeles</h3>
                        <!-- Button trigger modal -->
                        <div class="btn-group dropstart float-right">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                table
                            </button>
                            <ul class="dropdown-menu">
                                @if (Route::current()->getName() != 'modeles')
                                    <li><a class="dropdown-item" href="{{ route('modeles') }}">modeles</a></li>
                                @endif
                                @if (Route::current()->getName() != 'marques')
                                    <li><a class="dropdown-item" href="{{ route('marques') }}">marques</a></li>
                                @endif
                                @if (Route::current()->getName() != 'fornisseur')
                                    <li><a class="dropdown-item" href="{{ route('fornisseurs') }}">fornisseur</a></li>
                                @endif
                                @if (Route::current()->getName() != 'materiels')
                                    <li><a class="dropdown-item" href="{{ route('materiels') }}">materiels</a></li>
                                @endif
                                @if (Route::current()->getName() != 'pieces')
                                    <li><a class="dropdown-item" href="{{ route('materiels') }}">pieces</a></li>
                                @endif

                            </ul>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ajouter un modele</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('storemodele') }}">
                                            @csrf


                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">libelle</label>
                                                <input type="text" name="libelle" class="form-control"
                                                    id="validationDefault01" name="libelle" placeholder="libelle">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="mb-3" for="inputGroupSelect01">selectionner
                                                        l'annne</label>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text"
                                                                    for="inputGroupSelect01">l'annee</label>
                                                            </div>
                                                            <input name="year" class="form-control" type="number"
                                                                min="1900" max="2099" step="1" value="2022" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="mb-3" for="inputGroupSelect01">selectionner la
                                                        marque</label>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text"
                                                                    for="inputGroupSelect01">marque</label>
                                                            </div>
                                                            <select name="marque_id" class="custom-select"
                                                                id="inputGroupSelect01">
                                                                <option value="aucune" selected disabled>selectionner la
                                                                    marque</option>
                                                                @foreach ($marques as $marque)
                                                                    <option value="{{ $marque->id }}">
                                                                        {{ $marque->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row mx-2">
                                                    <div class="col-14">
                                                        <label class="mb-3" for="inputGroupSelect01">selectionner
                                                            la type</label>
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <label class="input-group-text"
                                                                        for="inputGroupSelect01">type</label>
                                                                </div>
                                                               <select name="type" class="custom-select"
                                                                    id="inputGroupSelect01" required>
                                                                   @foreach($types as $type)
                                                                     <option value="{{ $type->id }}">
                                                                        {{ $type->name }}
                                                                    </option>
                                                                   @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div id="addcara" class="w-100"></div>
                                    </div>

                                       
                                    <div class="modal-footer">
                                         <button type="button" class="btn btn-light float-left"
                                                onclick="add_fields()">ajouter un caracter</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">sortie</button>
                                        <button type="submit" value="Submit" class="btn btn-primary">Enregistrement</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ##################################secoundmodal################################################### --}}

                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">modifier le modele</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="editForm" action="/">
                                            @csrf


                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">libelle</label>
                                                <input type="text" name="libelle" class="form-control" id="fname"
                                                    name="libelle" placeholder="libelle" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="mb-3" for="inputGroupSelect01">selectionner
                                                        l'annne</label>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text"
                                                                    for="inputGroupSelect01">l'annee</label>
                                                            </div>
                                                            <input name="year" class="form-control" type="number"
                                                                min="1900" max="2099" step="1" id="fyear" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="mb-3" for="inputGroupSelect01">selectionner la
                                                        marque</label>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text"
                                                                    for="inputGroupSelect01">marque</label>
                                                            </div>
                                                            <select name="marque_id" class="custom-select"
                                                                id="inputGroupSelect01" required>
                                                                <option value="aucune" selected disabled>selectionner la
                                                                    marque</option>
                                                                @foreach ($marques as $marque)
                                                                    <option value="{{ $marque->id }}">
                                                                        {{ $marque->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row mx-2">
                                                    <div class="col-14">
                                                        <label class="mb-3" for="inputGroupSelect01">selectionner
                                                            la type</label>
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <label class="input-group-text"
                                                                        for="inputGroupSelect01">type</label>
                                                                </div>
                                                                <select name="type" class="custom-select"
                                                                    id="inputGroupSelect01" required>
                                                                   @foreach($types as $type)
                                                                     <option value="{{ $type->id }}">
                                                                        {{ $type->name }}
                                                                    </option>
                                                                   @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             @foreach ($caracters->where('id',1)->all() as $caracter)

                                                <div class="mb-3 d-block my-4">

                                                <label for="validationDefault01">libelle</label>
                                                <input type="text" name="libelle" class="form-control" id="fcara"
                                                 name="libelle" placeholder="libelle" value="{{$caracter->libelle}}" required>
                                                <label for="validationDefault01">libelle</label>
                                                <input type="text" name="libelle" class="form-control" id="fcara"
                                                    name="libelle" placeholder="libelle" value="{{$caracter->unite}}"required>
                                            </div>
                                                 
                                             @endforeach
                                 

                                            

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">sortie</button>
                                        <button type="submit" value="Submit" class="btn btn-primary">Enregistrement</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- #####################################end of the secound################################################ --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>id</th>
                                    <th>name</th>
                                    <th>année de sortie</th>
                                    <th>type</th>
                                    <th>marque</th>
                                    <th>caractristiques</th>
                                    <th>qantite</th>
                                    <th style="width: 10%!important">modification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modeles as $modele)
                                    <tr>
                                        <td>{{ $modele->id }}</td>
                                        <td>{{ $modele->libelle }}</td>
                                        <td>{{ $modele->year }}</td>
                                        <td>{{ $modele->type->name }}</td>
                                        <td>{{ $modele->marque->name }}</td>
                                        <td>@foreach($modele->caracters as $cara )
                                            <div>
                                                {{ $cara->libelle }} :
                                                {{ $cara->unite }}
                                            </div>
                                           @endforeach
                                        </td>
                                        <td>{{ count($modele->materiels) }}</td>
                                        <td style="width: 10%!important">
                                            <div class="row">
                                                <div class="col ml-1">
                                                    <form id="{{ $modele->id }}"
                                                        action="{{ route('deletemodele', $modele->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button
                                                        onClick="
                                                                                                                                            event.preventDefault(); if(confirm('u sure ?')) document.getElementById({{ $modele->id }}).submit()"
                                                        type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </div>
                                                {{-- ##################################################################################### --}}
                                                <div class="col mr-1">
                                                    <button type="button" class="btn btn-warning float-right edit"
                                                        data-bs-toggle="modal" data-bs-target="#editmodal">
                                                        <i class="fa fa-pen"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>année de sortie</th>
                                    <th>type</th>
                                    <th>marque</th>
                                    <th>caractristiques</th>
                                    <th>qantite</th>
                                    <th style="width: 10%!important">modification</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fa fa-plus"></i> &nbsp ajouter un modele
                        </button>

                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
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
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js" defer></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="../../dist/js/demo.js" defer></script> --}}
    <!-- Page specific script -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script defer>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


       <script type="text/javascript" defer>
        var info = 0;

        function add_fields() {
            info++;
            var objTo = document.getElementById('addcara');
            console.log(objTo);

            var divtest = document.createElement("div");
            divtest.innerHTML = '<div class="form-group"><label class="col-lg-3 control-label">caracter ' + info +
                '</label><div class="col-lg-9"> <button type="button" class="btn btn-danger text-dark float-right my-2 py-0" onclick="delete_fields()">X</button> <p> libelle <input type="text"  class="form-control" name="caraceters[]" required/> </p> <p> valeur : <input type="text"  class="form-control" name="caraceters[]" required/></p></div></div>';
            objTo.appendChild(divtest)
        }

        function delete_fields() {
            //    console.log(event.target.parentElement.romove());
            info--;
            event.target.parentElement.parentElement.remove();
        }
            </script>

@endsection
