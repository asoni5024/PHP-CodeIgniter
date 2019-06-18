<!DOCTYPE html>
<html>
<head>
	<title>Articles List</title>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #BBDEFB  ;
}

.topnav a {
  float: left;
  display: block;
  color: #fff;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #80DEEA;
  color: black;
}


.topnav .icon {
  display: none;
}
.Search{
	margin-left: 86%;
  margin-top: 10px;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}
 #in{
 	height: 20px;

 }
</style>	
	
</head>
<body>
	
<div class="topnav" id="myTopnav">
  <?= anchor('user','Article') ?>
  <?= anchor('login','Login') ?>
  <?= form_open('user/search',['class'=>'Search','role'=>'search']) ?>
  <!-- <form id ="Search" class="form-inline my-2 my-lg-0"> -->
      <input  id="in" class="form-control mr-sm-2" type="text" name="query" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
  <?= form_close(); ?>
<?= form_error('query',"<p class='navbar-text'>",'</p>') ?>

  </div>
	
   

</body>
</html>
