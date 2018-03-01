    <script src="<?= base_url() ?>assets/js/Chart.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/utils.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon active"></i>
                                <a href="#">Home</a>
                            </li>
                        </ul><!-- /.breadcrumb -->

                    </div>

                    <div class="page-content">

                        <!-- <div class="page-header">
                            <h1>
                                Booking Lapangan Futsal
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    with draggable and editable Booking
                                </small>
                            </h1>
                        </div> --><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <!-- <div class="row"> -->

                                    <div class="col-xs-12">
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h4 class="widget-title">Chart Booking Lapangan Futsal 2017</h4>
                                                <span class="widget-toolbar">
                                                    <a href="#" data-action="collapse">
                                                        <i class="ace-icon fa fa-chevron-up"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="widget-body">
                                                <div class="row">
                                                    <div class="col-xs-8">
                                                        <canvas id="canvas"></canvas>
                                                        <img id="gambar">
                                                        <a id="download" download="image.png">
                                                            Download Image
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>    
    <!-- <button id="randomizeData">Randomize Data</button>
    <button id="addDataset">Add Dataset</button>
    <button id="removeDataset">Remove Dataset</button>
    <button id="addData">Add Data</button>
    <button id="removeData">Remove Data</button> -->


    <script>
        
        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var color = Chart.helpers.color;
        var barChartData = {
            labels: MONTHS,
            datasets: [
            <?php
                $month=array("January"=>"01","February"=>"02","March"=>"03","April"=>"04","May"=>"05","June"=>"06","July"=>"07","August"=>"08","September"=>"09","October"=>"10","November"=>"11","December"=>"12");
                
                foreach($month as $x=>$x_value){
                    if($x_value!=12){$koma_bulan=',';}else{$koma_bulan = '';}
                    // echo $x;
                    foreach ($chart as $value) { ?>
            
            {

                label: '<?= $x ?>',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    {x:'2017-<?= $x ?>-01',y:'<?php echo $value["bln".$x_value]; ?>'}
                ]
            },

            <?php                    
                    }
                }
            ?>
            // , {
            //     label: 'Dataset 2',
            //     backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            //     borderColor: window.chartColors.blue,
            //     borderWidth: 1,
            //     data: [
            //         // randomScalingFactor(),
            //         {x:'2017-01-01',y:'70'},
            //         {x:'2017-01-01',y:'50'},
            //         {x:'2017-01-01',y:'20'},
            //         {x:'2017-01-01',y:'15'},
            //         {x:'2017-01-01',y:'90'},
            //         {x:'2017-01-01',y:'50'},
            //         {x:'2017-01-01',y:'70'}
            //     ]
            // }
            ]

        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            var myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart Booking Lapangan Futsal'
                    },
                }
            });
            // var url_base64 = myBar.toBase64Image();
            var url_base64 = document.getElementById("canvas").toDataURL("image/png");
            download.href  = url_base64;
            gambar.src  = url_base64;
        };

        // document.getElementById('randomizeData').addEventListener('click', function() {
        //     var zero = Math.random() < 0.2 ? true : false;
        //     barChartData.datasets.forEach(function(dataset) {
        //         dataset.data = dataset.data.map(function() {
        //             return zero ? 0.0 : randomScalingFactor();
        //         });

        //     });
        //     window.myBar.update();
        // });

        // var colorNames = Object.keys(window.chartColors);
        // document.getElementById('addDataset').addEventListener('click', function() {
        //     var colorName = colorNames[barChartData.datasets.length % colorNames.length];;
        //     var dsColor = window.chartColors[colorName];
        //     var newDataset = {
        //         label: 'Dataset ' + barChartData.datasets.length,
        //         backgroundColor: color(dsColor).alpha(0.5).rgbString(),
        //         borderColor: dsColor,
        //         borderWidth: 1,
        //         data: []
        //     };

        //     for (var index = 0; index < barChartData.labels.length; ++index) {
        //         newDataset.data.push(randomScalingFactor());
        //     }

        //     barChartData.datasets.push(newDataset);
        //     window.myBar.update();
        // });

        // document.getElementById('addData').addEventListener('click', function() {
        //     if (barChartData.datasets.length > 0) {
        //         var month = MONTHS[barChartData.labels.length % MONTHS.length];
        //         barChartData.labels.push(month);

        //         for (var index = 0; index < barChartData.datasets.length; ++index) {
        //             //window.myBar.addData(randomScalingFactor(), index);
        //             barChartData.datasets[index].data.push(randomScalingFactor());
        //         }

        //         window.myBar.update();
        //     }
        // });

        // document.getElementById('removeDataset').addEventListener('click', function() {
        //     barChartData.datasets.splice(0, 1);
        //     window.myBar.update();
        // });

        // document.getElementById('removeData').addEventListener('click', function() {
        //     barChartData.labels.splice(-1, 1); // remove the label first

        //     barChartData.datasets.forEach(function(dataset, datasetIndex) {
        //         dataset.data.pop();
        //     });

        //     window.myBar.update();
        // });
    </script>
    <script type="text/javascript">
        // function done(){
        //     var url_base64 = document.getElementById("canvas").toDataURL("image/png");
        //     download.href = url_base64;
        // }
    </script>