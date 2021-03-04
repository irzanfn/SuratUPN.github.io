@extends('layout.main')
@section('container')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Change Password</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/Edit')}}">Edit Profile</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('change.password') }}">
                            @csrf
                            @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                            @endforeach
                            <div class="row">
                                <!-- edit form column -->
                                <div class="col-sm-9 personal-info">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Current Password</label>
                                        <div class="col-lg-12">
                                            <input id="password" type="password" class="form-control"
                                                name="current_password" autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">New Password</label>
                                        <div class="col-lg-12">
                                            <input id="new_password" type="password" class="form-control"
                                                name="new_password" autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Confirm New Password</label>
                                        <div class="col-lg-12">
                                            <input id="new_confirm_password" type="password" class="form-control"
                                                name="new_confirm_password" autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary" value="Save Changes">
                                            <span></span>
                                            <a href="javascript:history.back()" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
</section>

@endsection