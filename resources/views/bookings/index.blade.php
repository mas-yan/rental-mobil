@extends('layout.app.index')
@section('page-header','Booking Mobil')
@section('title','Booking')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}">
@endsection
@section('main')
<div class="row">
  @foreach ($cars as $car)
    <div class="col-md-4">
      <div class="card">
        <div class="card-content">
          <img class="card-img-top img-fluid" src="{{$car->foto}}" alt="Card image cap"
          style="height: 15rem" />
          <div class="card-body">
            <h4 class="card-title">{{$car->car_name}}</h4>
            <p class="card-text">{{$car->brand->brand_name}}</p>
            <p class="card-text">{{$car->plat_number}}</p>
            <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                data-bs-target="#border-less-{{$car->id}}">
                Rental
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade text-left modal-borderless" id="border-less-{{$car->id}}" tabindex="-1"
      role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Rental Mobil {{$car->car_name}}</h5>
                  <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                      aria-label="Close">
                      <i data-feather="x"></i>
                  </button>
              </div>
              <div class="modal-body">
                <form action="{{route('process')}}" method="post">
                  @csrf
                  <input type="hidden" name="car_id" value="{{$car->id}}">
                  <div class="form-group">
                    <label for="kode">Kode Booking</label>
                  <input type="text" readonly name="kode" value="M-{{rand()}}" class="form-control" id="kode">
                </div>
                <div class="form-group">
                  <label>Penyewa</label>
                  <select class="choices form-select" name="client" required>
                    <option value="" disabled selected >-- Pilih Penyewa --</option>
                    @foreach ($clients as $client)
                    <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal Order</label>
                  <input required type="date" name="order_date" class="form-control">
                </div>
                <label for="durasi">Durasi</label>
                <div class="input-group mb-3">
                  <input required type="number" name="duration" class="form-control" placeholder="Durasi" aria-describedby="basic-addon2">
                  <span class="input-group-text" id="basic-addon2">Hari</span>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                  <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Accept</span>
                    </button>
                  </form>
              </div>
          </div>
      </div>
    </div>
    @endforeach
</div>
@endsection
@section('script')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-element-select.js')}}"></script>
@endsection