


$(document).ready(function(){

	var path = window.location.pathname;
	var page = path.split("/").pop();


	switch (page) {
	    case 'newadd_stu.php':
	       // $('#li_2').addClass('expanded');
	       $('#li_1').addClass('expanded').children('ul').show();
	       $('#li_11').addClass('expanded').children('ul').show();
	       $('#expList>#li_1>ul>#li_11>ul>#newadd_stu').css( "font-weight", "bold" );
	        break;
	    case 'newstulist.php':
	        $('#li_1').addClass('expanded').children('ul').show();
	       $('#li_11').addClass('expanded').children('ul').show();
	       $('#expList>#li_1>ul>#li_11>ul>#newstulist').css( "font-weight", "bold" );
	        break;
	    case 'stuuploa.php':
	       $('#li_1').addClass('expanded').children('ul').show();
	       $('#li_11').addClass('expanded').children('ul').show();
	       $('#expList>#li_1>ul>#li_11>ul>#stuuploa').css( "font-weight", "bold" );
	        break;
	    case 'removestu.php':
	       $('#li_1').addClass('expanded').children('ul').show();
	       $('#li_11').addClass('expanded').children('ul').show();
	       $('#expList>#li_1>ul>#li_11>ul>#removestu').css( "font-weight", "bold" );
	        break;
	    case 4:
	        day = "Thursday";
	        break;
	    case 5:
	        day = "Friday";
	        break;
	    case 6:
	        day = "Saturday";
	}

});