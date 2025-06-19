@extends('layouts.main-app')
@section('title', 'Create Purchase')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :parent-route="['name' => 'purchases', 'url' => route('purchases.index')]" :current-route="['name' => 'Create', 'url' => null]" />
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                   <div class="text-center">
                        <h3>{{ __('labels.purchase_title') }}</h3>
                    </div>
                      @include('alerts.alert')
                    <form action="{{ route('purchases.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="supplier_id" class="font-weight-medium">{{ __('labels.purchase_name') }}</label>
                                <select name="supplier_id" id="supplier_id" value="{{ old('supplier_id') }}"
                                    class="form-control @error('supplier_id') is-invalid @enderror" required>
                                    <option value="" selected disabled>Select Supplier</option>
                                    @foreach ($data['suppliers'] as $supplier)
                                        <option value="{{ $supplier->id ?? '' }}">{{ $supplier->name ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="status_id" class="font-weight-medium">{{ __('labels.status') }}</label>
                                <select name="status_id" id="status_id" value="{{ old('status_id') }}"
                                    class="form-control @error('status_id') is-invalid @enderror" required>
                                    <option selected disabled value="">Select Status</option>
                                    @foreach ($data['statuses'] as $status)
                                        <option value="{{ $status->id ?? '' }}">{{ $status->name ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error('status_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="purchase_date" class="font-weight-medium">{{ __('labels.purchase_date') }}</label>
                                <input type="date" class="form-control @error('purchase_date') is-invalid @enderror"
                                    id="purchase_date" name="purchase_date" value="{{ old('date') }}" required>
                                @error('purchase_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="total" class="font-weight-medium">{{ __('labels.purchase_total') }}</label>
                                <input type="number" step="0.1" class="form-control @error('total') is-invalid @enderror"
                                    id="total" name="total" value="{{ old('total') }}" placeholder="{{__('labels.purchase_total_placeholder')}}" required>
                                @error('total')
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
                        <button type="submit" title="{{ __('titles.add_purchase') }}"
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
