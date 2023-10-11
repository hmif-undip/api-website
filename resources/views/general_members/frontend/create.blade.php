@extends('layout_frontend')

@section('title', "Tambah Anggota Umum")

@section('content')
    <div class="page-title mb-4">
        <div class="row">
            <div class="col-12 order-md-1 order-last text-center">
                <h3>Pendataan Mahasiswa Informatika</h3>
                <p class="text-subtitle text-muted"></p>
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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <i class="bi bi-check-circle"></i> {{session('success')}}
            <button type="button" class="btn-close btn-close-session text-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        {{-- <div class="card-header">
            <h4 class="card-title">Create Anggota Umum</h4>
        </div> --}}

        <div class="card-content">
            <div class="card-body">
                <form method="POST" action="{{ url('pendataan-mahasiswa-informatika') }}" id="form_create_general_member">
                    @method('POST')
                    @csrf

                    <div class="form-body py-4">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name" class="form-label">Nama<span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ old('name') }}">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="nim" class="form-label">NIM<span class="text-danger">*</span></label>
                                    <input type="text" id="nim" class="form-control  @error('nim') is-invalid @enderror" name="nim" placeholder="NIM" value="{{ old('nim') }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                    <input type="text" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="year" class="form-label">Angkatan<span class="text-danger">*</span></label>
                                    <select class="form-select @error('year') is-invalid @enderror" name="year">
                                        <option value="2023" selected>2023</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="telephone" class="form-label">Telepon<span class="text-danger">*</span></label>
                                    <input type="text" id="telephone" class="form-control  @error('telephone') is-invalid @enderror" name="telephone" placeholder="Telepon" value="{{ old('telephone') }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="home_address" class="form-label">Alamat Rumah<span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('home_address') is-invalid @enderror" id="home_address" rows="3" name="home_address" placeholder="Alamat Rumah">{{ old('home_address') }}</textarea>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="boarding_address" class="form-label">Alamat Kos</label>
                                    <textarea class="form-control @error('boarding_address') is-invalid @enderror" id="boarding_address" rows="3" name="boarding_address" placeholder="Alamat Kos">{{ old('boarding_address') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-primary me-1 mb-1" data-bs-toggle="modal" data-bs-target="#modal_confirm">Submit</button>
                            {{-- <button type="button" class="btn btn-primary me-1 mb-1" id="submit_create_general_member" onclick='preventDoubleClick("form_create_general_member", "submit_create_general_member")'>Submit</button> --}}
                            {{-- <button type="button" class="btn icon btn-danger tooltip-class" data-bs-placement="right" title="Hapus" data-bs-toggle="modal" data-bs-target="#modal_confirm" onclick="modalRemove('{{ url('anggota-umum/'.$general_member->id) }}')">
                                <i class="bi bi-trash-fill"></i>
                            </button> --}}
                        </div>
                    </div>

                    {{-- Modal Confirm--}}
                        <div class="modal fade text-left" id="modal_confirm" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h5 class="modal-title white" id="myModalLabel120">Konfirmasi</h5>

                                        <button type="button" class="close" data-bs-dismiss="modal"aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        Pastikan Data Anda Sudah Benar!
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Batal</span>
                                        </button>

                                        <button type="submit" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Lanjutkan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- Modal Confirm --}}
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            // show and hide password
            $('#show').click(function(){
                if($(this).is(':checked')){
                    $('#password').prop('type', 'text')
                }else{
                    $('#password').prop('type', 'password')
                }
            })
		});

        // Function for prevent double click
        function preventDoubleClick(id_form, id_button){
            $('#'+id_button).attr('disabled', true)
            $('#'+id_form).submit()
        }
    </script>
@endsection
