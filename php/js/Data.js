/**
 * @author Diego
 */
 
function bigArrayAnalysis(data)
{      
        var existsP = 0;  // Flag for whether or not a keyword has already been logged
        var existsFl = 0;
        var existsFi = 0;
        var length = data[0].length;
       
        if( data[1].length > length )   {
                length = data[1].length;
        }
       
        if( data[2].length > length )   {
            length = data[2].length;
        }
       
       
        var results = [];
        results.push([]);
        results.push([]);
		results.push([]);
       
        var etsyResults = [];
        etsyResults.push([]);
       
        // Assuming data[0] holds pinterest data
        for(var i = 0; i < length; i++) {
               
                if (data[0][i] !== "is" || data[0][i] !== "the" || data[0][i] !== "have" ||
                        data[0][i] !== "I"  || data[0][i] !== "to"  || data[0][i] !== "be" ) {
                               
                               
                               
                for( var j = 0; j < results[0].length; j++ )    {                      
                       
                        if( data[0].length > i && results[0][j] == data[0][i] ) {
                        // Maybe instead of direct comparisons, do word by word comparisons in cases of phrases
                                existsP  = j + 1; // save the location where the word is
                        }
                       
                       
                        if( data[1].length > i && results[1][j] == data[1][i] ) {
                                existsFl = j + 1;
                        }
                    
                        if( data[2].length > i && results[2][j] == data[2][i] ) {
                                existsFi = j + 1;
                        }
               
               
                }//end for
               
                        if( data[0].length > i ) {
                        if( existsP == 0 ) // If the pinterest word does not exist
                        {
                                results[0].push( data[0][i] );
                                results[1].push( 30 );
                        }
                        else // if it does
                        {
                                results[1][existsP - 1] += 15; // Recall the location of the similiar word
                                existsP = 0 // reset exists
                        }
                        }
               
                if( data[1].length > i ) {
                        if( existsFl == 0 )
                        {
                                results[0].push( data[1][i] );
                                results[1].push( 15 );
                        }
                        else
                        {
                                results[1][existsFl - 1] += 10; // Recall the location of the similiar word
                                existsP = 0 // reset exists
                        }
                       }
             
              if( data[2].length > i ) {
                        if( existsFi == 0 )
                        {
                                results[0].push( data[2][i] );
                                results[1].push( 7 );
                        }
                        else
                        {
                                results[1][existsFi - 1] += 5; // Recall the location of the similiar word
                                existsP = 0 // reset exists
                        }
                }
            }
        }
        for( var i = 0; i < data[3].length; i++ )       {
               etsyResults[0][i] = data[3][i]; // Etsy crap, if nope please don't display
        }
       
        return sortWrap(results, etsyResults);
}
 
function sortWrap(bigArray, etsyResults)        {
               
        var sortedArray = [];
       
        for (var i = 0; i < bigArray[0].length; i++) {
                var item = [bigArray[0][i], bigArray[1][i]];
                sortedArray.push(item);
        }
       
        sortedArray.sort(function(a,b) {
                return b[1]-a[1];
        });
		
		return sortedArray;
       
}