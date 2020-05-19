<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Toko Online">
    <meta name="author" content="Muhammad Arrafi">
    <title>{% block title %}{% endblock %} &bullet; Toko Online</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('/public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/public/assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet">


    {% block styles %}{% endblock %}

</head>
<body>

   <nav class="navbar navbar-expand navbar-dark bg-success static-top">

       <a class="navbar-brand mr-1" href="#">  <i style="color: white" class="fas fa-store" ></i> Toko Online</a>

          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <div class="form-inline ml-auto my-2 my-lg-0">
                        <a href="{{ url('/cart/detail')}}" class="btn btn-secondary my-2 my-sm-0"><i class="fas fa-shopping-cart"></i></a>
                    </div>
          </div>

   </nav>

    <main role="main" class="container">
        <div class="content">
            {% block content %}{% endblock %}
        </div>
    </main>

    <script src="{{ url('/public/assets/assets/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ url('/public/assets/assets/js/bootstrap.bundle.min.js') }}"></script>

    {% block scripts %}{% endblock %}
</body>
</html>


