<!DOCTYPE html>
<html>

<head>
    <title>Kosmetyki samochodowe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="foto/car.png" rel="icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        .w3-sidebar a {
            font-family: "Roboto", sans-serif
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .w3-wide {
            font-family: "Montserrat", sans-serif;
        }
    </style>
</head>

<body class="w3-content" style="max-width:1200px">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <h3 class="w3-wide"><a href="{{ url('/') }}"><img style="width:80%" src="foto/logo.png"></a></h3>
        </div>

        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a href="{{ url('shampoo') }}" class="w3-bar-item w3-button">Szampony</a>
            <a href="{{ url('foam') }}" class="w3-bar-item w3-button">Piany aktywne</a>
            <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
                Akcesoria <i class="fa fa-caret-down"></i>
            </a>

            <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="{{ url('brush') }}" class="w3-bar-item w3-button">Szczotki</a>
                <a href="{{ url('sponge') }}" class="w3-bar-item w3-button">G??bki</a>
                <a href="{{ url('microfibre') }}" class="w3-bar-item w3-button">Mikrofibry</a>
            </div>

            <a href="{{ url('wax') }}" class="w3-bar-item w3-button">Woski</a>
            <a href="{{ url('quick') }}" class="w3-bar-item w3-button">Quick detailery</a>
        </div>

    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
        <div class="w3-bar-item w3-padding-24 w3-wide"><img style="width:20%" src="foto/logo-white.png"></div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:250px">

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>

        <!-- Top header -->
        <header class="w3-container w3-xlarge">
            <a href="{{ url('/') }}">
                <p class="w3-left">Detailing store</p>
            </a>
            <p class="navbar">
                @if( auth()->check() )
                Zalogowany jako: &nbsp;
                <b>{{ auth()->user()->name }}</b>
                &nbsp;
                <a href="{{ url('logout') }}"><img src="foto/exit.png" rel="logout" style="width:4%;"></a>
                @else
                <a href="{{ url('login') }}"><img src="foto/enter.png" rel="login" style="width:4%;"></a>
                <a href="{{ url('registration') }}"><img src="foto/add-user.png" rel="register" style="width:4%;"></a>
                @endif
                @if(Auth::check() && Auth::user()->role == "1")
                <a href="{{ url('admin') }}"><img src="foto/leadership.png" rel="admin" style="width:4%;"></a>
                @endif
                <a href="{{ route('cart') }}"><img src="foto/shopping-cart.png" rel="cart" style="width:4%;"><span class="count_cart">{{ count((array) session('cart')) }}</span></a>
            </p>
        </header>

        <div class="cart-main">
            <div style="margin-bottom:50px">
                <h3><b>Dane p??atno??ci</b></h3>
            </div>
            <form action="{{ url('order') }}" method="POST">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <table class="tableadd">
                    <tr>
                        <td>Imi?? i nazwisko</td>
                        <td><input class="Iaddprod" type='text' value="{{ Auth::user()->name}}" name='name' /></td>
                    </tr>
                    <tr>
                        <td>Adres e-mail</td>
                        <td><input class="Iaddprod" type="text" value="{{ Auth::user()->email}}" name='email' /></td>
                    </tr>
                    <tr>
                        <td>Adres</td>
                        <td><input class="Iaddprod" type="text" value="{{ Auth::user()->adress}}" name='adress' /></td>
                    </tr>
                    <tr>
                        <td>Numer telefonu</td>
                        <td><input class="Iaddprod" type="text" value="{{ Auth::user()->phone}}" name='phone' /></td>
                    </tr>
                </table>
                <table class="tablecheckout">
                    <tr>
                        <td>PRODUKTY</td>
                        <td>ILO????</td>
                        <td>CENA</td>
                    </tr>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            {{ $details['name'] }}
                        </td>
                        <td data-th="Quantity">{{ $details['quantity'] }} </td>
                        <td data-th="Price">{{ $details['price'] }} z??</td>
                        @endforeach
                        @endif
                    <tr>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td style="border:none;">Razem do zap??aty: {{ $total }} z?? </td>
                    </tr>
                </table>
                <button type="submit" class="submit" style="width:70%; margin-top: 10px;">Z?????? zam??wienie</button>
            </form>
        </div>

        <!-- Footer -->
        <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
            <div class="w3-row-padding">
                <div class="center-content" style="display:flex; justify-content: space-around">
                    <div class="w3-col s4">
                        <h4>O nas</h4>
                        Jeste??my sklepem dzia??aj??cym na rynku od ponad 15 lat.
                        Posiadamy szerok?? gam?? asortymentu tylko znanych producent??w.
                        Wyr????niamy si?? do??wiadczeniem i zadowoleniem naszych klient??w.
                        Serdecznie zapraszamy do zakup??w oraz odwiedzenia naszego sklepu stacjonarnie.
                    </div>

                    <div class="w3-col s4 w3-justify">
                        <h4>Sklep</h4>
                        <p><i class="fa fa-fw fa-map-marker"></i> Detailing Store</p>
                        <p><i class="fa fa-fw fa-phone"></i> +48 652312548</p>
                        <p><i class="fa fa-fw fa-envelope"></i> Detailing_Store@mail.com</p>
                        <h4>Formy p??atno??ci</h4>
                        <p><i class="fa fa-fw fa-cc-amex"></i> Paypal</p>
                        <p><i class="fa fa-fw fa-credit-card"></i> Visa</p>
                    </div>
                </div>
            </div>
        </footer>

        <div class="w3-black w3-center w3-padding-24"></div>

        <!-- End page content -->

    </div>

    <script type="text/javascript">
        // Accordion 
        function myAccFunc() {
            var x = document.getElementById("demoAcc");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        document.getElementById("myBtn").click();


        // Open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>

</body>

</html>