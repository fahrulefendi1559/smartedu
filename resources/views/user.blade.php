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
                            <th>Email</th>
                            <th>Aksi</th>
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
@push('script')
    <script src="{{ asset('assets/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/sweetalert2/dist/sweetalert2.all.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                order: [ [0, 'desc'] ],
                ajax: "{{ route('data_user') }}",
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action' },
                ]
            });

            $('#tambah_user').on('submit', function () {
                var email = $('#email').val();  // diambil dari id nama yang ada diform modal
                var password = $('#password').val();
                var name = $('#name').val();

                $.ajax({
                    type      : "GET",
                    url       : "{{ route('store_user') }}",
                    beforeSend: function () {
                        swal({
                            title : 'Menunggu',
                            html  : 'Memproses data',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        "_token": "{{ csrf_token() }}",
                        email: email,
                        password: password,
                        name:   name,
                    },
                    dataType: "JSON",
                    success : function (data) {
                        swal({
                            type : 'success',
                            title: 'Tambah User',
                            text : 'Anda Berhasil Menambah User'
                        })
                        $('#tambah-user').modal('hide');
                        $('#email').val('');
                        $('#name').val('');
                        $('#password').val('');
                        $('#users').DataTable().draw(true);
                    },
                    error : function(error) {
                        if(error.status == 422){
                            var msg = '<ul>';
                            var errors = error.responseJSON.errors;
                            $.each(errors, function (key, val) {
                                msg += '<li>' + val + '</li>';
                            });

                            errorMsg = msg += '</ul>'
                            swal({
                                type : 'error',
                                title: 'Oops Error!',
                                html : errorMsg
                            })
                            $('#tambah-user').modal('hide');
                        }
                        $('#tambah-user').modal('hide');
                    }
                })
                return false;
            });

            // $('#users').on('click', '.edit_user', function () {
            //     var id_user = $(this).data('id_user')
            //     console.log(id_user)
            //     {{--swal({--}}
            //     {{--    title             : 'Konfirmasi',--}}
            //     {{--    text              : "Anda ingin hapus file",--}}
            //     {{--    type              : 'warning',--}}
            //     {{--    showCancelButton  : true,--}}
            //     {{--    confirmButtonText : 'Hapus',--}}
            //     {{--    confirmButtonColor: '#d33',--}}
            //     {{--    cancelButtonColor : '#3085d6',--}}
            //     {{--    cancelButtonText  : 'Tidak',--}}
            //     {{--    reverseButtons    : true--}}
            //     {{--}).then((result) => {--}}
            //     {{--    if (result.value) {--}}
            //     {{--        $.ajax({--}}
            //     {{--            url : "{{ route('file.delete') }}",--}}
            //     {{--            method : "GET",--}}
            //     {{--            beforeSend : function () {--}}
            //     {{--                swal({--}}
            //     {{--                    title : 'Menunggu',--}}
            //     {{--                    html : 'Memproses Data',--}}
            //     {{--                    onOpen: () => {--}}
            //     {{--                        swal.showLoading()--}}
            //     {{--                    }--}}
            //     {{--                })--}}
            //     {{--            },--}}
            //     {{--            data : {--}}
            //     {{--                "_token": "{{ csrf_token() }}",--}}
            //     {{--                id_file: id_file,--}}
            //     {{--            },--}}
            //     {{--            success : function (data) {--}}
            //     {{--                swal({--}}
            //     {{--                    type : 'success',--}}
            //     {{--                    title: 'Hapus File',--}}
            //     {{--                    text : 'Anda Berhasil Menghapus File'--}}
            //     {{--                })--}}
            //     {{--                $('#data-file').DataTable().draw(true);--}}
            //     {{--            },--}}
            //     {{--            error : function(error) {--}}
            //     {{--                if(error.status == 422){--}}
            //     {{--                    var msg = '<ul>';--}}
            //     {{--                    var errors = error.responseJSON.errors;--}}
            //     {{--                    $.each(errors, function (key, val) {--}}
            //     {{--                        msg += '<li>' + val + '</li>';--}}
            //     {{--                    });--}}

            //     {{--                    errorMsg = msg += '</ul>'--}}
            //     {{--                    swal({--}}
            //     {{--                        type : 'error',--}}
            //     {{--                        title: 'Oops Error!',--}}
            //     {{--                        html : errorMsg--}}
            //     {{--                    })--}}
            //     {{--                }--}}
            //     {{--            }--}}
            //     {{--        })--}}
            //     {{--    } else if(result.dismiss === swal.DismissReason.cancel){--}}
            //     {{--        swal(--}}
            //     {{--            'Batal',--}}
            //     {{--            'Anda membatalkan menghapaus data',--}}
            //     {{--            'error'--}}
            //     {{--        )--}}
            //     {{--    }--}}
            //     {{--})--}}
            // })
        });
    </script>
@endpush
