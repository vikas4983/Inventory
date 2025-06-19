@extends('layouts.main-app')
@section('title', 'Create Product')
@section('content')
    <style>
        #productsTable.table-hover tbody tr:hover {
            background-color: #F2F2F2 !important;
        }

        #productsTable.table-hover tbody tr:hover td {
            color: #000000 !important;
            font-weight: 600 !important;
            text-decoration: none !important;
        }
    </style>
    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :parent-route="['name' => 'Products', 'url' => route('products.index')]" :current-route="['name' => 'Create', 'url' => null]" />

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    @include('alerts.alert')
                    <div class="text-center">
                        <h3>{{ __('labels.product_title') }}</h3>
                    </div>
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="name" class="font-weight-medium">{{ __('labels.product_name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="{{ __('labels.product_name_placeholder') }}"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="stock" class="font-weight-medium">{{ __('labels.stock') }}</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                    id="stock" name="stock" placeholder="{{ __('labels.product_stock_placeholder') }}"
                                    value="{{ old('stock') }}" required>
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="cost_price" class="font-weight-medium">{{ __('labels.product_buy') }}</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('cost_price') is-invalid @enderror" id="cost_price"
                                    name="cost_price" placeholder="{{ __('labels.product_buy_placeholder') }}"
                                    value="{{ old('cost_price') }}" required>
                                @error('cost_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="brand_id">{{ __('labels.product_brand') }}</label>
                                <select class="form-control" name="brand_id" id="brand_id" required>
                                    <option value="">Select Brand</option>
                                    @foreach ($data['brands'] as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach

                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="category_id">{{ __('labels.product_category') }}</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($data['categories'] as $category)
                                        <option value="{{ $category->id }}">{{ $category->name ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="selling_price"
                                    class="font-weight-medium">{{ __('labels.product_sell') }}</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('selling_price') is-invalid @enderror" id="selling_price"
                                    name="selling_price" placeholder="{{ __('labels.product_sell_placeholder') }}"
                                    value="{{ old('selling_price') }}" required>
                                @error('selling_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-8">
                                <label for="description"
                                    class="font-weight-medium">{{ __('labels.product_description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                    style="width: 100%; height: 90px;" name="description" placeholder="Enter Product Descriptions"
                                    value="{{ old('description') }}" required> </textarea>
                                @error('description')
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
                                            class="switch-input form-check-input" value="1"
                                            {{ old('is_active', $objectData->is_active ?? 0) == 1 ? 'checked' : '' }}>
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
                        <button type="submit" title="{{ __('titles.add_product') }}"
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
