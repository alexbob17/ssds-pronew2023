const form = document.getElementById("registro-tecnico-form");
form.addEventListener("submit", function (event) {
  const codigoTecnico = document.getElementById("codigo_tecnico");
  const tecnico = document.getElementById("tecnico");
  const telefono = document.getElementById("telefono");

  if (!codigoTecnico.value && !tecnico.value && !telefono.value) {
    Swal.fire({
      icon: "error",
      title: "Debe ingresar al menos un dato.",
      showConfirmButton: false,
      timer: 1900,
    });
    event.preventDefault();
    return false;
  }

  if (
    !codigoTecnico.value ||
    codigoTecnico.value.length > 20 ||
    !/^[a-zA-Z0-9]+$/.test(codigoTecnico.value)
  ) {
    Swal.fire({
      icon: "error",
      title:
        "El código del técnico debe ser minimo de 20 caracteres y solo debe contener letras y números.",
      showConfirmButton: false,
      timer: 1900,
    });
    event.preventDefault();
    return false;
  }

  if (!tecnico.value || !/^[a-zA-Z\-_ ]+$/.test(tecnico.value)) {
    Swal.fire({
      icon: "error",
      title: "El nombre del técnico solo debe contener letras y guiones.",
      showConfirmButton: false,
      timer: 1900,
    });
    event.preventDefault();
    return false;
  }

  if (
    !telefono.value ||
    telefono.value.length > 8 ||
    !/^[0-9]{8}|[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/.test(telefono.value)
  ) {
    Swal.fire({
      icon: "error",
      title:
        "El número de teléfono debe tener máximo 8 caracteres y solo debe contener numeros..",
      showConfirmButton: false,
      timer: 1900,
    });
    event.preventDefault();
    return false;
  }
});
