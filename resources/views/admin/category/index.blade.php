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
                <th>{{ __('No') }}</th>
                <th>{{ __('Franchise') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Era') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->Franchise->name ?? '-' }}</td>
                    <td>{{ $category->name ?? '-' }}</td>
                    <td>{{ $category->Era->name ?? '-' }}</td>
                    <td>
                        @if ($category->img == null)
                            <img src="{{ asset('assets/profile/default.png') }}" alt="{{ $category->name }}" width="100">
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModal{{ $category->id }}">
                                <img class="img img-fluid rounded" src="{{ asset('assets/img/' . $category->img) }}"
                                    alt="{{ $category->img }}" width="100">
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $category->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <a href="{{ asset('assets/img/' . $category->img) }}">
                                                <img class="img img-fluid"
                                                    src="{{ asset('assets/img/' . $category->img) }}"
                                                    alt="{{ $category->img }}">
                                            </a>
                                            <!-- Tombol Download -->
                                            <a href="{{ asset('assets/img/' . $category->img) }}"
                                                download="{{ $category->img }}"
                                                class="btn btn-success mt-2 col-12">Download
                                                Gambar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                <th>{{ __('No') }}</th>
                <th>{{ __('Franchise') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Era') }}</th>
                <th>{{ __('Images') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
