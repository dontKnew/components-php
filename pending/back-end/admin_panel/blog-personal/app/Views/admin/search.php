<?= $this->extend('admin') ?>
<?= $this->section('main-contents') ?>
<?php

//print_r($data[0]);;

?>

<!--start main content-->
<div class="container-fluid">
    <!---->
    <!--    <h4 class="page-title">-->
    <!--        -->
    <!--    </h4>-->
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">Home Slider Table</div>
                    <a href="<?= base_url("admin/home-slider/add") ?>" class="btn btn-info">
                        <i class="la la-plus-circle"></i> Add Slider
                    </a>
                </div>

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
                    <?php if($data):?>
                        <div class="table-responsive">
                            <table class="table table-head-bg-primary table-striped table-hover">
                                <thead>
                                <tr>
                                    <?php unset($data[0]['created_at']); unset($data[0]['updated_at']); foreach ($data[0] as $key => $value):?>
                                        <th><?= esc(ucwords($key)) ?></th>
                                    <?php endforeach; ?>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data as $value):?>
                                    <tr>
                                        <td><?= esc($value['id']) ?></td>
                                        <td><?= esc(ucwords($value['title'])) ?></td>
                                        <td><?= esc(ucwords($value['sub_title'])) ?></td>
                                        <td><?= esc($value['youtube_url']) ?></td>
                                        <td><?= esc(ucwords($value['yt_video_title'])) ?></td>
                                        <td>
                                            <img src="<?= base_url()."/backend/img/slider/compress/". esc($value['image'])?>" alt="<?= esc($value['title']) ?>" width="100" height="auto">
                                        </td>
                                        <td><?= esc(ucwords($value['status'])) ?></td>
                                        <td>
                                            <a href="<?= base_url()."/admin/home-slider/delete/".$value['id'] ?>" class="btn btn-sm btn-danger">
                                                <i class="la la-trash"></i> Delete
                                            </a>
                                            <a href="<?= base_url("/admin/home-slider/".$value['id']) ?>" class="btn btn-sm btn-success">
                                                <i class="la la-pencil-square"></i>EDIT
                                            </a>
                                        </td>

                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    <?php else:?>
                        <h6>
                            <div class="alert alert-warning text-center"> <i class="la la-warning"></i> No Record found yet</div>
                        </h6>

                    <?php endif;?>

                </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!--end main content-->
<?= $this->endSection('main-contents') ?>
