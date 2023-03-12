import {connectWeb3Metamask} from './metamask.js';
import {registerCandidates, whiteListAddress, getAllCandidate, getWinner, startVoting, stopVoting} from './metamask.js';


const Conntinstance= await connectWeb3Metamask();
console.log("ACCOUNT",String(Conntinstance.accounts));
console.log("INSTNCAE",Conntinstance.instance);

var can,age,party;

 var element = document.getElementById("submit");
element.onclick= async function regcan() {
   can  = document.getElementById("Id").value;
   age  = document.getElementById("age").value;
   party  = document.getElementById("party").value;
   registerCandidates(Conntinstance.instance,String(Conntinstance.accounts),String(can),Number(age),String(party));
 
}
//  window.addEventListener("click",

