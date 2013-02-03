/**
 * @author Diego
 */

function Results(likes, interests) {
	this.likes = this.makeArray(likes);
	this.interests = this.makeArray(interests.data);
	this.analyze();
}

Results.prototype = {
	update: function(){
		//TODO: Get other creds.
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
		var input = [
				[],
		        this.likes,
		        this.interests,
		        []
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
						$("<div>").addClass("hit-header").html("Because They Liked")
					).append(
						$("<div>").addClass("hit-label").html(ret[i][0])
					)
				);
				//We show the top three results for the top like/interest/pinterest.
				if(i === 0){
					var right = $("<div>").addClass("span6").append(
						$("<div>").addClass("selling")
					).append(
						$("<div>").addClass("selling")
					).append(
						$("<div>").addClass("selling")
					)
				}else{
					var right = $("<div>").addClass("span6").append(
						$("<div>").addClass("selling")
					)
				}
				
				top.append(left).append(right);
				
				renderInto.append(top);
			}
			
		});
	}
}
