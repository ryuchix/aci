<!doctype html>

<html lang="en">

@include('snippets.header')

<body class="dark-edition">

    <div class="wrapper ">

                <div class="container-fluid">

                    @yield('content')

                </div>
        
    </div>

	@include('snippets.script')

</body>

</html>