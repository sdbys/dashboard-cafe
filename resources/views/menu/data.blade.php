@extends('layouts.template')

@section("title",$title)
@section("page-title",$title)

@section('content')

    {{-- Notif --}}
    {{-- @if (session("text"))
        <div class="alert alert-{{ session("type") }}" role="alert">
            {{ session("text") }}
        </div>
    @endif --}}

    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ url("menu/form") }}" class="btn btn-primary btn-sm">Add New</a>
            </div>
        </div>
        <div class="card-body">
            <table id="dtMenu" class="dtTable table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtMenu as $rsMenu)
                        <tr>
                            <td>
                                @if($rsMenu->foto!="")
                                    <img class="thumb-menu" src="{{ $rsMenu->foto }}" alt="{{ $rsMenu->mn_nama }}">
                                @else
                                    <img class="thumb-menu" src="{{ asset('images/no-image.webp') }}" alt="{{ $rsMenu->mn_nama }}">
                                @endif
                            </td>
                            <td>{{ $rsMenu->mn_nm }}<br/>{{ $rsMenu->mn_desc }}</td>
                            <td>{{ $rsMenu->mn_harga }} / {{ $rsMenu->mn_satuan }}</td>
                            <td>
                                @if ($rsMenu->mn_stok=="A")
                                <span class="badge badge-success">Available</span>
                                @else
                                <span class="badge badge-danger">Not Available</span>
                                @endif
                            </td>
                            <td>                                                     <div class="icon">
                                <a href="{{ url("menu/form/".$rsMenu->id) }}"><i class="bi bi-pencil-square "></i></a>
                                <a href="{{ url("menu/delete/".$rsMenu->id) }}"><i class="bi bi-trash "></i></a>
                            </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
