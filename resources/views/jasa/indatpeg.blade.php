@extends('master')

@section('content')
<h3 class="page-title">
                     Form Input Data Pegawai
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
                           Input Data Pegawai
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
                            <h4><i class="icon-reorder"></i> Input Data Pegawai</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="widget-body form">    
             <form class="cmxform form-horizontal" action="{{ url('indatpeg') }}" method="POST" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">      
                                <div class="control-group ">
                                    <label for="lastname" class="control-label">Nama Pegawai</label>
                                    <div class="controls">
                                       <input style="width:250px;" type="text" name="nama">
                                     </div>
                                </div>
                                <div class="control-group ">
                                    <label for="lastname" class="control-label">Kategori jasa</label>
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
                                    <a href="/datpeg"><button class="btn" type="button">Cancel</button></a>
                                </div>
    
@endsection