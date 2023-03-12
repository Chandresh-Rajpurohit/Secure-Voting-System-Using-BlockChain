
function login() {

         var uname =document.getElementById("uname").value;
         var pass= document.getElementById("pass").value;
         if((uname== 'admin')&&  (pass== 'admin')){
            console.log("LOGIN")
            // document.location.href='admin.php';
           
            window.open('admin.php');
         }

      }