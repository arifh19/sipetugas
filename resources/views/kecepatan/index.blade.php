@extends('layouts.app')

@section('dashboard')
Kecepatan Bus
   <small>Monitoring Kecepatan Bus</small>
@endsection

@section('breadcrumb')
   <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active">Kecepatan Bus</li>
@endsection

@section('content')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="code/highcharts.js"></script>
    <script src="code/modules/exporting.js"></script>
    <script src="code/modules/export-data.js"></script>
    <script src="mqttws31.js" type="text/javascript"></script>
    <script src="jquery.min.js" type="text/javascript"></script>
    <script src="config.js" type="text/javascript"></script>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Kecepatan Bus</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">


                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        <script type="text/javascript">
                        var temp = [];
                        var i = 0;

                        var Chart = Highcharts.chart('container', {
                          chart: {
                            type: 'spline',
                            animation: Highcharts.svg, // don't animate in old IE
                            marginRight: 10,
                          },

                          time: {
                            useUTC: false
                          },

                          title: {
                            text: 'MQTT - Websocket - Highchart'
                          },
                          xAxis: {
                            type: 'datetime',
                            tickPixelInterval: 150
                          },
                          yAxis: {
                            title: {
                              text: 'Value'
                            },
                            plotLines: [{
                              value: 0,
                              width: 1,
                              color: '#808080'
                            }]
                          },
                          tooltip: {
                            headerFormat: '<b>{series.name}</b><br/>',
                            pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                          },
                          legend: {
                            enabled: false
                          },
                          exporting: {
                            enabled: false
                          },
                          series: [{
                            name: 'Sensor',
                            data: [0]
                          }]});




                          var mqtt;
                          var reconnectTimeout = 2000;
                          var client_name = "web_" + parseInt(Math.random() * 100, 10);
                          var dataChart = [0,1,2,4];
                          function MQTTconnect() {
                            if (typeof path == "undefined") {
                              path = '/mqtt';
                            }
                            mqtt = new Paho.MQTT.Client(
                              host,
                              port,
                              path,
                              client_name
                            );
                            var options = {
                              timeout: 3,
                              useSSL: useTLS,
                              cleanSession: cleansession,
                              onSuccess: onConnect,
                              onFailure: function (message) {
                                $('#status').val("Connection failed: " + message.errorMessage + "Retrying");
                                setTimeout(MQTTconnect, reconnectTimeout);
                              }
                            };

                            mqtt.onConnectionLost = onConnectionLost;
                            mqtt.onMessageArrived = onMessageArrived;

                            if (username != null) {
                              options.userName = username;
                              options.password = password;
                            }
                            console.log("Host="+ host + ", port=" + port + ", path=" + path + " TLS = " + useTLS + " username=" + username + " password=" + password);
                            mqtt.connect(options);

                           // document.getElementById('name').innerHTML = "I am "+client_name;
                          }

                          function onConnect() {
                            $('#status').val('Connected to ' + host + ':' + port + path);
                            // Connection succeeded; subscribe to our topic
                            mqtt.subscribe('lintasdisiplin/sipetugas', {qos: 0});
                            $('#topic').val('lintasdisiplin/sipetugas');

                            //use the below if you want to publish to a topic on connect
                            //message = new Paho.MQTT.Message("Hello World");
                            //	message.destinationName = topic;
                            //	mqtt.send(message);
                          }

                          function onConnectionLost(response) {
                            setTimeout(MQTTconnect, reconnectTimeout);
                            $('#status').val("connection lost: " + responseObject.errorMessage + ". Reconnecting");

                          };

                          function onMessageArrived(message) {

                            var topic = message.destinationName;
                            var payload = message.payloadString;
                            var time = (new Date()).getTime();
                            var temporary = {x: time, y: parseInt(payload)};
                            if(temp.length > 10) {
                              temp.shift();
                              // Chart.series[0].removePoint(0);
                            }
                            temp.push(temporary);
                            console.log(temp);
                            Chart.series[0].setData(temp);
                            document.getElementById('ws').innerHTML = new Date(time).toString()+" : "+payload;
                          };

                          $(document).ready(function() {
                            MQTTconnect();
                          });
                          </script>
                          <div>Subscribed to <input type='text' id='topic' disabled />
                            Status: <input type='text' id='status' size="80" disabled /></div>
                            <p id='ws' style="font-family: 'Courier New', Courier, monospace;"></p>
                    {{--  <p><a class="btn btn-success" href="{{ route('kategoris.create') }}">Tambah</a></p>  --}}
                    {{-- {!! $html->table(['class' => 'table table-bordered table-striped']) !!} --}}
                    {{-- <table id="photos" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Title</th>
                                <th>Body</th>
                            </tr>
                        </thead>

                    </table> --}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('scripts')

    {{-- <script>
    var arrayReturn = [];
    $.ajax({
        url: "http://jsonplaceholder.typicode.com/posts",
        async: false,
        dataType: 'json',
        success: function (data) {
    for (var i = 0, len = data.length; i < len; i++) {
    var desc = data[i].body;
    arrayReturn.push([ data[i].userId, '<a href="http://google.com" target="_blank">'+data[i].title+'</a>', desc.substring(0, 12)]);
    }
    inittable(arrayReturn);
        }
    });
    function inittable(data) {
        console.log(data);
        $('#photos').DataTable( {
        "aaData": data
        } );
        }
    </script> --}}
    {{-- {!! $html->scripts() !!} --}}
@endsection
