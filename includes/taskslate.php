<?php 

include "db.php";

$filter = $_GET['tri'] ?? 'moreretard';

$stmt = $pdo->query("SELECT COUNT(id) FROM todo WHERE due_date < CURDATE() AND etat_d_avancement != 100;");
$count = $stmt->fetchColumn();
?>

<h6 class="d-flex align-items-center" style="color:grey; margin:10px">
    RETARD : 
    <span style="background-color:lightgrey; color:grey; border-radius:50%; width:22px; height:22px; display:inline-flex; align-items:center; justify-content:center; margin-left:3px;"> 
        <?= $count; ?>
    </span>
    <span class="ms-auto me-3">
        <a class="btn rounded-pill btn-sm <?= $filter === 'lessretard' ? 'active btn-outline-dark' : 'btn-outline-secondary' ?>" href="?filtre=Retard&tri=lessretard">Les moins en retard</a>
        <a class="btn rounded-pill btn-sm <?= $filter === 'moreretard' ? 'active btn-outline-dark' : 'btn-outline-secondary' ?>" href="?filtre=Retard&tri=moreretard">Les plus en retard</a>
    </span>
</h6>

<?php

if ($count!==0 && $filter === 'moreretard') {

$mois = ['01'=>'janvier','02'=>'février','03'=>'mars','04'=>'avril','05'=>'mai','06'=>'juin','07'=>'juillet','08'=>'août','09'=>'septembre','10'=>'octobre','11'=>'novembre','12'=>'décembre'];

$stmt = $pdo->query("SELECT id, nom, commentaire, priorite, due_date, etat_d_avancement FROM todo WHERE due_date < CURDATE() AND etat_d_avancement != 100 ORDER BY due_date");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($tasks as $task):

    $couleur = match($task['priorite']) {
                        'bas' => 'bg-success text-success',
                        'normal' => 'bg-warning text-warning',
                        'urgent' => 'bg-danger text-danger',
                    };
?>

<div class="flex-grow-1 p-2">
    <div class="card" data-bs-toggle="modal" data-bs-target="#maModale" data-id="<?= $task['id'] ?>" style="cursor:pointer;">
        <p class="card-text" style="margin-left:15px; margin-top:15px;"><?php echo $task['nom']; ?></p>
        <div class="d-flex align-items-center gap-2" style="margin-left:15px; margin-bottom:10px;">
            <span class="<?=$couleur?> bg-opacity-25 text-opacity-100" style="background-color:#fff0f0; color:#dc3545; font-weight:500; padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; flex-shrink:0;"><?= $task['priorite'] ?></span>
            <p class="p-2 ms-auto me-3" style="color:grey; font-size:0.85rem; margin-bottom: -0.5rem;">
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
endforeach; 

include "view-task.php" ;

}
?>
