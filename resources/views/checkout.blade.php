<!DOCTYPE html>
<html lang="en">
<head>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://js.stripe.com/v3/"></script>

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  

</head>
<body class="bg-grey-light mt-auto mr-auto">
    <div id="app">
        <nav class="py-4 bg-white">
            <div style="margin-left: 10%; margin-right: 10%">
                <div class = "flex justify-between items-center">
                        <a href="{{ url('/home') }}">
                            <h1 class="p-2 text-green-dark" style="font-family: 'Nunito'; font-size: 2.6rem;">Rescü</h1>
                        </a>
                    <div>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                      
                    
                           <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                              <div class="text-sm lg:flex-grow">

                                  <a href="/profile" style="text-decoration:none; font-size: 1.1rem; font-weight: bold; position: relative;" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                      <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width: 42px; height:42px; top:10px; left:10px; border-radius: 50%; margin-bottom: -10px; margin-right: 10px;">
                                     {{ Auth::user()->name }}
                                  </a>

                                  <a href="/home" style="text-decoration:none; font-size: 1.1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                      Home
                                  </a>
                                  <a href="{{ route('logout') }}" style="text-decoration:none; font-size: 1.1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                  
                              </div>
                          </div>

                            
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    <div class="lg:w-3/5 lg:mx-auto bg-white p-6 md:py-12 mt-6 md:px-16 rounded shadow" style="min-height: 400px;">
        <div class="small-6 small-centered columns">
          <h1 style= "color: green; text-align: right; font-size: 3rem;"> €{{ $repair->price }} </h1></br>
          
            
          <form action='/repairs/{{ $repair->id }}/checkout' method="POST" id="payment-form">
            {{ csrf_field() }}
            <div class="form-row mb-6">
              <label for="card-element" class="pb-5">
                <h1 style="margin-bottom: 30px;">Credit or debit card</h1>
              </label>
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>

              <!-- Used to display Element errors. -->
              <div id="card-errors" role="alert"></div>
            </div>

            <button type="submit" class="mt-6 button is-link mr-2" style="float: left;">Submit</button>
          </form>
        </div>
    </div>


  <script>
    var stripe = Stripe('pk_test_K5BuwK6QhKSWyNLgHTIWBmla00dMkzXNM5');
    var elements = stripe.elements();


    // Custom styling can be passed to options when creating an Element.
    var style = {
      base: {
        // Add your base input styles here. For example:
        fontSize: '24px',
        color: "#32325d",
      }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
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
        // Inform the customer that there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
      }
    });
  });

  function stripeTokenHandler(token) {

  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
  </script>

</body>
</html>