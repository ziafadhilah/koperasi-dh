@extends('layouts/main')
@section('title', 'Daftar Produk')
@section('container')
<div class="container" id="app">
    <form @submit.prevent="submitForm">
        <input class="form-control" type="text" aria-label="Disabled input example" v-model="productId" disabled>
        <input class="form-control" type="hidden" aria-label="Disabled input example" v-model="centralSaleId" disabled>
        <div class="card mt-5">
            <div class="card-body">
                <div class="row">
                    <label class="col-sm-2 col-form-label">Retur</label>
                    <div class="col-lg-4">
                        <input class="form-control" type="text" aria-label="Disabled input example" v-model="qty">
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        <a href="{{url('/central-sale')}}" class="btn btn-outline-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
            centralSaleId: '{{ $returSale->id }}',
            categoryId: '{{$returSale->product_category_id}}',
            productId: '{{$returSale->product_id}}',
            pay_amount: '{$returSale->pay_amount}}',
            qty: '{{$returSale->qty}}',
            status: '{{$returSale->status}}'
        },
        methods: {
            submitForm: function() {
                this.sendData();
            },
            sendData: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.post('/central-sale/{{$returSale->id}}', {
                        central_sale_id: vm.centralSaleId,
                        product_id: vm.productId,
                        qty: vm.qty,
                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Retur berhasil ditambahkan.',
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
    });
</script>

@endsection