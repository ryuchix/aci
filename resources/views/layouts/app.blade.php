<!doctype html>

<html lang="en">

@include('snippets.header')

<body class="dark-edition">

    <div class="wrapper ">

        <div class="sidebar" data-color="orange" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
        <!--  
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
            Tip 2: you can also add an image using data-image tag 
        -->
        <div class="logo">

            <a href="http://www.creative-tim.com" class="simple-text logo-normal">

              {{ config('app.name', 'Laravel') }}

            </a>

        </div>

        @include('snippets.sidebar')

        </div>

        <div class="main-panel">
     
            @include('snippets.navbar')

            <div class="content">

                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>

            @include('snippets.footer')

        </div>
    </div>

@include('snippets.script')

</body>

</html>