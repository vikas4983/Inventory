@extends('layouts.main-app')
@section('title', 'Supplier List')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'Products', 'url' => null]" />
    <a href="{{ route('suppliers.create') }}" title="{{ __('titles.add_supplier') }}"
        class="btn btn-secondary">{{ __('buttons.add_new_supplier') }}</a>
    <span >@include('alerts.alert')</span>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('labels.action') }}</th>
                <th>{{ __('labels.status') }}</th>
                <th>{{ __('labels.supplier_name') }}</th>
                <th>{{ __('labels.supplier_email') }}</th>
                <th>{{ __('labels.supplier_phone') }}</th>
                <th>{{ __('labels.supplier_address') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suppliers as $index => $supplier)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px;  ">
                            <x-buttons.edit-button :objectData="$supplier" :url="route('suppliers.edit', $supplier->id)" :title="'Supplier'" :method="'GET'"
                                :modalSize="__('labels.product_edit_modal')" />
                            <x-buttons.delete-button :objectData="$supplier" :url="route('suppliers.destroy', $supplier->id)" :title="'Supplier'"
                                :method="'GET'" />
                        </div>
                    </td>
                    <td> <x-buttons.switch-button :url="route('suppliers.update', $supplier->id)" :method="'PATCH'" :objectData="$supplier->is_active" /></button>
                    </td>
                    <td>{{ Str::limit($supplier->name, 20) ?? '' }}</td>
                    <td>
                        {{ $supplier->email }}
                        <span onclick="copyToClipboard('{{ $supplier->email }}')" title="Copy Email" style="cursor: pointer;">
                            <i class="mdi mdi-content-copy text-muted fs-5 ms-2"></i>
                        </span>
                    </td>

                    <td>
                        <a href="tel:{{ $supplier->phone }}" title="Call">
                            {{-- <i class="mdi mdi-phone text-primary fs-5 me-1"></i> --}}
                        </a>
                        {{ Str::limit($supplier->phone, 20) ?? '' }}
                    </td>
                    <td>
                        {{ Str::limit($supplier->address, 50) ?? '' }}
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">
                        <h5 style="color:red">No Supplier Available</h5>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
