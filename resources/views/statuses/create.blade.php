@extends('layouts.main-app')
@section('title', 'Create Status')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :parent-route="['name' => 'Statuses', 'url' => route('statuses.index')]" :current-route="['name' => 'Create', 'url' => null]" />
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h3>{{ __('labels.status_title') }}</h3>
                    </div>
                    @include('alerts.alert')
                    <form action="{{ route('statuses.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-medium">{{ __('labels.status_name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="{{ __('labels.status_name_placeholder') }}"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group col-lg-6 mt-5  d-flex justify-content-between align-items-right">
                                <label for="is_active" class="font-weight-medium mb-0">{{ __('labels.status') }}</label>
                                <div class="switch-container">
                                    <label class="switch switch-text switch-primary switch-pill form-control-label">
                                        <input type="checkbox" name="is_active" id="is_active"
                                            class="switch-input form-check-input" value="1">
                                        <span class="switch-label" data-on="ON" data-off="OFF"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </div>
                                @error('is_active')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" title="{{ __('titles.create') }}"
                            class="btn btn-primary">{{ __('buttons.create') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="status-list" class="col-lg-6 mt-lg-0 mt-4">
            <div class="accordion" id="statusAccordion">
                <div class="card shadow">
                    <div class="card-header" id="statusHeading">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed w-100 text-left" type="button" data-toggle="collapse"
                                data-target="#statusCollapse" aria-expanded="false" aria-controls="statusCollapse">
                                <strong>{{ __('labels.status_list') }}</strong>
                            </button>
                        </h2>
                    </div>
                    <div id="statusCollapse" class="collapse show" aria-labelledby="statusHeading"
                        data-parent="#statusAccordion">
                        <div class="card-body p-0">
                            <table id="productsTable" class="table table-hover table-product" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('labels.status_name') }}</th>
                                        <th>{{ __('labels.status') }}</th>
                                        <th>{{ __('labels.action') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($statuses) > 0)
                                        @foreach ($statuses as $index => $status)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $status->name }}</td>
                                                <td> <x-buttons.switch-button :url="route('statuses.update', $status->id)" :method="'PATCH'"
                                                        :objectData="$status->is_active" /></td>
                                                <td>
                                                    <div style="display: flex; flex-wrap: nowrap; gap: 6px; mb-2">
                                                        <x-buttons.edit-button :objectData="$status" :url="route('statuses.edit', $status->id)"
                                                            :title="'status'" :method="'GET'" :modalSize="__('labels.status_edit_modal')" />
                                                        {{-- <x-buttons.delete-button :objectData="$status" :url="route('statuses.destroy', $status->id)"
                                                            :title="'status'" :method="'GET'" /> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <h5 style="color:red">{{ __('messages.status_no_record') }}</h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function handleResponsiveLayout() {
                console.log(window.innerWidth <= 768 ? "Mobile view" : "Desktop view");
            }

            function debounce(func, timeout = 100) {
                let timer;
                return (...args) => {
                    clearTimeout(timer);
                    timer = setTimeout(() => {
                        func.apply(this, args);
                    }, timeout);
                };
            }
            document.addEventListener('DOMContentLoaded', function() {
                handleResponsiveLayout();
                window.addEventListener('resize', debounce(handleResponsiveLayout));
            });
        </script>
    </div>
@endsection
