<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SignIn</title>

  <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
  
  <script>
    var config = {
        apiKey: "AIzaSyC2XmYIzNwOEdlDvxDnNd-C4vw9sIRe5_w",
        authDomain: "chat-f12b5.firebaseapp.com",
        databaseURL: "https://chat-f12b5.firebaseio.com",
        projectId: "chat-f12b5",
        storageBucket: "chat-f12b5.appspot.com",
        messagingSenderId: "838979858459"
      };
    var app = firebase.initializeApp(config);    

  </script>


  <script src="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.css" />
  <script type="text/javascript">
    // FirebaseUI config.
    var uiConfig = {
      signInSuccessUrl: 'index.php',
      signInOptions: [
        // Leave the lines as is for the providers you want to offer your users.
        {
          provider: firebase.auth.FacebookAuthProvider.PROVIDER_ID,
          scopes: [
            'public_profile',
            'email',
            'user_likes',
            'user_friends'
          ],
          customParameters: {
            // Forces password re-entry.
            //auth_type: 'reauthenticate'
          }
        },
        {
          provider: firebase.auth.GoogleAuthProvider.PROVIDER_ID,
          scopes: [
            'https://www.googleapis.com/auth/plus.login'
          ],
          customParameters: {
            // Forces account selection even when one account
            // is available.
            prompt: 'select_account'
          }
        },
        {
          provider: firebase.auth.EmailAuthProvider.PROVIDER_ID,
          requireDisplayName: false
        },
        {
          provider: firebase.auth.PhoneAuthProvider.PROVIDER_ID,
          recaptchaParameters: {
            type: 'image', // 'audio'
            size: 'normal', // 'invisible' or 'compact'
            badge: 'bottomleft' //' bottomright' or 'inline' applies to invisible.
          },
          defaultCountry: 'BD'
        },
        {
          provider: firebase.auth.TwitterAuthProvider.PROVIDER_ID,
          
        },
        {
          provider: firebase.auth.GithubAuthProvider.PROVIDER_ID,
          
        }
        // firebase.auth.FacebookAuthProvider.PROVIDER_ID,
        // firebase.auth.GoogleAuthProvider.PROVIDER_ID,
        // firebase.auth.EmailAuthProvider.PROVIDER_ID,
        // firebase.auth.PhoneAuthProvider.PROVIDER_ID,
        // firebase.auth.GithubAuthProvider.PROVIDER_ID,
      ],
      // Terms of service url.
      tosUrl: '<your-tos-url>'
    };

    // Initialize the FirebaseUI Widget using Firebase.
    var ui = new firebaseui.auth.AuthUI(firebase.auth());
    // The start method will wait until the DOM is loaded.
    ui.start('#firebaseui-auth-container', uiConfig);
  </script>

</head>
<body>
  <div id="firebaseui-auth-container"></div>
</body>
</html>