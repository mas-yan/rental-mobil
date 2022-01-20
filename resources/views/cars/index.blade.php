@extends('layout.app.index')
@section('page-header','Master Data Mobil')
@section('title','Mobil')
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
          <a href="{{route('cars.create')}}" class="btn btn-primary">Tambah Data</a>
        </div>
      </div>
  </div>
  <div class="card-body">
    <table class="table" id="table1">
        <thead>
            <tr>
                <th>Foto Mobil</th>
                <th>Brand</th>
                <th>Type</th>
                <th>Nama Mobil</th>
                <th>Harga / Hari</th>
                <th>Plat Nomor</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($cars as $car)
          <tr>
            <td>
              <img src="{{$car->foto}}" style="width: 80px; height: 50px" class="img-fluid rounded">
            </td>
            <td>{{$car->brand->brand_name}}</td>
            <td>{{$car->type}}</td>
            <td>{{$car->car_name}}</td>
            <td>{{$car->price}}</td>
            <td>{{$car->plat_number}}</td>
            <td class="text-center">
              <form action="{{route('cars.destroy',$car->id)}}" method="post">
                @csrf
                @method('delete')
                <a href="{{route('cars.edit',$car->id)}}" class="btn btn-warning btn-sm"><span class="fa-fw select-all fas"></span> Edit</a> | 
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