@extends('layouts.app')

    @section('title', 'Groupes d\'autorisation')

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
                        <li class="breadcrumb-item active" aria-current="page">Groupes d'autorisation</li>
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
                                <form name="newElementForm" id="newElementForm"  autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            
                                            <div class="form-group">
                                                <label class="form-label">Groupe d'autorisation : <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" name="group_name" maxlength="255" placeholder="Nom de groupe" required>
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label mb-3">Les Modules & Les Permissions : <small class="text-danger">*</small></label>
                                                @foreach ($modules as $item)
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <i class="fa fa-cog text-gray-dark mr-2" aria-hidden="true"></i>
                                                        <strong> {{$item->module}}</strong>
                                                        <div id="{{$item->id}}" class="material-switch pull-right">
                                                            <input id="material-switch-{{$item->id}}" name="module[]" type="checkbox"> 
                                                            <label for="material-switch-{{$item->id}}" class="label-warning"></label> 
                                                        </div>
                                                    </li>
                                                    <li id="actions-{{$item->id}}" class="list-group-item d-none">
                                                        <ul class="list-group">
                                                            @php
                                                                $moduleActions = json_decode($item->actions, true);
                                                            @endphp
                                                            @if (in_array('A', $moduleActions))
                                                            <li class="list-group-item justify-content-between"> 
                                                                <label class="custom-control custom-checkbox"> 
                                                                    <input type="checkbox" class="custom-control-input" name="modules[{{$item->id}}][]" value="A">
                                                                    <span class="custom-control-label">Création</span>
                                                                </label>
                                                            </li>
                                                            @endif
                                                            @if (in_array('M', $moduleActions))
                                                            <li class="list-group-item justify-content-between"> 
                                                                <label class="custom-control custom-checkbox"> 
                                                                    <input type="checkbox" class="custom-control-input" name="modules[{{$item->id}}][]" value="M">
                                                                    <span class="custom-control-label">Modification</span>
                                                                </label>
                                                            </li>
                                                            @endif
                                                            @if (in_array('D', $moduleActions))
                                                            <li class="list-group-item justify-content-between"> 
                                                                <label class="custom-control custom-checkbox"> 
                                                                    <input type="checkbox" class="custom-control-input" name="modules[{{$item->id}}][]" value="D">
                                                                    <span class="custom-control-label">Suppression</span>
                                                                </label>
                                                            </li>
                                                            @endif
                                                            @if (in_array('P', $moduleActions))
                                                            <li class="list-group-item justify-content-between"> 
                                                                <label class="custom-control custom-checkbox"> 
                                                                    <input type="checkbox" class="custom-control-input" name="modules[{{$item->id}}][]" value="P">
                                                                    <span class="custom-control-label">Impression</span>
                                                                </label>
                                                            </li>
                                                            @endif
                                                            @if (in_array('V', $moduleActions))
                                                            <li class="list-group-item justify-content-between"> 
                                                                <label class="custom-control custom-checkbox"> 
                                                                    <input type="checkbox" class="custom-control-input" name="modules[{{$item->id}}][]" value="V">
                                                                    <span class="custom-control-label">Accéder à tous les éléments</span>
                                                                </label>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </li>
                                                </ul>
                                                @endforeach
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label">Statut de groupe :</label>
                                                <input type="hidden" name="status" value="1">
                                                <label class="custom-switch">
                                                    <input type="checkbox" name="active-switch" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description text-primary">cochez ici pour désactiver le groupe et l'inverse !</span>
                                                </label>
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

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-uppercase">Les Groupes d'autorisation</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered text-nowrap responsive w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">Nom de groupe</th>
                                                <th class="wd-15p">Statut</th>
                                                <th class="wd-20p">Date de création</th>
                                                <th class="wd-25p text-center">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($moduleGroups as $item)
                                            <tr id="item-{{$item->id}}">
                                                <td id="item-lib-{{$item->id}}">{{$item->group_name}}</td>
                                                <td class="text-center">
                                                    @if($item->status)
                                                        <span class="badge badge-success-gradient">Activé</span>
                                                    @else
                                                        <span class="badge badge-warning-gradient">Désactivé</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$item->created_at}}</td>
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
        <!-- Dropify Js -->
        <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
        <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
        <!-- DATE PICKER Js -->
        <script src="{{asset('assets/plugins/date-picker/spectrum.js')}}"></script>
        <!-- Js Module -->
        <script src="{{asset('assets/js/modules/scripts/module-groups.js?').time()}}"></script>
    @endsection