document.addEventListener('DOMContentLoaded', () => {
    // Função para abrir o modal de confirmação ao alternar o estado do guichê
    const toggleGuicheState = (guicheId, estado) => {
        // Preenche os campos ocultos no formulário do modal com o ID do guichê e o estado
        document.getElementById('guicheId').value = guicheId;
        document.getElementById('guicheEstado').value = estado;
        
        // Exibe o modal de confirmação
        new bootstrap.Modal(document.getElementById('confirmModal')).show();
    };

    // Adiciona o evento de 'change' nos botões de toggle (ativar/desativar)
    document.querySelectorAll('.toggle-btn').forEach(button => {
        button.addEventListener('change', function () {
            const guicheId = this.getAttribute('data-guiche-id');
            const estado = this.checked ? 'ATIVO' : 'INATIVO';
            toggleGuicheState(guicheId, estado);
        });
    });

    // Atualiza o botão de confirmação do modal com o ID do guichê
    document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
        button.addEventListener('click', function () {
            const guicheId = this.getAttribute('data-guiche-id');
            const confirmButton = document.getElementById('confirmButton');
            confirmButton.href = `./teste-index.php?id_guiche=${guicheId}`;
        });
    });
});
