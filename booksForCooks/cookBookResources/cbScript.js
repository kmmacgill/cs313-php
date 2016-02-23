$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 500;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";
    
    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});

var insCount = 0;
$(function(){
    $('p#add_instruction').click(function(){
        insCount += 1;
        $('#instructions').append('<strong>Step #' + insCount 
            + '</strong>'+ '<input id="instruct_' + insCount 
            + '" name="insFields[]' + '" type="text" required/> <br />' );
    });
});

var ingCount = 0;
$(function(){
    $('p#add_ingredient').click(function(){
        ingCount += 1;
        $('#ingredients').append('<strong>item #' + ingCount 
            + '</strong>'+ '<input id="ing_' + ingCount 
            + '" name="ingFields[]' + '" type="text" required/> <br />' 
            + '<strong>Amount:' + ' ' + '</strong>' 
            + '<input id="amt_' + ingCount + '" name="amtFields[]' 
            + '" type="text" required/> <br />');
    });
});