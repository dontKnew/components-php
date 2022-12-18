<?= $this->extend('admin') ?>
<?= $this->section('main-contents') ?>
<?php

//print_r($pager->hasPrevious());
//exit;

?>
<!--start main content-->
    <!---->
    <!--    <h4 class="page-title">-->
    <!--        -->
    <!--    </h4>-->
<h4 class="page-title">
    <a href="<?= base_url("admin/highlight-apartment") ?>" class="btn btn-warning">
        <i class="la la-arrow-left"></i> Back
    </a>
</h4>
    <div class="row d-flex justify-content-center mt-1" style="margin-top:-20px">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">View Apartment</div>
                    <a href="<?= base_url("admin/apartment/add") ?>" class="btn btn-info">
                        <i class="la la-plus-circle"></i> New Apartment
                    </a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-md-between justify-content-center  align-items-center">
                        <a href="<?= base_url() . "/admin/highlight-apartment/delete/" .$highlight_id ?>"
                           class="btn btn-sm btn btn-rounded btn-danger mx-1 my-1">
                            <i class="la la-trash"></i> Delete
                        </a> <br>
                        <a href="<?= base_url("/admin/apartment/" . $data['id']) ?>"
                           class="btn btn-sm btn btn-rounded btn-success">
                            <i class="la la-pencil-square"></i>EDIT
                        </a>
                    </div>
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
                    <?php if ($data): ?>
                        <div class="table-responsive">
                            <table class="table table-head-bg-primary table-striped table-hover text-center">
                                <tbody>
                                <?php
                                foreach ($data as $key => $value): ?>
                                    <tr>
                                        <th>  <?= esc(strtoupper($key)) ?> </th>
                                        <?php if($key=="image"): ?>
                                            <th>
                                                <img src="<?= base_url()."/backend/img/apartment/compress/".$value?>" alt="" width="100" height="auto">
                                            </th>
                                        <?php else:  ?>
                                        <td><?= esc(ucwords($value))?></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php  endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <h6>
                            <div class="alert alert-warning text-center"><i class="la la-warning"></i> No Record found yet </div>
                        </h6>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<!--end main content-->
<?= $this->endSection('main-contents') ?>
