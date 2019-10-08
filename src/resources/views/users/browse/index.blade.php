@extends('OverWatch::layouts.main')

@section('content')
    <div class="container-fluid">

    </div>
    <div class="page-content">
        <div class="panel panel-bordered">
            <div class="panel-body">
                <table id="user-table" class="table table-hover dataTable no-footer" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
           var table = $('#user-table').DataTable( {
                "processing": true,
                //"serverSide": true,
                "ajax": "/admin/allusers",
                "columns" : [
                    {"data" : "name", 'name' :'name'},
                    {"data" : "email", 'name' :'email'},
                    {"data" : "created_at", 'name' :'created_at'},
                    {"data" : "role", 'name' :'role'},
                    {"data" : "actions", 'name' :'actions', 'orderable': false},
                ]


            } );
            table.on( 'xhr', function ( e, settings, json ) {
                console.log( 'Ajax event occurred. Returned data: ', json );
            } );
        } );
    </script>
@endsection
