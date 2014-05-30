 <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							  </div>
							  <div class="modal-body">
								<div class="alert alert-danger fade in" id="alert-message">
      
      <h4>Are you sure you want to delete this message!</h4>
      <p>
        <input type="hidden" name="delete_from" id="delete_from" value="<?php echo $from?>">
        <input type="hidden" name="ids" id="ids" value="<?php echo $ids?>"> 
        <button class="btn btn-danger delete-message-btn" type="button"  data-dismiss="modal">Delete</button>
        <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
      </p>
    </div>
    
</div>
