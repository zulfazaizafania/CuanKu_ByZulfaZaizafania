@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <strong>Prioritas</strong>
            </div>
            <div class="card-body">
                <div class="table-stats order-table ov-h">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th class="d-none d-md-table-cell">Lokasi</th>
                                <th>Harga</th>
                                <th class="d-none d-sm-table-cell">Status</th>
                                <th>Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @forelse ($items as $item)
                            <tr class="bg-light">
                                <td>{{ $i }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->location }}</td>
                                <td>Rp. {{ $item->price }},00</td>
                                <td class="d-none d-md-table-cell">
                                    @if ($item->status=="Failed")
                                    <span class="badge badge-danger">
                                        @elseif ($item->status=="Success")
                                        <span class="badge badge-complete">
                                            @else
                                            <span>
                                                @endif
                                                {{$item->status}}</span>
                                </td>
                                <td>
                                    <a href="#mymodal" data-remote="{{ route('transactions.show', $item->id) }}"
                                        data-toggle="modal" data-target="#mymodal" data-title="Lihat Detail Transaksi"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('transactions.edit', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('transactions.destroy', $item->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++ ; ?>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center p-5">
                                    Data tidak tersedia
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.table-stats -->
            </div>
        </div>
    </div>
</div>
@endsection
