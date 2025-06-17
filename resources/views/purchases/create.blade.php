@extends('layouts.main-app')
@section('title', 'Create Supplier')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :parent-route="['name' => 'Suppliers', 'url' => route('suppliers.index')]" :current-route="['name' => 'Create', 'url' => null]" />
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    @include('alerts.alert')
                    <div class="text-center">
                        <h3>{{ __('labels.supplier_title') }}</h3>
                    </div>
                    <form action="{{ route('suppliers.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="name" class="font-weight-medium">{{ __('labels.supplier_name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="{{ __('labels.supplier_name_placeholder') }}"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="email" class="font-weight-medium">{{ __('labels.supplier_email') }}</label>
                                <input type="email" class="form-control @error('stock') is-invalid @enderror"
                                    id="email" name="email"
                                    placeholder="{{ __('labels.supplier_email_placeholder') }}" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="phone" class="font-weight-medium">{{ __('labels.supplier_phone') }}</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone"
                                    placeholder="{{ __('labels.supplier_phone_placeholder') }}"
                                    value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="address"
                                    class="font-weight-medium">{{ __('labels.supplier_address') }}</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address"
                                    placeholder="{{ __('labels.supplier_address_placeholder') }}"
                                    value="{{ old('address') }}" required>
                                @error('address')
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
                        <button type="submit" title="{{ __('titles.add_supplier') }}"
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
