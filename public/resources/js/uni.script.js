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

    $('.type').change(function(){
    	$option = $('.type').val();

    	if($option == 1){
    		$('.child-entry').slideUp();
    		$('.sub-header-entry').slideUp();
    	}else if($option == 2){
    		$('.child-entry').slideUp();
    		$('.sub-header-entry').slideToggle();
    	}else{
    		$('.child-entry').slideToggle();
    		$('.sub-header-entry').slideUp();
    	}
    });

    
    if($('.dynamictable').length){
	   	$('.dynamictable').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0,'asc']]
        });
        $(".dynamictable tbody td:last-child").css({width:"100px"})
    }

    $('#ajax_header').change(function(){
    	var id = $("#ajax_header").val();
    	$("#parent_id").attr('disabled',true);
    	$("#parent_id").empty();
    	$.ajax({
    		type : 'GET',
    		url  : '/ajax/get-subs',
    		data : {id : id}
    	}).done(function(msg){
    		$.each(msg, function(i, obj){
    			$('#parent_id').append($("<option></option>").attr("value",obj.id).text(obj.description));
    		});
			$("#parent_id").attr('disabled',false);
    	});
    });
    var id = $("#ajax_header").val();
    	$("#parent_id").empty();
    	$.ajax({
    		type : 'GET',
    		url  : '/ajax/get-subs',
    		data : {id : id}
    	}).done(function(msg){
    		$.each(msg, function(i, obj){
    			$('#parent_id').append($("<option></option>").attr("value",obj.id).text(obj.description));
    		});
    	});
    /* CHARTS */

    /*var ctx = document.getElementById("bar-status").getContext("2d");
    var ctx2 = document.getElementById("bar2-status").getContext("2d");

    var data = {
		    labels: ["Joshua", "Patrick", "JM", "Kevin"],
		    datasets: [
		        {
		            label: "Left",
		            fillColor: "#26A65B",
		            strokeColor: "#26A65B",
		            highlightFill: "rgba(220,220,220,0.75)",
		            highlightStroke: "rgba(220,220,220,1)",
		            data: [65, 60, 80, 81]
		        },
		        {
		        	label: "Right",
		            fillColor: "#A62671",
		            strokeColor: "#26A65B",
		            highlightFill: "rgba(220,220,220,0.75)",
		            highlightStroke: "rgba(220,220,220,1)",
		            data: [50, 81, 40, 30]
		        }
		    ]
		};
		var myBarChart = new Chart(ctx).Bar(data, {responsive: true});

		var data = {
				    labels: ["Joshua", "Patrick", "JM", "Kevin"],
				    datasets: [
					        {
					            label: "Left",
					            fillColor: "#26A65B",
					            strokeColor: "#26A65B",
					            highlightFill: "rgba(220,220,220,0.75)",
					            highlightStroke: "rgba(220,220,220,1)",
					            data: [65, 60, 80, 81]
					        },
					        {
					        	label: "Right",
					            fillColor: "#A62671",
					            strokeColor: "#26A65B",
					            highlightFill: "rgba(220,220,220,0.75)",
					            highlightStroke: "rgba(220,220,220,1)",
					            data: [50, 81, 40, 30]
					        }
				    	]
					};
		var myBarChart2 = new Chart(ctx2).Bar(data, {responsive: true});


	var line = document.getElementById("line-status").getContext("2d");
    var line2 = document.getElementById("line2-status").getContext("2d");

	    var data = {
			    labels: ["Joshua", "Patrick", "JM", "Kevin"],
			    datasets: [
					        {
					            label: "Left",
					            fillColor: "rgba(220,220,220,0.2)",
					            strokeColor: "#26A65B",
					            pointColor: "rgba(220,220,220,1)",
					            pointStrokeColor: "#fff",
					            pointHighlightFill: "#fff",
					            pointHighlightStroke: "rgba(220,220,220,1)",
					            data: [2, 3, 2, 4]
					        },
					    ]
					};

		var myLineChart = new Chart(line).Line(data, {responsive: true});

		var data = {
			    labels: ["Joshua", "Patrick", "JM", "Kevin"],
			    datasets: [
					        {
					            label: "Left",
					            fillColor: "rgba(220,220,220,0.2)",
					            strokeColor: "#26A65B",
					            pointColor: "rgba(220,220,220,1)",
					            pointStrokeColor: "#fff",
					            pointHighlightFill: "#fff",
					            pointHighlightStroke: "rgba(220,220,220,1)",
					            data: [2, 3, 1, 4]
					        },
					    ]
					};

		var myLineChart = new Chart(line2).Line(data, {responsive: true});

	canvas.onclick = function(evt){
    	var activeBars = myBarChart.getBarsAtEvent(evt);
    // => activeBars is an array of bars on the canvas that are at the same position as the click event.
	};
    /* END */
});

