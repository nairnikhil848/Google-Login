<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="227800607955-egoratauc7ao454ubl0f011pmaqad1u3.apps.googleusercontent.com">
    <script src="google.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>HACKED</title>
</head>
<body>
    <?php session_start(); ?>
       <div class="row justify-content-center">
           <div class="col-md-4 col-offset-4 "  >
               <h2 align="center">Profile Details</h2>
                <img id="pic" class="img-circle" width="100" height="100"/><br>
                <p>ID</p>
                <p id="ID" class="alert alert-danger"></p>
                <p>Name</p>
                <p id="name" class="alert alert-danger"></p>
                <p>Email Address</p>
                <p id="email" class="alert alert-danger"></p>
                
                <script>

                $("#pic").attr('src',"<?php echo $_SESSION['img']; ?>");
                $("#ID").text("<?php echo $_SESSION['id'];  ?>");
                $("#name").text("<?php echo $_SESSION['name'];  ?>");
                $("#email").text("<?php echo $_SESSION['email'];  ?>");
                
                
                </script>
                
                <button onclick="signOut()" class="btn btn-danger">Signout</button>
                <script>
                    function signOut() {
                    
                        window.location.href ='login.php';
                      console.log('User signed out.');
                    <?php session_destroy(); ?>
                }
                </script>

            </div>
        </div>
            
</body>
</html>

