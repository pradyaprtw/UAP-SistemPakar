<?php include "../include/server.php"; ?>
<!-- Edit -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="edit_<?php echo $rowd['id']; ?>" >
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #153097;color: #fff;">
        <h5 class="modal-title" id="exampleModalLabel">Finalize Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">

      <form method="POST" action="proceed.php">
        <input type="hidden" class="form-control" name="id" value="<?php echo $rowd['id']; ?>">
        <input type="hidden" class="form-control" name="name" value="<?php echo $rowd['name']; ?>">
        <input type="hidden" class="form-control" name="email" value="<?php echo $rowd['email']; ?>">
        <input type="hidden" class="form-control" name="gsm" value="<?php echo $rowd['gsm']; ?>">
        <input type="hidden" class="form-control" name="pemail" value="<?php echo $email; ?>">
        <input type="hidden" class="form-control" name="pname" value="<?php echo $name; ?>">
        <div class="row form-group">
          <div class="col-sm-12">
            <label class="control-label modal-label">Comment:</label>
          </div>
          <div class="col-sm-12">
            <textarea name="comment" class="form-control" placeholder="Enter comment"></textarea>
          </div>
        </div>
        
        
      
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #000;border: none;"><span class="bi bi-x-circle"></span> Close</button>
                   <button name="proceedbook" class="btn btn-success" style="background-color: #153097;border: none;"><span class="bi bi-arrow-right"></span> Submit</button>
</div>
       </form>
    </div>


            </div> 
      </div>

</div>
