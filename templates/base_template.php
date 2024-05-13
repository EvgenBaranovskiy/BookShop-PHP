<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/www/css/books.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/www/BookShop.ico">
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">BookShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/book/index" || $_SERVER['REQUEST_URI'] == "/" || $_SERVER['REQUEST_URI'] == "/book/page/1") ? "active" : "" ?>" aria-current="page" href="/book/page/1">Main page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/book/genres") ? "active" : "" ?>" href="/book/genres">Genres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=strpos($_SERVER['REQUEST_URI'], "/order/show") === 0 ? "active" : "" ?>" href="/order/show/1">Orders</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto" data-bs-theme="dark">
                    <?php if ($is_auth) { ?>
                        <li class="nav-item">
                            <span class="nav-link">Hello, <?= $user->Login ?>! (<?= $user->IsAdmin ? "Admin" : "Buyer" ?>)</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/logout">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/user/login") ? "active" : "" ?>" href="/user/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/user/registration") ? "active" : "" ?>" href="/user/registration">Registration</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!--Content-->
    <div class="container">
        <main role="main" class="pb-3">
            <?= $content ?>
        </main>
    </div>

    <!--Footer-->
    <footer class="border-top footer text-muted">
        <div class="container text-center">
            &copy; 2024 р. Барановський Є. О.
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>