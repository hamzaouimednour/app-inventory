@extends('layouts.app')

    @section('title', 'Les Familles')

    @section('sub-css')
<!-- Data table css -->
        <link href="assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="assets/plugins/datatable/responsive.bootstrap4.min.css" rel="stylesheet" />

        <!-- Dropify CSS -->
        <link href="assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>
    @endsection

    @section('app-content')
        <div class="app-content">
            <div class="container">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <ol class="breadcrumb">
                        <!-- breadcrumb -->
                        <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Familles</li>
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

                <!-- MODAL -->
                <div class="modal fade show" id="newElementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fe fe-folder-plus"></i> Nouveau Élément</h5> 
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                    <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="newElementForm" id="newElementForm" class="needs-validation" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Code Famille</label>
                                                <input type="text" class="form-control" name="code_famille" maxlength="10" placeholder="Code Famille">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Préfixe famille</label>
                                                <input type="text" class="form-control" name="prefixe_famille" maxlength="10" placeholder="Préfixe famille">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Ordre d'affichage</label>
                                                <input type="text" class="form-control int-number" name="ordre_affichage_famille" maxlength="3" placeholder="Ordre d'affichage">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Taux remise</label>
                                                <input type="text" class="form-control float-number" name="taux_remise" maxlength="6" pattern="[0-9]{1,3}([\.,][0-9]{1,2})?" placeholder="Taux de remise">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>

                                            <div class="form-group mb-0">
                                                <label class="form-label">Logo Famille</label>
                                                <input type="file" name="logo_famille" class="dropify" data-height="150">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Libellé</label>
                                                <input type="text" class="form-control" name="libe_famille" maxlength="70" placeholder="Libellé famille">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Compt</label>
                                                <input type="text" class="form-control int-number" name="compt_famille" maxlength="10" placeholder="Compt famille">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Couleur fond</label>
                                                <input type="text" class="form-control" name="couleur_fond_famille" maxlength="9" placeholder="Couleur fond famille">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Code spécialité</label>
                                                <input type="text" class="form-control int-number" name="code_specialite" maxlength="9" placeholder="Code spécialité famille">
                                                <div class="invalid-feedback"> Ce champ n'est pas valide.</div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <label class="form-label">Image Fond Famille</label>
                                                <input type="file" name="image_fond_famille" class="dropify" data-height="150">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-gray" data-dismiss="modal"><i class="fe fe-x-circle"></i> Fermer</button>
                                <button type="button" id="submitNewElementForm" class="btn primary-gradient"><i class="fe fe-save"></i> Enregistrer</button>
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
                                <h3 class="card-title">Liste des Familles</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered text-nowrap responsive w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">Code famille</th>
                                                <th class="wd-15p">Libellé</th>
                                                <th class="wd-20p">Position</th>
                                                <th class="wd-15p">Start date</th>
                                                <th class="wd-10p">Date de création</th>
                                                <th class="wd-25p text-center">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bella</td>
                                                <td>Chloe</td>
                                                <td>System Developer</td>
                                                <td>2018/03/12</td>
                                                <td>$654,765</td>
                                                <td class="wd-25p text-center">
                                                    <div class="btn-list">
                                                        <button class="btn btn-gray badge" data-toggle="tooltip" data-original-title="Modifier">
                                                            <i class="fe fe-edit-3"></i>
                                                        </button>
                                                        <button class="btn btn-danger-gradient badge" data-toggle="tooltip" data-original-title="Supprimer">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bella</td>
                                                <td>Chloe</td>
                                                <td>System Developer</td>
                                                <td>2018/03/12</td>
                                                <td>$654,765</td>
                                                <td class="wd-25p text-center">
                                                    <div class="btn-list">
                                                        <button class="btn btn-gray badge" data-toggle="tooltip" data-original-title="Modifier">
                                                            <i class="fe fe-edit-3"></i>
                                                        </button>
                                                        <button class="btn btn-danger-gradient badge" data-toggle="tooltip" data-original-title="Supprimer">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bella</td>
                                                <td>Chloe</td>
                                                <td>System Developer</td>
                                                <td>2018/03/12</td>
                                                <td>$654,765</td>
                                                <td class="wd-25p text-center">
                                                    <div class="btn-list">
                                                        <button class="btn btn-gray badge" data-toggle="tooltip" data-original-title="Modifier">
                                                            <i class="fe fe-edit-3"></i>
                                                        </button>
                                                        <button class="btn btn-danger-gradient badge" data-toggle="tooltip" data-original-title="Supprimer">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bella</td>
                                                <td>Chloe</td>
                                                <td>System Developer</td>
                                                <td>2018/03/12</td>
                                                <td>$654,765</td>
                                                <td class="wd-25p text-center">
                                                    <div class="btn-list">
                                                        <button class="btn btn-gray badge" data-toggle="tooltip" data-original-title="Modifier">
                                                            <i class="fe fe-edit-3"></i>
                                                        </button>
                                                        <button class="btn btn-danger-gradient badge" data-toggle="tooltip" data-original-title="Supprimer">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
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
        <script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatable/datatable.js"></script>
        <script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatable/responsive.bootstrap4.min.js"></script>
        <!-- Dropify Js -->
        <script src="assets/plugins/fileuploads/js/fileupload.js"></script>
        <script src="assets/plugins/fileuploads/js/file-upload.js"></script>
    @endsection