<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Timezone setup</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Your default timezone is uk local time. You can set your timezone by changing bellow.</p>
          <hr>
          <form method="post" action="{{ route('save_timezone') }}">
              @csrf
              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-2 pt-0">Timezone</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="time_zone" id="time_zone1" value="1" >
                      <label class="form-check-label" for="time_zone1">
                        GMT
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="time_zone" id="time_zone2" value="2" checked>
                      <label class="form-check-label" for="time_zone2">
                        UK Local Time
                      </label>
                    </div>

                  </div>
                </div>
              </fieldset>
              {{-- <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div> --}}

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

