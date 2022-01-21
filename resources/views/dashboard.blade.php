@extends('layout.app.index')
@section('page-header','Dashboard')
@section('title','Dashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/all.min.css')}}">

<style>
   .fontawesome-icons {
        text-align: center;
    }

    article dl {
        background-color: rgba(0, 0, 0, .02);
        padding: 20px;
    }

    .icon svg {
        font-size: 24px;
    }
</style>
@endsection
@section('main')
<div class="row">
  <div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon purple">
                      <dt class="icon text-white"><span class="fa-fw select-all fas"></span></dt>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Total Mobil</h6>
                    <h6 class="font-extrabold mb-0">{{$mobil}}</h6>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon purple">
                      <dt class="icon text-white"><span class="fa-fw select-all fas"></span></dt>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">total Client</h6>
                    <h6 class="font-extrabold mb-0">{{$client}}</h6>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon purple">
                      <dt class="icon text-white"><span class="fa-fw select-all fas"></span></dt>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Mobil Di Rental</h6>
                    <h6 class="font-extrabold mb-0">{{$rental}}</h6>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="col-6 col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon purple">
                      <dt class="icon text-white"><span class="fa-fw select-all fas"></span></dt>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Denda {{$date->format('F')}}</h6>
                    <h6 class="font-extrabold mb-0">{{$denda}}</h6>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Pendapatan Tahun {{$date->format('Y')}}</h4>
            </div>
            <div class="card-body">
                <div id="chart-profile-visit"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
  <script src="{{asset('assets/vendors/fontawesome/all.min.js')}}"></script>
  <script src="{{asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>

  <script>
    let optionsProfileVisit = {
        series: [
    {
      name: "Pendapatan",
      data: [@foreach($chart as $data){{$data->data}},@endforeach],
    },
    {
      name: "Denda",
      data: [@foreach($dendaChart as $data){{$data->data}},@endforeach],
    },
  ],
  chart: {
    type: "bar",
    height: 350,
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "55%",
      endingShape: "rounded",
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    show: true,
    width: 2,
    colors: ["transparent"],
  },
  xaxis: {
    categories: [@foreach($montChart as $data)'{{$data->data}}',@endforeach],
  },
  yaxis: {
    title: {
      text: "Total pendapatan bersih dan denda",
    },
  },
  fill: {
    opacity: 1,
  },
  tooltip: {
    y: {
      formatter: function(value) {
        let val = (value / 1).toFixed(0).replace('.', ',')
        return 'Rp. '+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      },
    },
  },
};
let chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
chartProfileVisit.render();
  </script>
@endsection