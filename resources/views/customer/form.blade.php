@extends('layouts.template')

@section('title',"Data customer")
@section('page-title',"Data customer")
@section('content')
    <form action="" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cus_kd">kode customer</label>
                            <input type="hidden" name="id_cus" class="form-control" value="{{ @$rsCus -> id }}">
                            <input type="text" class="form-control @error('cus_kd') is-invalid @enderror" name="cus_kd" id="cus_kd" placeholder="kd001" value="{{ @$rsCus -> cus_kd }}">
                            @error('cus_kd')
                            <div id="cus_kd" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cus_nm">Nama Customer</label>
                            <input type="text" class="form-control @error('cus_nm') is-invalid @enderror" name="cus_nm" id="cus_nm" placeholder="budi ganteng" value="{{ @$rsCus -> cus_nm }}">
                            @error('cus_nm')
                            <div id="cus_nm" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cus_alamat">Alamat</label>
                            <input type="text" class="form-control  @error('cus_alamat') is-invalid @enderror" name="cus_alamat" id="cus_alamat" placeholder="jl budi no 100" value="{{ @$rsCus-> cus_alamat }}" >
                            @error('cus_alamat')
                                <div id="cus_alamat" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cus_kota">Kota</label>
                            <input type="text" class="form-control @error('cus_kota')is-invalid @enderror" name="cus_kota" id="cus_alamat" placeholder="Madiun" value="{{ @$rsCus -> cus_kota   }}" >
                            @error('cus_kota')
                                <div id="cus_kota" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cus_jk">Jenis Kelamin</label>
                            <select name="cus_jk" id="cus_jk">
                                <option value="{{ @$rsCus -> L  }}">lelaki</option>
                                <option value="{{  @$rsCus -> p }}">perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cus_telp">No Telp</label>
                            <input type="number" class="form-control @error('cus_telp')is-invalid @enderror" name="cus_telp" id="cus_telp" placeholder="082142432018" value="{{ @$rsCus -> cus_telp  }}" >
                            @error('cus_telp')
                                 <div  id="cus_telp"  class="invalid-feedback">
                                     {{$message}}
                                 </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cus_status">status</label>
                            <select name="cus_status" id="cus_status">
                                <option value="A">Active</option>
                                <option value="NA">Non Active</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cus_poin">poin customer</label>
                            <input type="number" class="form-control @error('cus_poin')is-invalid @enderror" name="cus_poin" id="cus_poin" placeholder="100" value="{{ @$rsCus -> cus_poin }}" >
                            @error('cus_poin')
                            <div  id="cus_poin"  class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
