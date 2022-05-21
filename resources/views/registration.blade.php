<!DOCTYPE html>
<html class="single">

<head>
  <title>Kosmetyki samochodowe</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="foto/car.png" rel="icon">
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


  <!-- Top menu on small screens -->
  <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <div class="w3-bar-item w3-padding-24 w3-wide"><img style="width:20%" src="foto/logo-white.png"></div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  </header>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main">

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Top header -->
    <header class="w3-container w3-xlarge">
      <a href="{{ url('/') }}">
        <p class="w3-left">Detailing store</p>
      </a>
      <p class="w3-right">
        <img src="foto/icons8-shopping-cart-promotion-60.png" rel="cart" style="width:25%; margin-right:10px;">
        <a href="{{ url('login') }}"><img src="foto/icons8-user-60.png" rel="user" style="width:25%;"></a>
      </p>
    </header>

    <div class="login-main">
      <div>
        <h3><b>Rejestracja</b></h3>
      </div>
      <form action="registration" method="POST" class="login-form">
      {{ csrf_field() }}
        <input class="l-input" type="text" placeholder="Imię i nazwisko" name="name">
        <input class="l-input" type="text" placeholder="Email" name="email">
        <input class="l-input" type="password" placeholder="Hasło" name="password">
        <input class="l-input" type="text" placeholder="Adres" name="adress">
        <input class="l-input" type="text" placeholder="Numer telefonu" name="phone">
        <button class="submit-login" type="submit">Zarejestruj</button></br>
        <a href="{{ url('login') }}" class="regirestration">Mam już konto, chce się zalogować.</a>
      </form>
    </div>

    <!-- Footer -->
    <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
      <div class="w3-row-padding">
        <div class="center-content" style="display:flex; justify-content: space-around">
          <div class="w3-col s4">
            <h4>O nas</h4>
            Jesteśmy sklepem działającym na rynku od ponad 15 lat.
            Posiadamy szeroką gamę asortymentu tylko znanych producentów.
            Wyróżniamy się doświadczeniem i zadowoleniem naszych klientów.
            Serdecznie zapraszamy do zakupów oraz odwiedzenia naszego sklepu stacjonarnie.
          </div>

          <div class="w3-col s4 w3-justify">
            <h4>Sklep</h4>
            <p><i class="fa fa-fw fa-map-marker"></i> Detailing Store</p>
            <p><i class="fa fa-fw fa-phone"></i> +48 652312548</p>
            <p><i class="fa fa-fw fa-envelope"></i> Detailing_Store@mail.com</p>
            <h4>Formy płatności</h4>
            <p><i class="fa fa-fw fa-cc-amex"></i> Paypal</p>
            <p><i class="fa fa-fw fa-credit-card"></i> Visa</p>
          </div>
        </div>
      </div>
    </footer>

    <div class="w3-black w3-center w3-padding-24"></div>

    <!-- End page content -->
  </div>

  <script>
    // Accordion 
    function myAccFunc() {
      var x = document.getElementById("demoAcc");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }

    // Click on the "Jeans" link on page load to open the accordion for demo purposes
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