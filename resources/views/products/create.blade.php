@extends('layouts.main-app')
@section('title', 'Create Product')
@section('content')
    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :parent-route="['name' => 'Products', 'url' => route('products.index')]" :current-route="['name' => 'Create', 'url' => null]" />

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    @include('alerts.alert')
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="name" class="font-weight-medium">{{ __('labels.product_name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="stock" class="font-weight-medium">{{ __('labels.stock') }}</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                    id="stock" name="stock" placeholder="Enter Number" value="{{ old('stock') }}"
                                    required>
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="category_id">{{ __('labels.product_category') }}</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach ($data['categories'] as $category)
                                        <option value="{{$category->id}}">{{$category->name ?? ''}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                     
                            <div class="form-group col-lg-6">
                                <label for="brand_id">{{ __('labels.product_brand') }}</label>
                                <select class="form-control" name="brand_id" id="brand_id">
                                    <option value="1">1Example select</option>
                                    <option value="1">2Example select</option>
                                    <option value="1">3Example select</option>
                                    <option value="1">4Example select</option>
                                    <option value="1">5Example select</option>
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                                    
                            <div class="form-group col-lg-6">
                                <label for="cost_price" class="font-weight-medium">{{ __('labels.product_buy') }}</label>
                                <input type="number" step="0.01" class="form-control @error('cost_price') is-invalid @enderror"
                                    id="cost_price" name="cost_price" placeholder="Enter Number"
                                    value="{{ old('cost_price') }}" required>
                                @error('cost_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="selling_price"
                                    class="font-weight-medium">{{ __('labels.product_sell') }}</label>
                                <input type="number" step="0.01" class="form-control @error('selling_price') is-invalid @enderror"
                                    id="selling_price" name="selling_price" placeholder="Enter Number"
                                    value="{{ old('selling_price') }}" required>
                                @error('selling_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="description"
                                    class="font-weight-medium">{{ __('labels.product_description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" style="width: 100%; height: 90px;"
                                    name="description" placeholder="Enter Description" value="{{ old('description') }}" required> </textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <div class="form-group mt-5">
                                    <div class="d-flex align-items-center">
                                        <label class="font-weight-medium mb-0 mr-3">Status</label>

                                        <div class="form-check form-check-inline mr-3">
                                            <input class="form-check-input" type="radio" name="is_active"
                                                id="statusActive" value="1" checked>
                                            <label class="form-check-label" for="statusActive">Active</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_active"
                                                id="statusInactive" value="0">
                                            <label class="form-check-label" for="statusInactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                @error('is_active')
                                    <div class="invalid-feedback">
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
        <div id="product-list" class="col-lg-6 mt-lg-0 mt-4">
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
                                        <th>{{ __('labels.product_name') }}</th>
                                        <th>{{ __('labels.status') }}</th>
                                        <th>{{ __('labels.action') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($products) > 0)
                                        @foreach ($products as $index => $product)
                                            <tr>
                                                <td>{{ $index + 1 ?? '' }}</td>
                                                <td>{{ Str::limit($product->name, 15) ?? '' }}</td>
                                                <td> <x-buttons.switch-button :url="route('products.update', $product->id)" :method="'PATCH'"
                                                        :objectData="$product->is_active" /></td>
                                                <td>
                                                    <div style="display: flex; flex-wrap: nowrap; gap: 6px; mb-2">
                                                        <x-buttons.action-button :objectData="$product" :url="route('products.update', $product->id)"
                                                            :title="'Product'" />
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <h5 style="color:red">No Product Available</h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
