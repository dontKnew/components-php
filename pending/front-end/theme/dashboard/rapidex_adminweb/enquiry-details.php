<?
session_start();
include "config.php"; 

$id=$_GET['id'];
             $sqlp=mysqli_query($con, "select * from enquiry where   id='$id' ") or die(mysqli_error($con));
            $rowp=mysqli_fetch_array($sqlp);
                    

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapidex Enquiry</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 12px;
        line-height: 16px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse; 
    border:1px solid #ddd;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    border:1px solid #ddd;
    }
    
    .invoice-box table tr td:nth-child(2) { 
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 0px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 0px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    

    table{
        border-collapse: collapse; 
    border:1px solid #ddd;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
    <h1 style="text-align:center">Rapidex Worldwide Enquiry</h1>
        <table border="none" style="border: 0px" >
    
            <tr class="information">
                <td  ><strong>Company</strong></td>                  
               <td><? echo $rowp['company_name']; ?></td>
                   <td  ><strong>Country</strong></td>                  
               <td><? echo $rowp['country']; ?></td>
                 
            </tr>
            <tr class="information">
                <td  ><strong>Weight</strong></td>                  
               <td><? echo $rowp['weight']; ?></td>
                   <td  ><strong>Charges</strong></td>                  
               <td><? echo $rowp['charges']; ?></td>
                 
            </tr>

            <tr class="information">
                <td  ><strong>Charges with GST</strong></td>                  
               <td><? echo $rowp['charges_with_gst']; ?></td>
                   <td  ><strong>Booking Date</strong></td>                  
               <td><? echo $rowp['booking_date']; ?></td>
                 
            </tr>
        </table>
        <br><br>
   <table width="100%" >
      <tr class="information">
                <td  ><strong>Cust Name</strong></td>                  
               <td><? echo $rowp['cust_name']; ?></td>
                   <td  ><strong>Cust Mobile</strong></td>                  
               <td><? echo $rowp['cust_mobile']; ?></td>
                 
            </tr>


      <tr class="information">
                <td  ><strong>Cust Email</strong></td>                  
               <td><? echo $rowp['cust_email']; ?></td>
                   <td  ><strong>Cust Address</strong></td>                  
               <td><? echo $rowp['cust_address']; ?></td>
                 
            </tr>

      <tr class="information">
                <td  ><strong>Cust Pincode</strong></td>                  
               <td><? echo $rowp['cust_pincode']; ?></td>
                   <td  ><strong>Pickup Prefered Date</strong></td>                  
               <td><? echo $rowp['pickup_prefered_date']; ?></td>
                 
            </tr> 

  <tr class="information">
               
                   <td  ><strong>Pickup Prefered Time</strong></td>                  
               <td colspan="3"><? echo $rowp['pickup_prefered_time']; ?></td>
                 
            </tr> 

 

              </table>
        <br><br>
   <table width="100%" >
      <tr class="information">
                <td  ><strong>Consignee Name</strong></td>                  
               <td><? echo $rowp['cons_name']; ?></td>
                   <td  ><strong>Consignee Mobile</strong></td>                  
               <td><? echo $rowp['cons_mobile']; ?></td>
                 
            </tr>


      <tr class="information">
                <td  ><strong>Consignee Email</strong></td>                  
               <td><? echo $rowp['cons_email']; ?></td>
                   <td  ><strong>Consignee Address</strong></td>                  
               <td><? echo $rowp['cons_address']; ?></td>
                 
            </tr>

      <tr class="information">
                <td  ><strong>Consignee Pincode</strong></td>                  
               <td><? echo $rowp['cons_pincode']; ?></td>
                   <td  ><strong> </strong></td>                  
               <td> </td>
                 
            </tr> 

 

              </table>

       
    </div>
    <br><br>
</body>
</html>