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
                        <h3 class="card-title">vouz pouvez gerer tout les fornisseurs</h3>
                        <!-- Button trigger modal -->
                        <div class="btn-group dropstart float-right">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                other tables
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
                                        <h5 class="modal-title" id="exampleModalLabel">ajouter une fornisseur</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('storefornisseur') }}">
                                            @csrf


                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">name</label>
                                                <input type="text" name="name" class="form-control"
                                                    id="validationDefault01" name="name" placeholder="name">
                                            </div>
                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">adress</label>
                                                <input type="text" name="adress" class="form-control"
                                                    id="validationDefault01" placeholder="adresse">
                                            </div>
                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">telephone</label>
                                                <input type="tel" name="telephone" class="form-control"
                                                    id="validationDefault01" placeholder="telephone">
                                            </div>
                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">email</label>
                                                <input type="email" name="mail" class="form-control"
                                                    id="validationDefault01" placeholder="email">
                                            </div>

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

                        {{-- ##################################secoundmodal################################################### --}}

                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">modifer une fornisseur</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="editForm" action="/">
                                            @csrf


                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">name</label>
                                                <input type="text" name="name" class="form-control"
                                                    id="fname" name="name" placeholder="name" >
                                            </div>
                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">adress</label>
                                                <input type="text" name="adress" class="form-control"
                                                    id="fadress" placeholder="adresse">
                                            </div>
                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">telephone</label>
                                                <input type="tel" name="telephone" class="form-control"
                                                    id="ftele" placeholder="telephone">
                                            </div>
                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">email</label>
                                                <input type="email" name="mail" class="form-control"
                                                    id="fmail" placeholder="email">
                                            </div>

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
                                    <th>ville</th>
                                    <th>telephone</th>
                                    <th>email</th>
                                    <th>la date de creation</th>
                                    <th style="width: 10%!important">modification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fornisseurs as $fornisseur)
                                    <tr>
                                        <td>{{ $fornisseur->id }}</td>
                                        <td>{{ $fornisseur->name }}</td>
                                        <td>{{ $fornisseur->ville }}</td>
                                        <td>{{ $fornisseur->telephone }}</td>
                                        <td>{{ $fornisseur->mail }}</td>
                                        <td>{{ $fornisseur->created_at }}</td>
                                        <td style="width: 10%!important">
                                            <div class="row">
                                                <div class="col ml-1">
                                                    <form id="{{ $fornisseur->id }}"
                                                        action="{{ route('deletefornisseur', $fornisseur->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button
                                                        onClick="
                                                                                                                                                        event.preventDefault(); if(confirm('u sure ?')) document.getElementById({{ $fornisseur->id }}).submit()"
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
                                    <th>ville</th>
                                    <th>telephone</th>
                                    <th>email</th>
                                    <th>la date de creation</th>
                                    <th style="width: 10%!important">modification</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fa fa-plus"></i> &nbsp ajouter une fornisseur
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
