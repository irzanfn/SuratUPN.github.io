@if(Auth::user()->role=='Super Admin' & $title=='Admin')
<script>
    $(function () {
            let newButton = $("#example1_filter")
            let button1 = document.createElement('a')
            button1.innerHTML = "Tambah Data"
            button1.id = "button1"
            button1.className = "btn btn-primary custom-dt-btn"
            button1.href = "{{route('adduser')}}"

            newButton.prepend(button1)
          });

  $(document).on("click", ".edit", function () {
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      var email = $(this).data('email');
      var role = $(this).data('role');
      var act = '/User/:id';
      act = act.replace(':id',id)

      $("#edit-modal .modal-body #nama").val(nama);
      $("#edit-modal .modal-body #email").val(email);
      $("#edit-modal .modal-body #role").val(role);
      
      $("#edit-modal .modal-body #form-edit").attr("action",act);
})

$('#edit-modal').on('hidden.bs.modal', function (e) {
        $(this).find("input,textarea,select").val('').end();     
  });
  
  $(document).on('click','.delete',function(){
           let id = $(this).attr('data-id');
           var url = '/User/:id';
           url = url.replace(':id', id);
           $("#deleteForm").attr('action', url);
      });
  
  $(document).on('click','.formSubmit',function(){
      $("#deleteForm").submit();
  });

  $(document).on("click", ".reset", function () {
      var id = $(this).data('id');
      var email = $(this).data('email');
      var act = '/User/:id/Reset';
      act = act.replace(':id',id)

      $("#reset-modal .modal-body #email").val(email);
      $("#reset-modal .modal-body #form-reset").attr("action",act);
})

$('#reset-modal').on('hidden.bs.modal', function (e) {
        $(this).find("input,textarea,select").val('').end();     
  });
</script>
@endif