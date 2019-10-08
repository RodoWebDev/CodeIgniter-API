<?php if($this->session->flashdata("alert_msg")){?>
  <div class="alert alert-danger">      
    <?php echo $this->session->flashdata("alert_msg")?>
  </div>
<?php } ?>

	<body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="<?php echo base_url(); ?>"><b>Register</b></a>
      </div>
      <div class="register-box-body">
        <p class="login-box-msg">Register a new user</p>
        <?php if($this->session->flashdata("messagePr")){?>
          <div class="alert alert-danger">      
            <?php echo $this->session->flashdata("messagePr");
              unset($_SESSION['messagePr']);
            ?>
          </div>
        <?php } ?>
        <form action="<?php echo base_url().'user/registration'; ?>" method="post">
						<div class="form-group has-feedback">
			            <input type="text" name="name" class="form-control" data-validation="required" placeholder="Name">
			            <span class="glyphicon glyphicon-user form-control-feedback"></span>
			          </div>
					
						<div class="form-group has-feedback">
			            <input type="email" name="email" class="form-control" data-validation="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" 
                  placeholder="Email">
			            <span class="glyphicon glyphicon-user form-control-feedback"></span>
			          </div>
					
           <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Password" data-validation="required">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Retype password" data-validation="confirmation">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="portable" class="form-control" placeholder="Portable">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <p id="captImg"><?php echo $captchaImg; ?></p>
            <p>
              Can't read the image? click<a class="refreshCaptcha" style="cursor:pointer"> here</a> to refresh.
            </p>
          </div>

          <div class="form-group has-feedback">
            <input type="text" name="captcha" class="form-control" placeholder="captcha code"/>
            <!-- <span class="glyphicon glyphicon-phone form-control-feedback"></span> -->
          </div>

    	     <div class="row">
              <div class="col-xs-12">
               <!--  <input type="hidden" name="user_type" value="<?php //echo setting_all('user_type');?>"> -->
                <input type="hidden" name="call_from" value="reg_page">
                <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat btn-color">Register</button>
              </div>
            </div>


        </form>
    	  <br>
        <a href="<?php echo base_url('user/login');?>" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div>
<!-- /.register-box -->
  </body>
<script>
$(document).ready(function(){
  $('.refreshCaptcha').on('click', function(){
    $.ajax({
        type: "GET",
        url: "<?php echo base_url().'user/captcharefresh'; ?>",
        success: function (data) { 
          $('#captImg').html(data);
        }
    });
  });

  <?php if($this->input->get('invited') && $this->input->get('invited') != ''){ ?>
    $burl = '<?php echo base_url() ?>';
    $.ajax({
      url: $burl+'user/chekInvitation',
      method:'post',
      data:{
        code: '<?php echo $this->input->get('invited'); ?>'
      },
      dataType: 'json'
    }).done(function(data){
      console.log(data);
      if(data.result == 'success') {
        $('[name="email"]').val(data.email);
        $('form').attr('action', $burl + 'user/register_invited/' + data.users_id);
      } else{
        window.location.href= $burl + 'user/login';
      }
    });
  <?php } ?>
});
</script>
