<?php include_once("admin_header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Table with Add and Delete Row Feature</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        color: #404E67;
        background: #F5F7FA;
		font-family: 'Open Sans', sans-serif;
	}
	.table-wrapper {
		width: 700px;
		margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
		height: 30px;
		font-weight: bold;
		font-size: 12px;
		text-shadow: none;
		min-width: 100px;
		border-radius: 50px;
		line-height: 13px;
    }
	.table-title .add-new i {
		margin-right: 4px;
	}
   
</style>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    
                    <div class="col-sm-4">
                        <div class="col-sm-8"><h2>Article<b>List</b></h2></div>
                        <?= anchor('admin/store_article','Add New',['class'=>'btn btn-info add-new']); ?>

                    </div>
                </div>
            </div>
            <?php if( $feedback = $this->session->flashdata('feedback')): 
	$feedback_class = $this->session->flashdata('feedback_class'); ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="alert alert-dismissible <?= $feedback_class ?>">
	<?= $feedback ?>
			</div>
		</div>
	</div>
<?php endif; ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
			<?php if(count($articles)):
				$count = $this->uri->segment(3,0);
			 foreach ($articles as $article ): ?>
				
			<tr>
				<td><?= ++$count ?></td>		
				<td>
					<?= $article->title ?>
				</td>	
				<td>
					<div class="row">
						<div class="col-lg-2">
					<?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-primary']); ?></div>
					<!-- <a href="" class="btn btn-primary">Edit</a> -->
					<div class="col-lg-2">
						<?=
	form_open('admin/delete_article'),
	form_hidden('article_id',$article->id),
	form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
	form_close();
	?>
					</div>
			<!-- <a href="" class="btn btn-danger">Delete</a> -->
				</td>	
			</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="3">
					No Records Found.
				</td>
			</tr>
	<?php endif; ?>
		</tbody>
            </table>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>     
</body>
</html>                            

	

