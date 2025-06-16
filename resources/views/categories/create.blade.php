@extends('layouts.main-app')
@section('title', 'Create Category')
@section('content')

    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :parent-route="['name' => 'Categories', 'url' => route('categories.index')]" :current-route="['name' => 'Create', 'url' => null]" />
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h3>{{ __('labels.category_title') }}</h3>
                    </div>
                    @include('alerts.alert')
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-medium">{{ __('labels.category_name') }}</label>
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
                                data-target="#categoryCollapse" aria-expanded="false" aria-controls="categoryCollapse">
                                <strong>{{ __('labels.category_list') }}</strong>
                            </button>
                        </h2>
                    </div>
                    <div id="categoryCollapse" class="collapse show" aria-labelledby="categoryHeading"
                        data-parent="#categoryAccordion">
                        <div class="card-body p-0">
                            <table id="productsTable" class="table table-hover table-product" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $index => $category)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td> <x-buttons.switch-button :url="route('categories.update', $category->id)" :method="'PATCH'"
                                                        :objectData="$category->is_active" /></td>
                                                <td>
                                                    <div style="display: flex; flex-wrap: nowrap; gap: 6px; mb-2">
                                                        <x-buttons.edit-button :objectData="$category" :url="route('categories.edit', $category->id)"
                                                            :title="'Category'" :method="'GET'" :modalSize="__('labels.category_edit_modal')" />
                                                        <x-buttons.delete-button :objectData="$category" :url="route('categories.destroy', $category->id)"
                                                            :title="'Category'" :method="'GET'" />
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <h5 style="color:red">No Categories Available</h5>
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
