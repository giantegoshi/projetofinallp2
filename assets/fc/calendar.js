/**
 * 
 */

$(document).ready(function() {

	$('#calendar').fullCalendar({
		lang: 'pt-br',
		editable: true,
		selectable: true,
		eventLimit: true, // allow "more" link when too many events
		events: {
			url: 'http://localhost/localbit-frontend/index.php/api/calendar/index'
		},
		select: function(start, end, allDay) {
	          
	          $('#myModal').modal('show');
		}
	});

	// http://www.bootply.com/rzNQTlDlFX#
});