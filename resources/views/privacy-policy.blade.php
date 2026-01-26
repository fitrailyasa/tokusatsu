@extends('layouts.client.app')

@section('title', 'Privacy Policy')

@section('textHome', 'rounded aktif')

@section('content')

    <div class="my-5 py-4">
        <h3 class="text-center">Privacy Policy</h3>
        <div class="container mb-5" style="max-width: 900px;">
            <h4>1. Introduction</h4>
            <p>
                Welcome to <strong>{{ ucwords(config('app.name')) }}</strong>. This Privacy Policy explains how we collect,
                use, and
                protect your
                personal data when using our website.
            </p>

            <h4>2. Information We Collect</h4>
            <ul>
                <li>Personal information (name, email, phone number)</li>
                <li>Account information</li>
                <li>Analytics and usage data</li>
                <li>Cookies and tracking data</li>
            </ul>

            <h4>3. How We Use Your Information</h4>
            <ul>
                <li>To operate and maintain the website</li>
                <li>To communicate with you</li>
                <li>To improve user experience</li>
                <li>To comply with legal obligations</li>
            </ul>

            <h4>4. Data Protection</h4>
            <p>
                We take reasonable steps to secure your data. However, no method of transmission over the internet is 100%
                secure.
            </p>

            <h4>5. Contact Us</h4>
            <p>
                If you have any questions about this Privacy Policy, please contact us at:
                <br>Email: <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>
            </p>
        </div>
    </div>

@endsection
