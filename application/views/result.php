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
		<script src="https://giftfinder-bbbros.rhcloud.com/js/Results.js"></script>
		<script src="https://giftfinder-bbbros.rhcloud.com/js/Data.js"></script>
		
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Roboto+Condensed:700' rel='stylesheet' type='text/css'>

		<script>
		window.onload = function() {
			results = new Results(<? echo $likes ?>, <? echo $interests ?>);
		}
		</script>

	</head>

	<body>

		<!-- Contains everything in the website -->
		<div class="container">
			
    		<div class="header">
    			<a href="https://giftfinder-bbbros.rhcloud.com/">Big Booty Bros</a>
    		</div>


			<!-- Recommendation Row -->
			<div class="row intro" style="margin-bottom: 0px;">
				<div class="recommendation" id="recommendation">
					Displaying Results for <i><? echo $name ?></i>
					<div style="margin-top: 15px; font-size: 0.6em;">
						<a id="refButton" href="#">Refine Results</a>
						<div id="refine" style="text-align: center; margin: 0px auto; display: none;">
							<div class="form-horizontal" style="width: 300px; margin-left: 250px; margin-top: 20px;">
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
							      <button id="update" class="btn">Update</button>
							    </div>
							  </div>
							</div>
						</div>
						<script>
						$(function(){
							$("#refButton").click(function(){
								$("#refine").stop(true, false).slideToggle("slow");
							});
							$("#update").click(function(){
								results.update();
							});
						});
						</script>
					</div>
				</div>
			</div>

			<!-- Here contains all of the hits we get -->
			<div class="container" id="renderInto" style="margin-top:10px;">
				<div style="text-align: center; display: block; opacity: 0.5; font-size: 1.2; font-style: italic; margin: 20px auto;"> Loading... </div>
			</div>
		
			<br/>
			<br/>
		</div><!-- Container -->

	</body>

</html>
