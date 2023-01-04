@extends('layouts.blank')

@section("title",$title)

@section('content')

    <div class="row m-0 p-0">
        <div class="col-md-8 p-0">
            <div class="card card-success">
                <div class="card-header">
                    <h2 class="card-title" style="font-size:24px;">
                        <a href="{{ url("/") }}"><i class="fas fa-home"></i></a> DAFTAR MENU
                    </h2>
                    <div class="card-tools">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-0">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-warning btn-flat">SEARCH</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-group mb-3 px-1">
                <button type="button" class="btn btn-success">Category</button>
                <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu bg-success" role="menu">
                    @foreach ($dtCat as $rsCat)
                        <a class="dropdown-item text-light" href="#">{{ $rsCat->cat_nm }}</a>
                    @endforeach
                </div>
            </div>
            <!-- List Menu -->
            <div class="menu-list px-1">
                <div class="row">
                @foreach ($dtMenu as $rsMenu)
                    <div class="menu-item col-md-3" onclick="add_menu('{{ $rsMenu->id }}','{{ $rsMenu->mn_nm }}','{{ $rsMenu->mn_harga }}')">
                        <div class="inner">
                            @if($rsMenu["foto"]!="")
                                <img class="thumb-menu" src="{{ asset($rsMenu->foto) }}" alt="">
                            @else
                                <img class="thumb-menu" src="{{ asset("images/no-image.webp") }}" alt="">
                            @endif
                            <h2>{{ $rsMenu->mn_nm }} <br/><span>{{ number_format($rsMenu->mn_harga,"0",",",".") }}</span></h2>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            {{-- End List Menu --}}
        </div>
        <div class="col-md-4">
            <div class="transaksi">
                <form action="{{ url('transaction/save')  }}" method="post">
                    @csrf
                    {{-- Info Transaksi --}}
                    <p><strong>Member : </strong><br><span id="member"></span></p>
                    <input id="txtCusID" type="hidden" name="trans_cus_id">
                    <div class="row member">
                        <div class="col-md-9">
                            <p><strong>Member :</strong><br/><span id="member"></span></p>
                            <input id="txtCusID" type="hidden" name="trans_cus_id">
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-success"><i class="fas fa-ellipsis-h"  data-toggle="modal" data-target="#modal-customer"></i></a>
                        </div>
                    </div>

                    <p>
                        <input type="text" name="meja" id="meja" placeholder="Meja/AtasNama">
                    </p>
                    {{-- End Info Transaksi --}}
                    <hr>
                    {{-- Detail Menu yang dipesan --}}
                    <div class="detail">

                    </div>
                    <hr>
                    {{-- End Detail Menu yang dipesan --}}
                    {{-- Total --}}
                    <div class="other">
                        <div class="other-item">
                            <div class="row">
                                <div class="desc col-md-7">
                                    <p><strong>Discount</strong></p>
                                </div>
                                <div class="price col-md-5">
                                    <p id="diskon"><span>Rp</span> 0</p>
                                    <input type="hidden" name="diskon" id="txtDiskon" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="other-item">
                            <div class="row">
                                <div class="desc col-md-7">
                                    <p><strong>PPN 11%</strong></p>
                                </div>
                                <div class="price col-md-5">
                                    <p id="ppn"><span>Rp</span> 0</p>
                                    <input type="hidden" name="ppn" id="txtPPN" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Total --}}
                    <h2 id="amount"><span>Rp</span> 0</h2>
                    <input type="hidden" id="gtotal" name="gtotal">
                    <div class="row btn-action">
                        <div class="col-md-6">
                            <button href="{{url('transaction/save')}}"  class="btn btn-success">SAVE</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-warning">PRINT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Template Menu --}}
      {{-- Template Menu --}}
    <div id="tmp-menu" class="detail-item" style="display: none">
        <div class="row">
            <div class="item col-md-7">
                <h4>Nasi Goreng</h4>
                <p>Items :<input class="jumlah" name="jumlah[]" onchange="ganti_harga(this)" type="number" min="1" value="1" data-harga=""></p>
                {{-- Disimpan ke database --}}
                <input type="hidden" name="id_menu[]" class="txtID">
                <input type="hidden" name="nm_mn[]" class="txtNama">
                <input type="hidden" name="harga[]" class="txtHarga">
            </div>
            <div class="price col-md-5">
                <h4><span>Rp</span> 7.000</h4>
                <a href="javascript:void(0)" class="delete" onclick="del_menu(this)" data-id=""><i class="fas fa-times"></i></a>
            </div>
        </div>
    </div>

    {{-- End Template Menu --}}

    {{-- Data Customer --}}
    <div class="modal fade" id="modal-customer">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="dtCustomer" class="dtTable table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dtCus as $rsCus)
                            <tr>
                                <td>{{ $rsCus->cus_kd }}</td>
                                <td>{{ $rsCus->cus_nm }}</td>
                                <td>{{ $rsCus->cus_alamat." ".$rsCus->cus_kota }}</td>
                                <td>{{ $rsCus->cus_telp }}</td>
                                <td>
                                    <button onclick="pilih_customer('{{ $rsCus->id }}','{{ $rsCus->cus_kd }}','{{ $rsCus->cus_nm }}')" class="btn btn-danger btn-sm">CHOOSE</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{--  End Data Customer --}}
@endsection

