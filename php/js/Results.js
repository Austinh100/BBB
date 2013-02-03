/**
 * @author Diego
 */

function Results(likes, interests) {
	this.likes = this.makeArray(likes);
	this.interests = this.makeArray(interests.data);
	
	//These are both additional filters:
	this.pinterest = [];
	this.etsy = [];
	
	this.analyze();
}

Results.prototype = {
	update: function(){
		var user = $("#pinterestInput").val();
		//Kick off to data layer:
		$.ajax("https://giftfinder-bbbros.rhcloud.com/pinterest/pinterest.php", {
			method: "get",
			data: {
				user: user
			}
		}).done((function(inSender){
			console.log(inSender);
			this.pinterest = inSender;
			this.analyze();
		}).bind(this));
		//TODO: Top Prices:
	},
	makeArray: function(obj){
		var arr = [];
		for(var x in obj){
			arr.push(obj[x].name);
		}
		return arr;
	},
	analyze: function(){
		
		$("#renderInto").html('<div style="text-align: center; display: block; opacity: 0.5; font-size: 1.2; font-style: italic; margin: 20px auto;"> Loading... </div>');
		
		var input = [
				this.pinterest,
		        this.likes,
		        this.interests,
		        this.etsy
		];
		var ret = bigArrayAnalysis(input);
		//Keep it to 25:
		if(ret.length >= 15){
			ret.splice(15, ret.length-14);
		}
		var req = "";
		for(var i = 0; i < ret.length; i++){
			req += ret[i][0] + ","
		}
		
		//Kick off to data layer:
		$.ajax("https://giftfinder-bbbros.rhcloud.com/amazon.php", {
			method: "get",
			data: {
				terms: req
			}
		}).done(function(inSender, inEvent){
			
			
			var renderInto = $("#renderInto");
			
			renderInto.html(" ");
			
			for(var i = 0; i < 5; i++){
				var top = $("<div>").addClass("row");
			
				var left = $("<div>").addClass("span6").append(
					$("<div>").addClass("hit").append(
						$("<div>").addClass("hit-header").html("Because They Like")
					).append(
						$("<div>").addClass("hit-label").html(ret[i][0])
					)
				);
				
				var product = inSender[ret[i][0]];
				console.log(product);
				
				var right = $("<div>").addClass("span6").append(
					$("<div>").addClass("selling")
				)
				
				top.append(left).append(right);
				
				renderInto.append(top);
			}
			
		});
	}
}
