'use strict';
$(document).ready(function(){
	$('#country_id').on('change', function(){
		var countryID = $(this).val();
		alert(countryID);
		if (countryID) {
			$.ajax({
				type: 'POST',
				url:APP.data.url+'members/getStates/'+countryID,
				success:function(response){
					// console.log(response);
					if (response.success) {
						var $temp = "<option value=''>--- Select State Now---</option>";
						$.each(response.data, function(key,states){
							// console.log(states.id);
							// console.log(states.state);
							$temp+="<option value='"+states.id+"'>"+states.state+"</option>";
						});
						// console.log($temp);
						$('#state_id').empty();
						$('#state_id').html($temp);
					};
				},
				error:function(){
					console.log('Getting error');
				}
			});
		}
	})

	$('#state_id').on('change', function(){
		var stateID = $(this).val();
		//alert(stateID);
		if (stateID) {
			$.ajax({
				type: 'POST',
				url:APP.data.url+'members/getCities/'+stateID,
				success:function(response){
					console.log(response);
					if (response.success) {
						var $temp = "<option value=''>--- Select City Now---</option>";
						$.each(response.data, function(key,cities){
							// console.log(cities.id);
							// console.log(cities.state);
							$temp+="<option value='"+cities.id+"'>"+cities.city+"</option>";
						});
						// console.log($temp);
						$('#city_id').empty();
						$('#city_id').html($temp);
					};
				},
				error:function(){
					console.log('Getting error');
				}
			});
		}
	})
});