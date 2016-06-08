@extends('master')

@section('script')
  <script type="text/javascript">
    function hapus(id){
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm) {
          swal("Deleted!", "Your file has been deleted.", "success");
          setTimeout(function(){
            window.location = "/hapuskatjasa/"+id;
          },500)
          window
        } else {
            swal("Cancelled", "Your file is safe :)", "error");
        }
      });
    }
  </script>
@endsection

@section('content')
<h3 class="page-title">
                     Data Kategori Jasa
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Salonku</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Data Kategori Jasa
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
            <!-- END PAGE HEADER-->
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data Kategori Jasa</h4>
                            <span class="tools">
                                <a href="/inkatjas" class="icon-plus"></a>   
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>                                                                          
                            </span>
                           
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <th>No</th>                          
                <th>Kategori</th>
                <th>Tools</th>
              </thead>
              <tbody>
              <?php $i =1 ?>
              @foreach($data as $katjasa)       
                <tr>
                  <td>{{ $i++ }}</td>                 
                  <td>{{ $katjasa->kategori_jasa }}</td>                            
                  <div>
                    <td><a href="{{ url('edkatjas/'.$katjasa->id) }}" class="btn btn-warning">Edit</a>                                    
                    <button href="#" class="btn btn-danger" onclick="hapus({{ $katjasa->id }})">Hapus</button></td>
                  </div>
                </tr>
                @endforeach
              </tbody>
            </table>        
                   <ul class="pagination">                
                    {!! $data->render() !!}
                  </ul>                               
                          </div>
                      </div>
                      <!-- END EXAMPLE TABLE widget-->
                      </div>
                  </div>
     	
@endsection