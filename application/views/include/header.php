<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title><?php echo "Dashboard";?></title>

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">
  <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black-light.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black-light.css');?>">
    <!--  <link rel="stylesheet" href="<?php echo base_url('assets/css/blue.css');?>">-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.dataTables.min.css'); ?>">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
    // Add the following into your HEAD section
    var timer = 0;
    function reset_interval() {
      //resets the timer. The timer is reset on each of the below events:
      // 1. mousemove   2. mouseclick   3. key press 4. scroliing
      //first step: clear the existing timer

      if (timer != 0) {
          clearInterval(timer);
          timer = 0;
          // second step: implement the timer again
          timer = setInterval("auto_logout()", 1200000);
          // completed the reset of the timer
      }
    }
</script>
</head>

<body class="hold-transition skin-black-light sidebar-mini" data-base-url="<?php echo base_url(); ?>"
    onload="set_interval()"
    onmousemove="reset_interval()"
    onclick="reset_interval()"
    onkeypress="reset_interval()"
    onscroll="reset_interval()">

  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url()."home";?>">JETEPAY</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrator <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url()."AdminUser";?>">User</a></li>
                  <li><a href="<?php echo base_url()."AdminEntite";?>">Entity</a></li>
                  <li><a href="#">Device</a></li>
                  <li><a href="#">Payment method</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manager <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="#">User</a></li>
                  <li><a href="#">Entity</a></li>
                  <li><a href="#">Payment method</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Beneficiary <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Device</a></li>
                  <li><a href="#">Tracking Payments</a></li>
                  <li><a href="#">Visits</a></li>
                </ul>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
              $profile_pic =  'user.png';
              if(isset($this->session->userdata('user_details')[0]->profile_pic) && file_exists('assets/images/'.$this->session->userdata('user_details')[0]->profile_pic))
                      {
                          $profile_pic = $this->session->userdata('user_details')[0]->profile_pic;
                      }?>
                      <img src="<?php echo base_url().'assets/images/'.$profile_pic;?>"  class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo isset($this->session->userdata('user_details')[0]->name)?$this->session->userdata('user_details')[0]->name:'';?></span>
                  </a>
                  <ul class="dropdown-menu" role="menu" style="width: 164px;">
                      <li><a href="#"><i class="fa fa-user mr10"></i>My Account</a></li>
                      <li><a href="<?php echo base_url('user/logout');?>"><i class="fa fa-power-off mr10"></i> Sign Out</a></li>
                  </ul>
                </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    </header>
