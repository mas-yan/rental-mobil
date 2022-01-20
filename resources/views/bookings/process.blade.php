@extends('layout.app.index')
@section('page-header','Konfirmasi Rental Mobil')
@section('title','konfirmasi rental')
@section('style')
<style>
  .card{
      min-height: 400px;
  }
</style>
@endsection
@section('main')
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4>Data Transaksi</h4>
        <div class="card-body">
          <table class="table">
            <tbody>
              <tr>
                  <td>Kode</td>
                  <th class="text-sm">{{$data['kode']}}</th>
              </tr>
              <tr>
                  <td>Tanggal</td>
                  <th>{{$data['order_date']}}</th>
              </tr>
              <tr>
                  <td>Duration</td>
                  <th>{{$data['duration']}} Hari</th>
              </tr>
              <tr>
                  <td>Kembalikan</td>
                  <th>{{$return_date}}</th>
              </tr>
              <tr>
                  <td>Total Harga</td>
                  <th>Rp. {{number_format($total_price)}}</th>
              </tr>
              <tr>
                  <td>DP Min</td>
                  <th>Rp. {{number_format($pay)}}</th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-content">
        <img class="card-img-top img-fluid" src="{{$car->foto}}" alt="Card image cap"
        style="height: 15rem" />
        <div class="card-body">
          <div class="mb-3">
            <span><strong>{{number_format($car->price)}} / Hari &nbsp;</strong></span>
            <div class="float-end">
              {{$car->type}}
            </div>
        </div>
        <h3>{{$car->car_name}}</h3>
        <div class="pb-3">
            <span class="text-muted">{{$car->brand->brand_name}}</span>
            <div class="float-end">
                <span class="text-muted"><strong>{{$car->plat_number}}</strong></span>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4>Data Penyewa</h4>
        <div class="card-body">
          <table class="table">
              <tbody>
                  <tr>
                      <td>NIK</td>
                      <th>{{$client->nik}}</th>
                  </tr>
                  <tr>
                      <td>Nama</td>
                      <th>{{$client->name}}</th>
                  </tr>
                  <tr>
                      <td>Gender</td>
                      <th>{{$client->gender}}</th>
                  </tr>
                  <tr>
                      <td>Tgl lahir</td>
                      <th>{{$client->date_of_birth}}</th>
                  </tr>
                  <tr>
                      <td>Phone</td>
                      <th>{{$client->phone}}</th>
                  </tr>
                  <tr>
                      <td>Alamat</td>
                      <th>{!!$client->address!!}</th>
                  </tr>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <form action="{{route('confirm')}}" method="POST">
    @csrf
    <input type="hidden" name="client_id" value="{{$client->id}}">
    <input type="hidden" name="car_id" value="{{$car->id}}">
    <input type="hidden" name="booking_code" value="{{$data['kode']}}">
    <input type="hidden" name="order_date" value="{{$data['order_date']}}">
    <input type="hidden" name="duration" value="{{$data['duration']}}">
    <input type="hidden" name="return_date_supposed" value="{{$return_date}}">
    <input type="hidden" name="total_price" value="{{$total_price}}">
    <div class="d-grid gap-2">
      <button class="btn btn-primary" type="submit">Konfirmasi Rental Mobil</button>
    </div>
</form>
</div>
@endsection
@section('script')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-element-select.js')}}"></script>
@endsection