//Only global. Lame hack, I know.
var _etsyCallback;


function getEtsy(username, callback){
	console.log(username);
	var s = document.createElement("script");
	s.src= "http://openapi.etsy.com/v2/users/"+username+".js?callback=getUser&api_key=nis5hjtjnkc5v37k52yj3hyy";
	document.getElementsByTagName("head")[0].appendChild(s);
	_etsyCallback = callback;
}
 
function getUser(data) {
	console.log(data);
        if( data.ok ) {
			getListings(data.user_id)
        } else {
			_etsyCallback([]);
        }
}

function getListings(username){
	console.log(username);
	var s = document.createElement("script");
	s.src= "http://openapi.etsy.com/v2/users/"+username+"/favorites/listings.js?callback=findAllUserFavoriteListings&api_key=nis5hjtjnkc5v37k52yj3hyy";
	document.getElementsByTagName("head")[0].appendChild(s);
 
}
 
function findAllUserFavoriteListings(data) {
	console.log(data);
	var listings = [];
    if( data.ok ) {
        console.log(data);
        for( var i = 0; i < data.count; i++ )
        {
            listings.push(data.results[i]);
        }
		_etsyCallback(listings);
    } else {
        _etsyCallback([]);
    }
}