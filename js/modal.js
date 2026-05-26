let currentTask = {};

document.querySelectorAll(".card[data-id]").forEach((card) => {
  card.addEventListener("click", () => {
    const id = card.getAttribute("data-id");

    fetch(`/todolist/includes/get-task.php?id=${id}`)
      .then((res) => res.json())
      .then((task) => {
        console.log("task recu:", task);
        currentTask = task;
        document.querySelector("#maModale .modal-header").innerHTML = `
            <div>
              <h5>${task.nom}</h5>
              <small>${task.cree_le}</small>
            </div>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          `;
        const couleur =
          task.priorite === "urgent"
            ? "bg-danger"
            : task.priorite === "normal"
              ? "bg-warning"
              : "bg-success";

        switch (task.priorite) {
          case 'bas':
            $priorite = '<span class="badge bg-success rounded-pill fs-6">🟢 Basse</span>';
            break;
          case 'normal':
            $priorite = '<span class="badge bg-warning rounded-pill fs-6">🟡 Normale</span>';
            break;
          case 'urgent':
            $priorite = '<span class="badge bg-danger rounded-pill fs-6">🔴 Urgente</span>'
        }

        document.querySelector("#maModale .modal-body").innerHTML = `
                    <div class="card rounded-4 bg-body-secondary text-muted border-0 border-start border-primary border-4">
                      <div class="card-body p-2 ps-3 pb-0 pt-2">
                        <small class="card-subtitle">💬 Commentaire</small>
                        <p class="card-title">${task.commentaire ?? "Aucun"}</p>
                      </div>
                    </div>
                    <br>
                    <div class="d-flex gap-2" style="margin-top:-15px;">
                      <div class="card rounded-4 bg-body-secondary text-muted border-0 border-start flex-fill w-50">
                        <div class="card-body p-2 ps-3 pb-2 pt-2">
                          <small>🏳️ Priorité</small><br>
                          ${$priorite}
                        </div>
                      </div>
                      <div class="card rounded-4 bg-body-secondary text-muted border-0 border-start flex-fill w-50">
                        <div class="card-body p-2 ps-3 pb-2 pt-2">
                          <small>▶ Statut</small><br>
                          ${(() => {
                            if (task.etat_d_avancement === 100) return '<span class="badge bg-success rounded-pill fs-6">✅ Terminée</span>';
                            if (task.en_cours == 1) return '<span class="badge bg-warning rounded-pill fs-6">⏳ En cours</span>';
                            return '<span class="badge bg-secondary rounded-pill fs-6">🔘 Non commencée</span>';
                          })()}
                        </div>
                      </div>                      
                    </div>
                    <br>
                    <div class="d-flex gap-2" style="margin-top:-15px;">
                      <div class="card rounded-4 bg-body-secondary text-muted border-0 border-start flex-fill w-50">
                        <div class="card-body p-2 ps-3 pb-0 pt-3">
                          <small>📅 Échéance :</small><br>
                          <p class="text-danger fw-bold";>${new Date(task.due_date).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' })}</p>
                        </div>
                      </div>
                      <div class="card rounded-4 bg-body-secondary text-muted border-0 border-start flex-fill w-50">
                        <div class="card-body p-2 ps-3 pb-0 pt-3">
                          <small>🕓 Créée le</small><br>
                          <p>${(() => {
                            const d = new Date(task.cree_le);
                            const date = d.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' });
                            const heure = task.cree_le.slice(11, 16);
                            return `${date} à ${heure}`;
                          })()}</p>
                        </div>
                      </div>                      
                    </div>
                    <br>
                    <div class="card rounded-4 border-0 border-start border-4 border-primary bg-body-secondary">
                    <div class="card-body px-3 py-3">

                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted fw-semibold text-uppercase" style="font-size:.7rem; letter-spacing:.06em;">
                          🏆 Avancement
                        </small>
                        <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold" style="font-size:.75rem;">
                          ${task.etat_d_avancement}%
                        </span>
                      </div>

                      <div class="progress rounded-pill" style="height:7px;">
                        <div class="progress-bar ${couleur} rounded-pill"
                            role="progressbar"
                            style="width: ${task.etat_d_avancement}%;"
                            aria-valuenow="${task.etat_d_avancement}"
                            aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                      </div>

                      <div class="d-flex justify-content-between mt-1">
                        <small class="text-muted" style="font-size:.65rem;">0%</small>
                        <small class="text-muted" style="font-size:.65rem;">50%</small>
                        <small class="text-muted" style="font-size:.65rem;">100%</small>
                      </div>

                    </div>
                  </div>              
                `;

        if (task.etat_d_avancement !== 100){
          document.querySelector("#maModale .modal-footer").innerHTML = `
            <div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#suppression">Supprimer</button>
            <button onclick="editTask()" class="btn btn-primary">Modifier</button>
            </div>
            <div>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#updateAvancement">Modifier l'avancement</button>
            <button onclick="FinishTask()" class="btn btn-success">Terminer</button>
            </div>
          `;
        } else {
            document.querySelector("#maModale .modal-footer").innerHTML = `
            <div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#suppression">Supprimer</button>
            <button onclick="editTask()" class="btn btn-primary">Modifier</button>
            </div>
          `;
        }
      });
  });
});
