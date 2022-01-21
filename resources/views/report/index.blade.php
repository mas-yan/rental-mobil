@extends('layout.app.index')
@section('page-header','Laporan Data Rental')
@section('title','Laporan')
@section('style')
    
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
<style>
  table.dataTable td{
      padding: 15px 8px;
  }
</style>
@endsection
@section('main')
<div class="card">
  <div class="container p-3">
      <form action="{{route('report')}}" method="post">
      @csrf
      <div class="row">
          <div class="col-6">
              <div class="form-group">
                  <label>Dari Tanggal</label>
                  <input type="date" name="start_date" class="form-control">
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
                  <label>Sampai</label>
                  <input type="date" name="end_date" class="form-control">
              </div>
          </div>
      </div>
      <button type="submit"  name="cari" class="btn btn-secondary btn-block"><i class="fa fa-search"></i></button>
  </form>
  </div>
</div>
<div class="card">
  <div class="card-header">
      <div class="card-title">
        Laporan Data Mobil
      </div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-bordered table-responsive" id="table1">
      <thead>
          <tr>
              <th>kode Booking</th>
              <th>Tanggal Order</th>
              <th>Nama Penyewa</th>
              <th>Mobil</th>
              <th>Durasi Pengorderan</th>
              <th>Dikembalikan</th>
              <th>Denda</th>
              <th>Total Harga</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($bookings as $booking)
          <tr>
              <td>{{$booking->kode_booking}}</td>
              <td>{{$booking->tanggal_order}}</td>
              <td>{{$booking->client->name}}</td>
              <td>{{$booking->mobil->car_name}}</td>
              <td>{{$booking->durasi}} Hari</td>
              <td>{{$booking->dikembalikan}}</td>
              <td>{{($booking->denda == null) ? '-' : 'Rp.'. number_format($booking->denda)}}</td>
              <td>Rp. {{number_format($booking->total_price)}}</td>
          </tr>
          @endforeach
      </tbody>
  </table>
  </div>
</div>
@endsection

@section('script')
    
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/fontawesome/all.min.js"></script>
<script>
  let jquery_datatable = $("#table1").DataTable()
</script>
@endsection