<?php
session_start();

if (!isset($_SESSION['sesionActiva']) || $_SESSION['sesionActiva'] != "1" || $_SESSION['tipoUsuario'] != "admin") {
    header("Location: /CensoDeGobierno");
    exit;
} else {
    echo '
        <script>
            const
                idUsuario = ' . $_SESSION['idUsuario'] . ',
                tipoUsuario = "' . $_SESSION['tipoUsuario'] . '";
        </script>
    ';
?>

    <h2>Hello home</h2>

<?php
}
?>