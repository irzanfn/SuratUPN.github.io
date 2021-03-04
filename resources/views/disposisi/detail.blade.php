@extends('layout.main')
@section('container')
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
                    <li class="breadcrumb-item"><a href="javascript:history.back()">Disposisi</a></li>
                    <li class="breadcrumb-item active">{{$dt->id}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to
                    test.
                </div>

                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <img id="myImage" src="{{asset('img/kopsurat.png')}}" alt="" width="100%" height="100%">
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <small class="float-left">Nomor Disposisi :
                                    {{($dt->id)}}</small>
                                <small class="float-right">Date :
                                    {{\Carbon\Carbon::parse($dt->created_at)->format('d M Y')}}</small>
                            </h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <h3 style="text-align: center;">Lembar Disposisi</h3>
                        </div>
                        <!-- /.col -->
                    </div>
                    <br>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Dari
                            <address>
                                <strong>{{$dt->asal_surat}}</strong><br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Kepada
                            <address>
                                <strong>{{$dt->tujuan}}</strong><br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>No. Surat:</b> {{$dt->no_surat}}<br>
                            <b>Hari/ Tanggal :</b> {{\Carbon\Carbon::parse($dt->created_at)->format('d M Y')}}<br>
                            <b>Perihal :</b> {{$dt->isi_surat}}<br>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <br><br>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Disposisi</th>
                                        <th>Catatan</th>
                                        <th>Batas Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$dt->isi_disposisi}}</td>
                                        <td>{{$dt->catatan}}</td>
                                        <td>{{\Carbon\Carbon::parse($dt->batas_waktu)->format('l, d M Y')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div id="lead" style="width: auto;position: relative;margin: 25px 0 0 75%;">
                        <p>Dengan hormat,</p>
                        <div style="height: 75px;"></div>
                        <p class="lead" style="font-weight: bold;text-decoration: underline;margin-bottom: -5px;">
                            {{Auth::user()->name}}</p>
                        <p>NIP. {{Auth::user()->nip}}</p>
                    </div>
                    <!-- /.row -->


                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="{{url('/Surat/sMasuk/'.$id_surat.'/Disposisi/'.$dt->id.'/print')}}" rel="noopener"
                                target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection