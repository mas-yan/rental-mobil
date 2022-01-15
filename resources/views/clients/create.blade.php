@extends('layout.app.index')
@section('page-header','Tambah Data Penyewa')
@section('title','tambah-penyewa')
@section('style')
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
        Tambah Data Penyewa
      </div>
  </div>
  <div class="card-body">
    <form class="form form-vertical" action="{{route('clients.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-body">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="foto-vertical">Foto Penyewa</label>
              <input type="file" required id="foto-vertical" class="form-control @error('foto') is-invalid @enderror" name="foto" placeholder="Foto Mobil">
              @error('foto') 
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-12">
              <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" value="{{old('nik')}}" id="nik" class="form-control @error('nik') is-invalid @enderror"
                      name="nik" placeholder="NIK">
                  @error('nik') 
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
              </div>
          </div>
          <div class="col-12">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Plat Number Nomor">
                @error('name') 
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="gender">Jenis Kelamin</label>
              <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                <option value="">-- Pilih gender --</option>
                <option value="Laki-laki" {{old('gender') == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                <option value="Perempuan" {{old('gender') == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
              </select>
              @error('gender') 
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="date_of_birth">Tanggal Lahir</label>
              <input type="date" value="{{old('date_of_birth')}}" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth">
              @error('date_of_birth') 
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="phone">No HP</label>
              <input type="number" value="{{old('phone')}}" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone">
              @error('phone') 
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="address">Alamat</label>
              <textarea name="address" id="default" placeholder="Alamat Lengkap" cols="30" rows="10">{{old('address')}}</textarea>
              @error('address') 
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-12 d-flex">
              <button type="submit" class="btn btn-primary me-1 mb-1">tambah</button>
          </div>
        </div>
      </div>
  </form>
  </div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assets/vendors/tinymce/plugins/code/plugin.min.js')}}"></script>
<script>
    tinymce.init({ selector: '#default' });
    tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
</script>
@endsection