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
                        <h3 class="card-title">vouz pouvez gerer tout les marques</h3>
                        <!-- Button trigger modal -->
                        <div class="btn-group dropstart float-right">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                les autres erea
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
                                        <h5 class="modal-title" id="exampleModalLabel">ajouter une marque</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('storemarque') }}">
                                            @csrf


                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">name</label>
                                                <input type="text" name="name" class="form-control"
                                                    id="validationDefault01" name="name" placeholder="name">
                                            </div>
                                                 <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">pays</label>
                                                <select class="custom-select"
                                                                id="select1" name="pays">
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Afrique_du_Sud">Afrique du Sud</option>
                                                    <option value="Albanie">Albanie</option>
                                                    <option value="Algerie">Algérie</option>
                                                    <option value="Allemagne">Allemagne</option>
                                                    <option value="Andorre">Andorre</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option>
                                                    <option value="Arabie_saoudite">Arabie saoudite</option>
                                                    <option value="Argentine">Argentine</option>
                                                    <option value="Armenie">Arménie</option>
                                                    <option value="Australie">Australie</option>
                                                    <option value="Autriche">Autriche</option>
                                                    <option value="Azerbaidjan">Azerbaïdjan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrein">Bahreïn</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbade">Barbade</option>
                                                    <option value="Belau">Belau</option>
                                                    <option value="Belgique">Belgique</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Bénin</option>
                                                    <option value="Bhoutan">Bhoutan</option>
                                                    <option value="Bielorussie">Biélorussie</option>
                                                    <option value="Birmanie">Birmanie</option>
                                                    <option value="Bolivie">Bolivie</option>
                                                    <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bresil">Brésil</option>
                                                    <option value="Brunei">Brunei</option>
                                                    <option value="Bulgarie">Bulgarie</option>
                                                    <option value="Burkina">Burkina</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodge">Cambodge</option>
                                                    <option value="Cameroun">Cameroun</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cap-Vert">Cap-Vert</option>
                                                    <option value="Chili">Chili</option>
                                                    <option value="Chine">Chine</option>
                                                    <option value="Chypre">Chypre</option>
                                                    <option value="Colombie">Colombie</option>
                                                    <option value="Comores">Comores</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Cook">Cook</option>
                                                    <option value="Coree_du_Nord">Corée du Nord</option>
                                                    <option value="Coree_du_Sud">Corée du Sud</option>
                                                    <option value="Costa_Rica">Costa Rica</option>
                                                    <option value="Cote_Ivoire">Côte d'Ivoire</option>
                                                    <option value="Croatie">Croatie</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Danemark">Danemark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominique">Dominique</option>
                                                    <option value="Egypte">Égypte</option>
                                                    <option value="Emirats_arabes_unis">Émirats arabes unis</option>
                                                    <option value="Equateur">Équateur</option>
                                                    <option value="Erythree">Érythrée</option>
                                                    <option value="Espagne">Espagne</option>
                                                    <option value="Estonie">Estonie</option>
                                                    <option value="Etats-Unis">États-Unis</option>
                                                    <option value="Ethiopie">Éthiopie</option>
                                                    <option value="Fidji">Fidji</option>
                                                    <option value="Finlande">Finlande</option>
                                                    <option value="France">France</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambie">Gambie</option>
                                                    <option value="Georgie">Géorgie</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Grèce">Grèce</option>
                                                    <option value="Grenade">Grenade</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinee">Guinée</option>
                                                    <option value="Guinee-Bissao">Guinée-Bissao</option>
                                                    <option value="Guinee_equatoriale">Guinée équatoriale</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haïti</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hongrie">Hongrie</option>
                                                    <option value="Inde">Inde</option>
                                                    <option value="Indonesie">Indonésie</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Irlande">Irlande</option>
                                                    <option value="Islande">Islande</option>
                                                    <option value="Israël">Israël</option>
                                                    <option value="Italie">Italie</option>
                                                    <option value="Jamaique">Jamaïque</option>
                                                    <option value="Japon">Japon</option>
                                                    <option value="Jordanie">Jordanie</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kirghizistan">Kirghizistan</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Koweit">Koweït</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Lettonie">Lettonie</option>
                                                    <option value="Liban">Liban</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libye">Libye</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lituanie">Lituanie</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macedoine">Macédoine</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malaisie">Malaisie</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malte">Malte</option>
                                                    <option value="Maroc">Maroc</option>
                                                    <option value="Marshall">Marshall</option>
                                                    <option value="Maurice">Maurice</option>
                                                    <option value="Mauritanie">Mauritanie</option>
                                                    <option value="Mexique">Mexique</option>
                                                    <option value="Micronesie">Micronésie</option>
                                                    <option value="Moldavie">Moldavie</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolie">Mongolie</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Namibie">Namibie</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Népal</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norvège">Norvège</option>
                                                    <option value="Nouvelle-Zelande">Nouvelle-Zélande</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Ouganda">Ouganda</option>
                                                    <option value="Ouzbekistan">Ouzbékistan</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papouasie-Nouvelle_Guinee">Papouasie - Nouvelle Guinée
                                                    </option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Pays-Bas">Pays-Bas</option>
                                                    <option value="Perou">Pérou</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pologne">Pologne</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Republique_centrafricaine">République centrafricaine
                                                    </option>
                                                    <option value="Republique_dominicaine">République dominicaine</option>
                                                    <option value="Republique_tcheque">République tchèque</option>
                                                    <option value="Roumanie">Roumanie</option>
                                                    <option value="Royaume-Uni">Royaume-Uni</option>
                                                    <option value="Russie">Russie</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint-Christophe-et-Nieves">Saint-Christophe-et-Niévès
                                                    </option>
                                                    <option value="Sainte-Lucie">Sainte-Lucie</option>
                                                    <option value="Saint-Marin">Saint-Marin </option>
                                                    <option value="Saint-Siège">Saint-Siège, ou leVatican</option>
                                                    <option value="Saint-Vincent-et-les_Grenadines">Saint-Vincent-et-les
                                                        Grenadines</option>
                                                    <option value="Salomon">Salomon</option>
                                                    <option value="Salvador">Salvador</option>
                                                    <option value="Samoa_occidentales">Samoa occidentales</option>
                                                    <option value="Sao_Tome-et-Principe">Sao Tomé-et-Principe</option>
                                                    <option value="Senegal">Sénégal</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra_Leone">Sierra Leone</option>
                                                    <option value="Singapour">Singapour</option>
                                                    <option value="Slovaquie">Slovaquie</option>
                                                    <option value="Slovenie">Slovénie</option>
                                                    <option value="Somalie">Somalie</option>
                                                    <option value="Soudan">Soudan</option>
                                                    <option value="Sri_Lanka">Sri Lanka</option>
                                                    <option value="Sued">Suède</option>
                                                    <option value="Suisse">Suisse</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Syrie">Syrie</option>
                                                    <option value="Tadjikistan">Tadjikistan</option>
                                                    <option value="Tanzanie">Tanzanie</option>
                                                    <option value="Tchad">Tchad</option>
                                                    <option value="Thailande">Thaïlande</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinite-et-Tobago">Trinité-et-Tobago</option>
                                                    <option value="Tunisie">Tunisie</option>
                                                    <option value="Turkmenistan">Turkménistan</option>
                                                    <option value="Turquie">Turquie</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Viet_Nam">Viêt Nam</option>
                                                    <option value="Yemen">Yémen</option>
                                                    <option value="Yougoslavie">Yougoslavie</option>
                                                    <option value="Zaire">Zaïre</option>
                                                    <option value="Zambie">Zambie</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
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
                                        <h5 class="modal-title" id="exampleModalLabel">modifer une marque</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="editForm" action="/">
                                            @csrf


                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">name</label>
                                                <input type="text" name="name" class="form-control" id="fname"
                                                    placeholder="name" required>
                                            </div>
                                            <div class="mb-3 d-block my-4">
                                                <label for="validationDefault01">pays</label>
                                                <select class="custom-select"
                                                                id="select1" name="pays">
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Afrique_du_Sud">Afrique du Sud</option>
                                                    <option value="Albanie">Albanie</option>
                                                    <option value="Algerie">Algérie</option>
                                                    <option value="Allemagne">Allemagne</option>
                                                    <option value="Andorre">Andorre</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option>
                                                    <option value="Arabie_saoudite">Arabie saoudite</option>
                                                    <option value="Argentine">Argentine</option>
                                                    <option value="Armenie">Arménie</option>
                                                    <option value="Australie">Australie</option>
                                                    <option value="Autriche">Autriche</option>
                                                    <option value="Azerbaidjan">Azerbaïdjan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrein">Bahreïn</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbade">Barbade</option>
                                                    <option value="Belau">Belau</option>
                                                    <option value="Belgique">Belgique</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Bénin</option>
                                                    <option value="Bhoutan">Bhoutan</option>
                                                    <option value="Bielorussie">Biélorussie</option>
                                                    <option value="Birmanie">Birmanie</option>
                                                    <option value="Bolivie">Bolivie</option>
                                                    <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bresil">Brésil</option>
                                                    <option value="Brunei">Brunei</option>
                                                    <option value="Bulgarie">Bulgarie</option>
                                                    <option value="Burkina">Burkina</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodge">Cambodge</option>
                                                    <option value="Cameroun">Cameroun</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cap-Vert">Cap-Vert</option>
                                                    <option value="Chili">Chili</option>
                                                    <option value="Chine">Chine</option>
                                                    <option value="Chypre">Chypre</option>
                                                    <option value="Colombie">Colombie</option>
                                                    <option value="Comores">Comores</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Cook">Cook</option>
                                                    <option value="Coree_du_Nord">Corée du Nord</option>
                                                    <option value="Coree_du_Sud">Corée du Sud</option>
                                                    <option value="Costa_Rica">Costa Rica</option>
                                                    <option value="Cote_Ivoire">Côte d'Ivoire</option>
                                                    <option value="Croatie">Croatie</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Danemark">Danemark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominique">Dominique</option>
                                                    <option value="Egypte">Égypte</option>
                                                    <option value="Emirats_arabes_unis">Émirats arabes unis</option>
                                                    <option value="Equateur">Équateur</option>
                                                    <option value="Erythree">Érythrée</option>
                                                    <option value="Espagne">Espagne</option>
                                                    <option value="Estonie">Estonie</option>
                                                    <option value="Etats-Unis">États-Unis</option>
                                                    <option value="Ethiopie">Éthiopie</option>
                                                    <option value="Fidji">Fidji</option>
                                                    <option value="Finlande">Finlande</option>
                                                    <option value="France">France</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambie">Gambie</option>
                                                    <option value="Georgie">Géorgie</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Grèce">Grèce</option>
                                                    <option value="Grenade">Grenade</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinee">Guinée</option>
                                                    <option value="Guinee-Bissao">Guinée-Bissao</option>
                                                    <option value="Guinee_equatoriale">Guinée équatoriale</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haïti</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hongrie">Hongrie</option>
                                                    <option value="Inde">Inde</option>
                                                    <option value="Indonesie">Indonésie</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Irlande">Irlande</option>
                                                    <option value="Islande">Islande</option>
                                                    <option value="Israël">Israël</option>
                                                    <option value="Italie">Italie</option>
                                                    <option value="Jamaique">Jamaïque</option>
                                                    <option value="Japon">Japon</option>
                                                    <option value="Jordanie">Jordanie</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kirghizistan">Kirghizistan</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Koweit">Koweït</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Lettonie">Lettonie</option>
                                                    <option value="Liban">Liban</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libye">Libye</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lituanie">Lituanie</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macedoine">Macédoine</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malaisie">Malaisie</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malte">Malte</option>
                                                    <option value="Maroc">Maroc</option>
                                                    <option value="Marshall">Marshall</option>
                                                    <option value="Maurice">Maurice</option>
                                                    <option value="Mauritanie">Mauritanie</option>
                                                    <option value="Mexique">Mexique</option>
                                                    <option value="Micronesie">Micronésie</option>
                                                    <option value="Moldavie">Moldavie</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolie">Mongolie</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Namibie">Namibie</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Népal</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norvège">Norvège</option>
                                                    <option value="Nouvelle-Zelande">Nouvelle-Zélande</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Ouganda">Ouganda</option>
                                                    <option value="Ouzbekistan">Ouzbékistan</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papouasie-Nouvelle_Guinee">Papouasie - Nouvelle Guinée
                                                    </option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Pays-Bas">Pays-Bas</option>
                                                    <option value="Perou">Pérou</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pologne">Pologne</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Republique_centrafricaine">République centrafricaine
                                                    </option>
                                                    <option value="Republique_dominicaine">République dominicaine</option>
                                                    <option value="Republique_tcheque">République tchèque</option>
                                                    <option value="Roumanie">Roumanie</option>
                                                    <option value="Royaume-Uni">Royaume-Uni</option>
                                                    <option value="Russie">Russie</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint-Christophe-et-Nieves">Saint-Christophe-et-Niévès
                                                    </option>
                                                    <option value="Sainte-Lucie">Sainte-Lucie</option>
                                                    <option value="Saint-Marin">Saint-Marin </option>
                                                    <option value="Saint-Siège">Saint-Siège, ou leVatican</option>
                                                    <option value="Saint-Vincent-et-les_Grenadines">Saint-Vincent-et-les
                                                        Grenadines</option>
                                                    <option value="Salomon">Salomon</option>
                                                    <option value="Salvador">Salvador</option>
                                                    <option value="Samoa_occidentales">Samoa occidentales</option>
                                                    <option value="Sao_Tome-et-Principe">Sao Tomé-et-Principe</option>
                                                    <option value="Senegal">Sénégal</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra_Leone">Sierra Leone</option>
                                                    <option value="Singapour">Singapour</option>
                                                    <option value="Slovaquie">Slovaquie</option>
                                                    <option value="Slovenie">Slovénie</option>
                                                    <option value="Somalie">Somalie</option>
                                                    <option value="Soudan">Soudan</option>
                                                    <option value="Sri_Lanka">Sri Lanka</option>
                                                    <option value="Sued">Suède</option>
                                                    <option value="Suisse">Suisse</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Syrie">Syrie</option>
                                                    <option value="Tadjikistan">Tadjikistan</option>
                                                    <option value="Tanzanie">Tanzanie</option>
                                                    <option value="Tchad">Tchad</option>
                                                    <option value="Thailande">Thaïlande</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinite-et-Tobago">Trinité-et-Tobago</option>
                                                    <option value="Tunisie">Tunisie</option>
                                                    <option value="Turkmenistan">Turkménistan</option>
                                                    <option value="Turquie">Turquie</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Viet_Nam">Viêt Nam</option>
                                                    <option value="Yemen">Yémen</option>
                                                    <option value="Yougoslavie">Yougoslavie</option>
                                                    <option value="Zaire">Zaïre</option>
                                                    <option value="Zambie">Zambie</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
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
                                    <th>pays</th>
                                    <th>la date de creation</th>
                                    <th>la date de modification</th>
                                    <th style="width: 10%!important">modification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marques as $marque)
                                    <tr>
                                        <td>{{ $marque->id }}</td>
                                        <td>{{ $marque->name }}</td>
                                        <td>{{ $marque->pays }}</td>
                                        <td>{{ $marque->created_at }}</td>
                                        <td>{{ $marque->updated_at }}</td>
                                        <td style="width: 10%!important">
                                            <div class="row">
                                                <div class="col ml-1">
                                                    <form id="{{ $marque->id }}"
                                                        action="{{ route('deletemarque', $marque->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button
                                                        onClick="
                                                                                                                                                event.preventDefault(); if(confirm('u sure ?')) document.getElementById({{ $marque->id }}).submit()"
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
                                    <th>pays</th>
                                    <th>la date de creation</th>
                                    <th>la date de modification</th>
                                    <th style="width: 10%!important">modification</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fa fa-plus"></i> &nbsp ajouter une marque
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
                $('#fpays').val(data[2]);
                let st = data[0];
                console.log(st);
                $('#editForm').attr('action', "/admin/updatemarque/" + data[0]);
                $('#editModal').modal("show");
            });

        });
    </script>
@endsection
