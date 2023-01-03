@extends('layouts.template')

@section('title',$title)
@section('page-title',$title)

@section('content')
     <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('kitchen/save')}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="kitc_nm">Kitchen</label>
                            <input type="hidden" name="id_kitc" value="{{@$rsKitc->id}}">
                            <input type="text" class="form-control @error('cat_nm')is-invalid @enderror"name="kitc_nm"id="kitc_nm"placeholder="Nama Kitchen" value="{{ @$rsKitc->cat_nm }}">
                            @error('kitc_nm')
                                <div id="kitc_nm" class="invalid-feedback">
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

@endsection
