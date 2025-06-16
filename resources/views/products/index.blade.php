@extends('layouts.main-app')
@section('title', 'Product List')
@section('content')
    @include('alerts.alert')
    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'Products', 'url' => null]" />
    <a href="{{ route('products.create') }}" title="{{ __('titles.add_product') }}"
        class="btn btn-secondary">{{ __('buttons.add_new_product') }}</a>
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
                                :method="'GET'" :modalSize="__('labels.product_edit_modal')" />
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
@endsection
