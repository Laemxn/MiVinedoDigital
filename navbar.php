<?php
function activeClass($page) {
    return basename($_SERVER['PHP_SELF']) == $page ? 'active' : '';
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand text-primary" href="dashboard.php" style="font-weight: 500;">Mi Viñedo Digital</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= activeClass('dashboard.php') ?>" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= activeClass('gestion_parcelas.php') ?>" href="gestion_parcelas.php">Parcelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= activeClass('gestion_uvas.php') ?>" href="gestion_uvas.php">Tipos de Uva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= activeClass('gestion_cosechas.php') ?>" href="gestion_cosechas.php">Cosechas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= activeClass('gestion_tratamientos.php') ?>" href="gestion_tratamientos.php">Tratamientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
