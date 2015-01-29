/* MAIN JS */
$(document).ready( function () {
	$('.data-table').DataTable();

	$('.div-toggle').click(function(e) {
		e.preventDefault();
		$('.div-drop').toggleClass('dropdown');
	});
});

