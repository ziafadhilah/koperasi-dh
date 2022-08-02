@extends('layouts/main')
@section('title', 'Daftar Kategori')
@section('container')
<div id="app">
    <div class="container mt-5">
        <div class="card col-lg-12">
            <div class="card-header bg-primary text-white text-center">
                <h3>Form Penjualan</h3>
            </div>
            <form @submit.prevent="submitForm" action="/central-sale">
                @csrf
                <div class="card-body mt-4">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-lg-4">
                            <select class="form-select form-select-md" aria-label=".form-select-md example" v-model="categoryId" required>
                                <option selected class="text-center" value="0">-- Pilih Kategori --</option>
                                <option v-for="categories in category" :value="categories.id">
                                    @{{categories.name}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" v-if="categoryId == 1 || categoryId == 2 || categoryId == 3 ">
                        <label class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-lg-4">
                            <select class="form-select form-select-md" aria-label=".form-select-md example" v-model="productId" required>
                                <option selected class="text-center" value="0">-- Pilih Produk --</option>
                                <option v-for="products in product" v-if="products.product_category_id == categoryId" :value="products.id">@{{products.name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Harga Jual</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" v-model="pay_amount" placeholder="Harga Jual" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Terjual</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" v-model="qty" placeholder="Total Terjual" autocomplete="off">
                        </div>
                        <label class="col-sm-2 col-form-label">Stock Gudang : {{$gp->stock ?? '-'}}</label>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-outline-success">Save</button>
                            <a href="{{url('/central-sale')}}" class="btn btn-outline-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-footer bg-primary">
                &nbsp;
            </div>
        </div>
    </div>
</div>
@endsection
@section('pagescript')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            category: JSON.parse(`{!! $getProductCategories !!}`),
            product: JSON.parse(`{!! $getProduct !!}`),
            categoryId: '0',
            productId: '0',
            pay_amount: '',
            qty: '',
        },
        methods: {
            submitForm: function() {
                this.sendData();
            },
            sendData: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.post('/central-sale/', {
                        product_category_id: vm.categoryId,
                        product_id: vm.productId,
                        pay_amount: vm.pay_amount,
                        qty: vm.qty,
                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Penjualan berhasil ditambahkan.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/central-sale';
                            }
                        })
                        // console.log(response);
                    })
                    .catch(function(error) {
                        vm.loading = false;
                        console.log(error);
                        Swal.fire(
                            'Terjadi Kesalahan!',
                            'Pastikan data terisi dengan benar.',
                            'error'
                        )
                    });
            },
        }
    })
</script>

@endsection