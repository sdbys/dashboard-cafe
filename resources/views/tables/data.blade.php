@extends('layouts.template')

@section('title',"Data Tables")
@section('page-title',"Data Tables")

@section('content')
                {{-- notif --}}
        {{-- @if (session(text))
            <div class="alert alert-{{ session(type) }}" role="alert">
                {{ session("text")}}
            </div>
        @endif --}}
    <div class="card">
        <div class="card-header">
            <div class="card-tools">

                <a href="{{ url("tables/form")  }}" class="btn btn-primary btn-md" >add new</a>
            </div>
        </div>
        <div class="card-body">
            <table id="dtTable" class="dtTable table table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nomer meja</th>
                        <th>Capacity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtTab as $rsTab)
                        <tr>
                            <td>{{ $rsTab -> id  }}</td>
                            <td>{{ $rsTab ->mj_no}} </td>
                            <td>{{ $rsTab ->mj_capacity}} </td>
                            <td>
                                <a href="{{ url("tables/form/".$rsTab->id)}}">e</a>
                                <a href="{{ url("tables/delete/".$rsTab->id)}}">x</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
