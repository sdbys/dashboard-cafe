@extends('layouts.template')
@section('title',"Data Kitchen")
@section('page-title',"Data Kitchen")

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
                
                <a href="{{ url("kitchen/form")  }}" class="btn btn-primary btn-md" >add new</a>
            </div>
        </div>
        <div class="card-body">
            <table id="dtTable" class="dtTable table table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kitchen</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtKitc as $rsKitc)
                        <tr>
                            <td>{{ $rsKitc -> id  }}</td>
                            <td>{{ $rsKitc ->kitc_nm}} </td>
                            <td>
                                <a href="{{ url("kitchen/form/".$rsKitc->id)}}">e</a>
                                <a href="{{ url("kitchen/delete/".$rsKitc->id)}}">x</a>
                            </td>
                        </tr>      
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
