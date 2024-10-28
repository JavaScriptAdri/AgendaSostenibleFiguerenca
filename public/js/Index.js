
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