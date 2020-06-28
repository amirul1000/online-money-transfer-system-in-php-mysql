<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<title>Rits Chat</title>
  	<link rel="icon" href="data:;base64,iVBORw0KGgo=">
  	
  	<!-- <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
	
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

	<script type="text/javascript">
    	initApp = function() {
    		firebase.auth().onAuthStateChanged(function(user) {
          		if (user) {
		            // User is signed in.
		            var displayName = user.displayName;
		            var email = user.email;
		            var emailVerified = user.emailVerified;
		            var photoURL = user.photoURL;
		            var uid = user.uid;
		            var phoneNumber = user.phoneNumber;
		            var providerData = user.providerData;
		            user.getIdToken().then(function(accessToken) {
		            	document.getElementById('sign-in-status').textContent = 'Welcome ' + displayName;
		              	document.getElementById("username").value = displayName;
		              	//window.location = "profile.html";
		              
		            });

		            var database = app.database();
					var auth = app.auth();
					var storage = app.storage();
					var databaseRef = database.ref().child('messages');

					var usernameInput = document.querySelector('#username');
					var textInput = document.querySelector('#text');
					var postButton = document.querySelector('#post');

					postButton.addEventListener("click", function(evt) {	
						var msgUser = usernameInput.value;
						var msgText = textInput.value;
						var chatMsg = {username: msgUser, text: msgText};
						databaseRef.push().set(chatMsg);
						textInput.value = "";
					});

					var startListening = function() {
				    	databaseRef.on('child_added', function(snapshot) {

					        var msg = snapshot.val();
					        alert(msg.text);
					        snapshot.orderByChild("username").equalTo("Md Sohrab Hossan");
					      
					        var msgUsernameElement = document.createElement("b");
					        msgUsernameElement.textContent = msg.username + ":";
					        
					        var msgTextElement = document.createElement("span");
					        msgTextElement.textContent = " " + msg.text;
					  
					        var msgElement = document.createElement("div");
					        msgElement.appendChild(msgUsernameElement);
					        msgElement.appendChild(msgTextElement);
					        msgElement.className = "msg";
					        document.getElementById("results").appendChild(msgElement);
				    	});
				    }
				    startListening();

          		} else {
		            // User is signed out.
		            window.location = "login.php";
          		}
	        }, function(error) {
	          console.log(error);
	        });
    	};

		window.addEventListener('load', function() {
			initApp()
		});
    </script> -->

  	<style>
		body {
		  font-family: 'HelveticaNeue-Light';
		}
		.msg {
		  margin: 10px 0;
		  padding: 10px;
		  width: 400px;
		  background-color: #efefef;
		}
		#username, #text {
		  margin: 5px 0px;
		}
		#post {
		  padding: 0.5em 1em;
		  background-color: #50b1ff;
		  border: none;
		  color: #FFF;
		}
	</style>
</head>
<body>
	<div id="sign-in-status"></div>
	<button id="btnSignout" style="background: red;
    border: 1px solid #fff;
    padding: 12px 42px;
    font-size: 22px;
    color: #FFF;
    border-radius: 8px;">Sign Out</button> 
	<input id="chatUserId" type="hidden" value=""> 
<!-- 	<textarea id="chatMessage" placeholder="Message"></textarea><br/>
	<input id="text" type="text" placeholder="Message"><br/> -->
	<button id="btnChat" style="background: red;
    border: 1px solid #fff;
    padding: 12px 42px;
    font-size: 22px;
    color: #FFF;
    border-radius: 8px;">Login</button><br/>
	<div id="results"></div>


	<script type="text/javascript" src="scripts/jquery-3.1.1.min.js"></script>
  	
  	<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>

  	<script type="text/javascript">
  		$(document).ready(function(){

  			var config = {
			    apiKey: "AIzaSyC2XmYIzNwOEdlDvxDnNd-C4vw9sIRe5_w",
			    authDomain: "chat-f12b5.firebaseapp.com",
			    databaseURL: "https://chat-f12b5.firebaseio.com",
			    projectId: "chat-f12b5",
			    storageBucket: "chat-f12b5.appspot.com",
			    messagingSenderId: "838979858459"
			  };
			firebase.initializeApp(config);

			

			var group = 'funny_bangla_video';

			//var Auth = firebase.auth(); 
			var dbRef = firebase.database();
  			var chatRef = dbRef.ref('messages')
			//var dbRef = firebase.database('messages');
			//var chatRef = dbRef.ref.child('messages');
			var usersRef = dbRef.ref('users');

			var auth = null;

			firebase.auth().onAuthStateChanged(function(user){
		      if (user){

		      	$('#sign-in-status').append(user.email);

		      	var order = 99999999999999;

		      	var query = chatRef.child(group).orderByChild('order')


		      	query.on("child_added", function(snap) {
	                var html = '';
	                var userName = snap.val().userName;
					html += '<li class="list-group-item contact">';
						html += userName + ' : '+snap.val().chatMessage;
					html += '</li>';
					$('#results').append(html);
	            });

		        $('#btnChat').on("click", function( event ){
		        	var query1 = chatRef.child(group).orderByChild('order').limitToLast(1);
		        	query1.on('child_added', function(snap) {
					  order = parseInt(snap.val().order) - 1;
					  alert(order);
					});
					var userId = user.uid;
					var userName = user.displayName == null ? user.email : user.displayName;
					var chatMessage = $('#chatMessage').val();
					var timestamp = $.now();
					timestamp = timestamp;
					//alert(timestamp);
					var chatMsg = {userId: userId, userName: userName, chatMessage: chatMessage, timestamp: timestamp, order: order};

					chatRef.child(group).push(chatMsg);
				});
		      }else{


		      	$('#btnChat').on("click", function( event ){

		      	 window.location = "login.php"; 
		      	});
		      

		      	 
		      }
		    }, function(error) {
		            console.log(error);
		    });	

		    $('#btnSignout').on("click", function( event ){

				firebase.auth().signOut();
				window.location = "login.php";

			});	

  		});

  	</script>

</body>

</html>