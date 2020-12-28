<!DOCTYPE html>
<html>
<head>
	
    <title>Customized burger Ordering System</title>
	<style>
		
		body
{
	padding: 50px;
	background-image: url(image/back.jpg);
}

.animate
{
	transition: all 0.1s;
	-webkit-transition: all 0.1s;
}

.action-button
{
	position: relative;
	padding: 10px 40px;
  margin: 0px 10px 10px 0px;
  float: left;
	border-radius: 10px;
	font-family: 'Pacifico', cursive;
	font-size: 25px;
	color: #FFF;
	text-decoration: none;	
}

.blue
{
	background-color: #3498DB;
	border-bottom: 5px solid #2980B9;
	text-shadow: 0px -2px #2980B9;
}

.red
{
	background-color: #E74C3C;
	border-bottom: 5px solid #BD3E31;
	text-shadow: 0px -2px #BD3E31;
}

.green
{
	background-color: #82BF56;
	border-bottom: 5px solid #669644;
	text-shadow: 0px -2px #669644;
}

.yellow
{
	background-color: #F2CF66;
	border-bottom: 5px solid #D1B358;
	text-shadow: 0px -2px #D1B358;
}
.pos{
	   
		padding: 320px;
}
.action-button:active
{
	transform: translate(0px,5px);
  -webkit-transform: translate(0px,5px);
	border-bottom: 1px solid;
}
	</style>				
</head>
<body >


<hr>
<h1 style="text-align:center; color:white;">Customized Burger Ordering System</h1>
<hr>
	
	<div class="pos" align="center">
	<a href="menu.php" class="action-button shadow animate blue">Burger Menu</a>
  <a href="register.php" class="action-button shadow animate red">User Registration</a>
  <a href="user" class="action-button shadow animate green">User Login</a>
  <a href="admin" class="action-button shadow animate yellow">Admin Management</a>
  </div>
</body>
</html>