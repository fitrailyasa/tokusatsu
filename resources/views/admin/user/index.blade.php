<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        User
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.user.create')
    </x-slot>

    <!-- Table -->
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Email') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Role') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users->where('email', '!=', 'super@admin.com') as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $user->email ?? '-' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $user->role ?? '-' }}</td>
                    <td class="manage-row">
                        @if (auth()->user()->role == 'admin')
                            @include('admin.user.edit')
                            @include('admin.user.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Name') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Email') }}</th>
                <th class="d-none d-lg-table-cell">{{ __('Role') }}</th>
                <th>{{ __('More') }}</th>
            </tr>
        </tfoot>
    </table>

</x-admin-table>
