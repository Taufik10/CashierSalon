@extends('master')

@section('content')
<h3 class="page-title">
                     Form Edit Produk Jasa
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
                           Edit Produk Jasa
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
                            <h4><i class="icon-reorder"></i>Edit Produk Jasa</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="widget-body form">   
                          <form class="cmxform form-horizontal" action="{{ $jasa->id }}" method="post">                                     
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">      
                              <div class="control-group ">
                                    <label for="lastname" class="control-label">Kode Produk</label>    
                                    <div class="controls">                                                  
                                    <input type="text" name="kode_produk" value="{{ $jasa->kode_produk }}" readonly>
                              </div>  
                              </div>                                            
                               <div class="control-group ">
                                    <label class="control-label">Nama Produk</label>
                                    <div class="controls">
                                     <input style="width:250px;" type="text" name="nama_produk" value="{{ $jasa->nama_produk }}">
                                    </div>
                               </div>     
                                <div class="control-group ">
                                    <label class="control-label">Keterangan</label>
                                    <div class="controls">
                                    <input style="width:250px;" type="text" name="keterangan" value="{{ $jasa->keterangan }}">
                                    </div>
                               </div>     
                               <div class="control-group ">
                                    <label class="control-label">Harga</label>
                                    <div class="controls">
                                    <input style="width:250px;" type="text" name="harga" value="{{ $jasa->harga }}">
                                   </div>
                               </div>    
                                <div class="control-group ">
                                    <label class="control-label">Kategori</label>
                                  <div class="controls">
                                    <select style="width:100%;height:35px;" name="kategori_jasa">
                                      @foreach($kategoris as $key => $kategori)
                                        @if($kategori->id == $jasa->kategori_jasa)
                                          <option value="{{ $kategori->id }}" selected="selected">{{ $kategori->kategori_jasa }}</option>
                                        @else
                                          <option value="{{ $kategori->id }}">{{ $kategori->kategori_jasa }}</option>
                                        @endif
                                      @endforeach
                                    </select>
                                  </div>   
                               </div>          
                                <div class="form-actions">
                                    <button class="btn btn-success" type="submit">Save</button></form>
                                    <a href="/projasa"><button class="btn" type="button">Cancel</button></a>
                                </div>

                            
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
    
@endsection