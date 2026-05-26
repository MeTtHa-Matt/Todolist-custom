<nav class="navbar navbar-expand-lg" style="border-bottom:1px solid #dee2e6; z-index:1020; background: white; position:fixed; top: 0; left: 0; right: 0;">
    <div class="container-fluid">
        <a class="navbar-brand py-0 px-3 ps-4" href="/todolist/index.php"><img src="/todolist/images/todo_logo.png" alt="My Tasks" height="75"></a>
        <div class="collapse navbar-collapse" id="navbar-nav">
            <ul class="navbar-nav gap-3 me-auto">
                <li class="nav-item"><a class="btn nav-link nb" href="/todolist/php/todolist.php">📝 Tableau</a></li>
                <li class="nav-item"><a class="btn nav-link nb" href="/todolist/php/list.php">📋 Liste</a></li>
                <li class="nav-item"><a class="btn nav-link nb" href="/todolist/php/calendar.php">📅 Calendrier</a></li>
                <li class="nav-item"><a class="btn nav-link nb" href="/todolist/php/statistics.php">✅ Stats</a></li>
            </ul>
        </div>
        <form role="search" class="input-group-sm">
            <input type="text" class="form-control" placeholder="🔎 Rechercher">
        </form>
        <button class="btn btn-dark" style="margin-left:10px;" onclick="bootstrap.Modal.getOrCreateInstance(document.getElementById('newtask')).show()" data-bs-target="#newtask">+ Nouvelle tâche</button>
    </div>
</nav>

<div class="d-flex">
    <div class="sidebar d-flex flex-column p-3 py-4 flex-shrink-0" style="width: 220px; border-right: 1px solid #dee2e6; position: fixed; top: 86px; height: calc(100vh - 86px); overflow-y: auto; background-color:white;">
        <ul class="nav flex-column gap-1 mb-5">
            <li class="nav-item"><a class="btn nav-link nb text-dark rounded" style="text-align:left;" href="/todolist/php/todolist.php">📝 Tableau</a></li>
            <li class="nav-item"><a class="btn nav-link nb text-dark rounded" style="text-align:left;" href="/todolist/php/list.php">📋 Liste</a></li>
            <li class="nav-item"><a class="btn nav-link nb text-dark rounded" style="text-align:left;" href="/todolist/php/calendar.php">📅 Calendrier</a></li>
            <li class="nav-item"><a class="btn nav-link nb text-dark rounded" style="text-align:left;" href="/todolist/php/statistics.php">✅ Stats</a></li>
        </ul>
        <p class="text-uppercase text-muted small fw-semibold mb-2">Projets</p>
        <ul class="nav flex-column gap-1">
            <li class="nav-item"><a class="nav-link nb text-dark rounded d-flex align-items-center gap-2" href="#"><span style="width:10px;height:10px;border-radius:50%;background:#0d6efd;display:inline-block;"></span>Dev perso</a></li>
            <li class="nav-item"><a class="nav-link nb text-dark rounded d-flex align-items-center gap-2" href="#"><span style="width:10px;height:10px;border-radius:50%;background:#198754;display:inline-block;"></span>Maison</a></li>
            <li class="nav-item"><a class="nav-link nb text-dark rounded d-flex align-items-center gap-2" href="#"><span style="width:10px;height:10px;border-radius:50%;background:#ffc107;display:inline-block;"></span>Freelance</a></li>
            <li class="nav-item"><a class="nav-link nb text-dark rounded d-flex align-items-center gap-2" href="#"><span style="width:10px;height:10px;border-radius:50%;background:#dc3545;display:inline-block;"></span>Études</a></li>
        </ul>
        <div class="mt-auto">
            <a class="nav-link nb text-dark rounded" href="#">⚙️ Paramètres</a>
        </div>
    </div>

<?php include "add-task.php" ?>
