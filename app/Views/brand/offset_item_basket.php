<?php include("include/header.php"); ?>

<?php include("include/menu.php");?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css"  />

<style>

body {

    /*background: #ddd;

    min-height: 100vh;

    vertical-align: middle;

    display: flex;

    font-family: sans-serif;

    font-size: 0.8rem;

    font-weight: bold*/

}
.right_menu {
    margin: -21px 0px !important;
}


.title {

    margin-bottom: 5vh

}



.card {

    margin: auto;

    max-width: 950px;

    width: 90%;

    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    border-radius: 1rem;

    border: transparent

}



@media(max-width:767px) {

    .card {

        margin: 3vh auto

    }

}



.cart {

    background-color: #fff;

    padding: 4vh 5vh;

    border-bottom-left-radius: 1rem;

    border-top-left-radius: 1rem

}



@media(max-width:767px) {

    .cart {

        padding: 4vh;

        border-bottom-left-radius: unset;

        border-top-right-radius: 1rem

    }

}



.summary {
    background-color: #999A99;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: #E5E6E5;
}
.summary h5 {
    color: #E5E6E5;
}


@media(max-width:767px) {

    .summary {

        border-top-right-radius: unset;

        border-bottom-left-radius: 1rem

    }

}



.summary .col-2 {

    padding: 0

}



.summary .col-10 {

    padding: 0

}



.row {

    margin: 0

}



.title b {

    font-size: 1.5rem

}



.main {

    margin: 0;

    padding: 2vh 0;

    width: 100%

}



.col-2,

.col {

    padding: 0 1vh

}



a {

    padding: 0 1vh

}



.close {

    margin-left: auto;

    font-size: 0.7rem

}



h5 {
  
    margin-top: 4vh

}



hr {

    margin-top: 1.25rem

}



form {

    padding: 2vh 0

}



select {

    border: 1px solid rgba(0, 0, 0, 0.137);

    padding: 1.5vh 1vh;

    margin-bottom: 4vh;

    outline: none;

    width: 100%;

    background-color: rgb(247, 247, 247)

}



input {

    border: 1px solid rgba(0, 0, 0, 0.137);

    padding: 1vh;

    margin-bottom: 4vh;

    outline: none;

    width: 100%;

    background-color: rgb(247, 247, 247)

}



input:focus::-webkit-input-placeholder {

    color: transparent

}



.btn {

    background-color: #000;

    border-color: #000;

    color: white;

    width: 100%;

    font-size: 0.7rem;

    margin-top: 4vh;

    padding: 1vh;

    border-radius: 0

}



.btn:focus {

    box-shadow: none;

    outline: none;

    box-shadow: none;

    color: white;

    -webkit-box-shadow: none;

    -webkit-user-select: none;

    transition: none

}



.btn:hover {

    color: white

}



a {

    color: black

}



a:hover {

    color: black;

    text-decoration: none

}



#code {

    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");

    background-repeat: no-repeat;

    background-position-x: 95%;

    background-position-y: center

}    

</style>

<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="main-content-wrap sidenav-open d-flex flex-column custom_page report_page checkout_page">

            <!-- ============ Body content start ============= -->

        <div class="main-content category_body">

            <div class="breadcrumb">

                <h1>Offset</h1>

            </div>
            <div class="separator-breadcrumb border-top"></div>

<!-- Offset Item Basket Start -->



<div class="card">

    <div class="row">

        <div class="col-md-8 cart">

            <div class="title">

                <div class="row">

                    <div class="col">
                    <div class="back-to-shop"><a href="<?php echo base_url() ?>/brand/offset">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                        <h4><b>Shopping Cart</b></h4>

                    </div>

                    <div class="col align-self-center text-right text-muted">

                        <span id="item_count_1"><?php echo $assessment_offset?count($assessment_offset):'' ?></span> items</div>

                </div>

            </div>

            <div class="row">

                <div class="row main align-items-center">

                    <div class="col-2">

                        Image

                    </div>

                    <div class="col">

                        <div class="row text-muted">Offset Name</div>

                    </div>

                    <div class="col"> 

                        <span>Quantity</span>

                    </div>

                    <div class="col">Price</div>

                </div>

            </div>

<?php 

    if($assessment_offset) {

        foreach($assessment_offset as $key=>$ao) {

?>



            <div class="row border-top border-bottom desc">

                <div class="row main align-items-center shopping_cart_line">

                    <div class="col-2"><img class="img-fluid" src="<?php echo base_url() ?>/public/uploads/offset/<?php echo $ao['photo']; ?>"></div>

                    <div class="col">

                        <div class="row text-muted"><?php echo $ao['name'] ?></div>

<!--                         <div class="row">Cotton T-shirt</div> -->

                    </div>

                    <div class="col">

<!--                         <a href="#" onclick="decrement_quantity(this)">-</a> -->

                        <a href="#" class="border qty">

<?php echo $offset_qty_arr[$ao['id']]; ?>  kgs                         

                        </a>

<!--                         <input type="text" style="width:27px;height:27px" class="qty" name="qty[]" value="1" /> -->

<!--                         <a href="#" onclick="increment_quantity(this)">+</a>  -->

                    </div>

                    <div class="col">&#8377; <?php echo $ao['price']*($offset_qty_arr[$ao['id']]); ?> 

                    <span class="close" onclick="removeFromBasket(this,'<?php echo $ao['id']; ?>','<?php echo $ao['price']; ?>')">&#10005;</span>

                </div>

                </div>

            </div>



<?php            

        }

    }

?>



<!--            <div class="row border-top border-bottom">

                <div class="row main align-items-center">

                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/pHQ3xT3.jpg"></div>

                    <div class="col">

                        <div class="row text-muted">Shirt</div>

                        <div class="row">Cotton T-shirt</div>

                    </div>

                    <div class="col"> <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a> </div>

                    <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>

                </div>

            </div> -->

            

        </div>

        <div class="col-md-4 summary">

            <div>

                <h5><b>Summary</b></h5>

            </div>

            <hr>

            <div class="row">

                <div class="col" style="padding-left:0;">ITEMS <span id="item_count_2"><?php echo $assessment_offset?count($assessment_offset):'' ?></span></div>

                <div class="col text-right">&#8377; <span id="total_price"><?php echo $tot_price; ?></span></div>

            </div>

<!--             <form>

                <p>SHIPPING</p> <select>

                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>

                </select>

                <p>GIVE CODE</p> <input id="code" placeholder="Enter your code">

            </form> -->

            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">

                <div class="col">TOTAL PRICE</div>

                <div class="col text-right">&#8377; <span id="total_item_price"><?php echo $tot_price; ?></span></div>

            </div> <button class="doc_create_btn btn custom_checkout" data-toggle="modal" data-target="#docCreatPopup" onclick="myFunc()">Checkout</button>

        </div>

    </div>

</div>



<!-- Offset Item Basket End -->



        </div>

    </div>





                            <div class="modal fade custom_modal action_modal create_modal doc_create" id="docCreatPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered" role="document">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title" id="exampleModalCenterTitle-2">Purchase</h5>

                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                        </div>

                                        <div class="modal-body">

                                            <div class="create_doc_form">

                    <form action="<?php echo base_url() ?>/brand/offset_payment" method="post" onsubmit="return check_basket()">

                        <input type="hidden" name="offset" id="offset" />

<input type="hidden" name="offset_qty" id="offset_qty" />

                        <input type="hidden" name="tot_price" id="tot_price" />

                                                <div class="theme_field">

<!--                                                     <div class="d-flex"> -->

                                                        <div class="form_12">

                                                            <div class="theme_form_label">

                                                Name on certificate

                                                            </div>

                                                            <div class="form-group">

<input type="text" placeholder="Enter name" name="name" required="" maxlength = "20">

<p id="err_msg" style="margin-top: 8px;color: red;font-size: 13px;"></p>

                                                            </div>

                                                        </div>

<!--                                                     </div> -->

                                                </div>



                                                <div class="admin_btn mt-4">

                                                    <input type="submit" value="Pay">    

                                                </div>

                                            </form>

                                            </div>

                                            

                                        </div>

                                    </div>

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

<script>

    var offset = []; 

    var offset_qty = [];

    offset = <?php echo json_encode($offset_arr); ?>;

    var words = <?php echo json_encode($offset_qty_arr) ?>;// don't use quotes

    $.each(words, function(key, value) {

        offset_qty[key] = value;

    });

    function myFunc() {

        // qty = $("input[name='qty[]']")

        //       .map(function(){return $(this).val();}).get();

        tot_price = '<?php echo $tot_price; ?>';

        $("#offset").val(offset);        

        $("#offset_qty").val(offset_qty);        

        $("#tot_price").val(tot_price);

    }



    function removeFromBasket(that,offset_id,price) {

        var total_item_price = $("#total_item_price").html();

        var new_price = total_item_price - price;

        for(var i=0;i<offset.length;i++) {

            if(offset[i]==offset_id) {

                offset.splice(i, 1);

            }

        }

        console.log(offset);

        $("#item_count_1").html(offset.length);

        $("#item_count_2").html(offset.length);

        $("#total_item_price").html(new_price);

        $("#total_price").html(new_price);

        $(that).closest('.desc').remove();

    }



    function check_basket() {

        if(offset.length==0) {

            $("#err_msg").html("please add an item into basket");

            return false;

        }

        return true;

    }



    function decrement_quantity(that) {

        var qty = $(that).closest("div.desc").find("input[name='qty[]']").val();

        var new_qty = qty - 1;

        $(that).closest("div.desc").find("input[name='qty[]']").val(new_qty);  

    }



    function increment_quantity(that) {

        var qty = parseInt($(that).closest("div.desc").find("input[name='qty[]']").val());

        var new_qty = qty + 1;

        $(that).closest("div.desc").find("input[name='qty[]']").val(new_qty);  

    }

</script>