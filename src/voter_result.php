<!DOCTYPE html>
<html>
<head>
	<title>SECURE VOTING SYSTEM USING BLOCKCHAIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/voter_reg.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>
    <style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  /* border: black 2px solid; */
   margin-top: 20px;
    margin-left: 4.5pc;
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
/* .btn-login1{
    position: absolute;
    padding: 6px 15px;
    border: black solid 2px;
    border-radius: 18px;
    margin-left: 9pc;
    margin-top: 20px;
    background-color: #68adef;
    color: #080808;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}
.btn-login2{
    position: absolute;
    padding: 6px 15px;
    border: black solid 2px;
    border-radius: 18px;
    margin-left: 33pc;
    margin-top: 20px;
    background-color: #68adef;
    color: #080808;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
} */
.btn-login3{
    position: absolute;
    padding: 6px 15px;
    border: black solid 2px;
    border-radius: 18px;
    margin-left: 37pc;
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
#win{
    text-align: center;
    color: #ff0202;
    background: #6183e3;
 
    margin-top: 20px;
}
#win2{
    text-align: center;
    margin-top: 10px;
    
    color: #064015;
    background: #fff949;
    display: block;
}
#win3{
    text-align: center;
    margin-top: 10px;
    background: blueviolet;
    color: #7dfb00;
}
    </style>
    <script type="module">
import {connectWeb3Metamask} from './js/metamask.js';
 const Conntinstance= await connectWeb3Metamask();
 
//  var element = document.getElementById("result");
// element.onclick=async function result() {
//     let candidateList = []
//     const instance =Conntinstance.instance;
//   const account = Conntinstance.accounts;
//     let res2 = await instance.methods.getAllCandidate().call({from: String(account)});

//         for(let i=1;i<res2.length;i++){
//             candidateList.push(res2[i])
//         }
//          console.log(candidateList);
//         var html ="<table border= '1|1' class= 'table'>";
//         setTimeout(() => {
//             html+="<thread>";
//             html+="<tr>";
//             html+="<td>"+'Sr No'+"</td>";
//             html+="<td>"+' Candidate Name'+"</td>";
//             html+="<td>"+'Age'+"</td>";
//             html+="<td>"+'Party Name'+"</td>";
// 			html+="<td>"+'Vote Count  '+"</td>";
          
//             html+="</tr>";
//             html+="</thread>";
//             for(var i =0;i<candidateList.length;i++){
//                 var sno= i+1;
//                 html+="<tr>";
//                 html+="<td>"+sno+"</td>";
//                 html+="<td>"+candidateList[i].name+"</td>";
//                 html+="<td>"+candidateList[i].age+"</td>";
//                 html+="<td>"+candidateList[i].party+"</td>";
//                 //  html+="<td>"+'<button type= "button" onclick="putvote(candidateList[i].name)" class="Button">Vote</button>'+"</td>";
//                 html+="<td>"+candidateList[i].votes+"</td>";
//                 html+="</tr>";
//             }
//             html+="</table>";
//             document.getElementById('table').innerHTML =html
//         }, 200);
//  }

var element = document.getElementById("winner");
element.onclick= async function regcan() {
	
		const instance =Conntinstance.instance;
         const account = Conntinstance.accounts;
        let res2 = await instance.methods.votingStatus().call({from: String(account)});
        console.log("Res:",res2);
        let  v  =0;
        // if(res2==true){
        //     v =1;
        // }else if(res2==false){
        //     v =2;
        // }else{
        //     v =0;
        // }   
		if(res2==true){
			votingStarted();
			
		}else{
			winner();
		}

	}
    async function votingStarted(){
        alert("Voting Is Currently Going On.");
    }
    async function votingNotStarted(){
        alert("Voting Is Not Started Yet.");
    }
 async function winner() {
    const instance =Conntinstance.instance;
  const account = Conntinstance.accounts;
    try {
        let res2 = await instance.methods.getWinner().call({from: String(account)});
        console.log("res:", res2);
        // return {error: false, message: {candidateAddress: res2.candidateAddress, age: res2.age, name: res2.name}}
        document.getElementById("win").innerHTML =" The Winner Of the Election is :  "+res2.name;
        document.getElementById("win2").innerHTML ="  Candidate Party Name is :  "+res2.party;  
        document.getElementById("win3").innerHTML =" No. Of Votes : "+res2.votes; 
    } catch (error) {
        console.log("Error:",error);
        // return {error: true, message: error.message}
    }
}

        // window.addEventListener('load',result);
	</script>
</head>
<body  >


	<nav>
		<div class="logo">
			<p>E-VOTING</p>
		</div>
		<ul>
            <li><a href="index.php" >Home</a></li>
			<li><a href="voter_reg.php" >Voter Registration</a></li>
			<li><a href="vote.php">Voting</a></li>
			<li><a href="voter_result.php" class="active">Result</a></li>
            <li><a href="http://localhost/demo/Voting%20System/login_otp/logout.php">Log Out</a></li>
			
		</ul>
	</nav>
	<div class="image">
		<img src="images/intro-bg.jpg" >
		<h2> RESULT</h2>
	</div>
	<div>
    <!-- <input type="submit"  id = "result" value="SHOW  RESULT" class="btn-login1"/>
    <input type="submit"  id = "display" value="DISPLAY RESULT TO VOTERS" class="btn-login2"/> -->
    <input type="submit"  id = "winner" value="SHOW WINNER " class="btn-login3"/>
</div>
    <div class="cont">
        <div id ="table" style="
    margin-left: 2pc;
    margin-top:100px"></div>
	
<h1 id="win">
<h1 id="win2">
<h1 id="win3">
</body>
</html>
<!-- <script type="module"  src="js/metamask.js"> </script> -->
<!-- <script type="module"  src="metamask.js"> </script> -->