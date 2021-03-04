<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
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
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>