@extends('layouts.admin.app')

@section('title', 'File Google Drive')

@section('content')
    <div class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('admin.auth') }}"><i class="text-dark fas fa-arrow-left"></i></a>
            <h4>File: {{ $email }}</h4>
            <div>
                <a href="{{ route('admin.auth.export', $email) }}" class="btn btn-success btn-sm me-2">
                    <i class="fas fa-file-excel"></i> Export Excel
                </a>
            </div>
        </div>

        @if (count($files) > 0)
            <ul class="list-group">
                @foreach ($files as $f)
                    @php
                        $fileLink = "https://drive.google.com/file/d/{$f->id}/view?usp=sharing";
                        $downloadLink = "https://drive.google.com/uc?export=download&id={$f->id}";
                    @endphp
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ $fileLink }}" target="_blank">
                                {{ $f->name }}
                            </a>
                            <br>
                            <small class="text-muted">
                                {{ isset($f->modifiedTime) ? \Carbon\Carbon::parse($f->modifiedTime)->format('d M Y H:i') : '' }}
                            </small>
                        </div>

                        <div class="btn-group">
                            <a href="{{ $downloadLink }}" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="fas fa-download"></i> Download
                            </a>
                            <button class="btn btn-outline-secondary btn-sm copy-link" data-link="{{ $fileLink }}">
                                <i class="fas fa-copy"></i> Copy Link
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada file di akun ini.</p>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.copy-link');
            buttons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const link = this.getAttribute('data-link');
                    navigator.clipboard.writeText(link).then(() => {
                        this.innerHTML = '<i class="fas fa-check"></i> Copied';
                        setTimeout(() => {
                            this.innerHTML =
                                '<i class="fas fa-copy"></i> Copy Link';
                        }, 1500);
                    });
                });
            });
        });
    </script>
@endsection
