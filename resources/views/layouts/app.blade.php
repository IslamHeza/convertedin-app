<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convertedin App</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Convertedin App</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.create') }}">Create Task</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.index') }}">All Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('statistics.index') }}">Statistics</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page content -->
    @yield('content')

</body>
</html>
