@extends('layout.main')
@section('container')
@include('modal')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Index</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-center">
                    <img src="{{ asset('img/Logo_UPNVJ.png') }}" alt="UPN Logo" class="center"
                        style="max-height: 240px;width: 240px;display: block;margin-left: auto;margin-right: auto;">
                    <div class="card-body">
                        <h3>Sistem Arsip Persuratan FIK UPNVJ (Si-APIK)</h3>
                        <p class="card-text">Setelah sekian lama manajemen persuratan yang ada dilakukan dengan tumpukan
                            buku yang banyak, menghabiskan banyak kertas, atau kehilangan agenda penting
                            Sebagai new change di lingkungan UPN Veteran Jakarta ada cara lain untuk memudahkan
                            rekapitulasi surat masuk yang efektif, efisien, cepat dan aman
                            Sistem manajemen surat masuk yang terkontrol dapat mencatat setiap surat masuk yang ada
                            dengan cepat, membuat surat disposisi dengan mudah, bahkan melihat banyak agenda dalam waktu
                            yang singkat
                            Dilengkapi dengan fitur edit, delete dan halaman admin memudahkan pengecekkan secara berkala
                            ataupun tidak dan tetap aman tersimpan.
                            Dengan User Interface yang friendly, sistem surat masuk ini dapat mudah digunakan dengan
                            baik.</p>
                        <p class="card-text">VISI:</p>
                        <p class="card-text">Menjadi Program Studi S1 Sistem Informasi yang unggul berdaya saing,
                            inovatif dalam bidang Teknologi Informasi dan Komunikasi di tingkat nasional beridentitas
                            Bela Negara pada tahun 2025.</p>
                        <p class="card-text">MISI:</p>
                        <p class="card-text">Menghasikan lulusan yang mampu melakukan kajian dan pengembangan bidang
                            Sistem Informasi untuk mendukung ketahanan nasional.
                            Menghasilkan penelitian bidang Sistem Informasi melalui kajian dan pengembangan yang
                            inovatif dan berdaya saing untuk mendukung ketahanan nasional
                            Melaksanakan pengabdian kepada masyarakat bidang Sistem Informasi melalui kajian dan
                            pengembangan yang berguna bagi masyarakat untuk mendukung ketahanan nasional.
                        </p>

                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-lg-12">
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$smasuk}}</h3>

                        <p>Surat Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope-open-text nav-icon"></i>
                    </div>
                    <a href="{{ url('Surat/sMasuk')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$skeluar}}</h3>

                        <p>Surat Keluar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-paper-plane nav-icon"></i>
                    </div>
                    <a href="{{ url('Surat/sKeluar')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$disposisi}}</h3>

                        <p>Disposisi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-copy nav-icon "></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$users}}</h3>

                        <p>User</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>

                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>
<!-- /.content -->
@endsection