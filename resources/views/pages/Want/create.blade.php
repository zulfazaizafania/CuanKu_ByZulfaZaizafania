@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-12">
        @if (session()->has('moneyerror'))
        <div class="alert alert-danger px-5"> {{session()->get('moneyerror')}}</div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger px-5">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card card-money">
            <div class="card-body card-money-body">
                <div class="card-body-text">
                    <h4>Saldo untuk Keinginan</h4>
                </div>
                <h2 class="money">Rp{{ $money->amount }},00</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6">
        <div class="card card-money">
            <div class="card-body card-money-body">
                <div class="card-body-text">
                    <h4>Tabungan</h4>
                </div>
                <h2 class="money">Rp{{ $saving->amount }},00</h2>
            </div>
        </div>
    </div>
    <!-- /Widgets -->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <strong>Lakukan Transaksi Keinginan</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Nama" />
                        @error('name')
                        <div class="text-muted">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-control-label">Nominal</label>
                        <input type="number" min="0" name="price" id="price" value="{{ old('price') }}"
                            class="form-control @error('price') is-invalid @enderror" placeholder="Nominal" />
                        @error('price')
                        <div class="text-muted">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-control-label">Deskripsi</label>
                        <textarea name="description" id="description" rows="5" class="ckeditor form-control">
                        {{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="date" class="form-control-label">Tanggal</label>
                        <input id="datepicker" name="date" class="form-control @error('date') is-invalid @enderror"
                            placeholder="Tanggal" />
                        <script>
                            $("#datepicker").datepicker();

                        </script>
                        @error('date')
                        <div class="text-muted">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="time" class="form-control-label">Waktu</label>
                        <input id="timepicker" name="time" class="form-control @error('time') is-invalid @enderror"
                            placeholder="Waktu" />
                        <script>
                            $("#timepicker").timepicker();

                        </script>
                        @error('time')
                        <div class="text-muted">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location" class="form-control-label">Lokasi</label>
                        <input type="text" name="location" id="location" value=""
                            class="form-control @error('location') is-invalid @enderror" placeholder="Lokasi" />
                        @error('location')
                        <div class="text-muted">{{$message}}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="type" value="Want">
                    <div class="form-group">
                        <button class="btn-cent" type="submit" name="create" value="create">
                            Tambahkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
