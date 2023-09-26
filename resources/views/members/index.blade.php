@extends('layout')

@section('title', 'Data Anggota')

@section('content')
    <div class="page-title mb-4">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Anggota</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Anggota</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <i class="bi bi-check-circle"></i> {{session('success')}}
                <button type="button" class="btn-close btn-close-session text-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <a href="{{ url('anggota/create') }}" class="btn icon btn-success tooltip-class" data-bs-placement="bottom" title="Tambah">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table" id="table_members">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Name</th>
                            <th>Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($members as $key => $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $member->nim }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->telephone }}</td>
                                <td>
                                    <div class="buttons">
                                        <a href="{{ url('anggota/'.$member->id.'/edit') }}" class="btn icon btn-primary tooltip-class" data-bs-placement="left" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <button type="button" class="btn icon btn-danger tooltip-class" data-bs-placement="right" title="Hapus" data-bs-toggle="modal" data-bs-target="#modal_remove" onclick="modalRemove('{{ url('anggota/'.$member->id) }}')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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

                        <form action="" method="post" id="form_delete_members">
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
    <script>
        $(document).ready(function () {
            // Init Datatable
            $("#table_members").DataTable();
		});

        // Init Tooltip
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('.tooltip-class'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);

        // Modal Remove
        function modalRemove(url) {
            $('#form_delete_members').attr("action", url)
        }
    </script>
@endsection
