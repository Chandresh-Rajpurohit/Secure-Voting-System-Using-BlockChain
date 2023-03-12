<!DOCTYPE html>
<html>
<head>
	<title>SECURE VOTING SYSTEM USING BLOCKCHAIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/admin.css?v=1">
    <link rel="stylesheet" type="text/css" href="css/voter_validate.css?v=1">
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  /* border: black 2px solid; */
   margin-top: 10px;
    margin-left: 16pc;
    font-size: 19px;
	position: relative;
    font-weight: bold;
    
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding : 11px 10px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.btn{
	 position: relative;
    padding: 5px 10px;
    border: black solid 2px;
    border-radius: 12px;
    margin-top: 20px;
    background-color: #68adef;
    color: #080808;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;'
}
</style>
	<!-- <link rel="stylesheet" type="text/css" href="admin.css">  -->

  
<script type ="module">
		import {connectWeb3Metamask} from './js/metamask.js';
// import {registerCandidates, whiteListAddress, getAllCandidate, getWinner, startVoting, stopVoting} from './metamask.js';
    const Conntinstance= await connectWeb3Metamask();

 var element = document.getElementById("validate");
  element.onclick= async function validateVoter() {
  const address  = document.getElementById("address").value;
  const instance =Conntinstance.instance;
  const account = Conntinstance.accounts;
  
   try {
        let res2 = await instance.methods.whiteListAddress(address).send({from: String(account), gas: 3000000});
        console.log("Res:",res2);
         alert("Voter Validated Successfully");
        // return {error: false, message: res2.events.success.returnValues.msg}
    } catch (error) {
        console.log("Error:",error);
        // return {error: true, message: error.message}
    }
}
  </script>
</head>
<body>

	<nav>
		<div class="logo">
			<p>E-VOTING</p>
		</div>
		<ul>
			<li ><a href="admin.php"   >Home</a></li>
			<li><a href="adminAddCandidate.php" >Add Candidate</a></li>
			<li><a href="candidatelist_result.php">Candidate List</a></li>
			<li><a href="voter_validate.php" class="active">Verify Voter</a></li>
			<li><a href="change.php">Change Phase </a></li>
			<li><a href="result.php">Result</a></li>
      <li><a href="admin_login.php">Log Out</a></li>
		</ul>
	</nav>
	<div class="image">
		<img src="images/intro-bg.jpg" >
		<h2>VALIDATE VOTER</h2>
	</div>
    <div class="container">
        
        <form >
            <div class="form-input">
                <input type="text" id="address"  name="validate" placeholder="Validate the Voter Address"/>	
            </div>
            <input type="submit"  id = "validate" type="submit" value="ADD" class="btn-login"/>
        </form>
    </div>

	<?php
$conn = mysqli_connect("localhost", "root", "", "voter_register");


$result = mysqli_query($conn, "SELECT * FROM `Register`  "); // using mysqli_query instead
?>
   <table width="60%" >
        <tr style="border: black 2px solid;">
             <td> Sr. No</td>
            <td >Voter Address</td>
            <!-- <td >Validate Voter </td> -->
           
            
        </tr>
		<tr>
                <?php 
                    $counter = 0;
                  while($res = mysqli_fetch_array($result))
                  {
                ?>
                  <td><?php echo ++$counter; ?></td>
                  <td><?php echo $res['Address']; ?></td>
                  <!-- <td><a  class="btn">Validate</a></td>   -->
                 
                </tr>
                <?php    
                  }
                
                ?>
        
        
    </table>
    



	

</body>
</html>