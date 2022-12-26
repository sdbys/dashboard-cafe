@extends('layouts.template')

@section('title',$title)
@section('page-title',$title)
    
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('category/save')}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="cat_nm">Category</label>
                            <input type="hidden" name="id_cat" value="{{@$rsCat->id}}">
                            <input type="text" class="form-control @error('cat_nm')is-invalid @enderror"name="cat_nm"id="cat_nm"placeholder="Nama Category" value="{{ @$rsCat->cat_nm }}">
                            @error('cat_nm')
                                <div id="cat_nm" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="SAVE" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection