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

      <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
        Produkty <i class="fa fa-caret-down"></i>
      </a>
      <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
        <a href="{{ url('admin_product_add') }}" class="w3-bar-item w3-button">Dodawanie</a>
        <a href="{{ url('admin_product_delete') }}" class="w3-bar-item w3-button">Usuwanie</a>
        <a href="{{ url('admin_product_edit') }}" class="w3-bar-item w3-button">Edycja</a>
      </div>

      <a onclick="myAccFunc1()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
        U??ytkownicy <i class="fa fa-caret-down"></i>
      </a>
      <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
        <a href="{{ url('admin_user_add') }}" class="w3-bar-item w3-button">Dodawanie</a>
        <a href="{{ url('admin_user_delete') }}" class="w3-bar-item w3-button">Usuwanie</a>
        <a href="{{ url('admin_user_edit') }}" class="w3-bar-item w3-button">Edycja</a>
      </div>

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

      <p class="w3-left">Admin panel</p>

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
      </p>

    </header>

    <div class="admin-main">
      <div style="margin-bottom:50px">
        <h3><b>Dodawanie produkt??w</b></h3>
      </div>
      <form action="admin_product_add" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <table class="tableadd">
          <tr>
            <td>Nazwa produktu</td>
            <td><input class="Iaddprod" type='text' name='product_name' /></td>
          </tr>
          <tr>
            <td>Producent</td>
            <td><input class="Iaddprod" type="text" name='product_brand' /></td>
          </tr>
          <tr>
            <td>Cena</td>
            <td><input class="Iaddprod" type="number" name='product_price' /></td>
          </tr>
          <tr>
            <td>Opis</td>
            <td><input class="Iaddprod" type="text" name='product_description' /></td>
          </tr>
          <tr>
            <td>Dost??pno????/ilo????</td>
            <td><input class="Iaddprod" type="number" name='product_availability' /></td>
          </tr>
          <tr>
            <td>Kategoria</td>
            <td>
              <select name="product_category">
                <option value="Szampony">Szampon</option>
                <option value="Piany aktywne">Piany aktywne</option>
                <option value="Szczotki">Szczotki</option>
                <option value="G??bki">G??bki</option>
                <option value="Mikrofibry">Mikrofibry</option>
                <option value="Woski">Woski</option>
                <option value="Quick detailery">Quick detailery</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Zdj??cie</td>
            <td><input class="Iaddprod" type="text" name='image' /></td>
          </tr>
          <tr>
            <td colspan='2'>
              @if ($errors->any())
              @foreach ($errors->all() as $error)
              <div>{{$error}}</div>
              @endforeach
              @endif
              <input class="Iaddprodbut" type='submit' value="Dodaj produkt" />
            </td>
          </tr>
        </table>
      </form>
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

      function myAccFunc1() {
        var x = document.getElementById("demoAcc1");
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