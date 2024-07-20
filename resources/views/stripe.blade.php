<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 How To Integrate Stripe Payment Gateway</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
<div class="container">
    <div class='row'>
        <h1>Laravel 9 How To Integrate Stripe Payment Gateway</h1>
        <div class='col-md-12'>
            <div class="card">
                <div class="card-header">
                    Laravel 9 How To Integrate Stripe Payment Gateway
                </div>
                <div class="card-body">
                    @if (Session::has('error'))
                        <font color="red">{{ Session::get('error') }}</font>
                    @endif
                        <form id="payment-form" action="{!! route('addmoney.stripe') !!}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="card-element">Credit or debit card</label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <div class="mb-3" style="padding-top:20px;">
                                <input type="hidden" value="{{$grandPrice}}" name="grandPrice" id="grandPrice" >
                                <h5 class='total'>Total:<span class='amount'>{{$grandPrice}}</span></h5>
                            </div>

                            <div class="mb-3">
                                <button class='form-control btn btn-success submit-button' type='submit'>Pay »</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var stripePublicKey = "{{ env('STRIPE_KEY') }}";
    var stripe = Stripe(stripePublicKey);

    var elements = stripe.elements();
    var style = {
        base: {
            fontSize: '16px',
            color: '#32325d',
        },
    };

    var card = elements.create('card', {style: style});
    card.mount('#card-element');

    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
    }
</script>

</body>

</html>
