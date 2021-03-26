/* Draw the stars in the page given the ability and a number of stars */
function paintStars(name, num){
    $( name ).after( "<span class=\"ability-score\"></span>" );
    for(var i = 0; i<num; i++){
        var $span = $( document.createElement('span') );
        $span.addClass('icon-star');
        $(name).next().append($span).append(" ");
    }
                
    for(var i = 0; i<(5-num); i++){
        var $span = $( document.createElement('span') );
        $span.addClass('icon-star-o');
        $(name).next().append($span).append(" ");
    }
}
            