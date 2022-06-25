@extends('layouts.master')
@push('styles')
    <style>
        .hidden-label {
            color: transparent;
        }

        .span-action {
            cursor: pointer;
        }

        .rowCustomer {
            border-radius: 10px;
        }
    </style>
@endpush
{{-- begin::content --}}
@section('content')
    <div class="card card-flush mb-5">
        <div class="card-body">
            <div class="row rowCustomer mb-5 bg-secondary" id="rowCustomer0">
                <div class="col-md-4">
                    <label for="" class="col-form-label">Customer</label>
                    <select name="orders[0][name]" id="name0" class="form-select form-control">
                        <option value="">- Pilih Customer -</option>
                        @foreach ($customer as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7">
                    <div class="row rowMenu" id="rowMenu0">
                        <div class="col-md-8 mb-4">
                            <label for="" class="col-form-label">Menu</label>
                            <select name="orders[0][menus][0][item]" id="product0" class="form-select form-control">
                                <option value="">- Pilih Menu -</option>
                                @foreach ($menu as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label for="" class="col-form-label">Jumlah</label>
                            <input type="orders[0][menus][0][qty]" class="form-control" id="qty0" value="0">
                        </div>
                        <div class="col-md-1 mb-4">
                            <label for="" class="col-form-label hidden-label">data</label>
                            <div class="d-flex align-items-center">
                                <span class="span-action" onclick="addMenu(0)"><i class="fas fa-plus"></i></span>
                            </div>
                        </div>
                    </div>
                    <div id="targetMenu0"></div>
                </div>
            </div>

            <div id="targetCustomer"></div>

            <div class="row">
                <div class="col">
                    <div class="text-start">
                        <button class="btn btn-light-success btn-sm" type="button" onclick="addCustomer()">
                            <i class="fas fa-plus me-3"></i>
                            Tambah Customer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-flush">
                <div class="card-body">
                    <h3>Detail Total</h3>

                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="p-0">Total Harga</td>
                                <td class="p-0">:</td>
                                <td class="p-0">Rp. 20.000</td>
                            </tr>
                            <tr>
                                <td class="p-0">Diskon</td>
                                <td class="p-0">:</td>
                                <td class="p-0">(Rp. 20.000)</td>
                            </tr>
                            <tr>
                                <td class="p-0">Total Tagihan</td>
                                <td class="p-0">:</td>
                                <td class="p-0">Rp. 0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-flush">
                <div class="card-body">
                    <h3>Detail Biaya Per Orang</h3>

                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="p-0">Orang A</td>
                                <td class="p-0">:</td>
                                <td class="p-0">Rp. 16.500</td>
                            </tr>
                            <tr>
                                <td class="p-0">Orang A</td>
                                <td class="p-0">:</td>
                                <td class="p-0">Rp. 16.500</td>
                            </tr>
                            <tr>
                                <td class="p-0">Orang A</td>
                                <td class="p-0">:</td>
                                <td class="p-0">Rp. 16.500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- end::content --}}

@push('scripts')
    <script>
        $('#name0').select2();
        $('#product0').select2();

        function addMenu(idsCustRow) {
            let rowCustomer = $('.rowCustomer');
            let rowCustomerLen = rowCustomer.length;
            let row = $('.rowMenu');
            let rowLen = row.length;
            let div = `<div class="row rowMenu" id="rowMenu${rowLen}">
                            <div class="col-md-8 mb-4">
                                <select name="orders[${rowCustomerLen}][menus][${rowLen}][item]" id="product${rowLen}" class="form-select form-control">
                                    <option value="">- Pilih Menu -</option>
                                    @foreach ($menu as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-4">
                                <input type="orders[${rowCustomerLen}][menus][${rowLen}][qty]" class="form-control" id="qty${rowLen}" value="0">
                            </div>
                            <div class="col-md-1 mb-4">
                                <div class="d-flex align-items-center">
                                    <span class="span-action" onclick="deleteMenu(${rowLen})"><i class="fas fa-times text-danger"></i></span>
                                </div>
                            </div>
                        </div>`;
            $('#targetMenu' + idsCustRow).append(div);
            $('#product' + rowLen).select2();
        }

        function deleteMenu(ids) {
            $('#rowMenu' + ids).remove();
        }

        function addCustomer() {
            let rowCustomer = $('.rowCustomer');
            let rowCustomerLen = rowCustomer.length;
            let row = $('.rowMenu');
            let rowLen = row.length;
            let div = `<div style="position:relative; z-index: 100;" id="rowCustomer${rowCustomerLen}">
                            <span style="position:absolute; top: -10px; right: -10px; z-index: 101; cursor: pointer;" onclick="deleteCustomer(${rowCustomerLen})"><i class="fas fa-times text-danger fa-2x"></i></span>
                            <div class="row rowCustomer mb-5 bg-secondary">
                                <div class="col-md-4">
                                    <label for="" class="col-form-label">Customer</label>
                                    <select name="orders[${rowCustomerLen}][name]" id="name${rowCustomerLen}" class="form-select form-control">
                                        <option value="">- Pilih Customer -</option>
                                        @foreach ($customer as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-7">
                                    <div class="row rowMenu" id="rowMenu0">
                                        <div class="col-md-8 mb-4">
                                            <label for="" class="col-form-label">Menu</label>
                                            <select name="orders[${rowCustomerLen}][menus][${rowLen}][item]" id="product${rowLen}" class="form-select form-control">
                                                <option value="">- Pilih Menu -</option>
                                                @foreach ($menu as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <label for="" class="col-form-label">Jumlah</label>
                                            <input type="orders[${rowCustomerLen}][menus][${rowLen}][qty]" class="form-control" id="qty${rowLen}" value="0">
                                        </div>
                                        <div class="col-md-1 mb-4">
                                            <label for="" class="col-form-label hidden-label">data</label>
                                            <div class="d-flex align-items-center">
                                                <span class="span-action" onclick="addMenu(${rowCustomerLen})"><i class="fas fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="targetMenu${rowCustomerLen}"></div>
                                </div>
                            </div>
                        </div>`;
            $('#targetCustomer').append(div);
            $('#name' + rowCustomerLen).select2();
            $('#product' + rowLen).select2();
        }

        function deleteCustomer(ids) {
            $('#rowCustomer'+ids).remove();
        }
    </script>
@endpush