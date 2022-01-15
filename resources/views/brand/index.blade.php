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
    <div class="card-title">
      Tambah Data Brand
    </div>  
  </div>
  <div class="card-body">
    <form class="form form-vertical" action="{{route('addBrand')}}" method="POST">
      @csrf
      <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                  <label for="name">Nama Brand</label>
                  <input type="text" value="{{old('name')}}" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Brand">
                  @error('name') 
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
            <div class="col-12 d-flex justify-content-start">
              <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
      <div class="card-title">
        Data Brand
      </div>
  </div>
  <div class="card-body">
    <table class="table" id="table1">
        <thead>
            <tr>
                <th class="text-center" style="width: 60%">Brand Mobil</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($brand as $value)
          <tr>
            <td class="text-center">{{$value->brand_name}}</td>
            <td>
              <form action="{{route('deleteBrand',$value->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('yakin ingin menghapus?')" class="text-danger btn btn-danger text-white btn-sm"><span class="fa-fw fas"></span> Delete</button></td>
              </form>
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