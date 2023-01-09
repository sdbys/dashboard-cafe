@extends('layouts.template')

@section("title",$title)
@section("page-title",$title)

@section('content')

    {{-- Notif --}}
    @if (session("text"))
        <div class="alert alert-{{ session("type") }}" role="alert">
            {{ session("text") }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ url("transaction/form") }}" class="btn btn-primary btn-sm">Add New</a>
            </div>
        </div>
        <div class="card-body">
            <table id="dtTrans" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Nota</th>
                    <th>Tanggal</th>
                    <th>Kasir</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($dtTrans as $rsTrans)
                    <tr>
                        <td>{{  $rsTrans->trans_nota }}</td>
                        <td>{{ $rsTrans->trans_tgl }}</td>
                        <td>{{ $rsTrans->name }}</td>
                        <td>{{ $rsTrans->trans_cus_id == 0 ? "Umum" : $rsTrans->cus_nm }}</td>
                        <td class="text-right">{{ number_format($rsTrans->trans_gtotal,0,",",".") }}</td>
                        <td>
                            @if ($rsTrans->status==0)
                                <span class="badge badge-warning">Process</span>
                            @endif
                            @if ($rsTrans->status==1)
                                <span class="badge badge-success">Done</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url("menu/form/".$rsTrans->id) }}"><i class="text-warning fas fa-edit"></i></a>
                            <a href="{{ url("menu/delete/".$rsTrans->id) }}"><i class="text-danger fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="{{ $dtTrans->previousPageUrl() }}">« Prev</a></li>
                <li class="page-item"><a class="page-link" href="javasscript:void(0)">{{ "Hal : ".$dtTrans->currentPage() }}</a></li>
                {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
                <li class="page-item"><a class="page-link" href="{{ $dtTrans->nextPageUrl() }}">Next »</a></li>
            </ul>
        </div>
    </div>
@endsection
