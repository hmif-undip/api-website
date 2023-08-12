@extends('layout')

@section('title', 'Users')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/extensions/filepond/filepond.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/toastify-js/src/toastify.css"')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/filepond.css')}}">

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
    <section class="section">
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

        @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <i class="bi bi-check-circle"></i> {{session('success')}}
                <button type="button" class="btn-close btn-close-session text-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form method="POST" action="{{ url('website-profile') }}" id="form_website_profile" enctype="multipart/form-data">
                        @method('POST')
                        @csrf

                        <div class="form-body">
                            <div class="manage-website py-4">
                                <div class="header mb-4">
                                    <h4 class="card-title">Manage Website</h4>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="website_name" class="form-label">Nama Website <span class="text-danger">*</span></label>
                                            <input type="text" id="website_name" class="form-control  @error('website_name') is-invalid @enderror" name="website_name" placeholder="Website Name" value="{{ old('website_name') ?? ($website_profile ? $website_profile->website_name : "") }}">
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="keyword" class="form-label">Keyword <span class="text-danger">*</span></label>
                                            <small class="text-muted">(Nama Organisasi)</small>
                                            <input type="text" id="keyword" class="form-control  @error('keyword') is-invalid @enderror" name="keyword" placeholder="Keyword" value="{{ old('keyword') ?? ($website_profile ? $website_profile->keyword : "") }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="url" class="form-label">Url Website<span class="text-danger">*</span></label>
                                            <input type="text" id="url" class="form-control  @error('url') is-invalid @enderror" name="url" placeholder="Url Website" value="{{ old('url') ?? ($website_profile ? $website_profile->url : "") }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="description" class="form-label">Deskripsi Utama Website <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="8" name="description" placeholder="Deskripsi Utama Website">{{ old('description') ?? ($website_profile ? $website_profile->description : "") }}</textarea>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="keyword" class="form-label">Logo Saat Ini</label>

                                            <div>
                                                <img src="{{asset( $website_profile ? $website_profile->logo : 'assets/images/faces/1.jpg' )}}" alt="Logo Saat Ini" width="200px">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="logo" class="form-label">Logo Utama <span class="text-danger">*</span></label>
                                            <input type="file" class="image-preview-filepond" name="logo" id="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="description-of-organizatation py-4">
                                <div class="header mb-4">
                                    <h4 class="card-title">Deskripsi Organisasi</h4>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-5">
                                            <label for="tagline" class="form-label">Tagline Organisasi</label>
                                            <input type="text" id="tagline" class="form-control" name="tagline" placeholder="Tagline Organisasi" value="{{ old('tagline') ?? ($website_profile ? $website_profile->tagline : "") }}">
                                            <p><small class="text-muted">(Biarkan jika tidak ada)</small></p>
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                            <input type="text" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') ?? ($website_profile ? $website_profile->email : "") }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="year_now" class="form-label">Tahun Organisasi <span class="text-danger">*</span></label>
                                            <input type="number" id="year_now" class="form-control  @error('year_now') is-invalid @enderror" name="year_now" placeholder="Tahun Organisasi" value="{{ old('year_now') ?? ($website_profile ? $website_profile->year_now : "") }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="address" class="form-label">Alamat Organisasi <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="4" name="address" placeholder="Alamat Organisasi">{{ old('address') ?? ($website_profile ? $website_profile->address : "") }}</textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="hp" class="form-label">No Hp <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('hp') is-invalid @enderror" id="hp" rows="4" name="hp" placeholder="No Hp">{{ old('hp') ?? ($website_profile ? $website_profile->hp : "") }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="map-iframe py-4">
                                <div class="header mb-4">
                                    <h4 class="card-title">Map (Iframe)</h4>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="map" class="form-label">Map <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('map') is-invalid @enderror" id="map" rows="4" name="map" placeholder="Map">{{ old('map') ?? ($website_profile ? $website_profile->map : "") }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="map" class="form-label">Iframe <span class="text-danger">*</span></label>

                                        <div>
                                            {!! $website_profile->map ?? "---------- Belum ada iframe map ----------" !!}
                                            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3959.6575618239676!2d110.4400358!3d-7.0494651!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3e2294766f97b631!2sDepartemen%20Teknik%20Informatika%20%2F%20Ilmu%20Komputer!5e0!3m2!1sen!2sid!4v1599440658218!5m2!1sen!2sid" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary me-1 mb-1" id="submit_website_profile" onclick='preventDoubleClick("form_website_profile", "submit_website_profile")'>Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Remove--}}
        <div class="modal fade text-left" id="modal_remove" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="myModalLabel120">Confirmation</h5>

                        <button type="button" class="close" data-bs-dismiss="modal"aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        Are you sure want to remove this data?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">No</span>
                        </button>

                        <form action="" method="post" id="form_delete_user">
                            @method("DELETE")
                            @csrf

                            <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Yes</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    {{-- Modal Remove --}}
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

    <script>
        $(document).ready(function () {
            $(".filepond--drop-label").addClass("form-control")

            @if($errors->has('logo'))
                $(".filepond--drop-label").addClass("is-invalid")
            @endif
		});

        // Init Tooltip
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('#table_users .tooltip-class'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);

        // Modal Remove
        function modalRemove(url) {
            $('#form_delete_user').attr("action", url)
        }
    </script>
@endsection
