@props([
    'route',
    'icon',
    'label',
    'can' => null,
])

@php
    $isActive = Request::routeIs($route) ? 'aktif' : '';
@endphp

@if (is_null($can) || (auth()->check() && auth()->user()->can($can)))
    <li class="nav-item">
        <a href="{{ route($route) }}" class="nav-link text-white {{ $isActive }}">
            <i class="nav-icon fas fa-{{ $icon }}"></i>
            <p>{{ $label }}</p>
        </a>
    </li>
@endif
