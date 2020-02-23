$(document).ready(function(){
	$("#country_id").on("change", function(){
		var c_id = $(this).val(),
		    state= {};
			state="<option value=>--Select state--</option>";
		 $.ajax({
			type:'POST',
			url:'http://localhost/marriagejunction/admin_operation/getState',
			dataType:'json',
			data:{c_id:c_id},
			success: function(data){
				$.each(data,function(i,state_id,state_name){
					state += "<option value="+data[i].state_id+">"+data[i].state_name+"</option>";
				});
				$("#state_id").html(state);
				 
			},
			error: function(textStatus){
			}
		 });
	});	   
});