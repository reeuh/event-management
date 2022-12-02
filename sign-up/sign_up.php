<?php
require_once '../classes/database.php';
$page_title = 'Events by Isabella | Create Account';
require_once '../includes/header.php';

if(isset($_POST['save'])){

    $client = new Client;

    //sanitize user inputs
    $client->firstname = htmlentities($_POST['fn']);
    $client->midname = htmlentities($_POST['mn']);
    $client->lastname = htmlentities($_POST['ln']);
    $client->email = htmlentities($_POST['username']);
    $client->address = htmlentities($_POST['password']);
}

?>
 <div class="login-container">
 <div class="login-form">
        <div class="add-form-create">
            <form class="add-form" action="login.php" method="post">
                <div class="logo-details">
                    <span class="logo-name">Create Account</span>
                </div>

                <hr class="line">
           <label for="firstname">First Name</label>
           <input type="text" id="firstname" name="firstname" placeholder="Enter firstname" required tabindex="1">
           <label for="middlename">Middle Name</label>
           <input type="text" id="middlename" name="middlename" placeholder="*optional"  tabindex="2">
           <label for="lastname">Last Name</label>
           <input type="text" id="lastname" name="lastname" placeholder="Enter lastname" required tabindex="3">
           <label for="username">Username</label>
           <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="4">
           <label for="password">Password</label>
           <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="5">
           <input class="button" type="submit" value="Sign Up" name="submit" tabindex="3">

           <a class="sign-up" href="../login/login.php">Already have an Account?</a>
           <?php
               //Display the error message if there is any.
               if(isset($error)){
                   echo '<div><p class="error">'.$error.'</p></div>';
               }
               
           ?>

                </form>
            </div>
        </div>
    </div>
    </div>

<?php
    require_once '../includes/footer.php';
?>