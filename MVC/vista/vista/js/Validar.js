<script>
document.addEventListener("DOMContentLoaded", () => {
    var form = document.getElementById("validationForm");
    form.addEventListener("submit", event => {
        var email = document.getElementById("email");
        var contraseña = document.getElementById("contraseña");
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var isValidEmail = filter.test(email.value);
        var isValidContraseña = contraseña.value.length >= 8;
        if (!isValidEmail) {
            console.log("Email no válido");
            email.classList.add("is-invalid");
            event.preventDefault();
        } else {
            email.classList.remove("is-invalid");
        }
        if (!isValidContraseña) {
            console.log("Contraseña no válida");
            contraseña.classList.add("is-invalid");
            event.preventDefault();
        } else {
            contraseña.classList.remove("is-invalid");
        }
    });
});
</script>