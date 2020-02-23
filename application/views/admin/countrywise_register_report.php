<?php 
    include_once('admin_header.php');
?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Admin Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>

        <script type="text/javascript">

            //load the Google Visualization API and the chart   corechart
            google.load('visualization', '1', {'packages': ['piechart']});
 
            //set callback
            google.setOnLoadCallback (createChart);

            //callback function
            function createChart() {
 
                //create data table object

                /*
                [
                ['item','qty'],
                ['laptop','50'],
                ['mobile','20'],
                ['TV','80'],
                ]

                 */


                var dataTable = new google.visualization.arrayToDataTable(
                    [
                    ['month', 'Qty'],
                    <?php
                    foreach($result as $key=>$val)
                    {
                        echo "['".$val['month']."',".$val['qty']."],";
                    }

 ?>
                //define options for visualization
                // var options = {width: 800, height: 400, is3D: true, title: ''};
 
                // //draw our chart
                // chart.draw(dataTable, options);
 


               ] );

                //instantiate our chart object     AreaChart,ColumnChart,BarChart,PieChart
                var chart = new google.visualization.PieChart (document.getElementById('chart'));

                 //define options for visualization
                var options = {width: 1000, height: 500, is3D: true, title: 'countrywise total register user ...'};
                  //draw our chart
                chart.draw(dataTable, options);
 
            
 
            }
        </script>
 
    </head>
 
    <body>
 <!--Div for our chart -->
       <div id="chart"></div>
 
    </body>
</html>