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
<style type="text/css">
    .q-detail>pre {
        color: fff;
        background-color: transparent;
    }

    .tooltip-inner {
        text-align: center;
        max-width: 80% !important;

    }

    #sig-canvas {
        border: 2px dotted #CCCCCC;
        border-radius: 15px;
        cursor: crosshair;
    }

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

    /* .card_body_txt .q_radio_btn.vertical .radio:first-child span {
        border-radius: 25px 25px 0 0;
    }

    .card_body_txt .q_radio_btn .radio:first-child span {
        border-right: 2px solid #262626 !important;
    } */

    .card_body_txt.vertical_full .q_radio_btn .radio span {
        padding: 7px 20px;
        line-height: 20px;
        border-radius: 30px;
    }

    /* .card_body_txt .q_radio_btn .radio:first-child span {
        border-radius: 25px 0 0 25px;
    } */

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

    pre {
        white-space: pre-wrap;
    }

    .accordion-body {
        border: 1px solid #ddd;
        border-radius: 10px;
    }

    #tooltip {
        position: relative;
        /* display: inline-block; */
        /* border-bottom: 1px dotted black; */
    }

    #tooltip .tooltiptext {
        /* visibility: hidden; */
        width: 210;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -60px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    #tooltip .tooltiptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    #tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }
</style>

<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Assessment</h2>
                        <a href='<?= base_url('Qualitative-assessment'); ?>' class='btn btn-primary float-end mx-2'>Back</a>
                        <div class="breadcrumb-wrapper">
                            <h4 class="content-header-title " style='margin-top:5px;'></h4>
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
                <strong>Error!</strong> <?php echo $session->get('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <div class="content-body">
            <!-- category_page_header -->
            <div class="category_page_header">
                <div class="cph_inner">
                    <div class="cph_left">
                        <img src="https://positiivplus.io/public/uploads/assessment/1629138611_2179817bd862b8f2b7ae.png">
                    </div>
                    <div class="cph_right">
                        <div class="cph_title"><?= $assessment_title['assessment_name'] ?></div>
                        <div class="cph_short_desc">
                            This is an Advanced assessment aligning you brand wth the United Nation's Sustainable
                            Development Goals.
                        </div>
                        <div class="cph_status">
                            <div class="cph_status_left d-flex">
                                <div class="cph_score_icon me-1">
                                    <img src="<?php echo base_url('public/brand/assets/app-assets/images/icon_score.png?v=1') ?>">
                                </div>
                                <div class="cph_score_content">
                                    <div class="cph_score_label">Question Completion</div><span id="alertMsg"></span>
                                    <div class="cph_score_result fw-bolder"><span id="tot_attempt_id" class="fw-bolder"><?= $total_A ?></span> Out of <?= $total_Q ?></div>
                                </div>
                            </div>
                            <div class="cph_status_right d-flex">
                                <div class="cph_score_icon me-1">
                                    <img src="<?php echo base_url('public/brand/assets/custom_img/icon_complete.png') ?>">
                                </div>
                                <div class="cph_score_content">
                                    <div class="cph_score_label">Result</div>
                                    <div class="cph_score_result fw-bolder"><span id="percentiles1">
                                            <?= number_format(($percentile1), 2) ?></span> %</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- category_page_header -->
            <!-- blocks start -->
            <!-- Role cards -->

            <div class="accordion accordion-margin" id="accordionMargin">

                <?php

                foreach ($a_q as $key => $row) {
                ?>
                    <div class="accordion-item">

                        <h2 class="accordion-header" id="headingMargin<?= $key; ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMargin<?= $key; ?>" aria-expanded="false" aria-controls="accordionMargin<?= $key; ?>">
                                <?= $row['question_title'] ?>
                                <span class="ms-auto me-4" id="check<?= $row['id'] ?>"><?= in_array($row['id'], $is_submit) ? '<i class="fa fa-check me-4"></i>' : '' ?></span>

                                <span class="me-2">

                                    <p data-toggle="tooltip" data-placement="left" title="<?= $row['remark']; ?>">
                                        <i class="fa-solid fa-circle-question"></i>
                                    </p>
                                </span>
                            </button>
                        </h2>
                        <div id="accordionMargin<?= $key; ?>" class="accordion-collapse collapse" aria-labelledby="headingMargin<?= $key; ?>" data-bs-parent="#accordionMargin">
                            <div class="accordion-body p-0">

                                <form class='okoko' onsubmit="event.preventDefault();submit_done(this,<?= $row['id'] ?>);">
                                    <div class="q-detail">

                                        <pre> <?= implode(":<br>", array($row['question'])) ?></pre>
                                        <?php if ($row['is_document_needed']) { ?>

                                            <span class="badge bg-danger rounded-circle float-end" style="margin: -9px;">0</span> <?php
                                                                                                                                } ?>
                                    </div>
                                    <div class="card_body_inn_2">
                                        <input type="hidden" name="answer_id" value="<?= $row['answer']; ?>">
                                        <input type="hidden" class="question_id" name="question_id" value="<?= $row['id']; ?>">
                                        <input type="hidden" name="indicator_id" value="<?= $indicator_id; ?>">
                                        <input type="hidden" name="a_id" value="<?= $a_id; ?>">
                                        <input type="hidden" name="main_id" value="<?= $id; ?>">
                                        <input type="hidden" name="title" value="<?= $row['question_title']; ?>">
                                        <input type="hidden" name="document_needed" value="<?= $row['is_document_needed']; ?>">

                                        <?php
                                        if ($row['choice'] == 'Single') {
                                            if ($row['multi_answer'] == 'Text') { ?>
                                                <div class="comment_optional">
                                                    <p class="comnt_open show_btn">Answer</p>
                                                    <div class="commnt_text">
                                                        <!-- <input type="number" class='form-control' name='answer' require> -->
                                                        <?php $data = json_decode($row['multi_answer']);
                                                        $st = 0;
                                                        foreach ($qu_an as $come) {
                                                            if ($come['question_id'] == $row['id']) {
                                                                $st++;
                                                                $anss = json_decode($come['answer']);
                                                        ?>
                                                                <!--   <textarea class="form-control" name="answer" required='required' id="editor"
                                                                                placeholder="Your answer..."><?= $anss; ?></textarea> -->
                                                                <textarea class="form-control" name="answer" required='required' id="" placeholder="Your answer..."><?= $anss; ?></textarea>
                                                            <?php }
                                                        }
                                                        if ($st == 0) { ?>
                                                            <textarea class="form-control" name="answer" required='required' id="" placeholder="Your answer..."></textarea>
                                                        <?php } ?>
                                                        <!-- <span class="comment_close">x</span> -->
                                                    </div>
                                                </div>
                                            <?php } elseif ($row['multi_answer'] == 'annotation') { ?>
                                                <div>
                                                    <canvas id="canvas" width="500" height="200" style="border: 1px solid black;"></canvas>
                                                </div>
                                                <div style="margin-top:5px">
                                                    <span>Size: </span>
                                                    <input type="range" min="1" max="50" value="10" class="size" id="sizeRange" />
                                                </div>
                                                <div style="margin-top:5px">
                                                    <span>Color: </span>
                                                    <input type="radio" name="colorRadio" value="black" checked />
                                                    <label for="black">Black</label>
                                                    <input type="radio" name="colorRadio" value="white" />
                                                    <label for="black">White</label>
                                                    <input type="radio" name="colorRadio" value="red" />
                                                    <label for="black">Red</label>
                                                    <input type="radio" name="colorRadio" value="green" />
                                                    <label for="black">Green</label>
                                                    <input type="radio" name="colorRadio" value="blue" />
                                                    <label for="black">Blue</label>
                                                </div>
                                                <div style="margin-top:5px">
                                                    <button id="clear">Clear</button>
                                                </div>
                                                <br />
                                                <!-- </form> -->
                                                <!--  <form id="form"  method="post" enctype="multipart/form-data">
                                                                        <input id="upload" type="file" class="file" name="file" accept="image/*" />
                                                                        <p  class="btn btn-primary aaaaa">submit</p>
                                                                    </form> -->
                                                <p> Start drawing on the blank canvas or upload an image and use the brush to modify on it </p>
                                                <div class="comment_optional">
                                                    <p class="comnt_open show_btn">Answer-annotation</p>
                                                    <div class="commnt_text">
                                                        <?php
                                                        $smaa = 0;
                                                        foreach ($qu_an as $come) {
                                                            if ($come['question_id'] == $row['id']) {
                                                                $smaa++;
                                                                $anss = json_decode($come['answer']);
                                                        ?>
                                                                <textarea class="form-control" name="answer" required='required' placeholder="Your answer..."><?= $anss; ?></textarea>
                                                            <?php }
                                                        }
                                                        if ($smaa == 0) { ?>
                                                            <textarea class="form-control" name="answer" required='required' placeholder="Your answer..."></textarea>
                                                        <?php } ?>
                                                        <!-- <span class="comment_close">x</span> -->
                                                    </div>
                                                </div>
                                            <?php } elseif ($row['multi_answer'] == 'Media upload') { ?>
                                                <div class="comment_optional">
                                                    <p class="comnt_open show_btn">Answer-Media upload</p>
                                                    <div class="commnt_text">

                                                        <?php
                                                        $sm = 0;
                                                        foreach ($qu_an as $come) {
                                                            if ($come['question_id'] == $row['id']) {
                                                                $sm++;
                                                                $anss = json_decode($come['answer']);
                                                        ?>
                                                                <figure>
                                                                    <img src="<?= base_url('/public/uploads/answered_question'); ?>/<?= $anss; ?>" alt="image not found" style='width:200px'>
                                                                </figure>
                                                                <input type="file" class="form-control" name="answer_media" value="<?= $anss; ?>" required='required'>
                                                            <?php }
                                                        }
                                                        if ($sm == 0) { ?>
                                                            <input type="file" class="form-control" name="answer_media" required='required'>
                                                        <?php } ?>
                                                        <!-- <span class="comment_close">x</span> -->
                                                    </div>
                                                </div>
                                            <?php } elseif ($row['multi_answer'] == 'location') { ?>
                                                <button class="btn btn-primary waves-effect waves-float waves-light" onclick="getLocation()">Click to get Current Location</button>
                                                <input type="text" id="latid">
                                                <input type="text" id="longid">
                                                <p class="uuu">yyy</p>
                                                <script>
                                                    var x = document.getElementById("demo");

                                                    function getLocation() {
                                                        if (navigator.geolocation) {
                                                            navigator.geolocation.getCurrentPosition(showPosition);
                                                        } else {
                                                            x.innerHTML = "Geolocation is not supported by this browser.";
                                                        }
                                                    }

                                                    function showPosition(position) {
                                                        $('#latid').val(position.coords.latitude);
                                                        $('#longid').val(position.coords.longitude);
                                                        x.innerHTML = "Latitude: " + position.coords.latitude +
                                                            "<br>Longitude: " + position.coords.longitude;
                                                    }
                                                </script>

                                                <div class="comment_optional">
                                                    <p class="comnt_open show_btn">Answer-location</p>
                                                    <div class="commnt_text">
                                                        <?php
                                                        $sal = 0;
                                                        foreach ($qu_an as $come) {
                                                            if ($come['question_id'] == $row['id']) {
                                                                $sal++;
                                                                $anss = json_decode($come['answer']);
                                                        ?>
                                                                <textarea class="form-control" name="answer" required='required' id="" placeholder="Your answer..."><?= $anss; ?></textarea>
                                                            <?php }
                                                        }
                                                        if ($sal == 0) { ?>
                                                            <textarea class="form-control" name="answer" required='required' id="" placeholder="Your answer..."></textarea>
                                                        <?php } ?>
                                                        <!-- <span class="comment_close">x</span> -->
                                                    </div>
                                                </div>
                                            <?php } elseif ($row['multi_answer'] == 'Signature') { ?>

                                                <!-- Content -->
                                                <div class="container">
                                                    <form action="<?= base_url('Controlwork/sign'); ?>" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h1>E-Signature</h1>
                                                                <p>Sign in and save your signature as an image!</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <canvas id="sig-canvas" width="620" height="160">
                                                                    Get a better browser, bro.
                                                                </canvas>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                                                <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                                                            </div>
                                                        </div>
                                                        <br />
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <textarea id="sig-dataUrl" class="form-control fff" rows="5">Data URL for your signature will go here!</textarea>
                                                            </div>
                                                        </div>

                                                        <br />
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <img id="sig-image" src="" alt="Your signature will go here!" />
                                                            </div>
                                                        </div>
                                                        <!-- <button type="submit" class="btn btn-primary signature">Complete</button> -->
                                                        <?php if ($signatureeeee) {
                                                            echo "<img src='" . base_url('public/sign/' . $signatureeeee . '') . "'/>";
                                                        } ?>
                                                    </form>
                                                </div>
                                                <div class="comment_optional">
                                                    <p class="comnt_open show_btn">Answer-Signature</p>
                                                    <div class="commnt_text">
                                                        <?php
                                                        $sss = 0;
                                                        foreach ($qu_an as $come) {
                                                            if ($come['question_id'] == $row['id']) {
                                                                $sss++;
                                                                $anss = json_decode($come['answer']);
                                                        ?>
                                                                <textarea class="form-control" name="answer" required='required' id="" placeholder="Your answer..."><?= $anss ?></textarea>
                                                            <?php }
                                                        }
                                                        if ($sss == 0) { ?>
                                                            <textarea class="form-control" name="answer" required='required' id="" placeholder="Your answer..."></textarea>
                                                        <?php } ?>
                                                        <!-- <span class="comment_close">x</span> -->
                                                    </div>
                                                </div>
                                            <?php } elseif ($row['multi_answer'] == 'Time') { ?>
                                                <div class="comment_optional">
                                                    <p class="comnt_open show_btn">Answer-time</p>
                                                    <div class="commnt_text">
                                                        <?php
                                                        $stt = 0;
                                                        foreach ($qu_an as $come) {
                                                            if ($come['question_id'] == $row['id']) {
                                                                $stt++;
                                                                $anss = json_decode($come['answer']);
                                                        ?>
                                                                <input type="time" class='form-control' name='answer' value='<?= $anss; ?>' required>
                                                            <?php }
                                                        }
                                                        if ($stt == 0) { ?>
                                                            <input type="time" class='form-control' name='answer' required>
                                                        <?php } ?>
                                                        <!-- <span class="comment_close">x</span> -->
                                                    </div>
                                                </div>
                                            <?php } elseif ($row['multi_answer'] == 'Date') { ?>
                                                <div class="comment_optional">
                                                    <p class="comnt_open show_btn">Answer-date</p>
                                                    <div class="commnt_text">
                                                        <?php
                                                        $sd = 0;
                                                        foreach ($qu_an as $come) {
                                                            if ($come['question_id'] == $row['id']) {
                                                                $sd++;
                                                                $anss = json_decode($come['answer']);
                                                        ?>
                                                                <input type="date" class='form-control' name='answer' value='<?= $anss; ?>' required>
                                                            <?php }
                                                        }
                                                        if ($sd == 0) { ?>
                                                            <input type="date" class='form-control' name='answer' required>
                                                        <?php } ?>
                                                        <!-- <span class="comment_close">x</span> -->
                                                    </div>
                                                </div>
                                            <?php } elseif ($row['multi_answer'] == 'Date and Time') { ?>
                                                <div class="comment_optional">
                                                    <p class="comnt_open show_btn">Answer-date-time</p>
                                                    <div class="commnt_text">
                                                        <?php
                                                        $sdt = 0;
                                                        foreach ($qu_an as $come) {
                                                            if ($come['question_id'] == $row['id']) {
                                                                $sdt++;
                                                                $anss = json_decode($come['answer']);
                                                        ?>
                                                                <input type="datetime-local" class='form-control' name='answer' value='<?= $anss; ?>' required>
                                                            <?php }
                                                        }
                                                        if ($sdt == 0) { ?>
                                                            <input type="datetime-local" class='form-control' name='answer' required>
                                                        <?php } ?>
                                                        <!-- <span class="comment_close">x</span> -->
                                                    </div>
                                                </div>
                                            <?php } elseif ($row['multi_answer'] == 'Numbers') { ?>
                                                <div class="comment_optional">
                                                    <p class="comnt_open show_btn">Answer-number</p>
                                                    <div class="commnt_text">
                                                        <?php
                                                        $sn = 0;
                                                        foreach ($qu_an as $come) {
                                                            if ($come['question_id'] == $row['id']) {
                                                                $sn++;
                                                                $anss = json_decode($come['answer']);
                                                        ?>
                                                                <input type="number" class='form-control' name='answer' value='<?= $anss; ?>' required>
                                                            <?php }
                                                        }
                                                        if ($sn == 0) { ?>
                                                            <input type="number" class='form-control' name='answer' required>
                                                        <?php } ?>
                                                        <!-- <span class="comment_close">x</span> -->
                                                    </div>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <div class="card_body_txt cbt_2 vertical_full">
                                                <div class="q_radio_btn q_radio_first vertical mb-0">
                                                    <?php $data = json_decode($row['multi_answer']);
                                                    // $data = [];
                                                    // print_r($data);

                                                    if ($row['answeroption'] == 2) {
                                                        //  Start
                                                        $mm = 0;
                                                        foreach ($qu_an as $come) { //attempt one
                                                            if ($come['question_id'] == $row['id']) {
                                                                $mm++;
                                                                $atempt = json_decode($come['answer']);
                                                                foreach ($data as $a) {

                                                                    if (in_array($a, $atempt)) { ?>
                                                                        <label class="radio radio-primary">
                                                                            <input type="checkbox" name="answer[]" value="<?= $a; ?>" checked="checked">
                                                                            <span style="border-right: 2px solid black;"><?= $a; ?></span>
                                                                        </label>
                                                                    <?php
                                                                    } else { ?>
                                                                        <label class="radio radio-primary">
                                                                            <input type="checkbox" name="answer[]" value="<?= $a; ?>">
                                                                            <span style="border-right: 2px solid black;"><?= $a; ?></span>
                                                                        </label>
                                                                <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        if ($mm == 0) {
                                                            foreach ($data as $a) { ?>
                                                                <label class="radio radio-primary">
                                                                    <input type="checkbox" name="answer[]" required='required' value="<?= $a; ?>">
                                                                    <span style="border-right: 2px solid black;"><?= $a; ?></span>
                                                                </label>
                                                                <?php }
                                                        }
                                                        // end
                                                    } else {

                                                        $ms = 0;
                                                        foreach ($qu_an as $come) {
                                                            if ($come['question_id'] == $row['id']) {
                                                                $ms++;
                                                                $anss = json_decode($come['answer']);
                                                                foreach ($data as $keyon => $ans) {
                                                                    if ($ans == $anss) {
                                                                ?>
                                                                        <label class="radio radio-primary">
                                                                            <input type="radio" name="answer" required value="<?= $ans; ?>" checked="checked">
                                                                            <span style="border-right: 2px solid black;"><?= $ans; ?></span>
                                                                        </label>
                                                                    <?php } else { ?>
                                                                        <label class="radio radio-primary">
                                                                            <input type="radio" name="answer" required value="<?= $ans; ?>">
                                                                            <span style="border-right: 2px solid black;"><?= $ans; ?></span>
                                                                        </label>
                                                                <?php }
                                                                }
                                                            }
                                                        }
                                                        if ($ms == 0) {
                                                            foreach ($data as $keytwo => $ans) { ?>
                                                                <label class="radio radio-primary">
                                                                    <input type="radio" name="answer" required value="<?= $ans; ?>">
                                                                    <span style="border-right: 2px solid black;"><?= $ans; ?></span>
                                                                </label>
                                                    <?php }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="comment_optional">
                                            <p class="comnt_open show_btn">Comment (Optional)</p>
                                            <div class="commnt_text">
                                                <?php
                                                $smaba = 0;
                                                foreach ($qu_an as $come) {
                                                    if ($come['question_id'] == $row['id']) {
                                                        $smaba++;
                                                        $anss = $come['comment'];
                                                ?>
                                                        <textarea class="form-control" name="comment" id="remark2" placeholder="Your comment..."><?= $anss ?></textarea>
                                                    <?php }
                                                }
                                                if ($smaba == 0) { ?>
                                                    <textarea class="form-control" name="comment" id="remark2" placeholder="Your comment..."></textarea>
                                                <?php } ?>
                                                <!-- <span class="comment_close">x</span> -->
                                            </div>
                                        </div>
                                        <!-- <div class="comment_optional">
                                                                        <p class="comnt_open show_btn">Answer</p>
                                                                        <div class="mb-1">
                                                                            <label class="form-label" for="first-name-column">Media</label>
                                                                            <input type="file" class="form-control" name="fname-column">
                                                                        </div>
                                                                    </div> -->
                                        <label class="form-label" for="first-name-column">Media</label>
                                        <!-- <input type="hidden" id="qusid<?= $row['id']; ?>"> -->
                                        <select class="form-control select2" <?php if ($row['is_document_needed'] == '1') {
                                                                                    echo 'required';
                                                                                } ?> onchange="documentuplod(value +' '+ <?= $row['id']; ?>+' '+<?= $row['is_document_needed']; ?>)">
                                            <option value="">Choose Media</option>
                                            <option value="1">Upload</option>
                                            <option value="2">Choose Document</option>
                                        </select>
                                        <div class="row mt-2 mediadocument<?= $row['id']; ?>" id="mediadocument" style="display:none;">
                                            <div class="col-md-9 col-12">
                                                <div class="mb-1">
                                                    <!-- <label class="form-label" for="first-name-column">Media</label> -->
                                                    <?php
                                                    $sm = 0;
                                                    foreach ($qu_an as $come) {
                                                        if ($come['question_id'] == $row['id']) {
                                                            $sm++;
                                                            $anss = $come['media'];
                                                            if ($anss) {
                                                    ?>
                                                                <div class='view-image'>
                                                                    <figure>
                                                                        <img src="<?= base_url('/public/uploads/ans_question'); ?>/<?= $anss; ?>" alt="image not found" style='width:200px'>
                                                                    </figure><button class='btn btn-primary show-file' type='button'>Change Image</button>
                                                                </div>
                                                                <div class='view-input' style='display:none;'>
                                                                    <input type="file" class="form-control mb-1" name="file">
                                                                    <button class='btn btn-primary show-image' type='button'>Cancel</button>
                                                                </div>
                                                            <?php } else { ?>
                                                                <input type="file" class="form-control" name="file">
                                                            <?php } ?>
                                                        <?php }
                                                    }
                                                    if ($sm == 0) { ?>
                                                        <input type="file" class="form-control" name="file" id="file<?= $row['id']; ?>">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="mb-1 float-end">
                                                    <label class="form-label w-100" for="last-name-column">&nbsp;</label>
                                                    <!-- <button class="btn btn-primary w-100 action_btn" type='button'
                                                                                data-bs-toggle="modal" data-id="<?= $row['id']; ?>"
                                                                                data-bs-target="#new-task-modal">Action</button> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="document<?= $row['id']; ?>" style="display:none;">
                                            <input type="hidden" value="" id="get<?= $row['id']; ?>" name="fileupload">
                                            <label class="form-label" for="first-name-column">Document</label>
                                            <!-- <input type="hidden" id="qusid<?= $row['id']; ?>"> -->
                                            <select class="form-control select2" onchange="documentconnect(value +' '+ <?= $row['id']; ?>)">
                                                <option value="">Choose Document</option>
                                                <?php foreach ($document as $documentid) { ?>
                                                    <option value="<?= $documentid['document_name']; ?>"><?= $documentid['document_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <span id="responseDiv2" style="color: green;font-size: 15px;"></span>
                                        <div class="admin_btn mt-2">
                                            <input type="submit" class="btn btn bg-transparent btn-sm uploadBtn" value="" onclick="">

                                            <input type="submit" class="btn btn-gradient-dark btn-sm float-end" value="Next" onclick="getNext(<?= $key ?>,<?= $key + 1 ?>)">
                                            <!--   <button type="submit" class="btn btn-primary btn-sm float-end">Complete</button> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php  } ?>


                <?php if (number_format(($percentile1), 2) == 100.00) { ?>
                    <div class="pt-2 float-end">
                        <a href="<?= base_url("Qualitative_assessment/completeAssessment"); ?>/<?= $id; ?>" class='btn btn-primary' onclick="return confirm('Are you sure')">Complete
                            Assessment</a>
                    </div>

                <?php
                } else { ?>
                    <div class="pt-2 float-end d-none" id="showBtnAssess">
                        <a href="<?= base_url("Qualitative_assessment/completeAssessment"); ?>/<?= $id; ?>" class='btn btn-primary' onclick="return confirm('Are you sure')">Complete
                            Assessment</a>
                    </div>
                <?php
                }
                ?>

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
            <!-- <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false"> -->
            <form method='post' action='<?= base_url('Controlwork/addAction'); ?>'>
                <div class="modal-header align-items-center mb-1">
                    <h5 class="modal-title">Add Task</h5>
                    <div class="todo-item-action d-flex align-items-center justify-content-between ms-auto">
                        <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal" stroke-width="3"></i>
                    </div>
                </div>
                <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                    <div class="action-tags">
                        <div class="mb-1">
                            <input type="hidden" value='<?= $a_id; ?>' name='a_id'>
                            <input type="hidden" value='<?= $indicator_id; ?>' name='i_id'>
                            <input type="hidden" value='' name='q_id' class='q_id'>
                            <label for="todoTitleAdd" class="form-label">Title</label>
                            <input type="text" id="todoTitleAdd" name="todoTitleAdd" class="new-todo-item-title form-control" placeholder="Title" />
                        </div>
                        <div class="mb-1 position-relative">
                            <label for="task-assigned" class="form-label d-block">Assignee</label>
                            <select class="select2 form-select" id="task-assigned" name="task-assigned[]" multiple="multiple">
                                <?php
                                foreach ($employee_details as $ed) {
                                ?>
                                    <option value="<?= $ed['id']; ?>"><?= $ed['supplier_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="task-due-date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="task-due-date" name="task-due-date" />
                            <!-- <input type="date" class="form-control task-due-date" id="task-due-date"
                                                            name="task-due-date" /> -->
                        </div>
                        <div class="mb-1" style="display:none;">
                            <label for="task-tag" class="form-label d-block">Tag</label>
                            <select class="form-select task-tag" id="task-tag" name="task-tag[]" multiple="multiple">
                                <option value="NULL">Select tag</option>
                                <option value="Risks">Risks</option>
                                <option value="Opportunities">Opportunities</option>
                                <option value="Hotspots">Hotspots</option>
                                <option value="Issues">Issues</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Description</label>
                            <!-- <input type="text" name='description' class='form-control' placeholder='Enter description'> -->
                            <textarea name="description" id="" cols="" rows="" class="form-control"></textarea>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Priority </label>
                            <select class="form-control" name="priority">
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
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Yes" checked />
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline mt-0">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="No" />
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-1">
                        <button type="submit" class="btn btn-primary  add-todo-item me-1">Add</button>
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
            <!-- <div class="card">
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
                                                                    <img
                                                                    class="me-1"
                                                                    src="<?php echo base_url('public/brand/assets/app-assets/images/icons/file-icons/pdf.png') ?>"
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
                                                                        <img src="<?php echo base_url('public/brand/assets/app-assets/images/avatars/12-small.png') ?>" alt="avatar" height="38" width="38" />
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
                                                                            <img src="<?php echo base_url('public/brand/assets/app-assets/images/avatars/1-small.png') ?>" alt="Avatar" height="32" width="32" />
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
                                                                            src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-5.jpg') ?>"
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
                                                                            src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-7.jpg') ?>"
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
                                                                            src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-10.jpg') ?>"
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
                                            </div> -->
        </div>
    </div>
</div>

<!-- Right Sidebar ends -->
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/app-todo.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('public/custom-board/image-sketch.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/katex.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/highlight.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/editors/quill/quill.min.js') ?>"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
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
<!-- <script>
                                ClassicEditor
                                .create(document.querySelector('#editor'))
                                .then(editor => {
                                console.log(editor);
                                })
                                .catch(error => {
                                console.error(error);
                                });
                                </script> -->

<script>
    $(document).ready(function() {
        $('.show-file').on('click', function() {
            // alert('hjhjuh');
            $(".view-image").hide();
            $('.view-input').show();
        });
        $('.show-image').on('click', function() {
            // alert('hjhjuh');
            $(".view-image").show();
            $('.view-input').hide();
        });
    });
</script>
<script>
    function documentuplod(that) {
        const first = that.split(' ')[0]
        const second = that.split(' ')[1]
        const document_needed = that.split(' ')[2]

        if (first == '1') {
            $('.mediadocument' + second).show();
            $('.document' + second).hide();
            if (document_needed == '1') {
                $("#file" + second).prop('required', true);
                $("#get" + second).prop('required', false);

            }

        } else {

            if (document_needed == '1') {
                $("#get" + second).prop('required', true);
                $("#file" + second).prop('required', false);
            }

            $('.mediadocument' + second).hide();
            $('.document' + second).show();

        }

    }
</script>
<script>
    function documentconnect(that) {

        const first = that.split(' ')[0]
        const second = that.split(' ')[1]
        document.getElementById('file' + second).first;
        $("#get" + second).val(first);

    }
</script>


<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('.okoko').on('submit', function(e) {

            //  var id  = $(".question_id").val();    
            // alert(id);
            $('.uploadBtn').val('Uploading ...');
            $('.uploadBtn').prop('Disabled');
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('Controlwork/addAnswerQuestion'); ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(res) {

                    var valg = res.error;
                    if (valg) {
                        toastr.error(valg, "Warning", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        });
                    }
                    // alert('ok');
                    // topFunction();
                    //  console.log(res.success);
                    if (res.success == true) {
                        // $('#alertMsg').html(res.msg);
                        $('#tot_attempt_id').html(res.total_A);
                        $('#percentiles1').html(res.percentile);

                        // $('#alertMessage').show();
                        toastr.success("Your answer has been saved successfully", "Success", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        });
                        $('#tot_attempt_id').html(res.total_A);
                        $('#percentiles1').html(res.percentile);
                    } else if (res.success == false) {
                        $('#alertMsg2').html(res.msg);
                        $('#alertMessage2').show();
                    }
                    //  setTimeout(function () {
                    //      $('#alertMsg').html('');
                    //      $('#alertMessage').hide();
                    //  }, 4000);
                    $('.uploadBtn').val('submit');
                    $('.uploadBtn').prop('Enabled');
                    // $('.hmmhmmhmm').load(location.href + " .hmmhmmhmm");
                    // document.getElementById("okoko").reset();
                }
            });
            // }
        });
    });
</script> -->
<script type="text/javascript">
    function submit_done(that, check_id) {
        $('.uploadBtn').val('Uploading ...');
        $('.uploadBtn').prop('Disabled');
        $.ajax({
            url: "<?= base_url('Qualitative_assessment/addAnswerQuestion'); ?>",
            method: "POST",
            data: new FormData(that),
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            success: function(res) {
                var valg = res.error;
                if (valg) {
                    toastr.error(valg, "Warning", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    });
                }
                // topFunction();
                if (res.success == true) {
                    toastr.success("Your answer has been saved successfully", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    });
                    // alert(check_id);
                    $('#check' + check_id).html('<i class="fa fa-check me-4"></i>');
                    $('#tot_attempt_id').html(res.total_A);
                    $('#percentiles1').html(res.percentile);
                    if (res.percentile == 100) {
                        $('#showBtnAssess').show();
                    }
                } else if (res.success == false) {
                    toastr.error("Your answer is not saved", "Failed", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    });
                }
                $('.uploadBtn').val('submit');
                $('.uploadBtn').prop('Enabled');
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.uuu').on('click', function(e) {
            e.preventDefault();

            var y = $("#latid").val();
            var z = $("#longid").val();
            $.ajax({
                url: "<?= base_url('Controlwork/location'); ?>",
                method: "POST",
                data: {
                    y: y,
                    z: z,
                },
                success: function(res) {

                }
            });

        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.signature').on('click', function(e) {
            e.preventDefault();

            var y = $("#sig-dataUrl").val();
            // alert(y);
            $.ajax({
                url: "<?= base_url('Controlwork/sign'); ?>",
                method: "POST",
                data: {
                    y: y,
                },
                success: function(res) {}
            });

        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.aaaaa').on('click', function(e) {
            e.preventDefault();

            var file = $("#upload").val();
            $.ajax({
                url: "<?= base_url('Controlwork/annotation_image'); ?>",
                method: "POST",
                data: {
                    file: file,
                },
                success: function(res) {}
            });

        });
    });
</script>
<script>
    (function() {
        window.requestAnimFrame = (function(callback) {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimaitonFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                };
        })();
        var canvas = document.getElementById("sig-canvas");
        var ctx = canvas.getContext("2d");
        ctx.strokeStyle = "#222222";
        ctx.lineWidth = 4;
        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;
        canvas.addEventListener("mousedown", function(e) {
            drawing = true;
            lastPos = getMousePos(canvas, e);
        }, false);
        canvas.addEventListener("mouseup", function(e) {
            drawing = false;
        }, false);
        canvas.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas, e);
        }, false);
        // Add touch event support for mobile
        canvas.addEventListener("touchstart", function(e) {}, false);
        canvas.addEventListener("touchmove", function(e) {
            var touch = e.touches[0];
            var me = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(me);
        }, false);
        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var me = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(me);
        }, false);
        canvas.addEventListener("touchend", function(e) {
            var me = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(me);
        }, false);

        function getMousePos(canvasDom, mouseEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: mouseEvent.clientX - rect.left,
                y: mouseEvent.clientY - rect.top
            }
        }

        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            }
        }

        function renderCanvas() {
            if (drawing) {
                ctx.moveTo(lastPos.x, lastPos.y);
                ctx.lineTo(mousePos.x, mousePos.y);
                ctx.stroke();
                lastPos = mousePos;
            }
        }
        // Prevent scrolling when touching the canvas
        document.body.addEventListener("touchstart", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        document.body.addEventListener("touchend", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        document.body.addEventListener("touchmove", function(e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        (function drawLoop() {
            requestAnimFrame(drawLoop);
            renderCanvas();
        })();

        function clearCanvas() {
            canvas.width = canvas.width;
        }
        // Set up the UI
        var sigText = document.getElementById("sig-dataUrl");
        var sigImage = document.getElementById("sig-image");
        var clearBtn = document.getElementById("sig-clearBtn");
        var submitBtn = document.getElementById("sig-submitBtn");
        clearBtn.addEventListener("click", function(e) {
            clearCanvas();
            sigText.innerHTML = "Data URL for your signature will go here!";
            sigImage.setAttribute("src", "");
        }, false);
        submitBtn.addEventListener("click", function(e) {
            var dataUrl = canvas.toDataURL();
            sigText.innerHTML = dataUrl;
            sigImage.setAttribute("src", dataUrl);
        }, false);
    })();
</script>
<script>
    function getNext(id, next) {
        $('#accordionMargin' + id).removeClass('show');
        $('#accordionMargin' + next).addClass('collapse show');
    }
</script>
<!-- <script type="text/javascript">
    function topFunction() {
        document.body.scrollTop = 10;
        document.documentElement.scrollTop = 10;
    }
</script> -->
<script>
    $(document).ready(function() {
        $(".action_btn").on('click', function() {
            var id = $(this).attr("data-id");
            $('.q_id').val(id);
        });
    });
</script>
<?= $this->endSection() ?>