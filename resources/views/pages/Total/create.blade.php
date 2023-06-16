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
                    <h4>Total Saldo</h4>
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
                <strong>Tabungan</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('moneys.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="amount" class="form-control-label">Mentransfer Uang Ke Tabungan</label>
                        <input type="number" min="0" name="amount" id="amount" value="{{ old('name') }}"
                            class="form-control @error('amount') is-invalid @enderror" placeholder="Nominal" />
                        @error('amount')
                        <div class="text-muted">{{$message}}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="type" value="Store">
                    <div class="form-group">
                        <button class="btn-cent" type="submit" name="create" value="create">
                            Setor Uang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Uang Total</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('moneys.update',1)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="amount" class="col-form-label"> Tambahkan Uang</label>
                        <input type="number" min="0" class="form-control" id="amount" name="amount" placeholder="nominal">
                    </div>
                    <button class="btn-cent" type="submit" name="create" value="create">
                        Tambah Uang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
