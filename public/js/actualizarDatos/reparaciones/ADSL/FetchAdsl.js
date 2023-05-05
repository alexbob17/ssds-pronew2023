const tecnologiaSelect = document.getElementById("tecnologia");
const tipoOrdenSelect = document.getElementById("select_orden");

function mostrarElementos() {
  switch (tecnologiaSelect.value + "|" + tipoOrdenSelect.value) {
    case "ADSL|INTERNET":
      fetch("http://localhost/ssd-claroProd/public/Json/codigoAdsl.json")
        .then((response) => response.json())
        .then((datos) => {
          const btnSearchCausaAdsl =
            document.getElementById("btnSearchCausaAdsl");

          const CodigoCausaAdsl = document.getElementById("CodigoCausaAdsl");

          const DescripcionCausaAdsl = document.getElementById(
            "DescripcionCausaAdsl"
          );
          const DescripcionTipoDañoAdsl = document.getElementById(
            "DescripcionTipoDañoAdsl"
          );
          const DescripcionUbicacionDañoAdsl = document.getElementById(
            "DescripcionUbicacionDañoAdsl"
          );

          btnSearchCausaAdsl.addEventListener("click", function () {
            buscarCodigoGponInternet();
          });

          CodigoCausaAdsl.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
              buscarCodigoGponInternet();
            }
          });

          function buscarCodigoGponInternet() {
            if (!CodigoCausaAdsl.value) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Debe ingresar un código",
                showConfirmButton: false,
                timer: 2000,
              });
              return;
            }

            const codigoBuscado = parseInt(CodigoCausaAdsl.value);

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
              ResetValueGeneral();

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
                    !DescripcionCausaAdsl.querySelector(
                      `option[value="${optionDescripcionCausa.value}"]`
                    )
                  ) {
                    DescripcionCausaAdsl.add(optionDescripcionCausa);
                  }

                  // DESCRIPCION TIPO DAÑO
                  const optionTipoDaño = document.createElement("option");
                  optionTipoDaño.value = datos[i].DESCRIPCIONTIPODAÑO;
                  optionTipoDaño.text = datos[i].DESCRIPCIONTIPODAÑO;

                  if (
                    !DescripcionTipoDañoAdsl.querySelector(
                      `option[value="${optionTipoDaño.value}"]`
                    )
                  ) {
                    DescripcionTipoDañoAdsl.add(optionTipoDaño);
                  }

                  // DESCRIPCION UBICACION DAÑO
                  const optionUbicacionDaño = document.createElement("option");
                  optionUbicacionDaño.value = datos[i].DESCRIPCIONUBICACIONDAÑO;
                  optionUbicacionDaño.text = datos[i].DESCRIPCIONUBICACIONDAÑO;

                  if (
                    !DescripcionUbicacionDañoAdsl.querySelector(
                      `option[value="${optionUbicacionDaño.value}"]`
                    )
                  ) {
                    DescripcionUbicacionDañoAdsl.add(optionUbicacionDaño);
                  }

                  CodigoCausaAdsl.setAttribute("readonly", "readonly");
                }
              }
            }
          }
        });

      break;
    default:
      ResetValueGeneralAdsl();
      break;
  }
}

document.addEventListener("DOMContentLoaded", mostrarElementos);
tecnologiaSelect.addEventListener("change", mostrarElementos);
tipoOrdenSelect.addEventListener("change", mostrarElementos);

function ResetValueGeneralAdsl() {
  const CodigoCausaAdsl = document.getElementById("CodigoCausaAdsl");

  const DescripcionCausaAdsl = document.getElementById("DescripcionCausaAdsl");
  const DescripcionTipoDañoAdsl = document.getElementById(
    "DescripcionTipoDañoAdsl"
  );
  const DescripcionUbicacionDañoAdsl = document.getElementById(
    "DescripcionUbicacionDañoAdsl"
  );
  //   CodigoCausaHfc.value = "";

  CodigoCausaAdsl.removeAttribute("readonly");

  const optionDefaultDesDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionCausaAdsl.innerHTML = optionDefaultDesDaño;

  const optionDefaultDesTipoDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionTipoDañoAdsl.innerHTML = optionDefaultDesTipoDaño;

  const optionDefaultDescUbicacion = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionUbicacionDañoAdsl.innerHTML = optionDefaultDescUbicacion;

  DescripcionCausaAdsl.value = "";
  DescripcionTipoDañoAdsl.value = "";
  DescripcionUbicacionDañoAdsl.value = "";
}

const btnDeleteCausaAdsl = document.getElementById("btnDeleteCausaAdsl");
btnDeleteCausaAdsl.addEventListener("click", function () {
  ResetValueGeneralAdsl();
});

// document.addEventListener("DOMContentLoaded", function () {
select_orden.addEventListener("change", function () {
  if (select_orden.value === "TV") {
    ResetValueGeneralAdsl();
  } else if (select_orden.value === "LINEA") {
    ResetValueGeneralAdsl();
  } else if (select_orden.value === "INTERNET") {
    ResetValueGeneralAdsl();
  }
});
// });

// FUNCION PARA RESETEAR VALORES
