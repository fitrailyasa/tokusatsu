<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Dashboard
    </x-slot>

    @include('components.alert')

    <!-- Content -->
    <div class="row">
        @can('view:data')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $datas }}</h3>

                        <p>{{ __('Data') }}</p>
                    </div>
                    <a href="{{ route('admin.data.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('view:category')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $categories }}</h3>

                        <p>{{ __('Category') }}</p>
                    </div>
                    <a href="{{ route('admin.category.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('view:era')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $eras }}</h3>

                        <p>{{ __('Era') }}</p>
                    </div>
                    <a href="{{ route('admin.era.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('view:franchise')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $franchises }}</h3>

                        <p>{{ __('Franchise') }}</p>
                    </div>
                    <a href="{{ route('admin.franchise.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('view:video')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $videos }}</h3>

                        <p>{{ __('Video') }}</p>
                    </div>
                    <a href="{{ route('admin.video.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('view:tag')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $tags }}</h3>

                        <p>{{ __('Tag') }}</p>
                    </div>
                    <a href="{{ route('admin.tag.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('view:role')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $roles }}</h3>

                        <p>{{ __('Role') }}</p>
                    </div>
                    <a href="{{ route('admin.role.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('view:user')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $users }}</h3>

                        <p>{{ __('User') }}</p>
                    </div>
                    <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
    </div>

</x-admin-layout>
