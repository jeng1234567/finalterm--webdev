<div class="modal fade" id="edit_type<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Services</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="edit_type.php?id=<?php echo $row['id']; ?>" method="post">
        
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="type_name" name="type_name" placeholder="Type" value="<?php echo $row['type_name']; ?>">
              <label for="type_name">Type</label>
            </div>
            </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="edit_type" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
