<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Utoppic | Log in</title>

  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?php echo base_url('public/admin/assets/'); ?>/plugins/fontawesome-free/css/all.min.css">

  <!-- icheck bootstrap -->

  <link rel="stylesheet" href="<?php echo base_url('public/admin/assets/'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?php echo base_url('public/admin/assets/'); ?>/dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page">

<div class="login-box">

  <div class="login-logo">

    <a href="<?php echo base_url(''); ?>"><b>Utopiic</b></a>

  </div>

  <!-- /.login-logo -->

  

  <div class="card">

    <div class="card-body login-card-body">

      <p class="login-box-msg">Sign in to start your session</p>

      <?php $validation = \Config\Services::validation(); ?>

          <?php if(session()->getFlashdata('msg')):?>
              
              <div class="alert alert-danger">
                  
              <?= session()->getFlashdata('msg') ?></div>
                
          <?php endif;?>

      <form action="<?php echo base_url('auth/adminlogin'); ?>" method="post">

        <div class="input-group mb-3">

          <input type="email"  placeholder="Email" name="email"  class="form-control <?php echo (isset($validation) && $validation->hasError('email'))  ? 'is-invalid' : '';?>">

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-envelope"></span>

            </div>

          </div>

        </div>

        <!-- Error -->

        <?php if(isset($validation) && $validation->hasError('email'))  {?>

            <div class='alert alert-danger mt-2'>

              <?= $error = $validation->getError('email'); ?>

            </div>

        <?php }?>

        <div class="input-group mb-3">

          <input type="password"  placeholder="Password" name="password" class="form-control <?php echo (isset($validation) && $validation->hasError('password'))  ? 'is-invalid' : '';?>">

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-lock"></span>

            </div>

          </div>

        </div>

        <!-- Error -->

        <?php if(isset($validation) && $validation->hasError('password'))  {?>

            <div class='alert alert-danger mt-2'>

              <?= $error = $validation->getError('password'); ?>

            </div>

        <?php }?>

        <div class="row">

          <div class="col-8">

            <!-- <div class="icheck-primary">

              <input type="checkbox" id="remember">

              <label for="remember">

                Remember Me

              </label>

            </div> -->

          </div>

          <!-- /.col -->

          <div class="col-4">

            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>

          </div>

          <!-- /.col -->

        </div>

      </form>



    

      <!-- /.social-auth-links -->



      <p class="mb-1">

        <a href="forgot-password.html">I forgot my password</a>

      </p>

    </div>

    <!-- /.login-card-body -->

  </div>

</div>

<!-- /.login-box -->



<!-- jQuery -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/dist/js/adminlte.min.js"></script>

</body>

</html>

