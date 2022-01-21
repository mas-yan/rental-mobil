@extends('layout.app.index')
@section('page-header','Data Booking')
@section('title','Booking')
@section('style')
    
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
<style>
  table.dataTable td{
      padding: 15px 8px;
  }
  .fontawesome-icons .the-icon svg {
        font-size: 24px;
    }
</style>
@endsection
@section('main')
<div class="card">
  <div class="card-header">
      <div class="card-title">
        Data Mobil Yang Dirental
      </div>
  </div>
  <div class="card-body">
    <table class="table" id="table1">
        <thead>
            <tr>
              <th>Kode Booking</th>
              <th>Tanggal Rental</th>
              <th>Nama Penyewa</th>
              <th>Mobil</th>
              <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($bookings as $booking)
            <tr>
                <td>{{$booking->kode_booking}}</td>
                <td>{{$booking->tanggal_order}}</td>
                <td>{{$booking->client->name}}</td>
                <td>{{$booking->mobil->car_name}}</td>
                <td>
                  <a href="{{route('returns.show',$booking->id)}}" class="btn btn-info"><span class="fa-fw select-all fas"></span>Lihat</a>                           
                </td>
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