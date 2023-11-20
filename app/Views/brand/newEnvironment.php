<?php

use App\Models\SupplierModel;
use App\Models\MasterSubDis;
?>
<?= $this->extend("brand/layout/master-page.php") ?>
<?= $this->section("style") ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
                                                    "public/brand/assets/app-assets/vendors/css/vendors.min.css"
                                                ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
                                                    "public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css"
                                                ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
                                                    "public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css"
                                                ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
                                                    "public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css"
                                                ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
                                                    "public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css"
                                                ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
                                                    "public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css"
                                                ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(
                                                    "public/brand/assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css"
                                                ); ?>">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<style type="text/css">
    #loading {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0.7;
        background-color: #fff;
        z-index: 99;
    }

    #loading-image {
        z-index: 100;
    }

    .nav-tabs .nav-link-tabs.active {
        background: #4b4b4b !important;
    }

    .nav-tabs .nav-link-tabs {
        background: #82868B !important;
    }

    .modal-dialog.sidebar-lg.sidebar-extra-lg {
        width: 35rem !important;
    }
</style>

<div id="loading" class="loadingData" style="display:none;">
    <img id="loading-image" src="<?php echo base_url('public/loading.gif') ?>" alt="Loading..." />
</div>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style>
    .card-body.chart-demo {
        padding: 125px;
        padding-top: 0px;
        padding-bottom: 5px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="app-content content">
    <div class="text-end mb-1 mt-2 back_button">
        <!-- <a class="btn btn-primary waves-effect" href="<?php echo base_url() ?>/Environment">Back</a> -->
    </div>
    <div class="content-wrapper">
        <div class="category_page_header mb-2">
            <div class="cph_inner">
                <div class="cph_left">
                    <img src="https://positiivplus.io/public/uploads/assessment/1629138611_2179817bd862b8f2b7ae.png">
                </div>
                <div class="cph_right">
                    <div class="cph_title">Environment - <?= $name ?></div>
                    <div class="pe-5 pb-2">
                        <?php
                        foreach ($indicator as $lidis) {
                            if ($lidis["indicator_name"] == $name) { ?>
                                <?= $lidis["description"]; ?>
                        <?php }
                        } ?>

                    </div>
                    <div class="cph_status">

                        <?php foreach ($indicator_sdg as $key => $indicator_sdg_id) { ?>
                            <?php foreach ($sdg as $key => $sdgid) {
                                // print_r($sdgid['id']);
                                if ($sdgid['id'] == $indicator_sdg_id['sdg_id']) {   ?>

                                    <div class="cph_status_right d-flex ms-0">
                                        <div class="cph_score_icon me-1">
                                            <img src="<?= base_url() ?>/public/uploads/sdg/<?= $sdgid['image'] ?>" style="width: 39px;">
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        } ?>

                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#monthly_data_id').select2({
                allowClear: true,
            })
        </script>
        <?php
        $session = session();
        if ($session->get('finTear')) {
            $f_year = $session->get('finTear');
        }
        if ($session->get('fin_yeardate')) {
            $fin_yeardate = $session->get('fin_yeardate');
        }
        $mindate = $fin_yeardate . "-04-01";
        $maxdate = ++$fin_yeardate . "-03-31";
        if ($session->get('success')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionOne').addClass("show");
                    toastr.success("👋 Record succesfully saved", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })
                });
            </script>
        <?php
        }
        if ($session->get('delete4')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionOne').addClass("show");
                    toastr.error("👋 Record delete succesfully", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })
                });
            </script>
        <?php
        }
        if ($session->get('success_two')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionTwo').addClass("show");
                    toastr.success("👋 Record succesfully saved", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })

                });
            </script>
        <?php
        }
        if ($session->get('delete1')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionTwo').addClass("show");
                    toastr.error("👋 Record delete succesfully ", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })

                });
            </script>
        <?php
        }
        if ($session->get('success_three')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionThree').addClass("show");
                    toastr.success("👋 Record succesfully saved", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })

                });
            </script>
        <?php
        }
        if ($session->get('delete2')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionThree').addClass("show");
                    toastr.error("👋 Record delete succesfully", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })

                });
            </script>
        <?php
        }
        if ($session->get('success_fourth')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionFour').addClass("show");
                    toastr.success("👋 Record succesfully saved", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })

                });
            </script>
        <?php
        }
        if ($session->get('delete3')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionFour').addClass("show");
                    toastr.success("👋 Record delete succesfully", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })

                });
            </script>
        <?php
        }
        if ($session->get('success_five')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionFive').addClass("show");
                    toastr.success("👋 Record succesfully saved", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })

                });
            </script>
        <?php
        }
        if ($session->get('success_six')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionSix').addClass("show");
                    toastr.success("👋 Record succesfully saved", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })

                });
            </script>
        <?php
        }
        ?>


        <?php
        $session = session();

        if ($session->get('error')) { ?>
            <?php $data_session =  $session->get('error'); ?>

            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");
                    $('#accordionOne').addClass("show");
                    var name = '<?php echo $data_session; ?>';

                    toastr.error(name, "Warning", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    });
                });
            </script>

        <?php
        } ?>

        <?php if ($activeee) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').removeClass("active");
                    $('#profile-fill').removeClass("active");
                    $('#messages-tab-fill').addClass("active");
                    $('#messages-fill').addClass("active");

                });
            </script>
        <?php
        } else { ?>
            <script>
                $(document).ready(function() {
                    $('#messages-tab-fill').removeClass("active");
                    $('#messages-fill').removeClass("active");
                    $('#profile-tab-fill').addClass("active");
                    $('#profile-fill').addClass("active");


                });
            </script>
        <?php } ?>
        <?php if ($session->get('request')) { ?>
            <script>
                $(document).ready(function() {
                    $('#profile-tab-fill').removeClass("active");
                    $('#profile-fill').removeClass("active");
                    $('#settings-tab-fill').addClass("active");
                    $('#settings-fill').addClass("active");


                    toastr.error("👋 request  delete", "Success", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0,
                    })

                });
            </script>
        <?php
        }
        ?>
        <section id="nav-filled">
            <div class="row match-height">
                <!-- Filled Tabs starts -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <!-- <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">

                                <li class="nav-item">
                                   
                                    <?php if ($ses == 14) {
                                        $disable = "style='pointer-events: none'";
                                    }  ?>
                                    <a class="nav-link" <?= $disable ?> id="profile-tab-fill" data-bs-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="true" onclick="disclosurereload()">Disclosure </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" <?= $disable ?> id="messages-tab-fill" data-bs-toggle="tab" href="#messages-fill" role="tab" aria-controls="messages-fill" aria-selected="false" onclick="Kpisreload(<?php echo $Indicator_id; ?>)">KPIS</a>
                                </li>
                                <?php if (!($ses == 11)) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="settings-tab-fill" data-bs-toggle="tab" href="#settings-fill" role="tab" aria-controls="settings-fill" aria-selected="false" onclick="requestreload()">Request <span style="background: white; color: black; position: relative; left: 10pc;">
                                            <?php if (!$request_count == '0') {
                                                echo $request_count;
                                            } ?></span></a>
                                </li>
                                        <?php
                                    } ?>

                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab-fill" data-bs-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true" onclick="Historyreload(<?php echo $Indicator_id; ?>)">History</a>
                                </li>
                            </ul> -->
                            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">

                                <?php if ($ses != 14) { ?>

                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab-fill" data-bs-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="false" onclick="disclosurereload()">Disclosure </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="messages-tab-fill" data-bs-toggle="tab" href="#messages-fill" role="tab" aria-controls="messages-fill" aria-selected="false" onclick="Kpisreload(<?php echo $Indicator_id; ?>)">KPIS</a>
                                    </li> -->

                                    <li class="nav-item">
                                        <a class="nav-link" id="settings-tab-fill" data-bs-toggle="tab" href="#settings-fill" role="tab" aria-controls="settings-fill" aria-selected="false" onclick="requestreload()">Request <span style="background: white; color: black; position: relative; left: 10pc;">
                                            </span></a>
                                    </li>

                                <?php }
                                ?>

                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab-fill" data-bs-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="false" onclick="Historyreload(<?php echo $Indicator_id; ?>)">History</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content pt-1">
                                <!-- <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
                                                   <?php if ($list) { ?>
                                                   <p>
                                                      Category Name : <b><?= $list[0]["indicator_category_name"] ?></b>
                                                   </p>
                                                   <p>
                                                      Image : <img src="<?php echo base_url() .
                                                                            "/public/uploads/sdg/" .
                                                                            $list[0]["image"]; ?>" style="width: 70px;">
                                                   </p>
                                                   <p><b>Description</b>
                                                      <?= $list[0]["description"] ?>
                                                   </p>
                                                   <p><b>SDG</b>
                                                      <ul>
                                                         <?php
                                                            $sdg = $list[0]["sdg"];
                                                            foreach ($sdg as $key => $gds) {
                                                                echo "<li>" . $gds["sdg_name"] . "</li>";
                                                            }
                                                            ?>
                                                      </p>
                                                   </ul>
                                                   <?php } else {
                                                        echo "No SDG Connected";
                                                    } ?>
                                                </div> -->
                                <!--   Emissions Div start -->

                                <!--   Emissions Div end -->
                                <?php if ($name) {
                                ?>
                                    <!-- delete modal history-->
                                    <div class="modal fade text-start" id="docDeletePopuphistory" tabindex="-1" aria-labelledby="myModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel2">Delete Record</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form" action="<?php echo base_url() ?>/Environment/record_delete" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <input type="hidden" id="record_idd" name="record_id" />
                                                            <input type="hidden" id="valueHistory" name="" />
                                                            <input type="hidden" id="history_dataId" name="" />
                                                            <p>Are you sure you want to delete this Record ?</p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary me-1 waves-effect waves-float waves-light" onclick="environment_delete(this);">Submit</button>
                                                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end delete modal historry -->
                                    <!-- verfiy model -->
                                    <div class="modal fade" id="verifyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Verify</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="verifyid">
                                                    <input type="hidden" id="vindicatorid">
                                                    <input type="hidden" id="vfinancialyear">
                                                    <div class="col-md-12">
                                                        <label for="">Comment</label>
                                                    </div>
                                                    <div class="col-md-12 mt-1 mb-1" style="text-align: center;">
                                                        <textarea name="rejectta" id="verifyta" cols="45" rows="2" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" id="verifybutton" onclick="verifybtn()" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="comment_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table width="100%" class="table table-border">
                                                        <thead>
                                                            <tr>
                                                                <th>S no.</th>
                                                                <th>Entry Name</th>
                                                                <th>Month</th>
                                                                <th>Comment</th>
                                                                <th>Current Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="comment_append">

                                                        </tbody>
                                                    </table>
                                                    <!-- <div class="row">
                    <div class="col-md-6"><input type="text" id="comment_entryname" readonly></div>
                    <div class="col-md-6"><input type="text" id="comment_month" readonly></div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                </div> -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reject</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="rejectid">
                                                    <input type="hidden" id="indicatorid">
                                                    <input type="hidden" id="financialyear">
                                                    <div class="col-md-12">
                                                        <label for="">Comment</label>
                                                    </div>
                                                    <div class="col-md-12 mt-1 mb-1" style="text-align: center;">
                                                        <textarea name="rejectta" id="rejectta" cols="45" rows="2" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" id="rejectbutton" onclick="rejectbtn()" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end verify -->

                                    <div class="modal fade" id="modal-sub-disclosure" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div id="labelsubdisclosure"></div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!--   Energy Div start -->
                                    <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">
                                        <section>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form method="post" id="klpj" action="<?php echo base_url() ?>/Environment/newenvironment/<?php echo $Indicator_id; ?>" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <label class="form-label fs-6 fw-bold" style="padding-top:6px;" for="select2-basic">Select Financial year </label>
                                                            </div>
                                                            <!-- <?php print_r($fin_yeardate); ?> -->
                                                            <div class="col-md-5">
                                                                <select class="form-control" name="financialyear">
                                                                    <option value="">Select Financial year</option>

                                                                    <option value="2022" <?php if ($f_year == '2022') {
                                                                                                echo "selected";
                                                                                            }; ?>>FY 2022 - 2023</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2" style="padding-top: 6px;">
                                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                            <form method="post" action="<?php echo base_url() ?>/Environment/standard/<?php echo $Indicator_id; ?>" enctype="multipart/form-data">
                                                               <div class="row">
                                                                  <div class="col-md-4 text-end">
                                                                     <label class="form-label fs-6 fw-bold" style="padding-top:6px;"for="select2-basic">Select Standard</label>
                                                                  </div>
                                                                  <div class="col-md-5">
                                                                     <input type="hidden" name="financialyear" value="<?php echo $f_year; ?>">
                                                                     <select class="form-control" onchange="standard(this);" name="id">
                                                                        <option value="">Select Standard</option>
                                                                        <?php foreach ($standard as $standarad_id) { ?>
                                                                        <option value="<?php echo $standarad_id['id']; ?>" <?php if ($filter_id == $standarad_id['id']) {
                                                                                                                                echo 'selected';
                                                                                                                            } ?>><?php echo $standarad_id['standard_name']; ?>
                                                                        </option>
                                                                        <?php
                                                                        } ?>
                                                                        
                                                                     </select>
                                                                  </div>
                                                                  <div class="col-md-2" style="padding-top: 6px;">
                                                                     <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                                                                  </div>
                                                               </div>
                                                            </form>
                                                         </div> -->
                                            </div>
                                        </section>
                                        <!-- connnet model start -->
                                        <div class="modal fade" id="connectModel" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Connect</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-dark">
                                                        <form method="post" id="myCompanyForm" action="<?php echo base_url() ?>/Environment/connect" enctype="multipart/form-data">
                                                            <input type="hidden" name="indicator" value="<?php echo $Indicator_id ?>">
                                                            <input type="hidden" name="task_title" id="connect_task">
                                                            <input type="hidden" name="classi" id="connect_classi">
                                                            <input type="hidden" name="sub_disclosure" id="connect_sub_dis">

                                                            <input type="hidden" name="disclosure_name" id="connect_dis_id">
                                                            <div class="row">
                                                                <div class="col-md-12 text-start mb-1">
                                                                    <label class="form-label fs-6" for="basicInput">Site</label>
                                                                    <select class="select2 form-select" name="site[]" required multiple>
                                                                        <option value="">Select Site</option>

                                                                        <?php foreach ($sensor_ele as $key => $valuee) {
                                                                        ?>
                                                                            <?php foreach ($site as $key => $site_value) {
                                                                                if ($site_value['id'] == $valuee['subboundary_id']) { ?>

                                                                                    <option value="<?php echo $site_value['id'] . "," . $valuee['id'] ?>"><?php echo $site_value['cp_name']; ?></option>
                                                                        <?php

                                                                                }
                                                                            }
                                                                        } ?>
                                                                    </select>
                                                                </div>



                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                                <button type="submit" class="btn btn-dark  waves-effect">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="card-body">
                                                        <table class="table" id="mytable">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 18.1719px;">S.no</th>
                                                                    <th style="width: 18.1719px;">Site name</th>
                                                                    <th style="width: 18.1719px;">Status</th>
                                                                    <th style="width: 18.1719px;">Time</th>
                                                                    <th style="width: 18.1719px;">Delete</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $key = 0;
                                                                foreach ($SensorData as $key => $SensorValue) { ?>
                                                                    <tr>
                                                                        <td><?php echo ++$key; ?></td>
                                                                        <td><?php foreach ($site as $key => $site_value) {
                                                                                if ($site_value['id'] == $SensorValue['subboundary_id']) {
                                                                                    echo $site_value['cp_name'];
                                                                                }
                                                                            }
                                                                            ?></td>
                                                                        <td><?php if ($SensorValue['current_status'] == 3) {
                                                                                echo 'Connected';
                                                                            }
                                                                            if ($SensorValue['current_status'] == 2) {
                                                                                echo 'Awaited';
                                                                            } ?></td>
                                                                        <td><?php echo $SensorValue['energy_date']; ?></td>
                                                                        <td onclick="SensorDelete(<?php echo $SensorValue['id'] ?>);">Delete</td>
                                                                    </tr>
                                                                <?php
                                                                } ?>
                                                            </tbody>
                                                        </table>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- delete modal -->
                                        <div class="modal fade text-start" id="docDeletePopup" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel1">Delete record</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form" action="<?php echo base_url() ?>/Environment/energy_bulk_delete" method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <input type="hidden" id="record_id" name="record_id" />
                                                                <input type="hidden" id="dataId" name="" />
                                                                <input type="hidden" id="value" name="" />
                                                                <input type="hidden" id="SubDisclosure_delete" name="" />
                                                                <p>Are you sure you want to delete this Record ?</p>
                                                            </div>
                                                        </form>
                                                        <div class="modal-footer">
                                                            <button type="button" onclick="environment_delete_bulk(this)" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end delete modal -->
                                        <!--  <p id="sas"><?= $f_year ?></p> -->
                                        <!-- connect model end -->
                                        <?php if ($f_year) { ?>
                                            <input id="supid" type="hidden" value="<?= $ses ?>">



                                            <?php if ($ses != 14) { ?>
                                                <?php foreach ($disclosure_show as $key => $disclosure_showi) {
                                                    foreach ($disclosure_id_show as $key => $disclosure_i) {
                                                        if ($disclosure_showi['id'] == $disclosure_i['disclosure_id']) {
                                                            // print_r($disclosure_showi['id']);
                                                ?>


                                                            <div class="col-sm-12">
                                                                <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                                                                    <div class="accordion" id="accordionExample">
                                                                        <!-- accordion 1 -->
                                                                        <div class="accordion-item" id="t1">

                                                                            <h2 class="accordion-header" id="headingOne">
                                                                                <button class="accordion-button mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#accordionOne<?= $disclosure_showi['id']; ?>" aria-expanded="false" aria-controls="accordionOne<?= $disclosure_showi['id']; ?>">
                                                                                    <?php echo $disclosure_showi['disclosure_name'];  ?>

                                                                                    <span class="ms-auto me-2"><i class="fa-solid fa-circle-exclamation" data-bs-toggle="modal" data-bs-target="#exampleModal_1"></i></span>
                                                                                </button>
                                                                            </h2>
                                                                            <!-- modal 1 -->
                                                                            <div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header bg-white pb-0">
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body text-dark ">
                                                                                            <p class="text-dark">Direct (Scope 1) GHG emissions can come from the following sources owned or controlled by an organization:</p>
                                                                                            <ul>
                                                                                                <li>Generation of electricity, heating, cooling and steam: these emissions result from the combustion of fuels in stationary sources, such as boilers, furnaces, and turbines – and from other combustion processes such as flaring.</li>
                                                                                                <li>Physical or chemical processing: most of these emissions result from the manufacturing orprocessing of chemicals and materials, such as cement, steel, aluminium, ammonia, and waste processing.</li>
                                                                                                <li>Transportation of materials, products, waste, workers, and passengers: these emissions result from the combustion of fuels in mobile combustion sources owned or controlled by the organization, such as trucks, trains, ships, aeroplanes, buses, and cars.</li>
                                                                                                <li>Fugitive emissions: these are emissions that are not physically controlled but result from intentional or unintentional releases of GHGs. These can include equipment leaks from joints, seals, packing, and gaskets; methane emissions (e.g., from coal mines) and venting; HFC emissions from refrigeration and air conditioning equipment; and methane leakages (e.g., from gas transport).</li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- end modal 1 -->


                                                                            <div id="accordionOne<?= $disclosure_showi['id']; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                                <!-- question 1 -->

                                                                                <?php
                                                                                foreach ($sub_disclosure_show as $key => $sub_disclosure_showid) {
                                                                                    foreach ($subdisclosure_show as $key => $subdisclosure_showid) {
                                                                                        if ($subdisclosure_showid['id'] == $sub_disclosure_showid['sub_disclosure_id']) {

                                                                                            if ($sub_disclosure_showid['disclosure_id'] == $disclosure_showi['id']) {
                                                                                ?>

                                                                                                <div class="accordion-body p-0 bg-light">
                                                                                                    <div class="total_fuel bg-dark text-white">
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-10">
                                                                                                                <p class="mb-0 d-inline-block "><?php echo $subdisclosure_showid['sub_disclosure']; ?></p>
                                                                                                            </div>
                                                                                                            <div class="col-md-2 text-end">

                                                                                                                <?php if (!$ses == 11) { ?>
                                                                                                                    <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" data-subDisclosure_id="<?= $sub_disclosure_showid['sub_disclosure_id']; ?>" data-Disclosure_id="<?= $disclosure_showi['id']; ?>" data-task_title="<?= $subdisclosure_showid['sub_disclosure']; ?>" onclick="AssginModal(this)"><i class="fa-solid fa-user-plus"></i>
                                                                                                                    </button>
                                                                                                                <?php
                                                                                                                } ?>

                                                                                                                <?php if ($subdisclosure_showid['id'] == '29') { ?>
                                                                                                                    <button class="btn btn-primary btn-icon waves-effect waves-float waves-light rounded-circle" data-subDisclosure_id="<?= $sub_disclosure_showid['sub_disclosure_id']; ?>" data-Disclosure_id="<?= $disclosure_showi['id']; ?>" data-task_title="<?= $subdisclosure_showid['sub_disclosure']; ?>" onclick="ConnectModal(this)"><i class="fa-solid fa-link"></i>
                                                                                                                    </button>
                                                                                                                <?php
                                                                                                                } ?>
                                                                                                                <div class="modal-dialog modal-lg">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- 1st part -->




                                                                                                <?php foreach ($all_subdisclosure as $key => $all_subdisclosure_id) {
                                                                                                    if ($all_subdisclosure_id['sub_disclosure_id'] == $subdisclosure_showid['id']) {
                                                                                                ?>

                                                                                                        <div class="mt-2 pb-1">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-3">
                                                                                                                    <!--  <label class="form-label fs-6" for="select2-basic">Source list</label> -->
                                                                                                                    <p class="pt-1"><?php echo $all_subdisclosure_id['title']; ?></p>
                                                                                                                </div>
                                                                                                                <?php $type_option = json_decode($all_subdisclosure_id['type_option']);
                                                                                                                $answer_option = json_decode($all_subdisclosure_id['answer_option']);


                                                                                                                if ($type_option[0] == 1 || $type_option[0] == 2) { ?>
                                                                                                                    <?php foreach ($type_option as $key1 => $type_option_show) {
                                                                                                                        foreach ($answer_option as $key2 => $answer_option_show) {

                                                                                                                    ?>
                                                                                                                            <?php if ($key1 == $key2) {
                                                                                                                                if ($type_option_show == '1' || $type_option_show == '2') { ?>
                                                                                                                                    <?php foreach ($option_answer as $option_answer_show) {
                                                                                                                                        if ($option_answer_show['id'] == $answer_option_show) {
                                                                                                                                            $optionAnswer = json_decode($option_answer_show['optionAnswer']);  ?>
                                                                                                                                            <input type="hidden" name="" id="multiselect">

                                                                                                                                            <?php $count = count($type_option);

                                                                                                                                            if ($count == '1') { ?>
                                                                                                                                                <div class="col-md-2">

                                                                                                                                                </div>
                                                                                                                                            <?php
                                                                                                                                            }
                                                                                                                                            ?>
                                                                                                                                            <div class="col-md-2">
                                                                                                                                                <label class="form-label fs-6" for="select2-basic"><?php if (str_word_count($option_answer_show['answer_name']) > 2) {
                                                                                                                                                                                                        echo substr_replace($option_answer_show['answer_name'], "...", 14);
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo $option_answer_show['answer_name'];
                                                                                                                                                                                                    } ?></label>
                                                                                                                                                <input type="hidden" class="rohitnochance<?= $all_subdisclosure_id['id'] . $all_subdisclosure_id['sub_disclosure_id'] ?>" value="<?= $option_answer_show['id'] ?>">
                                                                                                                                                <select class="form-control  listing<?= $all_subdisclosure_id['id'] . $all_subdisclosure_id['sub_disclosure_id'] ?>" id="energy_list<?= $option_answer_show['id'] ?>" name="list<?= $all_subdisclosure_id['id'] . $option_answer_show['id'] ?>[]" readonly="" onchange="multipleselect(value)">

                                                                                                                                                    <option>Select from list</option>
                                                                                                                                                    <?php foreach ($optionAnswer as $key => $optionAnswerShow) { ?>

                                                                                                                                                        <option value="<?php echo $optionAnswerShow; ?>"><?php echo $optionAnswerShow; ?></option>

                                                                                                                                                    <?php
                                                                                                                                                    } ?>
                                                                                                                                                </select>
                                                                                                                                            </div>
                                                                                                                            <?php
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            } ?>
                                                                                                                    <?php
                                                                                                                        }
                                                                                                                    } ?>
                                                                                                                    <div class="col-md-2">
                                                                                                                        <label class="form-label fs-6">Value</label>

                                                                                                                        <input type="number" id="vertical-landmark" class="form-control total_number" data-id="<?php echo $all_subdisclosure_id['id']; ?>" data-idd="<?php echo $all_subdisclosure_id['id']; ?>" data-sub="<?php echo $all_subdisclosure_id['sub_disclosure_id']; ?>" onclick="Valueclick(this);" placeholder="Value" readonly="">
                                                                                                                    </div>
                                                                                                                    <div class="col-md-1 p-0">
                                                                                                                        <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                                                                                        <input type="number" class="form-control total_number" placeholder="<?= $all_subdisclosure_id['unit_name'] ?>" readonly="">
                                                                                                                    </div>
                                                                                                                <?php
                                                                                                                } ?>

                                                                                                                <?php if ($type_option[0] == 4 || $type_option[0] == 3) { ?>
                                                                                                                    <div class="col-md-2">

                                                                                                                    </div>
                                                                                                                    <div class="col-md-2">

                                                                                                                    </div>
                                                                                                                    <div class="col-md-2">
                                                                                                                        <label class="form-label fs-6">Value</label>

                                                                                                                        <input type="number" id="vertical-landmark" class="form-control total_number" data-id="<?php echo $all_subdisclosure_id['id']; ?>" onclick="Valueclick(this);" placeholder="Value" readonly="">
                                                                                                                    </div>
                                                                                                                    <div class="col-md-1">
                                                                                                                        <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                                                                                        <input type="number" class="form-control total_number" placeholder="<?= $all_subdisclosure_id['unit_name'] ?>" readonly="">
                                                                                                                    </div>
                                                                                                                    <input type="hidden" class="form-control total_number_add_more<?= $all_subdisclosure_id['id']; ?>" value="<?= str_replace(' ', '', $swati); ?>" placeholder="<?= $all_subdisclosure_id['unit_name'] ?>" readonly="">
                                                                                                                    <input type="hidden" class="dynamicdata<?= $all_subdisclosure_id['id']; ?>" value="<?php echo $all_subdisclosure_id['id']; ?>">
                                                                                                                    <input type="hidden" class="dynamicdata3" value="<?php echo $all_subdisclosure_id['id']; ?>">
                                                                                                                    <input type="hidden" class="adynamic<?= $all_subdisclosure_id['id']; ?>" value="<?php echo $all_subdisclosure_id['title']; ?>">


                                                                                                                    <div class="kpkp<?= str_replace(' ', '', $all_subdisclosure_id['id']); ?>"></div>
                                                                                                                    <!-- <script type="text/javascript">
                                                                        
                                                                        var id =$('.dynamicdata<?= $all_subdisclosure_id['id']; ?>').val();
                                                                        var name =  $('.adynamic<?= $all_subdisclosure_id['id']; ?>').val();
                                                                        
                                                                        $.ajax({
                                                                        url : "<?php echo base_url() ?>/Environment/dynamicRecord/"+name,
                                                                        method: "GET",
                                                                        success: function(data) {
                                                                        $(".kpkp"+id).append(data);
                                                                        }
                                                                        
                                                                        })
                                                                        </script> -->
                                                                                                                <?php
                                                                                                                } ?>
                                                                                                                <?php if ($type_option[0] == '1' || $type_option[0] == '2') {
                                                                                                                    $swati = $all_subdisclosure_id['title'] . $all_subdisclosure_id["id"]; ?>
                                                                                                                    <div class="col-md-2 mt-2 lh">
                                                                                                                        <button type="button" class="btn btn-dark btn-sm  waves-effect" data-id="<?php echo $all_subdisclosure_id['id']; ?>" onclick="addSourceDiv(this)">
                                                                                                                            <input type="hidden" class="dynamicdata<?= $all_subdisclosure_id['id']; ?>" value="<?php echo $all_subdisclosure_id['id']; ?>">
                                                                                                                            <input type="hidden" class="dynamicdata3" value="<?php echo $all_subdisclosure_id['id']; ?>">
                                                                                                                            <input type="hidden" class="dynamic<?= $all_subdisclosure_id['title']; ?>" value="<?php echo $all_subdisclosure_id['title']; ?>">
                                                                                                                            <i class="fa fa-plus"></i>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <input type="hidden" class="form-control total_number_add_more<?= $all_subdisclosure_id['id']; ?>" value="<?= str_replace(' ', '', $swati); ?>" placeholder="<?= $all_subdisclosure_id['unit_name'] ?>" readonly="">

                                                                                                                    <div class="<?= str_replace(' ', '', $swati); ?>"></div>
                                                                                                                    <div class="kpkp<?= str_replace(' ', '', $all_subdisclosure_id['id']); ?>"></div>
                                                                                                                    <!-- <div class="subRecordShwow<?= str_replace(' ', '', $swati); ?>"></div> -->



                                                                                                                <?php
                                                                                                                } ?>
                                                                                                                <?php if ($type_option[0] == '') { ?>
                                                                                                                    <div class="col-md-2">

                                                                                                                    </div>
                                                                                                                    <div class="col-md-2">

                                                                                                                    </div>

                                                                                                                    <div class="col-md-2">
                                                                                                                        <label class="form-label fs-6">Value</label>
                                                                                                                        <input type="number" id="vertical-landmark" class="form-control SubtotalValue<?= $all_subdisclosure_id['sub_disclosure_id']; ?>" placeholder="Value" readonly="" value="">
                                                                                                                    </div>

                                                                                                                    <div class="col-md-1 p-0">
                                                                                                                        <label class="form-label fs-6" for="select2-basic">Unit</label>
                                                                                                                        <input type="number" class="form-control total_number" placeholder="<?= $all_subdisclosure_id['unit_name'] ?>" readonly="">
                                                                                                                    </div>
                                                                                                                <?php
                                                                                                                } ?>



                                                                                                                <?php if ($all_subdisclosure_id['total_value'] == '1') { ?>

                                                                                                                    <div class="container bg-light mt-3">

                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-7 mb-1 mt-1 text-dark">
                                                                                                                                <p class="float-end px-3 m-0" style="font-weight: bold;">Total</p>
                                                                                                                            </div>
                                                                                                                            <?php $db = \Config\Database::connect();
                                                                                                                            $session = session();
                                                                                                                            $supplier_info = $session->get('supplier_info');
                                                                                                                            $supplier_model = new SupplierModel();
                                                                                                                            if (session()->supplier_info['role'] == 0) {
                                                                                                                                $o_id = session()->supplier_info['supplier_id'];
                                                                                                                                $u_id = session()->supplier_info['supplier_id'];
                                                                                                                            } else {
                                                                                                                                $u_id = session()->supplier_info['supplier_id'];
                                                                                                                                $find = $supplier_model->where('id', $u_id)->first();
                                                                                                                                $o_id = $find['owner_id'];
                                                                                                                            }
                                                                                                                            $value_id = $all_subdisclosure_id['id'];

                                                                                                                            if (session()->supplier_info['role'] == 0) {
                                                                                                                                $energy_data = $db->query("SELECT sum(em.value) as data FROM `energy_managment_data` as em WHERE status =1 and (supplier_id = $u_id OR owner_id = $o_id) and data_id = $value_id ")->getResultArray();
                                                                                                                            } else {
                                                                                                                                $energy_data = $db->query("SELECT sum(em.value) as data FROM `energy_managment_data` as em WHERE status =1 and (supplier_id = $u_id) and data_id = $value_id ")->getResultArray();
                                                                                                                            } ?>
                                                                                                                            <?php

                                                                                                                            foreach ($energy_data as $clcula) {
                                                                                                                                $totValue = $clcula['data'];
                                                                                                                            }
                                                                                                                            // $sUserValue = 0;
                                                                                                                            // $subUserID = $db->query("SELECT id FROM `supplier` WHERE added_by = $u_id")->getResultArray();
                                                                                                                            // foreach($subUserID as $sud){
                                                                                                                            //     $suId = $sud['id'];
                                                                                                                            //     $subUserValue = $db->query("SELECT (su.value) FROM `energy_managment_data` as su WHERE status =1 and supplier_id = $suId and data_id = $value_id ")->getResultArray();
                                                                                                                            //     // $subUserValue = $db->query("SELECT sum(emd.value) as subValue FROM `energy_managment_data` as emd WHERE status =1 and supplier_id = 35 and data_id = $value_id and financial_year = $f_year")->getResultArray();
                                                                                                                            //     $sUserValue += $subUserValue[0]['value'];
                                                                                                                            //     // echo '<pre>'; print_r($subUserValue[0]['value']);
                                                                                                                            // }

                                                                                                                            // $pUser = $energy_data[0];
                                                                                                                            // // $sUser = $sUserValue[0];
                                                                                                                            // $totalValue = $pUser['data'] + $sUserValue;
                                                                                                                            ?>
                                                                                                                            <div class="col-md-2" style="margin-top: 5px;">
                                                                                                                                <input type="number" class="form-control" id="totalvalue<?= $all_subdisclosure_id['id']; ?>" placeholder="Value" value="<?= $totValue ?>" readonly="">
                                                                                                                            </div>
                                                                                                                            <div class="col-md-1 p-0" style="margin-top: 5px;">
                                                                                                                                <input type="number" class="form-control total_number" placeholder="<?= $all_subdisclosure_id['unit_name'] ?>" readonly="">
                                                                                                                            </div>
                                                                                                                            <!--  <div class="offset-md-10 col-md-2 admin_btn mt-1 mb-1">
                                                                                 <button type="button" class="btn  btn-secondary btn-sm  waves-effect">Reset</button>
                                                                                 <button type="button" class="btn btn-dark btn-sm  waves-effect">Save</button>
                                                                              </div> -->

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                <?php
                                                                                                                } ?>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                <?php
                                                                                                    }
                                                                                                } ?>


                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                } ?>

                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                        <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        ?>


                                    </div>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Assign task</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body text-dark">
                                                    <form method="post" action="<?php echo base_url() ?>/Environment/control_environment_submit" id="assignForm4" enctype="multipart/form-data">
                                                        <input type="hidden" name="indicator" value="<?= $Indicator_id; ?>">

                                                        <input type="hidden" name="task_title" id="task_title_id">
                                                        <input type="hidden" name="financial_year" value="<?= $f_year; ?>">
                                                        <input type="hidden" name="disclose_id" id="disclosure_id_data">
                                                        <input type="hidden" name="sub_disclosure" id="sub_disclosure_data_id">

                                                        <input type="hidden" name="disclosure_name">
                                                        <input type="hidden" name="assign_dis_id" value="1">
                                                        <div class="row">
                                                            <div class="col-md-6 text-start mb-1">
                                                                <label class="form-label fs-6" for="basicInput">Site</label>
                                                                <select class="select2 form-select" name="site[]" id="gop" required multiple>
                                                                    <!-- <option >Select Site</option> -->
                                                                    <?php foreach ($site as $key => $valuee) { ?>
                                                                        <option value="<?php echo $valuee['id']; ?>"><?php echo $valuee['cp_name']; ?></option>
                                                                    <?php

                                                                    } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 text-start mb-1">
                                                                <label class="form-label fs-6" for="basicInput">Assigned to</label>
                                                                <select class="select2 form-select" name="assign_to" required>
                                                                    <option>No data found</option>
                                                                    <?php if (!empty($employee_details)) {
                                                                        foreach ($employee_details as $empd) {

                                                                    ?>

                                                                            <option data-img_src="https://user.positiivplus.io/public/uploads/owner/john.jpg" value="<?php echo $empd['id'] ?>"><?php echo $empd['supplier_name'] ?>
                                                                                <?php
                                                                                if ($empd['id'] == $u_id) {
                                                                                    echo "(Self)";
                                                                                } ?>

                                                                            </option>
                                                                    <?php

                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-6 text-start mb-1">

                                                                <label for="exampleFormControlInput1" class="form-label">Frequency</label>

                                                                <select class="form-control" id="frequency_assign" name="frequency" required onchange="resetValue(value)">
                                                                    <option value="">Select from list</option>
                                                                    <option value="1">Monthly</option>
                                                                    <option value="3">Quarterly</option>
                                                                    <option value="6">Half yearly</option>
                                                                    <option value="12">Yearly</option>
                                                                </select>
                                                            </div>
                                                            <!-- rohittt -->
                                                            <div class="col-md-6 text-start mb-1">

                                                                <label for="exampleFormControlInput1" class="form-label ">Monthly</label>

                                                                <select class="form-control js-example-basic-single testbox_monthly" id="monthly_data_id" name="monthly_name[]" multiple required onchange="monthly(value)">
                                                                    <option>Select from list</option>
                                                                    <option value="4">April 2022</option>
                                                                    <option value="5">May 2022</option>
                                                                    <option value="6">June 2022</option>
                                                                    <option value="7">July 2022</option>
                                                                    <option value="8">August 2022</option>
                                                                    <option value="9">September 2022</option>
                                                                    <option value="10">October 2022</option>
                                                                    <option value="11">November 2022</option>
                                                                    <option value="12">December 2022</option>
                                                                    <option value="1">January 2023</option>
                                                                    <option value="2">February 2023</option>
                                                                    <option value="3">March 2023</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn  btn-secondary waves-effect">Reset</button>
                                                            <button type="submit" class="btn btn-dark  waves-effect" id="assignSubmit">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal modal-slide-in fade" id="add-value-sidebar-1" aria-hidden="true">
                                        <div class="modal-dialog sidebar-lg sidebar-extra-lg">
                                            <div class="modal-content p-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                                <ul class="nav nav-tabs mb-0" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link-tabs active text-white btn waves-effect waves-float waves-light rounded-0 active" style="width:18rem;" id="home-tab" data-bs-toggle="tab" href="#home_new" aria-controls="home" role="tab" aria-selected="true">Record</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link-tabs text-white btn waves-effect waves-float waves-light rounded-0" style="width:17rem;" id="profile-tab" data-bs-toggle="tab" href="#profile_new" aria-controls="profile" role="tab" aria-selected="false">Calculate</a></li>
                                                </ul>
                                                <div class="modal-body flex-grow-1 bg-light pt-1 overflow-auto">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="home_new" aria-labelledby="home-tab_1" role="tabpanel">
                                                            <form id="createFormSide" method="post" action="<?= base_url("Environment/create") ?>" enctype="multipart/form-data">
                                                                <input type="hidden" name="financial_year" value="<?php echo $f_year; ?>">
                                                                <!-- <h6 class="text-center">Monthly</h6> -->
                                                                <div class="row mb-1" id="date_option" style="display:none;">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Frequency</label>
                                                                        <!-- </div>
                                                                    <div class="col-md-4"> -->
                                                                        <select class="form-control form-control-sm" id="frequency_data_id_side" name="frequency" onchange="resetValueSide(value)">
                                                                            <option value="">Select from list</option>
                                                                            <option value="1">Monthly</option>
                                                                            <option value="3">Quarterly</option>
                                                                            <option value="6">Half yearly</option>
                                                                            <option value="12">Yearly</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleFormControlInput1" class="form-label">Monthly</label>
                                                                        <!-- </div>
                                                                    <div class="col-md-4"> -->
                                                                        <select class="form-control testbox js-example-basic-single" name="monthly_name[]" id="monthly_data_id_side" multiple onchange="sidebarmonthly(value)">
                                                                            <option>Select from list</option>

                                                                            <option value="4">April 2022</option>
                                                                            <option value="5">May 2022</option>
                                                                            <option value="6">June 2022</option>
                                                                            <option value="7">July 2022</option>
                                                                            <option value="8">August 2022</option>
                                                                            <option value="9">September 2022</option>
                                                                            <option value="10">October 2022</option>
                                                                            <option value="11">November 2022</option>
                                                                            <option value="12">December 2022</option>
                                                                            <option value="1">January 2023</option>
                                                                            <option value="2">February 2023</option>
                                                                            <option value="3">March 2023</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-1" id="boundary_show" style="display:none;">
                                                                    <div class="col-md-2">
                                                                        <label for="exampleFormControlInput1" class="form-label ">Boundary</label>
                                                                    </div>

                                                                    <!--  <div class="col-md-4">
                                                                           <select class="form-control  form-control-sm" name="boundary" id="boundary_data_id"  onchange="showBoundary_sidebar(value);">
                                                                              <option value="">Select Boundary </option>
                                                                              <?php foreach ($boundary_item as $boundary_item_id) { ?>
                                                                              <option value="<?= $boundary_item_id['id'] ?>"><?= $boundary_item_id['item_name'] ?></option>
                                                                              <?php
                                                                                } ?>
                                                                           </select>
                                                                        </div>  -->

                                                                    <div class="col-md-4">
                                                                        <input id="sdidinp" type="hidden">
                                                                        <select class="form-control  form-control-sm" name="boundary" id="boundary_data_id" onchange="showBoundary_sidebar(value, $(this).parent().find('#sdidinp').val());">
                                                                            <option value="">Select Boundary </option>
                                                                            <option value="30" style="display:none;" id="30">Site</option>
                                                                            <option value="31" style="display:none;" id="31">Products</option>
                                                                            <option value="43" style="display:none;" id="43">Supplier</option>
                                                                            <option value="45" style="display:none;" id="45">Projects</option>

                                                                        </select>
                                                                    </div>

                                                                </div>

                                                                <div class="row mb-1" id="site_show" style="display:none;">
                                                                    <div class="col-md-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">Site</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <select class="form-control select2 subBoundarydata" id="subboundary_id" name="site[]" multiple onchange="subsite_data(value);">
                                                                            <option>Select Site</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-1" id="sub_site_id_show" style="display:none;">
                                                                    <div class="col-md-2">
                                                                        <label for="exampleFormControlInput1" class="form-label">Sub-Site</label>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <select class="form-control select2" id="sub_site_id" name="sub_site">
                                                                            <option>Select Sub-site</option>

                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div id="sidebardatadiv"></div>
                                                                <div>
                                                                    <div class="col-md-12 mb-2 text-end border-bottom">
                                                                        <button type="submit" class="btn btn-dark waves-effect mb-1">Record</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <div class="Guidance">
                                                                <h6 class="text-decoration-underline">Guidance:</h6>
                                                                <p id="Guideline"></p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="profile_new" aria-labelledby="profile-tab_1" role="tabpanel">

                                                            <div class="col-md-6">
                                                                <h6>Category:</h6>

                                                                <div class="pb-2">
                                                                    <select class="form-select calculation-Reset" aria-label="multiple select example" onchange="unit(value)">
                                                                        <option>select from list</option>
                                                                        <?php foreach ($category_units as $key => $subvalue) { ?>
                                                                            <option value="<?php echo $subvalue['id']; ?>"><?php echo $subvalue['category_name']; ?></option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <h6>Unit:</h6>

                                                                    <div class="pb-2">
                                                                        <select class="form-select calculation-Reset" aria-label="multiple select example" onchange="unitsubunit(value)" id="unit_id_data">
                                                                            <option>select from list</option>
                                                                            <?php foreach ($subunits as $key => $subvalue) { ?>
                                                                                <option value="<?php echo $subvalue['unit_id']; ?>"><?php echo $subvalue['unit_name']; ?></option>
                                                                            <?php
                                                                            } ?>


                                                                        </select>
                                                                    </div>
                                                                    <div class="form-floating mb-1">
                                                                        <input type="number" min="1" value="1" class="form-control  calculatecalculate calculation-Reset" onkeyup="calculate()">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <h6>Sub Unit:</h6>
                                                                    <div class="pb-2">
                                                                        <select class="form-control  form-control-sm calculation-Reset select2 convertdata" id="subUnitdata">
                                                                            <!-- <option value="2.7777777777777776e-7">KWh</option>
                                                                                    <option value="0.000001">MWH</option> -->

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-floating mb-1">
                                                                        <input type="" disabled="" class="form-control calculation-Reset" id="calculatedatashow">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <button class="btn btn-primary btn-sm waves-effect waves-float waves-light" onclick="copyvalue()">Copy</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end value Sidebar -->
                                <?php
                                } else {
                                ?>
                                    <!--   Energy Div end -->
                                    <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
                                        <p>
                                            Croissant jelly tootsie roll candy canes. Donut sugar plum jujubes sweet roll chocolate cake wafer. Tart
                                            caramels jujubes. Dragée tart oat cake. Fruitcake cheesecake danish. Danish topping candy jujubes. Candy
                                            canes candy canes lemon drops caramels tiramisu chocolate bar pie.
                                        </p>
                                        <p>
                                            Gummi bears tootsie roll cake wafer. Gummies powder apple pie bear claw. Caramels bear claw fruitcake
                                            topping lemon drops. Carrot cake macaroon ice cream liquorice donut soufflé. Gummi bears carrot cake
                                            toffee bonbon gingerbread lemon drops chocolate cake.
                                        </p>
                                    </div>
                                <?php
                                } ?>
                                <!-- kpis start -->


                                <?php if ($name == 'Emission') { ?>
                                    <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
                                        <div class="">
                                            <!-- charts part 1 -->
                                            <!-- <form method="post" action="<?php echo base_url('Environment/Energy_graph/17') ?>" enctype="multipart/form-data">
                                                                        <div class="row">
                                                                           <input type="hidden" name="financialyear" value="<?= $f_year; ?>">
                                                                           
                                                                           <div class="col-md-2">
                                                                              <label>Boundary</label>
                                                                              
                                                                              <select name="boundary" id="boundary" class="form-control select2" required="required"  onchange="showBoundary(this);">
                                                                                 
                                                                                 <option value="0">Select Boundaries </option>
                                                                                 <?php
                                                                                    if (!empty($boundary_item))
                                                                                        foreach ($boundary_item as $dd) { ?>
                                                                                 <option value="<?php echo $dd['id']; ?>"><?php echo $dd['item_name']; ?></option>
                                                                                 <?php } ?>
                                                                                 
                                                                              </select>
                                                                           </div>
                                                                           <div class="col-md-2">
                                                                              <label>Sub-Boundary</label>
                                                                              
                                                                              <select class="form-control select2" id="subboundary_id" name="sub_boundary" onchange="getQuestionByIndicatorAjax(this);">
                                                                                 <option value="0">Select  Sub Boundary</option>
                                                                              </select>
                                                                           </div>
                                                                           
                                                                           <div class="col-md-2 pt-2">
                                                                              <button class="btn btn-primary" type="submit">Submit</button>
                                                                           </div>
                                                                        </div>
                                                                     </form> -->


                                            <div class="row">

                                                <!-- <div class="col-md-5"> -->
                                                <!-- 1 -->
                                                <!-- <h5 class="fw-bolder mb-1 mt-1">Total Fuel Consumption in the Organisation.</h5>
                                                    <div class="shadow">
                                                        <div class="card">
                                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <h3 class="fw-bolder mb-75">
                                                                        <?php if (empty($total_fuel)) {
                                                                            echo '0';
                                                                        } else {
                                                                            echo $total_fuel;
                                                                        } ?> </h3>
                                                                    <span>Joules</span>
                                                                </div>
                                                                <div class="avatar bg-light-success p-50">
                                                                    <span class="avatar-content">
                                                                        <i data-feather="user-check" class="font-medium-4"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                <!-- 2 -->
                                                <!-- <h5 class="fw-bolder mb-1">Electricity consumption in the organization.</h5>
                                                    <div class="shadow">
                                                        <div class="card">
                                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <h3 class="fw-bolder mb-75"><?php echo $total_electicity_consume; ?> </h3>
                                                                    <span>Joules</span>
                                                                </div>
                                                                <div class="avatar bg-light-success p-50">
                                                                    <span class="avatar-content">
                                                                        <i data-feather="user-check" class="font-medium-4"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                <!-- 3 -->
                                                <!-- <h5 class="fw-bolder mb-1">Energy consumed through other sources in the organization.</h5>
                                                    <div class="shadow">
                                                        <div class="card">
                                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <h3 class="fw-bolder mb-75"><?php echo $total_consume_other; ?> </h3>
                                                                    <span>Joules</span>
                                                                </div>
                                                                <div class="avatar bg-light-success p-50">
                                                                    <span class="avatar-content">
                                                                        <i data-feather="user-check" class="font-medium-4"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                <!-- 3 -->
                                                <!-- 4 -->
                                                <!-- <h5 class="fw-bolder mb-1">Total energy consumption in the organization.</h5>
                                                    <div class="shadow">
                                                        <div class="card">
                                                            <div class="card-header flex-column align-items-start pb-0"> -->
                                                <!-- <h3 class="fw-bolder">Average Daily Sales</h3> -->
                                                <!-- <p class="card-text">Joules</p>
                                                                <h3 class="fw-bolder"><?php $B_C = $total_electicity_consume + $total_consume_other;
                                                                                        echo $total_fuel + $B_C;
                                                                                        ?> Joules</h3>
                                                            </div> -->
                                                <!-- <div id="gained-chart"></div> -->
                                                <!-- </div>
                                                    </div> -->
                                                <!-- </div> -->
                                                <!-- end column -->
                                                <!-- <div class="col-md-7">
                                                    <h5 class="mt-1 mb-1 fw-bolder">Total Fuel Consumption in the Organisation.</h5>
                                                    <div class="card">
                                                        <div class="shadow">
                                                            <div class="card-body">
                                                                <div id="mychart1"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- circle chart1 -->
                                                <!-- <div class="col-12">
                                                    <div class="card">
                                                        <div class="shadow">
                                                            <div class="
                                                                                    card-header
                                                                                    d-flex
                                                                                    flex-md-row flex-column
                                                                                    justify-content-md-between justify-content-start
                                                                                    align-items-md-center align-items-start
                                                                                    "> -->
                                                <!-- <h4 class="card-title">Data Science</h4> -->
                                                <!-- </div>
                                                            <div class="card-body">
                                                                <div id="column-chart-kips"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="col-md-12">
                                                    <h5 class="mt-1 mb-1 fw-bolder">Total Electricity Consumption in the Organisation.</h5>
                                                    <div class="card">
                                                        <div class="shadow">
                                                            <div class="card-body">
                                                                <div id="electricitychart"></div> 
                                                                <canvas class="Electricity-chart-final Electricity" data-height="450"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <!-- <div class="col-md-6">
                                                                           <h5 class="mb-1 fw-bolder">Energy consumption within the organization</h5>
                                                                           <div class="card">
                                                                              <div class="shadow">
                                                                                 <div class="card-body">
                                                                                    <div id="circlechart1"></div>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div> -->
                                                <!-- end circle chart2 -->
                                                <!-- circle chart2 -->
                                                <!-- <div class="col-md-6">
                                                                           <h5 class="mb-1 fw-bolder">Energy sold in the organization.</h5>
                                                                           <div class="card">
                                                                              <div class="shadow">
                                                                                 <div class="card-body">
                                                                                    <div id="circlechart2"></div>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div> -->
                                                <!-- end circle chart2 -->
                                            </div>
                                        </div>
                                        <!-- end charts part 1-->
                                        <!-- <div>
                                                                     <h5 class="fw-bolder">Energy intensity ration for the organization.</h5>
                                                                     <div class="row d-flex justify-content-center bg-light pt-1 pb-1">
                                                                        <div class="col-lg-2 col-md-6">
                                                                           <div class="card mb-0">
                                                                              <div class="card-body pb-50">
                                                                                 <h6>Energy consumed/Unit Produced</h6>
                                                                                 <h4 class="fw-bolder mb-1"><?php if (empty($energy_product[0]['data'])) {
                                                                                                                echo '0';
                                                                                                            } else {
                                                                                                                echo $energy_product[0]['data'];
                                                                                                            } ?> Joules</h4>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-6">
                                                                           <div class="card mb-0">
                                                                              <div class="card-body pb-50">
                                                                                 <h6>Energy Consumed/ Services</h6>
                                                                                 <h4 class="fw-bolder mb-1"><?php if (empty($energy_services[0]['data'])) {
                                                                                                                echo '0';
                                                                                                            } else {
                                                                                                                echo $energy_services[0]['data'];
                                                                                                            } ?> Joules</h4>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-6">
                                                                           <div class="card mb-0">
                                                                              <div class="card-body pb-50">
                                                                                 <h6>Energy Consumed/ Sales</h6>
                                                                                 <h4 class="fw-bolder mb-1"><?php if ($energy_sales[0]['data'] == '') {
                                                                                                                echo '0';
                                                                                                            } else {
                                                                                                                echo $energy_sales[0]['data'];
                                                                                                            } ?> Joules</h4>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-6">
                                                                           <div class="card mb-0">
                                                                              <div class="card-body pb-50">
                                                                                 <h6>Energy intensity/ Employees</h6>
                                                                                 <h4 class="fw-bolder mb-1"><?php if ($energy_Employee[0]['data'] == '') {
                                                                                                                echo '0';
                                                                                                            } else {
                                                                                                                echo $energy_Employee[0]['data'];
                                                                                                            } ?> Joules</h4>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-6">
                                                                           <div class="card mb-0">
                                                                              <div class="card-body pb-50">
                                                                                 <h6>Energy Consumed/ Size</h6>
                                                                                 <h4 class="fw-bolder mb-1"><?php if ($energy_size[0]['data'] == '') {
                                                                                                                echo '0';
                                                                                                            } else {
                                                                                                                echo $energy_size[0]['data'];
                                                                                                            } ?> Joules</h4>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div> -->
                                        <!-- Polar Area Chart Starts -->
                                        <!-- <div class="">
                                                                     <div class="mt-3 mb-1">
                                                                        <h5 class="fw-bolder">Energy consumption outside of the organization</h5>
                                                                     </div>
                                                                     <div class="shadow">
                                                                        <div class="card">
                                                                           <div class="card-header">
                                                                              <h6 class="fw-bolder">Total energy consumption outside</h6>
                                                                              <div class="dropdown">
                                                                                 <i
                                                                                 data-feather="more-vertical"
                                                                                 class="cursor-pointer"
                                                                                 role="button"
                                                                                 id="heat-chart-dd"
                                                                                 data-bs-toggle="dropdown"
                                                                                 aria-haspopup="true"
                                                                                 aria-expanded="false"
                                                                                 >
                                                                                 </i>
                                                                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="heat-chart-dd">
                                                                                    <a class="dropdown-item" href="#">Last 28 Days</a>
                                                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                                                    <a class="dropdown-item" href="#">Last Year</a>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                           <div class="card-body chart-demo">
                                                                              <canvas class="polar-area-chart-ex-energy-kpis chartjs" data-height="600"></canvas>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div> -->
                                        <!-- Polar Area Chart Ends-->
                                    </div>
                                <?php } elseif ($name == "Emissions") { ?>

                                    <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">

                                        <div class="row p-0" id="table-borderless">
                                            <div id="kpistabledata"></div>

                                        </div>
                                        <hr>
                                        <!-- charts part 1 -->
                                        <div class="row">
                                            <!-- <div class="col-md-6">
                                                <div class="shadow">
                                                    <div class="card">
                                                        <div class="card-header flex-column align-items-start pb-0">
                                                            <h3 class="fw-bolder">Total GHG Emission</h3>
                                                        </div>
                                                        <div id="gained-chart2"></div>
                                                        <h4 class="fw-bolder ms-2">175k</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="shadow">
                                                    <div class="card">
                                                        <div class="card-header flex-column align-items-start">
                                                            <h6 class="card-title mb-75">GHG Emissions</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div id="donut-chart"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h5 class="fw-bolder mb-1">Other indirect (Scope 3) GHG emissions</h5>
                                                <div class="shadow">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Upstream Activities emission</h4>
                                                            <span class="card-subtitle text-muted pt-1">Spending on various categories </span>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" class="cursor-pointer" role="button" id="heat-chart-dd" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                </i>
                                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="heat-chart-dd">
                                                                    <a class="dropdown-item" href="#">Last 28 Days</a>
                                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                                    <a class="dropdown-item" href="#">Last Year</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <canvas class="polar-area-chart-ex-up chartjs" data-height="350"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h5 class="fw-bolder mb-1">Energy consumption outside of the organization</h5>
                                                <div class="shadow">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Downstream Activities emission</h4>
                                                            <span class="card-subtitle text-muted pt-1">Value (11923 MT CO2 eq))</span>
                                                            <div class="dropdown">
                                                                <i data-feather="more-vertical" class="cursor-pointer" role="button" id="heat-chart-dd" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                </i>
                                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="heat-chart-dd">
                                                                    <a class="dropdown-item" href="#">Last 28 Days</a>
                                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                                    <a class="dropdown-item" href="#">Last Year</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <canvas class="polar-area-chart-esx chartjds" data-height="350"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="shadow">
                                                    <div class="card">
                                                        <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                                                            <div class="header-left">
                                                                <h4 class="card-title">Total GHG emissions</h4>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <canvas class="bar-charst-ex chartjs" data-height="400"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row match-height mb-3">
                                                <!-- Total Water  Discharge -->
                                                <div class="col-lg-6  col-md-6 col-12">
                                                    <div class="shadow-lg">
                                                        <div class="card-body">
                                                            <div class="row pb-50">
                                                                <div class="col-sm-12 col-md-12 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
                                                                    <div class="mb-1 mb-sm-0">
                                                                        <h4 class="mb-25">Overall Progress</h4>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <hr />

                                                            <div id="overallprogress"></div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Total Water  Discharge ends -->
                                                <!-- Total Water Consumption -->
                                                <div class="col-lg-6  col-md-6 col-12">
                                                    <div class="shadow-lg">
                                                        <div class="card-body">
                                                            <div id="manageroverall"></div>
                                                            <div id="managerpr"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Total Water Consumption ends-->
                                            </div>


                                        </div>


                                        <!-- end charts part 1-->
                                        <!-- <div>
                                            <h5 class="fw-bolder">GHG emissions intensity ratio for the organization.</h5>
                                            <div class="row d-flex justify-content-center bg-light pt-1 pb-1">
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="card mb-0">
                                                        <div class="card-body pb-50">
                                                            <h6>GHG Emission/ Product</h6>
                                                            <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="card mb-0">
                                                        <div class="card-body pb-50">
                                                            <h6>GHG Emission/ Service</h6>
                                                            <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="card mb-0">
                                                        <div class="card-body pb-50">
                                                            <h6>GHG Emission/ Turnover</h6>
                                                            <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="card mb-0">
                                                        <div class="card-body pb-50">
                                                            <h6>GHG Emission/ Area</h6>
                                                            <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="card mb-0">
                                                        <div class="card-body pb-50">
                                                            <h6>GHG Emission/ Employees</h6>
                                                            <h4 class="fw-bolder mb-1">0.00 kg CO2e</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                    </div>
                                <?php } else { ?>
                                    <div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
                                        <div class="">
                                            <!-- charts part 1 -->
                                            Welcome to P+ KPIS
                                        </div>
                                        <!-- Polar Area Chart Ends-->
                                    </div>
                                <?php } ?>
                                <!-- kpis end -->
                                <!-- request start -->
                                <?php if ($name) { ?>
                                    <div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">

                                        <div id="requestreloaddata"></div>

                                    </div>
                                <?php } else { ?>
                                    <div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">
                                        No report Generated
                                    </div>
                                <?php } ?>
                                <!-- end request -->
                                <!-- Start History -->
                                <?php if ($name) { ?>
                                    <div class="tab-pane" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">

                                        <div class="row p-0" id="table-borderless">
                                            <div id="historyreloaddata"></div>

                                        </div>
                                    <?php } else { ?>
                                        <div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">
                                            No report Generated
                                        </div>
                                    <?php } ?>
                                    <!-- end History -->
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- Filled Tabs ends -->
                </div>
        </section>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<!-- BEGIN: Page Vendor JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>




<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js') ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"
                ); ?>"></script>
<script src="<?php echo base_url(
                    "public/brand/assets/assets/js/echarts.min.js"
                ); ?>"></script>

<!-- flatpickr -->
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"
                ); ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<!-- BEGIN: Page JS-->
<script src="<?php echo base_url(
                    "public/brand/assets/app-assets/js/scripts/charts/chart-chartjs.min.js"
                ); ?>"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!-- END: Page JS-->
<!-- Energy -->
<!-- bar chart  -->
<script>
    $((function() {
        "use strict";
        var e = $(".flat-picker"),
            t = "rtl" === $("html").attr("data-textdirection"),
            a = {
                series1: "#abeb34",
                series2: "#fde924",
                bg: "#faf6f5"
            },
            o = {
                series1: "#ffe700",
                series2: "#00d4bd",
                series3: "#826bf8",
                series4: "#2b9bf4",
                series5: "#FFA1A1"
            },
            r = {
                series3: "#a4f8cd",
                series2: "#60f2ca",
                series1: "#2bdac7"
            };

        function s(e, t) {
            for (var a = 0, o = []; a < e;) {
                var r = "w" + (a + 1).toString(),
                    s = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min;
                o.push({
                    x: r,
                    y: s
                }), a++
            }
            return o
        }
        if (e.length) {
            new Date;
            e.each((function() {
                $(this).flatpickr({
                    mode: "range",
                    defaultDate: ["2019-05-01", "2019-05-10"]
                })
            }))
        }
        var i = document.querySelector("#line-area-chart"),
            n = {
                chart: {
                    height: 400,
                    type: "area",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    show: !1,
                    curve: "straight"
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                colors: [r.series3, r.series2, r.series1],
                series: [{
                    name: "Visits",
                    data: [100, 120, 90, 170, 130, 160, 140, 240, 220, 180, 270, 280, 375]
                }, {
                    name: "Clicks",
                    data: [60, 80, 70, 110, 80, 100, 90, 180, 160, 140, 200, 220, 275]
                }, {
                    name: "Sales",
                    data: [20, 40, 30, 70, 40, 60, 50, 140, 120, 100, 140, 180, 220]
                }],
                xaxis: {
                    categories: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12", "16/12", "17/12", "18/12", "19/12", "20/12"]
                },
                fill: {
                    opacity: 1,
                    type: "solid"
                },
                tooltip: {
                    shared: !1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof i && null !== i && new ApexCharts(i, n).render();
        var l = document.querySelector("#column-chart-kips"),
            d = {
                chart: {
                    height: 400,
                    type: "bar",
                    stacked: !0,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "10%",
                        colors: {
                            backgroundBarColors: [a.bg, a.bg, a.bg, a.bg, a.bg],
                            backgroundBarRadius: 10
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                colors: [a.series1, a.series2],
                stroke: {
                    show: !0,
                    colors: ["transparent"]
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                series: [{
                    name: "Sold",
                    data: [<?= $total_electricity_sold; ?>, <?= $Heating_sold; ?>, <?= $Cooling_sold; ?>, <?= $Steam_sold; ?>]
                }, {
                    name: "Consumed",
                    data: [<?= $total_electricity_counsumption; ?>, <?= $Heating_consume; ?>, <?= $Cooling_consume; ?>, <?= $Steam_consume; ?>]
                }],
                xaxis: {
                    categories: ["Electricty", "Heating", "Cooling", "Steam"]
                },
                fill: {
                    opacity: 1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
        var p = document.querySelector("#scatter-chart"),
            c = {
                chart: {
                    height: 400,
                    type: "scatter",
                    zoom: {
                        enabled: !0,
                        type: "xy"
                    },
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                legend: {
                    show: !0,
                    position: "top",
                    horizontalAlign: "start"
                },
                colors: [window.colors.solid.warning, window.colors.solid.primary, window.colors.solid.success],
                series: [{
                    name: "Angular",
                    data: [
                        [5.4, 170],
                        [5.4, 100],
                        [6.3, 170],
                        [5.7, 140],
                        [5.9, 130],
                        [7, 150],
                        [8, 120],
                        [9, 170],
                        [10, 190],
                        [11, 220],
                        [12, 170],
                        [13, 230]
                    ]
                }, {
                    name: "Vue",
                    data: [
                        [14, 220],
                        [15, 280],
                        [16, 230],
                        [18, 320],
                        [17.5, 280],
                        [19, 250],
                        [20, 350],
                        [20.5, 320],
                        [20, 320],
                        [19, 280],
                        [17, 280],
                        [22, 300],
                        [18, 120]
                    ]
                }, {
                    name: "React",
                    data: [
                        [14, 290],
                        [13, 190],
                        [20, 220],
                        [21, 350],
                        [21.5, 290],
                        [22, 220],
                        [23, 140],
                        [19, 400],
                        [20, 200],
                        [22, 90],
                        [20, 120]
                    ]
                }],
                xaxis: {
                    tickAmount: 10,
                    labels: {
                        formatter: function(e) {
                            return parseFloat(e).toFixed(1)
                        }
                    }
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof p && null !== p && new ApexCharts(p, c).render();
        var h = document.querySelector("#line-chart"),
            m = {
                chart: {
                    height: 400,
                    type: "line",
                    zoom: {
                        enabled: !1
                    },
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                series: [{
                    data: [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
                }],
                markers: {
                    strokeWidth: 7,
                    strokeOpacity: 1,
                    strokeColors: [window.colors.solid.white],
                    colors: [window.colors.solid.warning]
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    curve: "straight"
                },
                colors: [window.colors.solid.warning],
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    },
                    padding: {
                        top: -20
                    }
                },
                tooltip: {
                    custom: function(e) {
                        return '<div class="px-1 py-50"><span>' + e.series[e.seriesIndex][e.dataPointIndex] + "%</span></div>"
                    }
                },
                xaxis: {
                    categories: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12", "16/12", "17/12", "18/12", "19/12", "20/12", "21/12"]
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof h && null !== h && new ApexCharts(h, m).render();
        var f = document.querySelector("#bar-chart"),
            w = {
                chart: {
                    height: 400,
                    type: "bar",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: !0,
                        barHeight: "30%",
                        endingShape: "rounded"
                    }
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !1
                        }
                    },
                    padding: {
                        top: -15,
                        bottom: -10
                    }
                },
                colors: window.colors.solid.info,
                dataLabels: {
                    enabled: !1
                },
                series: [{
                    data: [700, 350, 480, 600, 210, 550, 150]
                }],
                xaxis: {
                    categories: ["MON, 11", "THU, 14", "FRI, 15", "MON, 18", "WED, 20", "FRI, 21", "MON, 23"]
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof f && null !== f && new ApexCharts(f, w).render();
        var g = document.querySelector("#candlestick-chart"),
            u = {
                chart: {
                    height: 400,
                    type: "candlestick",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                series: [{
                    data: [{
                        x: new Date(15387786e5),
                        y: [150, 170, 50, 100]
                    }, {
                        x: new Date(15387804e5),
                        y: [200, 400, 170, 330]
                    }, {
                        x: new Date(15387822e5),
                        y: [330, 340, 250, 280]
                    }, {
                        x: new Date(1538784e6),
                        y: [300, 330, 200, 320]
                    }, {
                        x: new Date(15387858e5),
                        y: [320, 450, 280, 350]
                    }, {
                        x: new Date(15387876e5),
                        y: [300, 350, 80, 250]
                    }, {
                        x: new Date(15387894e5),
                        y: [200, 330, 170, 300]
                    }, {
                        x: new Date(15387912e5),
                        y: [200, 220, 70, 130]
                    }, {
                        x: new Date(1538793e6),
                        y: [220, 270, 180, 250]
                    }, {
                        x: new Date(15387948e5),
                        y: [200, 250, 80, 100]
                    }, {
                        x: new Date(15387966e5),
                        y: [150, 170, 50, 120]
                    }, {
                        x: new Date(15387984e5),
                        y: [110, 450, 10, 420]
                    }, {
                        x: new Date(15388002e5),
                        y: [400, 480, 300, 320]
                    }, {
                        x: new Date(1538802e6),
                        y: [380, 480, 350, 450]
                    }]
                }],
                xaxis: {
                    type: "datetime"
                },
                yaxis: {
                    tooltip: {
                        enabled: !0
                    },
                    opposite: t
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    },
                    padding: {
                        top: -23
                    }
                },
                plotOptions: {
                    candlestick: {
                        colors: {
                            upward: window.colors.solid.success,
                            downward: window.colors.solid.danger
                        }
                    },
                    bar: {
                        columnWidth: "40%"
                    }
                }
            };
        void 0 !== typeof g && null !== g && new ApexCharts(g, u).render();
        var x = document.querySelector("#heatmap-chart"),
            y = {
                chart: {
                    height: 350,
                    type: "heatmap",
                    parentHeightOffset: 0,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    heatmap: {
                        enableShades: !1,
                        colorScale: {
                            ranges: [{
                                from: 0,
                                to: 10,
                                name: "0-10",
                                color: "#b9b3f8"
                            }, {
                                from: 11,
                                to: 20,
                                name: "10-20",
                                color: "#aba4f6"
                            }, {
                                from: 21,
                                to: 30,
                                name: "20-30",
                                color: "#9d95f5"
                            }, {
                                from: 31,
                                to: 40,
                                name: "30-40",
                                color: "#8f85f3"
                            }, {
                                from: 41,
                                to: 50,
                                name: "40-50",
                                color: "#8176f2"
                            }, {
                                from: 51,
                                to: 60,
                                name: "50-60",
                                color: "#7367f0"
                            }]
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                grid: {
                    padding: {
                        top: -25
                    }
                },
                series: [{
                    name: "SUN",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "MON",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "TUE",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "WED",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "THU",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "FRI",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }, {
                    name: "SAT",
                    data: s(24, {
                        min: 0,
                        max: 60
                    })
                }],
                xaxis: {
                    labels: {
                        show: !1
                    },
                    axisBorder: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    }
                }
            };
        void 0 !== typeof x && null !== x && new ApexCharts(x, y).render();
        var b = document.querySelector("#radialbar-chart"),
            S = {
                chart: {
                    height: 350,
                    type: "radialBar"
                },
                colors: [o.series1, o.series2, o.series4],
                plotOptions: {
                    radialBar: {
                        size: 185,
                        hollow: {
                            size: "25%"
                        },
                        track: {
                            margin: 15
                        },
                        dataLabels: {
                            name: {
                                fontSize: "2rem",
                                fontFamily: "Montserrat"
                            },
                            value: {
                                fontSize: "1rem",
                                fontFamily: "Montserrat"
                            },
                            total: {
                                show: !0,
                                fontSize: "1rem",
                                label: "Comments",
                                formatter: function(e) {
                                    return "80%"
                                }
                            }
                        }
                    }
                },
                grid: {
                    padding: {
                        top: -35,
                        bottom: -30
                    }
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                stroke: {
                    lineCap: "round"
                },
                series: [80, 50, 35],
                labels: ["Comments", "Replies", "Shares"]
            };
        void 0 !== typeof b && null !== b && new ApexCharts(b, S).render();
        var v = document.querySelector("#radar-chart"),
            k = {
                chart: {
                    height: 400,
                    type: "radar",
                    toolbar: {
                        show: !1
                    },
                    parentHeightOffset: 0,
                    dropShadow: {
                        enabled: !1,
                        blur: 8,
                        left: 1,
                        top: 1,
                        opacity: .2
                    }
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                yaxis: {
                    show: !1
                },
                series: [{
                    name: "iPhone 11",
                    data: [41, 64, 81, 60, 42, 42, 33, 23]
                }, {
                    name: "Samsung s20",
                    data: [65, 46, 42, 25, 58, 63, 76, 43]
                }],
                colors: [o.series1, o.series3],
                xaxis: {
                    categories: ["Battery", "Brand", "Camera", "Memory", "Storage", "Display", "OS", "Price"]
                },
                fill: {
                    opacity: [1, .8]
                },
                stroke: {
                    show: !1,
                    width: 0
                },
                markers: {
                    size: 0
                },
                grid: {
                    show: !1,
                    padding: {
                        top: -20,
                        bottom: -20
                    }
                }
            };
        void 0 !== typeof v && null !== v && new ApexCharts(v, k).render();
        var O = document.querySelector("#donut-chart"),
            D = {
                chart: {
                    height: 350,
                    type: "donut"
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                labels: ["Operational", "Networking", "Hiring", "R&D"],
                series: [85, 16, 50, 50],
                colors: [o.series1, o.series5, o.series3, o.series2],
                dataLabels: {
                    enabled: !0,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: !0,
                                name: {
                                    fontSize: "2rem",
                                    fontFamily: "Montserrat"
                                },
                                value: {
                                    fontSize: "1rem",
                                    fontFamily: "Montserrat",
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                total: {
                                    show: !0,
                                    fontSize: "1.5rem",
                                    label: "Operational",
                                    formatter: function(e) {
                                        return "31%"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 380
                        }
                    }
                }, {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 320
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: !0,
                                        name: {
                                            fontSize: "1.5rem"
                                        },
                                        value: {
                                            fontSize: "1rem"
                                        },
                                        total: {
                                            fontSize: "1.5rem"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }]
            };
        void 0 !== typeof O && null !== O && new ApexCharts(O, D).render()
    }));
</script>
<!-- new bar chart  -->
<!-- kpis chart polar  -->
<script>
    $(window).on("load", (function() {
        "use strict";
        var l = $(".polar-area-chart-ex-energy-kpis"),
            p = "#836AF9",
            b = "#28dac6",
            C = "#ffe802",
            u = "#2c9aff",
            h = "#84D0FF",
            y = "#EDF1F4",
            g = "rgba(0, 0, 0, 0.25)",
            w = "#666ee8",
            f = "#ff4961",
            x = "#6e6b7b",
            k = "rgba(200, 200, 200, 0.2)";
        if (l.length) new Chart(l, {
            chart: {
                width: 380
            },
            type: "polarArea",
            options: {
                responsive: !0,
                maintainAspectRatio: !1,
                responsiveAnimationDuration: 500,
                legend: {
                    position: "right",
                    labels: {
                        usePointStyle: !0,
                        padding: 25,
                        boxWidth: 9,
                        fontColor: x
                    }
                },
                layout: {
                    padding: {
                        top: -5,
                        bottom: -45
                    }
                },
                tooltips: {
                    shadowOffsetX: 1,
                    shadowOffsetY: 1,
                    shadowBlur: 8,
                    shadowColor: g,
                    backgroundColor: window.colors.solid.white,
                    titleFontColor: window.colors.solid.black,
                    bodyFontColor: window.colors.solid.black
                },
                scale: {
                    scaleShowLine: !0,
                    scaleLineWidth: 1,
                    ticks: {
                        display: !1,
                        fontColor: x
                    },
                    reverse: !1,
                    gridLines: {
                        display: !1
                    }
                },
                animation: {
                    animateRotate: !1
                }
            },
            data: {
                labels: ["Purchased Goods & Services", "Capital Goods", "Fuel- and energy-related activities", "Upstream transportation and distribution", "Waste generated in Operations", "Business Travel", "Employees Commuting", "pstream Leased Assets", "Downstream transportation and distribution", "Processing of sold products", "Use of sold products", "End-of-life treatment of sold products", "Downstream leased assets", "Franchises", "Investments"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#836af9", C, "#299aff", "#4f5d70", "#28dac6", "#fdac34", "#b01507", "#3c4029", "#7c015b", "#b0e241", g, "#cd003b", "#f74300", "#00bf00", "#dc1b75"],
                    data: [<?php if ($outside_Purchased[0]['data'] == "") {
                                echo '';
                            } else {
                                echo $outside_Purchased[0]['data'];
                            } ?>,
                        <?php if ($outside_Capital[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Capital[0]['data'];
                        } ?>,
                        <?php if ($outside_Fuel[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Fuel[0]['data'];
                        } ?>,
                        <?php if ($outside_Upstream[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Upstream[0]['data'];
                        } ?>,
                        <?php if ($outside_Waste[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Waste[0]['data'];
                        } ?>,
                        <?php if ($outside_Business[0]['data'] == "") {
                            echo '';
                        } else {
                            echo  $outside_Business[0]['data'];
                        } ?>,
                        <?php if ($outside_Employees[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Employees[0]['data'];
                        } ?>,
                        <?php if ($outside_Leased[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Leased[0]['data'];
                        } ?>,
                        <?php if ($outside_Downstream[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Downstream[0]['data'];
                        } ?>,
                        <?php if ($outside_Processing[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Processing[0]['data'];
                        }
                        ?>,
                        <?php if ($outside_sold[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_sold[0]['data'];
                        } ?>,
                        <?php if ($outside_End_of_life[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_End_of_life[0]['data'];
                        } ?>,
                        <?php if ($outside_Downstreamleased[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Downstreamleased[0]['data'];
                        } ?>,
                        <?php if ($outside_Franchises[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Franchises[0]['data'];
                        } ?>,
                        <?php if ($outside_Investments[0]['data'] == "") {
                            echo '';
                        } else {
                            echo $outside_Investments[0]['data'];
                        } ?>
                    ],
                    borderWidth: 0
                }]
            }
        });
    }));
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#createFormSide").on('submit', function(e) {
            e.preventDefault();
            var id_value = $(".data_id_number").val();
            var sub_dis_id = $(".sub_dis_id").val();
            var idvalue = $("#totalvalue" + id_value).val();
            var idvname = $('input[name="type_name"]').val();
            var value = $("#Valueinput").val();
            var x = parseInt(idvalue) + parseInt(value);
            var a = parseInt($("#totalvalue" + id_value).val());
            var b = parseInt($("#Valueinput").val());
            var sum = a + b;

            $.ajax({
                url: "<?= base_url('Environment/create'); ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(data) {
                    $(".listing" + id_value + sub_dis_id).prop('selectedIndex', 0);


                    var name = '<?php echo $data_session; ?>';
                    var fyear = '<?php echo $f_year; ?>';
                    var val = data.success;
                    var valg = data.error;
                    if (val) {
                        $.ajax({
                            url: "<?php echo base_url() ?>/Environment/subdisclosure_totalValue/" + sub_dis_id + "/" + id_value + "/" + fyear,
                            method: "GET",
                            success: function(data) {
                                var total = data.success;
                                var data_value = data.data_value;
                                $(".SubtotalValue" + sub_dis_id).val(total);
                                $("#totalvalue" + id_value).val(data_value);
                            }
                        });
                    }
                    if (valg) {
                        toastr.error(valg, "Warning", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        });
                    }
                    if (val) {
                        $.ajax({
                            url: "<?php echo base_url() ?>/Environment/AllcreateRecord/" + idvname + "/" + fyear,
                            method: "GET",
                            success: function(data) {
                                $(".kpkp" + id_value).html(data);
                            }
                        });

                        toastr.success("👋 Record Insert successfully", "Success", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })
                    }
                    var id = $('.dynamicdata3').val();
                    var classdiv = document.getElementsByClassName("total_number_add_more" + id)[0].value;
                    // alert(classdiv);
                    $("#add-value-sidebar-1").modal('hide');


                }
            });
        });
    });
</script>

<script type="text/javascript">
    function disclosurereload() {

        // var o = '<?= $reload_data_id; ?>';
        // var data = JSON.parse(o);

        // $.each(data, function (index, value)
        // {
        // $.ajax({
        // url : "<?php echo base_url() ?>/Environment/dynamicRecord/"+value,
        // method: "GET",
        // success: function(data)
        // {
        // $(".kpkp"+value).append(data);
        // }
        // });

        // })
    }
</script>

<script type="text/javascript">
    if ($('#supid').val() == 14) {
        $('#home-tab-fill').addClass("active");
        $('#home-fill').addClass("active");
        $('#home-tab-fill').attr('aria-selected', true);
        $('#home-tab-fill').click();
    }

    function Historyreload(that) {
        var fyear = '<?= $f_year; ?>';
        // alert(that);
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/historyreload/" + that + "/" + fyear,
            method: "GET",
            success: function(data) {


                $("#historyreloaddata").html(data);
                $('#historyreloadtable').dataTable();


            }
        });

    }
</script>
<script type="text/javascript">
    function Kpisreload(that) {
        var fyear = '<?= $f_year; ?>';
        // alert(that);
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/kpistabledata/" + that + "/" + fyear,
            method: "GET",
            success: function(res) {

                var respo = res.data;
                var overall = res.overall;
                var manageroverall = res.manageroverall;
                $("#kpistabledata").html(respo);
                $("#overallprogress").html(overall);
                $("#manageroverall").html(manageroverall);
                $('#kpistable').dataTable();
                $('#selectmanager').select2();
            }
        });

    }
</script>


<script type="text/javascript">
    function requestreload() {
        var fyear = '<?= $f_year; ?>';

        $.ajax({
            url: "<?php echo base_url() ?>/Environment/requestreload/" + fyear,
            method: "GET",
            success: function(data) {

                // alert(data);
                $("#requestreloaddata").html(data);
                $('#requesttable').dataTable();

            }
        });
    }
</script>
<!-- end kpis chart polar  -->

<script type="text/javascript">
    function unitsubunit(that) {

        $.ajax({
            url: "<?php echo base_url() ?>/Environment/unitsubunit/" + that,
            method: "GET",
            success: function(data) {

                // alert(data);
                $("#subUnitdata").html(data);

            }
        });
    }
</script>
<script type="text/javascript">
    function unit(that) {
        // alert(that);
        $.ajax({
            url: "<?php echo base_url() ?>/Master/category_unit/" + that,
            method: "GET",
            success: function(data) {

                // alert(data);
                $("#unit_id_data").html(data);

            }
        });
    }
</script>
<script type="text/javascript">
    function Valueclickff(that) {
        $('#frequency_data_id_side').val(null).trigger('change');
        $('#boundary_data_id').val(null).trigger('change');
        $('.subBoundarydata').val(null).trigger('change');
        $('.subBoundarydata option').remove();
        $('.select2-selection__rendered li').remove();

        var id = $(that).attr("data-id");
        var lope_id = $(that).attr("data-dev_id");
        var id_sub = $(that).attr("data-sub");
        var helper = $(".rohitnochance" + id + id_sub).val();
        var listing2 = $('input[name="listh' + id + helper + '[]"]').val();

        var listing1 = $(".listinghh" + lope_id + id_sub).val();
        var listing3 = $(".jjj" + lope_id).val();
        // alert(listing3);
        if (listing3 == listing1) {
            var idd = [listing1, '0'];
        } else {
            var idd = [listing1, listing3];
        }

        $.ajax({
            url: "<?php echo base_url() ?>/Environment/sidebardata/" + id + "/" + idd,
            method: "GET",
            success: function(data) {
                $('.js-example-basic-single').select2();
                $('#monthly_data_id_side').select2({
                    allowClear: true,
                })
                $('#monthly_data_id_side').val(null).trigger('change.select2');
                $("#sidebardatadiv").html(data);
                $("#add-value-sidebar-1").modal('show');
            }
        });
    }
</script>
<script type="text/javascript">
    function Valueclickffside(that) {
        $('#frequency_data_id_side').val(null).trigger('change');
        $('#boundary_data_id').val(null).trigger('change');
        $('.subBoundarydata').val(null).trigger('change');
        $('.subBoundarydata option').remove();
        $('.select2-selection__rendered li').remove();
        var id = $(that).attr("data-id");
        // alert(id);
        var helper = $(".rohitnochance").val();
        var listing2 = $('select[name="listhf' + id + '[]"]').val();

        // alert(listing2);
        var listing1 = $(".listingh" + helper + id).val();
        // alert(listing1);
        var idd = [listing1, listing2];

        // alert(listing1);
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/sidebardata/" + id + "/" + idd,
            method: "GET",
            success: function(data) {
                $("#sidebardatadiv").html(data);
                $("#add-value-sidebar-1").modal('show');
            }
        });
    }
</script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
$('#gop').select2({
            placeholder: 'Select a Site',
            closeOnSelect: false
        });
        });
        </script> -->


<script type="text/javascript">
    $(document).ready(function() {
        $('#assignForm1').on('submit', function(e) {
            e.preventDefault();
            $("#assignSubmitForm1").prop('disabled', true)
            $.ajax({
                url: "<?= base_url('Environment/control_environment_submit'); ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(res) {
                    var er = res.error;
                    // alert(er);
                    $("#exampleModalCenter_reduction").modal('hide');
                    var suc = res.success;
                    var er = res.error;
                    if (suc) {
                        toastr.success("👋 Data connect succesfully", "Success", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })
                    }
                    if (er) {
                        toastr.error(er, "Success", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })
                    }

                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#assignForm2').on('submit', function(e) {
            e.preventDefault();
            $("#assignForm222").prop('disabled', true)
            $.ajax({
                url: "<?= base_url('Environment/control_environment_submit'); ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(res) {
                    $("#reduction_con").modal('hide');
                    var suc = res.success;
                    var er = res.error;
                    if (suc) {
                        toastr.success("👋 Data connect succesfully", "Success", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })
                    }

                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#assignForm3').on('submit', function(e) {
            e.preventDefault();
            $("#assignFormsubmit").prop('disabled', true)


            $.ajax({
                url: "<?= base_url('Environment/control_environment_submit'); ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(res) {
                    $("#yes_no_model").modal('hide');
                    var suc = res.success;
                    var er = res.error;
                    if (suc) {
                        toastr.success("👋 Data connect succesfully", "Success", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })
                    }

                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#assignForm4').on('submit', function(e) {
            e.preventDefault();
            $("#assignSubmit").prop('disabled', true)
            $.ajax({
                url: "<?= base_url('Environment/control_environment_submit'); ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(res) {
                    $("#exampleModalCenter").modal('hide');
                    $('#gop').val(null).trigger('change');
                    $('#assignForm4')[0].reset();
                    $('#monthly_data_id').val(null).trigger('change');
                    $('[name=assign_to]').val(null).trigger('change');
                    $("#assignSubmit").prop('disabled', false)

                    var suc = res.success;
                    var er = res.error;
                    if (suc) {
                        toastr.success("👋 Data connect succesfully", "Success", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })

                    }
                    if (er) {
                        toastr.error(er, "Warning", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })
                    }

                }
            });
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#myCompanyForm').on('submit', function(e) {
            e.preventDefault();
            var id = $("#connect_sub_dis").val();
            // alert(id);
            $.ajax({
                url: "<?= base_url('Environment/connect'); ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(res) {
                    $("#connectModel").modal('hide');
                    var suc = res.success;
                    var value = res.value;
                    // alert(value);
                    if (value) {
                        $(".SubtotalValue" + id).val(value);
                    }
                    var er = res.error;
                    if (suc) {
                        toastr.success("👋 Data connect succesfully", "Success", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })
                    }
                    if (er) {
                        toastr.error(er, "Warning", {
                            closeButton: !0,
                            tapToDismiss: !1,
                            progressBar: !0,
                        })
                    }

                }
            });
        });
    });
</script>
<?php if ($ses == 11) {
?>
    <script type="text/javascript">
        var that = <?= $u_id; ?>;
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/managerprogress/" + that,
            type: "GET",
            // dataType: "json",
            success: function(res) {
                var graph = res.data;
                // console.log(data);
                $("#managerpr").html(graph);
            }
        })
    </script>
<?php
}
?>
<script>
    function sidebar_1(that) {

        var id = $(that).attr("data-id");
        var name = $(that).attr("data-type");



        $("#energy_show_id").val(id);
        $("#energy_show").val(id);
        $("#type_show").val(name);
        $("#type_show_id").val(name);
        $("#add-value-sidebar-1").modal('show');
    }
</script>




</script>

</script>

<script type="text/javascript">
    function calculate() {
        var calculate = $('.calculatecalculate').val();
        var convert = $('.convertdata').val();
        // alert(calculate);
        // alert(convert);
        var value = calculate * convert;
        // alert(value);
        $("#calculatedatashow").val(value);
    }
</script>
<script type="text/javascript">
    function copyvalue() {
        var copyText = document.getElementById("calculatedatashow");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        // alert("Copied the text: " + copyText.value);
    }
</script>
<script>
    function sidebar_7(that) {

        var energy = $(that).attr("data-id");
        // alert(energy);
        $("#reducton_type_idd").val(energy);
        $("#reducton_type_id").val(energy);



        // $("#energy_intensity_idd").val(ok);



        $("#add-value14-sidebar").modal('show');
    }
</script>

<script>
    $(document).ready(function() {

        $('#energy_intensity').on('change', function() {
            var ok = $(this).val();
            $("#energy_intensity_id").val(ok);
            $("#energy_intensity_idd").val(ok);
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('.oooooo').on('click', function() {
            var id = $(this).attr("data-id");
            $('#settings-tab-fill').removeClass("active");
            $('#profile-tab-fill').addClass("active");
            $('#profile-fill').addClass("active");
            $('#settings-fill').removeClass("active");
            if (id == '1') {

                $("#accordionOne").collapse('show');
                window.scrollTo({
                    top: 300,
                    behavior: 'smooth'
                });
            }
            if (id == '2') {

                $("#accordionTwo").collapse('show');
                window.scrollTo({
                    top: 400,
                    behavior: 'smooth'
                });
            }
            if (id == '3') {

                $("#accordionThree").collapse('show');
                window.scrollTo({
                    top: 500,
                    behavior: 'smooth'
                });
            }
            if (id == '4') {

                $("#accordionFour").collapse('show');

                window.scrollTo({
                    top: 600,
                    behavior: 'smooth'
                });
            }
            if (id == '5') {

                $("#accordionFive").collapse('show');
                window.scrollTo({
                    top: 700,
                    behavior: 'smooth'
                });
            }
            if (id == '6') {

                $("#accordionSix").collapse('show');
                window.scrollTo({
                    top: 800,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>

<script>
    function getSubDisclosureoninfoproce(that) {
        // alert(that);
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/fuel/" + that,
            type: "GET",
            success: function(data) {
                $("#labelsubdisclosure").html(data);
                $("#modal-sub-disclosure").modal('show');
            },
            error: function(xhr, status, error) {}
        });
    }
</script>
<script>
    function getSubDisclosureoninfoprocee(that) {
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/fuell/" + that,
            type: "GET",
            success: function(data) {
                $("#labelsubdisclosure").html(data);
                $("#modal-sub-disclosure").modal('show');
            },
            error: function(xhr, status, error) {}
        });
    }
</script>
<script>
    function electricity(name) {
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/electricity/" + name,
            type: "GET",
            success: function(data) {
                $("#labelelectricity").html(data);
                $("#modal-electricity").modal('show');
            },
            error: function(xhr, status, error) {}
        });
    }
</script>
<script>
    function energy_consume(name) {
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/energy_consume/" + name,
            type: "GET",
            success: function(data) {
                $("#labelenergy_consume").html(data);
                $("#modal-energy_consume").modal('show');
            },
            error: function(xhr, status, error) {}
        });
    }
</script>
<script>
    $(document).ready(function() {

        $('#standard').on('click', function() {
            var id = $(this).val();
            // alert(id);
        });
    });
</script>
<script>
    function sold(name) {
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/sold/" + name,
            type: "GET",
            success: function(data) {
                $("#labelsold").html(data);
                $("#modal-sold").modal('show');
            },
            error: function(xhr, status, error) {}
        });
    }
</script>
<script>
    function sold_con(name) {
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/sold_con/" + name,
            type: "GET",
            success: function(data) {
                $("#labelsoldcon").html(data);
                $("#modal-sold_con").modal('show');
            },
            error: function(xhr, status, error) {}
        });
    }
</script>
<script>
    function showBoundary(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_id").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function showBoundary_sidebar(that, sdid) {
        var boundary_id = that;

        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Environment/getsubboundaryByBoundary/" + boundary_id + "/" + sdid,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_id").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
    }
</script>
<script>
    function standard(that) {
        var id = $(that).val();
        // alert(id);
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/standard_filter/" + id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#subboundary_id").html(data);
            },
        });
    }
</script>

<script>
    function connectt(that) {
        var id = $(that).attr("data-id");
        var name = $(that).attr("data-name");
        var dis_id = $(that).attr("data-dis_id");
        var classi = $(that).attr("data-classi");
        // alert(classi);
        $("#connect_sub_dis").val(id);
        $("#connect_task").val(name);
        $("#connect_dis_id").val(dis_id);
        $("#connect_classi").val(classi);
        $("#connectModel").modal('show');
    }
</script>
<script>
    function SensorDelete(that) {

        $.ajax({
            url: "<?php echo base_url() ?>/Environment/SensorDelete/" + that,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $("#connectModel").modal('hide');
                toastr.error("👋 Connect Deleted", "Error", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0,
                })
            },



        });

    }
</script>

<script>
    function Non_deleted(that) {
        // alert(that);
        var id = $(that).attr("data-id");
        var idShow = $(that).attr("data-showId");
        var value = $(that).attr("data-value");
        var subDis = $(that).attr("data-subDis");
        $("#record_id").val(id);
        $("#dataId").val(idShow);
        $("#value").val(value);
        $("#SubDisclosure_delete").val(subDis);
        $("#docDeletePopup").modal('show');
    }
</script>

<script>
    function Non_deleted_history(that) {

        var id = $(that).attr("data-id");
        var value = $(that).attr("data-value");
        var mainid = $(that).attr("data-mainid");
        $("#history_dataId").val(id);
        $("#valueHistory").val(value);
        $("#record_idd").val(mainid);
        $("#docDeletePopuphistory").modal('show');
    }
</script>
<script>
    function AssginModal(that) {

        var subDisclosure_id = $(that).attr("data-subDisclosure_id");
        var Disclosure_id = $(that).attr("data-Disclosure_id");
        var task_title = $(that).attr("data-task_title");
        // alert(subDisclosure_id);
        // alert(Disclosure_id);
        // alert(task_title);
        $("#task_title_id").val(task_title);
        $("#disclosure_id_data").val(Disclosure_id);
        $("#sub_disclosure_data_id").val(subDisclosure_id);
        $('.js-example-basic-single').select2();
        $('#monthly_data_id').select2({
            allowClear: true,
        })
        $('#monthly_data_id').val(null).trigger('change.select2');
        $("#exampleModalCenter").modal('show');
    }
</script>
<script>
    function ConnectModal(that) {

        var subDisclosure_id = $(that).attr("data-subDisclosure_id");
        var Disclosure_id = $(that).attr("data-Disclosure_id");
        var task_title = $(that).attr("data-task_title");
        $("#connect_task").val(task_title);
        $("#connect_dis_id").val(Disclosure_id);
        $("#connect_sub_dis").val(subDisclosure_id);
        $('.js-example-basic-single').select2();
        $('#connect_month').select2({
            allowClear: true,
        })
        $('#connect_month').val(null).trigger('change');
        $("#connectModel").modal('show');
    }
</script>
<script>
    function reminder(that) {
        var id = $(that).attr("data-id");
        var owner = $(that).attr("data-owner");
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/environment_reminder/" + id + '/' + owner,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                toastr.success("👋 Reminder Success", "Success", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0,
                })
            },

        });
    }
</script>
<script>
    function environment_delete(that) {
        var id = $("#record_idd").val();

        var idShow = $("#history_dataId").val();
        var value = $("#valueHistory").val();
        var total = $("#totalvalue" + idShow).val();
        // alert(total);
        // alert(value);
        var x = parseInt(total) - parseInt(value);

        // alert(x);

        $("#totalvalue" + idShow).val(x)
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/record_delete/" + id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#historyreloaddata").html(data);
                $('#historyreloadtableg').dataTable();

                $("#docDeletePopuphistory").modal('hide');
                toastr.error("👋 Record Deleted", "Success", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0,
                })
            },

        });
    }
</script>
<script>
    function RequestDelete(that) {
        var id = $(that).attr("data-id");

        //  alert(id);
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/deleteFootprint/" + id,
            type: "POST",
            //dataType: "JSON",
            success: function(res) {




                var fyear = '<?= $f_year; ?>';

                $.ajax({
                    url: "<?php echo base_url() ?>/Environment/requestreload/" + fyear,
                    method: "GET",
                    success: function(data) {

                        // alert(data);
                        $("#requestreloaddata").html(data);
                        $('#requesttable').dataTable();

                    }
                });
                // $("#requestreloaddata").html(data);
                toastr.error("👋 Record Deleted", "Success", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0,
                })
            },


        });
    }
</script>
<script>
    function environment_delete_bulk(that) {
        var id = $("#record_id").val();
        var idShow = $("#dataId").val();
        var value = $("#value").val();
        var SubDisclosure_id = $("#SubDisclosure_delete").val();
        var total = $("#totalvalue" + idShow).val();
        var fyear = '<?= $f_year; ?>';
        // alert(total);
        // alert(id);
        var x = parseInt(total) - parseInt(value);

        $.ajax({
            url: "<?php echo base_url() ?>/Environment/energy_bulk_delete/" + id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {

                $('.source_form' + id).remove();
                $("#docDeletePopup").modal('hide');
                $("#totalvalue" + idShow).val(x)
                toastr.error("👋 Record Deleted", "Success", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0,
                })

                $.ajax({
                    url: "<?php echo base_url() ?>/Environment/subdisclosure_totalValue/" + SubDisclosure_id + "/" + idShow + "/" + fyear,
                    ,
                    method: "GET",
                    success: function(data) {
                        var total = data.success;
                        $(".SubtotalValue" + SubDisclosure_id).val(total);
                    }
                });


                // var http = new XMLHttpRequest();
                // http.open("POST", "https://user.positiivplus.io/Environment/environmentt/17", true);
                // http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                // var params = "financialyear=" + '2022'; // probably use document.getElementById(...).value
                // http.send(params);
                // http.onload = function() {
                // $('#reloadO').load(' #reloadO')

                // // $('#sas').html(http.responseText)
                // // $('#reloadO').html(http.responseText)
                // // alert(http.responseText);
                // }
                //  const myTimeout = setTimeout(myGreeting, 2000);
                // function myGreeting() {
                // document.getElementById('accordionOne').className = 'show';

                // }
            },

        });
    }
</script>

<script>
    function showBoundary_reduction_con(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_con").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function showBoundary_yes_no(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_yes").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function showBoundary_reduction(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_reduction").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function showBoundary3(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_iddd").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function showBoundary4(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_idddd").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function showBoundary1(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_idd").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function showBoundary_ratio(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_ratio").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function showBoundary2(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_idi").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function showBoundaryc_2(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_idii").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function showBoundarycc_2(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 43) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" + boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_idiii").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html('<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Quantitative/getIndicatorGhg/" + boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html('<option value="">No data found </option>');
            }
        });
    }
</script>
<script>
    function addSourceDiv(that) {
        var id = $(that).attr("data-id");
        // alert(id);
        var classdiv = document.getElementsByClassName("total_number_add_more" + id)[0].value;

        // alert(classdiv);
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/addMoreData/" + id,
            type: "GET",
            success: function(data) {
                $("." + classdiv).append(data);
            },
            error: function(xhr, status, error) {
                $('#indicatorDiv').html('<option value="">No data found </option>');
            }
        });



    }
</script>



<script type="text/javascript">
    $(document).ready(function() {
        var last_valid_selection = null;
        $('.testbox').change(function(event) {
            // alert($(this).val());
            var frequency = $('#frequency_assign').val();
            if (frequency == 2) {
                if ($(this).val().length > 2) {
                    // alert('You can only choose 5!');
                    $(this).val(last_valid_selection);
                } else {
                    last_valid_selection = $(this).val();
                }
            }
            if (frequency == 3) {
                if ($(this).val().length > 5) {
                    // alert('You can only choose 5!');
                    $(this).val(last_valid_selection);
                } else {
                    last_valid_selection = $(this).val();
                }
            }
            if (frequency == 4) {
                if ($(this).val().length > 12) {
                    // alert('You can only choose 5!');
                    $(this).val(last_valid_selection);
                } else {
                    last_valid_selection = $(this).val();
                }
            }
            if (frequency == 1) {
                if ($(this).val().length >= 1) {
                    // alert('You can only choose 5!');
                    $(this).val(last_valid_selection);
                } else {
                    last_valid_selection = $(this).val();
                }
            }

        });
    });
</script>

<script type="text/javascript">
    function monthly(value) {
        var i = $("#monthly_data_id").val();
        var att = i.length;
        var limit = $('#frequency_assign').val();
        if (att > limit) $('.select2-selection__choice__remove:last').click();
    }

    function resetValue(value) {
        $('#monthly_data_id').select2({
            allowClear: true,
        })
        // $('#monthly_data_id').select2()

        $('#monthly_data_id').val(null).trigger('change.select2');



    }

    function sidebarmonthly(value) {
        var i = $("#monthly_data_id_side").val();
        var att = i.length;
        var limit = $('#frequency_data_id_side').val();
        if (att > limit) $('.select2-selection__choice__remove:last').click();
    }

    function resetValueSide(value) {
        $('#monthly_data_id_side').select2({
            allowClear: true,
        })
        $('#monthly_data_id_side').val(null).trigger('change');
        // $('.select2-selection__rendered li').remove();
        // $('#monthly_data_id_side').children('option:selected').prop('selected', false);
    }
</script>

<script type="text/javascript">
    function connect_monthly(value) {
        var i = $("#connect_month").val();
        var att = i.length;
        var limit = $('#frequency_assign_connect').val();
        if (att > limit) $('.select2-selection__choice__remove:last').click();
    }

    function resetValueconnect(value) {
        $('#connect_month').select2({
            allowClear: true,
        })
        $('#connect_month').val(null).trigger('change');


    }
</script>
<script>
    $(document).ready(function() {
        $('.addquestionDivthree_data').on('click', function() {

            // alert('lll');

            $.ajax({
                url: "<?php echo base_url() ?>/Environment/commuting",
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    var non = data.success;
                    $.each(non, function(index, value) {
                        console.log(value);


                        if (value.energy == 2) {
                            $(".con_2").hide();

                        }
                        if (value.energy == 3) {
                            $(".con_3").hide();

                        }
                        if (value.energy == 4) {
                            $(".con_4").hide();

                        }


                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.onsubmit').on('click', function() {
            $("#loading").show();

        });
    });
</script>

<script type="text/javascript">
    function ratio(that) {

        var name = $(that).attr("data-name");
        $("#task_title_ratio").val(name);
        $("#task_title_ratio1").val(name);
        $("#exampleModalCenter_ratio").modal('show');

    }
</script>
<script type="text/javascript">
    function reduction_con(that) {

        var name = $(that).attr("data-name");
        $("#task_title_rat").val(name);
        $("#task_title_rat1").val(name);
        $("#reduction_con").modal('show');


    }
</script>
<script>
    $(document).ready(function() {

        $('input[name="check"]').click(function() {
            var ok = $(this).val();
            if (ok == 1) {
                $("#inlineCheckbox_check1").prop("checked", true);
            }
            if (ok == 2) {
                $("#inlineCheckbox_check2").prop("checked", true);
            }
            if (ok == 3) {
                $("#inlineCheckbox_check3").prop("checked", true);
            }
            if (ok == 4) {
                $("#inlineCheckbox_check4").prop("checked", true);
            }
            if (ok == 5) {
                $("#inlineCheckbox_check5").prop("checked", true);
            }
            if (ok == 6) {
                $("#inlineCheckbox_check1").prop("checked", true);
                $("#inlineCheckbox_check2").prop("checked", true);
                $("#inlineCheckbox_check3").prop("checked", true);
                $("#inlineCheckbox_check4").prop("checked", true);
                $("#inlineCheckbox_check5").prop("checked", true);
            }


        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#reduction_6').click(function() {

            $("#reduction_1").prop("checked", true);
            $("#reduction_2").prop("checked", true);
            $("#reduction_3").prop("checked", true);
            $("#reduction_4").prop("checked", true);
            $("#reduction_5").prop("checked", true);




        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#inlineCheckbox_check6').click(function() {

            $("#inlineCheckbox_check1").prop("checked", true);
            $("#inlineCheckbox_check2").prop("checked", true);
            $("#inlineCheckbox_check3").prop("checked", true);
            $("#inlineCheckbox_check4").prop("checked", true);
            $("#inlineCheckbox_check5").prop("checked", true);




        });
    });
</script>


<script>
    $(document).ready(function() {

        $('input[name="check2"]').click(function() {
            var ok = $(this).val();
            if (ok == 1) {
                $("#inlineCheckboxcon_1").prop("checked", true);
            }
            if (ok == 2) {
                $("#inlineCheckboxcon_2").prop("checked", true);
            }
            if (ok == 3) {
                $("#inlineCheckboxcon_3").prop("checked", true);
            }


        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#inlineCheckboxcon_3').click(function() {
            var ok = $(this).val();
            if (ok) {
                $("#inlineCheckboxcon_1").prop("checked", true);
            }
            if (ok) {
                $("#inlineCheckboxcon_2").prop("checked", true);
            }


        });
    });
</script>
<script>
    $(document).ready(function() {

        $('input[name="reduction_check"]').click(function() {
            var ok = $(this).val();
            if (ok == 1) {
                $("#reduction_1").prop("checked", true);
            }
            if (ok == 2) {
                $("#reduction_2").prop("checked", true);
            }
            if (ok == 3) {
                $("#reduction_3").prop("checked", true);
            }
            if (ok == 4) {
                $("#reduction_4").prop("checked", true);
            }
            if (ok == 5) {
                $("#reduction_5").prop("checked", true);
            }
            if (ok == 6) {
                $("#reduction_6").prop("checked", true);
            }


        });
    });
</script>
<script>
    $(document).ready(function() {

        $('input[name="yes_no"]').click(function() {
            var ok = $(this).val();
            if (ok == 1) {
                $("#yes").prop("checked", true);
            }
            if (ok == 2) {
                $("#no").prop("checked", true);
            }



        });
    });
</script>

<script>
    $(document).ready(function() {

        $('#reducton_type').on('change', function() {
            var ok = $(this).val();

            $("#reducton_type_id").val(ok);
            $("#reducton_type_idd").val(ok);

        });
    });
</script>

<script>
    function activities_ch(i) {
        var con_enr_li = document.getElementById("activities_a");
        var selectedValue = con_enr_li.options[con_enr_li.selectedIndex].value;
        $("#ttt").val(selectedValue);
        $("#tttt").val(selectedValue);
    }
</script>
<script>
    function activities(i) {
        var con_enr_li = document.getElementById("activities_model");
        var selectedValue = con_enr_li.options[con_enr_li.selectedIndex].value;
        $("#ttt").val(selectedValue);
        $("#tttt").val(selectedValue);
    }
</script>

<script type="text/javascript">
    function subsite_data(that) {
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/site_sub_site/" + that,
            type: "GET",
            dataType: "json",
            success: function(data) {
                if (data == '') {
                    // alert(data);
                    $("#sub_site_id_show").hide();
                } else {
                    $("#sub_site_id_show").show();
                    $('select[name="sub_site"]').empty();
                    $('select[name="sub_site"]').append(
                        '<option value="">Select Sub-site</option>');
                    $.each(data, function(key, value) {
                        $('select[name="sub_site"]').append('<option value="' +
                            value.id + '">' + value.sub_site_name +
                            '</option>');
                    })
                }
            }
        })
    }
</script>

<script type="text/javascript">
    function managerprogree(that) {
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/managerprogress/" + that,
            type: "GET",
            // dataType: "json",
            success: function(res) {
                var graph = res.data;
                // console.log(data);
                $("#managerpr").html(graph);
            }
        })
    }
</script>



<script>
    function renType(i) {

        var rentype = document.getElementById("rentype");
        var selectedValue = rentype.options[rentype.selectedIndex].value;
        $("#ren_type_show_id").val(selectedValue);
        if (selectedValue == 1) {
            $("#r_t_1").prop("selected", true);
        }
        if (selectedValue == 2) {
            $("#r_t_2").prop("selected", true);
        }
        if (selectedValue == 3) {
            $("#r_t_3").prop("selected", true);
        }
        if (selectedValue == 4) {
            $("#r_t_4").prop("selected", true);
        }
        if (selectedValue == 5) {
            $("#r_t_5").prop("selected", true);
        }
    }
</script>


<script>
    //mychart1
    var options = {
        series: [{
            name: 'Non renewable',
            data: <?php echo json_encode($sumNon); ?>
        }, {
            name: 'Renewable',
            data: <?php echo json_encode($sumRenewable); ?>
        }],
        chart: {
            type: 'bar',
            height: 530
        },
        plotOptions: {
            bar: {
                horizontal: true,
                columnWidth: '55%',
                borderRadius: 5
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: <?php echo json_encode($month_names); ?>,
        },
        colors: ['#fbbd1f', '#36c6da'],
        yaxis: {
            // title: {
            //   text: '$ (thousands)'
            // }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "" + val + " Joules"
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#mychart1"), options);
    chart.render();
    //    endmychart1
    //    circlechart1
    var options = {
        series: [44, 55, 67, 83],
        chart: {
            height: 350,
            type: "radialBar"
        },
        colors: ['#FF0000', '#fde924', '#24d9c5', '#49a8f4'],
        plotOptions: {
            radialBar: {
                size: 185,
                hollow: {
                    size: "25%"
                },
                track: {
                    margin: 15
                },
                dataLabels: {
                    name: {
                        fontSize: "2rem",
                        fontFamily: "Montserrat"
                    },
                    value: {
                        fontSize: "1rem",
                        fontFamily: "Montserrat"
                    },
                    total: {
                        show: !0,
                        fontSize: "0.7rem",
                        label: "Energy Consumption",
                        formatter: function(e) {
                            return "<?php echo $consum_per; ?>"
                        }
                    }
                }
            }
        },
        grid: {
            padding: {
                top: -35,
                bottom: -30
            }
        },
        legend: {
            show: !0,
            position: "bottom"
        },
        stroke: {
            lineCap: "round"
        },
        series: [<?php echo number_format($Electricity, 2); ?>, <?php echo number_format($Heating, 2); ?>, <?php echo number_format($Cooling, 2); ?>, <?php echo number_format($Stream, 2); ?>],
        labels: ["Electricty", "Heating", "Cooling", "Steam"]
    };
    var chart = new ApexCharts(document.querySelector("#circlechart1"), options);
    chart.render();
    // endcirclechart1

    // start circlechart2
    var options = {
        series: [44, 55, 67, 83],
        chart: {
            height: 350,
            type: "radialBar"
        },
        colors: ['#FF0000', '#fde924', '#24d9c5', '#49a8f4'],
        plotOptions: {
            radialBar: {
                size: 185,
                hollow: {
                    size: "25%"
                },
                track: {
                    margin: 15
                },
                dataLabels: {
                    name: {
                        fontSize: "2rem",
                        fontFamily: "Montserrat"
                    },
                    value: {
                        fontSize: "1rem",
                        fontFamily: "Montserrat"
                    },
                    total: {
                        show: !0,
                        fontSize: "1rem",
                        label: "Energy Sold",
                        formatter: function(e) {
                            return "<?php echo $sold; ?>"
                        }
                    }
                }
            }
        },
        grid: {
            padding: {
                top: -35,
                bottom: -30
            }
        },
        legend: {
            show: !0,
            position: "bottom"
        },
        stroke: {
            lineCap: "round"
        },
        series: [<?php echo number_format($Electricity_sold, 2); ?>, <?php echo number_format($Heating_sold, 2); ?>, <?php echo number_format($Cooling_sold, 2); ?>, <?php echo number_format($Stream_sold, 2); ?>],
        labels: ["Electricty", "Heating", "Cooling", "Steam"]
    };
    var chart = new ApexCharts(document.querySelector("#circlechart2"), options);
    chart.render();
    //  end circlechart2
    //gained-chart
    var options = {
        series: [{
            name: 'series1',
            data: [28, 40, 36, 52, 38, 60, 55]
        }],
        colors: ['#28c76f'],
        chart: {
            height: 100,
            type: "area",
            toolbar: {
                show: !1
            },
            sparkline: {
                enabled: !0
            },
            grid: {
                show: !1,
                padding: {
                    left: 0,
                    right: 0
                }
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            curve: 'smooth'
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        xaxis: {
            labels: {
                show: !1
            },
            axisBorder: {
                show: !1
            }
        },
        yaxis: {
            labels: {
                show: !1
            },
            axisBorder: {
                show: !1
            }
        },
        tooltip: {
            x: {
                show: !1
            }
        },
    };
    var chart = new ApexCharts(document.querySelector("#gained-chart"), options);
    chart.render();
    //    gained-chart
</script>

<script>
    var options = {
        series: [{
            name: 'Non renewable',
            data: <?php echo json_encode($elctricity_nonrewable); ?>
        }, {
            name: 'Renewable',
            data: <?php echo json_encode($electricity_Renewables); ?>
        }],
        chart: {
            type: 'bar',
            height: 530
        },
        plotOptions: {
            bar: {
                horizontal: true,
                columnWidth: '55%',
                borderRadius: 5
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: <?php echo json_encode($electricity_month); ?>,
        },
        colors: ['#fbbd1f', '#36c6da'],
        yaxis: {
            // title: {
            //   text: '$ (thousands)'
            // }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "" + val + " Joules"
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#electricitychart"), options);
    chart.render();
</script>
<!-- New Electricity -->
<script>
    $(window).on("load", (function() {
        "use strict";
        var o = $(".Electricity"),
            r = $(".flat-picker"),
            t = $(".bar-chart-ex"),
            a = $(".horizontal-bar-chart-ex"),
            e = $(".Electricity-chart-final"),

            p = "#836AF9",
            b = "#28dac6",
            C = "#ffe802",
            u = "#2c9aff",
            h = "#84D0FF",
            y = "#EDF1F4",
            g = "rgba(0, 0, 0, 0.25)",
            w = "#666ee8",
            f = "#ff4961",
            x = "#6e6b7b",
            k = "rgba(200, 200, 200, 0.2)";
        if ($("html").hasClass("dark-layout") && (x = "#b4b7bd"), o.length && o.each((function() {
                $(this).wrap($('<div style="height:' + this.getAttribute("data-height") + 'px"></div>'))
            })), r.length) {
            new Date;

        }

        if (Chart.elements.Rectangle.prototype.draw = function() {
                var o, r, t, a, e, i, l, n = this._chart.ctx,
                    d = this._view,
                    s = d.borderWidth;
                if (d.horizontal ? (o = d.base, r = d.x, t = d.y - d.height / 2, a = d.y + d.height / 2, e = r > o ? 1 : -1, i = 1, l = d.borderSkipped || "left") : (o = d.x - d.width / 2, r = d.x + d.width / 6, e = 1, i = (t = d.y) > (a = d.base) ? 1 : -1, l = d.borderSkipped || "bottom"), s) {
                    var c = Math.min(Math.abs(o - r), Math.abs(t - a)),
                        p = (s = s > c ? c : s) / 2,
                        b = o + ("right" !== l ? p * e : 0),
                        C = r + ("left" !== l ? -p * e : 0),
                        u = t + ("top" !== l ? p * i : 0),
                        h = a + ("bottom" !== l ? -p * i : 0);
                    b !== C && (t = u, a = h), u !== h && (o = b, r = C)
                }
                n.beginPath(), n.fillStyle = d.backgroundColor, n.strokeStyle = d.borderColor, n.lineWidth = s;
                var y = [
                        [o, a],
                        [o, t],
                        [r, t],
                        [r, a]
                    ],
                    g = ["bottom", "left", "top", "right"].indexOf(l, 0);

                function w(o) {
                    return y[(g + o) % 4]
                } - 1 === g && (g = 0);
                var f = w(0);
                n.moveTo(f[0], f[1]);
                for (var x = 1; x < 4; x++) {
                    f = w(x);
                    var k = x + 1;
                    4 == k && (k = 0);
                    w(k);
                    var v, m = y[2][0] - y[1][0],
                        S = y[0][1] - y[1][1],
                        B = y[1][0],
                        A = y[1][1];
                    (v = 20) > S / 2 && (v = S / 2), v > m / 2 && (v = m / 2), d.horizontal ? (n.moveTo(B + v, A), n.lineTo(B + m - v, A), n.quadraticCurveTo(B + m, A, B + m, A + v), n.lineTo(B + m, A + S - v), n.quadraticCurveTo(B + m, A + S, B + m - v, A + S), n.lineTo(B + v, A + S), n.quadraticCurveTo(B, A + S, B, A + S), n.lineTo(B, A + v), n.quadraticCurveTo(B, A, B, A)) : (n.moveTo(B + v, A), n.lineTo(B + m - v, A), n.quadraticCurveTo(B + m, A, B + m, A + v), n.lineTo(B + m, A + S - v), n.quadraticCurveTo(B + m, A + S, B + m, A + S), n.lineTo(B + v, A + S), n.quadraticCurveTo(B, A + S, B, A + S), n.lineTo(B, A + v), n.quadraticCurveTo(B, A, B + v, A))
                }
                n.fill(), s && n.stroke()
            }, e.length) new Chart(e, {
            type: "bar",
            plugins: [{
                beforeInit: function(o) {
                    o.legend.afterFit = function() {
                        this.height += 10
                    }
                }
            }],
            options: {
                responsive: !0,
                maintainAspectRatio: !1,
                backgroundColor: !1,
                hover: {
                    mode: "label"
                },
                tooltips: {
                    shadowOffsetX: 1,
                    shadowOffsetY: 1,
                    shadowBlur: 8,
                    shadowColor: g,
                    backgroundColor: window.colors.solid.white,
                    titleFontColor: window.colors.solid.black,
                    bodyFontColor: window.colors.solid.black
                },
                layout: {
                    padding: {
                        top: -15,
                        bottom: -25,
                        left: -15
                    }
                },
                scales: {
                    xAxes: [{
                        display: !0,
                        scaleLabel: {
                            display: !0
                        },
                        gridLines: {
                            display: !0,
                            color: k,
                            zeroLineColor: k
                        },
                        ticks: {
                            fontColor: x
                        }
                    }],
                    yAxes: [{
                        display: !0,
                        scaleLabel: {
                            display: !0
                        },
                        ticks: {
                            stepSize: 100,
                            min: 0,
                            max: 500,
                            fontColor: x
                        },
                        gridLines: {
                            display: !0,
                            color: k,
                            zeroLineColor: k
                        }
                    }]
                },
                legend: {
                    position: "top",
                    align: "start",
                    labels: {
                        usePointStyle: !0,
                        padding: 25,
                        boxWidth: 10
                    }
                }
            },
            data: {
                labels: <?php echo json_encode($electricity_month); ?>,
                datasets: [{
                    data: <?php echo json_encode($electricity_Renewables); ?>,
                    label: "Renewable",
                    borderColor: w,
                    lineTension: .5,
                    pointStyle: "circle",
                    backgroundColor: w,
                    fill: !1,
                    pointRadius: 1,
                    pointHoverRadius: 5,
                    pointHoverBorderWidth: 5,
                    pointBorderColor: "transparent",
                    pointHoverBorderColor: window.colors.solid.white,
                    pointHoverBackgroundColor: w,
                    pointShadowOffsetX: 1,
                    pointShadowOffsetY: 1,
                    pointShadowBlur: 5,
                    pointShadowColor: g
                }, {
                    data: <?php echo json_encode($elctricity_nonrewable); ?>,
                    label: "Non Renewable",
                    borderColor: C,
                    lineTension: .5,
                    pointStyle: "circle",
                    backgroundColor: C,
                    fill: !1,
                    pointRadius: 1,
                    pointHoverRadius: 5,
                    pointHoverBorderWidth: 5,
                    pointBorderColor: "transparent",
                    pointHoverBorderColor: window.colors.solid.white,
                    pointHoverBackgroundColor: C,
                    pointShadowOffsetX: 1,
                    pointShadowOffsetY: 1,
                    pointShadowBlur: 5,
                    pointShadowColor: g
                }]
            }
        });



    }));
</script>
<!-- New Electricity -->
<!-- //gained-chart2 -->
<script>
    var options = {
        series: [{
            name: 'series1',
            data: [28, 40, 36, 52, 38, 60, 55]
        }],
        colors: ['#28c76f'],
        chart: {
            height: 335,
            type: "area",
            toolbar: {
                show: !1
            },
            sparkline: {
                enabled: !0
            },
            grid: {
                show: !1,
                padding: {
                    left: 0,
                    right: 0
                }
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            curve: 'smooth'
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        xaxis: {
            labels: {
                show: !1
            },
            axisBorder: {
                show: !1
            }
        },
        yaxis: {
            labels: {
                show: !1
            },
            axisBorder: {
                show: !1
            }
        },
        tooltip: {
            x: {
                show: !1
            }
        },
    };
    var chart = new ApexCharts(document.querySelector("#gained-chart2"), options);
    chart.render();
</script>
<!--  gained-chart2 -->
<!-- downstream chart -->
<script>
    $(window).on("load", (function() {
        "use strict";
        var o = $(".chartjds"),
            r = $(".flat-picker"),
            t = $(".bar-chart-ex"),
            a = $(".horizontal-bar-chart-ex"),
            e = $(".line-chart-ex"),
            i = $(".radar-chart-ex"),
            l = $(".polar-area-chart-ex-up"),
            n = $(".bubble-chart-ex"),
            d = $(".doughnut-chart-ex"),
            s = $(".scatter-chart-ex"),
            c = $(".line-area-chart-ex"),
            p = "#836AF9",
            b = "#28dac6",
            C = "#ffe802",
            u = "#2c9aff",
            h = "#84D0FF",
            y = "#EDF1F4",
            g = "rgba(0, 0, 0, 0.25)",
            w = "#666ee8",
            f = "#ff4961",
            x = "#6e6b7b",
            k = "rgba(200, 200, 200, 0.2)";
        if ($("html").hasClass("dark-layout") && (x = "#b4b7bd"), o.length && o.each((function() {
                $(this).wrap($('<div style="height:' + this.getAttribute("data-height") + 'px"></div>'))
            })), r.length) {
            new Date;
            r.each((function() {
                $(this).flatpickr({
                    mode: "range",
                    defaultDate: ["2019-05-01", "2019-05-10"]
                })
            }))
        }
        if (l.length) new Chart(l, {
            type: "polarArea",
            options: {
                responsive: !0,
                maintainAspectRatio: !1,
                responsiveAnimationDuration: 500,
                legend: {
                    position: "right",
                    labels: {
                        usePointStyle: !0,
                        padding: 25,
                        boxWidth: 9,
                        fontColor: x
                    }
                },
                layout: {
                    padding: {
                        top: -5,
                        bottom: -45
                    }
                },
                tooltips: {
                    shadowOffsetX: 1,
                    shadowOffsetY: 1,
                    shadowBlur: 8,
                    shadowColor: g,
                    backgroundColor: window.colors.solid.white,
                    titleFontColor: window.colors.solid.black,
                    bodyFontColor: window.colors.solid.black
                },
                scale: {
                    scaleShowLine: !0,
                    scaleLineWidth: 1,
                    ticks: {
                        display: !1,
                        fontColor: x
                    },
                    reverse: !1,
                    gridLines: {
                        display: !1
                    }
                },
                animation: {
                    animateRotate: !1
                }
            },
            data: {
                labels: ["Purchased goods and services", "Capital goods", "Fuel and Energy related activities (Not used within the organisation)", "Upstream transportation and distribution", "Waste generated in operations", "Business travel", "Employee commuting", "Upstream leased assets"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: [p, C, window.colors.solid.primary, "#299AFF", "#4F5D70", b, "#b01507", "#db8504"],
                    data: [23.5, 21, 19, 17.5, 15, 13.5, 11, 9, ],
                    borderWidth: 0
                }]
            }
        });
    }));
</script>
<!-- end downstream chart -->
<!-- upstream chart -->
<script>
    $(window).on("load", (function() {
        "use strict";
        var l = $(".polar-area-chart-esx"),
            p = "#836AF9",
            b = "#28dac6",
            C = "#ffe802",
            u = "#2c9aff",
            h = "#84D0FF",
            y = "#EDF1F4",
            g = "rgba(0, 0, 0, 0.25)",
            w = "#666ee8",
            f = "#ff4961",
            x = "#6e6b7b",
            k = "rgba(200, 200, 200, 0.2)";
        if (l.length) new Chart(l, {
            type: "polarArea",
            options: {
                responsive: !0,
                maintainAspectRatio: !1,
                responsiveAnimationDuration: 500,
                legend: {
                    position: "right",
                    labels: {
                        usePointStyle: !0,
                        padding: 25,
                        boxWidth: 9,
                        fontColor: x
                    }
                },
                layout: {
                    padding: {
                        top: -5,
                        bottom: -45
                    }
                },
                tooltips: {
                    shadowOffsetX: 1,
                    shadowOffsetY: 1,
                    shadowBlur: 8,
                    shadowColor: g,
                    backgroundColor: window.colors.solid.white,
                    titleFontColor: window.colors.solid.black,
                    bodyFontColor: window.colors.solid.black
                },
                scale: {
                    scaleShowLine: !0,
                    scaleLineWidth: 1,
                    ticks: {
                        display: !1,
                        fontColor: x
                    },
                    reverse: !1,
                    gridLines: {
                        display: !1
                    }
                },
                animation: {
                    animateRotate: !1
                }
            },
            data: {
                labels: ["Downstream transportation and distribution", "Processing of sold products", "Use of sold products", "End-of-life treatment of sold products", "Downstream leased assets", "Franchises", "Investments", "Other downstream"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: [p, C, window.colors.solid.primary, "#299AFF", "#4F5D70", b, "#b01507", "#db8504"],
                    data: [23.5, 21, 19, 17.5, 15, 13.5, 11, 9, ],
                    borderWidth: 0
                }]
            }
        });
    }));
</script>
<!-- end upstream chart -->
<!-- line chartjs -->
<script>
    $(window).on("load", (function() {
        "use strict";
        var t = $(".bar-charst-ex"),
            p = "#836AF9",
            b = "#ffb100",
            C = "#ffe802",
            u = "#2c9aff",
            h = "#84D0FF",
            y = "#EDF1F4",
            g = "rgba(0, 0, 0, 0.25)",
            w = "#666ee8",
            f = "#ff4961",
            x = "#6e6b7b",
            k = "rgba(200, 200, 200, 0.2)";
        if (t.length) new Chart(t, {
            type: "bar",
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderSkipped: "bottom"
                    }
                },
                responsive: !0,
                maintainAspectRatio: !1,
                responsiveAnimationDuration: 500,
                legend: {
                    display: !1
                },
                tooltips: {
                    shadowOffsetX: 1,
                    shadowOffsetY: 1,
                    shadowBlur: 8,
                    shadowColor: g,
                    backgroundColor: window.colors.solid.white,
                    titleFontColor: window.colors.solid.black,
                    bodyFontColor: window.colors.solid.black
                },
                scales: {
                    yAxes: [{
                        display: !0,
                        gridLines: {
                            color: k,
                            zeroLineColor: k
                        },
                        ticks: {
                            stepSize: 100,
                            min: 0,
                            max: 300,
                            fontColor: x
                        }
                    }]
                }
            },
            data: {
                labels: ["", "", "", "", "", "", "", "", "", "", ""],
                datasets: [{
                    data: [275, 90, 190, 205, 125, 85, 55, 87, 127, 150, 230, 280, 190],
                    barThickness: 20,
                    backgroundColor: b,
                    borderColor: "transparent"
                }]
            }
        });
    }));
</script>
<!-- end line charts -->
<!-- donut -->
<script>
    $((function() {
        "use strict";
        var e = $(".flat-picker"),
            t = "rtl" === $("html").attr("data-textdirection"),
            a = {
                series1: "#826af9",
                series2: "#d2b0ff",
                bg: "#f8d3ff"
            },
            o = {
                series1: "#ffe700",
                series2: "#00d4bd",
                series3: "#826bf8",
                series4: "#2b9bf4",
                series5: "#FFA1A1"
            },
            r = {
                series3: "#a4f8cd",
                series2: "#60f2ca",
                series1: "#2bdac7"
            };

        function s(e, t) {
            for (var a = 0, o = []; a < e;) {
                var r = "w" + (a + 1).toString(),
                    s = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min;
                o.push({
                    x: r,
                    y: s
                }), a++
            }
            return o
        }
        if (e.length) {
            new Date;
            e.each((function() {
                $(this).flatpickr({
                    mode: "range",
                    defaultDate: ["2019-05-01", "2019-05-10"]
                })
            }))
        }
        var O = document.querySelector("#donut-chart"),
            D = {
                chart: {
                    height: 350,
                    type: "donut"
                },
                legend: {
                    show: !0,
                    position: "bottom"
                },
                labels: ["Scope 1", "Scope 2", "Scope 3"],
                series: [85, 50, 50],
                colors: [o.series1, o.series5, o.series3, o.series2],
                dataLabels: {
                    enabled: !0,
                    formatter: function(e, t) {
                        return parseInt(e) + "%"
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: !0,
                                name: {
                                    fontSize: "2rem",
                                    fontFamily: "Montserrat"
                                },
                                value: {
                                    fontSize: "1rem",
                                    fontFamily: "Montserrat",
                                    formatter: function(e) {
                                        return parseInt(e) + "%"
                                    }
                                },
                                total: {
                                    show: !0,
                                    fontSize: "1.5rem",
                                    label: "Operational",
                                    formatter: function(e) {
                                        return "31%"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 380
                        }
                    }
                }, {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 320
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: !0,
                                        name: {
                                            fontSize: "1.5rem"
                                        },
                                        value: {
                                            fontSize: "1rem"
                                        },
                                        total: {
                                            fontSize: "1.5rem"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }]
            };
        void 0 !== typeof O && null !== O && new ApexCharts(O, D).render()
    }));
</script>
<script>
    $(window).on("load", (function() {
        "use strict";
        var t, o = "rtl" === $("html").attr("data-textdirection"),
            n = $("#type-success"),
            i = $("#type-info"),
            s = $("#type-warning"),
            a = $("#type-error"),
            e = $("#position-top-left"),
            r = $("#position-top-center"),
            c = $("#position-top-right"),
            l = $("#position-top-full"),
            u = $("#position-bottom-left"),
            h = $("#position-bottom-center"),
            m = $("#position-bottom-right"),
            d = $("#position-bottom-full"),
            f = $("#progress-bar"),
            p = $("#clear-toast-btn"),
            k = $("#fast-duration"),
            w = $("#slow-duration"),
            y = $("#timeout"),
            b = $("#sticky"),
            g = $("#slide-toast"),
            I = $("#fade-toast");
        n.on("click", (function() {
            toastr.success("👋 Jelly-o macaroon brownie tart ice cream croissant jelly-o apple pie.", "Success!", {
                closeButton: !0,
                tapToDismiss: !10,
                rtl: o
            })
        })), i.on("click", (function() {
            toastr.info("👋 Chupa chups biscuit brownie gummi sugar plum caramels.", "Info!", {
                closeButton: !0,
                tapToDismiss: !1,
                rtl: o
            })
        })), s.on("click", (function() {
            toastr.warning("👋 Icing cake pudding carrot cake jujubes tiramisu chocolate cake.", "Warning!", {
                closeButton: !0,
                tapToDismiss: !1,
                rtl: o
            })
        })), a.on("click", (function() {
            toastr.error("👋 Jelly-o marshmallow marshmallow cotton candy dessert candy.", "Error!", {
                closeButton: !0,
                tapToDismiss: !1,
                rtl: o
            })
        })), f.on("click", (function() {
            toastr.success("👋 Chocolate oat cake jelly oat cake candy jelly beans pastry.", "Progress Bar", {
                closeButton: !0,
                tapToDismiss: !1,
                progressBar: !0,
                rtl: o
            })
        })), p.on("click", (function() {
            t || (t = toastr.info('Ready for the vacation?<br /><br /><button type="button" class="btn btn-info btn-sm clear">Yes</button>', "Family Trip", {
                closeButton: !0,
                timeOut: 0,
                extendedTimeOut: 0,
                tapToDismiss: !1,
                rtl: o
            })), t.find(".clear").length && t.delegate(".clear", "click", (function() {
                toastr.clear(t, {
                    force: !0
                }), t = void 0
            }))
        })), e.on("click", (function() {
            toastr.info("I do not think that word means what you think it means.", "Top Left!", {
                positionClass: "toast-top-left",
                rtl: o
            })
        })), r.on("click", (function() {
            toastr.info("I do not think that word means what you think it means.", "Top Center!", {
                positionClass: "toast-top-center",
                rtl: o
            })
        })), c.on("click", (function() {
            toastr.info("I do not think that word means what you think it means.", "Top Right!", {
                positionClass: "toast-top-right",
                rtl: o
            })
        })), l.on("click", (function() {
            toastr.info("I do not think that word means what you think it means.", "Top Full Width!", {
                positionClass: "toast-top-full-width",
                rtl: o
            })
        })), u.on("click", (function() {
            toastr.info("I do not think that word means what you think it means.", "Bottom Left!", {
                positionClass: "toast-bottom-left",
                rtl: o
            })
        })), h.on("click", (function() {
            toastr.info("I do not think that word means what you think it means.", "Bottom Center!", {
                positionClass: "toast-bottom-center",
                rtl: o
            })
        })), m.on("click", (function() {
            toastr.info("I do not think that word means what you think it means.", "Bottom Right!", {
                positionClass: "toast-bottom-right",
                rtl: o
            })
        })), d.on("click", (function() {
            toastr.info("I do not think that word means what you think it means.", "Bottom Full Width!", {
                positionClass: "toast-bottom-full-width",
                rtl: o
            })
        })), k.on("click", (function() {
            toastr.success("lll", {
                showDuration: 500,
                rtl: o
            })
        })), w.on("click", (function() {
            toastr.warning("Have fun storming the castle!", "Slow Duration", {
                hideDuration: 3e3,
                rtl: o
            })
        })), y.on("click", (function() {
            toastr.error("I do not think that word means what you think it means.", "Timeout!", {
                timeOut: 5e3,
                rtl: o
            })
        })), b.on("click", (function() {
            toastr.info("I do not think that word means what you think it means.", "Sticky!", {
                timeOut: 0,
                rtl: o
            })
        })), g.on("click", (function() {
            toastr.success("I do not think that word means what you think it means.", "Slide Down / Slide Up!", {
                showMethod: "slideDown",
                hideMethod: "slideUp",
                timeOut: 2e3,
                rtl: o
            })
        })), I.on("click", (function() {
            toastr.success("I do not think that word means what you think it means.", "Slide Down / Slide Up!", {
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                timeOut: 2e3,
                rtl: o
            })
        }))
    }));
</script>

<!-- end donut -->
<script type="text/javascript">
    function Valueclick(that) {

        // alert('xlkbfh');
        $('#frequency_data_id_side').val(null).trigger('change');
        $('.calculation-Reset').val(null).trigger('change');
        $('#boundary_data_id').val(null).trigger('change');
        $('.subBoundarydata').val(null).trigger('change');
        $('.subBoundarydata option').remove();
        $('.select2-selection__rendered li').remove();

        $('#profile-tab').removeClass('active');
        $('#profile_new').removeClass('active');
        $('#home_new').addClass('active');
        $('#home-tab').attr('aria-selected', true);
        $('#home-tab').addClass('active');

        var id = $(that).attr("data-id");
        var id_sub = $(that).attr("data-sub");
        var helper = $(".rohitnochance" + id + id_sub).val();
        var listing2 = $('select[name="list' + id + helper + '[]"]').val();
        var listing3 = $('#multiselect').val();
        if (listing3 == "") {
            var listing3 = 'undefined';
        }
        if (listing3 == listing2) {
            var idd = [listing2, '0'];
        } else {
            var idd = [listing2, listing3];
        }

        $.ajax({
            url: "<?php echo base_url() ?>/Environment/sideboundary_data/" + id,
            method: "GET",
            success: function(data) {
                var boundary = data.boundary;
                var date = data.date;
                var sitef = data.site;

                $.each(sitef, function(index, value) {
                    if (value == 1) {
                        // alert('djklg');
                        $("#30").show();
                    }
                    if (value == '2') {
                        $("#31").show();

                    }
                    if (value == '3') {
                        $("#43").show();

                    }
                    if (value == '4') {
                        $("#45").show();

                    }
                });


                if (boundary == '1') {
                    $("#boundary_show").show();
                    $("#site_show").show();


                } else {
                    $("#boundary_show").hide();
                    $("#site_show").hide();


                }

                if (date == '1') {
                    $("#date_option").show();
                } else {
                    $("#date_option").hide();

                }

            }
        });



        $.ajax({
            url: "<?php echo base_url() ?>/Environment/sidebardata/" + id + "/" + idd,
            method: "GET",
            success: function(data) {
                var i = data.suc;
                var Guideline = data.Guideline;
                // alert(i); 
                $('.js-example-basic-single').select2();
                $('#monthly_data_id_side').select2({
                    allowClear: true,
                })
                $('#monthly_data_id_side').val(null).trigger('change.select2');

                $("#sidebardatadiv").html(i);
                $("#Guideline").html(Guideline);
                $("#add-value-sidebar-1").modal('show');
                $('#sdidinp').val($(".sub_dis_id").val()); //safal code 26/06
            }
        });
    }

    function multipleselect(value) {
        $("#multiselect").val(value);
    }
</script>

<script type="text/javascript">
    var o = '<?= $reload_data_id; ?>';
    var fyear = '<?= $f_year; ?>';
    var data = JSON.parse(o);
    // alert(data);
    $.each(data, function(index, value) {
        $.ajax({
            url: "<?php echo base_url() ?>/Environment/dynamicRecord/" + value + "/" + fyear,
            method: "GET",
            success: function(data) {
                $(".kpkp" + value).append(data);
            }
        });

    })
</script>
<script>
    function verifydata(id, vindid, vfyear) {
        // console.log('hello' + id);
        $('#verifyid').val(id);
        $('#vindicatorid').val(vindid);
        $('#vfinancialyear').val(vfyear);
        $('#verifyModal').modal('show');
    }

    function rejectdata(id, indid, fyear) {
        // console.log('hello' . id);
        $('#rejectid').val(id);
        $('#indicatorid').val(indid);
        $('#financialyear').val(fyear);
        $('#rejectModal').modal('show');
    }

    function verifybtn() {
        let vid = $('#verifyid').val();
        let vindid = $('#vindicatorid').val();
        let vfncyear = $('#vfinancialyear').val();
        let vcomment = $('#verifyta').val();
        // console.log(vid);
        $.ajax({
            type: "get",
            url: "<?php echo base_url() ?>/Environment/verifyUpdate/" + vid + "/" + vcomment + "/" + vindid + "/" + vfncyear,
            // data: "data",
            // dataType: "dataType",
            success: function(verifyres) {
                let vfetched = JSON.parse(verifyres);
                // console.log(verifyres);
                $('#verifyModal').modal('hide');
                $('#verifyta').val("");
                // $('#rejectbutton').hide();
                $.ajax({
                    type: "get",
                    url: "<?php echo base_url() ?>/Environment/historyreload/" + vfetched[0] + "/" + vfetched[1],
                    // data: "data",
                    // dataType: "dataType",
                    success: function(response) {
                        $("#historyreloaddata").html(response);
                    }
                });
            }
        });
    }

    function rejectbtn() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>/Environment/rejectUpdate",
            data: {
                rid: $('#rejectid').val(),
                rindid: $('#indicatorid').val(),
                rfncyear: $('#financialyear').val(),
                rcomment: $('#rejectta').val(),
            },
            dataType: "json",
            success: function(response) {
                // alert(response);
                $('#rejectModal').modal('hide');
                $('#rejectta').val("");

                $.ajax({
                    type: "get",
                    url: "<?php echo base_url() ?>/Environment/historyreload/" + response[0] + "/" + response[1],
                    success: function(response) {
                        $("#historyreloaddata").html(response);
                    }
                });
            }
        });
    }

    function comment_load(that, id, m_id) {
        let html = '';
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>/Environment/comment_load",
            data: {
                id: id,
                m_id: m_id
            },
            success: function(response) {
                $('#comment_append').html(response);
            }
        });
    }
</script>
<script type="text/javascript">
    var o = '<?= $reload_sub_id; ?>';
    var fyear = '<?= $f_year; ?>';
    var id = '0';
    var data = JSON.parse(o);

    // alert(o);
    $.each(data, function(index, value) {

        $.ajax({
            url: "<?php echo base_url() ?>/Environment/subdisclosure_totalValue/" + value + "/" + id + "/" + fyear,
            method: "GET",
            success: function(data) {
                var total = data.success;
                $(".SubtotalValue" + value).val(total);
            }
        });
    })
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"> -->
<!-- </script> -->
<!-- <script>
                                          $("#sas").on("click", function(){
                                          var http = new XMLHttpRequest();
                                          http.open("POST", "https://user.positiivplus.io/Environment/environmentt/17", true);
                                          http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                                          var params = "financialyear=" + '2022'; // probably use document.getElementById(...).value
                                          http.send(params);
                                          http.onload = function() {
                                          
                                          $('#reloadO').load(' #reloadO')
                                          // $('#sas').html(http.responseText)
                                          // $('#reloadO').html(http.responseText)
                                          // alert(http.responseText);
                                          }
                                          alert('Reloaded')
                                          <?php $f_year = '2022';
                                            ?>
                                          });</script> -->
<?= $this->endSection() ?>