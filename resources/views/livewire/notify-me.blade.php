<div wire:ignore.self class="modal" id="notifyMe">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Notify me</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
                <div class="form-group">
                  <label for="email">Email Address:</label>
                  <input type="email" class="form-control" wire:model="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="phone">Mobile Phone:</label>
                  <input type="phone" class="form-control" wire:model="phone" placeholder="Enter mobile phone">
                </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" wire:click="save">Submit &nbsp; <div wire:loading wire:target="save" class="spinner-border spinner-border-sm"></div></button>
        </div>
  
      </div>
    </div>
</div>
