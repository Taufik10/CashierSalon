@extends('master')

@section('content')

<h3 class="page-title">
                     Dashboard
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
                           Dashboard
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
<div class="row-fluid">
                <!--<B></B>EGIN METRO STATES-->
                <div class="metro-nav">
                    <div class="metro-nav-block nav-block-orange">
                        <a data-original-title="" href="/databarang">
                            <i class="icon-tasks"></i>
                            <div class="info">{{ $barang }}</div>
                            <div class="status">Data Total Barang</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-olive">
                        <a data-original-title="" href="/katbar">
                            <i class="icon-tags"></i>
                            <div class="info">{{ $katbarang }}</div>
                            <div class="status">Data Kategori Barang</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-yellow">
                        <a data-original-title="" href="/projasa">
                            <i class="icon-bookmark"></i>
                            <div class="info">{{ $jasa }}</div>
                            <div class="status">Data Produk Jasa</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-green double">
                        <a data-original-title="" href="/katjas">
                            <i class="icon-tag"></i>
                            <div class="info">{{ $katjasa }}</div>
                            <div class="status">Data Kategori Jasa</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="/datpeg">
                            <i class="icon-user"></i>
                            <div class="info">{{ $pegawai }}</div>
                            <div class="status">Data Pegawai</div>
                        </a>
                    </div>
                </div>
                <div class="metro-nav">
                    <div class="metro-nav-block nav-light-purple">
                        <a data-original-title="" href="/ritbar">
                            <i class="icon-shopping-cart"></i>
                            <div class="info">{{ $tbarang }}</div>
                            <div class="status">Data Transaksi Barang</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-light-blue double">
                        <a data-original-title="" href="/ritjas">
                            <i class="icon-briefcase"></i>
                            <div class="info">{{ $tproduk }}</div>
                            <div class="status">Data Transaksi Jasa</div>
                        </a>
                    </div>                    
                </div>
                <div class="space10"></div>
                <!--END METRO STATES-->
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <!-- BEGIN CHART PORTLET-->
                    <div class="widget ">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Doughnut</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
                                <canvas style="width: 400px; height: 300px;" id="doughnut" height="300" width="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- END CHART PORTLET-->
                </div>               

            <div class="row-fluid">
                <div class="span7">                   
                                        
                    
                
                
                </div>
            </div>
@endsection

@section('script')

<script type="text/javascript">
var Script = function () {

        var doughnutData = [
            
            @foreach($chart as $value)
            {
                value: {{ $value->jumlah_barang }},
                color:"#F7464A",
                // nama: 'tes'
            },
            @endforeach

        ];

    var lineChartData = {
        labels : ["","","","","","",""],
        datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                data : [65,59,90,81,56,55,40]
            },
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                pointColor : "rgba(151,187,205,1)",
                pointStrokeColor : "#fff",
                data : [28,48,40,19,96,27,100]
            }
        ]

    };

    new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
    new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);

}();
</script>

@endsection