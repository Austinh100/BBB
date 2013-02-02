<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<!--

	This page displays the results for any search query the user inputs. It is beautiful and boutiful which is proper for we are
	the Big Booty Bros

	-->

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Gift Giving</title>
		
		<link href="https://giftfinder-bbbros.rhcloud.com/styles/bootstrap.css" rel="stylesheet" media="screen">
		<link href="https://giftfinder-bbbros.rhcloud.com/styles/main.css" rel="stylesheet">
		<script src="https://giftfinder-bbbros.rhcloud.com/js/jquery.js"></script>
		<script src="https://giftfinder-bbbros.rhcloud.com/js/bootstrap.min.js"></script>
		<script src="https://giftfinder-bbbros.rhcloud.com/public/js/Results.js"></script>
		
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Roboto+Condensed:700' rel='stylesheet' type='text/css'>

		<script>
			window.onload = function() {
				var results = new Results(<? echo $likes ?>, <? echo $interests ?>);
			}
		</script>

	</head>

	<body>

		<!-- Contains everything in the website -->
		<div class="container">
			
    		<div class="header">
    			<a href="#">Big Booty Bros</a>
    		</div>


			<!-- Recommendation Row -->
			<div class="row intro" style="margin-bottom: 0px;">
				<div class="recommendation" id="recommendation">
					Displaying Results for <i><? echo $name ?></i>
					<div style="margin-top: 15px; font-size: 0.6em;">
						<a id="refButton" href="#">Refine Results</a>
						<div id="refine" style="text-align: center; margin: 0px auto; display: none;">
							<form class="form-horizontal" action="#" style="width: 300px; margin-left: 250px; margin-top: 20px;">
							  <div class="control-group">
							    <label class="control-label" for="pinterestInput" style="text-alrign: right;">Pinterest Username</label>
							    <div class="controls">
							      <input type="text" id="pinterestInput" placeholder="pinterest...">
							    </div>
							  </div>
							  <div class="control-group">
							    <label class="control-label" for="etsyInput">Etsy Username</label>
							    <div class="controls">
							      <input type="text" id="etsyInput" placeholder="etsy...">
							    </div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="maxPrice">Max Price</label>
							    <div class="controls">
									<div class="input-prepend">
									  <span class="add-on">$</span>
									  <input id="maxPrice" type="text" style="width: 80px;">
									</div>
							    </div>
							  </div>
							  <div class="control-group">
							    <div class="controls">
							      <button type="submit" class="btn">Update</button>
							    </div>
							  </div>
							</form>
						</div>
						<script>
						$(function(){
							$("#refButton").click(function(){
								$("#refine").stop(true, false).slideToggle("slow");
							});
						});
						</script>
					</div>
				</div>
			</div>

			<!-- Here contains all of the hits we get -->
			<div class="container" style="margin-top:10px;">
				
				<!-- This is the top hits row, it's gonna get very confusing and very fast. -->
				<div class="row">

					<!-- Here is the top hit item -->
					<div class="span6">
						<div id="hit" class="hit">
							<div class="hit-header">
								Because They Liked
							</div>
							<div class="hit-label">
								The Avengers
							</div>
						</div>
					</div>

					<!-- Here is the recommended items from Amazon -->
					<div class="span6">

						<!-- Here is where the items are gonna be stored. Because it is a top hit it will have three items, the
						content of which is gonna be manipulated in a java script file
						-->
						<div id="buy1" class="selling"></div>

						<div id="buy2" class="selling"></div>

						<div id="buy3" class="selling"></div>

					</div>

					<!-- I hard coded the top hit because its always gonna be there, the rest of the hits are gonna be
					generated by javascipt and inputted automatically on a per choose basis -->

				</div><!-- Row -->

				<!-- Here is where the rest of the results are gonna be stored -->
				<!-- By the rest of them, I mean 3 -->
				<div id="resultContainer">

					<!-- This is just a placeholder -->

					<div class="row">
						<div class="span6">

							<div class="hit">
								<div class="hit-header">
									Liked
								</div>
								<div class="hit-label">
									The Dark Knight Rises
								</div>
							</div>

						</div>

						<div class="span6">
							<div class="selling">
							</div>
						</div>

					</div>
					
					<div class="row">
						<div class="span6">

							<div class="hit">
								<div class="hit-header">
									Liked
								</div>
								<div class="hit-label">
									Iron Man 3
								</div>
								
							</div>

						</div>

						<div class="span6">
							<div class="selling">
							</div>
						</div>

					</div>

				</div>

				<div class="nextPage" id="nextPage">
				</div>
			</div>
		
			<br/>
			<br/>
		</div><!-- Container -->

	</body>

</html>
