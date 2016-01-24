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

function validateForm() {

    var Quest1 = document.forms["surveyForm"]["Q1"].value;
    var Quest2 = document.forms["surveyForm"]["Q2"].value;
    var Quest3 = document.forms["surveyForm"]["Q3"].value;
    var Quest4 = document.forms["surveyForm"]["Q4"].value;
    var Quest5 = document.forms["surveyForm"]["Q5"].value;
    var Quest6 = document.forms["surveyForm"]["Q6"].value;
    var Quest7 = document.forms["surveyForm"]["Q7"].value;
    if (Quest1 == "" || Quest1 == null || Quest2 == "" || Quest2 == null ||
        Quest3 == "" || Quest3 == null || Quest4 == "" || Quest4 == null ||
        Quest5 == "" || Quest5 == null || Quest6 == "" || Quest6 == null ||
        Quest7 == "" || Quest7 == null){
        alert("You Must make a choice for every question.")    
        return false;
    }
    else {
        return true;
    }     
}