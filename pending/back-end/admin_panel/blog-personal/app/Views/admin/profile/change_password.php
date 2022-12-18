<?= $this->extend('admin') ?>
<?= $this->section('main-contents') ?>

<!--start main content-->
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add Slider</div>
                </div>
                <form action="<?= base_url("admin/change-password") ?>" method="POST">
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
                            <label>Email</label>
                            <input type="email" value="<?= $_SESSION['email'] ?>" class="form-control input-solid" required readonly>
                        </div>
                        <div class="form-group"> <!--has-success-->
                            <label>New Password</label>
                            <input type="password" name="password"   class="form-control input-solid" required>
                        </div>
                        <div class="form-group"> <!--has-success-->
                            <label>Confirm Password</label>
                            <input type="password" name="cpassword"  class="form-control input-solid" required>
                        </div>
                    </div>
                    <div class="card-action text-center">
                        <button type="submit" class="btn btn-warning">Submit</button
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!--end main content-->
<?= $this->endSection('main-contents') ?>
