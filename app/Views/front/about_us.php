<?php include('include/header.php'); ?>
<?php include('include/site_header.php'); ?>

<div class="about_head">
    <div class="bg_text">
        <div class="bg_text_inner">
            who are we?
         </div>
    </div>
</div>

<div class="page about_us">

<div class="section_one">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title mb-3"><?php echo $list[0]['title']; ?></div>
                <div class="content">                    
                    <div class="content_pera">
                        <?php echo $list[0]['description']; ?>
                        <br><br>
                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?php include('include/site_footer.php'); ?> 