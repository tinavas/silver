/* MAIN JS */
$(document).ready( function () {

	$('.data-table').DataTable();

	updateStuff();

	$('table td').on('change', function(evt, newValue) {
		var hoho = $(this).attr('id');
		var formattedValue = numeral().unformat(newValue);
		if(isNumber(formattedValue)){
			$.ajax({
				type : 'GET',
				dataType : 'json',
    			url  : '/ajax/update-entry-template',
    			data : {value : formattedValue, id : hoho}
			}).done(function(){
				
				//$('#' + hoho).parent();
				var somee = hoho.split("-");
				var myId = somee[1];
				if(somee[0] == "quantity" || somee[0] == "ul" || somee[0] == "um"){
					$.ajax({
						type :'GET',
						dataType : 'json',
						url : '/ajax/get-entry-values',
						data : {id : myId}
					}).done(function(data){
						$("#tm-" + myId).html(numeral(data.um * data.quantity).format('0,0.00'));
						$("#tl-" + myId).html(numeral(data.ul * data.quantity).format('0,0.00'));
						$("#dc-" + myId).html(numeral((data.um * data.quantity) + (data.ul * data.quantity)).format('0,0.00'));
						updateStuff();
					});
				}else if(somee[0] == "expensevalue"){
					updateStuff();
				}
			});
		}else{
			alert('Invalid Numeric Value');
			return false;
		}
	});	

	function updateStuff(){
		var superSum = 0;
		var sum = 0;
		$('.costs').each(function(){
			sum += parseFloat(numeral().unformat($(this).text()));  //Or this.innerHTML, this.innerText
		});
		$('.oh').text(numeral(sum).format('0,0.00'));
		superSum += sum;
		sum = 0;
		$('.dc').each(function(){
		    sum += parseFloat(numeral().unformat($(this).text()));  //Or this.innerHTML, this.innerText
		});
		superSum += sum;
		$('.total').text(numeral(sum).format('0,0.00'));
		var costs = parseFloat(numeral().unformat($('.total').text()));
		var cont = parseFloat($('#cont').val());
		superSum += costs * cont;
		$('.cont').text(numeral(costs * cont).format('0,0.00'));
		superSum += (superSum * .10);
		$('.tax').text(numeral(superSum * .10).format('0,0.00'));

		$('.superSum').text(numeral(superSum).format('0,0.00'));
		var talagangAmount = 0;
		$("tr.children").each(function() {
		  $this = $(this)
		  var um = parseFloat(numeral().unformat($this.find("td.um").text()));
		  var ul = parseFloat(numeral().unformat($this.find("td.ul").text()));
		  var quantity = parseFloat(numeral().unformat($this.find("td.quantity").text()));
		  var tm = um / sum * superSum;
		  var tl = ul / sum * superSum;
		  var netTotal = tl + tm;
		  $this.find("th.material").text('');
		  $this.find("th.labor").text(''); 
		  $this.find("th.material").text(numeral(tm).format('0,0.00'));
		  $this.find("th.labor").text(numeral(tl).format('0,0.00'));
		  $this.find('th.net-total').text(numeral(netTotal).format('0,0.00'));
		  $this.find('th.gross-amount').text(numeral(netTotal * quantity ).format('0,0.00'));
		  talagangAmount += (netTotal * quantity);
		});
		$(".net").text(numeral(talagangAmount).format('0,0.00'));
	}

	function isNumber(n) {
	  return !isNaN(parseFloat(n)) && isFinite(n);
	}

	(function(){
		
		var doc = document,
		e = doc.getElementById('add-new-option');
		ex = doc.getElementById('add-new-to');

		$('.editTable').editableTableWidget();

		$('#add-new-option').change(function(){
			var selected = e.options[e.selectedIndex].value,
				items = {};
			$('#add-new-to').children('option').remove();

			if (selected === 'header') {
				$.each(items, function(val, text){
		        	$('#add-new-to').append(
		            	$('<option></option>').html(text)
		        	);
		        });
			} else if (selected === 'sub-header') {
				var header = $('tbody');

				for (var i = 0 ; i < header.length; i++) {
					$('#add-new-to').append('<option value="' + header[i].id + '">' + header[i]['children'][0]['children'][0].innerHTML + '</option>');
				};			
					
			} else if (selected === 'item') {
				var sub_header = $('tbody tr.table-sub-header');

				for (var i = 0 ; i < sub_header.length; i++) {
					$('#add-new-to').append('<option value="' + sub_header[i].id + '">' + sub_header[i]['children'][0].innerHTML + '</option>');
				};
			}
		});



	    $('#add-new-row').click(function(){
	    	var selected = e.options[e.selectedIndex].value;

	    	if (selected === 'header') {
	    		var header = $('.table-td-header').length;
	    		$('.editTable tbody:last-child')
	            .after('<tbody id="block-' + header + '">' +
	            		'<tr class="table-td-header">' +
	                    '<td>&nbsp;</td>' +
	                    '<td>&nbsp;</td>' +
	                    '</tr></tbody>');
	    	} else if (selected === 'sub-header') {
	    		var header = ex.options[ex.selectedIndex].value,
	    			sub_header = $('#' + header + ' .table-sub-header').length
	    			tbody = $('#' + header + ' tr:last-child');
	    			console.log(tbody);
	    		tbody.after('<tr class="table-sub-header" id="td-' + header + '-sub-' + sub_header + '">' +
							'<td>&nbsp;</td>' +
							'<td>&nbsp;</td>' +
	    					'</tr>');
	    	} else if (selected === 'item') {
	    		var sub_header = ex.options[ex.selectedIndex].value,
	    			item = $('#' + sub_header);
	    			
	    		item.after('<tr class="table-td-content">' +
	    				   '<td>&nbsp;</td>' +
	    				   '<td>&nbsp;</td>' +
	    				   '</tr>');	
	    	}

	    	$(".editTable").editableTableWidget();
	        
	    });
	})();

	$('.div-toggle').click(function(e) {
		e.preventDefault();
		$('.div-drop').toggleClass('dropdown');
	});

	if ($('.datepicker').length) {
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

