<!DOCTYPE html>
<html>

<head>
  <title>Kosmetyki samochodowe</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <a href="{{ url('sponge') }}" class="w3-bar-item w3-button">Gąbki</a>
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
      <p class="w3-left">Detailing store</p>
      <p class="w3-right">
        <img src="foto/icons8-shopping-cart-promotion-60.png" rel="cart" style="width:25%; margin-right:10px;">
        <img src="foto/icons8-user-60.png" rel="user" style="width:25%;">
      </p>
    </header>


    <!-- Product grid -->
    <div class="main-div">
      @foreach ($show as $showData)
      <div class="sub-div">
        <form id="GFG" action="single" method="GET">
          <input type="hidden" value="{{$showData->id}}" name="id"></input>
          <button style="background: none; border: none; padding: 0; cursor: pointer">
            <img src="{{$showData->image}}" style="width:100%;">
            <p>{{$showData->product_name}}<br>
              <b>{{$showData->product_price}} zł</b>
            </p>
          </button>
        </form>
      </div>
      @endforeach
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