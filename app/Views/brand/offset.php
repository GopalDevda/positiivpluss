<?php include("include/header.php"); ?>

<?php include("include/menu.php"); ?>

        <div class="main-content-wrap sidenav-open d-flex flex-column custom_page">

            <!-- ============ Body content start ============= -->

            <div class="main-content category_body">

                <div class="breadcrumb">

                    <h1>Offset</h1>

<!--                     <ul>

                        <li><a href="">dummy</a></li>

                        <li>dummy</li>

                    </ul> -->

                </div>

                <div class="separator-breadcrumb border-top"></div>

                <div class="row" style="margin-bottom: 10px;">

                    <div class="col-md-12" style="text-align: right;">

                        <form action="<?php echo base_url() ?>/brand/offset_item_basket" method="post" onsubmit="return add_item_to_basket()">

                    <input type="hidden" name="offset_basket" id="offset_basket" />

                    <input type="hidden" name="offset_qty" id="offset_qty" />

                    <button type="submit" class="btn btn-primary custom_basket" style="background: black;color: white;font-size: 14px;font-weight: 600;border: none;padding: 7px 15px;cursor: pointer;border-radius: 25px;text-transform: capitalize;">

                      Basket <span class="badge badge-light" id="basket_count">0</span>

                    </button>                            

                        </form>

                    </div>

                </div>

                <div class="row offset_row">

<?php 

    if($offset) {

        foreach($offset as $key=>$os) {

            if($key%3==0 && $key!=0) {

?>

    </div>

    <div class="row" style="margin-top:10px;">

<?php

            }

?>

        <div class="col-md-4" style="padding:10px">

            <div class="offset_card_inner shadow">

                <img src="<?php echo base_url() ?>/public/uploads/offset/<?php echo $os['photo'] ?>">
                    <div class="offset_desc">
                        <p class="os_title" style="text-align: center;">

                        <?php echo $os['name']; ?>                        

                        </p>

                        <p style="text-align: center;">

                        <?php echo substr($os['description'],0,190); ?>

                        <span class="content_span" style="color:#262626;cursor:pointer;" onclick="read_more_content('<?php echo $os['name']; ?>','<?php echo $os['description']; ?>')"><u><b>read more</b></u></span>                        

                        </p>

                            <p style="text-align: center;color: #262626;font-size: 16px;font-weight: 700;">Rs 

                                <?php echo $os['price']; ?> / kg CO2e

                            </p>

                        <p style="text-align:center;">

                            <input type="text" id="offset_qty_<?php echo $os['id']; ?>" name="offset_qty[]" onkeypress="return onlyNumberKey(event)" /> 

                            <span class="offset_kg">kgs</span>

                        </p>

                        <p id="offset_qty_err_msg_<?php echo $os['id']; ?>" style="color:red;text-align:center;font-size:16px;"></p>

                        <div class="admin_btn btn_black mt-3" style="text-align: center;">

                            <input type="button" id="add_btn_<?php echo $os['id']; ?>" value="Add To Basket" onclick="addToBasket('<?php echo $os['id']; ?>')">    

                            <input type="button" id="remove_btn_<?php echo $os['id']; ?>" value="Remove From Basket" onclick="removeFromBasket('<?php echo $os['id']; ?>')" style="display:none;">    

                        </div>
                    </div>

            </div>

        </div>

<?php

        }

    }

?>

    </div>

        <div class="row" style="margin:20px;">

            <div class="col-md-12 admin_btn" style="text-align:center;">

                <div class="doc_create_btn" data-toggle="modal" data-target="#docCreatPopup">

                    <input type="button" value="Buy Now" data-toggle="tooltip" data-placement="top" title="Buy Offset" onclick="buy()">    

                </div>

            </div>            

        </div>

            </div>

            

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

                        <input type="hidden" name="offset_qty" id="offset_item_qty" />

                        <input type="hidden" name="tot_price" id="tot_price" value="0" />

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



<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body" id="exampleModalBody">

        ...

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

<!--         <button type="button" class="btn btn-primary">Save changes</button> -->

      </div>

    </div>

  </div>

</div>



<?php include("include/footer.php"); ?>



<script>

    var offset = []; 

    var offset_qty = [];

    var offset_qty_map = new Map();

    function addToBasket(offset_id=0) {

        off_qty = $("#offset_qty_"+offset_id).val();

        if(off_qty) {

            $("#offset_qty_err_msg_"+offset_id).html("");

            $("#add_btn_"+offset_id).hide();

            $("#remove_btn_"+offset_id).show();

            offset.push(offset_id);

            // offset_qty.push(off_qty);

            offset_qty_map.set(offset_id, off_qty);

            $("#basket_count").html(offset.length);            

        }

        else {

            $("#offset_qty_err_msg_"+offset_id).html("* please select quantity");

            $("#offset_qty_"+offset_id).focus();            

        }



    }



    function removeFromBasket(offset_id) {

        for(var i=0;i<offset.length;i++) {

            if(offset[i]==offset_id) {

                offset.splice(i, 1);

            }

        }

        offset_qty_map.delete(offset_id);

        $("#add_btn_"+offset_id).show();

        $("#remove_btn_"+offset_id).hide();

        $("#basket_count").html(offset.length);

    }



    function buy() {

        for(var i=0;i<offset.length;i++) {

            // offset_qty.push(offset_qty_map.get(offset[i]));

            offset_qty[offset[i]]=offset_qty_map.get(offset[i])

        }

        $("#offset_item_qty").val(offset_qty);

        $("#offset").val(offset);

        $("#err_msg").html('');

    }



    function check_basket() {

        if(offset.length==0) {

            $("#err_msg").html("please add an item into basket");

            return false;

        }

        return true;

    }



    function add_item_to_basket() {

        if(offset.length==0) {

            return false;

        }

        $("#offset_basket").val(offset);        

        for(var i=0;i<offset.length;i++) {

            offset_qty.push(offset_qty_map.get(offset[i]));

        }

        $("#offset_qty").val(offset_qty);

        return true;

    }



function onlyNumberKey(evt) {

          

        // Only ASCII character in that range allowed

        var ASCIICode = (evt.which) ? evt.which : evt.keyCode

        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))

            return false;

        return true;

    }

</script>

<script>

    $(document).ready(function(){

        // $(".content_span").click(function(){

        //     $("#exampleModalCenter").modal('show');

        // });

    });    



    function read_more_content(title,content) {

        $("#exampleModalLongTitle").html(title);

        $("#exampleModalBody").html(content);

        $("#exampleModalCenter").modal('show');

    }

</script>