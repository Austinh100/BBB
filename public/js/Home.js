/**
 * @author Diego
 */

function Home(a) {
	document.getElementById("goToResult").addEventListener("", this.result.bind(this))
}

Home.prototype = {

	result: function() {
		var val = document.getElementById("friendname").value;
		if(assoch[val]){
			window.location = "http://bbb.austinh100.com/main/result/" + assoch[val];
		}
	}
	
}
