@extends('layouts.app')

    @section('title', 'Les Utilisateurs')

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
                        <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                    </ol><!-- End breadcrumb -->
                    <div class="ml-auto">
                        <div class="input-group">
                            <a href="#" class="btn primary-gradient button-icon mr-3 mt-1 mb-1" data-toggle="modal" data-target="#newElementModal"> 
                                <span> <i class="fa fa-plus-circle"></i>Nouveau</span> 
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /PAGE-HEADER -->

                <!-- MODAL <Nouveau Élément> -->
                <div class="modal fade show" id="newElementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="elementModalLabel"><i class="fe fe-folder-plus"></i> Nouveau Élément</h5> 
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="alert-add"></div>
                                <form name="newElementForm" id="newElementForm" class="needs-validation" enctype="multipart/form-data" autocomplete="off" novalidate>
                                    @csrf
                                    <div id="elementFormId"></div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label">Nom <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" name="nom" maxlength="250" placeholder="nom d'utilisateur" required>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Prénom <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" name="prenom" maxlength="250" placeholder="prénom d'utilisateur" required>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Deuxiéme prénom</label>
                                                <input type="text" class="form-control" name="deuxieme_prenom" maxlength="250" placeholder="deuxiéme prénom d'utilisateur">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" maxlength="250" placeholder="email@exemple.com">
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
                                                    <input type="text" class="form-control int-number" name="telephone" maxlength="" placeholder="Numéro de téléphone">
                                                </div>
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
                                                    <input type="text" class="form-control int-number" name="telephone_mobile" maxlength="" placeholder="Numéro de téléphone mobile">
                                                </div>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="form-label">Pseudo d'utilisateur <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" name="username" maxlength="250" placeholder="pseudo d'utilisateur" required>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Mot de passe <small class="text-danger">*</small></label>
                                                <input type="password" class="form-control" name="password" maxlength="250" placeholder="******" required>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Confirmer le Mot de passe <small class="text-danger">*</small></label>
                                                <input type="password" class="form-control" name="password_confirmation" maxlength="250" placeholder="******" required>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="form-label">Rôle <small class="text-danger">*</small></label>
                                                
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-user-check tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control selectpicker" name="role_id" id="" required>
                                                        <option value="" selected disabled>Sélectionnez un rôle</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{$role->id}}">{{$role->role}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Statut de l'utilisateur :</label>
                                                <input type="hidden" name="active" value="1">
                                                <label class="custom-switch">
                                                    <input type="checkbox" name="active-switch" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description text-primary">cochez ici pour désactiver l'utilisateur et l'inverse !</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="newElementModalFooter" class="modal-footer">
                                <button type="button" class="btn btn-gray btn-block" data-dismiss="modal"><i class="fe fe-x-circle"></i> Fermer</button>
                                <button type="button" id="submitNewElementForm" class="btn primary-gradient btn-block mb-2"><i class="fe fe-save"></i> Enregistrer</button>
                                <button type="button" id="submitElementForm" class="d-none btn primary-gradient btn-block mb-2"><i class="fe fe-save"></i> Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /MODAL -->

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            @if (empty($dossier))
                                <div class="card-status bg-indigo br-tr-7 br-tl-7"></div>
                            @else 
                                <div class="card-status card-status-left bg-indigo br-bl-7 br-tl-7"></div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title text-uppercase">
                                    @if(!empty($dossier))
                                    <button onclick="location.href='{{url('/dossiers')}}'" class="btn btn-indigo btn-edit badge mr-3" data-toggle="tooltip" data-original-title="Liste des dossiers">
                                        <i class="fe fe-arrow-left"></i>
                                    </button>
                                    @endif
                                    Liste des Utilisateurs
                                </h3>
                            </div>
                            <div class="card-body">
                                @if(!empty($dossier))
                                <div class="mb-5">
                                    <form class="" id="filter-form" name="filter-form" action="/users/filter" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label class="">Filtrer par Dossier</label>
                                                <select name="dossier_id" class="form-control selectpicker" data-size="7" data-live-search="true">
                                                    <option value="" disabled>Sélectionner un dossier</option>
                                                    @foreach ($dossiers as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">&nbsp;</label><br>
                                                <button type="submit" class="btn btn-warning-light">
                                                    FILTRER <i class="fe fe-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered text-nowrap responsive w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">Nom & Prénom</th>
                                                <th class="wd-15p text-center">Pseudo</th>
                                                <th class="wd-20p text-center">Rôle</th>
                                                <th class="wd-15p text-center">Téléphone</th>
                                                <th class="wd-10p text-center">Date de création</th>
                                                <th class="wd-25p text-center">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $item)
                                            <tr id="item-{{$item->id}}">
                                                <td>{{$item->nom}} {{$item->prenom}}</td>
                                                <td class="text-center">{{$item->username}}</td>
                                                <td class="text-center">
                                                    {{$roles->where('id', $item->role_id)->first()->role}}
                                                </td>
                                                <td class="text-center">{{$item->telephone_mobile ?? '-'}}</td>
                                                <td class="text-center">{{$item->created_at ?? '-'}}</td>

                                                <td class="wd-25p text-center">
                                                    <div class="btn-list">
                                                        <button data-id="{{$item->id}}" class="btn btn-gray btn-edit badge" data-toggle="tooltip" data-original-title="Modifier">
                                                            <i class="fe fe-edit-3"></i>
                                                        </button>
                                                        <button data-id="{{$item->id}}" class="btn btn-danger-gradient btn-trash badge" data-toggle="tooltip" data-original-title="Supprimer">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- TABLE WRAPPER -->
                        </div> <!-- SECTION WRAPPER -->
                    </div>
                </div> <!-- /ROW-1 -->
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
        <!-- Jquery Populate -->
        <script src="{{asset('assets/plugins/jquery-populate/js/jquery-populate.min.js')}}"></script>
        <!-- Dropify Js -->
        <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
        <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
        <!-- DATE PICKER Js -->
        <script src="{{asset('assets/plugins/date-picker/spectrum.js')}}"></script>
        <!-- Js Module -->
        <script src="{{asset('assets/js/modules/scripts/users.js?').time()}}"></script>
    @endsection