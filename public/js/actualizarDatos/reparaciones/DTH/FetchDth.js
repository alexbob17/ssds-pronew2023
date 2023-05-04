const tecnologiaSelect = document.getElementById("tecnologia");
const tipoOrdenSelect = document.getElementById("select_orden");

function mostrarElementos() {
  switch (tecnologiaSelect.value + "|" + tipoOrdenSelect.value) {
    case "DTH|TV":
      fetch("http://localhost/ssd-claroProd/public/Json/codigoDth.json")
        .then((response) => response.json())
        .then((datos) => {
          const btnSearchCausaDth =
            document.getElementById("btnSearchCausaDth");

          const CodigoCausaDth = document.getElementById("CodigoCausaDth");

          // const CodigoTipoDañoDth =
          //   document.getElementById("CodigoTipoDañoDth");
          // const CodigoUbicacionDañoDth = document.getElementById(
          //   "CodigoUbicacionDañoDth"
          // );

          const DescripcionCausaDth = document.getElementById(
            "DescripcionCausaDth"
          );
          const DescripcionTipoDañoDth = document.getElementById(
            "DescripcionTipoDañoDth"
          );
          const DescripcionUbicacionDañoDth = document.getElementById(
            "DescripcionUbicacionDañoDth"
          );

          btnSearchCausaDth.addEventListener("click", function () {
            buscarCodigoTvDth();
          });

          CodigoCausaDth.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
              buscarCodigoTvDth();
            }
          });

          function buscarCodigoTvDth() {
            if (!CodigoCausaDth.value) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Debe ingresar un código",
                showConfirmButton: false,
                timer: 2000,
              });
              return;
            }

            const codigoBuscado = parseInt(CodigoCausaDth.value);

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
                    !DescripcionCausaDth.querySelector(
                      `option[value="${optionDescripcionCausa.value}"]`
                    )
                  ) {
                    DescripcionCausaDth.add(optionDescripcionCausa);
                  }

                  // DESCRIPCION TIPO DAÑO
                  const optionTipoDaño = document.createElement("option");
                  optionTipoDaño.value = datos[i].DESCRIPCIONTIPODAÑO;
                  optionTipoDaño.text = datos[i].DESCRIPCIONTIPODAÑO;

                  if (
                    !DescripcionTipoDañoDth.querySelector(
                      `option[value="${optionTipoDaño.value}"]`
                    )
                  ) {
                    DescripcionTipoDañoDth.add(optionTipoDaño);
                  }

                  // DESCRIPCION UBICACION DAÑO
                  const optionUbicacionDaño = document.createElement("option");
                  optionUbicacionDaño.value = datos[i].DESCRIPCIONUBICACIONDAÑO;
                  optionUbicacionDaño.text = datos[i].DESCRIPCIONUBICACIONDAÑO;

                  if (
                    !DescripcionUbicacionDañoDth.querySelector(
                      `option[value="${optionUbicacionDaño.value}"]`
                    )
                  ) {
                    DescripcionUbicacionDañoDth.add(optionUbicacionDaño);
                  }

                  CodigoCausaDth.setAttribute("readonly", "readonly");
                }
              }
            }
          }
        });
      break;

    default:
      break;
  }
}

document.addEventListener("DOMContentLoaded", mostrarElementos);
tecnologiaSelect.addEventListener("change", mostrarElementos);
tipoOrdenSelect.addEventListener("change", mostrarElementos);

const btnDeleteCausaDth = document.getElementById("btnDeleteCausaDth");
btnDeleteCausaDth.addEventListener("click", function () {
  ResetValueGeneralDth();
});

function ResetValueGeneralDth() {
  const CodigoCausaDth = document.getElementById("CodigoCausaDth");

  const DescripcionCausaDth = document.getElementById("DescripcionCausaDth");
  const DescripcionTipoDañoDth = document.getElementById(
    "DescripcionTipoDañoDth"
  );
  const DescripcionUbicacionDañoDth = document.getElementById(
    "DescripcionUbicacionDañoDth"
  );

  CodigoCausaDth.removeAttribute("readonly");

  const optionDefaultDesDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionCausaDth.innerHTML = optionDefaultDesDaño;

  const optionDefaultDesTipoDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionTipoDañoDth.innerHTML = optionDefaultDesTipoDaño;

  const optionDefaultDescUbicacion = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionUbicacionDañoDth.innerHTML = optionDefaultDescUbicacion;

  DescripcionCausaDth.value = "";
  DescripcionTipoDañoDth.value = "";
  DescripcionUbicacionDañoDth.value = "";
}
