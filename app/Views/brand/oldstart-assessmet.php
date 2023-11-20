<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/katex.min.css')?>">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')?>">
        <link rel="stylesheet" type="text/css"
            href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/editors/quill/quill.snow.css')?>">
            <link rel="stylesheet" type="text/css"
                href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
                <link rel="stylesheet" type="text/css"
                    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
                    <link rel="stylesheet" type="text/css"
                        href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
                        <link rel="stylesheet" type="text/css"
                            href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
                            <link rel="stylesheet" type="text/css"
                                href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
                                <link rel="stylesheet" type="text/css"
                                    href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
                                    <link rel="stylesheet" type="text/css"
                                        href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
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
                                                            <div class="divider-text"><img
                                                                src="<?php echo base_url('public/brand/assets/app-assets/images/i5.png?v=1')?>"
                                                            class="myimg-style"></div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="accordion accordion-margin" id="accordionMargin">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingMarginOne">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#accordionMarginOne" aria-expanded="false"
                                                                    aria-controls="accordionMarginOne">
                                                                    Water Management
                                                                    <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                                                    </button>
                                                                    </h2>
                                                                    <div id="accordionMarginOne" class="accordion-collapse collapse"
                                                                        aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                                                        <div class="accordion-body p-0">
                                                                            <div class="q-detail">
                                                                                Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans
                                                                                gummi bears sweet roll
                                                                                bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie
                                                                                muffin cupcake candy
                                                                                caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit
                                                                                marzipan. Jujubes donut
                                                                                marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing
                                                                                cheesecake.
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
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                            Monitor our usage</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="96">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage and have implemented improvement
                                                                                            policies.</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="97">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented and
                                                                                            have set reduction targets. </span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="98">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented,
                                                                                                have set reduction targets and do initiatives to conserve the
                                                                                            local watersheds</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment_optional">
                                                                                    <p class="comnt_open show_btn">Comment (Optional)</p>
                                                                                    <div class="commnt_text">
                                                                                        <textarea class="form-control" name="remark2" id="remark2"
                                                                                        placeholder="Your comment..."></textarea>
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
                                                                                            <label class="form-label w-100"
                                                                                            for="last-name-column">&nbsp;</label>
                                                                                            <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                                                                            data-bs-target="#new-task-modal">Action</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                                                                                <div class="admin_btn mt-2">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit"
                                                                                    onclick="saveQuestion()">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm float-end"
                                                                                    value="Next" onclick="getNext()">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingMarginTwo">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#accordionMarginTwo" aria-expanded="false"
                                                                    aria-controls="accordionMarginTwo">
                                                                    Water Conservation
                                                                    <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                                                    </button>
                                                                    </h2>
                                                                    <div id="accordionMarginTwo" class="accordion-collapse collapse"
                                                                        aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
                                                                        <div class="accordion-body p-0">
                                                                            <div class="q-detail">
                                                                                Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans
                                                                                gummi bears sweet roll
                                                                                bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie
                                                                                muffin cupcake candy
                                                                                caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit
                                                                                marzipan. Jujubes donut
                                                                                marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing
                                                                                cheesecake.
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
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                            Monitor our usage</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="96">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage and have implemented improvement
                                                                                            policies.</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="97">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented and
                                                                                            have set reduction targets. </span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="98">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented,
                                                                                                have set reduction targets and do initiatives to conserve the
                                                                                            local watersheds</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment_optional">
                                                                                    <p class="comnt_open show_btn">Comment (Optional)</p>
                                                                                    <div class="commnt_text">
                                                                                        <textarea class="form-control" name="remark2" id="remark2"
                                                                                        placeholder="Your comment..."></textarea>
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
                                                                                            <label class="form-label w-100"
                                                                                            for="last-name-column">&nbsp;</label>
                                                                                            <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                                                                            data-bs-target="#new-task-modal">Action</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                                                                                <div class="admin_btn mt-2">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit"
                                                                                    onclick="saveQuestion()">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm float-end"
                                                                                    value="Next" onclick="getNext()">
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
                                                            <div class="divider-text"><img
                                                                src="<?php echo base_url('public/brand/assets/app-assets/images/i1.png?v=1')?>"
                                                            class="myimg-style"></div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="accordion accordion-margin" id="accordionMargin">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingMarginOne">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#accordionMarginOne" aria-expanded="false"
                                                                    aria-controls="accordionMarginOne">
                                                                    Water Management
                                                                    <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                                                    </button>
                                                                    </h2>
                                                                    <div id="accordionMarginOne" class="accordion-collapse collapse"
                                                                        aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                                                        <div class="accordion-body p-0">
                                                                            <div class="q-detail">
                                                                                Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans
                                                                                gummi bears sweet roll
                                                                                bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie
                                                                                muffin cupcake candy
                                                                                caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit
                                                                                marzipan. Jujubes donut
                                                                                marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing
                                                                                cheesecake.
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
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                            Monitor our usage</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="96">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage and have implemented improvement
                                                                                            policies.</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="97">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented and
                                                                                            have set reduction targets. </span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="98">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented,
                                                                                                have set reduction targets and do initiatives to conserve the
                                                                                            local watersheds</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment_optional">
                                                                                    <p class="comnt_open show_btn">Comment (Optional)</p>
                                                                                    <div class="commnt_text">
                                                                                        <textarea class="form-control" name="remark2" id="remark2"
                                                                                        placeholder="Your comment..."></textarea>
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
                                                                                            <label class="form-label w-100"
                                                                                            for="last-name-column">&nbsp;</label>
                                                                                            <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                                                                            data-bs-target="#new-task-modal">Action</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                                                                                <div class="admin_btn mt-2">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit"
                                                                                    onclick="saveQuestion()">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm float-end"
                                                                                    value="Next" onclick="getNext()">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingMarginTwo">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#accordionMarginTwo" aria-expanded="false"
                                                                    aria-controls="accordionMarginTwo">
                                                                    Water Conservation
                                                                    <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                                                    </button>
                                                                    </h2>
                                                                    <div id="accordionMarginTwo" class="accordion-collapse collapse"
                                                                        aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
                                                                        <div class="accordion-body p-0">
                                                                            <div class="q-detail">
                                                                                Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans
                                                                                gummi bears sweet roll
                                                                                bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie
                                                                                muffin cupcake candy
                                                                                caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit
                                                                                marzipan. Jujubes donut
                                                                                marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing
                                                                                cheesecake.
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
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                            Monitor our usage</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="96">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage and have implemented improvement
                                                                                            policies.</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="97">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented and
                                                                                            have set reduction targets. </span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="98">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented,
                                                                                                have set reduction targets and do initiatives to conserve the
                                                                                            local watersheds</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment_optional">
                                                                                    <p class="comnt_open show_btn">Comment (Optional)</p>
                                                                                    <div class="commnt_text">
                                                                                        <textarea class="form-control" name="remark2" id="remark2"
                                                                                        placeholder="Your comment..."></textarea>
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
                                                                                            <label class="form-label w-100"
                                                                                            for="last-name-column">&nbsp;</label>
                                                                                            <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                                                                            data-bs-target="#new-task-modal">Action</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                                                                                <div class="admin_btn mt-2">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit"
                                                                                    onclick="saveQuestion()">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm float-end"
                                                                                    value="Next" onclick="getNext()">
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
                                                            <div class="divider-text"><img
                                                                src="<?php echo base_url('public/brand/assets/app-assets/images/i2.png?v=1')?>"
                                                            class="myimg-style"></div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="accordion accordion-margin" id="accordionMargin">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingMarginOne">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#accordionMarginOne" aria-expanded="false"
                                                                    aria-controls="accordionMarginOne">
                                                                    Water Management
                                                                    <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                                                    </button>
                                                                    </h2>
                                                                    <div id="accordionMarginOne" class="accordion-collapse collapse"
                                                                        aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                                                        <div class="accordion-body p-0">
                                                                            <div class="q-detail">
                                                                                Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans
                                                                                gummi bears sweet roll
                                                                                bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie
                                                                                muffin cupcake candy
                                                                                caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit
                                                                                marzipan. Jujubes donut
                                                                                marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing
                                                                                cheesecake.
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
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                            Monitor our usage</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="96">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage and have implemented improvement
                                                                                            policies.</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="97">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented and
                                                                                            have set reduction targets. </span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="98">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented,
                                                                                                have set reduction targets and do initiatives to conserve the
                                                                                            local watersheds</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment_optional">
                                                                                    <p class="comnt_open show_btn">Comment (Optional)</p>
                                                                                    <div class="commnt_text">
                                                                                        <textarea class="form-control" name="remark2" id="remark2"
                                                                                        placeholder="Your comment..."></textarea>
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
                                                                                            <label class="form-label w-100"
                                                                                            for="last-name-column">&nbsp;</label>
                                                                                            <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                                                                            data-bs-target="#new-task-modal">Action</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                                                                                <div class="admin_btn mt-2">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit"
                                                                                    onclick="saveQuestion()">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm float-end"
                                                                                    value="Next" onclick="getNext()">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingMarginTwo">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#accordionMarginTwo" aria-expanded="false"
                                                                    aria-controls="accordionMarginTwo">
                                                                    Water Conservation
                                                                    <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                                                    </button>
                                                                    </h2>
                                                                    <div id="accordionMarginTwo" class="accordion-collapse collapse"
                                                                        aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
                                                                        <div class="accordion-body p-0">
                                                                            <div class="q-detail">
                                                                                Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans
                                                                                gummi bears sweet roll
                                                                                bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie
                                                                                muffin cupcake candy
                                                                                caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit
                                                                                marzipan. Jujubes donut
                                                                                marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing
                                                                                cheesecake.
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
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                            Monitor our usage</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="96">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage and have implemented improvement
                                                                                            policies.</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="97">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented and
                                                                                            have set reduction targets. </span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="98">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented,
                                                                                                have set reduction targets and do initiatives to conserve the
                                                                                            local watersheds</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment_optional">
                                                                                    <p class="comnt_open show_btn">Comment (Optional)</p>
                                                                                    <div class="commnt_text">
                                                                                        <textarea class="form-control" name="remark2" id="remark2"
                                                                                        placeholder="Your comment..."></textarea>
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
                                                                                            <label class="form-label w-100"
                                                                                            for="last-name-column">&nbsp;</label>
                                                                                            <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                                                                            data-bs-target="#new-task-modal">Action</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                                                                                <div class="admin_btn mt-2">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit"
                                                                                    onclick="saveQuestion()">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm float-end"
                                                                                    value="Next" onclick="getNext()">
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
                                                            <div class="divider-text"><img
                                                                src="<?php echo base_url('public/brand/assets/app-assets/images/i3.png?v=1')?>"
                                                            class="myimg-style"></div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="accordion accordion-margin" id="accordionMargin">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingMarginOne">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#accordionMarginOne" aria-expanded="false"
                                                                    aria-controls="accordionMarginOne">
                                                                    Water Management
                                                                    <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                                                    </button>
                                                                    </h2>
                                                                    <div id="accordionMarginOne" class="accordion-collapse collapse"
                                                                        aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                                                        <div class="accordion-body p-0">
                                                                            <div class="q-detail">
                                                                                Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans
                                                                                gummi bears sweet roll
                                                                                bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie
                                                                                muffin cupcake candy
                                                                                caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit
                                                                                marzipan. Jujubes donut
                                                                                marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing
                                                                                cheesecake.
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
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                            Monitor our usage</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="96">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage and have implemented improvement
                                                                                            policies.</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="97">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented and
                                                                                            have set reduction targets. </span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="98">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented,
                                                                                                have set reduction targets and do initiatives to conserve the
                                                                                            local watersheds</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment_optional">
                                                                                    <p class="comnt_open show_btn">Comment (Optional)</p>
                                                                                    <div class="commnt_text">
                                                                                        <textarea class="form-control" name="remark2" id="remark2"
                                                                                        placeholder="Your comment..."></textarea>
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
                                                                                            <label class="form-label w-100"
                                                                                            for="last-name-column">&nbsp;</label>
                                                                                            <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                                                                            data-bs-target="#new-task-modal">Action</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                                                                                <div class="admin_btn mt-2">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit"
                                                                                    onclick="saveQuestion()">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm float-end"
                                                                                    value="Next" onclick="getNext()">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingMarginTwo">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#accordionMarginTwo" aria-expanded="false"
                                                                    aria-controls="accordionMarginTwo">
                                                                    Water Conservation
                                                                    <span class="ms-auto me-2"><i class="fa-solid fa-circle-question"></i></span>
                                                                    </button>
                                                                    </h2>
                                                                    <div id="accordionMarginTwo" class="accordion-collapse collapse"
                                                                        aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
                                                                        <div class="accordion-body p-0">
                                                                            <div class="q-detail">
                                                                                Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans
                                                                                gummi bears sweet roll
                                                                                bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie
                                                                                muffin cupcake candy
                                                                                caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit
                                                                                marzipan. Jujubes donut
                                                                                marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing
                                                                                cheesecake.
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
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                            Monitor our usage</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="96">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage and have implemented improvement
                                                                                            policies.</span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="97">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented and
                                                                                            have set reduction targets. </span>
                                                                                        </label>
                                                                                        <label class="radio radio-primary">
                                                                                            <input type="radio" name="answer2" value="98">
                                                                                            <span style="border-right: 2px solid black;">Yes we Regularly
                                                                                                Monitor our usage, have improvement policies are implemented,
                                                                                                have set reduction targets and do initiatives to conserve the
                                                                                            local watersheds</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment_optional">
                                                                                    <p class="comnt_open show_btn">Comment (Optional)</p>
                                                                                    <div class="commnt_text">
                                                                                        <textarea class="form-control" name="remark2" id="remark2"
                                                                                        placeholder="Your comment..."></textarea>
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
                                                                                            <label class="form-label w-100"
                                                                                            for="last-name-column">&nbsp;</label>
                                                                                            <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                                                                            data-bs-target="#new-task-modal">Action</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <span id="responseDiv2" style="col2or: green;font-size: 15px;"></span>
                                                                                <div class="admin_btn mt-2">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm" value="Submit"
                                                                                    onclick="saveQuestion()">
                                                                                    <input type="button" class="btn btn-gradient-dark btn-sm float-end"
                                                                                    value="Next" onclick="getNext()">
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
                                                    <div class="content-header-left col-md-12 col-12 mb-2">
                                                        <div class="row breadcrumbs-top">
                                                            <div class="col-12">
                                                                <h2 class="content-header-title float-start mb-0">Assessment</h2>
                                                                <a href='<?= base_url('Controlwork/assessment');?>'
                                                                class='btn btn-primary float-end mx-2'>Back</a>
                                                                <div class="breadcrumb-wrapper">
                                                                    <h4 class="content-header-title " style='margin-top:5px;'></h4>
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
                                                    <div class="category_page_header">
                                                        <div class="cph_inner">
                                                            <div class="cph_left">
                                                                <img
                                                                src="https://positiivplus.io/public/uploads/assessment/1629138611_2179817bd862b8f2b7ae.png">
                                                            </div>
                                                            <div class="cph_right">
                                                                <div class="cph_title"><?= $assessment['assessment_name']; ?></div>
                                                                <div class="cph_short_desc">
                                                                    This is an Advanced assessment aligning you brand wth the United Nation's Sustainable
                                                                    Development Goals.
                                                                </div>
                                                                <div class="cph_status">
                                                                    <div class="cph_status_left d-flex">
                                                                        <div class="cph_score_icon me-1">
                                                                            <img
                                                                            src="<?php echo base_url('public/brand/assets/app-assets/images/icon_score.png?v=1')?>">
                                                                        </div>
                                                                        <div class="cph_score_content">
                                                                            <div class="cph_score_label">Question Completion</div>
                                                                            <div class="cph_score_result fw-bolder"><span id="tot_attempt_id"
                                                                            class="fw-bolder"><?= $total_A?></span> Out of <?= $total_Q?></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cph_status_right d-flex">
                                                                        <div class="cph_score_icon me-1">
                                                                            <img src="https://positiivplus.io/public/brand/assets/custom_img/icon_complete.png">
                                                                        </div>
                                                                        <div class="cph_score_content">
                                                                            <div class="cph_score_label">Utopiic Level : Dorment</div>
                                                                            <div class="cph_score_result fw-bolder">
                                                                            <?= $total_per = number_format(($percentile1),2)?>%</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- category_page_header -->
                                                    <!-- blocks start -->
                                                    <!-- Role cards -->
                                                    <div class="row mt-4">
                                                        <?php
                                                        if($start_assessment){
                                                        foreach($start_assessment as $row){
                                                        $count_answer = 0;
                                                        foreach($answer_count as $key => $ac){
                                                        if($row['indicator_id'] == $ac['indicator_id']){
                                                        $count_answer = $ac['total_a'];
                                                        }
                                                        
                                                        }
                                                        ?>
                                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                                            <div class="card mb-4">
                                                                <a href="<?= base_url('Controlwork/answerQuestion')?>/<?= $row['select_question_id'];?>/<?= $row['indicator_id']?>/<?= $id;?>"
                                                                    class="myblock1">
                                                                    <div class="card-body">
                                                                        <div class="cs_icon">
                                                                            <?php
                                                                            foreach($indicator_category as $ind){
                                                                            if($ind['id'] == $row['indicator_id']){
                                                                            ?>
                                                                            <img src="<?php echo base_url('public/uploads/sdg')?>/<?= $ind['image']?>">
                                                                            <?php }}?>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between mt-1">
                                                                            <h6 class="fw-bolder"><?php
                                                                            foreach($indicator_category as $cat){
                                                                            if($cat['id'] == $row['indicator_category_id']){
                                                                            echo $cat['indicator_category_name'];
                                                                            }
                                                                            }
                                                                            ?></h6>
                                                                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                                                    title="Checked" class="avatar avatar-sm pull-up">
                                                                                    <?php
                                                                                    
                                                                                    if($count_answer== $row['total_Q']){?>
                                                                                    <img class="rounded-circle"
                                                                                    src="<?php echo base_url('public/brand/assets/app-assets/images/q_filled.png?v=1')?>"
                                                                                    alt="Avatar" />
                                                                                    <?php } else{?>
                                                                                    <img class="rounded-circle"
                                                                                    src="<?php echo base_url('public/brand/assets/app-assets/images/q_blank.png?v=1')?>"
                                                                                    alt="Avatar" />
                                                                                    <?php }?>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                                                            <div class="role-heading">
                                                                                <h4 class="fw-bolder text-uppercase font-size-17">
                                                                                <?php
                                                                                foreach($indicator_category as $ind){
                                                                                echo $ind['id'] == $row['indicator_id'] ? $ind['indicator_category_name'] : '';
                                                                                }
                                                                                ?>
                                                                                </h4>
                                                                                <span>
                                                                                    <small class="fw-bolder">Questions Answered</small>
                                                                                </span>
                                                                            </div>
                                                                            <span class="text-body fw-bolder"><?= $count_answer;?>/<?= $row['total_Q']?></span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <?php }}?>

                                                       

                                                        <?php
                                                        if($total_A == $total_Q){ ?>
                                                        <div>
                                                            <a href="<?= base_url("Controlwork/completeAssessment");?>/<?= $id;?>/<?= $total_per;?>"
                                                                class='btn btn-primary mt-1 float-end' onclick="return confirm('Are you sure')">Complete
                                                            Assessment</a>
                                                        </div>
                                                        <?php }?>

                                                        <!-- <div class="col-xl-3 col-lg-6 col-md-6">
                                                            <div class="card mb-4">
                                                                <a href="" class="myblock1" data-bs-target="#myModal2" data-bs-toggle="modal">
                                                                    <div class="card-body">
                                                                        <div class="cs_icon">
                                                                            <img src="<?php echo base_url('public/brand/assets/app-assets/images/i1.png?v=1')?>">
                                                                        </div>
                                                                        <div class="d-flex justify-content-between mt-1">
                                                                            <h6 class="fw-bolder">Social</h6>
                                                                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                                                                <li
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-popup="tooltip-custom"
                                                                                    data-bs-placement="top"
                                                                                    title="Checked"
                                                                                    class="avatar avatar-sm pull-up"
                                                                                    >
                                                                                    <img class="rounded-circle" src="<?php echo base_url('public/brand/assets/app-assets/images/q_filled.png?v=1')?>" alt="Avatar" />
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                                                            <div class="role-heading">
                                                                                <h4 class="fw-bolder text-uppercase font-size-17">No Poverty</h4>
                                                                                <span>
                                                                                    <small class="fw-bolder">Questions Answered</small>
                                                                                </span>
                                                                            </div>
                                                                            <span class="text-body fw-bolder">2/3</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>-->
                                                    </div>
                                                    <!--/ Role cards -->
                                                    <!-- end blocks  -->
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
                                                                    <input type="text" id="todoTitleAdd" name="todoTitleAdd"
                                                                    class="new-todo-item-title form-control" placeholder="Title" />
                                                                </div>
                                                                <div class="mb-1 position-relative">
                                                                    <label for="task-assigned" class="form-label d-block">Assignee</label>
                                                                    <select class="select2 form-select" id="task-assigned" name="task-assigned">
                                                                        <option
                                                                            data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-3.jpg')?>"
                                                                            value="Phill Buffer" selected>
                                                                            Phill Buffer
                                                                        </option>
                                                                        <option
                                                                            data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-1.jpg')?>"
                                                                            value="Chandler Bing">
                                                                            Chandler Bing
                                                                        </option>
                                                                        <option
                                                                            data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-4.jpg')?>"
                                                                            value="Ross Geller">
                                                                            Ross Geller
                                                                        </option>
                                                                        <option
                                                                            data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-6.jpg')?>"
                                                                            value="Monica Geller">
                                                                            Monica Geller
                                                                        </option>
                                                                        <option
                                                                            data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-2.jpg')?>"
                                                                            value="Joey Tribbiani">
                                                                            Joey Tribbiani
                                                                        </option>
                                                                        <option
                                                                            data-img="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg')?>"
                                                                            value="Rachel Green">
                                                                            Rachel Green
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label for="task-due-date" class="form-label">Due Date</label>
                                                                    <input type="text" class="form-control task-due-date" id="task-due-date"
                                                                    name="task-due-date" />
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label for="task-tag" class="form-label d-block">Tag</label>
                                                                    <select class="form-select task-tag" id="task-tag" name="task-tag" multiple="multiple">
                                                                        <option value="NUll">Open Select</option>
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
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                                            id="inlineRadio1" value="Yes" checked />
                                                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline mt-0">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                                            id="inlineRadio2" value="No" />
                                                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-1">
                                                                <button type="submit" class="btn btn-primary d-none add-todo-item me-1">Add</button>
                                                                <button type="button" class="btn btn-outline-secondary add-todo-item d-none"
                                                                data-bs-dismiss="modal">
                                                                Cancel
                                                                </button>
                                                                <button type="button"
                                                                class="btn btn-primary d-none update-btn update-todo-item me-1">Update</button>
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
                                                            <h4 class="card-title">Basic</h4>
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
                                                                            <img class="me-1"
                                                                            src="<?php echo base_url('public/brand/assets/app-assets/images/icons/file-icons/pdf.png')?>"
                                                                            alt="invoice" height="23" />
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
                                                                                <img src="<?php echo base_url('public/brand/assets/app-assets/images/avatars/12-small.png')?>"
                                                                                alt="avatar" height="38" width="38" />
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
                                                                        <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseExample" aria-expanded="true"
                                                                        aria-controls="collapseExample">
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
                                                                                    <span> This Year's Total Balance : <span
                                                                                    class="fw-bold">$70000</span></span>
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
                                                                                    <img src="<?php echo base_url('public/brand/assets/app-assets/images/avatars/1-small.png')?>"
                                                                                    alt="Avatar" height="32" width="32" />
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
                                                                            Develop an online store of electronic devices for the provided layout, as well as
                                                                            develop a mobile
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
                                                                            Our main goal is to design a new mobile application for our client. The customer
                                                                            wants a clean & flat
                                                                            design.
                                                                        </p>
                                                                        <div>
                                                                            <span class="text-muted">Participants</span>
                                                                            <div class="avatar-group mt-50">
                                                                                <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                                    data-bs-placement="bottom" title="Vinnie Mostowy" class="avatar pull-up">
                                                                                    <img src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-5.jpg')?>"
                                                                                    alt="Avatar" height="30" width="30" />
                                                                                </div>
                                                                                <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                                    data-bs-placement="bottom" title="Elicia Rieske" class="avatar pull-up">
                                                                                    <img src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-7.jpg')?>"
                                                                                    alt="Avatar" height="30" width="30" />
                                                                                </div>
                                                                                <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                                    data-bs-placement="bottom" title="Julee Rossignol" class="avatar pull-up">
                                                                                    <img src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-10.jpg')?>"
                                                                                    alt="Avatar" height="30" width="30" />
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
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>">
                                        </script>
                                        <script
                                        src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')?>">
                                        </script>
                                        <script
                                        src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')?>">
                                        </script>
                                        <script
                                        src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')?>">
                                        </script>
                                        <script
                                        src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')?>">
                                        </script>
                                        <script
                                        src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')?>">
                                        </script>
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js')?>"></script>
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js')?>">
                                        </script>
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js')?>"></script>
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')?>">
                                        </script>
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js')?>">
                                        </script>
                                        <script
                                        src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')?>">
                                        </script>
                                        <script
                                        src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')?>">
                                        </script>
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js')?>"></script>
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')?>">
                                        </script>
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/katex.min.js')?>"></script>
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/highlight.min.js')?>">
                                        </script>
                                        <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/quill.min.js')?>"></script>
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