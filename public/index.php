<?php

$loader = require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

use App\TaskRepository;

$repo = new TaskRepository;

if (isset($_REQUEST['task'])) {
    $repo->addTask($_REQUEST['task']);
}

$tasks = $repo->getTasks();
?>

<!DOCTYPE html>
<htmsl lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Todo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                Navbar
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="">Source</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="offset-md-2 col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <form class="" action="/" method="get">
                                <div class="form-group">
                                    <input type="text" name="task" value="" autofocus>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <li class="list-group">
                                <?php foreach ($tasks as $task) { ?>
                                    <ul class="list-group-item <?= $task['is_done'] ? 'active' : '' ?>">
                                        <?= htmlspecialchars($task['name']); ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
