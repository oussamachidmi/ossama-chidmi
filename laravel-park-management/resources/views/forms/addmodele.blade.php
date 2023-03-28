@extends('adminlte::page')

@section('title')
    poste
@endsection

@section('content_header')
    ajouter un modele
@endsection
@section('content')
    @if (session()->has('msg'))
        <div class="mx-auto col-8 alert alert-success alert-dismissible bg-opacity-50 fade show ">
            {{ session()->get('msg') }}
        </div>
    @endif

    <div class="card w-75 mx-auto my-5">
        <div class="card-header">
            <h3 class="card-title">ajouter un modele</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" action="{{ route('storemodele') }}">
                @csrf
                {{-- <div class="form-group">
                </div> --}}

                <div class="mb-3 d-block my-4">
                    <label for="validationDefault01">libelle</label>
                    <input type="text" name="libelle" class="form-control" id="validationDefault01" name="libelle"
                        placeholder="libelle">
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="mb-3" for="inputGroupSelect01">selectionner l'annne</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">l'annee</label>
                                </div>
                                <input name="year" class="form-control" type="number" min="1900" max="2099" step="1"
                                    value="2022" />
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="mb-3" for="inputGroupSelect01">selectionner la marque</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">marque</label>
                                </div>
                                <select name="marque_id" class="custom-select" id="inputGroupSelect01">
                                    <option value="aucune" selected disabled>selectionner la marque</option>
                                    @foreach ($marques as $marque)
                                        <option value="{{ $marque->id }}">{{ $marque->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="row mx-2">
                        <div class="col-14">
                            <label class="mb-3" for="inputGroupSelect01">selectionner la type</label>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">type</label>
                                    </div>
                                    <select name="type" class="custom-select" id="inputGroupSelect01">
                                        <option value="aucune" selected disabled>selectionner la marque</option>
                                        <option value="materiel">materiel</option>
                                        <option value=piece">piece</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
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
