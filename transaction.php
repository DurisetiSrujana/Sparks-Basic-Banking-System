	<?php
$url = 'b.jpg';
?>
<html>
<head>
<title>Transaction history</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
</head>
<style>
table, td, th {
  border: 2px solid gray;
}

table {
  border-collapse: collapse;
  width: 60%;
  border:5px;
}

td,th {
  text-align: center;
  font-size: 20px;
  color:white;
  padding:12px;
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
    background-size: auto;
    height: 100%; 

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
<body>

 <div class="nav">
  
    <ul class="nav navbar-nav navbar-left">
      <li><a href="index.php">Home</a></li>
      <li><a href="customers.php">View Customers</a></li>
      <li><a href="transaction.php">Transactions</a></li>
    </ul>
	</div>
	
  <br><br><br>
<?php
	include("database.php");
	$query="select * from transactions";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0)
	{ 
		echo "<center><div>";
		echo "<table>";
		echo "<tr>";
			echo "<th colspan='5'><h2>Transaction History</h2></th>";
		echo "</tr>";
		echo "<tr>";
			echo "<th>Sender</th>";
			echo "<th>Receiver</th>";
			echo "<th>Amount</th>";
			echo "<th>Time</th>";
		echo "</tr>";
			while($row=mysqli_fetch_assoc($result))
			{
			echo "<tr>
				<td>".$row['Sender']."</td>
				<td>".$row['Receiver']."</td>
				<td>".$row['Amount']."</td>
				<td>".$row['Time']."</td>
			</tr>";
			}
			echo "</table></div></center>";
		}
		else
			echo "0 results";
		mysqli_close($con);
		?>
</body>
</html>