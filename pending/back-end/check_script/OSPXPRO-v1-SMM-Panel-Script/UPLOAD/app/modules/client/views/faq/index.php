
<div class="page-header">
  <h1 class="page-title">
    <span><i class="fe fe-help-circle" aria-hidden="true"></i></span>
    <?=lang("FAQs")?>
  </h1>
</div>

<div class="row" id="result_ajaxSearch">

  <?php if(!empty($faqs)){
    foreach ($faqs as $key => $row) {
  ?>
  <div class="col-md-12 col-xl-12 tr_<?=$row->ids?>">
    <div class="card card-collapsed">
      <div class="card-header">
        <h3 class="card-title" data-toggle="card-collapse">
          <span class="bg-question"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
          <?=$row->question?>
        </h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <?=$row->answer?>
      </div>
    </div>
  </div>
  <?php }}else{?>
  <div class="col-md-12 data-empty text-center">
    <div class="content">
      <img class="img mb-1" src="<?=BASE?>assets/images/ofm-nofiles.png" alt="empty">
      <div class="title">Look like there are no results in here!</div>
    </div>
  </div>
  <?php } ?>
</div>

