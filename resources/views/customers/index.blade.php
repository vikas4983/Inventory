@extends('layouts.main-app')
@section('title', 'Customer List')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'Customes', 'url' => null]" />
    <a href="{{ route('customers.create') }}" title="{{ __('titles.add_customer') }}"
        class="btn btn-secondary">{{ __('buttons.add_new_customer') }}</a>
    <span >@include('alerts.alert')</span>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('labels.action') }}</th>
                <th>{{ __('labels.status') }}</th>
                <th>{{ __('labels.customer_name') }}</th>
                <th>{{ __('labels.customer_email') }}</th>
                <th>{{ __('labels.customer_phone') }}</th>
                <th>{{ __('labels.customer_address') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $index => $customer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px;  ">
                            <x-buttons.edit-button :objectData="$customer" :url="route('customers.edit', $customer->id)" :title="'Customer'" :method="'GET'"
                                :modalSize="__('labels.product_edit_modal')" />
                            <x-buttons.delete-button :objectData="$customer" :url="route('customers.destroy', $customer->id)" :title="'Customer'"
                                :method="'GET'" />
                        </div>
                    </td>
                    <td> <x-buttons.switch-button :url="route('customers.update', $customer->id)" :method="'PATCH'" :objectData="$customer->is_active" /></button>
                    </td>
                    <td>{{ Str::limit($customer->name, 20) ?? '' }}</td>
                    <td>
                        {{ $customer->email }}
                        <span onclick="copyToClipboard('{{ $customer->email }}')" title="Copy Email" style="cursor: pointer;">
                            <i class="mdi mdi-content-copy text-muted fs-5 ms-2"></i>
                        </span>
                    </td>

                    <td>
                        <a href="tel:{{ $customer->phone }}" title="Call">
                            {{-- <i class="mdi mdi-phone text-primary fs-5 me-1"></i> --}}
                        </a>
                        {{ Str::limit($customer->phone, 20) ?? '' }}
                    </td>
                    <td>
                        {{ Str::limit($customer->address, 50) ?? '' }}
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">
                        <h5 style="color:red">{{__('messages.customer_no_record')}}</h5>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
