/**
 * @author Diego
 */

function Home(a) {
	document.getElementById("goToResult").addEventListener("click", this.result.bind(this))
}

Home.prototype = {

	result: function() {
		console.log("Clicked!");
		var val = document.getElementById("friendname").value.toLowerCase();
		if(assoch[val]){
			window.location = "http://bbb.austinh100.com/main/result/" + assoch[val];
		}
	}
	
}
