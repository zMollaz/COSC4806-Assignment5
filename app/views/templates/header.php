<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: /login');
    exit();
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSC 4806</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="/favicon.png">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">COSC 4806</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/reminders">Reminders</a>
                    </li>
                    <?php
                        if (strtolower($_SESSION['username']) == 'admin') {  
                            echo '<li class="nav-item">
                                <a class="nav-link" href="/reports">Reports</a>
                            </li>';
                        }
                    ?>
                </ul>
                <div class="d-flex align-items-center">
                    <p class="text-white mb-0 me-3">Today is <?php echo date("l jS \of F Y"); ?></p>
                    <a href="/logout" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
                <?php if ($_SESSION['controller'] == 'home'): ?>
                    <li class="breadcrumb-item active" aria-current="page">Home /</li>
                <?php else: ?>
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo ucwords($_SESSION["controller"]); ?></li>
                <?php endif; ?>
            </ol>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>