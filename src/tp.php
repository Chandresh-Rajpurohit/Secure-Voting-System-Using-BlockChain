<?php
$conn = mysqli_connect("localhost", "root", "", "candidate_list");


$result = mysqli_query($conn, "SELECT * FROM `candidate`  "); // using mysqli_query instead
?>
   <table width="60%" >
        <tr style="border: black 2px solid;">
            <td >Candidate Name</td>
            <td >Candidate Age </td>
            <td >Party Name </td>
            
        </tr>
        <?php 
     
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['Name']."</td>";
            echo "<td>".$res['Age']."</td>";
            echo "<td>".$res['Party_Name']."</td>";    
                    
        }
        ?>
    </table>