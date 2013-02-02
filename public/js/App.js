/**
 * @author Diego Deveras
 * Winnder: Sexiest Man Alive, 2012-2013
 */

function App(url) {
	document.getElementById("startBtn").addEventListener("click", this.start.bind(this),false);
	this.fader();
	this.url = url;
}

App.prototype = {
	forArr: [
		"your girlfriend",
		"your mother",
		"your friend",
		"your roommate",
		"your wife",
		"your daughter",
		"your son"
	],
	
	current: 0,
	
	fader: function(){
		if(this.current >= this.forArr.length){
			this.current = 0;
		}
		$("#fader").fadeOut((function(){
			$("#fader").html("... for " + this.forArr[this.current]).fadeIn((function(){
				this.current++;
				window.setTimeout(this.fader.bind(this), 3000);
			}).bind(this));
		}).bind(this));
	},
	
	start: function() {
		window.location = this.url;
	}
	
}
