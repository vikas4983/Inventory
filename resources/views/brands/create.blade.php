@extends('layouts.main-app')
@section('title', 'Create Brand')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :parent-route="['name' => 'Brands', 'url' => route('brands.index')]" :current-route="['name' => 'Create', 'url' => null]" />

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    @include('alerts.alert')
                     <div class="text-center">
                                <h3>{{__('labels.brand_title')}}</h3>
                            </div>
                    <form action="{{ route('brands.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-medium">{{ __('labels.brand_name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter Name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group mt-5">
                                <div class="d-flex align-items-center">
                                    <label class="font-weight-medium mb-0 mr-3">Status</label>

                                    <div class="form-check form-check-inline mr-3">
                                        <input class="form-check-input" type="radio" name="is_active" id="statusActive"
                                            value="1" checked>
                                        <label class="form-check-label" for="statusActive">Active</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_active" id="statusInactive"
                                            value="0">
                                        <label class="form-check-label" for="statusInactive">Inactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" title="{{ __('titles.create') }}"
                            class="btn btn-primary">{{ __('buttons.create') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="category-list" class="col-lg-6 mt-lg-0 mt-4">
            <div class="accordion" id="categoryAccordion">
                <div class="card shadow">
                    <div class="card-header" id="categoryHeading">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed w-100 text-left" type="button" data-toggle="collapse"
                                data-target="#brandCollapse" aria-expanded="false" aria-controls="brandCollapse">
                                <strong>{{ __('labels.brand_list') }}</strong>
                            </button>
                        </h2>
                    </div>
                    <div id="brandCollapse" class="collapse show" aria-labelledby="categoryHeading"
                        data-parent="#brandAccordion">
                        <div class="card-body p-0">
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
                                    @if (count($brands) > 0)
                                        @foreach ($brands as $index => $brand)
                                            <tr>
                                                <td>{{ $index + 1 ?? '' }}</td>
                                                <td>{{ Str::limit($brand->name, 15) }}</td>
                                                <td> <x-buttons.switch-button :url="route('brands.update', $brand->id)" :method="'PATCH'"
                                                        :objectData="$brand->is_active" /></td>
                                                <td>
                                                    <div style="display: flex; flex-wrap: nowrap; gap: 6px; mb-2">
                                                        <x-buttons.edit-button :objectData="$brand" :url="route('brands.edit', $brand->id)"
                                                            :title="'Brand'" :method="'GET'" />
                                                        <x-buttons.delete-button :objectData="$brand" :url="route('brands.destroy', $brand->id)"
                                                            :title="'Brand'" :method="'DELETE'" />
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <h5 style="color:red">No Brands Available</h5>
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
