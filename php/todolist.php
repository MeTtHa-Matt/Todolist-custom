<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="../css/style.css">
    <link rel="icon" type="image/png" href="/todolist/images/todolist_logo.png">
</head>
<body>
    <style>
        html {
            background-color:#ebebeb;
            min-height: 100vh;
        }
    </style>

    <header>

    <?php include "../includes/navbar.php"; ?>
    
    
    </header>

    <main>

    <style>
        main {
            background-color:#ebebeb;
        }
    </style>

    <?php 

    $filtre = $_GET['filtre'] ?? 'Tous';

    if ($filtre === 'Tous') {

        include "../includes/taskSorting.php"; 

    ?>

    <div class="p-4 fond" style="padding-top:160px !important;">
        <div class="d-flex gap-0">
            <div class="flex-grow-1">
                <?php include "../includes/taskstodo.php"?> 
            </div>

            <div class="flex-grow-1">
                <?php include "../includes/tasksindoing.php"?> 
            </div>

            <div class="flex-grow-1">
                <?php include "../includes/tasksdone.php"?> 
            </div>
        </div>
    </div>

    <?php 
    } elseif ($filtre==='Urgent') { 
        include "../includes/taskSorting.php"
    ?>

    <div class="p-4 fond" style="padding-top:160px !important;">
        <div class="d-flex gap-0">
            <div class="flex-grow-1">
                <?php include "../includes/tasksurgent.php"?> 
            </div>
        </div>
    </div>

    <?php
    } elseif ($filtre==='Retard') { 
        include "../includes/taskSorting.php"
    ?>

    <div class="p-4 fond" style="padding-top:160px !important;">
        <div class="d-flex gap-0">
            <div class="flex-grow-1">
                <?php include "../includes/taskslate.php"?> 
            </div>
        </div>
    </div>

    <?php 
    } elseif ($filtre==='Terminé') { 
        include "../includes/taskSorting.php"
    ?>

    <div class="p-4 fond" style="padding-top:160px !important;">
        <div class="d-flex gap-0">
            <div class="flex-grow-1">
                <?php include "../includes/tasksdone.php"?> 
            </div>
        </div>
    </div>


    <?php
    }
    ?>

        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/index.js"></script>
<script src="../js/modal.js"></script>
</main>
</body>
</html>