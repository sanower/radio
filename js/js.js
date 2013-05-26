$(document).ready(function(){
    $("#weekly").click(function(){
	$("#daily_schedule").fadeOut();
	$("#weekly_schedule").fadeIn();
    });
    $("#daily").click(function(){
	$("#weekly_schedule").fadeOut();
	$("#daily_schedule").fadeIn();
    });
    
});