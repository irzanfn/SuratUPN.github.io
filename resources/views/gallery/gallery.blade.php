@extends('layout.main')
@section('container')

@include('gallery.modal')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Gallery - Surat {{$gallery}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item">Gallery</li>
                    <li class="breadcrumb-item active">Surat {{$gallery}}</li>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Surat {{$gallery}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($data as $dt)
                            @php
                            $ekstensi = array('jpg','png','jpeg','gif');
                            $eks = \File::extension($dt->lampiran)
                            @endphp
                            @if(in_array($eks, $ekstensi) == true)
                            <div class="col-sm-2">
                                <p> {{$dt->no_surat}} </p>
                                <a class="edit" href="#modal" role="button" data-id="{{$dt->id}}"
                                    data-no="{{$dt->no_surat}}" data-asal="{{$dt->asal_surat}}"
                                    data-kelas="{{$dt->class}}" data-tujuan="{{$dt->tujuan_surat}}"
                                    data-tanggal="{{$dt->tanggal_surat}}" data-tanggald="{{$dt->tanggal_diterima}}"
                                    data-isi="{{$dt->isi_surat}}" data-ket="{{$dt->keterangan}}"
                                    data-lamp="{{asset('uploads/file/'.$dt->lampiran)}}" data-ext="{{$eks}}"
                                    data-toggle="modal" data-target="#edit-modal">
                                    <img src="{{asset('uploads/file/'.$dt->lampiran)}}" class="img-fluid mb-2" alt="img"
                                        height="288.167px" /></a>
                            </div>
                            @else
                            <div class="col-sm-2">
                                <p> {{$dt->no_surat}} </p>
                                <a class="edit" href="#modal" role="button" data-id="{{$dt->id}}"
                                    data-no="{{$dt->no_surat}}" data-asal="{{$dt->asal_surat}}"
                                    data-kelas="{{$dt->class}}" data-tujuan="{{$dt->tujuan_surat}}"
                                    data-tanggal="{{$dt->tanggal_surat}}" data-tanggald="{{$dt->tanggal_diterima}}"
                                    data-isi="{{$dt->isi_surat}}" data-ket="{{$dt->keterangan}}"
                                    data-lamp="{{asset('uploads/file/'.$dt->lampiran)}}" data-ext="{{$eks}}"
                                    data-toggle="modal" data-target="#edit-modal">
                                    <img src="{{asset('img/pdf.png')}}" class="img-fluid mb-2" alt="pdf" />
                                </a>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection