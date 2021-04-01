document.addEventListener('DOMContentLoaded', () => {
    // ACCIONES DE LAS TABS
    document.getElementById('btnTabHome').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('home-tab')).show()
    })
    document.getElementById('btnTabUsuarios').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('usuarios-tab')).show()
    })
    document.getElementById('btnTabDependencias').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('dependencias-tab')).show()
    })
    document.getElementById('btnTabReportes').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('reportes-tab')).show()
    })
    document.getElementById('btnTabGraficador').addEventListener('click', () => {
        new bootstrap.Tab(document.getElementById('graficador-tab')).show()
    })
    // elementos visibles en las tabs
    var tabNavigationList = [].slice.call(document.querySelectorAll('#tabNavigation li a[data-bs-toggle="tab"]'))
    tabNavigationList.forEach(function (tabNavigationElement) {
        tabNavigationElement.addEventListener('shown.bs.tab', function () {
            vizualizarElementosNavegacion(this.id)
        })
    })
})

vizualizarElementosNavegacion = (tabVisible) => {
    arbolElementosOcultos = {
        'usuarios-tab': ['btnAgregarUsuario'],
        'dependencias-tab': ['btnAgregarDependencia']
    }

    for (const lista in arbolElementosOcultos) {
        if (lista == tabVisible) {
            arbolElementosOcultos[lista].forEach(elemento => {
                document.getElementById(elemento).classList.remove('d-none')
            })
        } else {
            arbolElementosOcultos[lista].forEach(elemento => {
                document.getElementById(elemento).classList.add('d-none')
            })
        }
    }
}