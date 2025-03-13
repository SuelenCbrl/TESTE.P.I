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
        window.location.href = './inativar_guiche.php?id_guiche=' + idGuiche;
    }
}

//confirmar exclusão do guichê
function confirmarExclusao(idGuiche) {
    if (confirm("Tem certeza de que deseja excluir este guichê?")) {
        window.location.href = './excluir_guiche.php?id_guiche=' + idGuiche;
    }
}
