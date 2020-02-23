<?php 
	include_once('admin_header.php')
?> 
     <script>
			function approve(id)
			{
				//alert(id);
				var xmlhttp;	
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("data").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","gal_approve.php?id="+id,true);
        xmlhttp.send();

			}
			
			function unapprove(id)
			{
				
				//alert(id);
				var xmlhttp;	
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             document.getElementById("data").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","gal_unapprove.php?id="+id,true);
        xmlhttp.send();

			}
			</script>
			
			<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Profile Photo Approval                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content" id="data">
                    <div class="row">
                    <!-- /.col -->
                                        
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        
        
        <!-- DATA TABES SCRIPT -->
        <script src="js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable()});
			
			
        </script>
    
</body></html>