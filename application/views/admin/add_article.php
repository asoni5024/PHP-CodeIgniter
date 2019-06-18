<?php include_once('admin_header.php'); ?>
<br><br>
<div class="container">

	<form role="form" method="post" action="<?=base_url('admin/store_article')?>">
		<?php echo form_hidden('userid', $this->session->userdata('userid')); ?>
    
	  <fieldset>
    <legend>Add Article</legend>

    <div class="form-group">
    	<label>Article Title</label>
     &nbsp;&nbsp;<?php echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Article title','value'=>set_value('title')]); ?> 
     <?php echo form_error('title'); ?>
    </div>
    <br>

    <div class="form-group">
      <label >Article Body</label>
      <?php echo form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Article Body','value'=>set_value('body')]); ?> 
      
      <?php echo form_error('body'); ?>
    </div>
     <br>

    <?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary']) ?>

    <?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']) ?>
  </fieldset>

</form>
</div>
