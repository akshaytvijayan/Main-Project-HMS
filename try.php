<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webpage with Sidebar and Top Bar</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Top Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Top Bar</a>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar bg-light" style="height: calc(100vh - 56px);"><!-- Adjusted height for top bar -->
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="#">Sidebar Link 1</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Sidebar Link 2</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Sidebar Link 3</a></li>
            <!-- Add more sidebar links as needed -->
        </ul>
    </div>

    <!-- Content Section -->
    <div class="content container-fluid" style="margin-top: 56px;"> <!-- Adjusted margin-top for top bar -->
        <div class="row" style="height: calc(100vh - 56px);"><!-- Adjusted height for top bar -->
            <div class="col">
                <h1>Main Content Section</h1>
                <p>This is the main content area of your webpage. You can add text, images, videos, etc. here.</p>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
