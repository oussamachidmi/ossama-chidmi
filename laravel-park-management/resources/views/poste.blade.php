@extends('adminlte::page')

@section('title')
    postes
@endsection
@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
@endsection

@section('content_header')
    poste de travail
@endsection


@section('content')
    @if (session()->has('msg'))
        <div style="width: 100%!important;background: rgba(31, 168, 35, 0.6)!important;"
            class="mx-auto alert alert-success alert-dismissible bg-opacity-75 fade show ">
            {{ session()->get('msg') }}
        </div>
    @endif

    <!-- /.card-tools -->


    <!-- /.card-header -->
    <!-- /.card-tools 2 -->







    <div class="container-fluid">
        <div class="row my-10">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> <b>poste #</b></h5>
                    <b>ID:</b> {{ $post->id }}<br>
                    <b>date de creation:</b> {{ $post->created_at }}<br>
                    <b>le dernier mise a jour:</b> {{ $post->created_at }}
                </div>

                <div class="invoice p-3 mb-3">

                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> &nbsp; Salle {{ $post->salle->id }}, Inc.
                                <small class="float-right">Date: 2/10/2014</small>
                            </h4>
                        </div>

                    </div>

                    <div class="row invoice-info ">
                        @if ($post->user)
                            <div class="col-sm-4 invoice-col">
                                affectation
                                <address>
                                    <strong>{{ $post->user->name }}</strong><br>
                                    {{ $post->user->adress }}<br>
                                    San Francisco, CA 94107<br>
                                    Phone: {{ $post->user->telephone }}<br>
                                    Email: {{ $post->user->email }}
                                </address>
                            </div>
                        @else
                            <div class="col-sm-4 invoice-col">
                                Sans utilisateur
                            </div>
                        @endif


                        <br>
                        <br>


                    </div>


                    <div class="row my-10">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>type</th>
                                        <th>modele</th>
                                        <th>contrat</th>
                                        <th>caracteristique</th>
                                        <th>date de mise a jour</th>
                                        <th class="text-center">declaration de panne</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post->materiels as $materiel)
                                        <tr>
                                            <td>{{ $materiel->id }}</td>
                                            <td>{{ $materiel->modele->type->name }}</td>
                                            <td>{{ $materiel->modele->libelle }}</td>
                                            <td>
                                                @if ($materiel->contrat)
                                                    {{ $materiel->contrat->libelle }}
                                                @else
                                                    aucune contrat affectée
                                                @endif
                                            </td>
                                            <td>
                                                @foreach ($materiel->modele->caracters as $cara)
                                                    <div>
                                                        {{ $cara->libelle }} : {{ $cara->unite }}
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>{{ $materiel->created_at }}</td>
                                            <td>{{ $materiel->updated_at }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>

                    </div>
                    <br><br><br>

                    <div class="row">

                        <div class="col-5">
                            <div class="card card-default">
                                <div class="card-header bg-light">
                                    <h3 class="card-title ">reclamer une panne</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('storepanne') }}">
                                        @csrf


                                        <div class="mb-3 d-block my-4">
                                            <label for="validationDefault01">materiel</label>
                                            <select name="materiel" class="custom-select">
                                                <option value="" disabled>selection un materiel de votre poste</option>
                                                @foreach ($post->materiels as $materiel)
                                                    <option value="{{ $materiel->id }}">
                                                        {{ $materiel->modele->type->name }}
                                                        {{ $materiel->modele->libelle }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="mb-3 d-block my-4">
                                            <label for="validationDefault01">description</label>
                                            <textarea id="story" name="description" rows="5" cols="33" class="form-control">

                             </textarea>

                                        </div>
                                        <hr>
                                        <button type="submit" value="Submit"
                                            class="btn btn-primary float-right">Enregistrement</button>

                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-6">
                            <p class="lead mt-10">liste des pannes</p>
                            <div class="table-responsive mx-4">
                                <table class="table">
                                    <thead>
                                        <th>id</th>
                                        <th>type</th>
                                        <th>modole</th>
                                        <th>employe</th>
                                        <th>date de panne</th>
                                        <th>date de reparation</th>
                                    </thead>
                                    <tbody>


                                        @foreach ($post->materiels as $materiel)
                                            @foreach ($materiel->pannes as $panne)
                                                <tr>
                                                    <th>{{ $panne->id }}</th>
                                                    <td>{{ $panne->materiel->modele->type->name }}</td>
                                                    <td>{{ $panne->materiel->modele->libelle }}</td>
                                                    <td>
                                                        @if ($panne->employe)
                                                            {{ $panne->employe->name }}
                                                        @else
                                                        emplyé est supprimer
                                                        @endif
                                                                    
                                                    </td>
                                                    <td>{{ $panne->created_at }}</td>
                                                    <td> 
                                                        @if ($panne->reparation)
                                                            {{ $panne->reparation->created_at }}
                                                        @else
                                                            @if (auth()->user()->role == 'administrateur' || auth()->user()->role == 'techniciens')
                                                                <div>
                                                                
                                                                    <form id="{{ $panne->id }}"
                                                                        action="{{route('storereparation')}}"
                                                                        method="post">
                                                                        @csrf
                                                                        <input type="number" name="panne" value="{{ $panne->id }}"
                                                                            style="display: none">
                                                                    </form>
                                                                    <button
                                                                        onClick="
                                                                        event.preventDefault(); if(confirm('le meteriel est bien reparé ?')) document.getElementById({{ $panne->id }}).submit()"
                                                                        type="submit" class="btn btn-app btn-danger">
                                                                        <i class="fa-solid fa-check"></i> réparer
                                                                    </button>
                                                                </div>
                                                            @else
                                                                pas encore réparer
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                    <div class="row no-print">
                        <div class="col-12">
                            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</a>

                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>






    <!-- end /.card-tools -->


    {{-- <div class="card-body"> --}}



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
    {{-- <script src="/plugins/datatables-buttons/js/buttons.html5.min.js" defer></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js" defer></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js" defer></script> --}}
    <!-- AdminLTE App -->
    {{-- <script src="/dist/js/adminlte.min.js" defer></script> --}}
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="../../dist/js/demo.js" defer></script> --}}
    <!-- Page specific script -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script> --}}



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
                $('#fmateriel').val(data[0]);
                $('#fadress').val(data[2]);
                $('#ftele').val(data[3]);
                $('#fmail').val(data[4]);
                let st = data[0];
                console.log(st);
                $('#exampleModal').attr('action', "/admin/updatefornisseur/" + data[0]);
                $('#exampleModal').modal("show");

            });
            $('#example1').dataTable({
                "searching": true "paging": false,
            });
        });
    </script>




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
