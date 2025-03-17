// const toggleButtons = document.querySelectorAll('.toggle-btn');
//     toggleButtons.forEach(button => {
//         button.addEventListener('click', () => {button.classList.toggle('active');});
// });

const toggleButtons = document.querySelectorAll('.toggle-btn');

toggleButtons.forEach(button => {
    button.addEventListener('click', () => {
        e.preventDefault(); 
        button.classList.toggle('active');
    });
});

//confirmar ativação/desativação do guichê
function confirmarAtivarInativar(idGuiche) {
    if (confirm("Tem certeza de que deseja ativar/desativar este guichê?")) {
        window.location.href = './ativar-inativar_guiche.php?id_guiche=' + idGuiche;
    }
}

document.addEventListener('DOMContentLoaded', function () {
    
    const buttons = document.querySelectorAll('[data-bs-toggle="modal"]');
    
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const guicheId = this.getAttribute('data-guiche-id');
            const confirmButton = document.getElementById('confirmButton');
            // Modifica o href do botão de confirmação com o ID do guichê
            confirmButton.href = './index.php?id_guiche=' + guicheId;
        });
    });
});


//confirmar exclusão do guichê
function confirmarExclusao(idGuiche) {
    if (confirm("Tem certeza de que deseja excluir este guichê?")) {
        window.location.href = './excluir_guiche.php?id_guiche=' + idGuiche;
    }
}