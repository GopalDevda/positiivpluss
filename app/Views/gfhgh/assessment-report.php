<?php

use App\Models\ActionCenterModel;

?>

<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/katex.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/quill.snow.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/js/bootstrap.min.js">
<link rel="stylesheet" type="text/css" href="assets/header.css">
<style type="text/css">
  .mybg {
    background: #262626 !important;
    color: #fff !important;
    position: absolute;
    width: 100%;
    height: 57px;
  }

  .mybg h5 {
    color: #fff !important;
  }

  .myimg-style {
    width: 46px;
    border-radius: 50%;
    border: 0.5px solid #defe73;
    padding: 2px
  }

  .margin-top {
    margin-top: 39px !important;
  }

  .divider .divider-text:after,
  .divider .divider-text:before {
    border-top: 1px solid #defe73 !important;
  }

  .divider .divider-text:after,
  .divider .divider-text:before {
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

  .card_body_txt .q_radio_btn.q_radio_first .radio span,
  .card_body_txt .q_radio_btn.q_radio_first .radio:first-child span {
    border-right: none !important;
  }

  .card_body_txt .q_radio_btn.q_radio_first .radio:first-child span {
    border-right: 2px solid #262626 !important;
  }

  .card_body_txt .q_radio_btn.q_radio_first .radio:first-child span {
    border-radius: 25px 0 0 25px;
  }

  /* .card_body_txt .q_radio_btn.vertical .radio:first-child span { */
  /* border-radius: 25px 25px 0 0; */
  /* } */
  /* .card_body_txt .q_radio_btn .radio:first-child span { */
  /* border-right: 2px solid #262626 !important; */
  /* } */
  .card_body_txt.vertical_full .q_radio_btn .radio span {
    padding: 7px 20px;
    line-height: 20px;
    border-radius: 30px;
  }

  /* .card_body_txt .q_radio_btn .radio:first-child span { */
  /* border-radius: 25px 0 0 25px; */
  /* } */
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

  .checkbox input,
  .radio input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }

  .q-detail {
    background: #262626;
    padding: 16px;
    color: #fff;
    margin-bottom: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
  }

  .accordion-button {
    padding: 9px 15px !important;
    background: #EDFEB6 !important;
    border: 1px solid #a4bd50 !important;
    transition: 0.5s;
  }

  .accordion-button:hover {
    transition: 0.5s !important;
    background: #defe73 !important;
    cursor: pointer;
  }

  .modal-dialog {
    max-width: 580px !important;
  }

  .accordion-body {
    border: 1px solid #ddd;
    border-radius: 10px;
  }
</style>
<?= $this->endSection(); ?>

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
          <div class="divider-text"><img src="<?php echo base_url('public/brand/assets/app-assets/images/i5.png?v=1') ?>" class="myimg-style"></div>
        </div>
        <div class="modal-body">
          <div class="accordion accordion-margin" id="accordionMargin">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginOne" aria-expanded="false" aria-controls="accordionMarginOne">
                  Water Management
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div id="accordionMarginOne" class="accordion-collapse collapse" aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
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
                    <span id="responseDiv2" style="color: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                      <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                      <input type="button" class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginTwo" aria-expanded="false" aria-controls="accordionMarginTwo">
                  Water Conservation
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div id="accordionMarginTwo" class="accordion-collapse collapse" aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
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
                    <span id="responseDiv2" style="color: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                      <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                      <input type="button" class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
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
          <div class="divider-text"><img src="<?php echo base_url('public/brand/assets/app-assets/images/i1.png?v=1') ?>" class="myimg-style"></div>
        </div>
        <div class="modal-body">
          <div class="accordion accordion-margin" id="accordionMargin">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginOne" aria-expanded="false" aria-controls="accordionMarginOne">
                  Water Management
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div id="accordionMarginOne" class="accordion-collapse collapse" aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
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
                    <span id="responseDiv2" style="color: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                      <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                      <input type="button" class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginTwo" aria-expanded="false" aria-controls="accordionMarginTwo">
                  Water Conservation
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div id="accordionMarginTwo" class="accordion-collapse collapse" aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
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
                    <span id="responseDiv2" style="color: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                      <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                      <input type="button" class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
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
          <div class="divider-text"><img src="<?php echo base_url('public/brand/assets/app-assets/images/i2.png?v=1') ?>" class="myimg-style"></div>
        </div>
        <div class="modal-body">
          <div class="accordion accordion-margin" id="accordionMargin">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginOne" aria-expanded="false" aria-controls="accordionMarginOne">
                  Water Management
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div id="accordionMarginOne" class="accordion-collapse collapse" aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
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
                    <span id="responseDiv2" style="color: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                      <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                      <input type="button" class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginTwo" aria-expanded="false" aria-controls="accordionMarginTwo">
                  Water Conservation
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div id="accordionMarginTwo" class="accordion-collapse collapse" aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
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
                    <span id="responseDiv2" style="color: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                      <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                      <input type="button" class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
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
          <div class="divider-text"><img src="<?php echo base_url('public/brand/assets/app-assets/images/i3.png?v=1') ?>" class="myimg-style"></div>
        </div>
        <div class="modal-body">
          <div class="accordion accordion-margin" id="accordionMargin">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginOne" aria-expanded="false" aria-controls="accordionMarginOne">
                  Water Management
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div id="accordionMarginOne" class="accordion-collapse collapse" aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
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
                    <span id="responseDiv2" style="color: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                      <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                      <input type="button" class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingMarginTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginTwo" aria-expanded="false" aria-controls="accordionMarginTwo">
                  Water Conservation
                  <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                </button>
              </h2>
              <div id="accordionMarginTwo" class="accordion-collapse collapse" aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
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
                    <span id="responseDiv2" style="color: green;font-size: 15px;"></span>
                    <div class="admin_btn mt-2">
                      <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit" onclick="saveQuestion()">
                      <input type="button" class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext()">
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
  <div class="content-wrapper container-xxl p-0" id="html-to-pdf">
    <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Footprint Report</h2>
            <a href='<?= base_url('Controlwork/assessment'); ?>' class='btn btn-primary float-end mx-2'>Back</a>
            <div class="breadcrumb-wrapper">
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    $session = session();
    if ($session->get('success')) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
        <strong>Success!</strong> <?php echo $session->get('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
    <?php
    $session = session();
    if ($session->get('error')) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 0.71rem 1rem">
        <strong>Success!</strong> <?php echo $session->get('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
    <div class="content-body">
      <!-- category_page_header -->
      <div class="category_page_header mb-2">
        <div class="cph_inner">
          <div class="cph_left">
            <img src="<?= base_url() ?>/public/uploads/assessment/1629138611_2179817bd862b8f2b7ae.png">
          </div>
          <div class="cph_right">
            <div class="cph_title"><span>FOOTPRINT</span>&nbsp;<span class='float-end'>Complete <?= $com; ?> time</span></div>
            <div class="cph_short_desc">
              This is an Advanced assessment aligning you brand wth the United Nation's Sustainable Development Goals.
            </div>
            <div class="cph_status">
              <div class="cph_status_left d-flex">
                <div class="cph_score_icon me-1">
                  <img src="<?php echo base_url('public/brand/assets/app-assets/images/icon_score.png?v=1') ?>">
                </div>
                <div class="cph_score_content">
                  <div class="cph_score_label">Question Completion</div>
                  <div class="cph_score_result fw-bolder"><span id="tot_attempt_id" class="fw-bolder"><?= sizeof($assessmentreport_data) ?></span> Out of <?= sizeof($assessmentreport_data) ?></div>
                </div>
              </div>
              <div class="cph_status_right d-flex">
                <div class="cph_score_icon me-1">
                  <img src="<?= base_url() ?>/public/brand/assets/custom_img/icon_complete.png">
                </div>
                <div class="cph_score_content">
                  <div class="cph_score_label">Utopiic Level : Dorment</div>
                  <div class="cph_score_result fw-bolder"><?= number_format($percentile1,1) ?>% Out of 100</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <?php
      $v = new ActionCenterModel();
      $db = \Config\Database::connect();
      $session = session();
      $supplier_info = $session->get('supplier_info');
      $s_id = $supplier_info['supplier_id'];
      $dat = $db->query("SELECT ed.* FROM `all_assessment_question` as ed  where ed.status=1")->getResultArray();
      $d = $v->where('status', 1)->where('status', 4)->where('owner_id', $s_id)->where('assign_from', 'Qualitative')->findAll();
      foreach ($dat as  $value) {
        foreach ($d as $f) {
          if ($f['question_id'] == $value['id']) {
            echo $f['id'];
          }
        }
      }
      $data['actio'] = $v->where('owner_id', $s_id)->where('assign_from', 'Qualitative')->countAllResults();
      // print_r($data['actio']);
      // die();
      ?>

      <div class="clear-fix">
        <h4>
          <?php foreach ($control_assessment as $row) { ?>
            <?php

            foreach ($assessment as $dd) {
              echo $dd['id'] == $row['indicator'] ? $dd['assessment_name'] : '';
            } ?>

          <?php   } ?>

        </h4>

        <p style="font-weight: 100; float: left;">27 Jun 2022 / H J</p>
        <!-- <h6 style=" float: right; color: green;">Complete</h6> -->
        <input style=" float: right; color: green;" type="button" value="Download PDF File" onclick="DownloadFile('assessment-report.pdf')" />

      </div>
      <table class="table">
        <thead>

        </thead>
        <tbody>
          <tr style="background:#e9ecef;">
            <th style="font-weight: 400;">Score</th>
            <td><b></b> </td>

            <td><b></b></td>
            <td><b><?php echo $yyyyy ?></b> Actions</td>
          </tr>
          <tr>
            <th>Site</th>
            <td><?php foreach ($control_assessment as $row) { ?>
                <?php

                  foreach ($assessm as $dd) {
                    echo $dd['id'] == $row['sub_boundary'] ? $dd['cp_name'] : '';
                  } ?>

              <?php   } ?></td>
            <td></td>
            <!-- <td style="font-weight: 100;">vvc</td> -->
          </tr>
          <tr>
            <th>Client/Site</th>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th>Conducted on (Date and Time)</th>
            <td style="font-weight: 100;">
              <?php foreach ($control_assessment as $row) { ?>

                <?php echo $row['created-at']; ?>



              <?php   } ?>
            </td>
            <td></td>
            <td></td>

          </tr>
          <tr>
            <th>Inspected by</th>
            <td>
              <?php foreach ($control_assessment as $row) { ?>
                <?php

                foreach ($inspected as $dd) {
                  echo $dd['id'] == $row['assigned_to'] ? $dd['supplier_name'] : '';
                } ?>

              <?php   } ?>
            </td>

            <td></td>
            <td style="font-weight: 100;"></td>
          </tr>
          <tr>
            <th>Created by</th>
            <td>
              <?php echo $s_name; ?>
            </td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th>Location</th>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>


    
    <!-- control_ass -->


    <div style="background:#e9ecef;" class="container">
      <table class="table">
        <tbody>
          <tr style="background:#e9ecef;">
            <th style="font-weight: bold; float: left;">
              <?php foreach ($control_ass as $show) { ?>

                <?php


                foreach ($ind as $dd) { ?>

                  <?php if ($show['indicator'] == $dd['id']) { ?>

                    <?php echo $dd['indicator_name']; ?>

                  <?php  } ?>
                <?php  } ?>

              <?php } ?>


            </th>
            <td></td>
            <td></td>
            <td style="font-weight: 100; float: right;">

              <select class="form-control" name="cars" id="cars">

                <?php if (empty($iv)) { ?>
                  <option value="">No Action Taken!
                  </option>
                <?php }
                foreach ($iv as $show) {  ?>

                  <?php if (empty($show['title'])) { ?>
                    <option value="">No Action
                    </option>
                  <?php } else { ?>
                    <option value="">
                      <?php echo $show['title']; ?>
                    </option>

                  <?php } ?>




                <?php } ?>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <?php $i = 0;
    // print_r(sizeof($assessmentreport_data));
    foreach ($assessmentreport_data as $show) { ?>
      <div class="container c1 pt-3">

        <h5 class="text-dark">

          <b>
            <?php
            if (!empty($rohit)) {
              foreach ($rohit as $dd) {
                echo $dd['id'] == $show['question_id'] ? $dd['question_title'] : '';
              }
            } ?>
          </b>

        </h5>

        <div class="box1">
          <h5> <b><?php echo ++$i; ?></b>

            <?php
            if (!empty($rohit)) {
              foreach ($rohit as $dd) { ?>
                <?php echo  $dd['id'] == $show['question_id'] ? $dd['question'] : ''; ?>
            <?php }
            } ?>
          </h5>
        </div>
        <div style="float: right;">
          <?php if ($show['answer'] == json_encode('No')) { ?>
            <div class="box2 pt-2">
              <button class="btn btn-danger"><?php echo $show['answer']; ?></button>
            </div>
          <?php } else if ($show['answer'] == json_encode('Yes')) { ?>
            <div class="box2 pt-2">
              <button class="btn btn-success"><?php echo $show['answer']; ?></button>
            </div>
          <?php } else { ?>
            <div class="box2 pt-2">
              <button class="btn btn-primary"><?php echo $show['answer']; ?></button>
            </div>
          <?php } ?>

        </div>
        &nbsp;

        <div class="container">

          <div class="box33" style="width:50%; ">
            <h5>
              <?php if (!$show['comment'] == '') { ?>


                Comment:- <span><?php echo $show['comment'] ?></span></h5>

          <?php
              } else { ?>
            <h5>
              Comment:- <span>NO Comment</span></h5>

          <?php } ?>

          </div>
         

        </div>
      </div>
    <?php } ?>
</div>


   
   


    <?= $this->endSection(); ?>

    <?= $this->section('script') ?>
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/katex.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/highlight.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/quill.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/pdf/jspdf.umd.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/pdf/purify.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/pdf/html2canvas.min.js') ?>"></script>

    <!-- barchart script-->
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>
    <script>
      $(document).ready(function() {
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
          $(window).on("resize", function() {
            setTimeout(function() {
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
          series: [{
            name: "ESG Overview",
            type: "pie",
            radius: "55%",
            center: ["50%", "50%"],
            data: [{
              value: 37.23088027237446,
              name: "Environment  "
            }, {
              value: 45.204043483009706,
              name: "Social"
            }, {
              value: 17.565076244615838,
              name: "Governance"
            }],
            itemStyle: {
              emphasis: {
                shadowBlur: 10,
                shadowOffsetX: 0,
                shadowColor: "rgba(0, 0, 0, 0.5)",
              },
            },
          }, ],
        });


        $(window).on("resize", function() {
          setTimeout(function() {
            topStagePie.resize();
          }, 500);
        });
      }
    </script>
    <script type="text/javascript">
      function DownloadFile(fileName) {
        window.html2canvas = html2canvas;
        window.jsPDF = window.jspdf.jsPDF;

        var doc = new jsPDF(),
          // elementHTML = $("#html-to-pdf").html();
          elementHTML = $(".content-body").html();
        clean = DOMPurify.sanitize(elementHTML);
        condition = true;
        while (condition) {
          if (clean.includes("  "))
            clean = clean.replace("  ", ' ');
          // else if (clean.includes("\n"))
          //   clean = clean.replace("\n", ' ');
          else
            condition = false;
        }
        // clean = clean.replace(`<a class="btn btn-primary float-end mx-2 waves-effect waves-float waves-light" href="http://localhost:8080/positiveplus/Controlwork/assessment">Back</a>`, ' ');
        clean = clean.replace(`<input value="Download PDF File" type="button" style="float: right; color: green;">`, ' ');

        console.log(clean);
        // return false;
        doc.html(clean, {
          callback: function(doc) {
            var pageCount;
            do {
              pageCount = doc.internal.getNumberOfPages();
              console.log((pageCount))
              doc.deletePage(pageCount);
            } while (pageCount = 3);

            // Save the PDF
            doc.save('assessment-report.pdf');
          },
          x: 15,
          y: 15,
          width: 170, //target width in the PDF document
          windowWidth: 650 //window width in CSS pixels
        });
        // doc.text(20, 20, '<b>Hello world!</b>');
        // doc.text(20, 30, 'This is client-side Javascript to generate a PDF.');

        // // Add new page
        // doc.addPage();
        // doc.text(20, 20, 'Visit CodexWorld.com');

        // // Save the PDF
        // doc.save('document.pdf')
        // return false;
        // var doc = new jsPDF();
        //Set the File URL.
        //Set the File URL.



        // var url = "Files/" + fileName;

        // //Create XMLHTTP Request.
        // var req = new XMLHttpRequest();
        // req.open("GET", url, true);
        // req.responseType = "blob";
        // req.onload = function() {
        //   //Convert the Byte Data to BLOB object.
        //   var blob = new Blob([req.response], {
        //     type: "application/pdf"
        //   });

        //   //Check the Browser type and download the File.
        //   var isIE = false || !!document.documentMode;
        //   if (isIE) {
        //     window.navigator.msSaveBlob(blob, fileName);
        //   } else {
        //     var url = window.URL || window.webkitURL;
        //     link = url.createObjectURL(blob);
        //     var a = document.createElement("a");
        //     a.setAttribute("download", fileName);
        //     a.setAttribute("href", link);
        //     document.body.appendChild(a);
        //     a.click();
        //     document.body.removeChild(a);
        //   }
        // };
        // req.send();
      };
    </script>
    <!-- end barchart script -->
    <script>
      $("div[id^='myModal']").each(function() {
        var currentModal = $(this);
        currentModal.find('.btn-next').click(function() {
          currentModal.modal('hide');
          currentModal.closest("div[id^='myModal']").one('hidden.bs.modal', function(e) {
            $(this).nextAll("div[id^='myModal']").first().modal('show');
          })
        });
        //PREV
        currentModal.find('.btn-prev').click(function() {
          currentModal.modal('hide');
          currentModal.closest("div[id^='myModal']").one('hidden.bs.modal', function(e) {
            $(this).prevAll("div[id^='myModal']").first().modal('show');
          })
        });
      });
    </script>
    <!-- END: Page Vendor JS-->
    <!-- END: Page Vendor JS-->
    <?= $this->endSection() ?>