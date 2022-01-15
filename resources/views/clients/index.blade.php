@extends('layout.app.index')
@section('page-header','Master Data Penyewa')
@section('title','Penyewa')
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
        Data Mobil
        <div class="float-end">
          <a href="{{route('clients.create')}}" class="btn btn-primary">Tambah Data</a>
        </div>
      </div>
  </div>
  <div class="card-body">
    <table class="table" id="table1">
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIK</th>
                <th>Nama Peyewa</th>
                <th>Gender</th>
                <th>Tanggal Lahir</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($clients as $client)
          <tr>
            <td>
              <img src="{{$client->foto}}" style="width: 80px; height: 50px" class="img-fluid rounded">
            </td>
            <td>{{$client->nik}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->gender}}</td>
            <td>{{$client->date_of_birth}}</td>
            <td>{{$client->phone}}</td>
            <td>{!!$client->address!!}</td>
            <td class="text-center" style="width: 200px">
              <form action="{{route('clients.destroy',$client->id)}}" method="post">
                @csrf
                @method('delete')
                <a href="{{route('clients.edit',$client->id)}}" class="btn btn-warning btn-sm"><span class="fa-fw select-all fas"></span> Edit</a> | 
                <button type="submit" onclick="return confirm('yakin ingin menghapus?')" class="btn btn-danger btn-sm"><span class="fa-fw fas"></span> Delete</button>
              </form>
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