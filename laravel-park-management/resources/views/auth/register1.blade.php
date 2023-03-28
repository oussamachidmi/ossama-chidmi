@extends('adminlte::page')

@section('title')
    user
@endsection

@section('content_header')
ajouter un employer
@endsection
@section('content') 
@if(session()->has('msg'))
<div class="mx-auto col-8 alert alert-success alert-dismissible bg-opacity-50 fade show ">{{session()->get('msg')}}</div>
@endif
<div style="margin:10px 200px 0px 200px;padding:30px ; border-radius:8px; background-color:white;">
<form method="post" action="{{route('struser')}}" enctype="multipart/form-data">
  @csrf
      <div class="mb-3 d-block my-4">
        <label for="validationDefault01">Nom complet</label>
        <input type="text" class="form-control" id="validationDefault01" name="name" placeholder="name" required>
      </div>
      <div class="mb-3 my-4">
        <label for="validationDefaultUsername d-block">Email</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
          </div>
          <input type="text" class="form-control" name="Email" id="validationDefaultUsername" placeholder="email" aria-describedby="inputGroupPrepend2" required>
        </div>
        <div class="mb-3 d-block my-4">
            <label for="validationDefault01">password</label>
            <input type="password" class="form-control" id="validationDefault01" name="password" placeholder="name" required>
          </div>

        <div class="mb-3  my-4">
    <label  for="validationDefaultUsername d-block">Role</label>
            <select  id="role" name="role" class="custom-select" required>
              <option value="">Role</option>
              <option value="adm">administrateur</option>
              <option value="tec">technicien</option>
              <option value="log">logistique</option>
              <option value="emp">employé</option>
            </select>
            <div class="invalid-feedback">Example invalid custom select feedback</div>
        </div> 

        <div id="services" style="display:none" class="mb-3 col-md-6  my-4">
          <label for="validationDefaultUsername d-block">service</label>
        <select  name="service_id" class="custom-select">
              <option value="1">service</option>
              @foreach($services as $service)
              <option value="{{$service->id}}">{{$service->name}}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">Example invalid custom select feedback</div>
        </div>

        <div  style="margin-top:30px;" class="mb-3 col-md-6  my-8">
        <input type="file" name="profile_photo_path" class="custom-file-input" id="validatedCustomFile" required>
        <label class="custom-file-label" for="validatedCustomFile">photo de profile</label>
        <div class="invalid-feedback">Example invalid custom file feedback</div>
      </div>
   
      
    <div class="form-group my-8">
  
    <button class="btn btn-primary" type="submit">enregistrer</button>  </div>
  </form>
<script>
  function showrole(){
    if(document.getElementById('role').value=="emp"){
    document.getElementById('services').style.display="block";
  // if(document.getElementById('role').value=="log"){
  //   document.getElementById('services').value="2";
  // }
  }
  else 
  document.getElementById('services').style.display="none";
  }



     document.getElementById('role').addEventListener("change", showrole);

</script>
</div> 
@endsection