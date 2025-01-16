<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- On appelle la section title créée dans les vues -->
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg"  data-bs-theme="dark" style="background-color: RoyalBlue;">
        <div class="container">
          <a class="navbar-brand" href="/blogs/">Blog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/blogs/') }}">Accueil</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/blogs/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Blogs
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/blogs/">Liste</a></li>
                  <li><a class="dropdown-item" href="/blogs/create">Ajouter un blog</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/categories" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Catégories
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/categories">Liste</a></li>
                  <li><a class="dropdown-item" href="/categories/create">Ajouter une catégorie</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('contact') }}">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
    <main class="container border my-5 p-3">
        <!-- On appelle la section content créée dans les vues -->
        @yield('content')
    </main>

    <footer class="text-white p-3 fixed-bottom" style="background-color: RoyalBlue;">
        <div class="container">
            <p>&copy 2025 - Entreprise</p>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>