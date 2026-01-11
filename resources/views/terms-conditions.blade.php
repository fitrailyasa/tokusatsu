@extends('layouts.client.app')

@section('title', 'Terms & Conditions')

@section('textHome', 'rounded aktif')

@section('content')

    <div class="my-5 py-4">
        <h3 class="text-dark text-center">Terms &amp; Conditions</h3>
        <div class="container text-dark mb-5" style="max-width: 900px;">

            <h4>1. Introduction</h4>
            <p>
                These Terms and Conditions ("Terms") govern your use of our website and services.
                By accessing or using this website, you agree to be bound by these Terms.
                If you do not agree, please discontinue use immediately.
            </p>

            <h4>2. Use of the Website</h4>
            <ul>
                <li>You must be at least 13 years old to use this website.</li>
                <li>You agree not to use the website for any illegal or unauthorized purpose.</li>
                <li>You may not attempt to damage, disable, or interfere with the website’s functionality.</li>
            </ul>

            <h4>3. User Accounts</h4>
            <ul>
                <li>You are responsible for maintaining the confidentiality of your account credentials.</li>
                <li>You are responsible for all activities that occur under your account.</li>
                <li>We reserve the right to suspend or terminate accounts for violations of these Terms.</li>
            </ul>

            <h4>4. Intellectual Property</h4>
            <p>
                All content, trademarks, logos, and materials displayed on this website belong to
                <strong>{{ ucwords(config('app.name')) }}</strong> unless otherwise stated. You may not copy, reproduce, or
                distribute any content without prior written permission.
            </p>

            <h4>5. Third-Party Links</h4>
            <p>
                Our website may contain links to third-party websites. We are not responsible for the content,
                policies, or practices of these external sites. Accessing them is at your own risk.
            </p>

            <h4>6. Limitation of Liability</h4>
            <p>
                We are not liable for any damages arising from your use of the website, including but not limited to:
            </p>
            <ul>
                <li>loss of data,</li>
                <li>service interruptions,</li>
                <li>technical errors,</li>
                <li>indirect or consequential damages.</li>
            </ul>

            <h4>7. Disclaimer</h4>
            <p>
                All content on this website is provided “as is” without warranties of any kind.
                We make no guarantees regarding accuracy, reliability, or availability.
            </p>

            <h4>8. Changes to the Terms</h4>
            <p>
                We may update or modify these Terms at any time. Changes will be effective upon posting.
                Continued use of the website indicates acceptance of the updated Terms.
            </p>

            <h4>9. Governing Law</h4>
            <p>
                These Terms are governed by the laws applicable in your country or region, unless otherwise stated.
            </p>

            <h4>10. Contact Us</h4>
            <p>
                If you have any questions about these Terms & Conditions, you may contact us at:<br>
                Email: <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>
            </p>

        </div>
    </div>

@endsection
