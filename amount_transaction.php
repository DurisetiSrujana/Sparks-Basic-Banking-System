<?php
include("database.php");
session_start();
$data=$_POST['name'];
$sql="select Name from customers where NOT Name='$data'";
$result=mysqli_query($con,$sql);
?>
<?php
$url = 'b.jpg';
?>
<html>
<head>
	<title>Transfer Money</title>
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
<style>
table.center {
  margin-left: auto; 
  margin-right: auto;
  width: 300px;
  height: 200px;
  margin-top: 50px;
}
td,th{
	text-align:center;
	color:white;
}
.btn {
  background-color:white;
  border: none;
  color: black;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  
 position:absolute;
  border-radius: 20px;
  margin-left:0px;
  margin-top:270px;
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
	<script type="text/javascript">
		function send() {
			// body...
			var a = document.getElementById("sender").value;
			var arr = ["sai","vineela","ramya","chandu","srujana","pavani","priya","leela","gopika","siri"];
			var index = arr.indexOf(a);
    		if (index > -1) 
        		arr.splice(index, 1);
        	var str = "";
        	for (var i = 0; i < arr.length; i++) 
        		str = str +"<option value="+arr[i]+">"+arr[i]+"</option>";
        	
        	document.getElementById("receiver").innerHTML = str;
		}
	</script>
</head>
<body>
 <div class="nav">
  
    <ul class="nav navbar-nav navbar-left">
      <li><a href="index.php">Home</a></li>
      <li><a href="customers.php">View Customers</a></li>
      <li><a href="transaction.php">Transactions</a></li>
    </ul>
  </div>
</nav>

	<form method="post" action="amount_updation.php">
	<table border="2" class="center">
	<th colspan="2" >Transfer Amount</th>
	<tr><td><b>Receiver Name </b></td>
	<td style="color:black;">
		<select id="receiver" name="receiver" style="width: 150px; height: 30px; font-size: 18px;" required>
		<option selected>Select </option>
		<?php
			while ($row = $result->fetch_assoc()) 
			{
				$uname1 = $row['Name'];
				echo "<option value=$uname1 name='name'>";
				echo $uname1;
				echo "</option>";
			}
		?>
	</select>
	</td>
	</tr>
	<tr><td><b>Amount </b></td>
		<td style="color:black;">
		<input type="number" min="1" name="transfer" placeholder="Enter Amount" style="width: 150px; height: 30px; font-size: 18px;" required>
		</td>
	</tr>
		<center><?php echo "<button name='sender' value=$data class='btn'>Transfer</button>";?></center>
	
</form>

</table>
</body>
</html>