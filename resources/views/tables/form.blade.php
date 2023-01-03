@extends('layouts.template')

@section('title',"Data Tables")
@section('page-title',"Data Tables")

@section('content')
 <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('tables/save')}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="tab_nm">Tables</label>
                            <input type="hidden" name="id" value="{{@$rsTab->id}}">
                            <input type="text" class="form-control @error ('mj_no')is-invalid @enderror" name="mj_no" id="mj_no"  placeholder="Nomer Meja"  value="{{@$rsTab->mj_no}}">
                             @error('mj_no')
                                <div id="mj_no" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control @error ('mj_capacity')is-invalid @enderror" name="mj_capacity" id="mj_capacity"  placeholder="Kapasitas Meja"  value="{{@$rsTab->mj_capacity}}">
                             @error('mj_capacity')
                                <div id="mj_capacity" class="invalid-feedback">
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
