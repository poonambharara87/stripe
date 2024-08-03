<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    @if(session()->has('errors'))
                    <div class="alert alert-success" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <div class="min-h-screen bg-gray-100">
          


            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                        <div class="card-header">Make a Payment</div>
                        <div class="card-body">
                            <form action="{{ route('pay')}}" method="post" id="paymentForm">
                                @csrf
                                <div class="row">
                                    <div class="col-auth">
                                        <label>How much you want to pay</label>
                                        <input
                                            type="number"
                                            name="value"
                                            min="5"
                                            step="0.01"
                                            class="form-control"
                                            value="{{ mt_rand(500, 100000 / 50)}}"
                                            required
                                        >
                                    <div>
                                </div>
                                <div class="col-auto">
                                    <label>Currency</label>
                                    <select class="custom-select form-control" name="currency" required>
                                        @foreach($currencies as $currency)
                                        <option value="{{$currency->iso}}">{{strtoupper($currency->iso)}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label>Select the desired payment platform</lable>
                                        <div class="form-group" id="toggler">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @foreach($payment_platforms as $payment_platform)
                                                    <label class="btn m-2 p-2" data-target="#{{$payment_platform->name}}Collapse" data-toggle="collapse">
                                                        <input type="radio" name="payment_platform" value="{{$payment_platform->id}}" required>
                                                        <img class="img-thumbnail" src="{{asset($payment_platform->image)}}">
                                                    </lable>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- ========= -->

                                                @foreach($payment_platforms as $payment_platform)
                                                    <div id="{{$payment_platform->name}}Collapse" class="collapse" data-parent="#toggler">
                                                        @include ('components.'. strtolower($payment_platform->name) .'-collapse')
                                                    </div>
                                                @endforeach
                                        <!-- ============== -->
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" id="payButton" class="btn btn-primary btn-lg">Pay</button>
                                </div>
                            </form>

                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="py-4">
                
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <ul>
                            @foreach(session()->get('success') as $message)
                            <li>{{$message}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
          <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
