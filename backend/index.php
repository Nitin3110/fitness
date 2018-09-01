<?php 

/*--------------------*/
// App Name: Trainer Fit
// Description: Trainer Fit Ionic App
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
// Version: 1.00
/*--------------------*/

session_start();

if (isset($_SESSION['username'])){
    
    header('Location: ./controller/home.php');
} else {
    
    header('Location: ./controller/login.php');
}



?>