@extends('layouts.app')

    @section('title', 'Les Articles')

    @section('sub-css')
<!-- Data table css -->
        <link href="assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/plugins/datatable/css/buttons.bootstrap4.min.css">
        <link href="assets/plugins/datatable/responsive.bootstrap4.min.css" rel="stylesheet" />
    @endsection

    
    @section('sub-js')
<!-- Data table Js -->
        <script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
        <script src="assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
        <script src="assets/plugins/datatable/js/jquery.dataTables.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatable/responsive.bootstrap4.min.js"></script>
        <script src="assets/js/table-data.js"></script>
    @endsection