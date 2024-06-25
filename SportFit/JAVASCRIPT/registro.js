function validarFormulario() {
    // Validar coincidencia de contraseñas
    var contrasena = document.getElementById('contrasena').value;
    var confirmarContrasena = document.getElementById('confirmarContraseña').value; // Corregir el ID aquí

    if (contrasena !== confirmarContrasena) {
        alert('¡Error! Las contraseñas no coinciden.');
        return false;
    }

    // Validar requisitos de seguridad
    var contrasenaRequisitos = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/;

    if (!contrasenaRequisitos.test(contrasena)) {
        alert('¡Error! La contraseña no cumple con los requisitos de seguridad.');
        return false;
    }

    return true;


}
