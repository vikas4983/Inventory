@extends('layouts.main-app')
@section('title', 'Status List')
@section('content')

    @include('alerts.alert')
    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'Statuses', 'url' => null]" />
    <a href="{{ route('statuses.create') }}" title="{{ __('titles.add_status') }}" class="btn btn-secondary">{{ __('buttons.add_new_status') }}</a>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>{{__('labels.status_name')}}</th>
                <th>{{__('labels.status')}}</th>
                <th>{{__('labels.action')}}</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($statuses as $index => $status)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $status->name ?? ''}}</td>
                    
                    <td>
                        <x-buttons.switch-button :url="route('statuses.update', $status->id)" :method="'PATCH'" :objectData="$status->is_active" />
                    </td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px; margin-bottom: 0.5rem;">
                            <x-buttons.edit-button :objectData="$status" :url="route('statuses.edit', $status->id)" :title="'status'"
                                :method="'GET'" :modalSize="__('labels.status_edit_modal')" />
                            <x-buttons.delete-button :objectData="$status" :url="route('statuses.destroy', $status->id)" :title="'Status'"
                                :method="'GET'" />
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h5 style="color:red">{{__('messages.status_no_record')}}</h5>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
