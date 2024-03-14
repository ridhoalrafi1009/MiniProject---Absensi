@extends('backend.partial.master') @section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>

        <div class="pb-3">
            <h1>Profile</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Ubah Profile
                    </div>
                    <form id="form-data-asisten-edit" method="post" data-route="{{ route('updateAsisten') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col text-center">
                                                <img src="{{ asset('photo/' . $profile->photo) }}" width="800px"
                                                    height="425px">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Id Asisten </label>
                                            <input type="hidden" name="id" value="{{ $profile->id }}">
                                            <input name="id_asistenU" value="{{ $profile->id_asisten }}"
                                                class="form-control mb-2 input-credit-card" type="text"
                                                placeholder="Id Asisten" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Name </label>
                                            <input name="nameU" value="{{ $profile->name }}"
                                                class="form-control mb-2 input-credit-card" type="text"
                                                placeholder="Name" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Join Date </label>
                                            <input name="created_atU" value="{{ $profile->created_at }}"
                                                class="form-control mb-2 input-credit-card" type="date"
                                                placeholder="Join Date" @if ($profile->role == 'asisten' || $profile->role == 'pj') readonly @endif />
                                        </div>
                                        @if ($profile->role == 'admin' || $profile->role == 'pj')
                                            <div class="form-group">
                                                <label class="form-label">Jabatan </label>
                                                <select class="form-control" name="roleU">
                                                    <option {{ $profile->role == 'asisten' ? 'selected' : '' }}
                                                        value="asisten"> Asisten </option>
                                                    <option {{ $profile->role == 'pj' ? 'selected' : '' }} value="pj">
                                                        PJ </option>
                                                    <option {{ $profile->role == 'admin' ? 'selected' : '' }}
                                                        value="admin"> Admin </option>
                                                </select>
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <label class="form-label">Jabatan </label>
                                                <input name="roleU2" value="{{ $profile->role }}"
                                                    class="form-control mb-2 input-credit-card" type="text" disabled
                                                    readonly />
                                            </div>
                                        @endif
                                        <label class="form-label">Photo</label>
                                        <div class="custom-file">
                                            <input type="file" name="photoU" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input name="emailU" value="{{ $profile->email }}"
                                                class="form-control mb-2 input-credit-card" type="email"
                                                placeholder="ridho@email.com" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input name="password1U" class="form-control mb-2 input-credit-card"
                                                type="password" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Re-Type Password</label>
                                            <input name="password2U" class="form-control mb-2 input-credit-card"
                                                type="password" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col text-center">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('js/backend/asisten/updateAsisten.js') }}"></script>
@endsection
