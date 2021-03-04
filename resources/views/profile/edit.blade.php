@extends('layout.main')
@section('container')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
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
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status')}}
                    </div>
                    @endif
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="/Edit/{{Auth::user()->id}}"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <img src="{{asset('/uploads/profile/'.Auth::user()->image)}}"
                                            class="profile-user-img img-fluid img-circle" alt="avatar">
                                        <h6>Choose another photo </h6>
                                        <input type="file" name="image" id="image" accept="image/*"
                                            class="form-control">
                                    </div>
                                </div>

                                <!-- edit form column -->
                                <div class="col-sm-9 personal-info">

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Nama</label>
                                        <div class="col-lg-12">
                                            <input class="form-control" id="name" name="name" type="text"
                                                value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">NIP</label>
                                        <div class="col-lg-12">
                                            <input class="form-control" id="nip" name="nip" type="text"
                                                value="{{Auth::user()->nip}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Jenis Kelamin</label>
                                        <div class="col-lg-12">
                                            <input class="form-control" id="sex" name="sex" type="text"
                                                value="{{Auth::user()->sex}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Nomor KTP</label>
                                        <div class="col-lg-12">
                                            <input class="form-control" id="ktp" name="ktp" type="text"
                                                value="{{Auth::user()->ktp}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">HP / Whatsapp</label>
                                        <div class="col-lg-12">
                                            <input class="form-control" id="telp" name="telp" type="text"
                                                value="{{Auth::user()->telp}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Email</label>
                                        <div class="col-lg-12">
                                            <input class="form-control" id="email" name="email" type="text"
                                                value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        Change Password ? <a href="{{url('/EditPassword')}}">Click Here !</a>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary" value="Save Changes">
                                            <span></span>
                                            <a href="javascript:history.back()" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                        </form>
                    </div>
                </div>
                </form>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    @endsection