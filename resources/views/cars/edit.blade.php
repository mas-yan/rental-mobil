@extends('layout.app.index')
@section('page-header','Edit Data Mobil')
@section('title','edit-mobil')
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
        Edit Data Mobil
      </div>
  </div>
  <div class="card-body">
    <form class="form form-vertical" action="{{route('cars.update',$mobil->id)}}" method="POST" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="form-body">
          <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <label for="foto-vertical">Foto Mobil</label>
                    <input type="file" id="foto-vertical" class="form-control @error('foto') is-invalid @enderror" name="foto" placeholder="Foto Mobil">
                        @error('foto') 
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <select name="brand_id" id="brand" class="form-control @error('brand_id') is-invalid @enderror">
                      <option value="">-- Pilih Brand --</option>
                      @foreach ($brands as $brand)
                        <option value="{{$brand->id}}" {{old('brand_id',$mobil->brand_id) == $brand->id ? 'selected' : ''}}>{{$brand->brand_name}}</option>
                      @endforeach
                    </select>
                    @error('brand_id') 
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="type">Type</label>
                  <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                    <option value="">-- Pilih type --</option>
                    <option value="manual" {{old('type',$mobil->type) == 'manual' ? 'selected' : ''}}>manual</option>
                    <option value="matic" {{old('type',$mobil->type) == 'matic' ? 'selected' : ''}}>matic</option>
                  </select>
                  @error('type') 
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
              </div>
              </div>
              <div class="col-12">
                  <div class="form-group">
                      <label for="car_name">Nama Mobil</label>
                      <input type="text" value="{{old('car_name',$mobil->car_name)}}" id="car_name" class="form-control @error('car_name') is-invalid @enderror"
                          name="car_name" placeholder="Nama Mobil">
                      @error('car_name') 
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @enderror
                  </div>
              </div>
              <div class="col-12">
                <label for="price">Harga / Hari</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">Rp.</span>
                  <input type="number" value="{{old('price',$mobil->price)}}" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Harga / Hari">
                  @error('price') 
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                  <div class="form-group">
                      <label for="plat_number">Plat Nomor</label>
                      <input type="text" id="plat_number" value="{{old('plat_number',$mobil->plat_number)}}" class="form-control @error('plat_number') is-invalid @enderror" name="plat_number" placeholder="Plat Number Nomor">
                      @error('plat_number') 
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @enderror
                    </div>
                  </div>
              </div>
              <div class="col-12 d-flex">
                  <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
              </div>
          </div>
      </div>
  </form>
  </div>
</div>
@endsection