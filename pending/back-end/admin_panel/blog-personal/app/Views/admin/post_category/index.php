<?= $this->extend('admin') ?>
<?= $this->section('main-contents') ?>

<?= $this->section("style") ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url("admin/js/plugin/datatable/datatable.css") ?>">
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#mytable').dataTable();
    } );
</script>
<?= $this->endSection() ?>

    <div class="row d-flex justify-content-center" style="margin-top:-20px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Post Category Table</div>
                    <a href="<?= base_url("admin/post-category/add") ?>" class="btn btn-info">
                        <i class="la la-plus-circle"></i> Add Post
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
                    <?php if ($data): ?>

                        <div class="table-responsive">
                            <table class="table-head-bg-dark table-striped table-hover no-wrap" id="mytable">
                                <thead>
                                <tr class="" >
                                    <th> Id</th>
                                    <th> Name</th>
                                    <th> Created Date</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $id = 1; foreach ($data as $value):  ?>
                                    <tr>
                                        <td><?= $id++  ?></td>
                                        <td><?= esc($value['name'])?></td>
                                        <td><?= esc(date("d-M-Y", strtotime($value['created_at'])))?></td>
                                        <td class="d-md-flex">
                                            <a href="<?= url_to("admin/post-category/delete", $value["id"]) ?>"
                                               class="btn btn-sm btn btn-rounded btn-danger m-1">
                                                <i class="la la-trash"></i> Delete
                                            </a> <br>
                                            <a href="<?= url_to("admin/post-category/edit",$value["id"]) ?>"
                                               class="btn btn-sm btn btn-rounded btn-success m-1">
                                                <i class="la la-pencil-square"></i>EDIT
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
