@extends('panel.main')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Transaksi</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Data Produk</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="animated fadeIn">
    <div class="row" id="app">
    <h1>Vue: @{{message}}</h1>
      <input v-model="message">
        <br>
            <div class="container cart">
                <div class="col-lg-4">
                    <div class="card">
                    <div class="card-body">
                    <div class="form-group form-group-sm">
                        <label>nama</label>
                        <input v-model="item.name" class="form-control" value="" placeholder="" name="kode" id="kode">
                    </div>
                    <!-- <div class="form-group form-group-sm">
                        <label>Name</label>
                        <input v-model="item.name" class="form-control" placeholder="Name">
                    </div> -->
                    <div class="form-group">
                        <label class="control-label mb-1">kode 
                            Produk</label>
                        <select data-placeholder="Pilih Produk" v-model="item.id" id="nama" name="nama " class="form-control" v-on:change="pilihProduk()">
                        <option value="">-pilih-</option>
                        @foreach($produk as $item)
                            <option value="{{$item->kd_produk}}" data-nama="{{$item->nama}}"  data-harga="{{$item->harga}}">{{$item->kd_produk}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group form-group-sm">
                        <label>Harga</label>
                        <input v-model="item.price" class="form-control" placeholder="Price" id="harga" name="harga">
                    </div>
                    <div class="form-group form-group-sm">
                        <label>Qty</label>
                        <input v-model="item.qty" class="form-control" placeholder="Quantity">
                    </div>
                    <button v-on:click="addItem()" class="btn btn-primary btn-lg btn-block">Tambah</button>
                    </div>
                    </div>
                </div>
            <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                <form action="/addtran" method="post">
                    {{csrf_field()}}
                <div class="form-group form-group-sm">
                    <label>No. Invoice</label>
                    <input id="kd_pembelian" name="kd_pembelian" class="form-control" readonly value="{{$invoice}}" placeholder="Quantity">
                </div>
                <div class="form-group form-group-sm">
                    <label>Tanggal</label>
                    <input id="tanggal" name="tanggal" class="form-control" type="date">
                </div>
                <div class="form-group form-group-sm">
                        <label>TOTAL</label>
                        <select name="nilai_transaksi" id="nilai_transaksi" readonly  class="form-control" id="total" name="total">
                        <option v-bind:value="details.sub_total">@{{ details.sub_total }}</option>
                        </select>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <div class="form-group form-group-sm">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Lanjut</button>
                    </div>

                    <tbody>
                    <tr v-for="item in items">
                        <td>@{{ item.id }}</td>
                        <td>@{{ item.name }}</td>
                        <td>@{{ item.quantity }}</td>
                        <td>@{{ item.price }}</td>
                        <td>
                            <button v-on:click="removeItem(item.id)" class="btn btn-sm btn-danger">remove</button>
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
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/vue"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/1.3.1/vue-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<script>

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
                        alert(harga);

                        this.item.name = nama ;
                        this.item.price = harga;
                    
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

                        this.$http.delete('/cart/conditions?_token=' + _token).then(function(success) {
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
