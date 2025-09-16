@extends('layouts.menu')

@section('title')
    Manage Wedding
@endsection

@section('css')
    <link href="{{ url('assets/dashboard/assets/libs/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ url('assets/dashboard/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/dashboard/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/dashboard/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/dashboard/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/dashboard/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/dashboard/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                            <li class="breadcrumb-item active">App Master</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manage Wedding</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Wedding Data</h4>
                        <p class="text-muted font-13 mb-4">
                            Slide the table if data is to long
                        </p>

                        <table id="datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Slug</th>
                                <th>Catin 1</th>
                                <th>Catin 2</th>
                                <th>Ayah Catin 1</th>
                                <th>Ibu Catin 1</th>
                                <th>Ayah Catin 2</th>
                                <th>Ibu Catin 2</th>
                                <th>Reception Date Time</th>
                                <th>Ceremony Date Time</th>
                                <th>Party Date Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->

    <div id="input_modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Wedding Form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_input">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Catin 1</label>
                                    <input type="text" class="form-control" id="catin_1" name="catin_1" placeholder="Enter Nama Catin 1">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Catin 2</label>
                                    <input type="text" class="form-control" id="catin_2" name="catin_2" placeholder="Enter Nama Catin 2">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Bio Catin 1</label>
                                    <input type="text" class="form-control" id="bio_catin_1" name="bio_catin_1" placeholder="Enter Bio Catin 1">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Bio Catin 2</label>
                                    <input type="text" class="form-control" id="bio_catin_2" name="bio_catin_2" placeholder="Enter Bio Catin 2">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Ayah Catin 1</label>
                                    <input type="text" class="form-control" id="ayah_catin1" name="ayah_catin1" placeholder="Enter Nama Ayah Catin 1">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Ibu Catin 1</label>
                                    <input type="text" class="form-control" id="ibu_catin1" name="ibu_catin1" placeholder="Enter Nama Ibu Catin 1">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Ayah Catin 2</label>
                                    <input type="text" class="form-control" id="ayah_catin2" name="ayah_catin2" placeholder="Enter Nama Ayah Catin 2">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Ibu Catin 1</label>
                                    <input type="text" class="form-control" id="ibu_catin2" name="ibu_catin2" placeholder="Enter Nama Ibu Catin 2">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Date Time Reception</label>
                                    <input type="text" id="reception" name="reception" class="form-control flatpickr-input active" placeholder="Reception Date and Time" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Reception Address</label>
                                    <input type="text" class="form-control" id="reception_address" name="reception_address" placeholder="Enter Reception Address">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Date Time Ceremony</label>
                                    <input type="text" id="ceremony" name="ceremony" class="form-control flatpickr-input active" placeholder="Ceremony Date and Time" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Reception Address</label>
                                    <input type="text" class="form-control" id="ceremony_address" name="ceremony_address" placeholder="Enter Ceremony Address">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Date Time Party</label>
                                    <input type="text" id="party" name="party" class="form-control flatpickr-input active" placeholder="Party Date and Time" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Reception Address</label>
                                    <input type="text" class="form-control" id="party_address" name="party_address" placeholder="Enter Party Address">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" aksi="input" id="submit_form">Save</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('js')
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>

    <script src="{{ url('assets/dashboard/assets/libs/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/libs/flatpickr/flatpickr.min.js') }}"></script>


    <script type="text/javascript">
        function loadData() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax : {
                    url : "{{ url('/manage-wedding/data') }}",
                    type : "GET"
                },
                columns : [
                    { "data": "DT_RowIndex" },
                    { "data": "wedding.slug" },
                    { "data": "wedding.catin_1" },
                    { "data": "wedding.catin_2" },
                    { "data": "wedding.ayah_catin1" },
                    { "data": "wedding.ibu_catin1" },
                    { "data": "wedding.ayah_catin2" },
                    { "data": "wedding.ibu_catin2" },
                    { "data": "wedding.reception" },
                    { "data": "wedding.ceremony" },
                    { "data": "wedding.party" },
                    { "data": "action" },
                ],
                columnDefs: [
                    {
                        orderable: false,
                        searchable: false,
                        width: "20px",
                        targets: [0]
                    },
                    {
                        orderable: false,
                        width: "80px",
                        targets: [11]
                    },

                ],
                dom:
                    '<"row mx-1"' +
                    '<"col-sm-12 col-md-3" l>' +
                    '<"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1"<"me-3"f>B>>' +
                    '>t' +
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',

                buttons: [
                    {
                        text: 'Add New',
                        className: 'btn btn-primary waves-effect waves-light',
                        attr: {
                            'data-bs-toggle': 'modal',
                            'data-bs-target': '#input_modal'
                        },
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary');
                        }
                    },
                ],

                order: [[1, 'desc']],
                language: {
                    sLengthMenu: '_MENU_',
                    search: 'Search',
                    searchPlaceholder: 'Search..'
                },
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
                responsive: false,
            });
        }

        function resetForm() {
            $('#form_input input[type="text"]').val("");
        }

        $(window).on('load', function () {
            loadData();

            $(".flatpickr-input").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });

            $('#submit_form').click(function () {
                var aksi = $("#submit_form").attr("aksi");
                if(aksi=="input"){
                    $.ajax({
                        url: "{{ url('/manage-wedding/input') }}",
                        type: "post",
                        data: new FormData($('#form_input')[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,

                        success: function (response) {
                            var pesan = JSON.parse(response);
                            if(pesan.error != null){
                                $.toast({
                                    heading: 'Error',
                                    text: pesan.error,
                                    showHideTransition: 'slide',
                                    icon: 'error',
                                    position: 'bottom-right',
                                    bgColor: '#bf441d',
                                });
                                $('#datatable').DataTable().ajax.reload();
                            }else if(pesan.success != null){
                                $.toast({
                                    heading: 'Success',
                                    text: pesan.success,
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    position: 'bottom-right',
                                    bgColor: '#5ba035',
                                });
                                resetForm();
                                $('#input_modal').modal('toggle');
                                $('#datatable').DataTable().ajax.reload();
                            }else {
                                $.toast({
                                    heading: 'Error',
                                    text: "Can't insert data, please contact your administrator",
                                    showHideTransition: 'slide',
                                    icon: 'error',
                                    position: 'bottom-right',
                                    bgColor: '#da8609'
                                });
                            }


                        }
                    });
                }else if(aksi=="edit"){
                    var id_data = $("#submit_form").attr("iddata");
                    $.ajax({
                        url: "{{ url('/manage-wedding/edit') }}/"+id_data,
                        type: "post",
                        data: new FormData($('#form_input')[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,

                        success: function (response) {
                            var pesan = JSON.parse(response);
                            if(pesan.error != null){
                                $.toast({
                                    heading: 'Error',
                                    text: pesan.error,
                                    showHideTransition: 'slide',
                                    icon: 'error',
                                    position: 'bottom-right',
                                    bgColor: '#bf441d',
                                });
                                $('#datatable').DataTable().ajax.reload();
                            }else if(pesan.success != null){
                                $.toast({
                                    heading: 'Success',
                                    text: pesan.success,
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    position: 'bottom-right',
                                    bgColor: '#5ba035',
                                });
                                resetForm();
                                $('#input_modal').modal('toggle');
                                $('#datatable').DataTable().ajax.reload();

                            }else {
                                $.toast({
                                    heading: 'Error',
                                    text: "Can't insert data, please contact your administrator",
                                    showHideTransition: 'slide',
                                    icon: 'error',
                                    position: 'bottom-right',
                                    bgColor: '#da8609'
                                });
                                $('#submit_form').attr("data-aksi","input");
                            }
                        }
                    });
                }
            });

            $('#datatable tbody').on('click', '#edit', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $('#slug').val(data.wedding.slug).change();
                $('#email').val(data.email).attr('readonly', true).change();
                $('#catin_1').val(data.wedding.catin_1).change();
                $('#catin_2').val(data.wedding.catin_2).change();
                $('#bio_catin_1').val(data.wedding.bio_catin_1).change();
                $('#bio_catin_2').val(data.wedding.bio_catin_2).change();
                $('#ayah_catin1').val(data.wedding.ayah_catin1).change();
                $('#ibu_catin1').val(data.wedding.ibu_catin1).change();
                $('#ayah_catin2').val(data.wedding.ayah_catin2).change();
                $('#ibu_catin2').val(data.wedding.ibu_catin2).change();
                $('#reception').val(data.wedding.reception).change();
                $('#reception_address').val(data.wedding.reception_address).change();
                $('#ceremony').val(data.wedding.ceremony).change();
                $('#ceremony_address').val(data.wedding.ceremony_address).change();
                $('#party').val(data.wedding.party).change();
                $('#party_address').val(data.wedding.party_address).change();
                $("#submit_form").attr("aksi","edit");
                $('#submit_form').attr("iddata",data.wedding.id);
                $('#input_modal').modal('toggle');
            });

            $('#datatable tbody').on('click', '#delete', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass: "btn btn-danger ms-2 mt-2",
                    buttonsStyling: !1,
                }).then(function (e) {
                    e.value
                        ?
                        $.ajax({
                            url: "{{ url('/manage-wedding/delete/') }}/" + data.wedding.id,
                            type: "post",
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            cache: false,
                            success: function (response) {
                                var pesan = JSON.parse(response);
                                Swal.fire({
                                    title: "Deleted!",
                                    text: pesan.success,
                                    icon: "success",
                                    confirmButtonColor: "#4a4fea"
                                })
                                table.ajax.reload();
                            },
                            failure: function (response) {
                                var pesan = JSON.parse(response);
                                Swal.fire({
                                    title: "Error!",
                                    text: pesan.error,
                                    icon: "error",
                                    confirmButtonColor: "#4a4fea"
                                })
                            }
                        })
                        : e.dismiss === Swal.DismissReason.cancel;
                });
            });

            $('.modal').on('hidden.bs.modal', function () {
                resetForm();
                $("#submit_form").attr("aksi","input");
                $('#submit_form').removeAttr("iddata");
            });

        });
    </script>
@endsection
