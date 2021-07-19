<?php
$url = 'b.jpg';
?>
<html>
<head>
<title>customer details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
table, td, th {
  border: 3px solid black;
}

table {
  border-collapse: collapse;
  width: 60%;
  
}

td,th {
  text-align: center;
  color:white;

}
body, html {
  height: 100%;
  margin: 0;
}
body
{
    background-image:url('<?php echo $url ?>');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%; 

}

.btn {
  background-color:white;
  border: none;
  color: black;
  padding: 12px 16px;
  font-size: 20px;
  cursor: pointer;
 
  left: 700px;
  top: 350px;
  border-radius: 50px;
  margin-left:450px;
  margin-top:70px;

 
}

.btn:hover {
  background-color: gray;
}

.nav{
	 width:100%;
	 height:9%;
	 background-color:gray;
	 margin-top:0px;
	 color:black;
	 padding-top:0px;
	 border-radius:5px;
     padding-left:480px;	 
 }
.nav a{
	color:white;
	margin-right:0px;
	padding-top:5px;
	text-decoration:none;
	text-align:center;	 
	font-size:15px;
	margin:5px;
	
}

.nav li a:hover{
background:black;
color:white;
}
</style>
<?php
	include("database.php");
	$data=$_POST['name'];
	$query="select * from customers where Name='$data'";
	if(!mysqli_query($con,$query))
		die("Failed ".mysqli_error($con));
		$row = mysqli_query($con,$query);
		$result = mysqli_fetch_array($row);
		$uname = $result["Name"];
		$id = $result["S.No"];
		$email = $result["Email"];
		$balance = $result["Current_Balance"];

	?>
</head>
<body>

 <div class="nav">
  
    <ul class="nav navbar-nav navbar-left">

    	<li><a class="active" href="index.php">Home</a></li>
      
      <li><a href="customers.php">View Customers</a></li>
      <li><a href="transaction.php">Transactions</a></li>
    </ul>
  </div>
</nav>
<table align="center" style="width: 600px; line-height:50px;">
		<tr>
			<th colspan="4"><h2>Details of the Customer</h2></th>
		</tr>
		<tr>
			<th>S.No</th>
			<th>Name</th>
			<th>EmailId</th>
			<th>Current Balance</th>
		</tr>
		<tr>
			<td><?php echo $id ?></td>
			<td><?php echo $uname ?></td>
			<td><?php echo $email ?></td>
			<td><?php echo $balance ?></td>
		</tr>
	</table>

	<form method="POST" action="amount_transaction.php">
	<div class="container">
		<?php
  		echo "<Button class='btn' type='submit' name='name' value=$uname>Transfer Money</Button>";
  		?>

	</div> 
	</form>
    </html>