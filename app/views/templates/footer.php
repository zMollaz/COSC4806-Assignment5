<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
    </style>
</head>
    <div class="content"></div>
    <footer class="bg-light text-center text-lg-start">
        <div class="container-fluid py-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 text-lg-start">
                    <h5 class="text-uppercase mb-0"><?php echo $_SESSION["username"]; ?></h5>
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 text-center">
                    <span>© 2024 MyApp. All rights reserved.</span>
                </div>
                <div class="col-lg-4 col-md-12 text-lg-end text-center">
                    <ul class="list-unstyled d-flex justify-content-lg-end justify-content-center mb-0">
                        <li class="me-3">
                            <a href="/" class="text-dark">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>