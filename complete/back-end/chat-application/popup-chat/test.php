<script>
    <input type="hidden" name="update_by" value="<?= $_SESSION['username'] ?>">
        <div class="form-group">
            <label class="col-md-4 control-label">Country Name</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <input type="text" name="name" class="form-control" required="" value="<?=  $data['name']  ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Country Code</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <input type="text" name="code" class="form-control" required="" value="<?=  $data['code']  ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Top Service Country ? <?=$data['isTop'] ?>  </label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <select name="isTop" class="form-control" required="" autocomplete="off">
                        <option value="">Select Answer </option>
                        <option value="yes" <?=($data['isTop']=="yes")?'selected':'' ?> >Yes  </option>
                        <option value="no" <?=($data['isTop']=="no")?'selected':'' ?>>No </option>
                    </select>
                </div>
            </div>
        </div>
        <?php if($_GET['operation']=="edit"){ ?>
        <div class="form-group">
            <label class="col-md-4 control-label">URL Name</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <input type="text" name="url" class="form-control" required="" value="<?=  $data['url']  ?>" autocomplete="off">
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="form-group">
            <label class="col-md-4 control-label">Sorting (Will Applicable Top Country)</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <input type="number" name="sort_order" class="form-control" required=""  value="<?=  $data['sorting']  ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Flag</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <input type="file" name="photo" class="form-control" autocomplete="off" <?=($_GET['operation']=="add")?'required':''?>>
                        <?php if($_GET['operation']=="edit"){ ?>
                        <img src="<?=BASE_URL?>/assets/flags/<?= $data['photo'];?>" height='26' width='32' >
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <?php if($_GET['operation']=="edit"){ ?>
                <button type="submit" name="update" class="btn btn-success mx-1">Update <i class="glyphicon glyphicon-send"></i></button>
                <?php }else { ?>
                <button type="submit" name="add" class="btn btn-success mx-1">Add <i class="glyphicon glyphicon-send"></i></button>
                <?php } ?>
                <a href="<?=BASE_URL?>/admin/destination.php" class="btn btn-dangs  er">Cancel X </a>
            </div>
        </div>





</script>