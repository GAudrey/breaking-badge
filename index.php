
  <!DOCTYPE html>
  <html lang="en">
  
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="assets/style.css">
      <link rel="shortcut icon" href="assets/image/icon.png" type="image/x-icon">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree&family=Chakra+Petch&display=swap" rel="stylesheet">
      <title>Breaking Badge</title>
  </head>
  <header>
          <?php include('components/navbar.php'); ?>
  </header>
  <body>
          <?php 
            if(!isAuthenticated()){
                  include_once('pages/login.php'); 
            }else{
              if($_SESSION['account_type'] === "ADMIN"){
                  include('./pages/dashboard_admin.php');
              }else{
                  include('./pages/dashboard_user.php');
              }
            }

            ?>

              
  </body>
  <script src="./pages/script.js" defer></script> 
  </html>
