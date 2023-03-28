@extends('adminlte::page')

@section('content_header')
    profile
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">

                                <img src="{{ asset('storage') . '/profile-photos' . '/' . $user->profile_photo_path }}"
                                    alt="user-avatar" class="profile-user-img img-fluid img-circle">
                            </div>

                            <h3 class="profile-username text-center"> {{ $user->name }}</h3>
                            <p class="text-muted text-center">{{ $user->role }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>nombre de materiel</b> <a class="float-right">
                                        @if ($user->materiels == null)
                                            0
                                        @else
                                            {{ count($user->materiels) }}
                                        @endif
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>nombre de tickets</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>num de poste</b> <a class="float-right">
                                        @if ($user->poste == null)
                                            aucune
                                        @else
                                            {{ $user->poste->id }} dans la salle {{ $user->poste->salle->id }}
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>


                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> a propos</h3>
                        </div>

                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>
                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted">{{ $user->adress }}</p>
                            <hr>


                            <strong><i class="far fa-file-alt mr-1"></i> remarque</strong>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                fermentum enim neque.</p>
                        </div>

                    </div>

                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Activity</a></li>

                                <li class="nav-item"><a class="nav-link" href="#settings"
                                        data-toggle="tab">Settings</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="activity">

                                    <div class="post">

                                        <p>
                                        <h3>service</h3>
                                        {{ $user->service->name }}


                                        </p>

                                        <hr>

                                        <p>
                                        <h4>poste</h4>
                                        {{ $user->poste }}</p>

                                        <hr>

                                        </p>

                                        <hr>

                                        <p>
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    saission
                                                </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="bar-chart"
                                                    style="height: 300px; padding: 0px; position: relative;"><canvas
                                                        class="flot-base" width="349" height="300"
                                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 349px; height: 300px;"></canvas><canvas
                                                        class="flot-overlay" width="349" height="300"
                                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 349px; height: 300px;"></canvas>
                                                    <div class="flot-svg"
                                                        style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;">
                                                        <svg style="width: 100%; height: 100%;">
                                                            <g class="flot-x-axis flot-x1-axis xAxis x1Axis"
                                                                style="position: absolute; inset: 0px;"><text x="128.453125"
                                                                    y="294" class="flot-tick-label tickLabel"
                                                                    style="position: absolute; text-align: center;">March</text><text
                                                                    x="185.421875" y="294" class="flot-tick-label tickLabel"
                                                                    style="position: absolute; text-align: center;">April</text><text
                                                                    x="239.4140625" y="294"
                                                                    class="flot-tick-label tickLabel"
                                                                    style="position: absolute; text-align: center;">May</text><text
                                                                    x="17.6484375" y="294" class="flot-tick-label tickLabel"
                                                                    style="position: absolute; text-align: center;">January</text><text
                                                                    x="288.4609375" y="294"
                                                                    class="flot-tick-label tickLabel"
                                                                    style="position: absolute; text-align: center;">June</text>
                                                            </g>
                                                            <g class="flot-y-axis flot-y1-axis yAxis y1Axis"
                                                                style="position: absolute; inset: 0px;"><text x="8.953125"
                                                                    y="269" class="flot-tick-label tickLabel"
                                                                    style="position: absolute; text-align: right;">0</text><text
                                                                    x="8.953125" y="205.5" class="flot-tick-label tickLabel"
                                                                    style="position: absolute; text-align: right;">5</text><text
                                                                    x="1" y="15" class="flot-tick-label tickLabel"
                                                                    style="position: absolute; text-align: right;">20</text><text
                                                                    x="1" y="142" class="flot-tick-label tickLabel"
                                                                    style="position: absolute; text-align: right;">10</text><text
                                                                    x="1" y="78.5" class="flot-tick-label tickLabel"
                                                                    style="position: absolute; text-align: right;">15</text>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </p>
                                        <hr>
                                    </div>
                                </div>


                                <div class="tab-pane" id="settings">
                                    <form enctype="multipart/form-data" method="POST" class="form-horizontal" action="{{route('updateuser',$user->id)}}">
                                         @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" name="name"
                                                    placeholder="Name" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                    name="mail"  value="{{$user->mail}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">telephone</label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" id="inputName2" name="telephone"
                                                    placeholder="telephone"   value="{{$user->telephone}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">adress</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="inputExperience" name="adress" placeholder="adress"  value="{{$user->adress}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputExperience"
                                                  name="password"  placeholder="password"  >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationDefaultUsername d-block">Role</label>
                                            <select id="role" name="role" class="custom-select">
                                                <option value="">Role</option>
                                                <option value="adm">administrateur</option>
                                                <option value="tec">technicien</option>
                                                <option value="log">logistique</option>
                                                <option value="emp">employé</option>
                                            </select>
                                            <div class="invalid-feedback">Example invalid custom select feedback</div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationDefaultUsername d-block">service</label>
                                            <select name="service" class="custom-select"  value="{{$user->service_id}}">
                                                <option value="1">service</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Example invalid custom select feedback</div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="validatedCustomFile d-block">photo profile</label>

                                            <div class="custom-file ">
                                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="profile_photo_path"
                                                   >
                                                <label class="custom-file-label" for="validatedCustomFile">Choose
                                                    photo...</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger float-right">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

        </div>
    </section>

@endsection
