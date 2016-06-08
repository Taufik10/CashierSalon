@extends('master')

@section('content')

<script type="text/javascript">
  window.onload = window.print;
</script>

<h3 class="page-title">
   Transaksi Barang
</h3>
<hr>
<h3>Data Transaksi</h3>
<hr style="width:120px;">
<form action="/transproduk" class="form-horizontal" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
   <div class="control-group">
      <label class="control-label">No Penjualan</label>
      <div class="input-control text full-size">
         <button style="margin-left:20px;border:none;background:#e74c3c;height:25px;width:100px;color:white">
         {{ $pelanggan->kode_penjualan }}
         </button>
      </div>
   </div>
   <tr>
        <!-- <td><input type="hidden" name="kode_penjualan" value="{{ $pelanggan->kode_penjualan }}"></td> -->
      </tr>


   <div class="control-group">
      <label class="control-label">Pelanggan</label>
      <div class="controls">
         <input type="text" class="span4" name="pelanggan" value="{{ $pelanggan->pelanggan }}" />                                   
      </div>
   </div>
   <div class="control-group ">
      <label class="control-label">Keterangan</label>
      <div class="controls">
         <input type="text" class="span4" name="keterangan" value="{{ $pelanggan->keterangan }}" />                                          
      </div>
   </div>


   <hr>   
   <h3 class="page-title">
      Daftar Barang
   </h3>
   <table class="table"> 
   <?php
   $i =1;   
   ?>
   <?php $grandTotal1 = 0 ?>
   <?php $grandTotal2 = 0 ?>
   @if(count($tbarang) > 0)  
      <thead>
         <th>No</th>
         <th>Kode</th>
         <th>Nama barang</th>
         <th>Harga(Rp)</th>
         <th>jumlah</th>
         <th>SubTotal(Rp)</th>
      </thead>
      <tbody>  
      @foreach($tbarang as $tbarang)          
         <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $tbarang['kode_barang'] }}</td>
            <td>{{ preg_replace('/\d+-/','',  $tbarang['nama_barang'] )}}</td>
            <td>{{ $tbarang['harga_jual'] }}</td>            
            <td>{{ $tbarang['jumlah'] }}</td>    
            <?php
            $harga_jual = $tbarang['harga_jual'];
            $jumlah = $tbarang['jumlah'];
            $harga_akhir = $tbarang['harga_jual']*$tbarang['jumlah'];            
            ?>
            <td>{{ $harga_akhir }}</td>
            <?php $grandTotal1 += $tbarang['jumlah'] ?>
            <?php $grandTotal2 += $harga_akhir ?>
         </tr>
      @endforeach
      </tbody>
      <form action="transaksiproduk" method="POST" id="transaksiproduk">
      <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <thead>
           <th></th>
           <th></th>
           <th></th>
           <th>Grand Total Belanja(Rp)</th>
           <th>{{ $grandTotal1 }}</th>
           <th>{{ $grandTotal2 }}</th>
           <th><input id="total" style="width:100px;" type="hidden" name="total" value="{{ $grandTotal2 }}" /></th>           
        </thead>
        <thead>
           <th></th>
           <th></th>
           <th></th>
           <th>Uang Bayar(Rp)</th>
           <th></th>
           <th>{{ $uang_bayar->bayar }}</th>
           <th></th>        
        </thead>
        <thead>
           <th></th>
           <th></th>
           <th></th>
           <th>Uang Kembali(Rp)</th>
           <th></th>
           <th>{{ $uang_kembali->kembalian }}</th>
           <th></th>        
        </thead>            
      </form>  
      @endif  
   </table>

@endsection

@section('script')
<script type="text/javascript">
    function simpanTransaksip(){
      if($("#bayar").val() - $("#total").val() < 0){
       sweetAlert("Oops...", "ERROR!", "error");
      }
      else{
        var kembalian = $("#bayar").val() - $("#total").val()
        swal({
        title: "Kembalian Sebesar ",
        text: "Rp."+kembalian,
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "SAVE",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm) {
          swal("Success!", "Your transaction has been saved.", "success");
          setTimeout(function(){
            $("#transaksiproduk").submit();
          },500)
          window
        } else {
            swal("Cancelled", "Your transaction has been canceled.)", "error");
        }
      });
      }
    }
  </script>
<script type="text/javascript">
  $(function () {
      $("input[type='date']").datetimepicker();
  });
</script>
<script type="text/javascript">
  $('#katjas').change(function(e){  
    $.ajax({
      'type': 'POST',
      'url': '/ajax/dataproduk',
      'data': {
       'id': $('#katjas').val(), 
       '_token': '{{ csrf_token() }}'
      },
      'fail': function(data){
        console.log(data);
      },
      'success': function(data){
        $("#nampro").html('<option>Pilih Nama Produk Jasa</option> ');          
        $.each(data, function(index, item) { // Iterates through a collection
          console.log(item.nama_produk);
            $("#nampro").append( // Append an object to the inside of the select box
                $("<option></option>") // Yes you can do this.                    
                    .text(item.nama_produk)
                    .val(item.id + "-" + item.nama_produk)
            );
        });
        $("#nampro").css('display','block');
      }
    });
  });
</script>

<script type="text/javascript"> 
  $("#nampro").change(function(){
        $.ajax({
            'type': 'POST',
            'url': '/ajax/pilihproduk',
            'data': { id: $("#nampro").val(), _token : '{{ csrf_token() }}' },
            success: function (data) {
                console.log(data.harga);
                $("#kode_produk").val(data.kode_produk);                
                $("#harga").val(data.harga);                                
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
</script>
@endsection

  