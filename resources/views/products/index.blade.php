
@extends('layouts.main-app')
@section('title', 'Product List')
@section('content')
    @include('alerts.alert')
    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'Products', 'url' => null]" />
    <a href="{{ route('products.create') }}" title="{{ __('titles.add_product') }}"
        class="btn btn-secondary">{{ __('buttons.add_new_product') }}</a>
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
            @forelse ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ Str::limit($product->name, 15) ?? '' }}</td>
                    <td>
                        <x-buttons.switch-button :url="route('products.update', $product->id)" :method="'PATCH'" :objectData="$product->is_active" />
                    </td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px; margin-bottom: 0.5rem;">
                            <x-buttons.action-button :objectData="$product" :url="route('products.destroy', $product->id)" :title="'Product'" />
                        </div>
                    </td>
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
