@extends('layouts.main-app')
@section('title', 'Create sale Item')
@section('content')
    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :parent-route="['name' => 'saleItems', 'url' => route('saleItems.index')]" :current-route="['name' => 'Create', 'url' => null]" />
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h3>{{ __('labels.sale_item_title') }}</h3>
                    </div>
                    @include('alerts.alert')
                    <form action="{{ route('saleItems.store') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="sale_id" class="font-weight-medium">{{ __('labels.sale_item_sale_id') }}</label>
                                <select name="sale_id" id="sale_id" value="{{ old('sale_id') }}"
                                    class="form-control @error('sale_id') is-invalid @enderror" required>
                                    <option value="" selected disabled>Select Customer</option>
                                    @foreach ($data['sales'] as $sale)
                                        <option value="{{ $sale->id ?? '' }}">
                                            {{ $sale->customer->name ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('sale_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="product_id"
                                    class="font-weight-medium">{{ __('labels.sale_item_product_id') }}</label>
                                <select name="product_id" id="product_id" value="{{ old('product_id') }}"
                                    class="form-control @error('product_id') is-invalid @enderror" required>
                                    <option value="" selected disabled>Select Product</option>
                                    @foreach ($data['products'] as $product)
                                        <option value="{{ $product->id ?? '' }}">{{ $product->name ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="quantity"
                                    class="font-weight-medium">{{ __('labels.sale_item_quantity') }}</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    id="quantity" name="quantity" value="{{ old('quantity') }}"
                                    placeholder="{{ __('labels.sale_item_quantity_placeholder') }}" required>
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="price" class="font-weight-medium">{{ __('labels.sale_item_price') }}</label>
                                <input type="number" step="0.1" min="0"
                                    class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                    value="{{ old('price') }}"
                                    placeholder="{{ __('labels.sale_item_price_placeholder') }}" required>
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4  d-flex justify-content-between align-items-right">
                                <label for="is_active" class="font-weight-medium mb-0">{{ __('labels.status') }}</label>
                                <div class="switch-container">
                                    <label class="switch switch-text switch-primary switch-pill form-control-label">
                                        <input type="checkbox" name="is_active" id="is_active"
                                            class="switch-input form-check-input" value="1">
                                        <span class="switch-label" data-on="ON" data-off="OFF"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </div>
                                @error('is_active')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <button type="submit" title="{{ __('titles.add_sale_item') }}"
                            class="btn btn-primary">{{ __('buttons.create') }}</button>
                    </form>
                </div>
            </div>
        </div>






        {{-- <div id="product-list" class="col-lg-6 mt-lg-0 mt-4">
            <div class="accordion" id="productAccordion">
                <div class="card shadow">
                    <div class="card-header" id="productHeading">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed w-100 text-left" type="button" data-toggle="collapse"
                                data-target="#productCollapse" aria-expanded="false" aria-controls="productCollapse">
                                <strong>{{ __('labels.product_list') }}</strong>
                            </button>
                        </h2>
                    </div>
                    <div id="productCollapse" class="collapse show" aria-labelledby="productHeading"
                        data-parent="#productAccordion">
                        <div class="card-body p-0">
                            <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('labels.action') }}</th>
                <th>{{ __('labels.status') }}</th>
                <th>{{ __('labels.product_name') }}</th>
                <th>{{ __('labels.product_buy') }}</th>
                <th>{{ __('labels.product_sell') }}</th>
                <th>{{ __('labels.stock') }}</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px;  ">
                            <x-buttons.edit-button :objectData="$product" :url="route('products.edit', $product->id)" :title="'Product'"
                                :method="'GET'" />
                            <x-buttons.delete-button :objectData="$product" :url="route('products.destroy', $product->id)" :title="'Product'"
                                :method="'GET'" />
                        </div>
                    </td>
                    <td> <x-buttons.switch-button :url="route('products.update', $product->id)" :method="'PATCH'" :objectData="$product->is_active" /></button>
                    </td>
                    <td>{{ Str::limit($product->name, 15) ?? '' }}</td>
                    <td>{{ Str::limit($product->cost_price, 15) ?? '' }}</td>
                    <td>{{ Str::limit($product->selling_price, 15) ?? '' }}</td>
                    <td>{{ Str::limit($product->stock, 15) ?? '' }}</td>


                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h5 style="color:red">No Product Available</h5>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <script>
            function handleResponsiveLayout() {
                console.log(window.innerWidth <= 768 ? "Mobile view" : "Desktop view");
            }

            function debounce(func, timeout = 100) {
                let timer;
                return (...args) => {
                    clearTimeout(timer);
                    timer = setTimeout(() => {
                        func.apply(this, args);
                    }, timeout);
                };
            }
            document.addEventListener('DOMContentLoaded', function() {
                handleResponsiveLayout();
                window.addEventListener('resize', debounce(handleResponsiveLayout));
            });
        </script>
    </div>
@endsection
