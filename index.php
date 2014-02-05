 <html>
    <body>
      <div id="fb-root"></div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '274112532704026', // App ID
            status     : true, // check login status
            cookie     : true, // enable cookies to allow the server to access the session
            xfbml      : true  // parse XFBML
          });
          FB.getLoginStatus(function(response){
             if (response.status === 'connected') {
                FB.api('/me/permissions', function (response) {console.log(response.data[0]);});
		var url = "https://graph.facebook.com/me/photos?access_token="+getToken();
		console.log(url);
		document.form.action = url;
             }
          });
        };
        // Load the SDK Asynchronously
        (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
         }(document));
         
         var getToken = function(){
           var token;
           FB.getLoginStatus(function(response) {
           console.log(response);
           token = response.authResponse.accessToken;
           });
           return token;
         };
                       
      </script>

      <div class="fb-login-button" scope="publish_actions">Login with Facebook</div>


	<form name="form" enctype="multipart/form-data" action="#" method="POST">
		<input name="source" type="file"><br/><br/>
		<input name="message" type="text" value="test"><br/><br/>
		<input type="submit" value="Upload" /><br/>
	</form>

    </body>
 </html>