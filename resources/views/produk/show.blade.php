@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row container-fluid mt-3">
                    <div class="col-md-12" align="start" style="font-size: 1rem;">
                        <p>Data Detail Produk</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-horizontal">  
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label class="control-label col-sm-2">Nama Produk</label>
                            <div class="col-sm-12">
                                <p>"{{ $produk->nama }}"</p> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Kategori Produk</label>
                            <div class="col-sm-12">
                                {{ $produk->kategori->nama }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Qty Awal</label>
                            <div class="col-sm-12">
                                <p>{{ $produk->qty }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Harga Jual</label>
                            <div class="col-sm-12">
                                <p>{{ $produk->harga_jual }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Harga Beli</label>
                            <div class="col-sm-12">
                                <p>{{ $produk->harga_beli }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-12">
                                <button onclick="location.href='{{ url('produk') }}'" class="btn btn-warning">Data Produk</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection