/**
 * @author Diego
 */

function Home(a) {
	document.getElementById("goToResult").addEventListener("click", this.result.bind(this))
}

Home.prototype = {

	result: function() {
		var val = document.getElementById("friendname").value.toLowerCase();
		if(assoch[val]){
			window.location = "https://giftfinder-bbbros.rhcloud.com/main/result/" + assoch[val];
		}
	}
	
}
