$(document).ready(function(){
				$("#religion_id").on("change", function(){
		var c_id = $(this).val(),
		    state= {};
			state="<option value=>--Select Caste--</option>";
			
		 $.ajax({
			type:'POST',
			url:'http://localhost/marriagejunction/admin_operation/getCaste',
			dataType:'json',
			data:{c_id:c_id},
			success: function(data){
				$.each(data,function(i,caste_id,caste_name){
					state += "<option value="+data[i].caste_id+">"+data[i].caste_name+"</option>";
				});
				$("#caste_id").html(state);
				 console.log(state);
			},
			error: function(textStatus){
			}
		 });

	});	   
});