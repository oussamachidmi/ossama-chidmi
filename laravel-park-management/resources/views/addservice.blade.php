@extends('adminlte::page')

@section('title')
    service
@endsection


@section('content_header')

ajouter un service

@endsection
@section('content') 
@if(session()->has('msg'))
<div class="mx-auto col-8 alert alert-success alert-dismissible bg-opacity-50 fade show ">{{session()->get('msg')}}</div>
@endif
<div style="margin:10px 200px 0px 200px;padding:30px ; border-radius:8px; background-color:white;">
<form method="post" action="{{route('storeservice')}}" enctype="multipart/form-data">
  @csrf

      <div class="mb-3 d-block my-4">
        <label for="validationDefault01">Nom de service</label>
        <input type="text" class="form-control" id="validationDefault01" name="name" placeholder="name" required>
      </div>


        <div class="mb-3  my-4">
    <label  for="validationDefaultUsername d-block">Role</label>
            <select  id="role" name="etage_bureau" class="custom-select" required>
              <option value="">etage</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
            <div class="invalid-feedback">Example invalid custom select feedback</div>
        </div>       
    <div class="form-group my-8">
  
    <button class="btn btn-primary" type="submit">enregistrer</button>  </div>
  </form>


</div> 
@endsection