@extends('layouts.main-app')
@section('title', 'sale Item List')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'saleItems', 'url' => null]" />
    <a href="{{ route('saleItems.create') }}" title="{{ __('titles.add_sale_item') }}"
        class="btn btn-secondary">{{ __('buttons.add_new_sale_item') }}</a>
    <span>@include('alerts.alert')</span>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('labels.action') }}</th>
                <th>{{ __('labels.status') }}</th>
                <th>{{ __('labels.sale_item_sale_date') }}</th>
                 <th>{{ __('labels.sale_item_sale_id') }}</th>
                 <th>{{ __('labels.sale_item_product_id') }}</th>
                <th>{{ __('labels.sale_item_quantity') }}</th>
                <th>{{ __('labels.sale_item_price') }}</th>
                <th>{{ __('labels.sale_item_total') ?? '00.00' }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($saleItems as $index => $saleItem)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px;  ">
                            <x-buttons.edit-button :objectData="$saleItem" :url="route('saleItems.edit', $saleItem->id)" :title="'sale Item'" :method="'GET'"
                                :modalSize="__('labels.product_edit_modal')" />
                            <x-buttons.delete-button :objectData="$saleItem" :url="route('saleItems.destroy', $saleItem->id)" :title="'sale Item'"
                                :method="'GET'" />
                        </div>
                    </td>
                    <td> <x-buttons.switch-button :url="route('saleItems.update', $saleItem->id)" :method="'PATCH'" :objectData="$saleItem->is_active" /></button>
                    </td>
                    <td>{{ Str::limit($saleItem->sale->sale_date, 20) ?? '' }}</td>
                    <td>{{ Str::limit($saleItem->sale->customer->name, 20) ?? '' }}</td>
                    <td>{{ Str::limit($saleItem->product->name, 20) ?? '' }}</td>
                    <td>{{ Str::limit($saleItem->quantity, 20) ?? '' }}</td>
                    <td>₹{{ Str::limit($saleItem->price, 20) ?? '' }}</td>
                    <td>₹ {{(int)$saleItem->quantity * (int) $saleItem->price, 20}}</td>


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
