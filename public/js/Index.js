
function Iniciar_ocult() {
    document.getElementById('Iniciar-ocult').style.display = 'flex';
    document.getElementById('Registrar-ocult').style.display = 'none';
}
function Registrar_ocult() {
    document.getElementById('Registrar-ocult').style.display = 'flex';
    document.getElementById('Iniciar-ocult').style.display = 'none';
}
function Ocult_registre() {
    document.getElementById('Registrar-ocult').style.display = 'none';
    document.getElementById('Iniciar-ocult').style.display = 'none';
}
function RegistreUsuaris() {
    const usuariNR = document.querySelector('input[name="UsuariNR"]').value;
    const contrasenyanR1 = document.querySelector('input[name="ContrasenyaNR1"]').value;
    const contrasenyanR2 = document.querySelector('input[name="ContrasenyaNR2"]').value;
}
function LoginUsuaris() {
    const usuariR = document.querySelector('input[name="UsuariR"]').value;
    const contrasenyaR = document.querySelector('input[name="ContrasenyaR"]').value;
}
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

document.addEventListener('DOMContentLoaded', () => {
    const topLlegenda = document.querySelector('.top_llegenda');
    
    const usuariRegistrat = getCookie('usuari_registrat');

    // Comprovem si l'usuari està registrat i si existeix la variable 'usuari'
    if (usuariRegistrat === 'true' && usuari) {
        // Si l'usuari està registrat, afegeix el botó de perfil
        topLlegenda.innerHTML += `<a href="index.php?r=perfil"><button title="Perfil">${usuari}</button></a>`;
    } else {
        // Si no està registrat, afegeix el botó de login
        topLlegenda.innerHTML += '<button onclick="Iniciar_ocult()" title="Registre o inicia sessio">Inicia sessio</button>';
    }
});

