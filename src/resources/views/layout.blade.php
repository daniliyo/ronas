<!Doctype HTML>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
        <section class="vh-100">
        <div class="container py-5 h-100">

<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="col-md-8 col-lg-6 col-xl-4">
  @include('forms.search')

  @yield('content')

</div>
</div>
</div>
        </section>
    </body>

</html>
