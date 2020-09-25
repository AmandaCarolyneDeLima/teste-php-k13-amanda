<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Amanda</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ url("img/CSicone.png") }}" type="image/x-icon" />

    <!-- Fonts and icons -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet"
        type="text/css">
    <script src="{{ url('js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Montserrat:100,200,300,400,500,600,700,800,900"]
            },
            custom: {
                "families": ["Flaticon", "LineAwesome"],
                urls: ["{{ url('css/fonts.css') }}"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });

    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ url("css/ready.min.css") }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ url("css/demo.css") }}">

    <!-- Autentificação para todos os ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header">
                <!--
					Tip 1: You can change the background color of the logo header using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
				-->

            </div>
            <!-- End Logo Header -->

        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <!--
				Tip 1: You can change the background color of the sidebar using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
				Tip 2: you can also add an image using data-image attribute
			-->
            <div class="sidebar-background"></div>
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="photo">
                            <img src="{{ url("img/profile.jpg") }}" alt="Img Profile"
                                class="img-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <b class="mt-2">{{ Auth::user()->name }}</b>

                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href='{{ url("/user/profile") }}'>Meu
                                        Perfil</a>
                                    <a class="dropdown-item"
                                        href='{{ url("/user/edit_profile") }}'>Editar Perfil</a>
                                    <li>
									<div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
                                            <i class="flaticon-arrow"></i>
                                            {{ __('Sair') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <ul class="nav">
                        <li class="nav-item active">
                            <a href="{{ url("/") }}">
                                <i class="flaticon-home"></i>
                                <p>Início</p>
                            </a>
                        </li>

                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="la la-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Utilitários</h4>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#cadast">
                                <i class="flaticon-agenda-1"></i>
                                <p>Novas Notícias</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="cadast">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a class="collapse-item"
                                            href="{{ url('/noticias/new') }}">
                                            <span class="sub-item">Adicionar Notícias</span>
                                        </a>
                                    </li>
									<li>
                                        <a class="collapse-item"
                                            href="{{ url('/noticias/') }}">
                                            <span class="sub-item">Ver Notícias</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">


                        <li>
                            <footer class="sticky-footer mt-2" style="color:black">
                                <hr>
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <span>Copyright &copy; Amanda 2020</span>
                                    </div>
                                    <br>


                                </div>
                            </footer>

                        </li>
                    </ul>

                </div>

            </div>

        </div>
        <!-- End Sidebar -->

        @yield('content')

    </div>
    <!--   Core JS Files   -->
    <script src="{{ url("js/core/jquery.3.2.1.min.js") }}"></script>
    <script src="{{ url("js/core/popper.min.js") }}"></script>
    <script src="{{ url("js/core/bootstrap.min.js") }}"></script>

    <!-- jQuery UI -->
    <script src="{{ url("js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js") }}"></script>
    <script src="{{ url("js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js") }}">
    </script>

    <!-- jQuery Scrollbar -->
    <script src="{{ url("js/plugin/jquery-scrollbar/jquery.scrollbar.min.js") }}"></script>

	
</body>

</html>
