<!-- <?php

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

 $conn = mysqli_connect("localhost", "root", "", "candidate_list");

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
        $Candidate_Id = $_POST['Id'];
         $Age =$_POST['age'];
        $Party = $_REQUEST['party'];
        $sql = "INSERT INTO candidate  VALUES ('$Candidate_Id','$Age','$Party')";
    
		mysqli_query($conn, $sql);
//  echo "<h3 style='position: absolute;margin-top: 520px;padding-left: 35pc;font-size: 20px;'> Candidate Registred successfully.</h3>";
	//   echo'<script>alert("Registred successfully")</script>';	
	    mysqli_close($conn);

}
           ?> -->
    
                
<!DOCTYPE html>
<html>
<head>
	<title>Navigation Bar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/admin.css?v=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/voter_reg.css">

	<script type ="module">
		import {connectWeb3Metamask} from './js/metamask.js';
// import {registerCandidates, whiteListAddress, getAllCandidate, getWinner, startVoting, stopVoting} from './metamask.js';


const Conntinstance= await connectWeb3Metamask();


 var element = document.getElementById("submit");
element.onclick= async function regcan() {
  const can  = document.getElementById("Id").value;
  const age  = document.getElementById("age").value;
  const party  = document.getElementById("party").value;
  const instance =Conntinstance.instance;
  const account = Conntinstance.accounts;
  
   try {
	console.log("ACCOUNT",String(account));
console.log("INSTNCAE",instance);
console.log(can,age,party);
         console.log(account);
        let res2 = await instance.methods.registerCandidates(
            can,
            Number(age),
            party
        ).send({from: String(account), gas: 3000000});
		   
        
            alert("Successful Transcation");
        console.log("Res:",res2);
        return {error: false, message: res2.events.success.returnValues.msg}
    } catch (error) {
        console.log("Error:",error);
        return {error: true, message: error.message}
    } 
}
// window.addEventListener("click", registerCandidates(Conntinstance.instance,String(Conntinstance.accounts),can,Number(age),party));
		</script>
</head>
<body>

	<nav>
		<div class="logo">
			<p>E-VOTING</p>
		</div>
		<ul>
            <li ><a href="admin.php"   >Home</a></li>
			<li><a href="adminAddCandidate.php" class="active" >Add Candidate</a></li>
			<li><a href="candidatelist_result.php">Candidate List</a></li>
			<li><a href="voter_validate.php">Verify Voter</a></li>
			<li><a href="change.php">Change Phase </a></li>
			<li><a href="result.php">Result</a></li>
            <li><a href="admin_login.php">Log Out</a></li>
		</ul>
	</nav>
	<div class="image">
		<img src="images/intro-bg.jpg" >
		<h2>ADD CANDIDATE</h2>
	</div>


    <div class="container">
        
	<form   >
			<!-- <form    action="candlist.php" method="post" > -->
                <div class="form-input">
                    <input type="text" name="Id" id="Id" placeholder="Enter the Candidate Name"/>	
                </div>
                <div class="form-input">
                    <input type="text" name="party" id="party" placeholder="Enter the Party Name"/>
                </div>
                <div class="form-input">
                    <input type="text" name="age" id="age" placeholder="Enter the Age"/>
                </div>
                <!-- <input type="submit"  type="submit" onclick ="regcan(document.getElementById('Id').value,document.getElementById('age').value,document.getElementById('party').value)" value="ADD" class="btn-login"/>
            </form> -->

			<input   id="submit" type="submit" value="ADD" class="btn-login"/> 
            </form>
        </div>
	

</body>
</html>

<!-- <script type="module"  src="functions.js"> </script> -->
<!-- <script type="module"  src="metamask.js"> </script> -->