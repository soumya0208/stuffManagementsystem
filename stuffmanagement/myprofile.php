<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);


  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $sql = "SELECT * from `employee` WHERE id=$id";
  $sql2 = "SELECT total from `salary` WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn , $sql2);
  $salary = mysqli_fetch_array($result2);
  $empS = ($salary['total']);
 
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $firstname = $res['firstName'];
  $lastname = $res['lastName'];
  $email = $res['email'];
  $contact = $res['contact'];
  $address = $res['address'];
  $gender = $res['gender'];
  $birthday = $res['birthday'];
  $nid = $res['nid'];
  $dept = $res['dept'];
  $degree = $res['degree'];
  $pic = $res['pic'];
}
}

?>

<html>
<head>
  <title>My Profile | Arup Soumya Corporation</title>
  
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    
    <link href="css/main.css" rel="stylesheet" media="all">
		<style>
	body {
  margin: 0;
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


</style>
	
</head>
<body>
  <header><div class="topnav">
    <nav>
      <h1>Arup Soumya Corp.</h1>
      <ul id="navli">
        <li><a  href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="active" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a  href="changepassemp.php?id=<?php echo $id?>"">Change password</a></li>
				<li><a  href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a  href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a  href="elogin.html">Log Out</a></li>
      </ul>
    </nav></div>
  </header>
  
  <div class="divider"></div>
  

    <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">My Info</h2>
                    <form method="POST" action="myprofileup.php?id=<?php echo $id?>" >

                        <div class="input-group">
                          <img src="process/<?php echo $pic;?>" height = 150px width = 150px>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>First Name</p>
                                     <input class="input--style-1" type="text" name="firstName" value="<?php echo $firstname;?>" readonly >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Last Name</p>
                                    <input class="input--style-1" type="text" name="lastName" value="<?php echo $lastname;?>" readonly>
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                          <p>Email</p>
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $email;?>" readonly>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Date of Birth</p>
                                    <input class="input--style-1" type="text" name="birthday" value="<?php echo $birthday;?>" readonly>
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Gender</p>
                                  <input class="input--style-1" type="text" name="gender" value="<?php echo $gender;?>" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                          <p>Contact Number</p>
                            <input class="input--style-1" type="number" name="contact" value="<?php echo $contact;?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>NID</p>
                            <input class="input--style-1" type="number" name="nid" value="<?php echo $nid;?>" readonly>
                        </div>

                        
                         <div class="input-group">
                          <p>Address</p>
                            <input class="input--style-1" type="text"  name="address" value="<?php echo $address;?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>Department</p>
                            <input class="input--style-1" type="text" name="dept" value="<?php echo $dept;?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>Degree</p>
                            <input class="input--style-1" type="text" name="degree" value="<?php echo $degree;?>" readonly>
                        </div>


                        <div class="input-group">
                          <p>Total Salary</p>
                            <input class="input--style-1" type="text" name="degree" value="<?php echo $empS;?>" readonly>
                        </div>

                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green"  name="send" >Update Info</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


     <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
</body>
</html>
