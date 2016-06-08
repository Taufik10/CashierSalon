@extends('master')

@section('content')
<h3 class="page-title">
                     Form Input Produk Jasa
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
                           Input Produk Jasa
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
                            <h4><i class="icon-reorder"></i>Input Produk Jasa</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="widget-body form">              
                          <form class="cmxform form-horizontal" action="{{ url('injasa') }}" method="POST" >
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">      
                              <div class="control-group ">
                                    <label class="control-label">Kode Produk</label>
                                    <div class="controls">
                                <a href="#"><button style="border:none;background:#e74c3c;height:25px;width:100px;color:white"></a>
                               <?php
                                  $a = rand(0,999);
                                  $b = rand(0,9);
                                  if ($a<100) {
                                    $kode_produk = "BAR-".$b.substr($a,0,5);
                                    $randomkode = "BAR-".$b.substr($a,0,5);
                                  }
                                  elseif ($a<100) {
                                    $kode_produk = "BAR-".$b.$b.substr($a,0,4);
                                    $randomkode = "BAR-".$b.$b.substr($a,0,4);
                                  }
                                  elseif ($a<10) {
                                    $kode_produk = "BAR-".$b.$b.$b.substr($a,0,3);
                                    $randomkode = "BAR-".$b.$b.$b.substr($a,0,3);
                                  }
                                  elseif ($a<10) {
                                    $kode_produk = "BAR-".$b.$b.$b.$b.substr($a,0,2);
                                    $randomkode = "BAR-".$b.$b.$b.$b.substr($a,0,2);
                                  }              
                                  else {
                                    $kode_produk = "BAR".$a;
                                    $randomkode = "BAR-".$a;
                                  }
                                ?>
                                {{ $randomkode}}
                              </div>         
                                    <div class="controls">
                                       <input type="hidden" name="kode_produk" value="{{ $randomkode }}" />
                                    </div>
                                </div>
                               <div class="control-group ">
                                    <label class="control-label">Nama Produk</label>
                                    <div class="controls">
                                     <input style="width:250px;" type="text" name="nama_produk">
                                    </div>
                               </div>     
                                <div class="control-group ">
                                    <label class="control-label">Keterangan</label>
                                    <div class="controls">
                                    <input style="width:250px;" type="text" name="keterangan">
                                    </div>
                               </div>     
                               <div class="control-group ">
                                    <label class="control-label">Harga</label>
                                    <div class="controls">
                                    <input style="width:250px;" type="text" name="harga">
                                   </div>
                               </div>    
                                <div class="control-group ">
                                    <label class="control-label">Kategori</label>
                                  <div class="controls">
                                    <select style="width:100%;height:35px;" name="kategori_jasa">
                                    <option>Pilih Kategori</option>
                                    @foreach($kategoris as $key => $kategori)
                                      <option value="{{ $kategori->id }}">{{ $kategori->kategori_jasa }}</option>
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