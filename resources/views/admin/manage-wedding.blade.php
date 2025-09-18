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
                                    <label class="form-label">Image Catin 1</label>
                                    <input type="file" class="form-control" id="image_catin_1" name="image_catin_1" accept="image/*">
                                    <div id="preview_catin_1" class="mt-2"></div>
                                    <small class="text-muted">Recommended size: 400x400px. Max file size: 2MB</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Image Catin 2</label>
                                    <input type="file" class="form-control" id="image_catin_2" name="image_catin_2" accept="image/*">
                                    <div id="preview_catin_2" class="mt-2"></div>
                                    <small class="text-muted">Recommended size: 400x400px. Max file size: 2MB</small>
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
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Google Maps Share Location</label>
                                    <input type="url" class="form-control" id="google_maps_url" name="google_maps_url" placeholder="Enter Google Maps Share URL">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Waze Share Location</label>
                                    <input type="url" class="form-control" id="waze_url" name="waze_url" placeholder="Enter Waze Share URL">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Bank Account for Gifts</label>
                                    <input type="text" class="form-control" id="bank_account" name="bank_account" placeholder="Enter Bank Account Number">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Account Holder Name</label>
                                    <input type="text" class="form-control" id="account_holder" name="account_holder" placeholder="Enter Account Holder Name">
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
    
    <!-- Banner Management Modal -->
    <div id="banner_modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Banner Management - <span id="wedding_title"></span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="add_banner_btn">
                                <i class="mdi mdi-plus"></i> Add New Banner
                            </button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <table id="banner_datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Sort Order</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Banner Form Modal -->
    <div id="banner_form_modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="banner_form_title">Add Banner</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="banner_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="banner_wedding_id" name="wedding_id">
                        <input type="hidden" id="banner_id" name="banner_id">
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Banner Image *</label>
                                    <input type="file" class="form-control" id="banner_image" name="image" accept="image/*">
                                    <div id="image_preview" class="mt-2"></div>
                                    <small class="text-muted">Recommended size: 1920x1080px. Max file size: 2MB</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Sort Order</label>
                                    <input type="number" class="form-control" id="banner_sort_order" name="sort_order" value="0" min="0">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_banner">Save Banner</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Love Story Management Modal -->
    <div id="love_story_modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Love Story Management - <span id="love_story_wedding_title"></span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="add_love_story_btn">
                                <i class="mdi mdi-plus"></i> Add New Love Story
                            </button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <table id="love_story_datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Love Story Form Modal -->
    <div id="love_story_form_modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="love_story_form_title">Add Love Story</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="love_story_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="love_story_wedding_id" name="wedding_id">
                        <input type="hidden" id="love_story_id" name="love_story_id">
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Love Story Image</label>
                                    <input type="file" class="form-control" id="love_story_image" name="image" accept="image/*">
                                    <div id="love_story_image_preview" class="mt-2"></div>
                                    <small class="text-muted">Recommended size: 800x600px. Max file size: 2MB</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control" id="love_story_title" name="title" placeholder="Enter story title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Date *</label>
                                    <input type="text" class="form-control love-story-date" id="love_story_date" name="date" placeholder="Select date" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Description *</label>
                                    <textarea class="form-control" id="love_story_description" name="description" rows="4" placeholder="Enter story description" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Order</label>
                                    <input type="number" class="form-control" id="love_story_order" name="order" value="0" min="0">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_love_story">Save Love Story</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Gallery Management Modal -->
    <div id="gallery_modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Gallery Management - <span id="gallery_wedding_title"></span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="add_gallery_btn">
                                <i class="mdi mdi-plus"></i> Add Gallery Images
                            </button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <table id="gallery_datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Gallery Form Modal -->
    <div id="gallery_form_modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="gallery_form_title">Add Gallery Images</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="gallery_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="gallery_wedding_id" name="wedding_id">
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Gallery Images *</label>
                                    <input type="file" class="form-control" id="gallery_images" name="images[]" accept="image/*" multiple>
                                    <div id="gallery_images_preview" class="mt-2 row"></div>
                                    <small class="text-muted">You can select multiple images. Recommended size: 1200x800px. Max file size: 5MB per image. Max 10 images at once.</small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_gallery">Upload Images</button>
                </div>
            </div>
        </div>
    </div>
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
        let bannerDataTable;
        let loveStoryDataTable;
        let galleryDataTable;
        let currentWeddingId;
        
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
                        width: "120px",
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
        
        function loadBannerData(weddingId) {
            if (bannerDataTable) {
                bannerDataTable.destroy();
            }
            
            bannerDataTable = $('#banner_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/banners/data') }}/" + weddingId,
                    type: "GET"
                },
                columns: [
                    { "data": "DT_RowIndex" },
                    { 
                        "data": "image_path",
                        "render": function(data, type, row) {
                            if (data) {
                                return '<img src="' + data + '" alt="Banner" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">';
                            }
                            return '<span class="text-muted">No Image</span>';
                        }
                    },
                    { "data": "sort_order" },
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
                        targets: [1]
                    },
                    {
                        orderable: false,
                        width: "100px",
                        targets: [3]
                    },
                ],
                order: [[3, 'asc']],
                language: {
                    sLengthMenu: '_MENU_',
                    search: 'Search',
                    searchPlaceholder: 'Search banners..'
                },
                scrollX: true,
                responsive: false,
            });
        }
        
        function loadLoveStoryData(weddingId) {
            if (loveStoryDataTable) {
                loveStoryDataTable.destroy();
            }
            
            loveStoryDataTable = $('#love_story_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/love-stories/data') }}/" + weddingId,
                    type: "GET"
                },
                columns: [
                    { "data": "DT_RowIndex" },
                    { 
                        "data": "image_path",
                        "render": function(data, type, row) {
                            if (data) {
                                return '<img src="' + data + '" alt="Love Story" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">';
                            }
                            return '<span class="text-muted">No Image</span>';
                        }
                    },
                    { "data": "title" },
                    { "data": "formatted_date" },
                    { "data": "order" },
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
                        targets: [1]
                    },
                    {
                        orderable: false,
                        width: "100px",
                        targets: [5]
                    },
                ],
                order: [[4, 'asc']], // Order by 'order' column
                language: {
                    sLengthMenu: '_MENU_',
                    search: 'Search',
                    searchPlaceholder: 'Search love stories..'
                },
                scrollX: true,
                responsive: false,
            });
        }
        
        function loadGalleryData(weddingId) {
            if (galleryDataTable) {
                galleryDataTable.destroy();
            }
            
            galleryDataTable = $('#gallery_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/galleries/get') }}",
                    type: "GET",
                    data: {
                        wedding_id: weddingId
                    }
                },
                columns: [
                    { "data": "DT_RowIndex" },
                    { 
                        "data": "image_path",
                        "render": function(data, type, row) {
                            return data;
                        }
                    },
                    { "data": "order" },
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
                        width: "120px",
                        targets: [1]
                    },
                    {
                        orderable: false,
                        width: "100px",
                        targets: [3]
                    },
                ],
                order: [[2, 'asc']],
                language: {
                    sLengthMenu: '_MENU_',
                    search: 'Search',
                    searchPlaceholder: 'Search gallery..'
                },
                scrollX: true,
                responsive: false,
            });
        }
        
        function resetLoveStoryForm() {
            $('#love_story_form')[0].reset();
            $('#love_story_id').val('');
            $('#love_story_image_preview').empty();
            $('#love_story_form_title').text('Add Love Story');
        }

        function resetForm() {
            $('#form_input input[type="text"]').val("");
            $('#form_input input[type="file"]').val("");
            // Reset catin image previews
            $('#preview_catin_1').empty().hide();
            $('#preview_catin_2').empty().hide();
            $('#image_catin_1').val('');
            $('#image_catin_2').val('');
        }
        
        // Image preview functionality for Catin images
        function setupImagePreview() {
            // Catin 1 Image Preview
            $('#image_catin_1').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_catin_1').html('<img src="' + e.target.result + '" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 4px;" alt="Catin 1 Preview">').show();
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#preview_catin_1').empty().hide();
                }
            });
            
            // Catin 2 Image Preview
            $('#image_catin_2').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_catin_2').html('<img src="' + e.target.result + '" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 4px;" alt="Catin 2 Preview">').show();
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#preview_catin_2').empty().hide();
                }
            });
        }
        
        function resetBannerForm() {
            $('#banner_form')[0].reset();
            $('#banner_id').val('');
            $('#image_preview').empty();
            $('#banner_form_title').text('Add Banner');
        }

        $(window).on('load', function () {
            loadData();
            setupImagePreview(); // Initialize image preview functionality

            $(".flatpickr-input").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });

            $(".love-story-date").flatpickr({
                dateFormat: "Y-m-d",
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
                                $("#submit_form").attr("data-aksi","input");
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
                $('#google_maps_url').val(data.wedding.google_maps_url).change();
                $('#waze_url').val(data.wedding.waze_url).change();
                $('#bank_account').val(data.wedding.bank_account).change();
                $('#bank_name').val(data.wedding.bank_name).change();
                $('#account_holder').val(data.wedding.account_holder).change();
                
                // Show existing Catin images - Fixed the property names
                if (data.wedding.catin_image_1_url) {
                    $('#preview_catin_1').html('<img src="' + data.wedding.catin_image_1_url + '" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 4px;" alt="Catin 1">').show();
                } else {
                    $('#preview_catin_1').empty().hide();
                }
                
                if (data.wedding.catin_image_2_url) {
                    $('#preview_catin_2').html('<img src="' + data.wedding.catin_image_2_url + '" style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 4px;" alt="Catin 2">').show();
                } else {
                    $('#preview_catin_2').empty().hide();
                }
                
                $("#submit_form").attr("aksi","edit");
                $('#submit_form').attr("iddata",data.wedding.id);
                $('#input_modal').modal('toggle');
            });
            
            // Banner Management Click Handler
            $('#datatable tbody').on('click', '#manage_banner', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                currentWeddingId = data.wedding.id;
                $('#wedding_title').text(data.wedding.catin_1 + ' & ' + data.wedding.catin_2);
                $('#banner_wedding_id').val(currentWeddingId);
                loadBannerData(currentWeddingId);
                $('#banner_modal').modal('show');
            });
            
            // Banner Modal Event Handler - Readjust DataTable
            $('#banner_modal').on('shown.bs.modal', function () {
                // Readjust the banner datatable when modal is fully shown
                if ($.fn.DataTable.isDataTable('#banner_datatable')) {
                    $('#banner_datatable').DataTable().columns.adjust().responsive.recalc();
                }
            });
            
            // Add Banner Button
            $('#add_banner_btn').click(function() {
                resetBannerForm();
                $('#banner_wedding_id').val(currentWeddingId);
                $('#banner_form_modal').modal('show');
            });
            
            // Banner Image Preview
            $('#banner_image').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image_preview').html('<img src="' + e.target.result + '" style="max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 4px;" alt="Preview">');
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#image_preview').empty();
                }
            });
            
            // Save Banner
            $('#save_banner').click(function() {
                const formData = new FormData($('#banner_form')[0]);
                const bannerId = $('#banner_id').val();
                const url = bannerId ? "{{ url('/banners/update') }}/" + bannerId : "{{ url('/banners/store') }}";
                
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Fix: Check if response is already an object or needs parsing
                        const pesan = typeof response === 'string' ? JSON.parse(response) : response;
                        if (pesan.success) {
                            $.toast({
                                heading: 'Success',
                                text: pesan.success,
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'bottom-right',
                                bgColor: '#5ba035',
                            });
                            $('#banner_form_modal').modal('hide');
                            $('#banner_datatable').DataTable().ajax.reload();
                        } else {
                            $.toast({
                                heading: 'Error',
                                text: pesan.error || 'Something went wrong',
                                showHideTransition: 'slide',
                                icon: 'error',
                                position: 'bottom-right',
                                bgColor: '#bf441d',
                            });
                        }
                    },
                    error: function() {
                        $.toast({
                            heading: 'Error',
                            text: 'Failed to save banner',
                            showHideTransition: 'slide',
                            icon: 'error',
                            position: 'bottom-right',
                            bgColor: '#bf441d',
                        });
                    }
                });
            });
            
            // Edit Banner
            $('#banner_datatable tbody').on('click', '#edit_banner', function (e) {
                const table = $('#banner_datatable').DataTable();
                const data = table.row( $(this).parents('tr') ).data();
                
                $('#banner_id').val(data.id);
                $('#banner_wedding_id').val(data.wedding_id);
                $('#banner_title').val(data.title);
                $('#banner_description').val(data.description);
                $('#banner_sort_order').val(data.sort_order);
                $('#banner_is_active').prop('checked', data.is_active == 1);
                
                if (data.image_path) {
                    $('#image_preview').html('<img src="' + data.image_path + '" style="max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 4px;" alt="Current Image">');
                }
                
                $('#banner_form_title').text('Edit Banner');
                $('#banner_form_modal').modal('show');
            });
            
            // Delete Banner
            $('#banner_datatable tbody').on('click', '#delete_banner', function (e) {
                console.log("clicked");
                const table = $('#banner_datatable').DataTable();
                const data = table.row( $(this).parents('tr') ).data();
                
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass: "btn btn-danger ms-2 mt-2",
                    buttonsStyling: false,
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: "{{ url('/banners/delete/') }}/" + data.id,
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function (response) {
                                // Fix: Handle both string and object responses
                                const pesan = typeof response === 'string' ? JSON.parse(response) : response;
                                Swal.fire({
                                    title: "Deleted!",
                                    text: pesan.success,
                                    icon: "success",
                                    confirmButtonColor: "#4a4fea"
                                });
                                // Fix: Use correct DataTable reference
                                $('#banner_datatable').DataTable().ajax.reload();
                            },
                            error: function (response) {
                                // Fix: Handle error response properly
                                let errorMessage = 'Failed to delete banner';
                                if (response.responseText) {
                                    try {
                                        const pesan = JSON.parse(response.responseText);
                                        errorMessage = pesan.error || errorMessage;
                                    } catch (e) {
                                        // If parsing fails, use default message
                                    }
                                }
                                Swal.fire({
                                    title: "Error!",
                                    text: errorMessage,
                                    icon: "error",
                                    confirmButtonColor: "#4a4fea"
                                });
                            }
                        });
                    }
                });
            });

            
            // Love Story Management Event Handlers
            $('#datatable tbody').on('click', '#manage_love_story', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                currentWeddingId = data.wedding.id;
                $('#love_story_wedding_title').text(data.wedding.catin_1 + ' & ' + data.wedding.catin_2);
                $('#love_story_wedding_id').val(currentWeddingId);
                loadLoveStoryData(currentWeddingId);
                $('#love_story_modal').modal('show');
            });
            
            // Love Story Modal Event Handler - Readjust DataTable
            $('#love_story_modal').on('shown.bs.modal', function () {
                // Readjust the love story datatable when modal is fully shown
                if ($.fn.DataTable.isDataTable('#love_story_datatable')) {
                    $('#love_story_datatable').DataTable().columns.adjust().responsive.recalc();
                }
            });
            
            // Add Love Story Button
            $('#add_love_story_btn').click(function() {
                resetLoveStoryForm();
                $('#love_story_wedding_id').val(currentWeddingId);
                $('#love_story_form_modal').modal('show');
            });
            
            // Love Story Image Preview
            $('#love_story_image').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#love_story_image_preview').html('<img src="' + e.target.result + '" style="max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 4px;" alt="Preview">');
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#love_story_image_preview').empty();
                }
            });
            
            // Save Love Story
            $('#save_love_story').click(function() {
                const formData = new FormData($('#love_story_form')[0]);
                const loveStoryId = $('#love_story_id').val();
                const url = loveStoryId ? "{{ url('/love-stories/update') }}/" + loveStoryId : "{{ url('/love-stories/store') }}";
                
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        const pesan = typeof response === 'string' ? JSON.parse(response) : response;
                        if (pesan.success) {
                            $.toast({
                                heading: 'Success',
                                text: pesan.success,
                                showHideTransition: 'slide',
                                icon: 'success',
                                position: 'bottom-right',
                                bgColor: '#5ba035',
                            });
                            $('#love_story_form_modal').modal('hide');
                            $('#love_story_datatable').DataTable().ajax.reload();
                        } else {
                            $.toast({
                                heading: 'Error',
                                text: pesan.error || 'Something went wrong',
                                showHideTransition: 'slide',
                                icon: 'error',
                                position: 'bottom-right',
                                bgColor: '#bf441d',
                            });
                        }
                    },
                    error: function() {
                        $.toast({
                            heading: 'Error',
                            text: 'Failed to save love story',
                            showHideTransition: 'slide',
                            icon: 'error',
                            position: 'bottom-right',
                            bgColor: '#bf441d',
                        });
                    }
                });
            });
            
            // Edit Love Story
            $('#love_story_datatable tbody').on('click', '#edit_love_story', function (e) {
                const table = $('#love_story_datatable').DataTable();
                const data = table.row( $(this).parents('tr') ).data();
                
                $('#love_story_id').val(data.id);
                $('#love_story_wedding_id').val(data.wedding_id);
                $('#love_story_title').val(data.title);
                $('#love_story_date').val(data.date);
                $('#love_story_description').val(data.description);
                $('#love_story_order').val(data.order);
                
                if (data.image_path) {
                    $('#love_story_image_preview').html('<img src="' + data.image_path + '" style="max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 4px;" alt="Current Image">');
                }
                
                $('#love_story_form_title').text('Edit Love Story');
                $('#love_story_form_modal').modal('show');
            });
            
            // Delete Love Story
            $('#love_story_datatable tbody').on('click', '#delete_love_story', function (e) {
                const table = $('#love_story_datatable').DataTable();
                const data = table.row( $(this).parents('tr') ).data();
                
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass: "btn btn-danger ms-2 mt-2",
                    buttonsStyling: false,
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: "{{ url('/love-stories/delete/') }}/" + data.id,
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function (response) {
                                const pesan = typeof response === 'string' ? JSON.parse(response) : response;
                                Swal.fire({
                                    title: "Deleted!",
                                    text: pesan.success,
                                    icon: "success",
                                    confirmButtonColor: "#4a4fea"
                                });
                                $('#love_story_datatable').DataTable().ajax.reload();
                            },
                            error: function (response) {
                                let errorMessage = 'Failed to delete love story';
                                if (response.responseText) {
                                    try {
                                        const pesan = JSON.parse(response.responseText);
                                        errorMessage = pesan.error || errorMessage;
                                    } catch (e) {
                                        // If parsing fails, use default message
                                    }
                                }
                                Swal.fire({
                                    title: "Error!",
                                    text: errorMessage,
                                    icon: "error",
                                    confirmButtonColor: "#4a4fea"
                                });
                            }
                        });
                    }
                });
            });
            
            // Gallery Management Event Handlers
            $('#datatable tbody').on('click', '#manage_gallery', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                currentWeddingId = data.wedding.id;
                $('#gallery_wedding_title').text(data.wedding.catin_1 + ' & ' + data.wedding.catin_2);
                $('#gallery_wedding_id').val(currentWeddingId);
                loadGalleryData(currentWeddingId);
                $('#gallery_modal').modal('show');
            });
            
            // Gallery Modal Event Handler
            $('#gallery_modal').on('shown.bs.modal', function () {
                if (galleryDataTable) {
                    galleryDataTable.columns.adjust().responsive.recalc();
                }
            });
            
            // Add Gallery Button
            $(document).on('click', '#add_gallery_btn', function() {
                $('#gallery_form')[0].reset();
                $('#gallery_images_preview').empty();
                $('#gallery_wedding_id').val(currentWeddingId);
                $('#gallery_form_title').text('Add Gallery Images');
                $('#gallery_form_modal').modal('show');
            });
            
            // Gallery Images Preview
            $(document).on('change', '#gallery_images', function() {
                const files = this.files;
                const preview = $('#gallery_images_preview');
                preview.empty();
                
                if (files.length > 10) {
                    $.toast({
                        heading: 'Warning',
                        text: 'Maximum 10 images allowed at once',
                        icon: 'warning',
                        position: 'top-right'
                    });
                    this.value = '';
                    return;
                }
                
                Array.from(files).forEach((file, index) => {
                    if (file.size > 5 * 1024 * 1024) { // 5MB
                        $.toast({
                            heading: 'Warning',
                            text: `Image ${index + 1} is too large. Maximum size is 5MB`,
                            icon: 'warning',
                            position: 'top-right'
                        });
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.append(`
                            <div class="col-md-3 mb-2">
                                <img src="${e.target.result}" class="img-fluid rounded" style="height: 100px; object-fit: cover;">
                            </div>
                        `);
                    };
                    reader.readAsDataURL(file);
                });
            });
            
            // Save Gallery
            $(document).on('click', '#save_gallery', function() {
                const formData = new FormData($('#gallery_form')[0]);
                const files = $('#gallery_images')[0].files;
                
                if (files.length === 0) {
                    $.toast({
                        heading: 'Warning',
                        text: 'Please select at least one image',
                        icon: 'warning',
                        position: 'top-right'
                    });
                    return;
                }
                
                $.ajax({
                    url: "{{ route('galleries.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $.toast({
                                heading: 'Success',
                                text: response.message,
                                icon: 'success',
                                position: 'top-right'
                            });
                            $('#gallery_form_modal').modal('hide');
                            galleryDataTable.ajax.reload();
                        } else {
                            $.toast({
                                heading: 'Error',
                                text: response.message,
                                icon: 'error',
                                position: 'top-right'
                            });
                        }
                    },
                    error: function(xhr) {
                        let message = 'An error occurred';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            message = xhr.responseJSON.message;
                        }
                        $.toast({
                            heading: 'Error',
                            text: message,
                            icon: 'error',
                            position: 'top-right'
                        });
                    }
                });
            });
            
            // Delete Gallery
            $(document).on('click', '.delete-gallery', function() {
                const galleryId = $(this).data('id');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('/galleries') }}/" + galleryId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    $.toast({
                                        heading: 'Success',
                                        text: response.message,
                                        icon: 'success',
                                        position: 'top-right'
                                    });
                                    galleryDataTable.ajax.reload();
                                } else {
                                    $.toast({
                                        heading: 'Error',
                                        text: response.message,
                                        icon: 'error',
                                        position: 'top-right'
                                    });
                                }
                            },
                            error: function(xhr) {
                                $.toast({
                                    heading: 'Error',
                                    text: 'Failed to delete gallery image',
                                    icon: 'error',
                                    position: 'top-right'
                                });
                            }
                        });
                    }
                });
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
                resetBannerForm();
                $("#submit_form").attr("aksi","input");
                $('#submit_form').removeAttr("iddata");
            });
        });
    </script>
@endsection
