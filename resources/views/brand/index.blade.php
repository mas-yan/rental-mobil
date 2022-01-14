@extends('layout.app.index')
@section('page-header','Master Data Brand')
@section('title','Dashboard')
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
      Data Brand
  </div>
  <div class="card-body">
      <table class="table" id="table1">
          <thead>
              <tr>
                  <th style="width: 60%">Brand Mobil</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($brand as $value)
            <tr>
              <td>{{$value->brand_name}}</td>
              <td><a href="/delete/{{$value->id}}" class="text-danger btn btn-danger text-white btn-sm"><span class="fa-fw fas"></span> Delete</a></td>
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