<div class="page-header">
  <h1 class="page-title">
   <i class="fe fe-users" aria-hidden="true"></i></span>
    Subscribers
  </h1>
</div>


<div class="row" id="result_ajaxSearch">
  <?php if(!empty($users)){
  ?>
  <div class="col-md-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?=lang("Lists")?></h3>
        <div class="card-options">
          <div class="dropdown">
            <button type="button" class="btn btn-outline-info  dropdown-toggle" data-toggle="dropdown">
               <i class="fe fe-upload mr-2"></i>Export
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?=cn($module.'/export/excel')?>">Excel</a>
              <a class="dropdown-item" href="<?=cn($module.'/export/csv')?>">CSV</a>
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-vcenter card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?=lang("No_")?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?=$row?></th>
              <?php }}?>
              
              <?php
                if (!get_role("user")) {
              ?>
              <th class="text-center"><?=lang('Action')?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($users)) {
              $i = 0;
              foreach ($users as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?=$row->ids?>">
              <td><?=$i?></td>
              <td><?=$row->email?> </td>
              <td><?=$row->ip?></td>
              <td><?=$row->country?></td>
              <td style="width: 15%;"><?=convert_timezone($row->created, 'user')?></td>

              <?php
                if (get_role("admin") || get_role('supporter')) {
              ?>
              <td class="text-center w-1">
                <div class="item-action dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                  <div class="dropdown-menu">
                    <?php
                      if (get_role("admin")) {
                    ?>
                    <a class="dropdown-item ajaxDeleteItem" href="<?=cn("$module/ajax_delete_item/".$row->ids)?>"><i class="dropdown-icon fe fe-trash"></i> <?=lang('Delete')?>
                    </a>
                    <?php }?>
                    <a class="dropdown-item ajaxModal" href="<?=cn("$module/mail/".$row->ids)?>">
                      <i class="dropdown-icon fe fe-mail"></i> <?=lang("send_mail")?>
                    </a>
                  </div>
                </div>
              </td>
              <?php }?>
            </tr>
            <?php }}?>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="float-right">
      <?=$links?>
    </div>
  </div>
  <?php }else{
    echo Modules::run("blocks/empty_data");
  }?>
</div>
