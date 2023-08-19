@extends('layouts.app')

    @section('title', 'Les Dossiers')

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
                        <li class="breadcrumb-item active" aria-current="page">Dossiers</li>
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
                <div class="modal fade show" id="newElementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fe fe-folder-plus"></i> Nouveau Élément</h5> 
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="alert-add"></div>
                                <form name="newElementForm" id="newElementForm" class="needs-validation" enctype="multipart/form-data" autocomplete="off" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label">Libellé</label>
                                                <input type="text" class="form-control" name="name" maxlength="250" placeholder="Libellé du dossier" required>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea name="description" class="form-control" rows="5" placeholder="Description du dossier"></textarea>
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
                                                    <input type="text" class="form-control int-number" name="phone" maxlength="" placeholder="Numéro de téléphone">
                                                </div>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="form-label">Licenses des Utilisateurs</label>
                                                <input type="number" class="form-control int-number" name="user_licenses" min="0" placeholder="Nombre des Utilisateurs" required>
                                                <label class="custom-switch mt-3">
                                                    <input type="checkbox" name="user-licenses-switch" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description text-primary">cochez ici pour un nombre illimité d'utilisateurs !</span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Licenses des Dossiers</label>
                                                <input type="number" class="form-control int-number" name="dossier_licenses" min="0" placeholder="Nombre des dossiers" required>
                                                <label class="custom-switch mt-3">
                                                    <input type="checkbox" name="dossier-licenses-switch" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description text-primary">cochez ici pour un nombre illimité des dossiers !</span>
                                                </label>
                                            </div>
                                            <div class="input-form-group">
                                                <div class="form-group">
                                                    <label class="form-label">Date début de Licence</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                            </div>
                                                        </div>
                                                        <input name="license_start_date" class="form-control fc-datepicker" placeholder="YYYY-MM-DD" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Date fin de Licence</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                            </div>
                                                        </div>
                                                        <input name="license_end_date" class="form-control fc-datepicker" placeholder="YYYY-MM-DD" type="text" required>
                                                    </div>
                                                </div>
                                                <label class="custom-switch mt-3">
                                                    <input type="checkbox" name="date-licence-switch" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description text-primary">cochez ici pour une delai illimité !</span>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="form-label">Nom de sous-domaine</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-globe tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control domain-str" name="subdomain" maxlength="" pattern="[a-zA-Z0-9-]*" placeholder="sous-domaine" required>
                                                </div>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Nom de Base de données</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-database tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control db-str" name="dossier_db_name" maxlength="" pattern="[a-zA-Z0-9_-]*" placeholder="Nom de la Base de données" required>
                                                </div>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-gray btn-block" data-dismiss="modal"><i class="fe fe-x-circle"></i> Fermer</button>
                                <button type="button" id="submitNewElementForm" class="btn primary-gradient btn-block mb-2"><i class="fe fe-save"></i> Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /MODAL -->

                <!-- MODAL <Extra> -->
                <div class="modal fade show" id="extraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1"><i class="fe fe-users"></i> Administrateurs de dossier</h5> 
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="extraElementForm" id="extraElementForm" class="needs-validation" autocomplete="off" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col">

                                            <div class="form-group">
                                                <label class="form-label">Libellé de dossier :</label>
                                                <input type="hidden" name="dossier_id" value="" required>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-server"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="dossier_name" placeholder="Dossier" style="pointer-events: none;">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Administrateur(s) dossier : <small class="text-danger">*</small></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-user-check tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control selectpicker" name="user_id[]" title="Sélectionnez le/les Administrateurs" data-size="7" data-live-search="true" multiple required>
                                                        @foreach ($dossierAdmins as $item)
                                                            <option value="{{$item->id}}">{{$item->nom}} {{$item->prenom}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-gray btn-block" data-dismiss="modal"><i class="fe fe-x-circle"></i> Fermer</button>
                                <button type="button" id="submitExtraElementForm" class="btn primary-gradient btn-block mb-2"><i class="fe fe-save"></i> Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /MODAL -->

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-uppercase">Liste des Dossiers</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered text-nowrap responsive w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">Libellé</th>
                                                <th class="wd-15p">Sous-domaine</th>
                                                <th class="wd-20p">Licences utilisateurs</th>
                                                <th class="wd-15p">Licences Dossiers</th>
                                                <th class="wd-10p">Date de Licence</th>
                                                <th class="wd-25p text-center">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dossiers as $dossier)
                                            <tr id="item-{{$dossier->id}}">
                                                <td id="item-lib-{{$dossier->id}}">{{$dossier->name}}</td>
                                                <td class="text-center">{{$dossier->subdomain}}</td>
                                                <td class="text-center">
                                                    {{($dossier->user_licenses === 'unlimited') ? 'illimité' : $dossier->user_licenses }}
                                                </td>
                                                <td class="text-center">
                                                    {{($dossier->dossier_licenses === 'unlimited') ? 'illimité' : $dossier->dossier_licenses }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($dossier->date_license)
                                                        illimité
                                                    @else
                                                        {{(new DateTime($dossier->license_start_date))->format('Y/m/d')}} - {{(new DateTime($dossier->license_end_date))->format('Y/m/d')}}
                                                    @endif
                                                </td>

                                                <td class="wd-25p text-center">
                                                    <div class="btn-list">
                                                        <button data-id="{{$dossier->id}}" class="btn btn-gray btn-admin badge" data-toggle="tooltip" data-original-title="propriétaire">
                                                            <i class="fe fe-user-plus"></i>
                                                        </button>
                                                        <button data-id="{{$dossier->id}}" class="btn btn-gray btn-users badge" data-toggle="tooltip" data-original-title="Utilisateurs">
                                                            <i class="fe fe-users"></i>
                                                        </button>
                                                        <button data-id="{{$dossier->id}}" class="btn btn-gray btn-edit badge" data-toggle="tooltip" data-original-title="Modifier">
                                                            <i class="fe fe-edit-3"></i>
                                                        </button>
                                                        <button data-id="{{$dossier->id}}" class="btn btn-danger-gradient btn-trash badge" data-toggle="tooltip" data-original-title="Supprimer">
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
        <!-- Dropify Js -->
        <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
        <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
        <!-- DATE PICKER Js -->
        <script src="{{asset('assets/plugins/date-picker/spectrum.js')}}"></script>
        <!-- Js Module -->
        <script src="{{asset('assets/js/modules/scripts/dossiers.js?').time()}}"></script>
    @endsection