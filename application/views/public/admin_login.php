<?php include('publicheader.php'); ?>
<br><br>
<div class="container">

	<form role="form" method="post" action="<?=base_url('login/admin_login')?>">
	  <fieldset>
    <legend>Admin Login</legend>

    <?php if( $error = $this->session->flashdata('login_failed')): ?>
    <div class="alert alert-dismissible alert-danger">
  <?= $error ?>
</div>
<?php endif; ?>

    <div class="form-group">
    	<label>Username</label>
     <?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>set_value('username')]); ?> 
     <?php echo form_error('username'); ?>
    </div>
    <br>

    <div class="form-group">
      <label >Password</label>
      <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password']); ?> 
      
      <?php echo form_error('password'); ?>
    </div>
     <br>

    <?php echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']) ?>

    <?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']) ?>
  </fieldset>

</form>
</div>
