<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel">Update Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="updateStudentForm"  method="post">
            @csrf
            <input type="hidden" id="update_id">
            <div class="modal-body">
                <div class="errMsgShow"></div>


                    <div class="form-group">
                        <label>Name</label>
                        <input type="text"  class="form-control" name="update_name" id="update_name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email"  class="form-control" name="update_email" id="update_email">
                    </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary update_student">Update</button>
            </div>
    </form>
      </div>
    </div>
  </div>
