@extends('master')

@section('script')
  <script type="text/javascript">
    function hapus(kode){
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
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
          swal("Deleted!", "Your imaginary file has been deleted.", "success");
          setTimeout(function(){
            window.location = "/hapusb/"+kode;
          },500)
          window
        } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
    }
  </script>
@endsection

@section('content')

                    <h3 class="page-title">
                     Data Transaksi Penjualan Barang
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
                           Data Transaksi Penjualan Barang
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
                        <h4><i class="icon-reorder"></i> Data Transaksi Penjualan Barang</h4>
                            <span class="tools">
                                <a href="/transbarang" class="icon-plus"></a>   
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>                                                                          
                            </span>
                           
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
              		<th>No</th>
              		<th>Tgl Nota</th>
              		<th>No. Nota</th>
              		<th>Pelanggan</th>            		
              		<th>Keterangan</th>
              		<th>Total Belanja(Rp)</th>
              		<th>Tools</th>
              	</thead>
              	<tbody>
                <?php $i =1 ?>
              @foreach($tbarang as $tbarangs)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $tbarangs->created_at }}</td>
                  <td>{{ $tbarangs->kode_penjualan }}</td>
                  <td>{{ $tbarangs->pelanggan }}</td>
                  <td>{{ $tbarangs->keterangan }}</td>
                  <td>{{ $tbarangs->total }}</td>                  		
              	<div>
            				<td><a href="/notabarang/{{ $tbarangs->kode_penjualan }}" class="btn btn-inverse">Nota</a>            			            			
            				<button href="#" class="btn btn-danger" onclick="hapus('{{ $tbarangs->kode_penjualan }}')">Hapus</button></td>
            			</div>
            		</tr>           
                @endforeach
            	</tbody>
            </table> 
            <ul class="pagination">                
              {!! $tbarang->render() !!}
            </ul>                               
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>      	
@endsection