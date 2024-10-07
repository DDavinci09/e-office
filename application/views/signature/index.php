<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    </div>

    <section>
    <div class="container-fluid">
        <div class="boxarea" style="margin: 40px">        
            <div class="signature-pad" id="signature-pad">
                <div class="m-signature-pad">
                    <div class="m-signature-pad-body">
                    <canvas width="625" height="318"></canvas>
                    </div>
                </div>
                <input type="hidden" value="<?php echo rand();?>" id="rowno">
                <div class="m-signature-pad-footer">
                    <button type="button"  id="save2" data-action="save" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                    <button type="button" data-action="clear"  class="btn btn-danger"><i class="fa fa-trash-o"></i> Clear</button>
                </div>
            </div>
        </div>
    </div>				
	</section>
  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Warning!</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          Sign before you submit!
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->