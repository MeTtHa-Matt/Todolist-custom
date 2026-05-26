<?php

include "db.php";

$count = $pdo->query("SELECT COUNT(id) FROM todo WHERE etat_d_avancement != 100 AND en_cours = 1")->fetchColumn();

?>

<h6 style="color:grey; margin:10px;">
    EN COURS :
    <span style="background-color:lightgrey; color:grey; border-radius:50%; padding: 2px 7px; ">
        <?= $count ?>
    </span>
</h6>
<?php


$mois = ['01'=>'janvier','02'=>'février','03'=>'mars','04'=>'avril','05'=>'mai','06'=>'juin','07'=>'juillet','08'=>'août','09'=>'septembre','10'=>'octobre','11'=>'novembre','12'=>'décembre'];

$stmt = $pdo->query("SELECT id, nom, priorite, due_date, en_cours, etat_d_avancement FROM todo");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($tasks as $task):
    if($task['etat_d_avancement']===100) {
        $stmt = $pdo->prepare("UPDATE todo SET en_cours=0 WHERE etat_d_avancement=100");
        $stmt->execute();
    }

    if($task['en_cours']===1) {
?>

<div class="flex-grow-1 p-2">
    <div class="card" data-bs-toggle="modal" data-bs-target="#maModale" data-id="<?= $task['id'] ?>" style="cursor:pointer;">
        <p class="card-text" style="margin-left:15px; margin-top:15px;"><?php echo $task['nom']; ?></p>
        <div class="d-flex align-items-center gap-2" style="margin-left:15px; margin-bottom:10px;">
            <?php
            $couleur = match($task['priorite']) {
                'bas' => 'bg-success text-success',
                'normal' => 'bg-warning text-warning',
                'urgent' => 'bg-danger text-danger'
            };
            ?>
            <span class="<?= $couleur ?> bg-opacity-25 text-opacity-100" style=" font-weight:500; padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; flex-shrink:0;"><?= $task['priorite'] ?></span>
            <p class="p-2 ms-auto me-3" style="color:grey; font-size:0.85rem; margin-bottom: -0.5rem;">📅
                <?php 
                    $date = $task['due_date'];
                    [$annee, $m, $jour] = explode('-', $date);
                    echo $jour . ' ' . $mois[$m];
                ?>
            </p>
        </div>
        <div class="progress mx-3 mb-3" style="height: 5px;">
            <div class="progress-bar <?= $couleur ?>" style="width: <?= $task['etat_d_avancement']?>%;"></div>
        </div>
    </div> 
</div>

<?php 
    };
    endforeach; 
?>

<div class="flex-grow-1 p-2 d-grid">
    <button onclick="bootstrap.Modal.getOrCreateInstance(document.getElementById('newtask')).show()" data-bs-target="#newtask" class="btn btn-light opacity-75" >+ Ajouter</button>
</div>


<?php include "view-task.php" ?>
