document.addEventListener("DOMContentLoaded", function () {
  // Obtener los elementos del segundo formulario
  const form2 = document.getElementById("form1");
  const codigo_tecnico = form2.querySelector('[name="codigo_tecnico"]');
  const telefono = form2.querySelector('[name="telefono"]');
  const tecnico = form2.querySelector('[name="tecnico"]');

  // Recuperar los valores del LocalStorage y asignarlos a los campos correspondientes
  codigo_tecnico.value = localStorage.getItem("codigo_tecnico");
  telefono.value = localStorage.getItem("telefono");
  tecnico.value = localStorage.getItem("tecnico");

  const btn_busqueda = document.getElementById("btn_busqueda");

  btn_busqueda.addEventListener("click", function () {
    localStorage.setItem("codigo_tecnico", codigo_tecnico.value);
    localStorage.setItem("telefono", telefono.value);
    localStorage.setItem("tecnico", tecnico.value);
  });

  const btnReiniciar = document.getElementById("btn_reiniciar");

  btnReiniciar.addEventListener("click", function () {
    localStorage.clear();
    window.location.href = window.location.href;
  });
});
