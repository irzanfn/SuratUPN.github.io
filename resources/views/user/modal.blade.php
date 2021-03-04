<!--Modal-->
<div class="modal fade" id="modal-close-default" tabindex="-1" role="dialog" aria-labelledby="modal-close-default"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/User" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        Nama
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        E-Mail Address
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        NIP
                        <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"
                            value="{{ old('nip') }}" required autocomplete="nip" autofocus>

                        @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        Jenis Kelamin
                        <select class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex"
                            value="{{ old('sex') }}" required autocomplete="sex" autofocus>
                            <option>L</option>
                            <option>P</option>
                        </select>

                        @error('sex')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        KTP
                        <input id="ktp" type="text" class="form-control @error('ktp') is-invalid @enderror" name="ktp"
                            value="{{ old('ktp') }}" required autocomplete="ktp" autofocus>

                        @error('ktp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        HP/ Whatsapp
                        <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror"
                            name="telp" value="{{ old('telp') }}" required autocomplete="telp" autofocus>

                        @error('telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="uk-margin">
                        Password
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="uk-margin">
                        Confirm Password
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>

                    <input id="role" type="hidden" name="role" value="Staff">
                    <input id="image" type="hidden" name="image" value="dummy.jpg">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Update Data</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="form-edit" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        Nama
                        <input class="form-control" type="text" readonly name="nama" id="nama" value="" required>
                    </div>

                    <div class="form-group">
                        Email
                        <input class="form-control" type="text" readonly name="email" id="email" value="" required>
                    </div>

                    <div class="form-group">
                        Role
                        <select class="form-control" name="role" id="role" value="" required>
                            <option>Staff</option>
                            <option>Admin</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="reset-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Reset Password</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="form-reset" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        Email
                        <input class="form-control" type="text" readonly name="email" id="email" value="" required>
                    </div>
                    <div class="form-group">
                        Password Pertama
                        <input class="form-control" type="text" name="default_password" id="default_password" value="">
                    </div>
                    <p>Jika Lupa Password Pertama Silahkan Isi No. KTP</p>
                    <div class="form-group">
                        No. KTP
                        <input class="form-control" type="text" name="ktp" id="ktp" value="">
                    </div>
            </div>
            <div class="modal-footer">
                <p>Masukan Salah Satu Data Saja !</p>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="delete">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h4 class="modal-title">Are you sure?</h4>
            <form action="" id="deleteForm" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-danger mr-auto"
                        onclick="formSubmit()">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>