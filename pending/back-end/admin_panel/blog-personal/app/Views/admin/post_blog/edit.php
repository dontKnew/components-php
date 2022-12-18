<?= $this->extend('admin') ?>

<?= $this->section("style") ?>
<link href="<?= base_url("admin/js/plugin/summernote/summernote-lite.min.css")?>" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<?= script_tag("admin/js/plugin/summernote/summernote-lite.min.js") ?>
<script>
    $(document).ready(function(){
        $('#short_description').summernote({
            tabsize: 2,
            height: 120,
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });

        $('#description').summernote({
            tabsize: 2,
            height: 400,
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('main-contents') ?>
<!--start main content-->
<div class="container-fluid">

    <h4 class="page-title">
        <a href="<?= route_to("admin/post-blog") ?>" class="btn btn-warning">
            <i class="la la-arrow-left"></i> Back
        </a>
    </h4>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update the Blog Post Information</div>
                </div>
                <?php if($copy): ?>
                    <form action="<?= route_to("admin/post-blog/add") ?>" method="POST" enctype="multipart/form-data">
                <?php else: ?>
                    <form action="<?= route_to("admin/post-blog/update") ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <?php endif; ?>
                    <?php if (session()->has('msg')) : ?>
                        <div class="alert alert-success text-center" role="alert">
                            <i class="la la-info-circle">   <?= session()->getFlashdata("msg") ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->has('err')) : ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= session()->getFlashdata("err") ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="author_name">Author Name  <strong class="text-danger" style="margin-left:-2px;"><small>*</small></strong></label>
                            <input type="text" name="author"  value="<?= $data["author"] ?>" class="form-control input-solid" >
                        </div>
                        <div class="form-group ">
                            <label >Meta Description </label>
                            <textarea  name="meta_description"  rows="5" class="form-control input-solid" ><?= $data["meta_description"] ?></textarea>
                            <small class="text-danger"> Note : Please enter  minimum 160 words</small>
                        </div>
                        <div class="form-group ">
                            <label>Meta Keywords </label>
                            <textarea name="meta_keywords" placeholder="Keyword1, keyword2, keyword3, "  rows="2" class="form-control input-solid" ><?= $data["meta_keywords"] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>OG Title </label>
                            <input type="text" name="og_title" value="<?= $data["og_title"] ?>" class="form-control input-solid">
                        </div>
                        <div class="form-group">
                            <label>OG Description </label>
                            <textarea name="og_description"  rows="2" class="form-control input-solid" ><?= $data["og_description"] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>OG Type </label>
                            <input type="text" name="og_type" placeholder="article" value="<?= $data["og_type"] ?>" class="form-control input-solid" >
                        </div>
                        <div class="form-group">
                            <label>OG Language </label>
                            <input type="text" name="og_locale" placeholder="en_US" value="<?= $data["og_locale"] ?>" class="form-control input-solid" >
                        </div>

                        <div class="form-group"> <!--has-success-->
                            <label>Post Title   <strong class="text-danger" style="margin-left:-2px;"><small>*</small></strong></label>
                            <input type="text" name="title" value="<?= $data["title"] ?>" class="form-control input-solid" required>
                        </div>
                        <div class="form-group ">
                            <label>Post Category <strong class="text-danger" style="margin-left:-2px;"><small>*</small></strong></label>
                            <select  name="category" class="form-control input-solid" required>
                                <option value="">Select Category</option>
                                <option value="PHP" <?php if($data["category"]=="PHP"){ echo "selected";} ?> > PHP </option>
                                <option value="General" <?php if($data["category"]=="General"){ echo "selected";} ?> > General </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Post Thumbnail <strong class="text-danger" style="margin-left:-2px;"><small>*</small></strong></label>
                            <input type="file" name="thumbnail" accept="image" class="form-control-file input-solid" >
                            <img src="<?= base_url() . "/admin/image/thumbnail/".$data["thumbnail_quality"]."/" . $data["thumbnail"] ?>"
                                 alt="<?= $data["title"] ?>" width="100" height="auto">
                        </div>
                        <div class="form-group ">
                            <label>Thumbnail Quality  <strong class="text-danger" style="margin-left:-2px;"><small>*</small></strong></label>
                            <select  name="thumbnail_quality"  class="form-control input-solid" required>
                                <option value="">Select Quality</option>
                                <option value="medium" <?php if($data["thumbnail_quality"]=="medium"){ echo "selected";} ?> >Medium</option>
                                <option value="low" <?php if($data["thumbnail_quality"]=="low"){ echo "selected";} ?> >Low</option>
                                <option value="high" <?php if($data["thumbnail_quality"]=="high"){ echo "selected";} ?> >High</option>
                                <option value="original" <?php if($data["thumbnail_quality"]=="original"){ echo "selected";} ?> >Original</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>Short Description <strong class="text-danger" style="margin-left:-2px;"><small>*</small></strong></label>
                            <textarea  name="short_description" id="short_description"  rows="5" class="form-control input-solid" required><?= $data["short_description"] ?></textarea>
                            <small class="text-danger"> Note : Please enter the description only 100 words</small>
                        </div>
                        <div class="form-group ">
                            <label>Post Description <strong class="text-danger" style="margin-left:-2px;"><small>*</small></strong></label>
                            <textarea  name="description" id="description"  rows="10" class="form-control input-solid" required><?= $data["description"] ?></textarea>
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
                        <?php if($copy): ?>
                            <button type="submit" class="btn btn-outline-success">Add Copy</button
                       <?php else: ?>
                            <button type="submit" class="btn btn-outline-primary">Submit</button
                        <?php endif; ?>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!--end main content-->
<?= $this->endSection('main-contents') ?>

