document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById('loginForm');
    const msgErro = document.getElementById('mensagemErro');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch('/api/use-cases/auth/login.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            msgErro.textContent = '';

            if (data.success) {
                window.location.href = 'http://localhost:8000/admin.php';
            } else {
                msgErro.textContent = data.message || 'Erro ao fazer login.';
            }
        } catch (err) {
            console.error(err);
            msgErro.textContent = 'Erro inesperado ao conectar com o servidor.';
        }
    });
});