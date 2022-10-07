<?= $this->extend('include/app') ?>
<?= $this->section('contents') ?>
<!-- START ADD SHIPMENT FORM -->
<div class="container-fluid pt-0 px-0">
    <div class="row  rounded  mx-0 d-flex justify-content-center py-4" style=" background-color:#f3f0f0 !important;">
        <div class="col-md-8">
            <h4 class="mb-4 text-center text-black"> Mail Configuration </h4>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <form action="<?= base_url("mail-config") ?>" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Admin Id</label>
                            <div class="input-group">
                                <input type="text" name="delivery_date" class="form-control form-white " value="<php if(isset($data)){ echo $data['admin_id'];}else {echo "hello"} ?>"  readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label text-blue"> Email Address </label>
                        <div class="input-group">
                            <input type="email" name="email"  value="<php if(isset($data)){ echo $data['email'];} ?>" class="form-control form-white"  required>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label text-blue">App Password </label>
                    <input type="text" name="app_password" class="form-control form-white" value="<php if(isset($data)){ echo $data['admin_id'];} ?>" aria-describedby="emailHelp"  required>
                    <div id="emailHelp" class="form-text text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> How to generate app password in <span class="text-danger"> Gmail account </span> ? </a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label text-blue">Last Update</label>
                    <input type="text"  value="<?php if(isset($data)){ $udate = strtotime($data['updated_at']); echo date("d-m-Y",$udate);}  ?>" class="form-control form-white" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-warning">Save Settings</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
<!-- END ADD SHIPMENT -->
<?= $this->endSection(); ?>
