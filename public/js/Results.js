/**
 * @author Diego
 */

function Results(a) {
	
	//I want a to be all of our arguements
	//Name of the person we are sending too
	//The top hit
	//The rest of the hits
	
	this.load.bind(a);
}

Results.prototype = {
	
	load: function(a) {
		
		//Here is where we parse the a into its components which can be sent to the other functions to be loaded
		
		var recommendee;
		
		var topHitItem;
		var topHitData = [];
		var topHitRecommendations = [];
		
		var restItems = [];
		var restRecommendations = []
		
		this.setRecommendation(recommendee);
		this.setTopHit(topHitItem, topHitRecommendations);
		this.setRest(restItems, restRecommendations);
		
	},
	
	setRecommendation: function(r) {
		
		var resultString = "Displaying Results for " + r;
		
		var parent = document.getElementById("recommendation");
		parent.innerHTML += resultString;
		
	},
	
	setTopHit: function(thi, thr) {
		
	},
	
	setRest: function(ri, rr) {
		
	}
	
}
