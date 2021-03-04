@extends('layout.main')
@section('container')

@include('user.modal')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card">
                        <!--<div class="card-header">
                            <h2>Surat Masuk</h2>
                        </div>-->
                        @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status')}}
                        </div>
                        @elseif(session('warning'))
                        <div class="alert alert-danger">
                            {{ session('warning')}}
                        </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $dt)
                                    <tr>
                                        <td data-label="ID">{{$dt->id}}</td>
                                        <td data-label="Nama">{{$dt->name}}</td>
                                        <td data-label="Email">{{$dt->email}}</td>
                                        <td data-label="Role">{{$dt->role}}</td>
                                        <td data-label="Aksi" style="white-space: nowrap;text-align: center;">
                                            @if($dt->role=='Super Admin')
                                            <button class="btn btn-secondary"><i
                                                    class="fa-fw fas fa-exclamation-triangle"></i><span class="ml-1">No
                                                    Action</button>
                                            @elseif(Auth::user()->role=='Admin')
                                            <button class="btn btn-secondary"><i
                                                    class="fa-fw fas fa-exclamation-triangle"></i><span class="ml-1">No
                                                    Action</button>
                                            @else
                                            <a class="btn btn-primary edit" href="#" role="button" data-id="{{$dt->id}}"
                                                data-nama="{{$dt->name}}" data-email="{{$dt->email}}"
                                                data-role="{{$dt->role}}" data-toggle="modal" data-target="#edit-modal">
                                                <i class="fa-fw fas fa-pencil-alt"></i>
                                                <span class="ml-1">Edit</a>
                                            <a href="#delete" class="btn btn-danger delete" data-id="{{$dt->id}}"
                                                data-id="{{$dt->id}}" data-toggle="modal" data-target="#delete">
                                                <i class="fa-fw fas fa-trash"></i>
                                                <span class="ml-1">Delete</a><br><br>
                                            <a class="btn btn-warning reset" href="#" role="button"
                                                data-id="{{$dt->id}}" data-email="{{$dt->email}}" data-toggle="modal"
                                                data-target="#reset-modal">
                                                <i class="fa-fw fa fa-redo"></i>
                                                <span class="ml-1">Reset Password</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection