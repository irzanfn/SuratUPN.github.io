<script>
    $(function () {
            let newButton = $("#example1_filter")
            let button1 = document.createElement('button')
            button1.innerHTML = "Tambah Data"
            button1.id = "button1"
            button1.className = "btn btn-primary custom-dt-btn"

            newButton.prepend(button1)

            $("#button1").on("click", ()=> {
                $("#modal-close-default").modal('show')
            })
          });

  $(document).on("click", ".edit", function () {
      var id = $(this).data('id');
      var tujuan = $(this).data('tujuan');
      var isi = $(this).data('isi');
      var sifat = $(this).data('sifat');
      var batas = $(this).data('batas');
      var cat = $(this).data('catatan');
      var s_masuk = $(this).data('surat');
      var act = '/Surat/sMasuk/:smasuk/Disposisi/:id';
      act = act.replace(':id',id)
      act = act.replace(':smasuk',s_masuk)

      $("#edit-modal .modal-body #tujuan").val(tujuan);
      $("#edit-modal .modal-body #isi_disposisi").val(isi);
      $("#edit-modal .modal-body #sifat").val(sifat);
      $("#edit-modal .modal-body #batas_waktu").val(batas);
      $("#edit-modal .modal-body #catatan").val(cat);
      
      $("#edit-modal .modal-body #form-edit").attr("action",act);
})

$('#edit-modal').on('hidden.bs.modal', function (e) {
        $(this).find("input,textarea,select").val('').end();     
  });
  
  $(document).on('click','.delete',function(){
           let id = $(this).attr('data-id');
           let smasuk = $(this).attr('data-id-smasuk');
           var url = '/Surat/sMasuk/:smasuk/Disposisi/:id';
           url = url.replace(':id', id);
           url = url.replace(':smasuk', smasuk);
           $("#deleteForm").attr('action', url);
      });
  
  $(document).on('click','.formSubmit',function(){
      $("#deleteForm").submit();
  });

  
</script>