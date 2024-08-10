<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
<form id="payment-form" action="{!! route('addmoney.stripe') !!}" method="post">
    @if (Session::has('error'))
        <font color="red">{{ Session::get('error') }}</font>
    @endif
    @csrf
    <div class="container">

        <div class='row'>
            <h1>Checkout</h1>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header">
                        Billing details
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="firstName">First Name</label>
                                <input value="{{$customer->firstName ?? ''}}" type="text" class="form-control"
                                       name="firstName" placeholder="Enter Your First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName">Last Name</label>
                                <input value="{{$customer->lastName?? '' }}" type="text" class="form-control"
                                       name="lastName" placeholder="Enter Your Last Name">
                            </div>
                            <div class="col-md-12">
                                <label for="address">Address</label>
                                <input value="{{$customer->address ?? ''}}" type="text" class="form-control"
                                       name="address" placeholder="Enter Your Address">
                            </div>
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <input value="{{$customer->city ?? ''}}" type="text" class="form-control" name="city"
                                       placeholder="Enter Your City">
                            </div>
                            <div class="col-md-6">
                                <label for="zipCode">ZIP Code</label>
                                <input value="{{$customer->zip_code ?? ''}}" type="text" class="form-control"
                                       name="zipCode" placeholder="Enter Your ZIP Code">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email Address</label>
                                <input value="{{$user->email ?? ''}}" type="email" class="form-control" name="email"
                                       placeholder="Enter Your Email Address">
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number">Phone Number</label>
                                <input value="{{$customer->phone_number ?? ''}}" type="text" class="form-control"
                                       name="phone_number" placeholder="Enter Your Phone Number">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class='row'>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header">
                        Card Details
                    </div>
                    <div class="card-body">

                            <div class="mb-3">
                                <label for="card-element">Credit or debit card</label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <div class="mb-3" style="padding-top:20px;">
                                <input type="hidden" value="{{$grandPrice}}" name="grandPrice" id="grandPrice">
                                <h5 class='total'>Total:<span class='amount'>{{$grandPrice}}</span></h5>
                            </div>

                            <div class="mb-3">
                                <button class='form-control btn btn-success submit-button' type='submit'>Pay »</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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

    card.on('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        stripe.createToken(card).then(function (result) {
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
