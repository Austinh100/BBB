/**
 * @author Diego
 */

function Home(a) {
	
	//Parse the a to get the profile name and ideas;
	
	var that = this;
	
	document.getElementById("myProfile").addEventListener("click", function() {
		that.profile(a);
	}, false);
	
	document.getElementById("search").addEventListener("click", function() {
		that.search();
	}, false);
	
	document.getElementById("trending").addEventListener("click", function() {
		that.trending();
	}, false);
}

Home.prototype = {

	profile: function() {
		var d = document.createElement("div");
		d.className += "individualProfile";
		
		var parent = document.getElementById("container");
		parent.appendChild(d);
		
		
		//input data depending on the information passed on
		
				
	},
	
	search: function() {
		window.location = "index.php/result/jordangens";
	},
	
	trending: function() {
		
	}
	
}
