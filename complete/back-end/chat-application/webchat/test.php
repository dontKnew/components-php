<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';


$search_str = trim(filter_input(INPUT_POST, 'search_str'));
$back_to_url = trim(filter_input(INPUT_POST, 'back_to_url'));
$entry_row = filter_input(INPUT_POST, 'entry_row');
$id = filter_input(INPUT_GET, 'id');
$data_to_db = array_filter($_POST);
$db = getDbInstance();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET['operation'] == "add") {
        try {

            $db->insert("country-charge", $data_to_db);
            $_SESSION['success'] = 'Courier Charge added successfully!';
            header('Location: country-charge.php');
            exit;
        } catch (Exception $e) {
            $_SESSION['failure'] = 'Criticle Error ' . $e->getMessage();
            header('Location: country-charge.php?operation=add');
            exit;
        }
    } else if ($_GET['operation'] == "edit") {
        try {
            $data = $db->where("id", $id)->getOne('country-charge', "country-charge.*");
            if ($_FILES['country-charge']['name'] !== "") {
                $extension = pathinfo($_FILES['country-charge']['name'], PATHINFO_EXTENSION);
                $file_name .= uniqid(url_title($data_to_db['name'],"_")."_").".".$extension;
                $target_dir = "assets/country-charge/";
                $target_file = $target_dir . $file_name;

                if (!file_exists($target_file)) {
                    move_uploaded_file($_FILES['country-charge']['tmp_name'], $target_file);
                    $data_to_db['country-charge'] = $file_name;
                    @unlink("assets/image/country-charge/".$data['country-charge']);
                }
            }else {
                $data_to_db['country-charge'] = $data['country-charge'];
            }


            $db->where("id", $id)->update("country-charge", $data_to_db);
            $_SESSION['success'] = 'Courier Charge updated successfully!';
            header('Location: country-charge.php');
            exit;
        } catch (Exception $e) {
            $_SESSION['failure'] = 'Criticle Error ' . $e->getMessage();
            header('Location: country-charge.php');
            exit;
        }
    }
} else {
    if (isset($_GET['operation']) && $_GET['operation'] == "edit") {

        $data = $db->where("id", $id)->getOne('country-charge', "country-charge.*");

    } else if (isset($_GET['operation']) && $_GET['operation'] == "delete") {

        $data = $db->where("id", $id)->getOne('country-charge', "country-charge.*");
        @unlink("assets/image/country-charge/".$data['country-charge']);

        if ($db->where("id", $id)->delete("country-charge")) {
            $_SESSION['success'] = 'Courier Charge deleted successfully!';
            header('Location: country-charge.php');
            exit;

        } else {
            $_SESSION['failure'] = 'Delete operation failed, Please try again later';
            header('Location: country-charge.php');
            exit;
        }
    }
}

if (isset($entry_row)) {
    $pagelimit = $entry_row;
} else {
    $pagelimit = 15;
}

$page = filter_input(INPUT_GET, 'page');
if (!$page) {
    $page = 1;
}

$db = getDbInstance();
if ($search_str) {
    $db->where('name', '%' . $search_str . '%', 'like');
    $db->orwhere('comment', '%' . $search_str . '%', 'like');
    $db->orwhere('star', '%' . $search_str . '%', 'like');
}
$db->orderBy("id", "asc");
$db->pageLimit = $pagelimit;
if (isset($entry_row) && $entry_row == null) {
    $rows = $d->get('country-charge');
} else {
    $rows = $db->arraybuilder()->paginate('country-charge',$page);
}
$total_pages = $db->totalPages;

?>
<?php include BASE_PATH . '/includes/header.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Manage Documents</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="country-charge.php?operation=add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add</a>
            </div>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>


    <?php if(isset($_GET['operation']) && $_GET['operation']=="edit" || $_GET['operation']=="add" ){ ?>
        <form class="well form-horizontal" action="" method="post" enctype="multipart/form-data" id="contact_form">
            <?php include BASE_PATH . '/forms/country-charge.php'; ?>
        </form>
    <?php } ?>

    <div class="well text-center filter-form">
        <?php $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']
            === 'on' ? "https" : "http") .
            "://" . $_SERVER['HTTP_HOST'] .
            $_SERVER['REQUEST_URI'];  ?>
        <div style="display:flex; justify-content:space-between; align-items:center; margin: 0 5px;">
            <form action="" method="post" class="form-inline" style="margin:0px 5px;">
                <label class="control-label" for="company">Select Row</label>
                <select id="company" name="entry_row" onchange="this.form.submit()" class="form-control">
                    <option <?php if($pagelimit==15){echo "selected";} ?> >15</option>
                    <option <?php if($pagelimit==25){echo "selected";} ?> >25</option>
                    <option <?php if($pagelimit==50){echo "selected";} ?>>50</option>
                    <option <?php if($pagelimit==75){echo "selected";} ?>>75</option>
                    <option <?php if($pagelimit==100){echo "selected";} ?>>100</option>
                    <option value="" <?php if($pagelimit==null){echo "selected";} ?>>All</option>
                </select>
            </form>
            <form action="" method="post" style="display:flex;">
                <label for="input_search" style="margin-top:5px; margin-right:2px;">Search</label>
                <?php if(isset($search_str) && $search_str !==''){?>
                    <a href="<?= $back_to_url ?>" style="margin: 5px;font-size: 16px; cursor:pointer">
                        <i class="fa fa-times text-danger" aria-hidden="true"></i>
                    </a>
                <?php };?>
                <input type="search" class="form-control" id="input_search" name="search_str" value="<?php echo htmlspecialchars($search_str, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" value="<?= $link ?>" name="back_to_url">
                <input type="submit" value="Go" style="margin-left:2px;" class="btn btn-primary">
            </form>
        </div>
    </div>
    <hr>
    <div style="overflow-x:auto;">
        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr>
                <th>Country Name</th>
                <th>Line One</th>
                <th >Line Two</th>
                <th >Update By</th>
                <th >Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row):  ?>
                <tr>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['sort_order']; ?></td>
                    <td><a href="<?=BASE_URL?>/admin/assets/country-charge/<?= $row['country-charge']; ?>" target="blank" > <?= $row['country-charge']; ?> </a> </td>
                    <td><?= $row['update_by']; ?></td>
                    <td>
                        <a href="country-charge.php?id=<?php echo $row['id']; ?>&operation=edit" class="btn btn-primary" title="edit"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="country-charge.php?id=<?php echo $row['id']; ?>&operation=delete" class="btn btn-danger" title="delete"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <div class="text-center">
        <?php echo paginationLinks($page, $total_pages, 'country-charge.php'); ?>
    </div>
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php'; ?>
