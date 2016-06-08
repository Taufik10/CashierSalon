

@extends('master')
@section('content')
<h3 class="page-title">
   Transaksi Pembelian Barang
</h3>
<hr>
<h3>Data Transaksi</h3>
<hr style="width:120px;">
<form action="/transbarang" class="form-horizontal" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
   <div class="control-group">
    @if($transaksib[0]['kode_penjualan'] !== null)
      <label class="control-label">No Penjualan</label>
      <div class="input-control text full-size">
         <button style="margin-left:20px;border:none;background:#e74c3c;height:25px;width:100px;color:white">
         <?php $randomkode = $transaksib[0]['kode_penjualan']; ?>
         {{ $randomkode }}
         </button>
      </div>
    @else
      <label class="control-label">No Penjualan</label>
      <div class="input-control text full-size">
         <button style="margin-left:20px;border:none;background:#e74c3c;height:25px;width:100px;color:white">
         <?php
            $a = rand(0,999);
            $b = rand(0,9);
            if ($a<100) {
              $kode_produk = "AST-".$b.substr($a,0,5);
              $randomkode = "AST-".$b.substr($a,0,5);
            }
            elseif ($a<100) {
              $kode_produk = "AST-".$b.$b.substr($a,0,4);
              $randomkode = "AST-".$b.$b.substr($a,0,4);
            }
            elseif ($a<10) {
              $kode_produk = "AST-".$b.$b.$b.substr($a,0,3);
              $randomkode = "AST-".$b.$b.$b.substr($a,0,3);
            }
            elseif ($a<10) {
              $kode_produk = "AST-".$b.$b.$b.$b.substr($a,0,2);
              $randomkode = "AST-".$b.$b.$b.$b.substr($a,0,2);
            }              
            else {
              $kode_produk = "AST".$a;
              $randomkode = "AST-".$a;
            }
            ?>
         {{ $randomkode}}
         </button>
      </div>
    @endif
   </div>
   <tr>
        <td><input type="hidden" name="kode_penjualan" value="{{ $randomkode }}"></td>
      </tr>

   <div class="control-group">
      <label class="control-label">Pelanggan</label>
      <div class="controls">
         <input type="text" class="span4" name="pelanggan" value="{{ old('pelanggan') }}" />                                   
      </div>
   </div>
   <div class="control-group">
      <label class="control-label">Keterangan</label>
      <div class="controls">
         <input type="text" class="span4" name="keterangan" value="{{ old('keterangan') }}" />                                          
      </div>
   </div>
   <hr>
   <h3>Input Barang</h3>
   <hr style="width:120px;">
   <div class="control-group">
      <label class="control-label">Kategori</label>
      <div class="controls">
         <select style="height:35px;" name="kategori_barang" id="katbar">
            <option>Pilih Kategori</option>
            @foreach($kategoris as $key => $kategori)
            <option value="{{ $kategori->id }}">{{ $kategori->kategori_barang }}</option>
            @endforeach
         </select>
      </div>
   </div>
   <div class="control-group">
      <label class="control-label">Nama Barang</label>
      <div class="controls">
         <select style="width:30%;height:35px;" name="nama_barang" id="nambar">
            <option>Pilih Nama Barang</option>                                
         </select>
      </div>
   </div>
   <div class="control-group">
      <label style="width:151px;" class="control-label" >Harga Jual(Rp)</label>
      <div class="span2">
         <input id="hargajual" type="text" name="hargajual" class="span10" readonly />                                   
      </div>
   </div>
   <div class="control-group">
      <label style="width:151px;" class="control-label" >Stok</label>
      <div class="span2">
         <input id="stok" type="hidden" name="stok" class="span10" readonly />                                   
         <input readonly id="stoksisa" class="form-control" type="number" name="stoksisa" id="stok" autocomplete="off" required>
      </div>
   </div>
   <input type="hidden" name="kode_barang" id="kode_barang" readonly />   
   <div class="control-group">
      <label class="control-label">Jumlah </label>
      <div class="controls">
         <input style="width:50px;" id="jumlahKeluar" type="text" name="jumlah" />
         <button style="border:none;background:#7f8c8d;height:25px;width:100px;color:white" type="submit"><i class="icon-ok-sign">Tambah</i></button></form>                                   
      </div>
   </div>
   <hr>
   <hr>
   <h3 class="page-title">
      Daftar Barang
   </h3>
   <table class="table">
   <?php $i =1 ?>
      <?php $grandTotal1 = 0 ?>
      <?php $grandTotal2 = 0 ?>
      @if(count($transaksib) > 0)
      <thead>
         <th>No</th>
         <th>Kode</th>
         <th>Nama Barang</th>
         <th>Harga(Rp)</th>
         <th>Jumlah</th>
         <th>SubTotal(Rp)</th>
      </thead>
      <tbody>
      
      @foreach($transaksib as $key => $tbarang)    
         <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $tbarang['kode_barang'] }}</td>
            <td>{{ preg_replace('/\d+-/','',  $tbarang['nama_barang'] )}}</td>
            <td>{{ $tbarang['hargajual'] }}</td>
            <td>{{ $tbarang['jumlah'] }}</td>
            <?php $subtotal = $tbarang['jumlah'] * $tbarang['hargajual'] ?>
            <td>{{ $subtotal }}</td>
            <?php $grandTotal1 += $tbarang['jumlah'] ?>
            <?php $grandTotal2 += $subtotal ?>
            
         </tr>
         @endforeach
      </tbody>
      <form action="transaksibarang" method="POST" id="transaksibarang">
      <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <thead>
           <th></th>
           <th></th>
           <th></th>
           <th>Grand Total Belanja(Rp)</th>
           <th>{{ $grandTotal1 }}</th>
           <th>{{ $grandTotal2 }}</th>
           <th><input id="total" style="width:100px;" type="hidden" name="total" value="{{ $grandTotal2 }}" /></th>
           <th></th>
        </thead>
        <thead>
           <th></th>
           <th></th>
           <th></th>
           <th>Uang Bayar(Rp)</th>
           <th></th>
           <th><input id="bayar" style="width:100px;" type="text" name="bayar" /></th>
           <th></th>        
        </thead>    
        <thead>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th>
              <button onclick="simpanTransaksi()" class="btn btn-inverse"style="border:none" type="button">Simpan Transaksi</button></form>           
              <a href="/kosongTransaksi"><button class="btn btn-danger" onclick="">Hapus</button></a>                          
           </th>
           <th></th>        
        </thead>          
    @endif
   </table>

@endsection

@section('script')
<script type="text/javascript">
    function simpanTransaksi(){
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
            $("#transaksibarang").submit();
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
  $('#katbar').change(function(e){  
    $.ajax({
      'type': 'POST',
      'url': '/ajax/databarang',
      'data': {
       'id': $('#katbar').val(), 
       '_token': '{{ csrf_token() }}'
      },
      'fail': function(data){
        console.log(data);
      },
      'success': function(data){
        $("#nambar").html('<option>Pilih Nama Barang</option> ');          
        $.each(data, function(index, item) { // Iterates through a collection
          console.log(item.nama_barang);
            $("#nambar").append( // Append an object to the inside of the select box
                $("<option></option>") // Yes you can do this.                    
                    .text(item.nama_barang)
                    .val(item.id + "-" + item.nama_barang)
            );
        });
        $("#nambar").css('display','block');
      }
    });
  });
</script>

<script type="text/javascript">
  $("#jumlahKeluar").keyup(function(){
        $("#stoksisa").val($("#stok").val() - $("#jumlahKeluar").val());
    });
  $("#nambar").change(function(){
        $.ajax({
            'type': 'POST',
            'url': '/ajax/pilihbarang',
            'data': { id: $("#nambar").val(), _token : '{{ csrf_token() }}' },
            success: function (data) {
                console.log(data.harga_jual);
                $("#kode_barang").val(data.kode_barang);                
                $("#hargajual").val(data.harga_jual);                
                $("#stok").val(data.stok);
                $("#stoksisa").val(data.stok);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
</script>
@endsection

