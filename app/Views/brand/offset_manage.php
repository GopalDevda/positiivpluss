<?php include("include/header.php"); ?>

<?php include("include/menu.php");?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css"  />

<style>

.invoice-title h2, .invoice-title h3 {

    display: inline-block;

}



.table > tbody > tr > .no-line {

    border-top: none;

}



.table > thead > tr > .no-line {

    border-bottom: none;

}



.table > tbody > tr > .thick-line {

    border-top: 2px solid;

}    

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="main-content-wrap sidenav-open d-flex flex-column custom_page report_page">

            <!-- ============ Body content start ============= -->

        <div class="main-content category_body">

<div class="row">

    <div class="col-lg-12 col-md-12">

<?php 

$session = session();

if($session->get('success')){?>

  <div class="alert alert-success alert-dismissible">

  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

   <?php echo $session->get('success');?>

  </div> 

<?php } ?>

<?php 

if($session->get('error')){?>

  <div class="alert alert-danger alert-dismissible" style="font-size: 17px;">

  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

   <?php echo $session->get('error');?>

  </div> 

<?php } ?> 

    </div>       

</div>

        <div class="row">

            <div class="breadcrumb col-md-4">

                <h1>Offset</h1>

            </div>

            <div class="col-md-8 document_search">

                <div class="theme_field mt-3">

                    <input type="text" placeholder="Search">

                    <img src="https://positiveplus.io/public/uploads/dist-assets/search_icon.png" class="search_icon">

                    <div class="doc_compair_btn">

                    <a href="<?php echo base_url(); ?>/brand/offset" class="submit_btn">

                        Add Offset

                    </a>                                            

                </div>

                </div>

            </div>

        </div>

<hr/>

<?php 

    if($supplier_offset) {

        foreach($supplier_offset as $key=>$so) {

            if($so['supplier_offset']) {

?>

<div class="row">

    <div class="col-lg-12">

        <div class="accordion custom_accordion round_accordion" id="accordionRightIcon_<?php echo $key; ?>">

            <div class="card custom_tab">

                <div class="card-header header-elements-inline">

                    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">

                        <a class="text-default" data-toggle="collapse" href="#accordion-item-icons-<?php echo $key; ?>-1" aria-expanded="true"><span></span>

                            Test

                        </a>

                        <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Content here"></i>

                    </h6>

                </div> 

                <div class="collapse <?php echo $key==0?'show':'' ?>" id="accordion-item-icons-<?php echo $key; ?>-1" data-parent="#accordionRightIcon_<?php echo $key; ?>">

                    <div class="card-body">

                        <div class="custom_tab">

<ul class="nav nav-pills" id="myPillTab" role="tablist">

<li class="nav-item"><a class="nav-link active show" id="home-icon-pill-<?php echo $key; ?>" data-toggle="pill" href="#Invoice-<?php echo $key; ?>" role="tab" aria-controls="homePIll" aria-selected="false">Invoice</a></li>

<li class="nav-item"><a class="nav-link" id="profile-icon-pill-<?php echo $key; ?>" data-toggle="pill" href="#Certificate-<?php echo $key; ?>" role="tab" aria-controls="profilePIll" aria-selected="false">Certificate</a></li>

</ul> 



<div class="tab-content" id="myPillTabContent-<?php echo $key; ?>">

<div class="tab-pane fade active show" id="Invoice-<?php echo $key; ?>" role="tabpanel" aria-labelledby="home-icon-pill">





<div class="row">

        <div class="col-md-12">

            <div class="invoice-title">

                <h2>Invoice</h2><h3 class="pull-right">Order # <?php echo $so['supplier_offset']?$so['supplier_offset']['id']:'' ?></h3>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-6">

                    <address>

                    <strong>Billed To:</strong><br>

                        John Smith<br>

                        1234 Main<br>

                        Apt. 4B<br>

                        Springfield, ST 54321

                    </address>

                </div>

                <div class="col-md-6 text-right">

                    <address>

                        <strong>Payment Method:</strong><br>

                        Visa ending **** 4242<br>

                        jsmith@email.com

                    </address>

                    <address>

                        <strong>Order Date:</strong><br>

                        March 7, 2014<br><br>

                    </address>

                </div>

            </div>

        </div>

    </div>

    

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title"><strong>Order summary</strong></h3>

                </div>

                <div class="panel-body">

                    <div class="table-responsive">

                        <table class="table table-condensed">

                            <thead>

                                <tr>

                                    <td><strong>Item</strong></td>

                                    <td class="text-center"><strong>Price</strong></td>

                                    <td class="text-center"><strong>Quantity</strong></td>

                                    <td class="text-right"><strong>Totals</strong></td>

                                </tr>

                            </thead>

                            <tbody>

                                <!-- foreach ($order->lineItems as $line) or some such thing here -->

<?php 

    if($so['supplier_offset_item']) {

        foreach($so['supplier_offset_item'] as $i=>$soi) {

?>



            <tr>

                <td><?php echo $soi['name']; ?></td>

                <td class="text-center">&#8377; <?php echo $soi['offset_price']; ?> / kg CO2e</td>

                <td class="text-center"><?php echo $soi['offset_qty']; ?> kgs</td>

                <td class="text-right">&#8377; <?php echo $soi['offset_price']*$soi['offset_qty']; ?></td>

            </tr>

<?php            

        }

    }

?>

                                <tr>

                                    <td class="thick-line"></td>

                                    <td class="thick-line"></td>

                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>

                                    <td class="thick-line text-right">&#8377; <?php echo $so['supplier_offset']['stripe_amount']; ?></td>

                                </tr>

                                <tr>

                                    <td class="no-line"></td>

                                    <td class="no-line"></td>

                                    <td class="no-line text-center"><strong>Total</strong></td>

                                    <td class="no-line text-right">&#8377; <?php echo $so['supplier_offset']['stripe_amount']; ?></td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



    <div class="tab-pane fade show" id="Certificate-<?php echo $key; ?>" role="tabpanel" aria-labelledby="home-icon-pill">

    <div class="accordion_table">

    </div>

    </div>

                                                

</div>

                            </div>                                        

                    </div>

                    </div>

                </div>                            

            </div>

        </div>

        </div>

<?php

            }

        }

    }

?>

     

    </div>            

</div>



<!-- color change by toggle btn start -->        

<script>        

    var toggle = document.getElementById('toggle_btn')

    let isToggle = true;



    function myFunction() {

        var textArea = document.getElementById('color_change')

        isToggle = !isToggle

        if (isToggle) {

            textArea.value = `<iframe src="https://bigsolution.co.in/admin/brand_white_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `

        } else {

            console.log("ok ok")

            textArea.value = `<iframe src="https://bigsolution.co.in/admin/brand_black_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `

        }

    }

</script>

<!-- color change by toggle btn end -->    



<!-- tooltip start -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js" ></script>

<script>

    $(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip();   

    });



    // range slider

    $("#ex13").slider({

        ticks: [0, 100, 200],

        ticks_labels: ['$0', '$100', '$200'],

        ticks_snap_bounds: 30

    }); 



</script>   

<!-- tooltip end --> 

<?php include("include/footer.php"); ?> 