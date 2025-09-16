@extends('layouts.menu')

@section('title')
    Invitation List
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Invitation</a></li>
                            <li class="breadcrumb-item active">Invitation List</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manage Invitation</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Invitation Data</h4>
                        <p class="text-muted font-13 mb-4">
                            Slide the table if data is to long
                        </p>

                        <table id="datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>WhatsApp Number</th>
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
                    <h4 class="modal-title" id="standard-modalLabel">Invitation Form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_input">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">WhatsApp Number</label>
                                    <input type="number" class="form-control" id="whatsapp_number" name="whatsapp_number" placeholder="Enter WhatsApp Number">
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
                    url : "{{ url('/invitation-list/data') }}",
                    type : "GET"
                },
                columns : [
                    { "data": "DT_RowIndex" },
                    { "data": "name" },
                    { "data": "whatsapp_number" },
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
                        targets: [3]
                    },
                    {
                        "defaultContent": "-",
                        "targets": '_all'
                    }

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

            $('#submit_form').click(function () {
                var aksi = $("#submit_form").attr("aksi");
                if(aksi=="input"){
                    $.ajax({
                        url: "{{ url('/invitation-list/input') }}",
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
                        url: "{{ url('/invitation-list/edit') }}/"+id_data,
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
                $('#name').val(data.name).change();
                $('#whatsapp_number').val(data.whatsapp_number).change();
                $("#submit_form").attr("aksi","edit");
                $('#submit_form').attr("iddata",data.id);
                $('#input_modal').modal('toggle');
            });

            $('#datatable tbody').on('click', '#open_link', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                var name = data.name.replace(/ /g,'_');
                var slug = data.wedding.slug.replace(/ /g,"_").replace(/&/g, "_").replace(/amp;/g, '');
                window.open('landing/'+slug+'/'+data.wedding.id+'/'+data.id+'/'+name)
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
                            url: "{{ url('/invitation-list/delete/') }}/" + data.id,
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
