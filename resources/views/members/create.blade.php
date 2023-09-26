@extends('layout')

@section('title', "Tambah Anggota")

@section('css')
    <link rel="stylesheet" href="{{asset('assets/extensions/filepond/filepond.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/toastify-js/src/toastify.css"')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/filepond.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/coloris/coloris.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/extensions/jquery-date-range-picker-master/daterangepicker.min.css')}}"/>

    <style>
        .image-preview-filepond{
            margin-bottom: 0px;
        }

        .filepond--drop-label{
            background-color: #f1f0ef;
        }
    </style>
@endsection

@section('content')
    <div class="page-title mb-4">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Anggota</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('anggota') }}">Anggota</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Anggota</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="card-body pt-0">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible show fade">
                    <i class="bi bi-file-excel"></i> {{ $error }}

                    <button type="button" class="btn-close btn-close-session" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </div>
    @endif

    <div class="card">
        {{-- <div class="card-header">
            <h4 class="card-title">Create Anggota</h4>
        </div> --}}

        <div class="card-content">
            <div class="card-body">
                <form method="POST" action="{{ url('anggota') }}" id="form_create_member" enctype="multipart/form-data">
                    @method('POST')
                    @csrf

                    <div class="form-body py-4">
                        <div class="member-profile py-4">
                            <div class="header mb-4">
                                <h4 class="card-title">Profile Member</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-7">
                                        <label for="name" class="form-label">Nama<span class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="nim" class="form-label">NIM<span class="text-danger">*</span></label>
                                        <input type="text" id="nim" class="form-control  @error('nim') is-invalid @enderror" name="nim" placeholder="NIM" value="{{ old('nim') }}">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="birth_date" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                                        <input type="text" id="birth_date" class="form-control  @error('birth_date') is-invalid @enderror" name="birth_date" placeholder="Tanggal Lahir" value="{{ old('birth_date') ? old('birth_date') : ddmmyyyy_now() }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                        <input type="text" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="telephone" class="form-label">Telepon<span class="text-danger">*</span></label>
                                        <input type="text" id="telephone" class="form-control  @error('telephone') is-invalid @enderror" name="telephone" placeholder="Telepon" value="{{ old('telephone') }}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="address" class="form-label">Alamat<span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="3" name="address" placeholder="Address">{{ old('address') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label">Foto Saat Ini</label>

                                        <div>
                                            <img src="{{asset('assets/images/faces/1.jpg')}}" alt="Foto Saat Ini" width="200px">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="photo" class="form-label">Foto Utama<span class="text-danger">*</span></label>
                                        <input type="file" class="image-preview-filepond" name="photo" id="photo">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-primary me-1 mb-1" id="submit_create_member" onclick='preventDoubleClick("form_create_member", "submit_create_member")'>Submit</button>

                            <a href="{{ url('anggota') }}" class="btn btn-light-secondary mx-1 mb-1">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js')}}"></script>

    <script src="{{asset('assets/extensions/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/extensions/filepond/filepond.js')}}"></script>
    <script src="{{asset('assets/extensions/toastify-js/src/toastify.js')}}"></script>
    <script src="{{asset('assets/js/pages/filepond.js')}}"></script>
    <script src="{{asset('assets/extensions/coloris/coloris.min.js')}}"></script>
    <script src="{{asset('assets/extensions/jquery-date-range-picker-master/jquery.daterangepicker.min.js')}}"></script>

    <script>
         $(document).ready(function () {
            $(".filepond--drop-label").addClass("form-control")

            @if($errors->has('photo'))
                $(".filepond--drop-label").addClass("is-invalid")
            @endif

            $('#birth_date').dateRangePicker({
                applyBtnClass: "btn btn-primary",
                applyBtnClass: "btn-primary",
                autoClose: true,
                singleDate : true,
                // showShortcuts: false,
                singleMonth: true,
                monthSelect: true,
                yearSelect: function(current){
                    return[moment().get('year') - 100, moment().get('year')]
                },
                endDate: "{{ ddmmyyyy_now() }}",
                format: 'DD-MM-YYYY',
            })
		});

        // Filepond: Image Preview
        FilePond.create(document.querySelector(".image-preview-filepond2"), {
            credits: null,
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
            fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
                // Do custom type detection here and return with promise
                resolve(type)
            }),
            storeAsFile: true,
        })

        // Function for prevent double click
        function preventDoubleClick(id_form, id_button){
            $('#'+id_button).attr('disabled', true)
            $('#'+id_form).submit()
        }

    </script>
@endsection
