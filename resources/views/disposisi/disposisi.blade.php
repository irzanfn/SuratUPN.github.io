@extends('layout.main')
@section('container')

@include('disposisi.modal')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Disposisi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/Surat/sMasuk')}}">Surat Masuk</a></li>
                    <li class="breadcrumb-item active">Disposisi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="col-12">
    <div class="card text-white bg-info">
        <div class="card-header">{{$dt->no_surat}}</div>
        <div class="card-body">
            <h5 class="card-title">Isi Surat</h5>
            <p class="card-text">{{$dt->isi_surat}}</p>
        </div>
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card">
                        @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status')}}
                        </div>
                        @endif

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tujuan</th>
                                        <th>Isi Disposisi</th>
                                        <th>Sifat</th>
                                        <th>Batas Waktu</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $dt)
                                    <tr>
                                        <td data-label="No">{{$loop->iteration}}</td>
                                        <td data-label="Tujuan">{{$dt->tujuan}}</td>
                                        <td data-label="Isi Disposisi">{{$dt->isi_disposisi}}</td>
                                        <td data-label="Sifat">{{$dt->sifat}}</td>
                                        <td data-label="Batas Waktu">
                                            {{\Carbon\Carbon::parse($dt->batas_waktu)->format('l, d M Y')}}</td>
                                        <td data-label="Catatan">{{$dt->catatan}}</td>
                                        <td data-label="Aksi" style="white-space: nowrap;text-align: center;">
                                            @if($dt->user_id == Auth::user()->id || Auth::user()->role=='Admin' ||
                                            Auth::user()->role=='Super Admin')
                                            <a class="btn btn-primary edit" href="#" role="button" data-id="{{$dt->id}}"
                                                data-tujuan="{{$dt->tujuan}}" data-isi="{{$dt->isi_disposisi}}"
                                                data-sifat="{{$dt->sifat}}" data-batas="{{$dt->batas_waktu}}"
                                                data-catatan="{{$dt->catatan}}" data-surat="{{$id_surat}}"
                                                data-toggle="modal" data-target="#edit-modal">
                                                <i class="fa-fw fas fa-pencil-alt"></i>
                                                <span class="ml-1">Edit</a>
                                            <a href="#delete" class="btn btn-danger delete" data-id="{{$dt->id}}"
                                                data-id-smasuk="{{$id_surat}}" data-toggle="modal"
                                                data-target="#delete">
                                                <i class="fa-fw fas fa-trash"></i>
                                                <span class="ml-1">Delete</a><br /><br />
                                            @else
                                            <a class="btn btn-secondary" href="#" role="button" data-toggle="modal"
                                                data-target="#noaction">
                                                <i class="fa-fw fas fa-pencil-alt"></i>
                                                <span class="ml-1">Edit</a>
                                            <a href="#noaction" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#noaction">
                                                <i class="fa-fw fas fa-trash"></i>
                                                <span class="ml-1">Delete</a><br /><br />
                                            @endif
                                            <a href="{{url('/Surat/sMasuk/'.$id_surat.'/Disposisi/'.$dt->id)}}"
                                                class="btn btn-success">
                                                <i class="fa-fw fas fa-print"></i>
                                                <span class="ml-1">Print</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tujuan</th>
                                        <th>Isi Disposisi</th>
                                        <th>Sifat</th>
                                        <th>Batas Waktu</th>
                                        <th>Catatan</th>
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