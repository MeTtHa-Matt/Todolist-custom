<?php

include "db.php";

?>

<div class="modal fade" id="maModale">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-header d-flex justify-content-between align-items-start flex-wrap">
                
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer d-flex justify-content-between">
                
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modifytask" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Ajouter une nouvelle tâche :</h5>
            </div>

            <div class="modal-body">
                <input type="hidden" id="edit-id">
                <div class="row g-3">
                    <div class="col-12">
                        <label>Nom : <span style="color:red; font-weight:bold;">*</span></label>
                        <input class="form-control" id="edit-nom" placeholder="Nom de la tâche" required>
                    </div>
                    <div class="col-12">
                        <label>Commentaire : </label>
                        <input class="form-control" id="edit-commentaire" placeholder="Commentaire de la tâche">
                    </div>
                    <div class="col-12">
                        <label>Priorité : <span style="color:red; font-weight:bold;">*</span></label>
                        <select class="form-select" id="edit-priorite" required>
                            <option value="" disabled selected>-- Niveau de priorité --</option>
                            <option value="bas">Bas</option>
                            <option value="normal">Normal</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="col-12 row" style="padding-left:30px;padding-top:10px;">
                        <label>Date de rendu : <span style="color:red; font-weight:bold;">*</span></label>
                        <input type="date" id="edit-due_date" required>
                    </div>
                        
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="bootstrap.Modal.getInstance(document.getElementById('modifytask')).hide()">Annuler</button>
                    <button onclick="ModifyTask()" class="btn btn-primary">Confirmer</button>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="suppression">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <p>Voulez-vous vraiment supprimer cette tâche ?</p>
                <small>Attention cette action est irréversible !</small>
            </div>
            <div class="modal-footer d-flex justify-content-between">
            <button onclick="bootstrap.Modal.getInstance(document.getElementById('suppression')).hide()" class="btn btn-secondary">Annuler</button> 
            <button onclick="DeleteTask()" class="btn btn-danger">Confirmer la suppression</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateAvancement">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <div class="card rounded-4 p-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="fw-bold">🏆 Avancement</small>
                        <span id="percent-badge" class="badge bg-light text-dark border">9%</span>
                    </div>
                    <div style="position: relative; margin: 10px 0 4px;">
                        <div id="bubble" style="
                            position: absolute; top: -34px; transform: translateX(-50%);
                            background: var(--bubble-color, #dc3545); color: #fff;
                            font-size: 12px; font-weight: 500; padding: 2px 7px;
                            border-radius: 12px; pointer-events: none; white-space: nowrap;
                            transition: left 0.05s, background 0.2s;
                        "></div>
                        <input type="range" min="0" max="100" step="1" id="avancement-slider" style="width:100%; height:6px; -webkit-appearance:none; appearance:none; border-radius:4px; outline:none; cursor:pointer;">
                    </div>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">0%</small>
                        <small class="text-muted">50%</small>
                        <small class="text-muted">100%</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button onclick="bootstrap.Modal.getInstance(document.getElementById('updateAvancement')).hide()" class="btn btn-secondary">Annuler</button>
                <button onclick="updatePosition()" class="btn btn-success">Modifier l'avancement</button>
            </div>
        </div>
    </div>
</div>

<script src="../js/getposition.js"></script>
<script>
  document.getElementById('updateAvancement').addEventListener('shown.bs.modal', function () {
    initAvancementSlider(currentTask.id);
  });
</script>