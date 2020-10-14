@extends('panel.main')

@section('content')
<div class="mt-1 mb-3 button-container">
<div class="row pl-0" id="app">

                <div class="col-lg-4">
                    <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                        <label class="control-label mb-1">Scan Barcode</label>
                        <select data-placeholder="Pilih Produk" v-model="item.id" id="nama" name="nama " class="form-control" v-on:change="pilihProduk()" autofocus required>
                        <option value="">-pilih-</option>
                        @foreach($produk as $item)
                            <option value="{{$item->kd_produk}}" data-nama="{{$item->nama}}"  data-harga="{{$item->harga}}">{{$item->kd_produk}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group form-group-sm">
                        <label>Nama Produk</label>
                        <input v-model="item.name" class="form-control" value="" readonly placeholder="" name="kode" id="kode">
                    </div>
                    <!-- <div class="form-group form-group-sm">
                        <label>Name</label>
                        <input v-model="item.name" class="form-control" placeholder="Name">
                    </div> -->
                    <div class="form-group form-group-sm">
                        <label>Harga</label>
                        <input v-model="item.price" class="form-control" placeholder="Price" id="harga" readonly name="harga">
                    </div>
                    <div class="form-group form-group-sm">
                        <label>Qty</label>
                        <input v-model="item.qty" class="form-control" placeholder="Quantity">
                    </div>
                    <button v-on:click="addItem()" class="btn btn-primary btn-lg btn-block shadow" autofocus>Tambah</button>
                    </div>
                    </div>
                </div>
            <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                <form action="{{url ('addtran')}}" method="post">
                    {{csrf_field()}}
                <div class="form-group form-group-sm">
                    <label>No. Invoice</label>
                    <input id="kd_pembelian" name="kd_pembelian" class="form-control" readonly value="{{$invoice}}">
                </div>
                <div class="form-group form-group-sm">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>
                <div class="form-group form-group-sm">
                        <label>TOTAL</label>

                        <select name="nilai_transaksi" id="nilai_transaksi" readonly  class="form-control" id="total" name="total">
                        <option v-bind:value="details.sub_total">@{{ details.sub_total }}</option>
                        </select>
                </div>
                <table class="table table-striped table-bordered" id="table01">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <div class="row">
                    <div class="col-2"><button type="button" class="btn btn-danger shadow" v-on:click="removeall()">Reset Item</button></div>
                    <div class="col-8"><button type="submit" class="btn btn-secondary shadow" v-on:click="removeall()" id="batal" v-on:click="hapussemua()" name="batal" value="batal">Batal</button></div>
                    <div class="col-2"><button type="submit" class="btn btn-primary shadow"  v-on:click="removeall()" id="lanjut" name="lanjut" value ="lanjut">Lanjut</button></div>
                    </div>
                    <hr>
                    <tbody id="mangan">
                    <tr v-for="item in items">
                        <td name="idd" id="idd" v-bind:value="item.id">@{{ item.id }} <input hidden type="text" name="kd_produk[]" v-model="item.id"></td>
                        <td>@{{ item.name }}</td>
                        <td name="jumlah" id="jumlah" v-bind:value="item.quantity">@{{ item.quantity }}<input hidden type="text" name="jumlah[]" v-model="item.quantity"></td>
                        <td>@{{ item.price }}</td>
                        <td align="center">
                            <button type="button" v-on:click="removeItem(item.id)" class="btn btn-sm btn-danger shadow"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </form>
            </div>
            </div>
            </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/vue"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/1.3.1/vue-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<script>

$(document).ready(function() {
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    $("#tanggal").attr("value", today);
});


        // chosen
        jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });

    function changeEventHandler(v) {
    var nama = document.getElementById("total").value ;
    var y = $(v).find('option:selected').attr('nama');
    //Set

    $('#harga').val(x);
    $('#nama').val(y);
}


    (function($) {


        var _token = '<?php echo csrf_token() ?>';

        $(document).ready(function() {


            var app = new Vue({

                el: '#app',
                data: {
                    message: 'Hello Vue!',
                    details: {
                        sub_total: 0,
                        total: 0,
                        total_quantity: 0
                    },
                    itemCount: 0,
                    items: [],
                    item: {
                        id: '',
                        name: '',
                        price: 0.00,
                        qty: 1
                    },
                    cartCondition: {
                        name: '',
                        type: '',
                        target: '',
                        value: '',
                        attributes: {
                            description: 'Value Added Tax'
                        }
                    },

                    options: {
                        target: [
                            {label: 'Apply to SubTotal', key: 'subtotal'},
                            {label: 'Apply to Total', key: 'total'}
                        ]
                    }
                },
                mounted:function(){
                    this.loadItems();
                },
                methods: {
                    pilihProduk: function(){
                        var button =$('#nama').find('option:selected');
                        var harga = button.data('harga')
                        var nama = button.data('nama')
                        this.item.name = nama ;
                        this.item.price = harga;

                    },
                    removeall: function() {
                    var data = [];
                    var ta = document.getElementById("mangan");
                    var tes= ta.rows.length;
                    for (let i = 0; i<tes; i++){
                     var x = ta.rows[i].cells.item(0).innerHTML;
                     var res = x.split(" ");
                        data.push(res[0]);
                    }
                    // $id = "pd00" + tes;

                    // alert(data);
                     $id = data ;
                     var _this = this;

                        this.$http.delete('/cart1/'+$id,{
                            params: {
                                _token:_token
                            }
                        }).then(function(success) {
                            _this.loadItems();
                        }, function(error) {
                            console.log(error);
                        });
                        },
                    addItem: function() {

                        var _this = this;

                        this.$http.post('/cart',{
                            _token:_token,
                            id:_this.item.id,
                            name:_this.item.name,
                            price:_this.item.price,
                            qty:_this.item.qty
                        }).then(function(success) {
                            _this.loadItems();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    addCartCondition: function() {

                        var _this = this;

                        this.$http.post('/cart/conditions',{
                            _token:_token,
                            name:_this.cartCondition.name,
                            type:_this.cartCondition.type,
                            target:_this.cartCondition.target,
                            value:_this.cartCondition.value,
                        }).then(function(success) {
                            _this.loadItems();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    clearCartCondition: function() {

                        var _this = this;

                        this.$http.delete('/hapussemua?_token=' + _token).then(function(success) {
                            _this.loadItems();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    removeItem: function(id) {

                        var _this = this;

                        this.$http.delete('/cart/'+id,{
                            params: {
                                _token:_token
                            }
                        }).then(function(success) {
                            _this.loadItems();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    hapussemua: function() {



                    var _this = this;

                    this.$http.delete('/hapussemua?_token=' + _token).then(function(success) {
                        _this.loadItems();
                    }, function(error) {
                        console.log(error);
                    });
                    },
                    loadItems: function() {

                        var _this = this;

                        this.$http.get('/cart',{
                            params: {
                                limit:10
                            }
                        }).then(function(success) {
                            _this.items = success.body.data;
                            _this.itemCount = success.body.data.length;
                            _this.loadCartDetails();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    loadCartDetails: function() {

                        var _this = this;

                        this.$http.get('/cart/details').then(function(success) {
                            _this.details = success.body.data;
                        }, function(error) {
                            console.log(error);
                        });
                    }
                }
            });

        });

    })(jQuery);
</script>
@endsection
