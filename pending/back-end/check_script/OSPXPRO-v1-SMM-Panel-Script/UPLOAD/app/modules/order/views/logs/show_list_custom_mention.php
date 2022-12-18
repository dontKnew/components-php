<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-pantone">
          <h4 class="modal-title"><i class="fe fe-list"></i> <?=$title?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <div class="form-body">
            <div class="form-group order-comments">
              <textarea class="form-control" rows="10" readonly="readonly"><?=$list?></textarea>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?=lang("Cancel")?></button>
        </div>
      </div>
    </div>
  </div>
</div>
