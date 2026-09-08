function cambiarImagen(elemento) {
    const imagen = elemento.dataset.imagen;

    const imagenGrande = elemento
        .closest('.galeria')
        .querySelector('.imagen-grande');

    imagenGrande.src = imagen;

    elemento
        .closest('.miniaturas')
        .querySelectorAll('.miniatura')
        .forEach(btn => btn.classList.remove('activa'));

    elemento.classList.add('activa');
}