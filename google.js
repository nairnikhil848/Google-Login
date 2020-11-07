// GOOGLE

function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  $.ajax({
    type: "POST",
    url: "google-config.php",
    data: {
      img: profile.getImageUrl(),
      name: profile.getName(),
      id: profile.getId(),
      email: profile.getEmail()
      //gender:profile.getgender()
    }
  })
    .done(function(data) {
      console.log(data);
      window.location.href = "google-endfile.php";
      console.log(data);
    })
    .fail(function() {
      window.alert("Posting failed.");
    });

  //$(".first").css("display","none");
  //$(".second").css("display","block");
  //$("#pic").attr('src',profile.getImageUrl());
  //$("#ID").text(profile.getId());
  //$("#name").text(profile.getName());
  //$("#email").text(profile.getEmail());
}

// FACEBOOK

window.fbAsyncInit = function() {
  FB.init({
    appId: "745075585981597",
    autoLogAppEvents: true,
    xfbml: true,
    version: "v5.0"
  });
};

(function(d, s, id) {
  var js,
    fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {
    return;
  }
  js = d.createElement(s);
  js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
})(document, "script", "facebook-jssdk");

// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
  if (response.status === "connected") {
    // Logged into your app and Facebook.
    // we need to hide FB login button
    // $('#fblogin').hide();
    //fetch data from facebook
    getUserInfo();
  } else if (response.status === "not_authorized") {
    // The person is logged into Facebook, but not your app.
    // $('#status').html('Please log into this app.');
  } else {
    // The person is not logged into Facebook, so we're not sure if
    // they are logged into this app or not.
    // $('#status').html('Please log into facebook');
  }
}

// This function is called when someone finishes with the Login
// Button. See the onlogin handler attached to it in the sample code below.
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

function FBLogin() {
  console.log("DONE BOIS");
  FB.api("/me", function(response) {
    console.log(JSON.stringify(response));
  });
  FB.login(
    function(response) {
      if (response.authResponse) {
        FB.api(
          "/me",
          {
            locale: "en_US",
            fields: "id,first_name,last_name,email,link,gender,locale,picture"
          },
          function(userData) {
            $.post(
              "process.php",
              {
                oauth_provider: "facebook",
                userData: JSON.stringify(userData),
                action: "1"
              },
              function(data) {
                if (data == "1") {
                  window.location = "google-endfile.php";
                } else {
                  alert("Something goes wrong");
                }
              }
            );
          }
        );
        getUserInfo(); //Get User Information.
      } else {
        alert("Authorization failed.");
      }
    },
    { scope: "email" }
  );
}

FB.api("/me", function(response) {
  console.log(JSON.stringify(response));
});

function getUserInfo() {
  FB.api("/me", function(response) {
    $.ajax({
      type: "POST",
      dataType: "json",
      data: response,
      url: "process.php",
      success: function(msg) {
        if (msg.error == 1) {
          alert("Something Went Wrong!");
        } else {
          // $('#fbstatus').show();
          // $('#fblogin').hide();
          $("#name").text("Name : " + msg.name);
          $("#email").text("Email : " + msg.email);
          // $('#fbfname').text("First Name : "+msg.first_name);
          // $('#fblname').text("Last Name : "+msg.last_name);
          $("#ID").text("Facebook ID : " + msg.id);
          $("#pic").html(
            "<img src='http://graph.facebook.com/" + msg.id + "/picture'>"
          );
        }
      }
    });
  });
}
