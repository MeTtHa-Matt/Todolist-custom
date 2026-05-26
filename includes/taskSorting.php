<?php $filtre = $_GET['filtre'] ?? 'Tous'; ?>

<div class="flex-grow-1" style="margin-left: 220px;">
<nav class="navbar navbar-expand-lg" style="border-bottom:1px solid #dee2e6; position: fixed; top: 87px; left: 220px; right: 0; z-index: 1020; background: white;">
    <div class="container-fluid">
        <a class="navbar-brand text-wrap">Toutes les tâches</a>
        <div class="collapse navbar-collapse" id="navbar-nav">
            <ul class="navbar-nav gap-3 ms-auto">
                <li class="nav-item"><a class="btn rounded-pill btn-sm <?= $filtre === 'Tous' ? 'active btn-outline-dark' : 'btn-outline-secondary' ?>" href="?filtre=Tous">Tous</a></li>
                <li class="nav-item"><a class="btn rounded-pill btn-sm <?= $filtre === 'Urgent' ? 'active btn-outline-dark' : 'btn-outline-secondary' ?>" href="?filtre=Urgent">Urgent</a></li>
                <li class="nav-item"><a class="btn rounded-pill btn-sm <?= $filtre === 'Retard' ? 'active btn-outline-dark' : 'btn-outline-secondary' ?>" href="?filtre=Retard">Retard</a></li>
                <li class="nav-item"><a class="btn rounded-pill btn-sm <?= $filtre === 'Terminé' ? 'active btn-outline-dark' : 'btn-outline-secondary' ?>" href="?filtre=Terminé">Terminé</a></li>
            </ul>
        </div>
    </div>
</nav>
