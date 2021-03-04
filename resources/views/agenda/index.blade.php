@extends('layout.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Buku Agenda Surat {{$surats}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Agenda - Surat Masuk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="col-5" style="margin-left: 8px;margin-bottom: 20px;">
    @if($surats=='Masuk')
    <form method="post" action="/Agenda/sMasuk" enctype="multipart/form-data">
        @else
        <form method="post" action="/Agenda/sKeluar" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="input-group">
                <input type="date" id="dari" name="dari" class="form-control" placeholder="Start" required />
                <span class="input-group-addon"> - </span>
                <input type="date" id="sampai" name="sampai" class="form-control" placeholder="End" required />
                <button type="submit" class="btn btn-primary" style="margin-left: 15px;">Search<span class="ml-1"><i
                            class="fa-fw fas fa-search"></i></button>
            </div>
        </form>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="printableArea">
                                @if(isset($data))
                                <div class="col-12">
                                    <img id="myImage" src="{{asset('img/kopsurat.png')}}" alt="" width="100%"
                                        height="100%">
                                </div>
                                @endif
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($data))
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
                                            <td data-label="Isi Surat">{{$dt->isi_surat}}</td>
                                            <td data-label="Keterangan">{{$dt->keterangan}}</td>
                                            <td data-label="Diterima Pada">
                                                {{\Carbon\Carbon::parse($dt->tanggal_diterima)->format('l, d M Y')}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
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
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <div class="row no-print">
                <div class="col-12" style="margin-left: 8px;margin-bottom: 20px;">
                    <button class="btn btn-secondary print" onClick="printDiv('printableArea')"><i
                            class="fas fa-print"></i>
                        Print</button>
                </div>
            </div><!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</section>
@endsection