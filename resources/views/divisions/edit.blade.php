@extends('layout')

@section('title', "Edit Divisi & Jabatan")

@section('css')
    <link rel="stylesheet" href="{{asset('assets/extensions/filepond/filepond.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/toastify-js/src/toastify.css"')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/filepond.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/coloris/coloris.min.css')}}"/>

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
                <h3>Edit Divisi & Jabatan</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('divsi-jabatan') }}">Divisi & Jabatan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Divisi</li>
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
        <div class="card-content">
            <div class="card-body">
                <form method="POST" action="{{ url('divisi-jabatan/'.$division->id) }}" id="form_update_divisi_jabatan" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="form-body row">
                        <div class="manage-website py-4 col-md-9  border-end">
                            <div class="header mb-4">
                                <h4 class="card-title">Profil Divisi</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name" class="form-label">Nama Divisi<span class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Nama Divisi" value="{{ old('name') ? old('name') : $division->name }}">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="full_name" class="form-label">Nama Lengkap Divisi<span class="text-danger">*</span></label>
                                        <input type="text" id="full_name" class="form-control  @error('full_name') is-invalid @enderror" name="full_name" placeholder="Nama Lengkap Divisi" value="{{ old('full_name') ? old('full_name') : $division->full_name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="tagline" class="form-label">Jargon<span class="text-danger">*</span></label>
                                        <input type="text" id="tagline" class="form-control  @error('tagline') is-invalid @enderror" name="tagline" placeholder="Jargon" value="{{ old('tagline') ? old('tagline') : $division->tagline }}">
                                    </div>

                                    <div class="form-group col-md-7">
                                        <label for="motto" class="form-label">Semboyan<span class="text-danger">*</span></label>
                                        <input type="text" id="motto" class="form-control  @error('motto') is-invalid @enderror" name="motto" placeholder="Semboyan" value="{{ old('motto') ? old('motto') : $division->motto }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="logo" class="form-label">Logo Divisi<span class="text-danger">*</span></label>
                                        <input type="file" class="image-preview-filepond2" name="logo" id="logo">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="photo" class="form-label">Foto Divisi<span class="text-danger">*</span></label>
                                        <input type="file" class="image-preview-filepond" name="photo" id="photo">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="color" class="form-label">Color<span class="text-danger">*</span></label>
                                        <input type="text" id="color" class="form-control  @error('color') is-invalid @enderror" name="color" placeholder="Color" value="{{ old('color') ? old('color') : $division->color }}" data-coloris>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="logo" class="form-label">Logo Divisi Saat Ini</label>

                                        <div>
                                            <img src="{{asset( $division->logo ?? 'assets/images/faces/1.jpg' )}}" alt="Logo Saat Ini" width="200px">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="foto" class="form-label">Foto Divisi Saat ini</label>

                                        <div>
                                            <img src="{{asset( $division->photo ?? 'assets/images/faces/1.jpg' )}}" alt="Foto Saat Ini" width="200px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="map-iframe py-4 col-md-3">
                            <div class="header mb-4">
                                <h4 class="card-title">Ragam Jabatan</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="position_name" class="form-label">Nama Jabatan<span class="text-danger">*</span></label>
                                        <table style="width: 100%" id="position_table" cellpadding="5">
                                            <tbody data-position_total="{{count(@$division->positions)}}">
                                                @foreach (@$division->positions as $key_position => $position)
                                                    <tr data-order_position="{{$key_position + 1}}">
                                                        <td style="width: 80%">
                                                            <input type="text" id="position_name" class="form-control  @error('position_name') is-invalid @enderror" name="position_name[{{$key_position + 1}}]" placeholder="Nama Jabatan" value="{{ old('position_name') ? old('position_name') : $position->name  }}">
                                                        </td>

                                                        <td>
                                                            @if ($key_position + 1 == 1)
                                                                <button type="button" class="btn icon btn-success tooltip-class form-control" data-bs-placement="bottom" title="Tambah" onclick="addRowPosition()">
                                                                    <i class="bi bi-plus-lg"></i>
                                                                </button>
                                                            @else
                                                                <button type="button" class="btn icon btn-danger tooltip-class form-control" data-bs-placement="bottom" title="Hapus" onclick="removeRowPosition(this)">
                                                                    <i class="bi bi-dash-lg"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="form-group col-md-1">
                                        <label for="name" class="form-label"></label>
                                        <a href="{{ url('divisi/update') }}" class="btn icon btn-success tooltip-class form-control" data-bs-placement="bottom" title="Tambah">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="description-of-organizatation py-4">
                            <div class="header mb-4">
                                <h4 class="card-title">Detail Divisi</h4>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="6" name="description" placeholder="Deskripsi">{{ old('description') ? old('description') : $division->description }}</textarea>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="full_description" class="form-label">Deskripsi Lengkap <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('full_description') is-invalid @enderror" id="full_description" rows="6" name="full_description" placeholder="Deskripsi Lengkap">{{ old('full_description') ? old('full_description') : $division->full_description }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="content" class="form-label">Konten <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="4" name="content" placeholder="Konten">{{ old('content') ? old('content') : $division->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-primary me-1 mb-1" id="submit_update_divisi_jabatan" onclick='preventDoubleClick("form_update_divisi_jabatan", "submit_update_divisi_jabatan")'>Submit</button>

                            <a href="{{ url('divisi-jabatan') }}" class="btn btn-light-secondary mx-1 mb-1">Back</a>
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

    <script src="{{asset('assets/extensions/filepond/filepond.js')}}"></script>
    <script src="{{asset('assets/extensions/toastify-js/src/toastify.js')}}"></script>
    <script src="{{asset('assets/js/pages/filepond.js')}}"></script>
    <script src="{{asset('assets/extensions/coloris/coloris.min.js')}}"></script>

    <script>
         $(document).ready(function () {
            $(".filepond--drop-label").addClass("form-control")

            @if($errors->has('logo'))
                $(".filepond--drop-label").addClass("is-invalid")
            @endif
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

        // Add Row Position
        function addRowPosition() {
            let positionTotal = $("#position_table tbody").attr("data-position_total")
                positionTotal++


            let html_row_position = `
                                        <tr data-order_position="${positionTotal}">
                                            <td style="width: 80%">
                                                <input type="text" id="position_name" class="form-control  @error('position_name') is-invalid @enderror" name="position_name[${positionTotal}]" placeholder="Nama Jabatan">
                                            </td>

                                            <td>
                                                <button type="button" class="btn icon btn-danger tooltip-class form-control" data-bs-placement="bottom" title="Hapus" onclick="removeRowPosition(this)">
                                                    <i class="bi bi-dash-lg"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    `

            $("#position_table tbody").append(html_row_position)
            $("#position_table tbody").attr("data-position_total", positionTotal)
        }

        // remove Row Position
        function removeRowPosition(button) {
            let positionTotal = $("#position_table tbody").attr("data-position_total")
                positionTotal--

            let order = $(button).closest("tr").attr("data-order_position")
            let orderPosition = null;

            $(`#position_table tbody tr[data-order_position="${order}"]`).remove();

            $(`#position_table tbody tr[data-order_position]`).each(function() {
                orderPosition = $(this).attr("data-order_position")

                if (orderPosition > order) {
                    decrementOrderPosition = orderPosition - 1
                    $(this).attr("data-order_position", decrementOrderPosition)
                    $(this).find("input").attr("name", `position_name[${decrementOrderPosition}]`)
                }
            });

            $("#position_table tbody").attr("data-position_total", positionTotal)
        }

    </script>
@endsection
