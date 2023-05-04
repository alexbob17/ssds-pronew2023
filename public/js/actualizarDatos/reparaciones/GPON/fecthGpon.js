const tecnologiaSelect = document.getElementById("tecnologia");
const tipoOrdenSelect = document.getElementById("select_orden");

function mostrarElementos() {
  switch (tecnologiaSelect.value + "|" + tipoOrdenSelect.value) {
    case "GPON|INTERNET":
      fetch(
        "http://localhost/ssd-claroProd/public/Json/codigoGponInternet.json"
      )
        .then((response) => response.json())
        .then((datos) => {
          const btnSearchCausaGpon =
            document.getElementById("btnSearchCausaGpon");

          const CodigoCausaGpon = document.getElementById("CodigoCausaGpon");

          const DescripcionCausaDañoGpon = document.getElementById(
            "DescripcionCausaDañoGpon"
          );
          const DescripcionTipoDañoGpon = document.getElementById(
            "DescripcionTipoDañoGpon"
          );
          const DescripcionUbicacionGpon = document.getElementById(
            "DescripcionUbicacionGpon"
          );

          btnSearchCausaGpon.addEventListener("click", function () {
            buscarCodigoGponInternet();
          });

          CodigoCausaGpon.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
              buscarCodigoGponInternet();
            }
          });

          function buscarCodigoGponInternet() {
            if (!CodigoCausaGpon.value) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Debe ingresar un código",
                showConfirmButton: false,
                timer: 2000,
              });
              return;
            }

            const codigoBuscado = parseInt(CodigoCausaGpon.value);

            const codigoEncontrado = datos.find(
              (d) => d.CODIGOCAUSA === codigoBuscado
            );

            const codigoEncontradoNull = datos.filter(
              (d) => d.CODIGOCAUSA === codigoBuscado
            );

            if (codigoEncontradoNull.length === 0) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Código no encontrado",
                showConfirmButton: false,
                timer: 1800,
              });
              ResetValueGeneralGpon();

              return;
            }

            if (codigoEncontrado) {
              Swal.fire({
                icon: "success",
                title: "Código Encontrado",
                showConfirmButton: false,
                timer: 2000,
              });

              for (var i = 0; i < datos.length; i++) {
                if (datos[i].CODIGOCAUSA == codigoBuscado) {
                  // DESCRIPCION CAUSA
                  const optionDescripcionCausa =
                    document.createElement("option");
                  optionDescripcionCausa.value = datos[i].DESCRIPCIONCAUSA;
                  optionDescripcionCausa.text = datos[i].DESCRIPCIONCAUSA;

                  if (
                    !DescripcionCausaDañoGpon.querySelector(
                      `option[value="${optionDescripcionCausa.value}"]`
                    )
                  ) {
                    DescripcionCausaDañoGpon.add(optionDescripcionCausa);
                  }

                  // DESCRIPCION TIPO DAÑO
                  const optionTipoDaño = document.createElement("option");
                  optionTipoDaño.value = datos[i].DESCRIPCIONTIPODAÑO;
                  optionTipoDaño.text = datos[i].DESCRIPCIONTIPODAÑO;

                  if (
                    !DescripcionTipoDañoGpon.querySelector(
                      `option[value="${optionTipoDaño.value}"]`
                    )
                  ) {
                    DescripcionTipoDañoGpon.add(optionTipoDaño);
                  }

                  // DESCRIPCION UBICACION DAÑO
                  const optionUbicacionDaño = document.createElement("option");
                  optionUbicacionDaño.value = datos[i].DESCRIPCIONUBICACIONDAÑO;
                  optionUbicacionDaño.text = datos[i].DESCRIPCIONUBICACIONDAÑO;

                  if (
                    !DescripcionUbicacionGpon.querySelector(
                      `option[value="${optionUbicacionDaño.value}"]`
                    )
                  ) {
                    DescripcionUbicacionGpon.add(optionUbicacionDaño);
                  }

                  CodigoCausaGpon.setAttribute("readonly", "readonly");
                }
              }
            }
          }
        });

      break;
    case "GPON|LINEA":
      fetch("http://localhost/ssd-claroProd/public/Json/codigoGponLinea.json")
        .then((response) => response.json())
        .then((datos) => {
          const btnSearchCausaGpon =
            document.getElementById("btnSearchCausaGpon");

          const CodigoCausaGpon = document.getElementById("CodigoCausaGpon");

          const DescripcionCausaDañoGpon = document.getElementById(
            "DescripcionCausaDañoGpon"
          );
          const DescripcionTipoDañoGpon = document.getElementById(
            "DescripcionTipoDañoGpon"
          );
          const DescripcionUbicacionGpon = document.getElementById(
            "DescripcionUbicacionGpon"
          );

          btnSearchCausaGpon.addEventListener("click", function () {
            buscarCodigoGponLinea();
          });

          CodigoCausaGpon.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
              buscarCodigoGponLinea();
            }
          });

          function buscarCodigoGponLinea() {
            if (!CodigoCausaGpon.value) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Debe ingresar un código",
                showConfirmButton: false,
                timer: 2000,
              });
              return;
            }

            const codigoBuscado = parseInt(CodigoCausaGpon.value);

            const codigoEncontrado = datos.find(
              (d) => d.CODIGOCAUSA === codigoBuscado
            );

            const codigoEncontradoNull = datos.filter(
              (d) => d.CODIGOCAUSA === codigoBuscado
            );

            if (codigoEncontradoNull.length === 0) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Código no encontrado",
                showConfirmButton: false,
                timer: 1800,
              });
              ResetValueGeneralGpon();

              return;
            }

            if (codigoEncontrado) {
              Swal.fire({
                icon: "success",
                title: "Código Encontrado",
                showConfirmButton: false,
                timer: 2000,
              });

              for (var i = 0; i < datos.length; i++) {
                if (datos[i].CODIGOCAUSA == codigoBuscado) {
                  // DESCRIPCION CAUSA
                  const optionDescripcionCausa =
                    document.createElement("option");
                  optionDescripcionCausa.value = datos[i].DESCRIPCIONCAUSA;
                  optionDescripcionCausa.text = datos[i].DESCRIPCIONCAUSA;

                  if (
                    !DescripcionCausaDañoGpon.querySelector(
                      `option[value="${optionDescripcionCausa.value}"]`
                    )
                  ) {
                    DescripcionCausaDañoGpon.add(optionDescripcionCausa);
                  }

                  // DESCRIPCION TIPO DAÑO
                  const optionTipoDaño = document.createElement("option");
                  optionTipoDaño.value = datos[i].DESCRIPCIONTIPODAÑO;
                  optionTipoDaño.text = datos[i].DESCRIPCIONTIPODAÑO;

                  if (
                    !DescripcionTipoDañoGpon.querySelector(
                      `option[value="${optionTipoDaño.value}"]`
                    )
                  ) {
                    DescripcionTipoDañoGpon.add(optionTipoDaño);
                  }

                  // DESCRIPCION UBICACION DAÑO
                  const optionUbicacionDaño = document.createElement("option");
                  optionUbicacionDaño.value = datos[i].DESCRIPCIONUBICACIONDAÑO;
                  optionUbicacionDaño.text = datos[i].DESCRIPCIONUBICACIONDAÑO;

                  if (
                    !DescripcionUbicacionGpon.querySelector(
                      `option[value="${optionUbicacionDaño.value}"]`
                    )
                  ) {
                    DescripcionUbicacionGpon.add(optionUbicacionDaño);
                  }

                  CodigoCausaGpon.setAttribute("readonly", "readonly");
                }
              }
            }
          }
        });

      break;
    case "GPON|TV":
      fetch("http://localhost/ssd-claroProd/public/Json/codigoGponTv.json")
        .then((response) => response.json())
        .then((datos) => {
          const btnSearchCausaGpon =
            document.getElementById("btnSearchCausaGpon");

          const CodigoCausaGpon = document.getElementById("CodigoCausaGpon");

          const DescripcionCausaDañoGpon = document.getElementById(
            "DescripcionCausaDañoGpon"
          );
          const DescripcionTipoDañoGpon = document.getElementById(
            "DescripcionTipoDañoGpon"
          );
          const DescripcionUbicacionGpon = document.getElementById(
            "DescripcionUbicacionGpon"
          );

          btnSearchCausaGpon.addEventListener("click", function () {
            buscarCodigoGponIptv();
          });

          CodigoCausaGpon.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
              buscarCodigoGponIptv();
            }
          });

          function buscarCodigoGponIptv() {
            if (!CodigoCausaGpon.value) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Debe ingresar un código",
                showConfirmButton: false,
                timer: 2000,
              });
              return;
            }

            const codigoBuscado = parseInt(CodigoCausaGpon.value);

            const codigoEncontrado = datos.find(
              (d) => d.CODIGOCAUSA === codigoBuscado
            );

            const codigoEncontradoNull = datos.filter(
              (d) => d.CODIGOCAUSA === codigoBuscado
            );

            if (codigoEncontradoNull.length === 0) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Código no encontrado",
                showConfirmButton: false,
                timer: 1800,
              });
              ResetValueGeneralGpon();

              return;
            }

            if (codigoEncontrado) {
              Swal.fire({
                icon: "success",
                title: "Código Encontrado",
                showConfirmButton: false,
                timer: 2000,
              });

              for (var i = 0; i < datos.length; i++) {
                if (datos[i].CODIGOCAUSA == codigoBuscado) {
                  // DESCRIPCION CAUSA
                  const optionDescripcionCausa =
                    document.createElement("option");
                  optionDescripcionCausa.value = datos[i].DESCRIPCIONCAUSA;
                  optionDescripcionCausa.text = datos[i].DESCRIPCIONCAUSA;

                  if (
                    !DescripcionCausaDañoGpon.querySelector(
                      `option[value="${optionDescripcionCausa.value}"]`
                    )
                  ) {
                    DescripcionCausaDañoGpon.add(optionDescripcionCausa);
                  }

                  // DESCRIPCION TIPO DAÑO
                  const optionTipoDaño = document.createElement("option");
                  optionTipoDaño.value = datos[i].DESCRIPCIONTIPODAÑO;
                  optionTipoDaño.text = datos[i].DESCRIPCIONTIPODAÑO;

                  if (
                    !DescripcionTipoDañoGpon.querySelector(
                      `option[value="${optionTipoDaño.value}"]`
                    )
                  ) {
                    DescripcionTipoDañoGpon.add(optionTipoDaño);
                  }

                  // DESCRIPCION UBICACION DAÑO
                  const optionUbicacionDaño = document.createElement("option");
                  optionUbicacionDaño.value = datos[i].DESCRIPCIONUBICACIONDAÑO;
                  optionUbicacionDaño.text = datos[i].DESCRIPCIONUBICACIONDAÑO;

                  if (
                    !DescripcionUbicacionGpon.querySelector(
                      `option[value="${optionUbicacionDaño.value}"]`
                    )
                  ) {
                    DescripcionUbicacionGpon.add(optionUbicacionDaño);
                  }

                  CodigoCausaGpon.setAttribute("readonly", "readonly");
                }
              }
            }
          }
        });

      break;
    default:
      ResetValueGeneralGpon();
      break;
  }
}

document.addEventListener("DOMContentLoaded", mostrarElementos);
tecnologiaSelect.addEventListener("change", mostrarElementos);
tipoOrdenSelect.addEventListener("change", mostrarElementos);

const btnDeleteCausaGpon = document.getElementById("btnDeleteCausaGpon");
btnDeleteCausaGpon.addEventListener("click", function () {
  ResetValueGeneralGpon();
});

function ResetValueGeneralGpon() {
  //   GPON
  const CodigoCausaGpon = document.getElementById("CodigoCausaGpon");

  const DescripcionCausaDañoGpon = document.getElementById(
    "DescripcionCausaDañoGpon"
  );
  const DescripcionTipoDañoGpon = document.getElementById(
    "DescripcionTipoDañoGpon"
  );
  const DescripcionUbicacionGpon = document.getElementById(
    "DescripcionUbicacionGpon"
  );

  CodigoCausaGpon.removeAttribute("readonly");

  //   CodigoCausaGpon.value = "";

  const optionDefaultDesDañoGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionCausaDañoGpon.innerHTML = optionDefaultDesDañoGpon;

  const optionDefaultDesTipoDañoGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionTipoDañoGpon.innerHTML = optionDefaultDesTipoDañoGpon;

  const optionDefaultDescUbicacionGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionUbicacionGpon.innerHTML = optionDefaultDescUbicacionGpon;

  DescripcionCausaDañoGpon.value = "";
  DescripcionTipoDañoGpon.value = "";
  DescripcionUbicacionGpon.value = "";
}

// document.addEventListener("DOMContentLoaded", function () {
select_orden.addEventListener("change", function () {
  if (select_orden.value === "TV") {
    ResetValueGeneralGpon();
  } else if (select_orden.value === "LINEA") {
    ResetValueGeneralGpon();
  } else if (select_orden.value === "INTERNET") {
    ResetValueGeneralGpon();
  }
});
// });

// FUNCION PARA RESETEAR VALORES
