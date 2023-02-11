@extends('layouts.template')

@section('title',"Data customer")
@section('page-title',"Data customer")

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{url ("customer/form")}}"class="btn btn-primary">Add new</a>
            </div>
        </div>
        <div class="card-body">
            <table id="dtCus" class="dtTable table table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>jk</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtCus as $rsCus)
                        <tr>
                            <td>{{ $rsCus ->id }}</td>
                            <td>{{$rsCus -> cus_nm}}</td>
                            <td>{{$rsCus -> cus_alamat}}</td>
                            <td>{{$rsCus -> cus_telp}}</td>
                            <td>{{$rsCus -> cus_jk}}</td>
                            <td>
                                <a href="{{ url("customer/form/".$rsCus->id)}}"><i class="bi bi-pencil p-2" ></i></a>
                                <a href="{{ url("customer/delete/".$rsCus->id)}}"><i class="bi bi-eraser p-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection