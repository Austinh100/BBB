<!DOCTYPE html>
<html>
   
   <!-- 
   		
   		This project is dedicated to men everywhere who have no clue what to give their women friends for their birthdays and other
   		celebrations we may or may not know. Its based on her likes on FB so therefore it takes information that we know to be true
   		simply because it was posted on the internet. Hopefully this will help you in the long run, I'm sure it will help us.
     	
   -->
   
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Gift Giving</title>
        
        <link href="http://austinh100.com/bigbootybros/public/styles/bootstrap.css" rel="stylesheet" media="screen">
		<link href="http://austinh100.com/bigbootybros/public/styles/main.css" rel="stylesheet">
		<script src="http://austinh100.com/bigbootybros/public/js/jquery.js"></script>
		<script src="http://austinh100.com/bigbootybros/public/js/bootstrap.min.js"></script>
		<script src="http://austinh100.com/bigbootybros/public/js/Home.js"></script>
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300|Roboto+Condensed:700' rel='stylesheet' type='text/css'>
		
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
    			<a href="index.php">Big Booty Bros</a>
    		</div>
    		
    		<!-- This is the personals page div, it will contain all of the options available to the user -->
    		<div class="row intro" style="margin-top: 50px;">
    			
    			<!-- This will contain all of the information about past transactions -->
    			<div class="span3">
    				
    				<!-- Profile -->
    				<div id="myProfile" class="homePage" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
    					<br/><span class="name" style="font-size: 1.2em; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $name; ?></span> <br/>
    				</div>
					
    			</div>
    			
    			<div class="span6">
    				
    				<div id="search" class="homePage">
    					<br/><span class="name">Find A Gift</span> <br/>
    					<span class="transactions">Find the perfect gift for anybody you know.</span>
						<div style="margin-top: 20px;">
							<input id="friendname" type="text" placeholder="Enter Friend's Name..." style="width: 300px; padding: 15px; height: 40px; font-size: 1.3em;"/>
							
							<script>
							
							var friends = <?php if($friends){echo $friends;}else{echo "{}";} ?>;
							
							var fname = [];
							
							for(var i = 0; i < friends.data.length; i++){
								fname.push(friends.data[i].name);
							}
							console.log(fname);
							
							$("#friendname").typeahead({source: fname})
							
							
							</script>
							
							<div class="find-button">Find Ideas</div>
						</div>
    				</div>
    				
    				
    			</div>
    			
    			<div class="span3">
    				
    				<div id="trending" class="homePage">
    					<br/><span class="name">Trending Items</span> <br/>
    					<span class="transactions">Click this button</span>
    				</div>
    				
    				
    			</div>
    			
    		</div>
    		
    	</div><!-- Container -->
        
    </body>




</html>
