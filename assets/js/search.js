
	$(document).ready(function(){
		$("#nm").on("click",function() {
			var list="";

			var id=$(this).attr('data-value');
			$("#di").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#nm").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/statuswise',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#di").on("click",function() {
			var list="";

			var id=$(this).attr('data-value');
			//alert(id);
			$("#nm").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#di").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/statuswisedi',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});	
		$("#guj").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#guj").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/mtwiseguj',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#hin").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#hin").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/mtwisehin',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#eng").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#eng").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/mtwiseeng',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#mas").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#mas").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/eduwisemas',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#bac").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#bac").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/eduwisebac',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#doc").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#doc").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/eduwisedoc',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#in").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#in").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/couwisein',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#us").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#us").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/couwiseus',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#uk").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#uk").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/couwiseuk',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#hi").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#hi").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/regwisehi',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#sikh").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#jain").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#sikh").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/regwisesikh',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#jain").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#jain").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/regwisejain',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}	
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#nor").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#abn").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#nor").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/pswisenor',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#abn").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#abn").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/pswiseabn',
				dataType:'html',
				data:{id:id},
				success: function(data){
					
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#veg").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#veg").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/eatingveg',
				dataType:'html',
				data:{id:id},
				success: function(data){
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#nonveg").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#egg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/eatingnonveg',
				dataType:'html',
				data:{id:id},
				success: function(data){
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#egg").on("click",function() {
		//	alert();
			var list="";
			var id=$(this).attr('data-value');
		//	alert(id);
			$("#nm").css('border-bottom','none');
			$("#di").css('border-bottom','none');
			$("#hin").css('border-bottom','none');
			$("#guj").css('border-bottom','none');
			$("#eng").css('border-bottom','none');
			$("#mas").css('border-bottom','none');
			$("#bac").css('border-bottom','none');
			$("#doc").css('border-bottom','none');
			$("#in").css('border-bottom','none');
			$("#us").css('border-bottom','none');
			$("#uk").css('border-bottom','none');
			$("#hi").css('border-bottom','none');
			$("#sikh").css('border-bottom','none');
			$("#nor").css('border-bottom','none');
			$("#veg").css('border-bottom','none');
			$("#nonveg").css('border-bottom','none');
			$("#egg").css('border-bottom','1px solid black');
			//alert(id);
			$.ajax({
				type:'POST',
				url:'http://localhost/marriagejunction/search/eatingegg',
				dataType:'html',
				data:{id:id},
				success: function(data){
					if(data)
					{
						$("#profile_left2").html("");
						$("#profile_left2").html(data);
					}else{
						$("#profile_left2").html("");
						$("#profile_left2").html("No Data Found");
					}
				},
				error:function()
				{
					console.log();
				}
			});
		});

		$("#regsearch").on("click",function(){
			data[''] = $("").val();
			
		});
	});