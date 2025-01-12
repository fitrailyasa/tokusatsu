<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
</head>

<body>
    <form action="{{ route('paypal') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">Pay with PayPal</button>
    </form>
    <button id="pay-button" class="btn btn-primary">Pay with Midtrans</button>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snap_token }}', {
                onSuccess: function(result) {
                    sendResponseToServer(result);
                },
                onPending: function(result) {
                    sendResponseToServer(result);
                },
                onError: function(result) {
                    console.log(result);
                },
                onClose: function() {
                    console.log('customer closed the popup without finishing the payment');
                }
            });
        });

        function sendResponseToServer(result) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/payment/finish';

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'result_data';
            input.value = JSON.stringify(result);
            form.appendChild(input);

            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>

</html>
