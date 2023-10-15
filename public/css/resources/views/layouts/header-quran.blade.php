<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <link
      rel="shortcut icon"
      href="{{url ('storage/logors.png')}}"
      type="image/x-icon"
    />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- RTL -->


  <!-- icon bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="{{asset('css/font.css')}}" />

</head>

<body>
  <!-- jumbotron -->
  <section class="jumbotron text-center bg-success">
    <h1 class="display-4 pt-5 text-white fw-bold"><a href="/quran" class="link-light text-decoration-none">AL - QURAN DIGITAL</a></h1>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#FFFFFF" fill-opacity="1" d="M0,224L80,197.3C160,171,320,117,480,112C640,107,800,149,960,154.7C1120,160,1280,128,1360,112L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
    </svg>
  </section>
  <!-- akhir jumbotron -->
  @yield('content')


  <footer class="text-center text-white bg-success p-3">
    <p>Created by <i class="bi bi-suit-heart-fill"></i> Agung Setio Budi </p>
  </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>