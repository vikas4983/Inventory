@extends('layouts.main-app')
@section('title', 'Brand List')
@section('content')
    @include('alerts.alert')
    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'Brands', 'url' => null]" />
    <a href="{{ route('brands.create') }}" title="{{ __('titles.add_brand') }}"
        class="btn btn-secondary">{{ __('buttons.add_new_brand') }}</a>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('labels.brand_name') }}</th>
                <th>{{ __('labels.status') }}</th>
                <th>{{ __('labels.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($brands as $index => $brand)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ Str::limit($brand->name, 15) }}</td>
                    <td>
                        <x-buttons.switch-button :url="route('brands.update', $brand->id)" :method="'PATCH'" :objectData="$brand->is_active" />
                    </td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px; margin-bottom: 0.5rem;">
                            <x-buttons.action-button :objectData="$brand" :url="route('brands.destroy', $brand->id)" :title="'Brand'" />
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h5 style="color:red">No Brands Available</h5>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
