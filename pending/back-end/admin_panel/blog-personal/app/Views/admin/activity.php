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

<div class="row" style="margin-top:-20px">
    <?php if (empty($files)): ?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title text-primary">Your Last 28 days Activies...</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-head-bg-dark table-striped table-hover no-wrap" id="mytable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Activity Information</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>You have to delete a post <br>
                                    <small class="text-muted">2 mint ago</small>
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning">
                                        <i class="la la-undo"></i> Undo
                                    </a>
                                    <a href="" class="btn btn-sm btn-primary">
                                        <i class="la la-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>
                                    You're logged by window 10 at Delhi,India <br>
                                    <small class="text-muted">2 mint ago</small>
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning">
                                        <i class="la la-undo"></i> Undo
                                    </a>
                                    <a href="" class="btn btn-sm btn-primary">
                                        <i class="la la-eye"></i> View
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="col-md-12 text-center">
            <h6 class="alert alert-danger">
                <span><i class="la la-warning"></i> No Logs File Found yet</span>
            </h6>
        </div>
    <?php endif; ?>
</div>

<!--end main content-->
<?= $this->endSection('main-contents') ?>
