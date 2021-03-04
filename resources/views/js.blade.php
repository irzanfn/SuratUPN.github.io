@if($index=='index')
<script>
  $(document).on("click", ".openImageDialog", function () {
      var myImageId = $(this).data('id');
      $(".modal-body #myImage").attr("src", myImageId);
  });

  $(document).on("click", ".openPdfDialog", function () {
      var myPdfId = $(this).data('id');
      $(".modal-body #myPdf").attr("src", myPdfId);
  });
 
</script>
@endif