
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
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>
    <title>LOGIN</title>

</head>
<body>
    <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
    

    <div class="container" style="margin-top:50px">
        <div class="row justify-content-center">
            <div class="col-md-4 col-offset-4 first" align="center">
                <h1 class="heading" align="left" style="border-bottom:5px solid green ;color: grey;">LOGIN<h1><br>
                <form>
                    <input placeholder="Email" name="email" class="form-control"><br>
                    <input type="password" placeholder="Password" name="password" class="form-control"><br>
                    <input type="submit" value="LOG IN" class="btn btn-primary"><br>
                </form>
                <h2>OR</h2><h6>SIGN UP WITH</h6>
                <div class="col-md-12" >
                    <div class="g-signin2 col-md-6" data-onsuccess="onSignIn" style="float:left"></div>
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>
                
                    <a class="fb-login-button col-md-6 FBlogin btn-facebook"  style="float:right" size="large" data-auto-logout-link="false"  window.onlclick="FBLogin();">SIGNUP WITH FACEBOOK</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>