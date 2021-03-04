<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    No. Surat
                    <input class="form-control" type="text" placeholder="Ex : 345/upnvj/20/Pertemuan" readonly
                        name="no_surat" id="no_surat" value="" required>
                </div>

                <div class="form-group">
                    Asal Surat
                    <input class="form-control" type="text" placeholder="Ex : WAREK III" readonly name="asal_surat"
                        id="asal_surat" value="" required>
                </div>

                <div class="form-group">
                    Jenis Surat
                    <input class="form-control" type="text" placeholder="Ex : DEKAN FIK" readonly readonly name="class"
                        id="class" value="" required>
                </div>

                <div class="form-group">
                    Ditujukan Kepada
                    <input class="form-control" type="text" placeholder="Ex : DEKAN FIK" readonly readonly
                        name="tujuan_surat" id="tujuan_surat" value="" required>
                </div>

                <div class="form-group">
                    Tanggal
                    <input class="form-control" type="text" name="tanggal_surat" id="tanggal_surat" readonly value=""
                        required>
                </div>

                <div class="form-group">
                    Tanggal Diterima
                    <input class="form-control" type="text" name="tanggal_diterima" id="tanggal_diterima" readonly
                        value="" required>
                </div>

                <div class="form-group">
                    Isi Surat
                    <textarea class="form-control" type="text" placeholder="Ex : Undangan Evaluasi Kinerja Fakultas..."
                        name="isi_surat" id="isi_surat" value="" readonly required></textarea>
                </div>

                <div class="form-group">
                    Keterangan
                    <textarea class="form-control" type="text" placeholder="Ex : Tempat auditorium bhineka tunggal ika"
                        name="keterangan" id="keterangan" value="" readonly required></textarea>
                </div>
            </div>
        </div>
    </div>
</div>