<?php



  if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$conn = mysqli_connect("localhost", "root", "", "voter_register");


	if($conn === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
			$Voter_Id = $_POST['Id'];
			$Address = $_REQUEST['address'];
			
			 $sql = "SELECT * FROM `Register` where `address`= '$Address' ";
			
			//     $sql = "INSERT INTO Register  VALUES ('$Voter_Id','$Address')";
				 $save = mysqli_query($conn,$sql);
				 $rows = mysqli_num_rows($save);
				 
				 if($rows>=1){
					echo "<h3 style='position: absolute;margin-top: 520px;padding-left: 35pc;font-size: 20px;'>Voter Has Already Register</h3>";
				
				//    echo "<h3>Voter Has Already Register</h3>";
					// echo'<script>alert("Voter Has Already Register")</script>';
				 }else{
	
				 
			$sql = "INSERT INTO Register  VALUES ('$Voter_Id','$Address')";
		
			if(mysqli_query($conn, $sql)){
				echo "<h3 style='position: absolute;margin-top: 520px;padding-left: 35pc;font-size: 20px;'>Registred successfully.</h3>";
				// echo'<script>alert("Registred successfully")</script>';
				} else{
					echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
				}
			}
			 
		// Close connection
		
				mysqli_close($conn);
		}
		

           ?>
    
           

<!DOCTYPE html>
<html>
<head>
	<title>Navigation Bar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/voter_reg.css">
</head>
<body>

	<nav>
		<div class="logo">
			<p>E-VOTING</p>
		</div>
		<ul>
            <li><a href="index.php" >Home</a></li>
			<li><a href="voter_reg.php"class="active" >Voter Registration</a></li>
			<li><a href="vote.php">Voting</a></li>
			<li><a href="voter_result.php">Result</a></li>
			<li><a href="http://localhost/demo/Voting%20System/login_otp/logout.php">Log Out</a></li>
			<!-- <li><a href="">portfolio</a></li>
			<li><a href="">contact</a></li> -->
		</ul>
	</nav>
	<div class="image">
		<img src="images/intro-bg.jpg" >
		<h2>REGISTER YOURSELF FOR VOTING</h2>
	</div>


    <div class="container">
        
            <form method="POST"  action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="form-input">
                    <input type="text" name="Id" placeholder="Enter the Voting ID"/>	
                </div>
                <div class="form-input">
                    <input type="text" name="address" placeholder="Enter the Ethereum Address"/>
                </div>
                <input type="submit"  value="REGISTER" class="btn-login"/>
            </form>
        </div>
	
     


	

</body>
</html>

