@extends('layouts.app')

    @section('title', 'Acceuil')

    @section('app-content')
        <div class="app-content">
            <div class="container">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <ol class="breadcrumb">
                        <!-- breadcrumb -->
                        <li class="breadcrumb-item"><a href="{{asset('/')}}">Acceuil</a></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol><!-- End breadcrumb -->
                </div>
                <!-- /PAGE-HEADER -->


                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card bg-primary img-card box-primary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">{{$dossierNbr}}</h2>
                                        <p class="text-white mb-0">Total Dossiers </p>
                                    </div>
                                    <div class="ml-auto"> <i class="fa fa-server text-white fs-30 mr-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- COL END -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card bg-success img-card box-success-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">45,789</h2>
                                        <p class="text-white mb-0">Total Revenue</p>
                                    </div>
                                    <div class="ml-auto"> <i class="fa fa-bar-chart text-white fs-30 mr-2 mt-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- COL END -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card bg-info img-card box-info-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">89,786</h2>
                                        <p class="text-white mb-0">Total Profit</p>
                                    </div>
                                    <div class="ml-auto"> <i class="fa fa-dollar text-white fs-30 mr-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- COL END -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card bg-danger img-card box-danger-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">43,336</h2>
                                        <p class="text-white mb-0">Monthly Sales</p>
                                    </div>
                                    <div class="ml-auto"> <i class="fa fa-cart-plus text-white fs-30 mr-2 mt-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- COL END -->
                </div>

                <div class="row row-deck">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Dernières Activités</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Project Name</th>
                                            <th>Team Lead</th>
                                            <th>Date</th>
                                            <th>Due Date</th>
                                            <th>Feedback</th>
                                            <th>Status</th>
                                            <th>Preview</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2345</td>
                                            <td class="text-sm font-weight-600">Megan Peters</td>
                                            <td>Season Claeys</td>
                                            <td class="text-nowrap">Jan 13, 2019</td>
                                            <td class="text-nowrap">Mar 24, 2020</td>
                                            <td>please check pricing Info </td>
                                            <td class="text-success">Completed</td>
                                            <td class="text-nowrap"><a class="btn btn-outline-primary" href="#">View
                                                    Project</a></td>
                                        </tr>
                                        <tr>
                                            <td>4562</td>
                                            <td class="text-sm font-weight-600">Phil Vance</td>
                                            <td>Meagan Moone</td>
                                            <td class="text-nowrap">Jan 15, 2019</td>
                                            <td class="text-nowrap">Apr 25, 2020</td>
                                            <td>New stock</td>
                                            <td class="text-orange">Pending</td>
                                            <td class="text-nowrap"><a class="btn btn-outline-primary" href="#">View
                                                    Project</a></td>
                                        </tr>
                                        <tr>
                                            <td>8765</td>
                                            <td class="text-sm font-weight-600">Adam Sharp</td>
                                            <td>Freeda Harig</td>
                                            <td class="text-nowrap">Jan 8, 2019</td>
                                            <td class="text-nowrap">Nox 18, 2019</td>
                                            <td>Daily updates</td>
                                            <td class="text-yellow">Ongoing Process</td>
                                            <td class="text-nowrap"><a class="btn btn-outline-primary" href="#">View
                                                    Project</a></td>
                                        </tr>
                                        <tr>
                                            <td>2665</td>
                                            <td class="text-sm font-weight-600">Samantha Slater</td>
                                            <td>Lena Pompa</td>
                                            <td class="text-nowrap">Jan 28, 2019</td>
                                            <td class="text-nowrap">Feb 28, 2020</td>
                                            <td>available item list</td>
                                            <td class="text-success">Completed</td>
                                            <td class="text-nowrap"><a class="btn btn-outline-primary" href="#">View
                                                    Project</a></td>
                                        </tr>
                                        <tr>
                                            <td>1245</td>
                                            <td class="text-sm font-weight-600">Joanne Nash</td>
                                            <td>Whitney Cadle</td>
                                            <td class="text-nowrap">Jan 2, 2019</td>
                                            <td class="text-nowrap">Dec 12, 2019</td>
                                            <td>Provide Best Services</td>
                                            <td class="text-orange">Pending</td>
                                            <td class="text-nowrap"><a class="btn btn-outline-primary" href="#">View
                                                    Project</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div> <!-- /CONTAINER -->
        </div> <!-- /APP CONTENT -->
    @endsection
