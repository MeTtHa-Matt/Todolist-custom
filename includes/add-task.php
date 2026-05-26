<?php

include "db.php";

?>

<div class="modal fade" id="newtask" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Ajouter une nouvelle tâche :</h5>
            </div>

            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label>Nom : <span style="color:red; font-weight:bold;">*</span></label>
                        <input class="form-control" id="nom" placeholder="Nom de la tâche" required>
                    </div>
                    <div class="col-12">
                        <label>Commentaire :</label>
                        <input class="form-control" id="commentaire" placeholder="Commentaire de la tâche">
                    </div>
                    <div class="col-12">
                        <label>Priorité : <span style="color:red; font-weight:bold;">*</span></label>
                        <select class="form-select" id="priorite" required>
                            <option value="" disabled selected>-- Niveau de priorité --</option>
                            <option value="1">Bas</option>
                            <option value="2">Normal</option>
                            <option value="3">Urgent</option>
                        </select>
                    </div>
                    <div class="col-12 row" style="padding-left:30px;padding-top:10px;">
                        <label style="padding-bottom:O;">Date de rendu : <span style="color:red; font-weight:bold;">*</span></label>
                        <input type="date" id="due_date" required>
                    </div>
                        
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="bootstrap.Modal.getInstance(document.getElementById('newtask')).hide()">Annuler</button>
                    <button onclick="AddTask()" class="btn btn-primary">Confirmer</button>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="../js/add-task.js"></script>