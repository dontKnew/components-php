<?= $this->extend('admin') ?>
<?= $this->section('main-contents') ?>

<!--start main content-->
<div class="container-fluid">

    <h4 class="page-title">
        <a href="<?= base_url("admin/apartment") ?>" class="btn btn-warning">
            <i class="la la-arrow-left"></i> Back
        </a>
    </h4>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add Apartment</div>
                </div>
                <form action="<?= base_url("admin/apartment/add") ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <?php if (session()->has('msg')) : ?>
                            <div class="alert alert-success text-center" role="alert">
                                <?= session()->getFlashdata("msg") ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->has('err')) : ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?= session()->getFlashdata("err") ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-group"> <!--has-success-->
                            <label>Apartment Title</label>
                            <input type="text" name="title" value="<?= old('title') ?>" class="form-control input-solid" required>
                        </div>
                        <div class="form-group">
                            <label>Select State</label>
                            <div class="form-inline">
                                <select name="states" class="form-control input-solid mx-md-1 mx-sm-1 my-1" required>
                                    <?php if($states): ?>
                                        <?php foreach($states as $value): ?>
                                            <option value="<?= $value['id'] ?>" <?= ($data['states']==$value['id'])?"selected":"" ?> ><?= ucwords(esc($value['name'])) ?></option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="">No States Available</option>
                                    <?php endif; ?>
                                </select>
                                <a href="<?= base_url("admin/apartment-state/add") ?>" class="mx-md-1 my-1 btn btn-success btn-md">
                                    <i class="la la-plus-circle"></i> Add
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Apartment Image</label>
                            <input type="file" name="image" class="form-control-file input-solid" >
                            <input type="hidden" name="old_image" value="<?= esc($data['image']) ?>" class="form-control-file input-solid">
                            <img src="<?= base_url()."/backend/img/apartment/compress/". esc($data['image'])?>" alt="<?= esc($data['title']) ?>" width="200" height="auto">
                        </div>

                        <div class="form-group ">
                            <label>price_start</label>
                            <input type="number"  name="price_start" value="<?=$data['price_start'] ?>" style="appearance: :none" class="form-control input-solid" required>
                        </div>
                        <div class="form-check">
                            <label>Shift Timing </label><br/>
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="shift_time" value="Day" <?= ($data['shift_time']=="day")?"checked":"" ?> required>
                                <span class="form-radio-sign">Day</span>
                            </label>
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" type="radio"   name="shift_time" value="Night" <?= ($data['shift_time']=="night")?"checked":"" ?> required>
                                <span class="form-radio-sign">Night</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Select Status</label>
                            <select name="status" class="form-control input-solid" required>
                                <option value="Private" <?= ($data['status']=="private")?"selected":"" ?>>Private</option>
                                <option value="Public"<?= ($data['status']=="public")?"selected":"" ?> >Public</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-action text-center">
                        <button type="submit" class="btn btn-outline-primary">Submit</button
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!--end main content-->
<?= $this->endSection('main-contents') ?>
