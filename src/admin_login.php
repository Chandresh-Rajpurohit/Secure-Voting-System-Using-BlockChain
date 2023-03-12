<!DOCTYPE html>

<html >
   <head>
   <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
      <title>Admin Login Form</title>
      <link rel="stylesheet" type="text/css" href="css/admin_login.css?v=2">
   
     
   </head>
   
    <body>
   <div class= "back">
   <img src="images/intro-bg.jpg" >
</div>
      <div class="center">
      <h2>SECURE VOTING SYSTEM</h2>
        
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
               ADMIN LOGIN
            </div>
            <form action="#">
               <div class="data">
                  <label>Username</label>
                  <input type="text" id ="uname" required>
               </div>
               <div class="data">
                  <label>Password</label>
                  <input type="password" id="pass" required>
               </div>
               
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit" onclick= "login()" id ="submit">login</button>
               </div>
               
            </form>
         </div>
      </div>
   </body>
</html>


<script src="js/admin_login.js"></script>