<hr class="my-4">

<h5 class="mb-3 fw-bold">Connected Accounts</h5>

<div class="row g-3">

    @php
        $providers = [
            'google' => ['label' => 'Google', 'icon' => 'fab fa-google'],
            'github' => ['label' => 'Github', 'icon' => 'fab fa-github'],
            'discord' => ['label' => 'Discord', 'icon' => 'fab fa-discord'],
            'twitter' => ['label' => 'Twitter', 'icon' => 'fab fa-twitter'],
            'linkedin' => ['label' => 'LinkedIn', 'icon' => 'fab fa-linkedin'],
            'twitch' => ['label' => 'Twitch', 'icon' => 'fab fa-twitch'],
        ];
    @endphp

    @foreach ($providers as $key => $provider)
        <div class="col-md-6">

            <div class="card border shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">

                    {{-- LEFT --}}
                    <div class="d-flex align-items-center gap-3">

                        <i class="{{ $provider['icon'] }} fa-2x"></i>

                        <div>
                            <div class="fw-semibold">{{ $provider['label'] }}</div>

                            @if (auth()->user()->hasProvider($key))
                                <span class="badge bg-success">Connected</span>
                            @else
                                <span class="badge bg-secondary">Not Connected</span>
                            @endif
                        </div>
                    </div>

                    {{-- RIGHT --}}
                    <div>

                        @if (auth()->user()->hasProvider($key))
                            <form action="{{ route('provider.disconnect', $key) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm">
                                    Disconnect
                                </button>
                            </form>
                        @else
                            <a href="{{ route('provider.redirect', $key) }}" class="btn btn-primary btn-sm">
                                Connect
                            </a>
                        @endif

                    </div>

                </div>
            </div>

        </div>
    @endforeach

</div>
