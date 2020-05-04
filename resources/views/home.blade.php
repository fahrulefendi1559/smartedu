@extends('layouts.main')
@push('css')
    <link href="{{ asset('assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2><b>Manajemen User</b></h2>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-title">
                <button data-toggle="modal" href="#tambah-user" class="btn btn-primary btn-xs" type="submit"><i class="fa fa-pencil-square-o"></i> Tambah Data</button>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table id="users" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Unit</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="tambah-user" class="modal inmodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-user modal-icon"></i> -->
                    <h4 class="modal-title">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    <form id="tambah_user">
                        @csrf
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label><b>Email</b></label>
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <Label><b>Password</b></Label>
                            <input type="text" class="form-control" placeholder="Password" name="password" id="password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
