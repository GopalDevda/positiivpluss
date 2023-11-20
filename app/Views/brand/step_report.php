<?= $this->extend('brand/layout/master-page.php') ?> 
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/katex.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/quill.snow.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<style type="text/css">
.detail h5{
  margin-top: 30px; 
  border-bottom: 1px solid #80808069;

}
div#details_card h5 {
    border-bottom: 1px solid;
    border-color: #80808069;
    color: #808080d9;
}
  .mybg{
      background: #262626 !important;
      color: #fff !important;
      position: absolute;
      width: 100%;
      height: 57px;
  }
  .mybg h5{
      color: #fff !important;
  }
  .myimg-style{
    width: 46px;
    border-radius: 50%;
    border: 0.5px solid #defe73;
    padding: 2px
  }
  .margin-top{
    margin-top: 39px !important;
  }
  .divider .divider-text:after, .divider .divider-text:before {
    border-top: 1px solid #defe73 !important;
  }
  .divider .divider-text:after, .divider .divider-text:before {
    border-top: 1px solid #defe73 !important;
  }
  .card_body_inn_2 {
    padding: 0 1.25rem 1.25rem;
  }
  .card_body_txt.vertical_full {
    flex-direction: column;
  }
  .card_body_txt {
    display: flex;
    align-items: center;
  }
  .card_body_txt.vertical_full .q_radio_btn.vertical {
    margin-bottom: 20px;
    max-width: 100%;
    width: 100%;
  }
  .card_body_txt.cbt_2 .q_radio_btn {
      display: grid;
  }
  .card_body_txt .q_radio_btn.vertical {
      flex-direction: column;
      width: 8%;
      margin: 0 0 0 auto;
      border: none;
  }
  .card_body_txt .q_radio_btn {
      border: 2px solid #262626;
  }
  .card_body_txt .q_radio_btn {
      width: 20%;
      display: flex;
      align-items: center;
      border: 1px solid #defe73;
      border-radius: 25px;
  }
  .q_radio_btn {
      margin: 20px 0px;
  }
  .card_body_txt .q_radio_btn.vertical .radio {
      border: 2px solid #262626 !important;
  }
  .card_body_txt .q_radio_btn.vertical .radio {
      width: 100%;
      border-radius: 40px;
      margin-bottom: 10px;
      height: auto;
      overflow: hidden;
  }

  .card_body_txt .q_radio_btn .radio {
      margin-bottom: 0;
      padding-left: 0;
      height: 36px;
      width: 50%;
  }
  .card_body_txt .q_radio_btn.q_radio_first .radio span, .card_body_txt .q_radio_btn.q_radio_first .radio:first-child span {
    border-right: none !important;
 }

.card_body_txt .q_radio_btn.q_radio_first .radio:first-child span {
    border-right: 2px solid #262626 !important;
}
.card_body_txt .q_radio_btn.q_radio_first .radio:first-child span {
    border-radius: 25px 0 0 25px;
}
.card_body_txt .q_radio_btn.vertical .radio:first-child span {
    /* border-radius: 25px 25px 0 0; */
}
.card_body_txt .q_radio_btn .radio:first-child span {
    /* border-right: 2px solid #262626 !important; */
}
.card_body_txt.vertical_full .q_radio_btn .radio span {
    padding: 7px 20px;
    line-height: 20px;
    border-radius: 30px;
}
.card_body_txt .q_radio_btn .radio:first-child span {
    /* border-radius: 25px 0 0 25px; */
}
.card_body_txt .radio input:checked~span {
    background-color: #DEFE73 !important;
    color: #262626;
}
.card_body_txt .q_radio_btn .radio span {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: #262626;
}
.checkbox input, .radio input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}
.q-detail{
    background: #262626;
    padding: 16px;
    color: #fff;
    margin-bottom: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}
.accordion-button{
    padding: 9px 15px !important;
    background: #EDFEB6 !important;
    border: 1px solid #a4bd50 !important;
    transition: 0.5s;
}
.accordion-button:hover{
    transition: 0.5s !important;
    background: #defe73 !important;
    cursor: pointer;
}
.modal-dialog {
    max-width: 580px !important;
}
.accordion-body{
    border: 1px solid #ddd;
    border-radius: 10px;
}
.card {
    padding: 15px;
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%);
}
        .con {

  max-width: 600px;

  position: relative;

}

.dot {
    background: red;
    border-radius: 50%;
    height: 10px;
    position: absolute;
    width: 10px;
}
input[type="checkbox"] {
    width: 10px;
}
.dot1 {
    top: 14%;
    left: 16%;
}
.dot2 {
    top: 6%;
    left: 16%;
}
.dotshoulder {
    top: 23%;
    right: 73%;
}
.dotshoulder2 {
    top: 23%;
    right: 90%;
}
.dotback3 {
    top: 23%;
    right: 82%;
}
.dotback2 {
    top: 33%;
    right: 82%;
}
.dotback {
    top: 40%;
    right: 82%;
}
.dothip {
    top: 45%;
    right: 87%;
}
.dothip2 {
    top: 45%;
    right: 76%;
}
.dotleg5 {
    top: 58%;
    right: 86%;
}
.dotleg6 {
    top: 58%;
    right: 77%;
}
.dotleg3 {
    top: 75%;
    right: 85%;
}
.dotleg4 {
    top: 75%;
    right: 78%;
}
.dotleg {
    top: 90%;
    right: 84%;
}
.dotleg2 {
    top: 90%;
    right: 79%;
}
/*second body*/
.dotfHead {
    top: 4%;
    left: 46%;
}
.dotfEar {
    top: 10%;
    left: 43%;
}
.dotfEar2 {
    top: 10%;
    left: 50%;
}
.dotfEye {
    top: 9%;
    left: 45%;
}
.dotfEye2 {
    top: 9%;
    left: 48%;
}
.dotfMouth {
    top: 13%;
    left: 46%;
}
.dotfAdams {
    top: 19%;
    left: 46%;
}
.dotfshoulder {
    top: 22%;
    left: 38%;
}
.dotfshoulder2 {
    top: 22%;
    left: 55%;
}
.dotfchest {
    top: 25%;
    left: 45%;
}
.dotfElbow {
    top: 35%;
    left: 40%;
}
.dotfElbow2 {
    top: 35%;
    left: 53%;
}
.dotfForearm {
    top: 45%;
    left: 36%;
}
.dotfForearm2 {
    top: 46%;
    left: 57%;
}
.dotfUmbilicus {
    top: 40%;
    left: 46%;
}
.dotfPenis {
    top: 47%;
    left: 46%;
}
.dotfThigh {
    top: 56%;
    left: 43%;
}
.dotfThigh2 {
    top: 56%;
    left: 50%;
}
.dotfKnee {
    top: 67%;
    left: 44%;
}
.dotfKnee2 {
    top: 67%;
    left: 48%;
}
.dotfCalf {
    top: 80%;
    left: 44%;
}
.dotfCalf2 {
    top: 80%;
    left: 48%;
}
.dotfFoot {
    top: 89%;
    left: 45%;
}
.dotfFoot2 {
    top: 89%;
    left: 48%;
}
img.img_dots {
 width: 65%;
}
</style>
<?= $this->endSection();?>

<?= $this->section('content') ?>
<div class="app-content content">

<!-- <button class="btn btn-primary" type="button" data-bs-target="#myModal1" data-bs-toggle="modal">Open First Modal</button> -->
<div class="modal fade" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header mybg text-white text-center d-block">
        <h5 class="modal-title">First Modal</h5>
      </div>
      <div class="divider margin-top mb-0">
            <div class="divider-text"><img src="<?php echo base_url('public/brand/assets/app-assets/images/i5.png?v=1')?>" class="myimg-style"></div>
          </div>
      <div class="modal-body">
        <div class="accordion accordion-margin" id="accordionMargin">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginOne">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#accordionMarginOne"
                  aria-expanded="false"
                  aria-controls="accordionMarginOne"
                >
                  Water Management
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div
                id="accordionMarginOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingMarginOne"
                data-bs-parent="#accordionMargin"
              >
                <div class="accordion-body p-0">
                  <div class="q-detail">
                    Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                    bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                    caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                    marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                  </div>
                  <div class="card_body_inn_2">
                    <div class="card_body_txt cbt_2 vertical_full">
                        <div class="q_radio_btn q_radio_first vertical mb-0">
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="4" checked="checked">
                                <span style="border-right: 2px solid black;">No</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="95">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="96">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage and have implemented improvement policies.</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="97">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented and have set reduction targets. </span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="98">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented, have set reduction targets and do initiatives to conserve the local watersheds</span>
                            </label>
                        </div>
                    </div>
                    <div class="comment_optional">
                        <p class="comnt_open show_btn">Comment (Optional)</p>
                        <div class="commnt_text">
                            <textarea class="form-control" name="remark2" id="remark2" placeholder="Your comment..."></textarea>
                            <!-- <span class="comment_close">x</span> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-9 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">Media</label>
                          <input type="file" class="form-control" name="fname-column">
                        </div>
                      </div>
                      <div class="col-md-3 col-12">
                        <div class="mb-1 float-end">
                          <label class="form-label w-100" for="last-name-column">&nbsp;</label>
                          <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">Action</button>
                        </div>
                      </div>
                    </div>
                    <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                        <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                        <input type="button"class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#accordionMarginTwo"
                  aria-expanded="false"
                  aria-controls="accordionMarginTwo"
                >
                  Water Conservation
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div
                id="accordionMarginTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingMarginTwo"
                data-bs-parent="#accordionMargin"
              >
                <div class="accordion-body p-0">
                  <div class="q-detail">
                    Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                    bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                    caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                    marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                  </div>
                  <div class="card_body_inn_2">
                    <div class="card_body_txt cbt_2 vertical_full">
                        <div class="q_radio_btn q_radio_first vertical mb-0">
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="4" checked="checked">
                                <span style="border-right: 2px solid black;">No</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="95">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="96">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage and have implemented improvement policies.</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="97">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented and have set reduction targets. </span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="98">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented, have set reduction targets and do initiatives to conserve the local watersheds</span>
                            </label>
                        </div>
                    </div>
                    <div class="comment_optional">
                        <p class="comnt_open show_btn">Comment (Optional)</p>
                        <div class="commnt_text">
                            <textarea class="form-control" name="remark2" id="remark2" placeholder="Your comment..."></textarea>
                            <!-- <span class="comment_close">x</span> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-9 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">Media</label>
                          <input type="file" class="form-control" name="fname-column">
                        </div>
                      </div>
                      <div class="col-md-3 col-12">
                        <div class="mb-1 float-end">
                          <label class="form-label w-100" for="last-name-column">&nbsp;</label>
                          <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">Action</button>
                        </div>
                      </div>
                    </div>
                    <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                        <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                        <input type="button"class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-between d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">Prev</button>
        <button type="button" class="btn btn-primary btn-next">Next</button>
      </div>
    </div>
  </div>
</div>

<!-- <button class="btn btn-primary" type="button" data-bs-target="#myModal2" data-bs-toggle="modal">Open Second Modal</button> -->
<div class="modal fade" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header mybg text-white text-center d-block">
        <h5 class="modal-title">Second Modal</h5>
      </div>
      <div class="divider margin-top mb-0">
            <div class="divider-text"><img src="<?php echo base_url('public/brand/assets/app-assets/images/i1.png?v=1')?>" class="myimg-style"></div>
          </div>
      <div class="modal-body">
        <div class="accordion accordion-margin" id="accordionMargin">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginOne">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#accordionMarginOne"
                  aria-expanded="false"
                  aria-controls="accordionMarginOne"
                >
                  Water Management
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div
                id="accordionMarginOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingMarginOne"
                data-bs-parent="#accordionMargin"
              >
                <div class="accordion-body p-0">
                  <div class="q-detail">
                    Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                    bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                    caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                    marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                  </div>
                  <div class="card_body_inn_2">
                    <div class="card_body_txt cbt_2 vertical_full">
                        <div class="q_radio_btn q_radio_first vertical mb-0">
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="4" checked="checked">
                                <span style="border-right: 2px solid black;">No</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="95">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="96">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage and have implemented improvement policies.</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="97">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented and have set reduction targets. </span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="98">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented, have set reduction targets and do initiatives to conserve the local watersheds</span>
                            </label>
                        </div>
                    </div>
                    <div class="comment_optional">
                        <p class="comnt_open show_btn">Comment (Optional)</p>
                        <div class="commnt_text">
                            <textarea class="form-control" name="remark2" id="remark2" placeholder="Your comment..."></textarea>
                            <!-- <span class="comment_close">x</span> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-9 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">Media</label>
                          <input type="file" class="form-control" name="fname-column">
                        </div>
                      </div>
                      <div class="col-md-3 col-12">
                        <div class="mb-1 float-end">
                          <label class="form-label w-100" for="last-name-column">&nbsp;</label>
                          <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">Action</button>
                        </div>
                      </div>
                    </div>
                    <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                        <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                        <input type="button"class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#accordionMarginTwo"
                  aria-expanded="false"
                  aria-controls="accordionMarginTwo"
                >
                  Water Conservation
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div
                id="accordionMarginTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingMarginTwo"
                data-bs-parent="#accordionMargin"
              >
                <div class="accordion-body p-0">
                  <div class="q-detail">
                    Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                    bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                    caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                    marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                  </div>
                  <div class="card_body_inn_2">
                    <div class="card_body_txt cbt_2 vertical_full">
                        <div class="q_radio_btn q_radio_first vertical mb-0">
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="4" checked="checked">
                                <span style="border-right: 2px solid black;">No</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="95">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="96">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage and have implemented improvement policies.</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="97">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented and have set reduction targets. </span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="98">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented, have set reduction targets and do initiatives to conserve the local watersheds</span>
                            </label>
                        </div>
                    </div>
                    <div class="comment_optional">
                        <p class="comnt_open show_btn">Comment (Optional)</p>
                        <div class="commnt_text">
                            <textarea class="form-control" name="remark2" id="remark2" placeholder="Your comment..."></textarea>
                            <!-- <span class="comment_close">x</span> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-9 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">Media</label>
                          <input type="file" class="form-control" name="fname-column">
                        </div>
                      </div>
                      <div class="col-md-3 col-12">
                        <div class="mb-1 float-end">
                          <label class="form-label w-100" for="last-name-column">&nbsp;</label>
                          <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">Action</button>
                        </div>
                      </div>
                    </div>
                    <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                        <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                        <input type="button"class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">Prev</button>
        <button type="button" class="btn btn-primary btn-next">Next</button>
      </div>
    </div>
  </div>
</div>

<!-- <button class="btn btn-primary" type="button" data-bs-target="#myModal3" data-bs-toggle="modal">Open Third Modal</button> -->
<div class="modal fade" id="myModal3">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header mybg text-white text-center d-block">
        <h5 class="modal-title">Third Modal</h5>
      </div>
      <div class="divider margin-top mb-0">
            <div class="divider-text"><img src="<?php echo base_url('public/brand/assets/app-assets/images/i2.png?v=1')?>" class="myimg-style"></div>
          </div>
      <div class="modal-body">
        <div class="accordion accordion-margin" id="accordionMargin">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginOne">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#accordionMarginOne"
                  aria-expanded="false"
                  aria-controls="accordionMarginOne"
                >
                  Water Management
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div
                id="accordionMarginOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingMarginOne"
                data-bs-parent="#accordionMargin"
              >
                <div class="accordion-body p-0">
                  <div class="q-detail">
                    Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                    bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                    caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                    marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                  </div>
                  <div class="card_body_inn_2">
                    <div class="card_body_txt cbt_2 vertical_full">
                        <div class="q_radio_btn q_radio_first vertical mb-0">
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="4" checked="checked">
                                <span style="border-right: 2px solid black;">No</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="95">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="96">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage and have implemented improvement policies.</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="97">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented and have set reduction targets. </span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="98">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented, have set reduction targets and do initiatives to conserve the local watersheds</span>
                            </label>
                        </div>
                    </div>
                    <div class="comment_optional">
                        <p class="comnt_open show_btn">Comment (Optional)</p>
                        <div class="commnt_text">
                            <textarea class="form-control" name="remark2" id="remark2" placeholder="Your comment..."></textarea>
                            <!-- <span class="comment_close">x</span> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-9 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">Media</label>
                          <input type="file" class="form-control" name="fname-column">
                        </div>
                      </div>
                      <div class="col-md-3 col-12">
                        <div class="mb-1 float-end">
                          <label class="form-label w-100" for="last-name-column">&nbsp;</label>
                          <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">Action</button>
                        </div>
                      </div>
                    </div>
                    <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                        <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                        <input type="button"class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#accordionMarginTwo"
                  aria-expanded="false"
                  aria-controls="accordionMarginTwo"
                >
                  Water Conservation
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div
                id="accordionMarginTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingMarginTwo"
                data-bs-parent="#accordionMargin"
              >
                <div class="accordion-body p-0">
                  <div class="q-detail">
                    Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                    bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                    caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                    marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                  </div>
                  <div class="card_body_inn_2">
                    <div class="card_body_txt cbt_2 vertical_full">
                        <div class="q_radio_btn q_radio_first vertical mb-0">
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="4" checked="checked">
                                <span style="border-right: 2px solid black;">No</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="95">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="96">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage and have implemented improvement policies.</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="97">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented and have set reduction targets. </span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="98">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented, have set reduction targets and do initiatives to conserve the local watersheds</span>
                            </label>
                        </div>
                    </div>
                    <div class="comment_optional">
                        <p class="comnt_open show_btn">Comment (Optional)</p>
                        <div class="commnt_text">
                            <textarea class="form-control" name="remark2" id="remark2" placeholder="Your comment..."></textarea>
                            <!-- <span class="comment_close">x</span> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-9 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">Media</label>
                          <input type="file" class="form-control" name="fname-column">
                        </div>
                      </div>
                      <div class="col-md-3 col-12">
                        <div class="mb-1 float-end">
                          <label class="form-label w-100" for="last-name-column">&nbsp;</label>
                          <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">Action</button>
                        </div>
                      </div>
                    </div>
                    <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                        <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                        <input type="button"class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">Prev</button>
        <button type="button" class="btn btn-primary btn-next">Next</button>
      </div>
    </div>
  </div>
</div>

<!-- <button class="btn btn-primary" type="button" data-bs-target="#myModal4" data-bs-toggle="modal">Open Four Modal</button> -->
<div class="modal fade" id="myModal4">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header mybg text-white text-center d-block">
        <h5 class="modal-title">Four Modal</h5>
      </div>
      <div class="divider margin-top mb-0">
            <div class="divider-text"><img src="<?php echo base_url('public/brand/assets/app-assets/images/i3.png?v=1')?>" class="myimg-style"></div>
          </div>
      <div class="modal-body">
        <div class="accordion accordion-margin" id="accordionMargin">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginOne">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#accordionMarginOne"
                  aria-expanded="false"
                  aria-controls="accordionMarginOne"
                >
                  Water Management
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div
                id="accordionMarginOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingMarginOne"
                data-bs-parent="#accordionMargin"
              >
                <div class="accordion-body p-0">
                  <div class="q-detail">
                    Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                    bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                    caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                    marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                  </div>
                  <div class="card_body_inn_2">
                    <div class="card_body_txt cbt_2 vertical_full">
                        <div class="q_radio_btn q_radio_first vertical mb-0">
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="4" checked="checked">
                                <span style="border-right: 2px solid black;">No</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="95">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="96">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage and have implemented improvement policies.</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="97">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented and have set reduction targets. </span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="98">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented, have set reduction targets and do initiatives to conserve the local watersheds</span>
                            </label>
                        </div>
                    </div>
                    <div class="comment_optional">
                        <p class="comnt_open show_btn">Comment (Optional)</p>
                        <div class="commnt_text">
                            <textarea class="form-control" name="remark2" id="remark2" placeholder="Your comment..."></textarea>
                            <!-- <span class="comment_close">x</span> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-9 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">Media</label>
                          <input type="file" class="form-control" name="fname-column">
                        </div>
                      </div>
                      <div class="col-md-3 col-12">
                        <div class="mb-1 float-end">
                          <label class="form-label w-100" for="last-name-column">&nbsp;</label>
                          <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">Action</button>
                        </div>
                      </div>
                    </div>
                    <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                        <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                        <input type="button"class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#accordionMarginTwo"
                  aria-expanded="false"
                  aria-controls="accordionMarginTwo"
                >
                  Water Conservation
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div
                id="accordionMarginTwo"
                class="accordion-collapse collapse"
                aria-labelledby="headingMarginTwo"
                data-bs-parent="#accordionMargin"
              >
                <div class="accordion-body p-0">
                  <div class="q-detail">
                    Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                    bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                    caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                    marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                  </div>
                  <div class="card_body_inn_2">
                    <div class="card_body_txt cbt_2 vertical_full">
                        <div class="q_radio_btn q_radio_first vertical mb-0">
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="4" checked="checked">
                                <span style="border-right: 2px solid black;">No</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="95">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="96">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage and have implemented improvement policies.</span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="97">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented and have set reduction targets. </span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="answer2" value="98">
                                <span style="border-right: 2px solid black;">Yes we Regularly Monitor our usage, have improvement policies are implemented, have set reduction targets and do initiatives to conserve the local watersheds</span>
                            </label>
                        </div>
                    </div>
                    <div class="comment_optional">
                        <p class="comnt_open show_btn">Comment (Optional)</p>
                        <div class="commnt_text">
                            <textarea class="form-control" name="remark2" id="remark2" placeholder="Your comment..."></textarea>
                            <!-- <span class="comment_close">x</span> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-9 col-12">
                        <div class="mb-1">
                          <label class="form-label" for="first-name-column">Media</label>
                          <input type="file" class="form-control" name="fname-column">
                        </div>
                      </div>
                      <div class="col-md-3 col-12">
                        <div class="mb-1 float-end">
                          <label class="form-label w-100" for="last-name-column">&nbsp;</label>
                          <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#new-task-modal">Action</button>
                        </div>
                      </div>
                    </div>
                    <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                        <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                        <input type="button"class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">Prev</button>
        <button type="button" class="btn btn-primary btn-next">Next</button>
      </div>
    </div>
  </div>
</div>

   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
         <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <!-- <h2 class="content-header-title float-start mb-0">Footprint Report</h2>? -->
                  <div class="breadcrumb-wrapper">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php 
         $session = session();
         if($session->get('success')){?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
         <strong>Success!</strong> <?php echo $session->get('success');?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      <?php 
         $session = session();
         if($session->get('error')){?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
         <strong>Success!</strong> <?php echo $session->get('error');?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      <div class="content-body">
        <!-- category_page_header -->
        <div class="category_page_header mb-2">
      <div class="cph_inner">
        <div class="cph_left">
          <img src="https://positiivplus.io/public/uploads/assessment/1629138611_2179817bd862b8f2b7ae.png">                                
        </div>
        <div class="cph_right">
          <div class="cph_title">INVESTIGATION</div>
          <div class="cph_short_desc">
            This is an Advanced assessment aligning you brand wth the United Nation's Sustainable Development Goals.
          </div>
          <div class="cph_status">
            <div class="cph_status_left d-flex">
              <div class="cph_score_icon me-1">
                <img src="<?php echo base_url('public/brand/assets/app-assets/images/icon_score.png?v=1')?>">                                            
              </div>
              <div class="cph_score_content">
                <div class="cph_score_label">Steps Completed</div>
                <div class="cph_score_result fw-bolder"><span id="tot_attempt_id" class="fw-bolder">4</span>of 4</div>
              </div>
            </div>
            <div class="cph_status_right d-flex">
              <div class="cph_score_icon me-1">
                <img src="https://positiivplus.io/public/brand/assets/custom_img/icon_complete.png">
              </div>
              <div class="cph_score_content">
                <div class="cph_score_label">Rating</div>
                <button type="button" class="btn btn-danger">Fatal</button>
                <!-- <button type="button" class="btn btn-warning">Minor</button> -->
               <!-- <button type="button" class="btn btn-warning">Major</button> -->
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- category_page_header -->
    <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-start mb-0"></h2>
                <div class="breadcrumb-wrapper">
                  
                </div>
              </div>
            </div>
          </div>
          <div class="content-header-right text-md-end col-md-6 col-12 d-md-block">
            <div class="mb-1 breadcrumb-right">
              <div class="dropdown">
               <!--  <button type="button"  class="btn btn-primary waves-effect" data-bs-toggle="modal" data-bs-target="#default">
               Download PDF
              </button> -->
              <a href="<?php echo base_url('StepController/htmlToPDF/'.$ide.'/Report') ?>" class="btn btn-primary waves-effect">
                            Download PDF
                    </a>
                            
              </div>
            </div>
          </div>
        </div>
        <section class="app-user-list">
          <!-- list and filter start -->
          <!-- <h4 class="fw-bolder">Top in each stage</h4> -->
         
          <br>
          <div class="card">
            <div class="card-body card-datatable table-responsive pt-0">
              <div class="row">
                <div class="col-md-3">
                               <h5 style="margin-top: 30px;">Title</h5>
                                     <h5 style="margin-top: 30px;">Site</h5>
                                     <h5 style="margin-top: 30px;">Investigation Team</h5>
                                     <h5 style="margin-top: 30px;">Closed On</h5>
                                     <h5 style="margin-top: 30px;">Closed By</h5>
                </div>
                <?php foreach($root_cause as $inv){   ?>
                <div class="col-md-9">
                  <div class="detail text-end">
                  <h5><?php foreach($issue_title as $title){
                        if($inv['tool_issue_id'] == $title['id']){

                            echo $title['title_issue'];
                        }

                  }?></h5>
                        <h5><?php foreach($join as $all){?>
                             <?php if($inv['tool_issue_id'] == $all['id']){

                            echo $all['cp_name'];

                        } ?>

                        <?php
                    }?></h5>
                        <h5> <?php if($inv['st_2_Inv_t_memb'] == '10'){
                            echo 'Rohit';}?>
                            <?php if($inv['st_2_Inv_t_memb'] == '11'){
                            echo 'Miracle';}?>
                            <?php if($inv['st_2_Inv_t_memb'] == '12'){
                            echo 'Venture';}?>
                              <?php if($inv['st_2_Inv_t_memb'] == '13'){
                            echo 'Ashhar';}?>


                            </h5>
                        
                        <h5>ab</h5>
                        <h5>abc</h5>
                  </div>
                </div>
                <?php
            }?>
              </div>

            </div>
          </div>
        </section>
    

    <h4 class="fw-bolder mb-1">Root Cause</h4>
        <section id="basic-horizontal-layouts">
          <div class="row">
            <?php foreach ($root_cause as $key => $value) { ?>   
           <div class="col-md-4 col-12">
              <div class="card p-0">
                <div class="card-header pb-0">
                  <h4 class="card-title">Root Cause 1</h4>
                </div>
                <div class="card-body p-0">
                  <div class="card-body pt-0">
                 <h6 class="mt-2"><?php echo $value['st_3_m1']; ?>    </h6>
                 <h6 class="mt-2"><?php echo $value['st_3_man1']; ?>  </h6>
                 <h6 class="mt-2"><?php echo $value['st_3_Material1']; ?></h6>
                 <h6 class="mt-2"><?php echo $value['st_3_Enviroment1']; ?></h6>
                 <h6 class="mt-2"><?php echo $value['st_3_System']; ?></h6>
                </div>
                </div>
              </div>
            </div>
        <?php
    }?>
             <div class="col-md-4 col-12">
              <div class="card p-0">
                <div class="card-header pb-0">
                  <h4 class="card-title">Root Cause 2</h4>
                </div>
                <div class="card-body p-0">
                  <div class="card-body pt-0">
                  <h6 class="mt-2">Machine</h6>
                 <h6 class="mt-2">Man</h6>
                 <h6 class="mt-2">Material</h6>
                 <h6 class="mt-2">Environment</h6>
                 <h6 class="mt-2">System</h6>
                </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-12">
              <div class="card p-0">
                <div class="card-header pb-0">
                  <h4 class="card-title">Root Cause 3</h4>
                </div>
                <div class="card-body p-0">
                   <div class="card-body pt-0">
                <h6 class="mt-2">Machine</h6>
                 <h6 class="mt-2">Man</h6>
                 <h6 class="mt-2">Material</h6>
                 <h6 class="mt-2">Environment</h6>
                 <h6 class="mt-2">System</h6>
                </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    <!-- end blocks  -->

    <section class="app-user-list">
          <!-- list and filter start -->
          <h4 class="fw-bolder mb-1">Victim</h4>
          <div class="card">
            <div class="card-body card-datatable table-responsive pt-0">
                             <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button type="button" 
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#accordionTwo"
                    aria-expanded="false"
                    aria-controls="accordionTwo"
                  >
                   Victim Title
                   <p style="margin-left: auto; margin-bottom: 0;">Victim</p>

                  </button>
                </h2>
                <div
                  id="accordionTwo"
                  class="accordion-collapse collapse"
                  aria-labelledby="headingTwo"
                  data-bs-parent="#accordionExample"
                >
                               <div class="row">
                <div class="col-md-6"> 
    <div class="con">




                  <?php foreach ($victim_report as $key => $value) { ?>


  <div class="dot dot1"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="neck" ? 'checked' : '');
     
     
 }}?>  type="checkbox" ></div>

  <div class="dot dot2"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="head" ? 'checked' : '');
     
     
 }}?> type="checkbox"></div>

  <!-- <div class="dot dot3"><input name="body_mark" type="checkbox"></div> -->
<!-- leg -->
 <div class="dot dotleg"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftleg" ? 'checked' : '');
     
     
 }}?> type="checkbox"></div>
  <div class="dot dotleg2"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","rightleg","leftleg","head");
 if(in_array($k, $MARKF)){
  echo ($k=="rightleg" ? 'checked' : '');
    
     
 }}?>  type="checkbox"></div>
  <div class="dot dotleg3"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftcalf" ? 'checked' : '');
     
     
 }}?>  type="checkbox"></div>
  <div class="dot dotleg4"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightcalf" ? 'checked' : '');
  
     
 }}?>  type="checkbox"></div>
  <!-- <div class="dot dotleg5"><input name="body_mark" type="checkbox"></div>
  <div class="dot dotleg6"><input name="body_mark" type="checkbox"></div> -->
  <div class="dot dotleg5"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftthigh" ? 'checked' : '');
   
     
 }}?>  type="checkbox"></div>
  <div class="dot dotleg6"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightthigh" ? 'checked' : '');
    
     
 }}?>  type="checkbox"></div>
  <!-- uper -->
  <div class="dot dothip"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="lefthip" ? 'checked' : '');
    
     
 }}?> type="checkbox"></div>
  <div class="dot dothip2"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="righthip" ? 'checked' : '');
    
     
 }}?>  type="checkbox"></div>
  <div class="dot dotback"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="lumber" ? 'checked' : '');
     
     
 }}?>  type="checkbox"></div>
  <div class="dot dotback2"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="back" ? 'checked' : '');
     
     
 }}?>  type="checkbox"></div>
  <div class="dot dotback3"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="shoulderblade" ? 'checked' : '');
     
     
 }}?> type="checkbox"></div>
  <div class="dot dotshoulder"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightshoulder" ? 'checked' : '');
    
     
 }}?>  type="checkbox"></div>
  <div class="dot dotshoulder2"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftshoulder" ? 'checked' : '');
     
     
 }}?> type="checkbox"></div>
  <!-- Front Uper -->

  <div class="dot dotfEar"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftear" ? 'checked' : '');
    
     
 }}?> type="checkbox" value="earleft"></div>
  <div class="dot dotfEar2"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightear" ? 'checked' : '');
    
     
 }}?>  type="checkbox" value="earright"></div>
  <div class="dot dotfMouth"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="mouth" ? 'checked' : '');
    
     
 }}?>  type="checkbox" value="mouth"></div>
  <div class="dot dotfEye"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="righteye" ? 'checked' : '');
     
     
 }}?>  type="checkbox" value="eyeright"></div>
  <div class="dot dotfEye2"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","rightleg","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="lefteye" ? 'checked' : '');
     
     
 }}?>  type="checkbox" value="eyeleft"></div>
  <div class="dot dotfHead"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="head" ? 'checked' : '');
    
     
 }}?>  type="checkbox" 

    value="head"></div>
  <div class="dot dotfAdams"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="adams" ? 'checked' : '');
     
     
 }}?> type="checkbox" value="adams"></div>
  <div class="dot dotfshoulder"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightshoulder" ? 'checked' : '');
 
     
 }}?>  type="checkbox" value="shoulderleft"></div>
  <div class="dot dotfshoulder2"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftshoulder" ? 'checked' : '');
   
     
 }}?>  type="checkbox" value="shoulderright"></div>
  <div class="dot dotfchest"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="chest" ? 'checked' : '');
 
     
 }}?> type="checkbox" value="chest"></div>
  <div class="dot dotfElbow"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightelbow" ? 'checked' : '');
     
     
 }}?> type="checkbox" value="elbowleft"></div>
  <div class="dot dotfElbow2"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftelbow" ? 'checked' : '');
     
     
 }}?> type="checkbox" value="elbowright"></div>
  <div class="dot dotfForearm"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="forearm" ? 'checked' : '');
     
     
 }}?>  type="checkbox" value="forearm"></div>
  <div class="dot dotfForearm2">
  <input name="body_mark" type="checkbox"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="forearm2" ? 'checked' : '');
     
     
 }}?> value="forearm2"></div>

  <div class="dot dotfUmbilicus">
                            <input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="umbilicus" ? 'checked' : '');
     
     
 }}?> type="checkbox"  value="umbilicus"></div>


  <div class="dot dotfPenis"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="penis" ? 'checked' : '');
     
     
 }}?> type="checkbox" value="penis"></div>

  <div class="dot dotfThigh"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightThigh" ? 'checked' : '');
     
     
 }}?>  type="checkbox" value="Thighleft"></div>
  <div class="dot dotfThigh2"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftThigh" ? 'checked' : '');
  
     
 }}?> type="checkbox" value="Thighright"></div>
  <div class="dot dotfKnee"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightknee" ? 'checked' : '');
   
     
 }}?> type="checkbox" value="kneeleft"></div>
  <div class="dot dotfKnee2"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftknee" ? 'checked' : '');
    
     
 }}?>  type="checkbox" value="kneeright"></div>

  <div class="dot dotfCalf"><input name="body_mark" 
    type="checkbox" value="calfleft" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","rightleg","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightcalf" ? 'checked' : '');
     
     
 }}?>></div>

  <div class="dot dotfCalf2"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","rightleg","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftcalf" ? 'checked' : '');
     
     
 }}?> type="checkbox" value="calfright"></div>
  <div class="dot dotfFoot"><input name="body_mark"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightfoot" ? 'checked' : '');
     
     
 }}?> type="checkbox" value="footleft"></div>
  <div class="dot dotfFoot2"><input name="body_mark" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){

  echo ($k=="leftfoot" ? 'checked' : '');
     
     
 }}?>  type="checkbox" value="footright"></div>

  <img class="img_dots" src="https://user.positiivplus.io/report_design/demo4/body-mark.jpeg"/>
<?php 
}?>

</div>
   </div>
               <!-- 2 -->
               <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                     <div class="card-body">
                           <h5 class="mt-2">Select Victim</h5>
                           <h5 class="mt-2">Name of Victim</h5>
                           <h5 class="mt-2">Gender</h5>
                           <h5 class="mt-2">Range</h5>
                           <h5 class="mt-2">Details of Injury</h5>
                           <h5 class="mt-2">Body Marks</h5>
                           <h5 class="mt-2">What was Victim taken</h5>
                           <h5 class="mt-2">Details of Treatment</h5>
                         </div>
                  </div>
                  <?php foreach ($victim_report as $key => $value) { ?>
                    
                           
                  <div class="col-md-6">
                     <div class="card-body" id="details_card">
                           <h5 class="mt-2"><?php if($value['victim_type'] == '10'){
                                               echo "Admin"; }?>
                                               <?php if($value['victim_type'] == '12'){
                                               echo "Employee"; }?>
                                               <?php if($value['victim_type'] == '11'){
                                               echo "Manager"; }?>

                                                </h5>
                           <h5 class="mt-2"><?php echo $value['victim_name']?> </h5>
                           <h5 class="mt-2"><?php echo $value['gender']?></h5>
                           <h5 class="mt-2"><?php echo $value['age']?></h5>
                           <h5 class="mt-2"><?php echo $value['details_injury']?></h5>
                         <h5 class="mt-2"><?php $v = json_decode($value['body_mark']);
                                              foreach($v as $k){
                                                echo ucwords($k); echo ",";
                                                
                                              }
                                          ?></h5>
                                         
                           <h5 class="mt-2"><?php echo $value['victim_work']?></h5>
                           <h5 class="mt-2"><?php echo $value['details_treatment']?></h5>
                         </div>
                  </div>
                  <input type="hidden" id="body_mark_value" value="<?php $v = json_decode($value['body_mark']);
                                     foreach($v as $k){
                                                echo $k; 
                                                echo ',';
                                                
                                              }
                                          ?>">
             <?php 
         }?>
                </div>
                
               </div>
             </div>
                </div>
              </div>

            </div>
          </div>
        </section>
<!--  -->


    <div class="content-body">
       <h4 class="fw-bolder d-inline">Action</h4>
<section class="basic-timeline mt-1">
  <div class="row">
    <!-- 1 -->
    <?php foreach($all_action as $action){?>
       
  <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $action['title']; ?></h4>
        </div>
        <div class="card-body">
          <ul class="timeline">
             <?php foreach($all_action_timeline as $timline){?>
            <?php if($timline['action_center_id'] == $action['id']){?>
            
            <li class="timeline-item">
              <span class="timeline-point timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6><?php echo $timline['TitleAdd'] ?></h6>
                  <!-- <span class="timeline-event-time">12 min ago</span> -->
                </div>
                <p><?php echo $timline['description'] ?></p>
              </div>
            </li>
      <?php
        }?>
         <?php 
}?>
            
          </ul>
        </div>
      </div>
    </div>
    
   <?php 
}?>
    <!-- 2 -->
  
    <!-- end -->
  </div>
</section>
<!-- Timeline Ends -->
        </div>

 
            <!-- Modal to add new user starts-->
            <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
              <div class="modal-dialog">
                <form class="add-new-user modal-content pt-0">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                  <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                  </div>
                  <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                      <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                      <input
                      type="text"
                      class="form-control dt-full-name"
                      id="basic-icon-default-fullname"
                      placeholder="John Doe"
                      name="user-fullname"
                      />
                    </div>
                    <div class="mb-1">
                      <label class="form-label" for="basic-icon-default-uname">Username</label>
                      <input
                      type="text"
                      id="basic-icon-default-uname"
                      class="form-control dt-uname"
                      placeholder="Web Developer"
                      name="user-name"
                      />
                    </div>
                    <div class="mb-1">
                      <label class="form-label" for="basic-icon-default-email">Email</label>
                      <input
                      type="text"
                      id="basic-icon-default-email"
                      class="form-control dt-email"
                      placeholder="john.doe@example.com"
                      name="user-email"
                      />
                    </div>
                    <div class="mb-1">
                      <label class="form-label" for="basic-icon-default-contact">Contact</label>
                      <input
                      type="text"
                      id="basic-icon-default-contact"
                      class="form-control dt-contact"
                      placeholder="+1 (609) 933-44-22"
                      name="user-contact"
                      />
                    </div>
                    <div class="mb-1">
                      <label class="form-label" for="basic-icon-default-company">Company</label>
                      <input
                      type="text"
                      id="basic-icon-default-company"
                      class="form-control dt-contact"
                      placeholder="PIXINVENT"
                      name="user-company"
                      />
                    </div>
                    <div class="mb-1">
                      <label class="form-label" for="country">Country</label>
                      <select id="country" class="select2 form-select">
                        <option value="Australia">USA</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Canada">Canada</option>
                        <option value="China">China</option>
                        <option value="France">France</option>
                        <option value="Germany">Germany</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Japan">Japan</option>
                        <option value="Korea">Korea, Republic of</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Russia">Russian Federation</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                      </select>
                    </div>
                    <div class="mb-1">
                      <label class="form-label" for="user-role">User Role</label>
                      <select id="user-role" class="select2 form-select">
                        <option value="subscriber">Subscriber</option>
                        <option value="editor">Editor</option>
                        <option value="maintainer">Maintainer</option>
                        <option value="author">Author</option>
                        <option value="admin">Admin</option>
                      </select>
                    </div>
                    <div class="mb-2">
                      <label class="form-label" for="user-plan">Select Plan</label>
                      <select id="user-plan" class="select2 form-select">
                        <option value="basic">Basic</option>
                        <option value="enterprise">Enterprise</option>
                        <option value="company">Company</option>
                        <option value="team">Team</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- Modal to add new user Ends-->
          </div>
          <!-- list and filter end -->
        </section>
      </div>
   </div>
</div>
<!-- Right Sidebar starts -->
<div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
  <div class="modal-dialog sidebar-lg">
    <div class="modal-content p-0">
      <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false">
        <div class="modal-header align-items-center mb-1">
          <h5 class="modal-title">Add Task</h5>
          <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
            
            <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
          </div>
        </div>
        <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
          <div class="action-tags">
            <div class="mb-1">
              <label for="todoTitleAdd" class="form-label">Title</label>
              <input
                type="text"
                id="todoTitleAdd"
                name="todoTitleAdd"
                class="new-todo-item-title form-control"
                placeholder="Title"
              />
            </div>
            <div class="mb-1 position-relative">
              <label for="task-assigned" class="form-label d-block">Assignee</label>
              <select class="select2 form-select" id="task-assigned" name="task-assigned">
                <option
                  data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-3.jpg')?>"
                  value="Phill Buffer"
                  selected
                >
                  Phill Buffer
                </option>
                <option data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-1.jpg')?>" value="Chandler Bing">
                  Chandler Bing
                </option>
                <option data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-4.jpg')?>" value="Ross Geller">
                  Ross Geller
                </option>
                <option data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-6.jpg')?>" value="Monica Geller">
                  Monica Geller
                </option>
                <option data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-2.jpg')?>" value="Joey Tribbiani">
                  Joey Tribbiani
                </option>
                <option data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg')?>" value="Rachel Green">
                  Rachel Green
                </option>
              </select>
            </div>
            <div class="mb-1">
              <label for="task-due-date" class="form-label">Due Date</label>
              <input type="text" class="form-control task-due-date" id="task-due-date" name="task-due-date" />
            </div>
            <div class="mb-1">
              <label for="task-tag" class="form-label d-block">Tag</label>
              <select class="form-select task-tag" id="task-tag" name="task-tag" multiple="multiple">
                <option value="Risks">Risks</option>
                <option value="Opportunities">Opportunities</option>
                <option value="Hotspots">Hotspots</option>
                <option value="Issues">Issues</option>
                <option value="Others">Others</option>
              </select>
            </div>
            <div class="mb-1">
              <label class="form-label">Description</label>
              <div id="task-desc" class="border-bottom-0" data-placeholder="Write Your Description"></div>
              <div class="d-flex justify-content-end desc-toolbar border-top-0">
                <span class="ql-formats me-0">
                  <button class="ql-bold"></button>
                  <button class="ql-italic"></button>
                  <button class="ql-underline"></button>
                  <button class="ql-align"></button>
                  <button class="ql-link"></button>
                </span>
              </div>
            </div>
            <div class="mb-1">
              <label class="form-label">Priority </label>
              <select class="form-control" name="">
                <option value="">Select Priority</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
              </select>
            </div>
            <div class="mb-1">
              <label class="form-label" style="margin-bottom: 10px;">Audit</label>
              <div class="demo-inline-spacing mb-3">
                <div class="form-check form-check-inline mt-0">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio1"
                    value="Yes"
                    checked
                  />
                  <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline mt-0">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio2"
                    value="No"
                  />
                  <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
                
              </div>
            </div>
          </div>
          <div class="my-1">
            <button type="submit" class="btn btn-primary d-none add-todo-item me-1">Add</button>
            <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-bs-dismiss="modal">
              Cancel
            </button>
            <button type="button" class="btn btn-primary d-none update-btn update-todo-item me-1">Update</button>
            <button type="button" class="btn btn-outline-danger update-btn d-none" data-bs-dismiss="modal">
              Delete
            </button>
          </div>
        </div>
      </form>
      <br><br>
      <!-- time line -->

      <div class="card">
        <div class="card-header">
          <h4 class="card-title"></h4>
        </div>
        <div class="card-body">
          <ul class="timeline">
            <li class="timeline-item">
              <span class="timeline-point timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>12 Invoices have been paid</h6>
                  <span class="timeline-event-time">12 min ago</span>
                </div>
                <p>Invoices have been paid to the company.</p>
                <div class="d-flex flex-row align-items-center">
                  <img
                    class="me-1"
                    src="<?php echo base_url('public/brand/assets/app-assets/images/icons/file-icons/pdf.png')?>"
                    alt="invoice"
                    height="23"
                  />
                  <span>invoice.pdf</span>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Client Meeting</h6>
                  <span class="timeline-event-time">45 min ago</span>
                </div>
                <p>Project meeting with john @10:15am.</p>
                <div class="d-flex flex-row align-items-center">
                  <div class="avatar">
                    <img src="<?php echo base_url('public/brand/assets/app-assets/images/avatars/12-small.png')?>" alt="avatar" height="38" width="38" />
                  </div>
                  <div class="ms-50">
                    <h6 class="mb-0">John Doe (Client)</h6>
                    <span>CEO of Infibeam</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Financial Report</h6>
                  <span class="timeline-event-time">2 hours ago</span>
                </div>
                <p class="mb-50">Click the button below to read financial reports</p>
                <button
                  class="btn btn-outline-primary btn-sm"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseExample"
                  aria-expanded="true"
                  aria-controls="collapseExample"
                >
                  Show Report
                </button>
                <div class="collapse" id="collapseExample">
                  <ul class="list-group list-group-flush mt-1">
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span>Last Year's Profit : <span class="fw-bold">$20000</span></span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span> This Year's Profit : <span class="fw-bold">$25000</span></span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span> Last Year's Commission : <span class="fw-bold">$5000</span></span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span> This Year's Commission : <span class="fw-bold">$7000</span></span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span> This Year's Total Balance : <span class="fw-bold">$70000</span></span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2"></i>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6 class="mb-50">Interview Schedule</h6>
                  <span class="timeline-event-time">03:00 PM</span>
                </div>
                <p>Have to interview Katy Turner for the developer job.</p>
                <hr />
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <div class="d-flex flex-row align-items-center">
                    <div class="avatar me-1">
                      <img src="<?php echo base_url('public/brand/assets/app-assets/images/avatars/1-small.png')?>" alt="Avatar" height="32" width="32" />
                    </div>
                    <span>
                      <p class="mb-0">Katy Turner</p>
                      <span class="text-muted">Javascript Developer</span>
                    </span>
                  </div>
                  <div class="d-flex align-items-center cursor-pointer mt-sm-0 mt-50">
                    <i data-feather="message-square" class="me-1"></i>
                    <i data-feather="phone-call"></i>
                  </div>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Online Store</h6>
                  <span class="timeline-event-time">03:00PM</span>
                </div>
                <p>
                  Develop an online store of electronic devices for the provided layout, as well as develop a mobile
                  version of it. The must be compatible with any CMS.
                </p>
                <div class="d-flex justify-content-between flex-wrap flex-sm-row flex-column">
                  <div>
                    <p class="text-muted mb-50">Developers</p>
                    <div class="d-flex align-items-center">
                      <div class="avatar bg-light-primary avatar-sm me-50">
                        <span class="avatar-content">A</span>
                      </div>
                      <div class="avatar bg-light-success avatar-sm me-50">
                        <span class="avatar-content">B</span>
                      </div>
                      <div class="avatar bg-light-danger avatar-sm">
                        <span class="avatar-content">C</span>
                      </div>
                    </div>
                  </div>
                  <div class="mt-sm-0 mt-1">
                    <p class="text-muted mb-50">Deadline</p>
                    <p class="mb-0">20 Dec 2077</p>
                  </div>
                  <div class="mt-sm-0 mt-1">
                    <p class="text-muted mb-50">Budget</p>
                    <p class="mb-0">$50000</p>
                  </div>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between align-items-center mb-50">
                  <h6>Designing UI</h6>
                  <div>
                    <span class="badge rounded-pill badge-light-primary">Design</span>
                  </div>
                </div>
                <p>
                  Our main goal is to design a new mobile application for our client. The customer wants a clean & flat
                  design.
                </p>
                <div>
                  <span class="text-muted">Participants</span>
                  <div class="avatar-group mt-50">
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="bottom"
                      title="Vinnie Mostowy"
                      class="avatar pull-up"
                    >
                      <img
                        src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-5.jpg')?>"
                        alt="Avatar"
                        height="30"
                        width="30"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="bottom"
                      title="Elicia Rieske"
                      class="avatar pull-up"
                    >
                      <img
                        src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-7.jpg')?>"
                        alt="Avatar"
                        height="30"
                        width="30"
                      />
                    </div>
                    <div
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="bottom"
                      title="Julee Rossignol"
                      class="avatar pull-up"
                    >
                      <img
                        src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-10.jpg')?>"
                        alt="Avatar"
                        height="30"
                        width="30"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Right Sidebar ends -->
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/katex.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/highlight.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/quill.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js')?>"></script>
<!-- barchart script-->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
$(document).ready(function () {
   $('[data-toggle="tooltip"]').tooltip();

   var echartElemBar = document.getElementById("echartBar1");

   if (echartElemBar) {
      var echartBar = echarts.init(echartElemBar);
      echartBar.setOption({
         legend: {
            borderRadius: 0,
            orient: "horizontal",
            x: "right",
            data: ["CO2e"],
         },
         grid: {
            left: "8px",
            right: "8px",
            bottom: "0",
            containLabel: true,
         },
         tooltip: {
            show: true,
            backgroundColor: "rgba(0, 0, 0, .8)",
         },
         xAxis: [{
            type: "category",
            data: [
               "Energy",
               "Water",
               "Consumables",
               "Mobile Fuel",
            ],
            axisTick: {
               alignWithLabel: true,
            },
            splitLine: {
               show: false,
            },
            axisLine: {
               show: true,
            },
         }, ],
         yAxis: [{
            type: "value",
            axisLabel: {
               formatter: "{value}",
            },
            min: 0,
            max: 100,
            interval: 25,
            axisLine: {
               show: false,
            },
            splitLine: {
               show: true,
               interval: "auto",
            },
         }, ],
         series: [{
            name: "CO2e",
            data: [
               45,
               82,
               35,
               93,
               71,
               89,
               49,
               91,
               80,
               86,
               35,
               40,
            ],
            label: {
               show: false,
               color: "#639",
            },
            type: "bar",
            color: "#defe73",
            smooth: true,
            itemStyle: {
               emphasis: {
                  shadowBlur: 10,
                  shadowOffsetX: 0,
                  shadowOffsetY: -2,
                  shadowColor: "rgba(0, 0, 0, 0.3)",
               },
            },
         }, ],
      });
      $(window).on("resize", function () {
         setTimeout(function () {
            echartBar.resize();
         }, 500);
      });
   } // Chart in Dashboard version 1

});

var topStageElemPie = document.getElementById("topStagePie");
if (topStageElemPie) {
   //console.log(topStageElemPie);
   var topStagePie = echarts.init(topStageElemPie);
   topStagePie.setOption({
      color: ["#defe73", "#999A99", "#575757"],
      tooltip: {
         show: true,
         backgroundColor: "black",
      },
      series: [
         {
            name: "ESG Overview",
            type: "pie",
            radius: "55%",
            center: ["50%", "50%"],
            data: [{value:37.23088027237446,name:"scope 1"},{value:45.204043483009706,name:"scope 2"},{value:17.565076244615838,name:"scope 3"}] ,
            itemStyle : {
               emphasis: {
                  shadowBlur: 10,
                  shadowOffsetX: 0,
                  shadowColor: "rgba(0, 0, 0, 0.5)",
               },
            },
         },
      ],
   });


   $(window).on("resize", function () {
      setTimeout(function () {
         topStagePie.resize();
      }, 500);
   });
}

</script> 
 

<script>
      $(document).ready(function() {
          $("button").click(function(){
  

              var kkk = $("#body_mark_value").val();
              
              $.each($("input[name='body_mark']:checked"), function(){
                 

              });
             
          });
      });
  </script>


<!-- end barchart script -->
<script>
        $("div[id^='myModal']").each(function(){
          var currentModal = $(this);
          currentModal.find('.btn-next').click(function(){
            currentModal.modal('hide');
            currentModal.closest("div[id^='myModal']").one('hidden.bs.modal', function (e) {
              $(this).nextAll("div[id^='myModal']").first().modal('show');
            })
          });
          //PREV
          currentModal.find('.btn-prev').click(function(){
            currentModal.modal('hide');
            currentModal.closest("div[id^='myModal']").one('hidden.bs.modal', function (e) {
              $(this).prevAll("div[id^='myModal']").first().modal('show');
            })
          });
        });
</script>
<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>


