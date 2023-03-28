@extends('adminlte::page')

@section('title')
    materiel
@endsection

@section('content_header')
    parc informatique al omran
@endsection



@section('content')
    @if (session()->has('msg'))
        <div class="mx-auto col-8 alert alert-success alert-dismissible bg-opacity-50 fade show ">{{ session()->get('msg') }}
        </div>
    @endif

    <div style="margin:10px 200px 0px 200px;padding:30px ; border-radius:8px; background-color:white;">
        <h1>ajouter un materiel</h1>
        <form method="post" action="{{ route('storemateriel') }}" >
            @csrf

            <div class="mb-3 d-block my-4">
                <label for="validationDefault01">type de materiel</label>
                <select name="type" id="type" class="custom-select" required>
                    <option value="">type</option>
                    <option value="impriment">impriment</option>
                    <option value="scanner">scanner</option>
                    <option value="ecrant">ecrant</option>
                    <option value="unite centrale">unite centrale</option>
                    <option value="serveur">serveur</option>
                    <option value="souris">souris</option>
                    <option value="clavier">clavier</option>
                </select>
            </div>


            <div class="mb-3 d-block my-4">
                <label for="validationDefault01">model de materiel</label>
                <select name="model_id" id="model_id" class="custom-select">
                    <option value="">modele</option>
                    <option value="autre">autre</option>
                </select>
            </div>


            <div class="mb-3 my-4" id="modelcr" style="display:none">
                <fieldset class="border-top-0 rounded border border-info" style="padding:10px;">
                    <legend>modele</legend>
                    <div class="mb-3 d-block my-4">
                        <label for="validationDefault01">name</label>
                        <input type="text" class="form-control" id="validationDefault01" name="model_name" placeholder="name"
                            >
                    </div>

                    <label for="validationDefault01">marque de modele</label>
                    <select name="marque_id"  id="marque_id" class="custom-select" >
                        <option value="">marque</option>
                        
                        @foreach ( $marques as $marque)
                            <option value="{{ $marque->id }}">{{ $marque->name }}</option>
                        @endforeach
                        <option value="autre">autre</option>
                    </select>
                </fieldset>
            </div>


            <div class="mb-3 my-4" id="marquecr" style="display:none">
                <fieldset class="border-top-0 rounded border border-info" style="padding:10px;">
                    <legend>marque</legend>
                    <div class="mb-3 d-block my-4">
                        <label for="validationDefault01">name</label>
                        <input type="text" class="form-control" id="validationDefault01" name="name_marque" placeholder="name"
                            >
                    </div> 
                    <div class="mb-3 d-block my-4">
                        <label for="validationDefault01">pays</label>
                        <input type="text" class="form-control" id="validationDefault01" name="name_pays" placeholder="pays"
                            >
                    </div>
                </fieldset>
            </div>


            <div class="form-group my-8">

                <button class="btn btn-primary" type="submit">enregistrer</button>
            </div>
        </form>

        <script>
            console.log('script ok');

            function modelsaffich() {
                if (document.getElementById('model_id').value == "autre") {
                    document.getElementById('modelcr').style.display = "block";
                    // if(document.getElementById('role').value=="log"){
                    //   document.getElementById('services').value="2";
                    // }
                } else
                    document.getElementById('modelcr').style.display = "none";
            }



            document.getElementById('model_id').addEventListener("change", modelsaffich);
        </script> 
        <script>
            console.log('script ok');

            function marqueaffiche() {
                if (document.getElementById('marque_id').value == "autre") {
                    document.getElementById('marquecr').style.display = "block";
                    // if(document.getElementById('role').value=="log"){
                    //   document.getElementById('services').value="2";
                    // }
                } else
                    document.getElementById('marquecr').style.display = "none";
            }

            document.getElementById('marque_id').addEventListener("change", marqueaffiche);
        </script>
        <script>
            console.log('script 2 ok');

            function models() {
                var str='';
                console.log('event 2ok');
                var models = {!! json_encode($modeles->toArray()) !!};
                console.log(models);
                console.log(document.getElementById('type').value);

                var modelfi = models.filter(function(model) {
                    return model.type == document.getElementById('type').value;
                });

                console.log('modele filtrer:');
                console.log(modelfi);

                // var str =document.getElementById('model_id').innerHTML;
                modelfi.forEach(model => {
                    str += '<option value="' + model.id + '">' + model.name + '</option>'
                });
                str += '<option value="autre" > autre </option> '
                document.getElementById('model_id').innerHTML = str;

            }

            document.getElementById('type').addEventListener("change", models);
        </script>
    </div>
@endsection
