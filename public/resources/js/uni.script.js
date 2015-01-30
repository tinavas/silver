/* MAIN JS */
$(document).ready( function () {
	$('.data-table').DataTable();

	$('.div-toggle').click(function(e) {
		e.preventDefault();
		$('.div-drop').toggleClass('dropdown');
	});

	if($('.datepicker').length)
    {
    	if (!Modernizr.inputtypes.date) {
		    $('.datepicker').datepicker();
		}
    }
});

