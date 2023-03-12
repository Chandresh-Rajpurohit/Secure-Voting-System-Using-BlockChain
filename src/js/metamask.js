// let Web3 = require('web3');
 import ElectionContract from '../../build/contracts/Election.json' assert { type: 'json' };
//<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>

  export async   function connectWeb3Metamask() {
    const web3 = new Web3(Web3.givenProvider);
    await window.ethereum.enable();
    const accounts = await web3.eth.getAccounts();
    const networkId = await web3.eth.net.getId();
    //  console.log("Injected web3 detected.", accounts, networkId);
     const deployedNetwork = await ElectionContract.networks[networkId];
     const instance = new web3.eth.Contract(
       ElectionContract.abi,
        deployedNetwork.address
     );
    //  console.log("Instance IS ",ElectionContract);
    //  console.log("Abi IS ",ElectionContract.abi);
      return {accounts, instance};

}
window.addEventListener('load',connectWeb3Metamask);

 
// async function registerCandidates(contractInstance, account, _name, _age, _party){
//     try {
//          console.log(account);
//         let res2 = await contractInstance.methods.registerCandidates(
//             _name,
//             Number(_age),
//             _party
//         ).send({from: String(account), gas: 30000});
    
//         console.log("Res:",res2);
//         return {error: false, message: res2.events.success.returnValues.msg}
//     } catch (error) {
//         console.log("Error:",error);
//         return {error: true, message: error.message}
//     }
    
// }

// async function whiteListAddress(contractInstance, account, _voterAddress){
//     try {
//         let res2 = await contractInstance.methods.whiteListAddress(_voterAddress).send({from: account});
//         console.log("Res:",res2);
//         return {error: false, message: res2.events.success.returnValues.msg}
//     } catch (error) {
//         console.log("Error:",error);
//         return {error: true, message: error.message}
//     }
        
// }

// async function startVoting(contractInstance, account){
//     try {
//         let res2 = await contractInstance.methods.startVoting().send({from: account});
//         console.log("Res:",res2);
//         return {error: false, message: res2.events.success.returnValues.msg}
//     } catch (error) {
//         console.log("Error:",error);
//         return {error: true, message: error.message}
//     }
    
// }

// async function stopVoting(contractInstance, account){
//     try {
//         let res2 = await contractInstance.methods.stopVoting().send({from: account});
//         console.log("Res:",res2);
//         return {error: false, message: res2.events.success.returnValues.msg}
//     } catch (error) {
//         console.log("Error:",error);
//         return {error: true, message: error.message}
//     }
    
// }

// async function votingStarted(contractInstance, account){
//     try {
//         let res2 = await contractInstance.methods.votingStatus().call({from: account});
//         console.log("Res:",res2);
//         return {error: false, message: res2}
//     } catch (error) {
//         console.log("Error:",error);
//         return {error: true, message: error.message}
//     }
    
// }

// async function getWinner(contractInstance, account){
//     try {
//         let res2 = await contractInstance.methods.getWinner().call({from: account});
//         console.log("res:", res2);
//         return {error: false, message: {candidateAddress: res2.candidateAddress, age: res2.age, name: res2.name}}
//     } catch (error) {
//         console.log("Error:",error);
//         return {error: true, message: error.message}
//     }
    
// }

// async function getAllCandidate(contractInstance, account){
//     try {
//         let candidateList = []
//         let res2 = await contractInstance.methods.getAllCandidate().call({from: account});

//         for(let i=1;i<res2.length;i++){
//             candidateList.push(res2[i])
//         }

//         console.log("list:", candidateList);
//         return {error: false, message: candidateList}
//     } catch (error) {
//         console.log("Error:",error);
//         return {error: true, message: error.message}
//     }
    
// }

// async function putVote(contractInstance, account, _candidateAddress){
//     try {
//         let res2 = await contractInstance.methods.putVote(_candidateAddress).send({from: account, gas: 3000000});
//         console.log("res:",res2);
//         return {error: false, message: res2.events.success.returnValues.msg}
//     } catch (error) {
//         console.log("Error:",error);
//         return {error: true, message: error.message}
//     }
    
// }

// export {
//     putVote,
//     getAllCandidate,
//     getWinner,
//     registerCandidates,
//     whiteListAddress,
//     startVoting,
//     stopVoting,
//     votingStarted
// }