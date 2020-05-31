<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>{% block title %}{% endblock %} &bullet; Toko Online</title>

<link href="{{ url('/public/assets/images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="{{ url('/public/assets/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="{{ url('/public/assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<link href="{{ url('/public/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="{{ url('/public/assets/fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="{{ url('/public/assets/css/ui.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ url('/public/assets/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- custom javascript -->
<script src="{{ url('/public/assets/js/script.js') }}" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

});
// jquery end
</script>
{% block styles %}{% endblock %}
</head>
<body>

   <header class="section-header">

   <section class="header-main border-bottom">
   	<div class="container">
   <div class="row align-items-center">
   	<div class="col-lg-2 col-4">
   		<a href="#" class="brand-wrap">
   			<img class="logo" src="{{ url('/public/assets/images/logo.png') }}">
   		</a> <!-- brand-wrap.// -->
   	</div>
   	<div class="col-lg-6 col-sm-12">
   		<form action="#" class="search">
   			<div class="input-group w-100">
   			    <input type="text" class="form-control" placeholder="Search">
   			    <div class="input-group-append">
   			      <button class="btn btn-primary" type="submit">
   			        <i class="fa fa-search"></i>
   			      </button>
   			    </div>
   		    </div>
   		</form> <!-- search-wrap .end// -->
   	</div> <!-- col.// -->
   	<div class="col-lg-4 col-sm-6 col-12">
   		<div class="widgets-wrap float-md-right">
   			<div class="widget-header  mr-3">
   				<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
   				<span class="badge badge-pill badge-danger notify">0</span>
   			</div>
   			<div class="widget-header icontext">
   				<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
   				<div class="text">
   					<span class="text-muted">Welcome!</span>
   					<div>
   						<a href="#">Sign in</a> |
   						<a href="#  "> Register</a>
   					</div>
   				</div>
   			</div>

   		</div> <!-- widgets-wrap.// -->
   	</div> <!-- col.// -->
   </div> <!-- row.// -->
   	</div> <!-- container.// -->
   </section> <!-- header-main .// -->
   </header> <!-- section-header.// -->


    <main role="main" class="container">
        <div class="content">
            {% block content %}{% endblock %}

        </div>
    </main>



    {% block scripts %}{% endblock %}
</body>
<!-- ========================= FOOTER ========================= -->

<footer class="section-footer border-top padding-y">
	<div class="container">
		<p class="float-md-right">
			&copy Copyright 2019 All rights reserved
		</p>
		<p>
			<a href="#">Terms and conditions</a>
		</p>
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->

</html>


