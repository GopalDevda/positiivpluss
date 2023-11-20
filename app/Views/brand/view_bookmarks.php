<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<!-- <link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/css/plugins/forms/form-wizard.min.css"> -->
<style>
    .row div {
        margin-bottom: 30px;
    }

    .input-group:not(.bootstrap-touchspin):focus-within {
        box-shadow: none !important;
        border-radius: 0.357rem;
    }

    .pac-container {
        z-index: 100000;
    }

    .mb-0 div {
        margin-bottom: 0px !important;
    }

    /* Custom styles for the dropdown menu */
    .custom-dropdown-menu-wide {
        width: 300px;
        /* Adjust the width as needed */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Add shadow */
        margin-top: 10px !important;
    }

    table.dataTable>thead .sorting:before,
    table.dataTable>thead .sorting_asc:before,
    table.dataTable>thead .sorting_desc:before,
    table.dataTable>thead .sorting_asc_disabled:before,
    table.dataTable>thead .sorting_desc_disabled:before {
        right: 6px !important;
        content: " " !important;
    }

    table.dataTable>thead .sorting:after,
    table.dataTable>thead .sorting_asc:after,
    table.dataTable>thead .sorting_desc:after,
    table.dataTable>thead .sorting_asc_disabled:after,
    table.dataTable>thead .sorting_desc_disabled:after {
        right: 0.5em;
        content: " " !important;
    }

    .selected {
        background-color: #000000 !important;
        border-color: #000000 !important;
        color: #defe73;
        padding: 2px 6px;
        border: 1px solid #aaa;
        border-radius: 4px;
        float: left;
        margin-right: 5px;
    }

    span.choice-remove {
        font-size: 8px;
        padding-left: 5px;
        cursor: pointer;
    }

    .border-new {
        border: 1px solid #ccc;
        padding: 12px 0px 0px 0px;
        border-radius: 10px;
        overflow-y: auto;
    }
</style>

<style>
    .dropstart .dropdown-toggle::before {
        display: none;
    }

    .dropdown-menu.custom-width {
        min-width: 20rem !important;
    }

    #myInput {
        background-image: url('searchicon.png');
        /* Add your search icon image URL */
        background-position: 10px center;
        /* Center the search icon vertically */
        background-repeat: no-repeat;
        width: 100%;
        font-size: 14px;
        /* Adjust font size */
        padding: 10px 20px 10px 40px;
        /* Adjust padding */
        border: none;
        /* Remove the border */
        margin-bottom: 6px;
        /* Reduce margin-bottom for a smaller input box */
        border-radius: 4px;
        /* Add rounded corners */
        background-color: white;
        /* Set background color to white */
        color: black;
        /* Set text color to black */
    }

    /* 
    #myContainer {
        padding: 0;
        margin: 0;
        font-size: 12px;
    }

    .myItem {
        padding: 10px;
        font-size: 13px;
    } */
</style>
<style>
    .card {
        /* Add styles for your card here */
        width: 100%;
        /* Example width */
        /* min-height: 500px; */
        /* Example height */
        border: 1px solid #ccc;
        /* overflow: hidden; */
        /* This will hide any content that overflows the card */
    }

    .scrollable-list {
        /* Add styles for your list here */
        list-style-type: none;
        padding: 0;
        margin: 0;
        height: 100%;
        /* Make sure the list takes up 100% of the card's height */
        overflow-y: auto;
        /* This enables vertical scroll if the content exceeds the height */
    }

    .scrollable-list a {
        /* Add styles for your list items here */
        padding: 10px;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>

<div class="app-content content">
    <div class="content-body">
        <div class="float-end pb-1">
            <a href="<?php echo base_url('market_place') ?>" class="btn btn-primary">Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-datatable" id="gopal">
                    <table class="datatable table table-striped">
                        <thead>
                            <tr>
                                <th>PPP Id</th>
                                <th>Icon</th>
                                <th>Company Name</th>
                                <th>Location</th>
                                <th>Industry</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $v) { ?>
                                <tr>
                                    <td><?php
                                        $sta_id = 0;
                                        $targetState = $v['registered_state'];

                                        foreach ($state_id as $key => $state) {
                                            if ($state['name'] === $targetState) {
                                                $sta_id = $key;
                                                break;
                                            }
                                        }
                                        echo substr($v['corporate_identification_number'], -4) . substr($v['company_name'], 0, 3) . '101' . $sta_id . 'A01'; ?>
                                    </td>
                                    <td><img src="<?= $v['company_logo'] ? $v['company_logo'] : 'https://img.freepik.com/premium-vector/abstract-logo-company-made-with-color_341269-925.jpg?w=360' ?>" id="account-upload-img" class="round" alt="profile image" width="100">
                                    </td>
                                    <td><?= $v['company_name'] ?></td>
                                    <td><?= $v['registered_office_address'] ?></td>
                                    <td><?= $v['principal_bussiness_activity_as_per_cin'] ?></td>
                                    <td><a href="<?= base_url(" MarketPlace/company_data/" . $v['corporate_identification_number']) ?>"><i class="fa fa-eye fa-xl"></i></a><i onclick="AddBookmark($(this),<?= $v['id'] ?>)" class="fa fa-star fa-xl"></i></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<script src="public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    const datatable = $('.datatable').DataTable();

    function AddBookmark(that, id) {
        $.ajax({
            type: "get",
            url: "<?= site_url('MarketPlace/AddBookmark') ?>",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(res) {
                console.log(res)
                if (that.hasClass('fa-regular')) {
                    that.removeClass('fa-regular')
                    that.addClass('fa');
                } else {
                    that.removeClass('fa')
                    that.addClass('fa-regular');
                }
            }
        });
    }
</script>
<?= $this->endSection() ?>