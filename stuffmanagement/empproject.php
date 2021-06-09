<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `project` where eid = '$id'";
	$result = mysqli_query($conn, $sql);
	
?>



<html>
<head>
	<title>Employee Panel | Arup Soumya Corporation</title>
	<!--<link rel="stylesheet" type="text/css" href="styleview.css">-->
		<style>
	body {
  margin: 0;
  background-color: rgba(201, 76, 76, 0.3);
  font-family: Arial, Helvetica, sans-serif;
}
nav ul {
	display: inline;
	padding: 0px;
	float: right;
}

nav ul li{
	display: inline-block;
	list-style-type: none;
	color: white;
	float: left;
	margin-left: 12px;
	

}

nav ul li a{
	color: white;
	text-decoration: none;	
}


nav ul ul{
	display: none;
	position: absolute;
}


.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: blue;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
header h1{
	display: inline;
	font-family: 'Lobster', cursive;
	font-weight: 400;
	font-size: 32px;
	float: left;
	color: white;
	margin-top: 0px;
	margin-right: 10px;
}

table {
margin: 0px;
  border-collapse: collapse;
  width: 100%;
  font-family: "Lucida Console", "Courier New", monospace;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(odd){background-color: #f2f2f2}
tr:hover {background-color:#76D7C4;}

th {
  background-color: #4CA;
  color: white;
}

.p-t-20 {
  padding-top: 20px;
}

.btn {
  line-height: 40px;
  display: inline-block;
  padding: 0 25px;
  cursor: pointer;
  font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
  color: #fff;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
  font-size: 14px;
  font-weight: 700;
}

.btn--radius {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}

.btn--green {
  background: #57b846;
}

</style>
</head>
<body>
	
	<header><div class="topnav">
		<nav>
			<h1>Arup Soumya Corp.</h1>
			<ul id="navli">
				<li><a  href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a  href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a  href="changepassemp.php?id=<?php echo $id?>"">Change password</a></li>
				<li><a class="active" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a  href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a  href="elogin.html">Log Out</a></li>
			</ul>
		</nav></div>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">


		<table>
			<tr>

				<th align = "center">Project ID</th>
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				<th align = "center">Sub Date</th>
				<th align = "center">Mark</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

					echo "<tr>";
					echo "<td>".$employee['pid']."</td>";
					echo "<td>".$employee['pname']."</td>";
					echo "<td>".$employee['duedate']."</td>";
					echo "<td>".$employee['subdate']."</td>";
					echo "<td>".$employee['mark']."</td>";
					echo "<td>".$employee['status']."</td>";
					echo "<td><a href=\"psubmit.php?pid=$employee[pid]&id=$employee[eid]\">Submit</a>";

				}


			?>

		</table>

		</body>
</html>