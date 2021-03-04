@if($surat=='masuk')
<!--Modal-->
<div class="modal fade" id="modal-close-default" tabindex="-1" role="dialog" aria-labelledby="modal-close-default"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/Surat/sMasuk" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        No. Surat
                        <input class="form-control" type="text" placeholder="Ex : 345/upnvj/20/Pertemuan"
                            name="no_surat" id="no_surat" required>
                    </div>

                    <div class="form-group">
                        Asal Surat
                        <input class="form-control" type="text" placeholder="Ex : WAREK III" name="asal_surat"
                            id="asal_surat" required>
                    </div>

                    @if(!isset($internal) && !isset($external))
                    <div class="form-group">
                        Jenis Surat
                        <select class="form-control" name="class" required>
                            <option selected>Pilih Jenis Surat</option>
                            <option>Internal</option>
                            <option>External</option>
                        </select>
                    </div>
                    @elseif(isset($internal))
                    <div class="form-group">
                        Jenis Surat
                        <select class="form-control" name="class" readonly required>
                            <option selected>Internal</option>
                        </select>
                    </div>
                    @elseif(isset($external))
                    <div class="form-group">
                        Jenis Surat
                        <select class="form-control" name="class" readonly required>
                            <option selected>External</option>
                        </select>
                    </div>
                    @endif

                    <div class="form-group">
                        Ditujukan Kepada
                        <input class="form-control" type="text" placeholder="Ex : DEKAN FIK" name="tujuan_surat"
                            id="asal_surat" required>
                    </div>

                    <div class="form-group">
                        Tanggal
                        <input class="form-control" type="date" name="tanggal_surat" id="tanggal_surat" required>
                    </div>

                    <div class="form-group">
                        Isi Surat
                        <textarea class="form-control" type="text"
                            placeholder="Ex : Undangan Evaluasi Kinerja Fakultas..." name=" isi_surat" id="isi_surat"
                            required></textarea>
                    </div>

                    <div class="form-group">
                        Keterangan
                        <textarea class="form-control" type="text"
                            placeholder="Ex : Tempat auditorium bhineka tunggal ika" name="keterangan" id="keterangan"
                            required></textarea>
                    </div>

                    <div class="form-group">
                        Sifat Surat
                        <select class="form-control" name="sifat" required>
                            <option selected>Pilih Jenis Surat</option>
                            <option>Rahasia</option>
                            <option>Umum</option>
                        </select>
                    </div>

                    <div class="uk-margin">
                        Upload Surat
                        <input type="file" name="lampiran" id="lampiran" accept="application/pdf, image/*" required>
                    </div>

                    <input type="hidden" name="tanggal_diterima" id="tanggal_diterima"
                        value="<?php echo date('Y-m-d'); ?>">
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Update Data</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="form-edit" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        No. Surat
                        <input class="form-control" type="text" placeholder="Ex : 345/upnvj/20/Pertemuan"
                            name="no_surat" id="no_surat" value="" required>
                    </div>

                    <div class="form-group">
                        Asal Surat
                        <input class="form-control" type="text" placeholder="Ex : WAREK III" name="asal_surat"
                            id="asal_surat" value="" required>
                    </div>

                    <div class="form-group">
                        Jenis Surat
                        <select class="form-control" name="class" id="class" value="" required>
                            <option>Internal</option>
                            <option>External</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Ditujukan Kepada
                        <input class="form-control" type="text" placeholder="Ex : DEKAN FIK" name="tujuan_surat"
                            id="tujuan_surat" value="" required>
                    </div>

                    <div class="form-group">
                        Tanggal
                        <input class="form-control" type="date" name="tanggal_surat" id="tanggal_surat" value=""
                            required>
                    </div>

                    <div class="form-group">
                        Isi Surat
                        <textarea class="form-control" type="text"
                            placeholder="Ex : Undangan Evaluasi Kinerja Fakultas..." name="isi_surat" id="isi_surat"
                            value="" required></textarea>
                    </div>

                    <div class="form-group">
                        Keterangan
                        <textarea class="form-control" type="text"
                            placeholder="Ex : Tempat auditorium bhineka tunggal ika" name="keterangan" id="keterangan"
                            value="" required></textarea>
                    </div>

                    <div class="form-group">
                        Sifat Surat
                        <select class="form-control" name="sifat" id="sifat" value="" required>
                            <option>Rahasia</option>
                            <option>Umum</option>
                        </select>
                    </div>

                    <div class="uk-margin">
                        Upload Surat
                        <input type="file" name="lampiran" id="lampiran" accept="application/pdf, image/*">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h4 class="modal-title">Are you sure?</h4>
            <form action="" id="deleteForm" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-danger mr-auto"
                        onclick="formSubmit()">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="noaction">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>You don't have access to change this document!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div id="modal-media-image" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img id="myImage" src="" alt="" width="100%" height="100%">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div id="modal-media-pdf" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <embed src="" id="myPdf" type="application/pdf" width="100%" style="height: 95vh;">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal-->
@elseif($surat=='keluar')
<div class="modal fade" id="modal-close-default" tabindex="-1" role="dialog" aria-labelledby="modal-close-default"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/Surat/sKeluar" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        No. Surat
                        <input class="form-control" type="text" placeholder="Ex : 345/upnvj/20/Pertemuan"
                            name="no_surat" id="no_surat" required>
                    </div>

                    <div class="form-group">
                        Asal Surat
                        <input class="form-control" type="text" placeholder="Ex : WAREK III" name="asal_surat"
                            id="asal_surat" required>
                    </div>

                    <div class="form-group">
                        Jenis Surat
                        <select class="form-control" name="class" required>
                            <option selected>Pilih Jenis Surat</option>
                            <option>Internal</option>
                            <option>External</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Ditujukan Kepada
                        <input class="form-control" type="text" placeholder="Ex : DEKAN FIK" name="tujuan_surat"
                            id="asal_surat" required>
                    </div>

                    <div class="form-group">
                        Tanggal
                        <input class="form-control" type="date" name="tanggal_surat" id="tanggal_surat" required>
                    </div>

                    <div class="form-group">
                        Isi Surat
                        <textarea class="form-control" type="text"
                            placeholder="Ex : Undangan Evaluasi Kinerja Fakultas..." name="isi_surat" id="isi_surat"
                            required></textarea>
                    </div>

                    <div class="form-group">
                        Keterangan
                        <textarea class="form-control" type="text"
                            placeholder="Ex : Tempat auditorium bhineka tunggal ika" name="keterangan" id="keterangan"
                            required></textarea>
                    </div>

                    <div class="uk-margin">
                        Upload Surat
                        <input type="file" name="lampiran" id="lampiran" accept="application/pdf, image/*" required>
                    </div>

                    <input type="hidden" name="tanggal_diterima" id="tanggal_diterima"
                        value="<?php echo date('Y-m-d'); ?>">
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="noaction">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>You don't have access to change this document!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Update Data</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" id="form-edit" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        No. Surat
                        <input class="form-control" type="text" placeholder="Ex : 345/upnvj/20/Pertemuan"
                            name="no_surat" id="no_surat" value="" required>
                    </div>

                    <div class="form-group">
                        Asal Surat
                        <input class="form-control" type="text" placeholder="Ex : WAREK III" name="asal_surat"
                            id="asal_surat" value="" required>
                    </div>

                    <div class="form-group">
                        Jenis Surat
                        <select class="form-control" name="class" id="class" value="" required>
                            <option>Internal</option>
                            <option>External</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Ditujukan Kepada
                        <input class="form-control" type="text" placeholder="Ex : DEKAN FIK" name="tujuan_surat"
                            id="tujuan_surat" value="" required>
                    </div>

                    <div class="form-group">
                        Tanggal
                        <input class="form-control" type="date" name="tanggal_surat" id="tanggal_surat" value=""
                            required>
                    </div>

                    <div class="form-group">
                        Isi Surat
                        <textarea class="form-control" type="text"
                            placeholder="Ex : Undangan Evaluasi Kinerja Fakultas..." name="isi_surat" id="isi_surat"
                            value="" required></textarea>
                    </div>

                    <div class="form-group">
                        Keterangan
                        <textarea class="form-control" type="text"
                            placeholder="Ex : Tempat auditorium bhineka tunggal ika" name="keterangan" id="keterangan"
                            value="" required></textarea>
                    </div>

                    <div class="uk-margin">
                        Upload Surat
                        <input type="file" name="lampiran" id="lampiran" accept="application/pdf, image/*">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <h4 class="modal-title">Are you sure?</h4>
            <form action="" id="deleteForm" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-danger mr-auto"
                        onclick="formSubmit()">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="modal-media-image" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img id="myImage" src="" alt="" width="100%" height="100%">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div id="modal-media-pdf" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <embed src="" id="myPdf" type="application/pdf" width="100%" style="height: 95vh;">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal-->
@endif