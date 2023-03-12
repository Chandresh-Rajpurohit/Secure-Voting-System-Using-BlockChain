//SPDX-License-Identifier: MIT
pragma solidity >=0.4.0 <0.9.0;
pragma experimental ABIEncoderV2;
contract Election {

    address public owner;
    string public winnerName;
    // string public eventName;
    uint public totalVote;
    bool votingStarted;

    struct Candidate{
        string name;
        uint age;
        string party;
        uint votes;
        // address candidateAddress;
    }

    struct Voter{
        bool registered;
        bool voted;
    }

     event success(string msg);

    // mapping(address=>uint) public candidates;
     mapping(string=>uint) public candidates;
    Candidate[] public candidateList;
    mapping(address=>Voter) public voterList;

    constructor(){
        owner = msg.sender;
        // eventName = _eventName;
        totalVote = 0;
        votingStarted=false;
    }

    function registerCandidates(string memory _name, uint _age, string memory _party) public {
        require(msg.sender == owner, "Only owner can register Candidate!!");
        // require(_candidateAddress != owner, "Owner can not participate!!");
        require(candidates[_name] == 0, "Candidate already registered");
        Candidate memory candidate = Candidate({
            name: _name,
            age: _age,
            // registered: true,
            votes: 0,
            // candidateAddress: _candidateAddress
            party :_party
        });
        if(candidateList.length == 0){ //not pushing any candidate on location zero;
            candidateList.push();
        }
        candidates[_name] = candidateList.length;
        candidateList.push(candidate);
        emit success("Candidate registered!!");
    }

    function whiteListAddress(address _voterAddress) public {
        require(_voterAddress != owner, "Owner can not vote!!");
        require(msg.sender == owner, "Only admin can authorise the voter!!");
        require(voterList[_voterAddress].registered == false, "Voter already authorised!!");
        Voter memory voter = Voter({
            registered: true,
            voted: false
        });

        voterList[_voterAddress] = voter;
        emit success("Voter registered!!");
    }

    function startVoting() public {
        require(msg.sender == owner, "Only admin can start voting!!");
        votingStarted = true;
        emit success("Voting Started!!");
    }

    function putVote(string memory _name) public {
        require(votingStarted == true, "Voting not started yet or ended!!");
        require(msg.sender != owner, "Owner can not vote!!");
        require(voterList[msg.sender].registered == true, "Voter not registered!!");
        require(voterList[msg.sender].voted == false, "Already voted!!");
        // require(candidateList[candidates[_name]].registered == true, "Candidate not registered");

        candidateList[candidates[_name]].votes++;
        voterList[msg.sender].voted =true;

        uint candidateVotes = candidateList[candidates[_name]].votes;

        if(totalVote < candidateVotes){
            totalVote = candidateVotes;
            winnerName = _name;
        }
        emit success("Voted !!");
        
    }

    function stopVoting() public {
        require(msg.sender == owner, "Only owner can start voting!!");
        votingStarted = false;
        emit success("Voting stoped!!");
    }

    function getAllCandidate() public view returns(Candidate[] memory list){
        return candidateList;
    }

    function votingStatus() public view returns(bool){
        return votingStarted;
    }

    function getWinner() public view returns(Candidate memory candidate){
        require(msg.sender == owner, "Only owner can declare winner!!");
        return candidateList[candidates[winnerName]];
    }
}




