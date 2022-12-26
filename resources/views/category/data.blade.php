@extends('layouts.template')

@section('title',"Data category")
@section('page-title',"Data category")    
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
                
                <a href="{{ url("category/form")  }}" class="btn btn-primary btn-md" >add new</a>
            </div>
        </div>
        <div class="card-body">
            <table id="dtTable" class="dtTable table table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtCat as $rsCat)
                        <tr>
                            <td>{{ $rsCat -> id  }}</td>
                            <td>{{ $rsCat ->cat_nm}} </td>
                            <td>
                                <a href="{{ url("category/form/".$rsCat->id)}}">e</a>
                                <a href="{{ url("category/delete/".$rsCat->id)}}">x</a>
                            </td>
                        </tr>      
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection