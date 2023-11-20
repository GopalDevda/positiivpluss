<?php include('include/header.php'); ?>
<section class="page_breadcrumb" style="margin-top: 83px;">
    <div class="container-fluid pl-60 pr-60">
      <div class="row">
        <div class="col-sm-7">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Login</li>
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
          <h2 class="wow fadeInUp" data-wow-delay="0.2s">Sign in</h2>
        </div>
        <?php 
            $session = Session();
            if($session->get('error')){?>
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $session->get('error');?>
            </div> 
        <?php } ?>
        <div class="row topic_list_inner">
          <div class="sign_right signup_right">
            <div class="sign_inner signup_inner">
                <form action="<?php echo base_url('apifrontController/loginSub'); ?>" class="row login_form">
                    <div class="col-lg-12 form-group">
                        <div class="small_text">Email</div>
                        <input type="email" class="form-control" id="" name="email" placeholder="Enter Your Email">
                    </div>
                    <div class="col-lg-12 form-group">
                        <div class="small_text">Password</div>
                        <div class="confirm_password">
                            <input id="" name="password" type="password" class="form-control" placeholder="Enter Your Password" autocomplete="off">
                            <!--<a href="#" class="forget_btn">Forgotten password?</a>-->
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <a href="<?php echo base_url('apifrontController/signup'); ?>" class="float-left">Create Account</a>
                        <button type="submit" class="btn action_btn thm_btn float-right">Sign in</button>
                    </div>
                </form>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <!--================End Topic List Area =================-->


    <?php include('include/footer.php') ?> 