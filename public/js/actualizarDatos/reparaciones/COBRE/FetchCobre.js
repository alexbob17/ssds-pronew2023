const tecnologiaSelect = document.getElementById("tecnologia");
const tipoOrdenSelect = document.getElementById("select_orden");

function mostrarElementos() {
  switch (tecnologiaSelect.value + "|" + tipoOrdenSelect.value) {
    case "COBRE|LINEA":
      fetch("http://localhost/ssd-claroProd/public/Json/codigoCobre.json")
        .then((response) => response.json())
        .then((datos) => {
          const btnSearchCausaCobre = document.getElementById(
            "btnSearchCausaCobre"
          );

          const CodigoCausaCobre = document.getElementById("CodigoCausaCobre");

          // const CodigoTipoDañoCobre = document.getElementById(
          //   "CodigoTipoDañoCobre"
          // );
          // const CodigoUbicacionDañoCobre = document.getElementById(
          //   "CodigoUbicacionDañoCobre"
          // );

          const DescripcionCausaCobre = document.getElementById(
            "DescripcionCausaCobre"
          );
          const DescripcionTipoDañoCobre = document.getElementById(
            "DescripcionTipoDañoCobre"
          );
          const DescripcionUbicacionDañoCobre = document.getElementById(
            "DescripcionUbicacionDañoCobre"
          );

          btnSearchCausaCobre.addEventListener("click", function () {
            buscarCodigoCobreLinea();
          });

          CodigoCausaCobre.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
              buscarCodigoCobreLinea();
            }
          });

          function buscarCodigoCobreLinea() {
            if (!CodigoCausaCobre.value) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Debe ingresar un código",
                showConfirmButton: false,
                timer: 2000,
              });
              return;
            }

            const codigoBuscado = parseInt(CodigoCausaCobre.value);

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
                    !DescripcionCausaCobre.querySelector(
                      `option[value="${optionDescripcionCausa.value}"]`
                    )
                  ) {
                    DescripcionCausaCobre.add(optionDescripcionCausa);
                  }

                  // DESCRIPCION TIPO DAÑO
                  const optionTipoDaño = document.createElement("option");
                  optionTipoDaño.value = datos[i].DESCRIPCIONTIPODAÑO;
                  optionTipoDaño.text = datos[i].DESCRIPCIONTIPODAÑO;

                  if (
                    !DescripcionTipoDañoCobre.querySelector(
                      `option[value="${optionTipoDaño.value}"]`
                    )
                  ) {
                    DescripcionTipoDañoCobre.add(optionTipoDaño);
                  }

                  // DESCRIPCION UBICACION DAÑO
                  const optionUbicacionDaño = document.createElement("option");
                  optionUbicacionDaño.value = datos[i].DESCRIPCIONUBICACIONDAÑO;
                  optionUbicacionDaño.text = datos[i].DESCRIPCIONUBICACIONDAÑO;

                  if (
                    !DescripcionUbicacionDañoCobre.querySelector(
                      `option[value="${optionUbicacionDaño.value}"]`
                    )
                  ) {
                    DescripcionUbicacionDañoCobre.add(optionUbicacionDaño);
                  }

                  CodigoCausaCobre.setAttribute("readonly", "readonly");
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

const btnDeleteCausaCobre = document.getElementById("btnDeleteCausaCobre");
btnDeleteCausaCobre.addEventListener("click", function () {
  ResetValueGeneralCobre();
});

function ResetValueGeneralCobre() {
  const CodigoCausaCobre = document.getElementById("CodigoCausaCobre");

  const DescripcionCausaCobre = document.getElementById(
    "DescripcionCausaCobre"
  );
  const DescripcionTipoDañoCobre = document.getElementById(
    "DescripcionTipoDañoCobre"
  );
  const DescripcionUbicacionDañoCobre = document.getElementById(
    "DescripcionUbicacionDañoCobre"
  );

  CodigoCausaCobre.removeAttribute("readonly");

  const optionDefaultDesDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionCausaCobre.innerHTML = optionDefaultDesDaño;

  const optionDefaultDesTipoDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionTipoDañoCobre.innerHTML = optionDefaultDesTipoDaño;

  const optionDefaultDescUbicacion = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionUbicacionDañoCobre.innerHTML = optionDefaultDescUbicacion;

  DescripcionCausaCobre.value = "";
  DescripcionTipoDañoCobre.value = "";
  DescripcionUbicacionDañoCobre.value = "";
}

// document.addEventListener("DOMContentLoaded", function () {
select_orden.addEventListener("change", function () {
  if (select_orden.value === "TV") {
    ResetValueGeneralCobre();
  } else if (select_orden.value === "LINEA") {
    ResetValueGeneralCobre();
  } else if (select_orden.value === "INTERNET") {
    ResetValueGeneralCobre();
  }
});
// });

// FUNCION PARA RESETEAR VALORES
