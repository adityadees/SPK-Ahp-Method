<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Penilaian Jalan | <?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>template/vendors/animate.css/animate.min.css" rel="stylesheet">

    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>template/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <?php echo $this->session->flashdata('error')?$this->session->flashdata('error'): ''; ?>
          <section class="login_content">
            <form name="login-form" action="<?php echo base_url(); ?>login/process" method="POST" class="form-horizontal form-label-left" novalidate>
              <h1>Login</h1>
              <div class="item form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" required="required" />
                <?php echo form_error('username', '<div class="error">', '</div>'); ?>
              </div>
              <div class="item form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" required="required" />
                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
                <div>
                  <h1><i class="fa fa-paw"></i> <?php echo $title; ?></h1>
                  <p>©2016 All Rights Reserved. Gufakto co. </p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>


    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>template/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>template/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>template/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>template/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url(); ?>template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>template/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url(); ?>template/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>template/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url(); ?>template/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url(); ?>template/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url(); ?>template/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url(); ?>template/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url(); ?>template/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>template/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url(); ?>template/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url(); ?>template/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url(); ?>template/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url(); ?>template/vendors/starrr/dist/starrr.js"></script>

    

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>template/build/js/custom.js"></script>
  </body>
</html>
