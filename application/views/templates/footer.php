<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Office <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Untuk Select Katergory --->
<script src="<?= base_url('assets/'); ?>js/jquery-3.3.1.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Get Data Select -->
<script>
    $(document).ready(function() {
        $("#unit").change(function() {
            var url = "<?php echo site_url('disposisi/add_ajax_jabatan'); ?>/" + $(this).val();
            $('#jabatan').load(url);
            return false;
        })
    });
</script>

<!-- Tanda Tangan Digital -->
<script>
    var wrapper = document.getElementById("signature-pad"),
    clearButton = wrapper.querySelector("[data-action=clear]"),
    saveButton = wrapper.querySelector("[data-action=save]"),
    canvas = wrapper.querySelector("canvas"),
    signaturePad;

    function resizeCanvas() {
      var ratio =  window.devicePixelRatio || 1;
      canvas.width = canvas.offsetWidth * ratio;
      canvas.height = canvas.offsetHeight * ratio;
      canvas.getContext("2d").scale(ratio, ratio);
    }
    signaturePad = new SignaturePad(canvas);

    clearButton.addEventListener("click", function (event) {
      signaturePad.clear();
    });
    saveButton.addEventListener("click", function (event) {   
      if (signaturePad.isEmpty()) {
        $('#myModal').modal('show');
      }
      else {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>signature/insert_single_signature",
          data: {'image': signaturePad.toDataURL(),'rowno':$('#rowno').val()},
          success: function(datas1)
          {            
            signaturePad.clear();
            $('.previewsign').html(datas1);
          }
        });
      }
    }); 
  </script>

  
</body>

</html>