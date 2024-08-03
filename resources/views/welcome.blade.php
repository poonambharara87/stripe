<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">

        <form action="/charge" method="POST">
        {{ csrf_field() }}
        <label for="amount">
            Amount (in cents):
            <input type="text" name="amount" id="amount">
        </label>

        <label for="email">
            Email:
            <input type="text" name="email" id="email">
        </label>

        <label for="card-element">
            Credit or debit card
        </label>
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>

        <button type="submit">Submit Payment</button>
    </form>

    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>
        
    </body>
</html>
