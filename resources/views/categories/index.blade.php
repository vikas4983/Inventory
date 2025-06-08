@extends('layouts.main-app')
@section('title', 'Category List')
@section('content')
    @include('alerts.alert')
    <x-breadcrumb :home-route="['name' => 'Home', 'url' => route('dashboard')]" :current-route="['name' => 'Categories', 'url' => null]" />
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Create</a>
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
            @forelse ($categories as $index => $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <x-buttons.switch-button :url="route('categories.update', $category->id)" :method="'PATCH'" :objectData="$category->is_active" />
                    </td>
                    <td>
                        <div style="display: flex; flex-wrap: nowrap; gap: 6px; margin-bottom: 0.5rem;">
                            <x-buttons.action-button :objectData="$category" :url="route('categories.destroy', $category->id)" :title="'Category'" />
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h5 style="color:red">No Categories Available</h5>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
