@if($surat=='masuk')
<script>
  $(document).on("click", ".openImageDialog", function () {
      var myImageId = $(this).data('id');
      $(".modal-body #myImage").attr("src", myImageId);
  });

  $(document).on("click", ".openPdfDialog", function () {
      var myPdfId = $(this).data('id');
      $(".modal-body #myPdf").attr("src", myPdfId);
  });

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

  $(document).on("click", ".edit-surat", function () {
      var id = $(this).data('id');
      var no = $(this).data('no');
      var asal = $(this).data('asal');
      var kelas = $(this).data('kelas');
      var tujuan = $(this).data('tujuan');
      var tanggal = $(this).data('tanggal');
      var isi = $(this).data('isi');
      var ket = $(this).data('ket');
      var sif = $(this).data('sif');
      var lamp = $(this).data('lamp');
      var ext = $(this).data('ext');
      var act = '{{route("sMasuk.update",":id")}}';
      var array = ['jpg','png','jpeg','gif'];
      act = act.replace(':id',id)
      
      $("#edit-modal .modal-body #no_surat").val(no);
      $("#edit-modal .modal-body #asal_surat").val(asal);
      $("#edit-modal .modal-body #tujuan_surat").val(tujuan);
      $("#edit-modal .modal-body #class").val(kelas);
      $("#edit-modal .modal-body #tanggal_surat").val(tanggal);
      $("#edit-modal .modal-body #isi_surat").val(isi); 
      $("#edit-modal .modal-body #keterangan").val(ket);
      $("#edit-modal .modal-body #sifat").val(sif);
      $("#edit-modal .modal-body #form-edit").attr("action",act);
      let modal = $("#edit-modal .modal-body");

      if(jQuery.inArray(ext, array) !== -1){
        let image = document.createElement('img')
        image.style = "max-height:110vh;"
        image.id = "myImg"
        image.className = "img-fluid";
        image.src = lamp
        $("#edit-modal .modal-body").append(image);
      }else{
        let pdf = document.createElement('EMBED')
        pdf.id = "myPdf"
        pdf.width = "100%"
        pdf.style = "height: 95vh;"
        pdf.src = lamp
        $("#edit-modal .modal-body").append(pdf);
      }
})

$('#edit-modal').on('hidden.bs.modal', function (e) {
        $(this).find("input,textarea,select").val('').end();
            $("#edit-modal .modal-body #myImg").attr("src",'');
            $("#edit-modal .modal-body #myPdf").attr("src",'');
            $("#edit-modal .modal-body #myImg").remove();
            $("#edit-modal .modal-body #myPdf").remove();
            
        
      
  });
  
  $(document).on('click','.delete',function(){
           let id = $(this).attr('data-id');
           var url = '{{route("sMasuk.destroy",":id")}}';
           url = url.replace(':id', id);
           $("#deleteForm").attr('action', url);
      });
  
  $(document).on('click','.formSubmit',function(){
      $("#deleteForm").submit();
  });

  
</script>

@elseif($surat=='keluar')
<script>
  $(document).on("click", ".openImageDialog", function () {
      var myImageId = $(this).data('id');
      $(".modal-body #myImage").attr("src", myImageId);
  });

  $(document).on("click", ".openPdfDialog", function () {
      var myPdfId = $(this).data('id');
      $(".modal-body #myPdf").attr("src", myPdfId);
  });

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
      var no = $(this).data('no');
      var asal = $(this).data('asal');
      var kelas = $(this).data('kelas');
      var tujuan = $(this).data('tujuan');
      var tanggal = $(this).data('tanggal');
      var isi = $(this).data('isi');
      var ket = $(this).data('ket');
      var lamp = $(this).data('lamp');
      var ext = $(this).data('ext');
      var act = '{{route("sKeluar.update",":id")}}';
      var array = ['jpg','png','jpeg','gif'];
      act = act.replace(':id',id)
      
      $("#edit-modal .modal-body #no_surat").val(no);
      $("#edit-modal .modal-body #asal_surat").val(asal);
      $("#edit-modal .modal-body #tujuan_surat").val(tujuan);
      $("#edit-modal .modal-body #class").val(kelas);
      $("#edit-modal .modal-body #tanggal_surat").val(tanggal);
      $("#edit-modal .modal-body #isi_surat").val(isi);
      $("#edit-modal .modal-body #keterangan").val(ket);
      $("#edit-modal .modal-body #form-edit").attr("action",act);
      let modal = $("#edit-modal .modal-body");

      if(jQuery.inArray(ext, array) !== -1){
        let image = document.createElement('img')
        image.style = "max-height:110vh;"
        image.id = "myImg"
        image.className = "img-fluid";
        image.src = lamp
        $("#edit-modal .modal-body").append(image);
      }else{
        let pdf = document.createElement('EMBED')
        pdf.id = "myPdf"
        pdf.width = "100%"
        pdf.style = "height: 95vh;"
        pdf.src = lamp
        $("#edit-modal .modal-body").append(pdf);
      }
})

$('#edit-modal').on('hidden.bs.modal', function (e) {
        $(this).find("input,textarea,select").val('').end();
            $("#edit-modal .modal-body #myImg").attr("src",'');
            $("#edit-modal .modal-body #myPdf").attr("src",'');
            $("#edit-modal .modal-body #myImg").remove();
            $("#edit-modal .modal-body #myPdf").remove();
            
        
      
  });
  
  $(document).on('click','.delete',function(){
           let id = $(this).attr('data-id');
           var url = '{{route("sKeluar.destroy",":id")}}';
           url = url.replace(':id', id);
           $("#deleteForm").attr('action', url);
      });
  
  $(document).on('click','.formSubmit',function(){
      $("#deleteForm").submit();
  });
</script>

@endif