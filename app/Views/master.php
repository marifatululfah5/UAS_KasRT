<?php

use Config\Services;

$request = Services::request();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <title>Kas RT | <?= $title ?></title>
</head>

<body class="d-flex vh-100 flex-column">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">Kas RT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $request->uri->getSegment(1) == '' ? 'active' : '' ?>" aria-current="page" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $request->uri->getSegment(1) == 'warga' ? 'active' : '' ?>" href="<?= base_url() ?>/warga">Warga</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= $request->uri->getSegment(1) == 'kas' ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url() ?>/kas/transaksi">Transaksi Kas</a></li>
                            <li><a class="dropdown-item" href="<?= base_url() ?>/kas/laporan-kas">Laporan Kas</a></li>
                        </ul>
                    </li>
                    <?php if (session()->logged_in) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url() ?>/logout">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url() ?>/login">Login</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php if (isset(session()->success)) : ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <div class="text-center"><?= session()->success ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif (isset(session()->error)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="text-center"><?= session()->error ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>


    <div class="container py-3">
        <?= $this->renderSection("content"); ?>
    </div>

    <footer class="bg-success text-white mt-auto py-2">
        <p class="text-center my-auto">Kas RT @Marifatul Ulfah - 311910577</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>

</html>