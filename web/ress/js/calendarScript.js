
	resize =  function (){
		var height= $('#box').height() - $('#contain_title').height() - $('#bouton').height() - 20;
		$('#calendar').fullCalendar('option', 'height',height);
		$('#calendar').fullCalendar('gotoDate', new Date());
	};

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'today',
				center: 'prev, title, next'
			},
				
			buttonIcons:{
				'today':'today',
				'prev':'prev',
				'next':'next'
			},
			
			businessHours:{
				start: '08:00', // a start time (10am in this example)
				end: '19:00', // an end time (6pm in this example)

				dow: [ 0, 1, 2, 3, 4, 5, 6 ]
				// days of week. an array of zero-based day of week integers (0=Sunday)
				// (Monday-Thursday in this example)
			},
			
			defaultView: 'agendaWeek',
			scrollTime: '07:00:00',
			/*defaultDate: '2014-12-04',*/
			selectable: true,
			selectHelper: true,
			windowResize : function(view) {
				resize();
			},
			select: function(start, end) {
				var title = prompt('Event Title:');
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: eventData
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');
			},
			editable: true,
			eventLimit: true, // allow "more" link when too many events
		
		});
		resize();
	$('#calendar').fullCalendar('gotoDate', new Date());

	});