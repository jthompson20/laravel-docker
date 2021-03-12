$(document).ready(function(){

	var builder 	= {
		type: 	$("select[name=report_type]"),
		name: 	$("select[report_name]")
	};


	// on change of report type
	$("select[name=report_type]").on("change",function(){

		// init vars
		var name 			= $(this).find(":selected").text();
		var value 			= $(this).find(":selected").val();
		var reports 		= $(this).find(":selected").data("reports");

		// disable submit button
		$("input[type=submit]").prop('disabled',true);

		// remove current report_name options
		$("select[name=report_name]").find('option').remove();

		// append "Please select value" 
		$("select[name=report_name]").append(`<option value="" data-reports="">Please Select Report Name</option>`);

		// enable report_name
		$("select[name=report_name]").prop('disabled',false);

		// remove any existing report requirements
		$("#requirements").empty();

		// if value == "", then we need to disable the report_name dropdon
		if (value == "") {

			// disable report_name
			$("select[name=report_name]").prop('disabled',true);

		} else {

			// build report_name options
			for (var i = 0; i < reports.length; i++) {

				// set requirements
				var requirement 	= JSON.stringify(reports[i]['requirements']);

				// add option to select
				$("select[name=report_name]").append(`<option value="${reports[i]['id']}" data-requirements='${requirement}' >${reports[i]['name']}</option>`);

			}

			// see how many report_name options there are
			// if there is only one, automatically select that option (== 2 b/c of Please Select Report Name)
			if ($("select[name=report_name]").children('option').length == 2){

				// make sure all required fields have
				$("select[name=report_name]").val($("select[name=report_name] option:eq(1)").val());

				// enable dropdown
				$("select[name=report_name]").prop('disabled',false).trigger('change');

			}

		}

	});

	// on change of report_name
	$("select[name=report_name]").on("change",function(){

		// init vars
		var name 			= $(this).find(":selected").text();
		var value 			= $(this).find(":selected").val();
		var requirements 	= $(this).find(":selected").data('requirements');

		// remove any current requirements
		$("#requirements").empty();

		// disable submit button

		if (value == "") {

			// disable button
			$("input[type=submit]").prop('disabled',true);

		} else {

			// if there are no requirements, we need to enable the report_name dropdown
			if (requirements.length == 0){

				// no other required fields, enable submit button
				$("input[type=submit]").prop('disabled',false);

			}

						// add any report requirements
			for (var j = 0; j < requirements.length; j++) {

				// build form row
				var row 		= document.createElement('div');
				row.className 	= "form-row";

				// create form group
				var group 		= document.createElement('div');
				group.className = "form-group col";

				// build label
				var label 		= document.createElement('label');
				label.setAttribute("for",requirements[j]['slug']);
				label.innerHTML = "Select " + requirements[j]['name'];

				// build select
				var select 			= document.createElement('select');
				select.setAttribute('name', requirements[j]['slug']);
				select.className 	= "form-control required-field";

				// add first option
				var option 	= document.createElement('option');
				option.setAttribute('value','');
				option.text = "Please Select " + requirements[j]['name'];

				// add option to select
				select.add(option);

				// iterate select options
				for (var k = 0; k < requirements[j]['options'].length; k++) {

					// create new select option
					var option 	= document.createElement('option');
					option.setAttribute('value',requirements[j]['options'][k]['id']);
					option.text = requirements[j]['options'][k]['name'];

					// add option to select
					select.add(option);
				}

				// add event listener to required field
				select.addEventListener("change",function(){

					// init vars
					var allow 	= true;	// boolean to determine if we will allow report_name to be displayed
					var name 	= $(this).find(":selected").text();
					var value 	= $(this).find(":selected").val();

					// if the value == "", we need to make sure submit button is disabled
					if (value == "") {

						// disable submit button
						$("input[type=submit]").prop('disabled',true);

					}

					// iterate ALL required fields
					$(".required-field").each(function(){

						// grab selected value for this required field
						var val 	= $(this).find(":selected").val();

						// if value != "", we can allow edit to report_name
						if (val == ""){

							// required field missing selection - do not allow
							allow 	= false;

						}

					});

					// if all required fields have been filled, we can allow submit button
					if (allow) {

						// set submit button disbled prop accordingly
						$("input[type=submit]").prop('disabled',false);

					}

				});

				// append select & label to group
				group.appendChild(label);
				group.appendChild(select);

				// append group to row
				row.appendChild(group);

				// append row to requirements
				$("#requirements").append(row);

			}

			// iterate all required fields
			// if there is only one option, automatically select that option
			$(".required-field").each(function(){

				// get number of options for this required field
				if ($(this).children('option').length == 2) {

					// select option and trigger onchange
					$(this).val($(this).find('option').eq(1).val()).trigger('change');

					// enable button
					$("input[type=submit]").prop('disabled',false);

				}

			});

		}

	});

	// onclick of reset button
	$(".reset").on("click",function(){

		// reset report_type dropdown & trigger onchange event
		$("select[name=report_type]").val("").trigger("change");

	});

});
