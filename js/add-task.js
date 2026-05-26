async function AddTask() {
    const nom = document.getElementById('nom').value;
    const commentaire = document.getElementById('commentaire').value;
    const priorite = document.getElementById('priorite').value;
    const due_date = document.getElementById('due_date').value;

    const response = await fetch('../includes/addtask.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ nom, commentaire, priorite, due_date})
    });

    const result = await response.json()

        if (result.success) {
        location.reload();
    } else {
        alert('Erreur : ' + result.message);
    }
}

function editTask() {
  const seetaskid = document.getElementById("maModale");
  const newtaskid = document.getElementById("modifytask");

  seetaskid.addEventListener("hidden.bs.modal", () => {
    document.getElementById("edit-id").value = currentTask.id; 
    document.getElementById("edit-nom").value = currentTask.nom;
    document.getElementById("edit-commentaire").value = currentTask.commentaire ?? "";
    document.getElementById("edit-priorite").value = currentTask.priorite;
    document.getElementById("edit-due_date").value = currentTask.due_date;

    bootstrap.Modal.getOrCreateInstance(newtaskid).show();
  }, { once: true });

  bootstrap.Modal.getInstance(seetaskid).hide();
}

async function ModifyTask() {
    const id = document.getElementById('edit-id').value;
    const nom = document.getElementById('edit-nom').value;
    const commentaire = document.getElementById('edit-commentaire').value;
    const priorite = document.getElementById('edit-priorite').value;
    const due_date = document.getElementById('edit-due_date').value;

    console.log('currentTask:', id);

    const response = await fetch('../includes/modify-task.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id, nom, commentaire, priorite, due_date })
    });

    const result = await response.json();

    if (result.success) {
        location.reload();
    } else {
        alert('Erreur : ' + result.message);
    }
}

async function DeleteTask(){
    const seetaskid = document.getElementById("maModale");
    const id = currentTask.id;
    const nom = document.getElementById('edit-nom').value;

    const response = await fetch('../includes/delete-task.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify({ id, nom })
    });

    const result = await response.json();

    if (result.success) {
        location.reload();
    } else {
        alert('Erreur : ' + result.message);
    }
}

async function FinishTask(){
    const seetaskid = document.getElementById("maModale");
    const id = currentTask.id;

    const response = await fetch('../includes/finishtask.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify({id: id}),
    });

    const result = await response.json();

    if (result.success) {
        location.reload();
    } else {
        alert('Erreur : ' + result.message);
    }
}

async function updatePosition(){
    const slider = document.getElementById('avancement-slider');
    const val = slider.value;

    const response = await fetch('../includes/updateposition.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify({id: currentTask.id, avancement:val})
    });

    const result = await response.json();

    if (result.success) {
        location.reload();
    } else {
        alert('Erreur lors de la sauvegarde.');
    }
}