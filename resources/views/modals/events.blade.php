<!-- Delete Modal Modal -->
<div class="modal fade" id="EDeleteModal" tabindex="-1" role="dialog" aria-labelledby="CDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CDeleteModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure?
        <small class="d-block">Remember There Is No Comeback</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="eventsModalDeleteClose">Close</button>
        <button type="button" class="btn btn-danger" id="eventsModalDeleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>


<!-- events Full Information modal -->
<div class="modal fade" id="eventFullInfoModal" tabindex="-1" role="dialog" aria-labelledby="eventFullInfoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                  <div class="container">
                      <h4 class="text-center font-weight-bold" id="titleP"></h4>
                      <small class="text-center d-block" id="dateP"></small>
                      <small class="text-center d-block" id="religionP"></small>
                      <hr>
                      <p id="messageP"></p>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal" id="eventsCloseDeleteButton">Close</button>
           </div>
        </div>
    </div>
</div>