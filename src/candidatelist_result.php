<!DOCTYPE html>
<html>
<head>
	<title>SECURE VOTING SYSTEM USING BLOCKCHAIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/voter_reg.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css?v=1"> 
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  /* border: black 2px solid; */
   margin-top: 20px;
    margin-left: 11.4pc;
    font-size: 19px;
	position: relative;
    font-weight: bold;
}

td, th {
  border: 2px solid black;
  text-align: center;
  padding: 10px 60px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

h2{
	text-align: center;
    padding-top: 100px;
    position: relative;
    letter-spacing: 1.5px;
    font-size: 30px;
}
.btn-login1{
    position: relative;
    padding: 6px 15px;
    border: black solid 2px;
    border-radius: 18px;
    margin-left: 34pc;
    margin-top: 20px;
    background-color: #68adef;
    color: #080808;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}
.cont{
    position: relative;
}

</style>

<script type="module">
import {connectWeb3Metamask} from './js/metamask.js';
 const Conntinstance= await connectWeb3Metamask()

const instance =Conntinstance.instance;
  const account = Conntinstance.accounts;
  var element = document.getElementById("refresh");
element.onclick= async function regcan() {
    let candidateList = []
        let res2 = await instance.methods.getAllCandidate().call({from: String(account)});

        for(let i=1;i<res2.length;i++){
            candidateList.push(res2[i])
        }
         console.log(candidateList);
        var html ="<table border= '1|1' class= 'table'>";
        setTimeout(() => {
            html+="<thread>";
            html+="<tr>";
            html+="<td>"+'Sr No'+"</td>";
            html+="<td>"+' Candidate Name'+"</td>";
            html+="<td>"+'Age'+"</td>";
            html+="<td>"+'Party Name'+"</td>";
          
            html+="</tr>";
            html+="</thread>";
            for(var i =0;i<candidateList.length;i++){
                var sno= i+1;
                html+="<tr>";
                html+="<td>"+sno+"</td>";
                html+="<td>"+candidateList[i].name+"</td>";
                html+="<td>"+candidateList[i].age+"</td>";
                html+="<td>"+candidateList[i].party+"</td>";
                // html+="<td>"+'<button type= "button" onclick="" >Vote</button>'+"</td>";
                html+="</tr>";
            }
            html+="</table>";
            document.getElementById('table').innerHTML =html
        }, 200);
    }
        //  window.addEventListener('load',regcan);

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
			<li><a href="candidatelist_result.php" class="active" >Candidate List</a></li>
			<li><a href="voter_validate.php">Verify Voter</a></li>
			<li><a href="change.php">Change Phase </a></li>
			<li><a href="result.php">Result</a></li>
            <li><a href="admin_login.php">Log Out</a></li>
		</ul>
	</nav>
	<div class="image">
		<img src="images/intro-bg.jpg" >
		<h2>CANDIDATES LIST</h2>
       
	</div>
    <input type="submit"  id = "refresh" value="SHOW CANDIDATES LIST" class="btn-login1"/> 
     <div class="cont">
        <div id ="table" style="
    margin-left: 2pc;"></div>
        
</div>
</body>
</html>