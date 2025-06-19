@extends('layouts.main-app')
@section('title', 'Purchase Item List')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'purchaseItems', 'url' => null]" />
    <a href="{{ route('purchaseItems.create') }}" title="{{ __('titles.add_purchase_item') }}"
        class="btn btn-secondary">{{ __('buttons.add_new_purchase_item') }}</a>
    <span>@include('alerts.alert')</span>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('labels.action') }}</th>
                <th>{{ __('labels.status') }}</th>
                <th>{{ __('labels.purchase_item_purchase_date') }}</th>
                <th>{{ __('labels.purchase_item_supplier') }}</th>
                <th>{{ __('labels.purchase_item_product_id') }}</th>
                <th>{{ __('labels.purchase_item_quantity') }}</th>
                <th>{{ __('labels.purchase_item_price') }}</th>
                <th>{{ __('labels.purchase_item_total') ?? '00.00' }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($purchaseItems as $index => $purchaseItem)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px;  ">
                            <x-buttons.edit-button :objectData="$purchaseItem" :url="route('purchaseItems.edit', $purchaseItem->id)" :title="'Purchase Item'" :method="'GET'"
                                :modalSize="__('labels.product_edit_modal')" />
                            <x-buttons.delete-button :objectData="$purchaseItem" :url="route('purchaseItems.destroy', $purchaseItem->id)" :title="'Purchase Item'"
                                :method="'GET'" />
                        </div>
                    </td>
                    <td> <x-buttons.switch-button :url="route('purchaseItems.update', $purchaseItem->id)" :method="'PATCH'" :objectData="$purchaseItem->is_active" /></button>
                    </td>
                    <td>{{ Str::limit($purchaseItem->purchase->purchase_date, 20) ?? '' }}</td>
                    <td>{{ Str::limit($purchaseItem->purchase->supplier->name, 20) ?? '' }}</td>
                    <td>{{ Str::limit($purchaseItem->product->name, 20) ?? '' }}</td>
                    <td>{{ Str::limit($purchaseItem->quantity, 20) ?? '' }}</td>
                    <td>₹{{ Str::limit($purchaseItem->price, 20) ?? '' }}</td>
                    <td>₹ {{(int)$purchaseItem->quantity * (int) $purchaseItem->price, 20}}</td>


                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">
                        <h5 style="color:red">{{ __('messages.purchase_no_record') }}</h5>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
