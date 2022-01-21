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
  <div class="d-grid gap-2">
    <button class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#border-less">Konfirmasi Rental Mobil</button>
  </div>

  <div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pembayaran</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
              <form action="{{route('confirm')}}" method="POST">
                @csrf
                <input type="hidden" name="client_id" value="{{$client->id}}">
                <input type="hidden" name="car_id" value="{{$car->id}}">
                <input type="hidden" name="booking_code" value="{{$data['kode']}}">
                <input type="hidden" name="order_date" value="{{$data['order_date']}}">
                <input type="hidden" name="duration" value="{{$data['duration']}}">
                <input type="hidden" name="tanggal_pengembalian" value="{{$return_date}}">
                <input type="hidden" name="total_price" value="{{$total_price}}">
                <input type="hidden" name="car_id" value="{{$car->id}}">
                <div class="form-group">
                  <label for="kode">Kode Booking</label>
                <input type="text" readonly name="kode" value="M-{{rand()}}" class="form-control" id="kode">
              </div>
              <div class="form-group">
                <p>Paid Type</p>
                <select name="type" required class="form-control">
                    <option disabled selected value=""> - Select One - </option>
                    <option value="dp">DP</option>
                    <option value="repayment">Repayment</option>
                </select>
            </div>

            <div class="form-group">
                <p>Amount</p>
                <input type="number" name="amount" required class="form-control" min="{{$pay}}" max="{{$total_price}}" placeholder="Bayar" value="{{ old('amount') }}">
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Proses</span>
                  </button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-element-select.js')}}"></script>
@endsection