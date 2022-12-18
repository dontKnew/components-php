<?php
// for($j=0; $j <= count($receive_work); ++$j){
//     $work = json_decode($receive_work[$j]['product_details'],true);
//     var_dump($work['customer_name_0']);
//     echo "<br>";
// }
//  exit;
$this->load->view('common/head');
?>
    <body>
<div class="page-container list-menu-view">
    <!--Leftbar Start Here -->
<?php $this->load->view('common/sidebar')?>

    <div class="page-content">
    <!--Topbar Start Here -->
    <?php $this->load->view('common/header') ?>
    <div class="main-container">
        <div class="container-fluid">
            <div class="page-breadcrumb">
                <div class="row">
                    <?php if(validation_errors()!=''){?>
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php }?>
                    <div class="col-md-7">
                        <div class="page-breadcrumb-wrap">
                            <div class="page-breadcrumb-info">

                                <ul class="list-page-breadcrumb">
                                    <li><a href="<?= base_url("admin/customer") ?>">Customer</a>
                                    </li>
                                    <li class="active-page">Edit Customer</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>
            </div>
            <?php
            if($this->session->flashdata('msg')!=''){
                echo '<div class="alert alert-success alert-dismissible">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>'.$this->session->flashdata('msg').'</strong> 
                            </div>';

                unset($_SESSION['msg']);
            }
            if($this->session->flashdata('err')!=''){
                echo '<div class="alert alert-danger alert-dismissible">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>'.$this->session->flashdata('err').'</strong> 
                            </div>';
                unset($_SESSION['err']);
            }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box-widget widget-module">
                        <div class="widget-head clearfix">
                            <span class="h-icon"><i class="fa fa-bars"></i></span>
                            <h4>Edit Customer</h4>
                        </div>
                        <div class="widget-container">
                            <div class=" widget-block">
                                <form action="<?= base_url('admin/customer/edit/'.$customer['id'])?>" method="post">
                                    <div class="form-group">
                                        <label>Finished Product Name</label>
                                        <select name="product_name" id="get_qty" class="form-control" required readonly>
                                            <option value="">Select Product</option>
                                            <?php for($j=0; $j < count($receive_work); ++$j){ ?>
                                                <option value="<?=$receive_work[$j]['id'] ?>"
                                                    <?= ($receive_work[$j]['id']==$customer['product_name']) ?"selected":"" ?>
                                                >
                                                    <?=$receive_work[$j]['item_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="qty" id="product_qty" value="<?= $customer['qty'] ?>"  class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <select name="client_name" class="form-control" required readonly>
                                            <option value="">Select Customer</option>
                                            <?php for($j=0; $j < count($stock); ++$j){ ?>
                                                <option value="<?=$stock[$j]['customer_name'] ?>"
                                                    <?= ($stock[$j]['customer_name']==$customer['client_name']) ?"selected":"" ?>
                                                >
                                                    <?=$stock[$j]['customer_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Deliver Date</label>
                                        <input type="date"  name="deliver_date" value="<?= $customer['deliver_date'] ?>" class="form-control" required readonly>
                                    </div>
                                    <input type="submit" name="" class="btn btn-success" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('common/foot'); ?>
        </div>
    </div>
    <script src="https://rapidexworldwide.com/admin/assets/js/jquery.min.js"></script>
    <script>
        $(function(){
            let current_line = parseInt($('#total_line').val());
            let x1 = current_line+1;
            $(document).on("click", ".add_fields", function () {
                let form1 = "";
                form1 +=    '<tr class="nested-fields">';
                form1 += '</td> <td> <input type="text" size="2" data-id="'+x1+'" value="'+x1+'" class="form-control"  readonly required readonly> </td>';
                form1 +='<td> <input type="text" name="product_details[UOM_'+x1+']"  data-id="'+x1+'" class="form-control" required readonly> </td>';
                form1 += '<td><select name="product_details[customer_name_'+x1+']" class="form-control" required readonly> <option value="">Select Customer</option> <?php foreach($stock as $customer): ?> <option value="<?=$customer['customer_name'] ?>"> <?=$customer['customer_name'] ?> </option> <?php endforeach; ?></select></td>';
                form1 +='<td><select  name="product_details[item_name_'+x1+']" data-id="'+x1+'" class="item_name form-control" required readonly> <option value="">Select Item</option> <?php foreach($stock as $item){ $item['product_details'] = json_decode($item['product_details'], true); for($i=0; $i <= $item['product_details']['total_line']; ++$i){ ?> <option value="<?=$item['id']."-".$item['customer_name']."-".$item['product_details']['item_name_'.$i.''] ?>"> <?=$item['product_details']['item_name_'.$i.'']?> </option><?php    } } ?></select></td>';
                form1 +=' <td> <input type="text" name="product_details[qty_'+x1+']"  data-id="'+x1+'" id="qty_'+x1+'" class="form-control qty" required readonly> </td>';
                form1 +=' <td> <span class="remove-link-td clickable col-sm-1" valign="top" > <a tabindex="-1" class="btn remove_fields existing" style="color: #dc3545;" href="javascript:void"><i class="fa fa-times"></i> </a></span> </td> </tr>';
                let current_line = x1;
                $('#total_line').val(current_line);
                x1++;
                $('.addfield').append(form1);
            });

            $(document).on('click', '.remove_fields', function () {
                let current_line = parseInt($('#total_line').val());
                if(current_line!==0){
                    let current_line = x1-1;
                    $('#total_line').val(current_line);
                    $(this).closest('tr').remove();
                }

            });

            $(document).on('change', '.item_name', function(){
                let index = $(this).data('id');
                let value  = $(this).val();
                let url = "<?= base_url("admin/assign_work/getQTY/")?>"+value;
                $.get(url, function(response, status){
                    if(status=="success"){
                        $("#qty_"+index).val(response);
                    }else {
                        alert("Could not get quantity");
                    }
                });
            });

            $(document).on('change', '#get_qty', function(){
                let value  = $(this).val();
                let url = "<?= base_url("admin/customer/getQTY/")?>"+value;
                $.get(url, function(response, status){
                    if(status=="success"){
                        $("#product_qty").val(response);
                    }else {
                        alert("Could not get quantity");
                    }
                });
            });

            $(document).on('change', '#client_name', function(){
                let data = $(this).val();
                let url = "<?= base_url("admin/customer/add") ?>?customer_id="+data+"";
                window.location.href = url;
            });





        });
    </script>
<?php $this->load->view('common/footer')?>