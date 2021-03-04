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
                <form method="post" action="/Surat/sMasuk/{{$id_surat}}/Disposisi" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        Tujuan Surat
                        <input class="form-control" type="text" placeholder="Ex : Dekan" name="tujuan" id="tujuan"
                            required>
                    </div>

                    <div class="form-group">
                        Isi Disposisi
                        <textarea class="form-control" type="text"
                            placeholder="Ex : Undangan Evaluasi Kinerja Fakultas..." name="isi_disposisi"
                            id="isi_disposisi" required></textarea>
                    </div>

                    <div class="form-group">
                        Sifat
                        <select class="form-control" name="sifat" id="sifat" required>
                            <option selected>Pilih Sifat Surat</option>
                            <option>Penting</option>
                            <option>Biasa</option>
                            <option>Segera</option>
                            <option>Rahasia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Batas Waktu
                        <input class="form-control" type="date" name="batas_waktu" id="batas_waktu" required>
                    </div>

                    <div class="form-group">
                        Catatan
                        <input class="form-control" type="text" placeholder="Ex : Undangan Evaluasi Kinerja Fakultas..."
                            name="catatan" id="catatan" required>
                    </div>
                    <input type="hidden" name="s_masuk_id" id="s_masuk_id" value="{{$id_surat}}">
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
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        Tujuan Surat
                        <input class="form-control" type="text" placeholder="Ex : Dekan" name="tujuan" id="tujuan"
                            value="" required>
                    </div>

                    <div class="form-group">
                        Isi Disposisi
                        <textarea class="form-control" type="text"
                            placeholder="Ex : Undangan Evaluasi Kinerja Fakultas..." name="isi_disposisi"
                            id="isi_disposisi" value="" required></textarea>
                    </div>

                    <div class="form-group">
                        Sifat
                        <select class="form-control" name="sifat" id="sifat" value="" required>
                            <option selected>Pilih Sifat Surat</option>
                            <option>Penting</option>
                            <option>Biasa</option>
                            <option>Segera</option>
                            <option>Rahasia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Batas Waktu
                        <input class="form-control" type="date" name="batas_waktu" id="batas_waktu" value="" required>
                    </div>

                    <div class="form-group">
                        Catatan
                        <input class="form-control" type="text" placeholder="Ex : Undangan Evaluasi Kinerja Fakultas..."
                            name="catatan" id="catatan" value="" required>
                    </div>
                    <input type="hidden" name="s_masuk_id" id="s_masuk_id" value="{{$id_surat}}">
                    <input type="hidden" name="id_user" id="id_user" value="1">

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