function Etsy(username, callback){
	this.callback = callback;
	this.username = username;
	$.ajax("https://openapi.etsy.com/v2/users/" + this.username + "?api_key=4hysmxelcygo4kizxsgpfg2b", {
	}).done((function(inSender){
		if(inSender){
			$.ajax("https://openapi.etsy.com/v2/users/" + inSender.user_id + "/favorites/listings?api_key=4hysmxelcygo4kizxsgpfg2b", {
			}).done((function(inSender){
				if(inSender){
					console.log("DONE! inSender");
				}else{
					this.callback([]);
				}
			}).bind(this));
		}else{
			this.callback([]);
		}
	}).bind(this));
}