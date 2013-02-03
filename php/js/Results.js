/**
 * @author Diego
 */

function Results(likes, interests) {
	this.likes = this.makeArray(likes);
	this.interests = this.makeArray(interests.data);
	
	//These are both additional filters:
	this.pinterest = [];
	this.etsy = [];
	
	this.states = [0, 0, 0, 0, 0];
	
	this.analyze();
}
//TODO: Max Price
Results.prototype = {
	update: function(){
		//Kick off updates:
		this._pinterest();
	},
	_pinterest: function(){
		var user = $("#pinterestInput").val();
		if(user.trim() === ""){
			this._etsy();
			return;
		}
		//Kick off to data layer:
		$.ajax("https://giftfinder-bbbros.rhcloud.com/pinterest/pinterest.php", {
			method: "get",
			data: {
				user: user
			}
		}).done((function(inSender){
			this.pinterest = inSender || [];
			this._etsy();
		}).bind(this));
	},
	_etsy: function(){
		var etsyUser = $("#etsyInput").val();
		if(etsyUser.trim() === ""){
			this.analyze();
			return;
		}
		
		$.ajax("https://giftfinder-bbbros.rhcloud.com/etsy.php", {
			method: "get",
			data: {
				user: etsyUser
			}
		}).done((function(inSender){
			if(inSender && typeof inSender === "object"){
				this.rawEtsy = inSender;
				this.etsy = [];
				for(var i = 0; i < inSender.length; i++){
					this.etsy.push(inSender[i].title);
				}
				this.analyze();
			}else{
				this.rawEtsy = null;
				this.etsy = [];
				this.analyze();
			}
		}).bind(this)).fail((function(){
			this.rawEtsy = null;
			this.etsy = [];
			this.analyze();
		}).bind(this));
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
		}).done((function(inSender, inEvent){
			
			
			var renderInto = $("#renderInto");
			
			renderInto.html(" ");
			
			if(this.etsy && this.rawEtsy && this.etsy.length > 0){
				var testy = jQuery.extend({}, this.etsy);
				if(testy.length >= 5){
					ret.splice(5, testy.length-4);
				}
				
				if(testy.length !== 0){
					var block = $("<div>").addClass("etsy-block");
					for(var i = 0; i < testy.length; i++){
						console.log(this.rawEtsy[i]);
						block.append($("<div>").html(this.rawEtsy[i].title));
					}
					
					//Render an Etsy block.
					var etsy = $("<div>").addClass("row");
					
					etsy.append($("<div>").addClass("span12").append(
						$("<div>").addClass("etsy").append(
							$("<div>").addClass("etsy-header").html("Etsy Favorites")
						).append(block)
					));
					
					console.log(this.rawEtsy);
				
					renderInto.append(etsy);
				}
			}
			
			for(var i = 0; i < 5; i++){
				
				//reset state:
				this.states[i] = 0;
				
				var top = $("<div>").addClass("row");
			
				var left = $("<div>").addClass("span6").append(
					$("<div>").addClass("hit").append(
						$("<div>").addClass("hit-header").html("Because They Like")
					).append(
						$("<div>").addClass("hit-label").html(ret[i][0])
					)
				);
				
				var product = inSender[ret[i][0]];
				
				
				var that = this;
				var right = $("<div>").addClass("span6");
				right.state = i;
				this.states[i] = {number: i, right: right, product: inSender[ret[i][0]]};
				
				this.addNext(i);
				
				top.append(left).append(right);
				
				renderInto.append(top);
			}
			
		}).bind(this));
	},
	addNext: function(inSender){
		var state = this.states[inSender];
		var that = this;
		if(state.product && state.product[state.number]){
			console.log("adding";)
			state.right.append(
				$("<div>").addClass("selling").append(
					/*$("<div>").addClass("image-amazon").css("backgroundImage", "url(" + state.product[state.number].MediumImage.URL + ")")*/
					$("<div>").html("The Image")
				).append(
					$("<div>").addClass("image-right").html(state.product[state.number].ItemAttributes.Title)
				).click(function(){
					window.open(state.product[state.number].DetailPageURL, '_blank');
				})
			).append($("<a>").html("View More...").click(function(){
				this.remove();
				that.states[inSender].number++;
				that.addNext(inSender);
				//This should not do this. This should go to amazon.
			}));
		}
	}
}
