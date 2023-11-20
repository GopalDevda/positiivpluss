<?php include('include/header.php'); ?>
<section class="page_breadcrumb" style="margin-top: 83px;">
    <div class="container-fluid pl-60 pr-60">
      <div class="row">
        <div class="col-sm-7">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
            </ol>
          </nav>
        </div>
        <div class="col-sm-5">
          <a href="#" class="date"><i class="icon_clock_alt"></i></a>
        </div>
      </div>
    </div>
  </section>
    <!--================Topic List Area =================-->
    <section class="topic_list_area pb_50 pt-5">
      <div class="container">
        <div class="main_title text-center">
          <h2 class="wow fadeInUp" data-wow-delay="0.2s">Sign Up</h2>
        </div>
        
        <div class="row topic_list_inner">
          <div class="sign_right signup_right">
            <div class="sign_inner signup_inner" style="max-width: 900px;">
                <?php 
                if($session->get('success')){?>
                  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <?php echo $session->get('success');?>
                  </div> 
                <?php } ?>
                <?php 
                    $session = Session();
                    if($session->get('error')){?>
                    <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $session->get('error');?>
                    </div> 
                <?php } ?>
                <form action="<?php echo base_url('apifrontController/signupSub'); ?>" method="post" class="row login_form">
                    <div class="col-sm-6 form-group">
                        <div class="small_text">Name</div>
                        <input type="text" class="form-control" id="" name="name" placeholder="Name" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <div class="small_text">Email</div>
                        <input type="email" class="form-control" id="" name="email" placeholder="Email" required>
                    </div>
                    
                    <div class="col-lg-6 form-group">
                        <div class="small_text">Phone</div>
                        <input type="number" class="form-control" id="" name="mobile" placeholder="Mobile No." required>
                    </div>
                    <div class="col-lg-6 form-group">
                        <div class="small_text">Brand Name</div>
                        <input type="text" class="form-control" id="" name="brand_name" placeholder="Brand Name" required>
                    </div>
                    
                    <div class="col-lg-6 form-group">
                        <div class="small_text">Country</div>
                        <select class="form-control" name="country_id" required>
                            <option value="">Select Country</option>
                            <?php foreach($country as $c){ ?>
                            <option value="<?php echo $c['id'] ?>"><?php echo $c['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-6 form-group">
                        <div class="small_text">Industry</div>
                        <select class="form-control" name="industry_id" required>
                            <option value="">Select Industry</option>
                            <?php foreach($industry as $i){ ?>
                            <option value="<?php echo $i['id'] ?>"><?php echo $i['industry_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-lg-6 form-group">
                        <div class="small_text">Password</div>
                        <input type="password" class="form-control" id="" name="password" placeholder="Password" autocomplete="off" required>
                    </div>
                    <div class="col-lg-6 form-group">
                        <div class="small_text">Confirm password</div>
                        <input type="password" class="form-control" id="" name="cpassword" placeholder="Confirm Password" autocomplete="off" required>
                    </div>
                    
                    <!--<div class="col-lg-12 form-group">-->
                    <!--    <div class="check_box">-->
                    <!--        <input type="checkbox" value="None" id="squared2" name="check">-->
                    <!--        <label class="l_text" for="squared2">I accept the <span>politic of confidentiality</span></label>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-lg-12 text-center">
                        <a href="<?php echo base_url('apifrontController/login'); ?>" class="float-left">Sign in</a>
                        <button type="submit" class="btn action_btn thm_btn float-right">Submit</button>
                    </div>
                </form>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <!--================End Topic List Area =================-->


    <?php include('include/footer.php') ?> 