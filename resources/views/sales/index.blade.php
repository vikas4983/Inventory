@extends('layouts.main-app')
@section('title', 'Sales List')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'sales', 'url' => null]" />
    <a href="{{ route('sales.create') }}" title="{{ __('titles.add_sale') }}"
        class="btn btn-secondary">{{ __('buttons.add_new_sale') }}</a>
    <span>@include('alerts.alert')</span>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('labels.action') }}</th>
                <th>{{ __('labels.status') }}</th>
                <th>{{ __('labels.sale_customer_id') }}</th>
                <th>{{ __('labels.sale_date') }}</th>
                <th>{{ __('labels.sale_total') }}</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($sales as $index => $sale)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px;  ">
                            <x-buttons.edit-button :objectData="$sale" :url="route('sales.edit', $sale->id)" :title="'Sale'" :method="'GET'"
                                :modalSize="__('labels.product_edit_modal')" />
                            <x-buttons.delete-button :objectData="$sale" :url="route('sales.destroy', $sale->id)" :title="'Sale'"
                                :method="'GET'" />
                        </div>
                    </td>
                    <td> <x-buttons.switch-button :url="route('sales.update', $sale->id)" :method="'PATCH'" :objectData="$sale->is_active" /></button>
                    </td>
                    <td>{{ Str::limit($sale->customer->name, 20) ?? '' }}</td>
                    <td>{{ Str::limit($sale->sale_date, 10) ?? '' }}</td>
                    <td>{{ Str::limit($sale->total, 20) ?? '' }}</td>
                  </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">
                        <h5 style="color:red">{{ __('messages.sale_no_record') }}</h5>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
