@extends('layouts.app')

    @section('title', 'Profile')

    @section('sub-css')
<!-- Data table css -->
        <link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />

        <!-- Dropify CSS -->
        <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
        <!-- DATE PICKER CSS -->
        <link href="{{asset('assets/plugins/date-picker/spectrum.css')}}" rel="stylesheet"/>
        <!-- BOOTSTRAP SELECT CSS -->
        <link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet"/>
    @endsection

    @section('app-content')
        <div class="app-content">
            <div class="container">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <ol class="breadcrumb">
                        <!-- breadcrumb -->
                        <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol><!-- End breadcrumb -->
                </div>
                <!-- /PAGE-HEADER -->

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Mettre à jour votre profile
                                </h3>
                            </div>
                            @php
                                $user = Auth::user();
                            @endphp
                            <div class="card-body">
                                <div id="alert-info"></div>
                                <form name="editElementForm" id="editElementForm" class="needs-validation" enctype="multipart/form-data" autocomplete="off" novalidate>
                                    @method('PATCH')
                                    @csrf
                                    <input name="id" type="hidden" value="{{Auth::id()}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nom <small class="text-danger">*</small></label>
                                                <input type="text" value="{{$user->nom}}" class="form-control" name="nom" maxlength="250" placeholder="nom d'utilisateur" required>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Deuxiéme prénom</label>
                                                <input type="text" class="form-control" name="deuxieme_prenom" value="{{$user->deuxieme_prenom}}" maxlength="250" placeholder="deuxiéme prénom d'utilisateur">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Prénom <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" name="prenom" value="{{$user->prenom}}" maxlength="250" placeholder="prénom d'utilisateur" required>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label class="form-label">Photo de profile</label>
                                                <input type="file" name="img" class="dropify" data-height="190">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Pseudo d'utilisateur <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" name="username" maxlength="250" value="{{$user->username}}" placeholder="pseudo d'utilisateur" required>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Téléphone</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control int-number" name="telephone" value="{{$user->telephone}}" maxlength="" placeholder="Numéro de téléphone">
                                                </div>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" value="{{$user->email}}" maxlength="250" placeholder="email@exemple.com">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Téléphone mobile</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control int-number" name="telephone_mobile" value="{{$user->telephone_mobile}}" maxlength="" placeholder="Numéro de téléphone mobile">
                                                </div>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Mot de passe Actuel </label>
                                                <input type="password" class="form-control" name="password_old" maxlength="250" placeholder="******">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nouveau Mot de passe </label>
                                                <input type="password" class="form-control" name="password" maxlength="250" placeholder="******">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Confirmer le Nouveau Mot de passe </label>
                                                <input type="password" class="form-control" name="password_confirmation" maxlength="250" placeholder="******">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row justify-content-end mt-5">
                                        <div class="col-md-4 mt-5">
                                            <button id="submitEditElementForm" class="btn btn-success btn-block text-uppercase"><i class="fe fe-save"></i> enregistrer</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div> <!-- /ROW-1 -->
                </div> <!-- /CARD -->
            </div> <!-- /CONTAINER -->
        </div> <!-- /APP CONTENT -->
    @endsection

    @section('sub-js')
<!-- Data table Js -->
        <script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/datatable.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
        <!-- BOOTSTRAP SELECT Js -->
        <script src="{{asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
        <!-- Dropify Js -->
        <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
        <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
        <!-- DATE PICKER Js -->
        <script src="{{asset('assets/plugins/date-picker/spectrum.js')}}"></script>
        <!-- Js Module -->
        <script src="{{asset('assets/js/modules/scripts/profile.js?').time()}}"></script>
    @endsection