@extends('layouts.admin.table')

@section('title', 'Category')

@section('table-category', 'active')

@section('formCreate')
    @include('admin.category.create')
@endsection

@section('import')
    @include('admin.category.import')
@endsection

@section('export')
    @include('admin.category.export')
@endsection

@section('table')
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Franchise</th>
                <th>Name</th>
                <th>Era</th>
                <th>Images</th>
                <th>More</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->franchise->name ?? '-' }}</td>
                    <td>{{ $category->name ?? '-' }}</td>
                    <td>{{ $category->era->name ?? '-' }}</td>
                    <td>
                        @if ($category->img == null)
                            <a href="{{ asset('assets/profile/default.png') }}">
                                <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $category->name }}"
                                    width="100">
                            </a>
                        @else
                            <a href="{{ asset('assets/img/' . $category->img) }}">
                                <img src="{{ asset('assets/img/' . $category->img) }}" alt="{{ $category->name }}"
                                    width="100">
                            </a>
                        @endif
                    </td>
                    <td class="manage-row">
                        @if (auth()->user()->roles_id == 1)
                            @include('admin.category.edit')
                            @include('admin.category.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Franchise</th>
                <th>Name</th>
                <th>Era</th>
                <th>Images</th>
                <th>More</th>
            </tr>
        </tfoot>
    </table>
@endsection
