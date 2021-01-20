<?php
include_once('db.php');


  // Similar to "include_once" but for sessions
  // Calls "session_start()" unless it has already been called on the page


  function session_start_once(){
    if(session_status() == PHP_SESSION_NONE){
      return session_start();
    }
  }

  function isAuthenticated(){
    session_start_once();
    return !empty($_SESSION['user_id']);
  }

  // function isAdmin(){
  //   session_start_once();
  //   return isAuthenticated && $_SESSION['account_type'] == 'ADMIN';
  // }


  function login($email, $password){
    // session_start_once();
    $cursor = createCursor();
    $query = $cursor->prepare('SELECT id, password,account_type from users WHERE email=?');
    $query->execute([$email]);
    $results = $query->fetch();
    // $cursor->closeCursor();
    if(!empty($results) && password_verify($password, $results['password'])){
      $_SESSION['user_id'] = $results['id'];
      $_SESSION['account_type'] = $results['account_type'];
      $_SESSION['email'] = $email;
      return true;
    }
    return false;
  }

function signin(){
  $noExist = false;
  $cursor = createCursor();
  $recherche = $cursor->query("SELECT * FROM users");
      while($donnee = $recherche->fetch()){
          if($donnee['email'] === $_POST['email']){
              echo '<div class="middleText">','L',"'",'email ',$donnee['email'];
              echo ' existe déjà !</div>';
              $recherche->closeCursor();
              $noExist = true;
          }
      }
      if($noExist !== true){  
          $email = $_POST['email'];
          $pass = $_POST['pwd'];
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $hachachePWD = password_hash("$pass",PASSWORD_DEFAULT);
          $addUser = $cursor->prepare("INSERT INTO users (email,password,firstname,lastname,account_type) VALUES (?,?,?,?,?)"); 
          $addUser->execute(array($email,$hachachePWD,$firstname,$lastname,"NORMIE")); 
          echo '<div class="middleText" >Vous êtes inscrit !</div>';
          $recherche->closeCursor();
      } 
}
  // function logout(){
  //   session_start();
  //   session_destroy();
  //   header("Location: ../index.php");
  // }

          // en attente
//   if(isset(($_POST['email']))&&isset(($_POST['pwd']))){         
//     $recherche = $bdd->query("SELECT * FROM users");
//         while($donnee = $recherche->fetch()){
//             if($donnee['email'] === $_POST['email'] ){
//                 $recherche->closeCursor();
//                 if(password_verify($_POST['pwd'],$donnee['password'])){
//                     $_SESSION['id'] = $donnee['id'];
//                     $_SESSION['statut'] = $donnee['password'];
//                     $_SESSION['email'] = $donnee['email'];
//                     header("Location: index.php");  
//                 }   
//             }
//     } 
// } 

  function getBadges(){

  }

  function getAllBadges(){
    $cursor = createCursor();
    $recherche = $cursor->query("SELECT * FROM table_badges");
    while($donnee = $recherche->fetch())
    {
      echo $donnee['badge_name'];
    }
    $recherche->closeCursor();
  }

  function getUsers(){

  }

  function createBadge(){

  }

  function editBadge($badge_id){

  }

  function removeBadge($badge_id){

  }

  function grantBadgeToUser($badge_id, $user_id){

  }

  function removeBadgeFromUser($badge_id, $user_id){

  }
?>