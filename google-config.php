//<?php   
//      config.php
//    session_start();
//	require_once "googleapi/vendor/autoload.php";
//	$gClient = new Google_Client();
//	$gClient->setClientId("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
//	$gClient->setClientSecret("xxxxxxxxxxxxxxxxxxxxxx");
//	$gClient->setApplicationName("techjunkgigs");
//	$gClient->setRedirectUri("http://localhost/login/g-callback.php");
//	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
//	$con = new mysqli('localhost', 'root','' ,'table');
//    if ($con->connect_error) {
//    die("Connection failed: " . $con->connect_error);
//}	
//?>


//<?php
//          g_callback.php
//	require_once "config.php";
//	if (isset($_SESSION['access_token']))
//		$gClient->setAccessToken($_SESSION['access_token']);
//	else if (isset($_GET['code'])) {
//		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
//		$_SESSION['access_token'] = $token;
//	} else {
//		header('Location: login.php');
//		exit();
//	}
//	$oAuth = new Google_Service_Oauth2($gClient);
//	$userData = $oAuth->userinfo_v2_me->get();
//	$_SESSION['id'] = $userData['id'];
//	$_SESSION['email'] = $userData['email'];
//	$_SESSION['gender'] = $userData['gender'];
//	$_SESSION['picture'] = $userData['picture'];
//	$_SESSION['familyName'] = $userData['familyName'];
//	$_SESSION['givenName'] = $userData['givenName'];
// $sql="insert into google_users (clint_id,name,last_name,google_email,gender,picture_link) values
// ('".$userData['id']."','".$userData['givenName']."','".$userData['familyName']."','".$userData['email']."',
// '".$userData['gender']."','".$userData['picture']."')";
//	mysqli_query($con,$sql);
//	header('Location: index.php');
//	exit();
//?>


<?php


    session_start();
    
    echo $_POST['id'];
	echo $_POST["name"];
    echo $_POST["email"];
    echo $_POST["img"];


	$_SESSION['id'] = $_POST['id'];
	$_SESSION["name"] = $_POST["name"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["img"] = $_POST["img"];



    $mysqli = new mysqli("localhost", "root", "", "google");

        $sql = "SELECT * FROM google_users WHERE google_id='".$_POST["id"]."'";
    
    
    
    $result = $mysqli->query($sql);
	if(!empty($result->fetch_assoc())){		
    $sql2 = "UPDATE users SET google_email='".$_POST["email"]."',name='".$_POST["name"]."', picture_link='".$_POST["img"]."'  WHERE google_id='".$_POST["id"]."' ";
        
    }
    else{	
        $sql2 = "INSERT INTO google_users (name,google_email, google_id,picture_link) VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["id"]."', '".$_POST["img"]."')";	

    }
    $mysqli->query($sql2);
	echo "Updated Successful";
?>