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

.active {
  background-color:#AEEA00;
  color: white;
}

.topnav .icon {
  display: none;
}
#log{
	margin-left: 82%;
 
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}
 
</style>	
	
</head>
<body>
  <?php 
$this->load->helper('url');
  ?>

	
<div class="topnav" id="myTopnav">
  <a href="#" >Admin panel</a>
  <a href="<?= base_url('login/logout') ?>" id="log">Logout</a>
  
 
  </div>
	
    

</body>
</html>
