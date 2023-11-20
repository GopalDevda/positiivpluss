<?php include('include/header.php'); ?>
<?php include('include/site_header.php'); ?>

<div class="page">
    
<div class="contact_us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center">Drop Us a Message</div>
                <div class="contact_form">
                <form action="<?php echo base_url(''); ?>/home/addinquiry" method="post">
                    <div class="cf_field">
                        <input type="text" placeholder="First Name" class="form_left_field" name="fname">
                        <input type="text" placeholder="Last Name" class="form_right_field" name="lname">
                    </div>
                    <div class="cf_field">
                        <input type="email" placeholder="Email" name="email">
                    </div>
                    <div class="cf_field">
                        <input type="text" placeholder="Subject" name="subject">
                    </div>
                    <div class="cf_field">
                        <textarea  placeholder="Description" name="description"></textarea>
                    </div>
                    <div class="join_btn mt-4">
                        <button type="submit" class="Submit" name="submit" id="submit">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<style type="text/css">
    
.join_btn button  {
    color: #C39A4A;
    font-family: myFirstFont;
    background: black;
    font-size: 18px;
    border: none;
    text-transform: uppercase;
    line-height: 28px;
    padding: 5px 18px;}
</style>
<?php include('include/site_footer.php'); ?> 