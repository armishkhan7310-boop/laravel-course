<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Student Management System</a>

        <div class="navbar-nav">
            <a class="nav-link" href="/home">Home</a>
            <a class="nav-link" href="/students">Students</a>
            <a class="nav-link" href="/contact">Contact</a>
        </div>
    </div>
</nav>

    @yield('content')

</div>

</body>
</html>