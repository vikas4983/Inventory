@extends('layouts.main-app')
@section('title', 'Purchase List')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'Purchases', 'url' => null]" />
    <a href="{{ route('purchases.create') }}" title="{{ __('titles.add_purchase') }}"
        class="btn btn-secondary">{{ __('buttons.add_new_purchase') }}</a>
    <span>@include('alerts.alert')</span>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('labels.action') }}</th>
                <th>{{ __('labels.status') }}</th>
                <th>{{ __('labels.purchase_name') }}</th>
                <th>{{ __('labels.purchase_status') }}</th>
                <th>{{ __('labels.purchase_date') }}</th>
                <th>{{ __('labels.purchase_total') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($purchases as $index => $purchase)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px;  ">
                            <x-buttons.edit-button :objectData="$purchase" :url="route('purchases.edit', $purchase->id)" :title="'Purchase'" :method="'GET'"
                                :modalSize="__('labels.product_edit_modal')" />
                            <x-buttons.delete-button :objectData="$purchase" :url="route('purchases.destroy', $purchase->id)" :title="'Purchase'"
                                :method="'GET'" />
                        </div>
                    </td>
                    <td> <x-buttons.switch-button :url="route('purchases.update', $purchase->id)" :method="'PATCH'" :objectData="$purchase->is_active" /></button>
                    </td>
                    <td>{{ Str::limit($purchase->supplier->name, 20) ?? '' }}</td>
                    <td>{{ Str::limit($purchase->status->name, 20) ?? '' }}</td>
                    <td>{{ Str::limit($purchase->purchase_date, 20) ?? '' }}</td>
                    <td>{{ Str::limit($purchase->total, 20) ?? '' }}</td>


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
