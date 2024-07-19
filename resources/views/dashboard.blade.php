<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
<body>
    
<main>

@include('layout/sidebar')

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-2 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
  </header>
  <!-- <div class="container py-6"> -->

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    
  
    <!-- <header class="pb-3 mb-4 border-bottom">
        <div class="row">
            <div class="col-md-11">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="https://www.itsolutionstuff.com/assets/images/logo-it-2.png" alt="BootstrapBrain Logo" width="300">
                </a>          
            </div>
            <div class="col-md-1">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }} </a>   

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
      
    </header> -->

    

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">

        @session('success')
            <div class="alert alert-success" role="alert"> 
              {{ $value }}
            </div>
        @endsession

        <h1 class="display-5 fw-bold">Hi, {{ auth()->user()->name }}</h1>
        <p class="col-md-8 fs-4">Welcome to dashboard.<br/></p>

      </div>
    </div>

  </div>
</main>

</body>
</html>