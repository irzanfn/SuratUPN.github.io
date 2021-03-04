@extends('layout.main')

@if($surat=='masuk')

@section('container')

@include('surat.modal')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Surat Masuk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="col-5" style="margin-left: 8px;margin-bottom: 20px;">
    <div class="input-group">
        @if(isset($internal))
        <a href="{{url('Surat/sMasukinternal')}}" class="btn btn-primary">Internal</a>
        @else
        <a href="{{url('Surat/sMasukinternal')}}" class="btn btn-outline-primary">Internal</a>
        @endif
        @if(isset($external))
        <a href="{{url('Surat/sMasukexternal')}}" class="btn btn-warning" style="margin-left: 15px;">External</a>
        @else
        <a href="{{url('Surat/sMasukexternal')}}" class="btn btn-outline-warning"
            style="margin-left: 15px;">External</a>
        @endif
        <a href="{{url('Surat/sMasuk')}}" class="btn btn-danger" style="margin-left: 15px;">
            <i class="fa fa-redo" aria-hidden="true"></i>
        </a>
    </div>
</div>
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
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No.Surat</th>
                                        <th>Asal Surat</th>
                                        <th>Ditujukan Kepada</th>
                                        <th>Tanggal Surat</th>
                                        <th>Isi Surat</th>
                                        <th>Keterangan</th>
                                        <th>Diterima Pada</th>
                                        <th>Sifat</th>
                                        <th>User</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $dt)
                                    <tr>
                                        <td data-label="No">{{$loop->iteration}}</td>
                                        <td data-label="No.Surat">{{$dt->no_surat}}</td>
                                        <td data-label="Asal Surat">{{$dt->asal_surat}}
                                            <br /><br />{{$dt->class}}
                                        </td>
                                        <td data-label="Ditujukan Kepada">{{$dt->tujuan_surat}}</td>
                                        <td data-label="Tanggal">
                                            {{\Carbon\Carbon::parse($dt->tanggal_surat)->format('l, d M Y')}}</td>
                                        <td data-label="Isi Surat">{{$dt->isi_surat}}
                                            <br /><br />
                                            @php
                                            $ekstensi = array('jpg','png','jpeg','gif');
                                            $eks = \File::extension($dt->lampiran)
                                            @endphp
                                            @if(in_array($eks, $ekstensi) == true)
                                            <a href="#modal-media-image" class="btn btn-warning openImageDialog"
                                                data-id="{{asset('uploads/file/'.$dt->lampiran)}}" data-toggle="modal"
                                                data-target="#modal-media-image">Image</a>
                                            @else
                                            <a href="#modal-media-pdf" class="btn btn-warning openPdfDialog"
                                                data-id="{{asset('uploads/file/'.$dt->lampiran)}}" data-toggle="modal"
                                                data-target="#modal-media-pdf">PDF</a>
                                            @endif
                                        </td>
                                        <td data-label="Keterangan">{{$dt->keterangan}}</td>
                                        <td data-label="Diterima Pada">
                                            {{\Carbon\Carbon::parse($dt->tanggal_diterima)->format('l, d M Y')}}</td>
                                        <td data-label="Sifat">{{$dt->sifat}}</td>
                                        <td data-label="User">{{$dt->name}}</td>
                                        <td data-label="Aksi" style="white-space: nowrap;text-align: center;">
                                            @if($dt->user_id == Auth::user()->id || Auth::user()->role=='Admin' ||
                                            Auth::user()->role=='Super Admin')
                                            <a class="btn btn-primary edit-surat" href="#" role="button"
                                                data-id="{{$dt->id}}" data-no="{{$dt->no_surat}}"
                                                data-asal="{{$dt->asal_surat}}" data-kelas="{{$dt->class}}"
                                                data-tujuan="{{$dt->tujuan_surat}}"
                                                data-tanggal="{{$dt->tanggal_surat}}" data-isi="{{$dt->isi_surat}}"
                                                data-ket="{{$dt->keterangan}}" data-sif="{{$dt->sifat}}"
                                                data-lamp="{{asset('uploads/file/'.$dt->lampiran)}}" data-ext="{{$eks}}"
                                                data-toggle="modal" data-target="#edit-modal">
                                                <i class="fa-fw fas fa-pencil-alt"></i>
                                                <span class="ml-1">Edit</a>
                                            <a class="btn btn-success" href="{{ route('foreign',$dt->id) }}"
                                                role="button">
                                                <i class="fa-fw fas fa-file-alt"></i>
                                                <span class="ml-1">Disposisi</a><br /><br />
                                            <a href="#delete" class="btn btn-danger delete" data-id="{{$dt->id}}"
                                                data-toggle="modal" data-target="#delete">
                                                <i class="fa-fw fas fa-trash"></i>
                                                <span class="ml-1">Delete</a>
                                            @else
                                            <a class="btn btn-secondary" href="#" role="button" data-toggle="modal"
                                                data-target="#noaction">
                                                <i class="fa-fw fas fa-pencil-alt"></i>
                                                <span class="ml-1">Edit</a>
                                            <a class="btn btn-success" href="{{ route('foreign',$dt->id) }}"
                                                role="button">
                                                <i class="fa-fw fas fa-file-alt"></i>
                                                <span class="ml-1">Disposisi</a><br /><br />
                                            <a href="#noaction" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#noaction">
                                                <i class="fa-fw fas fa-trash"></i>
                                                <span class="ml-1">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>No.Surat</th>
                                        <th>Asal Surat</th>
                                        <th>Ditujukan Kepada</th>
                                        <th>Tanggal Surat</th>
                                        <th>Isi Surat</th>
                                        <th>Keterangan</th>
                                        <th>Diterima Pada</th>
                                        <th>Sifat</th>
                                        <th>User</th>
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

@elseif($surat=='keluar')
@section('container')

@include('surat.modal')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Surat Keluar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Surat Keluar</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="col-5" style="margin-left: 8px;margin-bottom: 20px;">
    <div class="input-group">
        @if(isset($internal))
        <a href="{{url('Surat/sKeluarinternal')}}" class="btn btn-primary">Internal</a>
        @else
        <a href="{{url('Surat/sKeluarinternal')}}" class="btn btn-outline-primary">Internal</a>
        @endif
        @if(isset($external))
        <a href="{{url('Surat/sKeluarexternal')}}" class="btn btn-warning" style="margin-left: 15px;">External</a>
        @else
        <a href="{{url('Surat/sKeluarexternal')}}" class="btn btn-outline-warning"
            style="margin-left: 15px;">External</a>
        @endif
        <a href="{{url('Surat/sKeluar')}}" class="btn btn-danger" style="margin-left: 15px;">
            <i class="fa fa-redo" aria-hidden="true"></i>
        </a>
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card">
                        <!--<div class="card-header">
                            <h2>Surat Keluar</h2>
                        </div>-->
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
                                        <th>No.Surat</th>
                                        <th>Asal Surat</th>
                                        <th>Ditujukan Kepada</th>
                                        <th>Tanggal Surat</th>
                                        <th>Isi Surat</th>
                                        <th>Keterangan</th>
                                        <th>Diterima Pada</th>
                                        <th>User</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $dt)
                                    <tr>
                                        <td data-label="No">{{$loop->iteration}}</td>
                                        <td data-label="No.Surat">{{$dt->no_surat}}</td>
                                        <td data-label="Asal Surat">{{$dt->asal_surat}}
                                            <br /><br />{{$dt->class}}
                                        </td>
                                        <td data-label="Ditujukan Kepada">{{$dt->tujuan_surat}}</td>
                                        <td data-label="Tanggal">
                                            {{\Carbon\Carbon::parse($dt->tanggal_surat)->format('l, d M Y')}}</td>
                                        </td>
                                        <td data-label="Isi Surat">{{$dt->isi_surat}}
                                            <br /><br />
                                            @php
                                            $ekstensi = array('jpg','png','jpeg','gif');
                                            $eks = \File::extension($dt->lampiran)
                                            @endphp
                                            @if(in_array($eks, $ekstensi) == true)
                                            <a href="#modal-media-image" class="btn btn-warning openImageDialog"
                                                data-id="{{asset('uploads/file/'.$dt->lampiran)}}" data-toggle="modal"
                                                data-target="#modal-media-image">Image</a>
                                            @else
                                            <a href="#modal-media-pdf" class="btn btn-warning openPdfDialog"
                                                data-id="{{asset('uploads/file/'.$dt->lampiran)}}" data-toggle="modal"
                                                data-target="#modal-media-pdf">PDF</a>

                                            @endif
                                        </td>
                                        <td data-label="Keterangan">{{$dt->keterangan}}</td>
                                        <td data-label="Diterima Pada">
                                            {{\Carbon\Carbon::parse($dt->tanggal_diterima)->format('l, d M Y')}}</td>
                                        </td>
                                        <td data-label="User">{{$dt->name}}</td>
                                        <td data-label="Aksi" style="white-space: nowrap;text-align: center;">
                                            @if($dt->user_id == Auth::user()->id || Auth::user()->role=='Admin' ||
                                            Auth::user()->role=='Super Admin')
                                            <a class="btn btn-primary edit" href="#" role="button" data-id="{{$dt->id}}"
                                                data-no="{{$dt->no_surat}}" data-asal="{{$dt->asal_surat}}"
                                                data-kelas="{{$dt->class}}" data-tujuan="{{$dt->tujuan_surat}}"
                                                data-tanggal="{{$dt->tanggal_surat}}" data-isi="{{$dt->isi_surat}}"
                                                data-ket="{{$dt->keterangan}}"
                                                data-lamp="{{asset('uploads/file/'.$dt->lampiran)}}" data-ext="{{$eks}}"
                                                data-toggle="modal" data-target="#edit-modal">
                                                <i class="fa-fw fas fa-pencil-alt"></i>
                                                <span class="ml-1">Edit</a>
                                            <a href="#delete" class="btn btn-danger delete" data-id="{{$dt->id}}"
                                                data-toggle="modal" data-target="#delete">
                                                <i class="fa-fw fas fa-trash"></i>
                                                <span class="ml-1">Delete</a>
                                            @else
                                            <a class="btn btn-secondary" href="#" role="button" data-toggle="modal"
                                                data-target="#noaction">
                                                <i class="fa-fw fas fa-pencil-alt"></i>
                                                <span class="ml-1">Edit</a>
                                            <a href="#noaction" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#noaction">
                                                <i class="fa-fw fas fa-trash"></i>
                                                <span class="ml-1">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>No.Surat</th>
                                        <th>Asal Surat</th>
                                        <th>Ditujukan Kepada</th>
                                        <th>Tanggal Surat</th>
                                        <th>Isi Surat</th>
                                        <th>Keterangan</th>
                                        <th>Diterima Pada</th>
                                        <th>User</th>
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
@endif