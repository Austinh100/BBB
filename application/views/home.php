<!DOCTYPE html>
<html>
   
   <!-- 
   		
   		This project is dedicated to men everywhere who have no clue what to give their women friends for their birthdays and other
   		celebrations we may or may not know. Its based on her likes on FB so therefore it takes information that we know to be true
   		simply because it was posted on the internet. Hopefully this will help you in the long run, I'm sure it will help us.
     	
   -->
   
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Giftr</title>
        
        <link href="https://giftfinder-bbbros.rhcloud.com/styles/bootstrap.css" rel="stylesheet" media="screen">
		<link href="https://giftfinder-bbbros.rhcloud.com/styles/main.css" rel="stylesheet">
		<script src="https://giftfinder-bbbros.rhcloud.com/js/jquery.js"></script>
		<script src="https://giftfinder-bbbros.rhcloud.com/js/bootstrap.min.js"></script>
		<script src="https://giftfinder-bbbros.rhcloud.com/js/Home.js"></script>
		
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600|Roboto+Condensed:700' rel='stylesheet' type='text/css'>
		
		<script>
			window.onload = function(){
				var home = new Home();
			}
		</script>
        
    </head>
    
       
    <body>
    	
    	
    	<!-- Contains everything in the website -->
    	<div class="container" id="splash">
    		<div class="header">
    			<a href="#">Giftr</a>
    		</div>
    		
    		<!-- This is the personals page div, it will contain all of the options available to the user -->
    		<div class="row intro" style="margin-top: 50px;">
    			
    			<div class="span8">
    				
    				<div id="search" class="homePage">
    					<br/><span class="name">Find A Gift</span> <br/>
    					<span class="transactions">Find the perfect gift for anybody you know.</span>
						<div style="margin-top: 20px;">
							<input id="friendname" type="text" placeholder="Enter Friend's Name..." style="width: 300px; padding: 15px; height: 40px; font-size: 1.3em;" autofocus/>
							
							<script>
							
							var friends = <?php if($friends){echo $friends;}else{echo "{}";} ?>;
							
							var fname = [];
							var assoch = {};
							
							for(var i = 0; i < friends.data.length; i++){
								fname.push(friends.data[i].name);
								assoch[friends.data[i].name.toLowerCase()] = friends.data[i].id
							}
							
							$("#friendname").typeahead({source: fname})
							
							
							</script>
							
							<div id="goToResult" class="find-button">Find Ideas</div>
						</div>
    				</div>
    				
    				
    			</div>
				
				
    			<!-- This will contain all of the information about past transactions -->
    			<div class="span4">
    				
    				<!-- Profile -->
    				<div id="myProfile" class="homePage" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; background: rgb(187, 179, 177) !important; color: white;">		
					<div style="margin-top: 50px; opacity: 0.5; font-weight: 600;">
						Logged In As
					</div>
					
					<div style="height: 100px; width: 100px;margin: 20px auto; background-image: url(<? echo $seven ?>); background-size: contain;"></div>
						
    					<div class="name" style="font-size: 1.2em; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-weight: 600;"><?php echo $name; ?></div>
    				</div>
					
    			</div>
    			
    			
    		</div>
    		
    	</div><!-- Container -->
        
    </body>




</html>
