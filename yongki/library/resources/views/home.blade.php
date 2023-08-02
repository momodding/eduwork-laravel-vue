@extends('layouts.admin')
@section('header', 'Dashboard')

@section('content')

    <div class="row">

        <div class="col-lg-3 col-6">
          <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_books }}</h3>
                    <p>Total Book</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
                <a href="{{ url('books') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_publishers }}</h3>
                    <p>Total Publisher</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ url('publishers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $total_authors }}</h3>
                    <p>Total Author</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ url('authors') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_transactions }}</h3>
                    <p>Total Transaction</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ url('transactions') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
              
            <div class="col-lg-6 col-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Publisher</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
         

        <div class="col-lg-6 col-6">
            <!-- BAR CHART -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Grafik Transaction</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
              <!-- /.card-body -->
          </div>
        </div>

            <div class="col-lg-6 col-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Author</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                                    </div><div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                        </div></div>
                        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script type="text/javascript">

    var data_donut = '{!! json_encode($data_donut) !!}';
    var label_donut = '{!! json_encode($label_donut) !!}';
    var data_bar = '{!! json_encode($data_bar) !!}';
    var data_pie = '{!! json_encode($data_pie) !!}';
    var label_pie = '{!! json_encode($label_pie) !!}';

  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    
    
    //--------------
    // ! Donut Chart -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: JSON.parse(label_donut),
      datasets: [
        {
          data: JSON.parse(data_donut),
          backgroundColor : [ '#228B22', '#ADFF2F', '#00FA9A', '#FF00FF', '#BA55D3', '#7B68EE', '#4169E1', '#0000FF',
                              '#000080', '#8A2BE2'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    });

  
    //-------------
    // ! BAR CHART -
    //-------------

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'October', 'November', 'Desember'],
      datasets: JSON.parse(data_bar)
    }


    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


   //-------------
    // ! PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: JSON.parse(label_pie),
      datasets: [
        {
          data: JSON.parse(data_pie),
          backgroundColor : [ '#581845', '#900C3F', '#4A0404', '#00c0ef', '#3c8dbc', '#F0E68C', '#0F52BA', '#800020', '#6F4E37',
                              '#708090', '#8A2BE2', '#00008B', '#D2691E', '#FF1493', '#228B22', '	#FFD700', '	#ADFF2F'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  })
</script>
@endsection
