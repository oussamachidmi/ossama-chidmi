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
    materiels
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
                        <h3 class="card-title">vouz pouvez gerer tout les materiels</h3>
                        <!-- Button trigger modal -->
                        <div class="btn-group dropstart float-right">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                les autres tables
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
                                        <h5 class="modal-title" id="exampleModalLabel">ajouter une materiels</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="storeform" action="{{ route('storemateriel') }}">
                                            @csrf


                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">model de materiel</label>
                                                <select name="modele_id" id="model_id" class="custom-select">
                                                    @foreach ($types as $type)
                                                        <optgroup label="{{ $type->name }}">
                                                            @foreach ($type->modeles as $modele)
                                                                @if (isset($modele))
                                                                    <option value="{{ $modele->id }}">
                                                                        {{ $modele->libelle }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                    <option value="">autre</option>
                                                </select>
                                            </div>

                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">contrat</label>
                                                <select name="contrat_id" id="model_id" class="custom-select">
                                                    @foreach ($contrats as $contrat)
                                                        @if (isset($contrat))
                                                            <option value="{{ $contrat->id }}">{{ $contrat->libelle }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    <option value="">autre</option>
                                                </select>
                                            </div>

                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">poste</label>
                                                <select name="poste_id" id="model_id" class="custom-select">
                                                    @foreach ($postes as $poste)
                                                        @if (isset($poste))
                                                            <option value="{{ $poste->id }}">num :{{ $poste->id }}
                                                                || salle: {{ $poste->salle->id }}</option>
                                                        @endif
                                                    @endforeach
                                                    <option value="{{ null }}">autre</option>
                                                </select>
                                            </div>




                                            <div class="col-6">
                                                <label class="mb-3" for="inputGroupSelect01">qantite
                                                </label>
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text"
                                                                for="inputGroupSelect01">unite</label>
                                                        </div>
                                                        <input name="qantite" class="form-control" type="number" min="1"
                                                            max="200" step="1" value="1" required>
                                                    </div>
                                                </div>
                                            </div>






                                            <div class="form-group modal-footer">

                                                <button onclick="document.getElementById('storeform').submit()"
                                                    class="btn btn-primary" type="submit">enregistrer</button>

                                            </div>
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
                                        <h5 class="modal-title" id="exampleModalLabel">modifer un materiel</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="editForm" action="/">
                                            @csrf

                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">type de materiel</label>
                                                <select name="type_id" id="ftype" class="custom-select" required>
                                                    <option value="">type</option>
                                                    @foreach ($types as $type)
                                                        @if (isset($type))
                                                            <option value="{{ $type->id }}">{{ $type->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    <option value="">autre</option>
                                                </select>
                                            </div>

                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">model de materiel</label>
                                                <select name="modele_id" id="fmodele" class="custom-select">
                                                    @foreach ($modeles as $modele)
                                                        @if (isset($modele))
                                                            <option value="{{ $modele->id }}">{{ $modele->libelle }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    <option value="">autre</option>
                                                </select>
                                            </div>

                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">contrat</label>
                                                <select name="contrat_id" id="fcontrat" class="custom-select">
                                                    @foreach ($contrats as $contrat)
                                                        @if (isset($contrat))
                                                            <option value="{{ $contrat->id }}">{{ $contrat->libelle }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    <option value="">autre</option>
                                                </select>
                                            </div>

                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">poste</label>
                                                <select name="poste_id" id="fposte" class="custom-select">
                                                    @foreach ($postes as $poste)
                                                        @if (isset($poste))
                                                            <option value="{{ $poste->id }}">num :{{ $poste->id }}
                                                                || salle: {{ $poste->salle->id }}</option>
                                                        @endif
                                                    @endforeach
                                                    <option value="{{ null }}">autre</option>
                                                </select>
                                            </div>




                                            <div class="form-group modal-footer">

                                                <button onclick="document.getElementById('editform').submit()"
                                                    class="btn btn-primary" type="submit">enregistrer</button>
                                            </div>
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
                                    <th>modele</th>
                                    <th>poste</th>
                                    <th>contrat</th>
                                    <th>caracters</th>
                                    <th style="width: 13%!important">modification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materiels as $materiel)
                                    <tr>

                                        <td>{{ $materiel->id }}</td>


                                        @if ($modeles->where('id', $materiel->modele_id)->first() != null)
                                            <td>{{ $modeles->where('id', $materiel->modele_id)->first()->libelle }}</td>
                                        @else
                                            <td style="color: red!imporant">aucune modele affecter</td>
                                        @endif

                                        @if ($materiel->poste_id != null)
                                            <td> {{ $materiel->poste_id }} dans la salle :
                                                {{ $postes->where('id', $materiel->poste_id)->first()->salle->id }} </td>
                                        @else
                                            <td><span class="badge badge-warning">disponible dans le stock</span></td>
                                        @endif
                                        <td>
                                            @if ($contrats->where('id', $materiel->contrat_id)->first() != null)
                                                {{ $contrats->where('id', $materiel->contrat_id)->first()->libelle }} :
                                                @if ($materiel->contrat->pdf_path != null)
                                                    <span class="badge badge-warning ml-2">
                                                        <i class="fa fa-download"> </i> <a
                                                            href="{{ asset('contrats/' . $materiel->contrat->pdf_path) }}"
                                                            download> contrat </a>
                                                    </span>
                                                    @if ($materiel->contrat->date_fin_garantie > Carbon\Carbon::now())
                                                        <span class="badge badge-success ml-2">
                                                            garantie
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger ml-2">
                                                            garantie terminé
                                                        </span>
                                                    @endif
                                                @else
                                                    <span class="badge badge-danger ml-2">
                                                        pdf pas disponible </a>
                                                    </span>
                                                    @if ($materiel->contrat->date_fin_garantie > Carbon\Carbon::now())
                                                        <span class="badge badge-success ml-2">
                                                            garantie
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger ml-2">
                                                            garantie terminé
                                                        </span>
                                                    @endif
                                                @endif
                                            @else
                                                <div style="color: red!imporant">aucune contrat affecté</div>
                                            @endif 

                                            {{-- {{ $contrats->where('id',$materiel->contrat_id)->first() }} --}}
                                        </td>
                                        <td> 
                                           @if(isset($materiel->modele))
                                            @if ($materiel->modele->caracters != null)
                                                @foreach ($materiel->modele->caracters as $carrow)
                                                    <div class="col">

                                                        <div class="row">{{ $carrow->libelle }} :
                                                            {{ $carrow->unite }} </div>


                                                    </div>
                                                @endforeach
                                            @else
                                                sans caracters
                                            @endif
                                            @else
                                                sans caracters
                                            @endif
  
                                        </td>
                                        <td style="width: 10%!important">
                                            <div class="row">
                                                <div class="col ml-1">
                                                    <form id="{{ $materiel->id }}"
                                                        action="{{ route('deletemateriel', $materiel->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button
                                                        onClick="
                                                                 event.preventDefault(); if(confirm('vous voulez bien supprimer ce materiel ?')) document.getElementById({{ $materiel->id }}).submit()"
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
                                    <th>modele</th>
                                    <th>poste</th>
                                    <th>contrat</th>
                                    <th>caracters</th>
                                    <th style="width: 13%!important">modification</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fa fa-plus"></i> &nbsp ajouter une materiel
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
            <b>al omran version</b> 3.2.0
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

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example1').DataTable();
            table.on("click", ".edit", function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }
                var data = table.row($tr).data();
                console.log(data);
                $('#fname').val(data[1]);
                $('#fadress').val(data[2]);
                $('#ftele').val(data[3]);
                $('#fmail').val(data[4]);
                let st = data[0];
                console.log(st);
                $('#editForm').attr('action', "/admin/updatefornisseur/" + data[0]);
                $('#editModal').modal("show");
            });

        });
    </script>


@endsection
