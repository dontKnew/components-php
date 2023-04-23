(function($) {

	"use strict";
	$('#date').datetimepicker({
    allowInputToggle: true,
    showClose: true,
    showClear: true,
    showTodayButton: true,
    format: "DD/MM/YYYY",
    icons: {
		  date:'fa fa-calendar-o',
		  up:'fa fa-chevron-up',
		  down:'fa fa-chevron-down',
		  previous:'fa fa-chevron-left',
		  next:'fa fa-chevron-right',
		  today:'fa fa-chevron-up',
		  clear:'fa fa-trash',
		  close:'fa fa-close'
		},
	});

	$('#time').datetimepicker({
		allowInputToggle: true,
		showClose: true,
		showClear: true,
		showTodayButton: true,
		format: "hh:mm A",
		icons: {
			  time:'fa fa-clock-o',
			  up:'fa fa-chevron-up',
			  down:'fa fa-chevron-down',
			  previous:'fa fa-chevron-left',
			  next:'fa fa-chevron-right',
			  today:'fa fa-chevron-up',
			  clear:'fa fa-trash',
			  close:'fa fa-close'
			},

		});


})(jQuery);
