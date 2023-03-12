<!DOCTYPE html>
<html>
<head>
	<title>SECURE VOTING SYSTEM USING BLOCKCHAIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/admin.css?v=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="voter_reg.css"> -->

<style>
.btn-login1{
    position: relative;
    padding: 15px 250px;
    border: black solid 2px;
    border-radius: 18px;
    margin-left: 360px;
    margin-top: 200px;
    background-color: #68adef;
    color: #080808;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}

.btn-login2{
    position: relative;
    padding: 15px 258px;
    border: black solid 2px;
    border-radius: 18px;
    margin-left: 358px;
    margin-top: 38px;
    background-color: #68adef;
    color: #080808;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}
</style>
<script type ="module">
 import {connectWeb3Metamask} from './js/metamask.js';
 const Conntinstance= await connectWeb3Metamask();


var element = document.getElementById("start");
element.onclick= async function startVote() {
const instance =Conntinstance.instance;
  const account = Conntinstance.accounts;
  try {
        let res2 = await instance.methods.startVoting().send({from: String(account)});
        alert("Voting Has Started");
        console.log("Res:",res2);
        // return {error: false, message: res2.events.success.returnValues.msg}
    } catch (error) {
        console.log("Error:",error);
        // return {error: true, message: error.message}
    }
   
}
    var element = document.getElementById("stop");
element.onclick= async function StopVote() {
const instance =Conntinstance.instance;
  const account = Conntinstance.accounts;
  try {
        let res2 = await instance.methods.stopVoting().send({from: String(account)});
        alert("Voting Has Stopped");
        console.log("Res:",res2);
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
			<li><a href="voter_validate.php">Verify Voter</a></li>
			<li><a href="change.php" class="active">Change Phase </a></li>
			<li><a href="result.php">Result</a></li>
            <li><a href="admin_login.php">Log Out</a></li>
		</ul>
	</nav>
	<div class="image">
		<img src="images/intro-bg.jpg" >
		
	</div>
	
<div class="container">
    <input type="submit"  id = "start" value="START VOTING" class="btn-login1"/>

    
</div>
<div>
<input type="submit" id = "stop" value="STOP VOTING" class="btn-login2"/>

</div>
</body>
</html>