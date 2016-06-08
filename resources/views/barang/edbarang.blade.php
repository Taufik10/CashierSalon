@extends('master')

@section('content')
<h3 class="page-title">
                     Form Edit Barang
                   </h3> 
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">SalonKu</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Edit Data barang
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Edit Data Barang</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                            <form class="cmxform form-horizontal" action="{{ $barang->id }}" method="post">                            
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="control-group ">
                                    <label for="lastname" class="control-label">Kode Barang</label>    
                                    <div class="controls">                                                  
                                    <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}" readonly>
                              </div>  
                              </div>
                                <div class="control-group ">
                                    <label for="lastname" class="control-label">Nama Barang</label>
                                    <div class="controls">
                                      <input style="width:250px;" type="text" name="nama_barang" value="{{ $barang->nama_barang }}" />
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="username" class="control-label">Harga Modal</label>
                                    <div class="controls">
                                      <input style="width:250px;" type="text" name="harga_modal" value="{{ $barang->harga_modal }}" />
                                    </div>  
                                </div>
                                <div class="control-group ">
                                    <label for="password" class="control-label">Harga Jual</label>
                                    <div class="controls">
                                        <input style="width:250px;" type="text" name="harga_jual" value="{{ $barang->harga_jual }}" />
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="confirm_password" class="control-label">Satuan</label>
                                    <div class="controls">
                                        <input style="width:250px;" type="text" name="satuan" value="{{ $barang->satuan }}" />
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="email" class="control-label">Stok</label>
                                    <div class="controls">
                                        <input style="width:250px;" type="text" name="stok" value="{{ $barang->stok }}" />
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="agree" class="control-label">Keterangan</label>
                                    <div class="controls">
                                        <input style="width:250px;" type="text" name="keterangan" value="{{ $barang->keterangan }}" />
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="newsletter" class="control-label">Kategori</label>
                                    <div class="controls">
                                        <select style="width:100%;height:35px;" name="kategori_barang">
                                          @foreach($kategoris as $key => $kategori)
                                            @if($kategori->id == $barang->kategori_barang)
                                              <option value="{{ $kategori->id }}" selected="selected">{{ $kategori->kategori_barang }}</option>
                                            @else
                                              <option value="{{ $kategori->id }}">{{ $kategori->kategori_barang }}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button class="btn btn-success" type="submit">Save</button></form>
                                    <a href="/databarang"><button class="btn" type="button">Cancel</button></a>
                                </div>

                            
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
  	
@endsection