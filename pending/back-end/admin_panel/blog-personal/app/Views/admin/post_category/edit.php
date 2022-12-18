<?= $this->extend('admin') ?>

<?= $this->section('main-contents') ?>
<!--start main content-->
<div class="container-fluid">

    <h4 class="page-title">
        <a href="<?= route_to("admin/post-category") ?>" class="btn btn-warning">
            <i class="la la-arrow-left"></i> Back
        </a>
    </h4>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update the Post Category Information</div>
                </div>
                <form action="<?= route_to("admin/post-category/update") ?>" method="POST">
                    <?php if (session()->has('msg')) : ?>
                        <div class="alert alert-success text-center" role="alert">
                            <i class="la la-info-circle"> <?= session()->getFlashdata("msg") ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->has('err')) : ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= session()->getFlashdata("err") ?>
                        </div>
                    <?php endif; ?>
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="author_name">Category Name <strong class="text-danger" style="margin-left:-2px;"><small>*</small></strong></label>
                            <input type="text" name="name"  value="<?= $data["name"] ?>" class="form-control input-solid" >
                        </div>
                        <div class="form-group ">
                            <label>Post Privacy  <strong class="text-danger" style="margin-left:-2px;"><small>*</small></strong></label>
                            <select  name="privacy" class="form-control input-solid" required>
                                <option value="">Select Privacy</option>
                                <option value="public" <?php if($data["privacy"]=="public"){ echo "selected";} ?> >Public</option>
                                <option value="private" <?php if($data["privacy"]=="private"){ echo "selected";} ?> >Private</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-action text-center">
                        <button type="submit" class="btn btn-outline-info">Update Category</button
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!--end main content-->
<?= $this->endSection('main-contents') ?>

