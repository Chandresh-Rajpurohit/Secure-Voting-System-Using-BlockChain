<!DOCTYPE html>
<html>
<head>
	<title>SECURE VOTING SYSTEM USING BLOCKCHAIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <script type="module"  src="voting.js"> </script> -->
<style>
	.btn-login{
    position: relative;
	padding: 15px 25px;
    border: black solid 2px;
    border-radius: 18px;
	margin-left: 40pc;
    margin-top: 20px;

    background-color: #68adef;
    color: #080808;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
}
.btn-login1{
    position: relative;
	padding: 15px 25px;
    border: black solid 2px;
    border-radius: 18px;
	margin-left: 40.5pc;
    margin-top: 20px;
    margin-bottom: 42px;
    background-color: #68adef;
    color: #080808;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
}
h2{
	text-align: center;
    padding-top: 100px;
    position: relative;
    letter-spacing: 1.5px;
    font-size: 30px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  /* border: black 2px solid; */
   margin-top: 20px;
    margin-left: 14pc;
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

.cont{
    position: relative;
}
.Button{
    position: relative;
    padding: 6px 15px;
    border: black solid 2px;
    border-radius: 18px;
    /* margin-left: 39pc;
    margin-top: 20px; */
    background-color: #68adef;
    color: #080808;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}
	</style>
<script type="module">
  import {connectWeb3Metamask} from './js/metamask.js';
  const Conntinstance= await connectWeb3Metamask();


 var element = document.getElementById("ref");
element.onclick= async function regcan() {
	
		const instance =Conntinstance.instance;
         const account = Conntinstance.accounts;
        let res2 = await instance.methods.votingStatus().call({from: String(account)});
        console.log("Res:",res2);    
		if(res2==true){
			votingStarted();
			
		}else{
			votingNotStarted();
		}

	}

	var element = document.getElementById("submit");
element.onclick=async function putvote(){
var e = document.getElementById("selectNumber");
var value = e.value;
var name = e.options[e.selectedIndex].text
        console.log(name);
    const instance =Conntinstance.instance;
    const account = Conntinstance.accounts;
    try {
    let res2 = await instance.methods.putVote(name).send({from: String(account), gas: 3000000});
    console.log("res:",res2);
    
} catch (error) {
    console.log("Error:",error);
}
}

	
	async function votingStarted(){
			document.getElementById("info").innerHTML = "Voting IS Started. You Can Vote Now !!!!!";
			const instance =Conntinstance.instance;
         const account = Conntinstance.accounts;
			let candidateList = []
        let res2 = await instance.methods.getAllCandidate().call({from: String(account)});

        for(let i=1;i<res2.length;i++){
            candidateList.push(res2[i])
        }
        console.log(candidateList);
        var html ="<table border= '1|1' class= 'table' id='table'>";
        setTimeout(() => {
            html+="<thread>";
            html+="<tr>";
            html+="<td>"+'Sr No'+"</td>";
            html+="<td>"+' Candidate Name'+"</td>";
            html+="<td>"+'Age'+"</td>";
            html+="<td>"+'Party Name'+"</td>";
			// html+="<td>"+'Vote '+"</td>";
          
            html+="</tr>";
            html+="</thread>";
            for(var i =0;i<candidateList.length;i++){
                var sno= i+1;
                html+="<tr>";
                html+="<td>"+sno+"</td>";
                html+="<td>"+candidateList[i].name+"</td>";
                html+="<td>"+candidateList[i].age+"</td>";
                html+="<td>"+candidateList[i].party+"</td>";
                // html+="<td>"+`<button type="button" onclick ='putvote(${candidateList[i].party})' class="Button">Vote</button>`+"</td>";
                html+="</tr>";
            }
            html+="</table>";
            document.getElementById('table').innerHTML =html
        }, 200);

		document.getElementById("selectNumber").style.visibility = "visible";
        document.getElementById("submit").style.visibility = "visible";
	
	}
	function votingNotStarted(){
		document.getElementById("info").innerHTML =" Voting is Stopped. You Cannot Vote Now!!!!!";
		
	}

	const instance =Conntinstance.instance;
    const account = Conntinstance.accounts;
	var select = document.getElementById("selectNumber");
	let candidateList = []
	let res2 = await instance.methods.getAllCandidate().call({from: String(account)});

for(let i=1;i<res2.length;i++){
	candidateList.push(res2[i])
}

for(var i = 0; i < candidateList.length; i++) {
    var opt =  candidateList[i].name ;
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select.appendChild(el);
}
   
	</script>
</head>

<body >

	<nav>
		<div class="logo">
			<p>E-VOTING</p>
		</div>
		<ul>
			<li ><a href="index.php"   >Home</a></li>
			<li><a href="voter_reg.php" >Voter Registration</a></li>
			<li><a href="vote.php"  class="active">Voting</a></li>
			<li><a href="voter_result.php">Result</a></li>
            <li><a href="http://localhost/demo/Voting%20System/login_otp/logout.php">Log Out</a></li>
			<!-- <li><a href="">portfolio</a></li>
			<li><a href="">contact</a></li> -->
		</ul>
	</nav>
	<div class="image">
		<img src="images/intro-bg.jpg" >
		<h2 id ="info"> Election is not Started Yet!!!!!
		</h2>
		<input type="submit"  id = "ref" type="submit" value="Refresh" class="btn-login"/>
	</div>
	<div class="cont" id="tab">
        <div id ="table" ></div>

		<select  id="selectNumber" style="
    margin-top: 6pc;
    margin-left: 34pc;
	margin-bottom: 40px;
    font-size: 15px;
    font-weight: bold;
    background: transparent;
    padding: 7px 29px;
    border: 2px solid;
	visibility: hidden
">
    <option>Choose a Candidate Name</option>
</select>


<input  style="visibility: hidden" type="submit"  id = "submit" type="submit" value="Vote" class="btn-login1"/>

</body>
</html>