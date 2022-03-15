<div class="modal fade" id="sickNotVerifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Verify Sick Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
            @csrf
        <div class="modal-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Sick Note Id</label>
                  <input type="text" name="stick_note_id" class="form-control" id="stick_note_id" aria-describedby="emailHelp" placeholder="Enter Sick Note Id">
                  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div id="sick_note_msg"></div>

                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="stick_note_verify_btn">Verify</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- $('#myModal').modal(options); --}}
