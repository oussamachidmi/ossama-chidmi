@extends('adminlte::page')

@section('title')
    poste
@endsection

@section('content_header')
    service
@endsection
@section('content')
    @if (session()->has('msg'))
        <div class="mx-auto col-8 alert alert-success alert-dismissible bg-opacity-50 fade show ">
            {{ session()->get('msg') }}
        </div>
    @endif

    <div class="card w-75 mx-auto my-5">
        <div class="card-header">
            <h3 class="card-title">ajouter un type </h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" action="{{ route('storetype') }}">
                @csrf
                {{-- <div class="form-group">
                </div> --}}
              <div class="mb-3 d-block my-4">
                        <label for="validationDefault01">name</label>
                        <input type="text" class="form-control" id="validationDefault01" name="model_name" placeholder="nom type">
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
