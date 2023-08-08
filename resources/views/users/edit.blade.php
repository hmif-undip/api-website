@extends('layout')

@section('title', "Edit | Users")

@section('content')
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
        <div class="card-header">
            <h4 class="card-title">Edit User</h4>
        </div>

        <div class="card-content">
            <div class="card-body">
                <form method="POST" action="{{ url('users/'.$user->id) }}" id="form_update_user">
                    @method('PATCH')
                    @csrf

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name <span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-8 form-group">
                                <input type="text" id="name" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') ? old('name') : $user->name }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Email <span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-8 form-group">
                                <input type="text" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') ? old('email') : $user->email }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Role <span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-8 form-group">
                                <select class="form-select @error('role') is-invalid @enderror" name="role">
                                    <option value="" {{ old('role') ? '' : ($user->role ? '' :'selected')}} disabled>Role</option>

                                    @foreach (config('custom.roles') as $key_role => $role)
                                        @if ($key_role == 99)
                                            @continue;
                                        @endif

                                        <option value="{{ $key_role }}" {{ old('role') == $key_role ? 'selected' : (@$user->role == $key_role ? 'selected' : '') }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Username <span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-8 form-group">
                                <input type="text" id="username" class="form-control  @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') ? old('username') : $user->username  }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Password <span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-8 form-group">
                                <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password" value="" autocomplete="off">
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-12 col-md-8 offset-md-4 form-group">
                                <div class='form-check'>
                                    <div class="checkbox">
                                        <input type="checkbox" id="show" class="form-check-input">
                                        <label for="show">Show</label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary me-1 mb-1 submit_update_user" id="submit_update_user" onclick='preventDoubleClick("form_update_user", "submit_update_user")'>Submit</button>

                            <a href="{{ url('users') }}" class="btn btn-light-secondary mx-1 mb-1">Back</a>
                        </div>
                    </div>
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
    </script>
@endsection
