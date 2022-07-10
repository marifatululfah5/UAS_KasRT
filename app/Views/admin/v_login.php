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

<body style="background-color: #e3ffbd;">
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
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <form action="<?= base_url() ?>/admin/proses_login" method="post">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="my-2 text-center">Login</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" name="admin_name" class="form-control" placeholder="Masukan Username" required>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="admin_password" class="form-control" placeholder="Masukan Password" required>
                            </div>
                        </div>

                        <button class="btn btn-primary w-75 mx-auto mb-3" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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