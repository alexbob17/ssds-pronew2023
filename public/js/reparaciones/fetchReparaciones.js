const tecnologiaSelect = document.getElementById("tecnologia");
const tipoOrdenSelect = document.getElementById("select_orden");

function mostrarElementos() {
  switch (tecnologiaSelect.value + "|" + tipoOrdenSelect.value) {
    case "HFC|TV":
      fetch("../Json/codigoHfcTv.json")
        .then((response) => response.json())
        .then((datos) => {
          const btnSearchCausa = document.getElementById("btnSearchCausa");

          const CodigoCausaHfc = document.getElementById("CodigoCausaHfc");

          const CodigoTipoDañoHfc =
            document.getElementById("CodigoTipoDañoHfc");
          const CodigoUbicacionDañoHfc = document.getElementById(
            "CodigoUbicacionDañoHfc"
          );

          const DescripcionCausaDañoHfc = document.getElementById(
            "DescripcionCausaDañoHfc"
          );
          const DescripcionTipoDañoHfc = document.getElementById(
            "DescripcionTipoDañoHfc"
          );
          const DescripcionUbicacionHfc = document.getElementById(
            "DescripcionUbicacionHfc"
          );

          btnSearchCausa.addEventListener("click", function () {
            buscarCodigoHfcTv();
          });

          CodigoCausaHfc.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
              buscarCodigoHfcTv();
            }
          });

          function buscarCodigoHfcTv() {
            if (!CodigoCausaHfc.value) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Debe ingresar un código",
                showConfirmButton: false,
                timer: 2000,
              });
              return;
            }

            const codigoBuscado = parseInt(CodigoCausaHfc.value);

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
                  // CODIGO TIPO DAÑO
                  const option1 = document.createElement("option");
                  option1.value = datos[i].CODIGOTIPODAÑO;
                  option1.text = datos[i].CODIGOTIPODAÑO;

                  if (
                    !CodigoTipoDañoHfc.querySelector(
                      `option[value="${option1.value}"]`
                    )
                  ) {
                    CodigoTipoDañoHfc.add(option1);
                  }

                  // CODIGO UBICACION DAÑO
                  const optionUbicacion1 = document.createElement("option");
                  optionUbicacion1.value = datos[i].CODIGOUBICACIONDAÑO;
                  optionUbicacion1.text = datos[i].CODIGOUBICACIONDAÑO;

                  if (
                    !CodigoUbicacionDañoHfc.querySelector(
                      `option[value="${optionUbicacion1.value}"]`
                    )
                  ) {
                    CodigoUbicacionDañoHfc.add(optionUbicacion1);
                  }

                  // DESCRIPCION CAUSA
                  const optionDescripcionCausa =
                    document.createElement("option");
                  optionDescripcionCausa.value = datos[i].DESCRIPCIONCAUSA;
                  optionDescripcionCausa.text = datos[i].DESCRIPCIONCAUSA;

                  if (
                    !DescripcionCausaDañoHfc.querySelector(
                      `option[value="${optionDescripcionCausa.value}"]`
                    )
                  ) {
                    DescripcionCausaDañoHfc.add(optionDescripcionCausa);
                  }

                  // DESCRIPCION TIPO DAÑO
                  const optionTipoDaño = document.createElement("option");
                  optionTipoDaño.value = datos[i].DESCRIPCIONTIPODAÑO;
                  optionTipoDaño.text = datos[i].DESCRIPCIONTIPODAÑO;

                  if (
                    !DescripcionTipoDañoHfc.querySelector(
                      `option[value="${optionTipoDaño.value}"]`
                    )
                  ) {
                    DescripcionTipoDañoHfc.add(optionTipoDaño);
                  }

                  // DESCRIPCION UBICACION DAÑO
                  const optionUbicacionDaño = document.createElement("option");
                  optionUbicacionDaño.value = datos[i].DESCRIPCIONUBICACIONDAÑO;
                  optionUbicacionDaño.text = datos[i].DESCRIPCIONUBICACIONDAÑO;

                  if (
                    !DescripcionUbicacionHfc.querySelector(
                      `option[value="${optionUbicacionDaño.value}"]`
                    )
                  ) {
                    DescripcionUbicacionHfc.add(optionUbicacionDaño);
                  }

                  CodigoCausaHfc.setAttribute("readonly", "readonly");
                }
              }
            }
          }
        });

      break;
    case "HFC|LINEA":
      fetch("../Json/codigoHfcLinea.json")
        .then((response) => response.json())
        .then((datos) => {
          const btnSearchCausa = document.getElementById("btnSearchCausa");

          const CodigoCausaHfc = document.getElementById("CodigoCausaHfc");

          const CodigoTipoDañoHfc =
            document.getElementById("CodigoTipoDañoHfc");
          const CodigoUbicacionDañoHfc = document.getElementById(
            "CodigoUbicacionDañoHfc"
          );

          const DescripcionCausaDañoHfc = document.getElementById(
            "DescripcionCausaDañoHfc"
          );
          const DescripcionTipoDañoHfc = document.getElementById(
            "DescripcionTipoDañoHfc"
          );
          const DescripcionUbicacionHfc = document.getElementById(
            "DescripcionUbicacionHfc"
          );

          btnSearchCausa.addEventListener("click", function () {
            buscarCodigoHfcLinea();
          });

          CodigoCausaHfc.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
              buscarCodigoHfcLinea();
            }
          });

          function buscarCodigoHfcLinea() {
            if (!CodigoCausaHfc.value) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Debe ingresar un código",
                showConfirmButton: false,
                timer: 2000,
              });
              return;
            }

            const codigoBuscado = parseInt(CodigoCausaHfc.value);

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
                  // CODIGO TIPO DAÑO
                  const option1 = document.createElement("option");
                  option1.value = datos[i].CODIGOTIPODAÑO;
                  option1.text = datos[i].CODIGOTIPODAÑO;

                  if (
                    !CodigoTipoDañoHfc.querySelector(
                      `option[value="${option1.value}"]`
                    )
                  ) {
                    CodigoTipoDañoHfc.add(option1);
                  }

                  // CODIGO UBICACION DAÑO
                  const optionUbicacion1 = document.createElement("option");
                  optionUbicacion1.value = datos[i].CODIGOUBICACIONDAÑO;
                  optionUbicacion1.text = datos[i].CODIGOUBICACIONDAÑO;

                  if (
                    !CodigoUbicacionDañoHfc.querySelector(
                      `option[value="${optionUbicacion1.value}"]`
                    )
                  ) {
                    CodigoUbicacionDañoHfc.add(optionUbicacion1);
                  }

                  // DESCRIPCION CAUSA
                  const optionDescripcionCausa =
                    document.createElement("option");
                  optionDescripcionCausa.value = datos[i].DESCRIPCIONCAUSA;
                  optionDescripcionCausa.text = datos[i].DESCRIPCIONCAUSA;

                  if (
                    !DescripcionCausaDañoHfc.querySelector(
                      `option[value="${optionDescripcionCausa.value}"]`
                    )
                  ) {
                    DescripcionCausaDañoHfc.add(optionDescripcionCausa);
                  }

                  // DESCRIPCION TIPO DAÑO
                  const optionTipoDaño = document.createElement("option");
                  optionTipoDaño.value = datos[i].DESCRIPCIONTIPODAÑO;
                  optionTipoDaño.text = datos[i].DESCRIPCIONTIPODAÑO;

                  if (
                    !DescripcionTipoDañoHfc.querySelector(
                      `option[value="${optionTipoDaño.value}"]`
                    )
                  ) {
                    DescripcionTipoDañoHfc.add(optionTipoDaño);
                  }

                  // DESCRIPCION UBICACION DAÑO
                  const optionUbicacionDaño = document.createElement("option");
                  optionUbicacionDaño.value = datos[i].DESCRIPCIONUBICACIONDAÑO;
                  optionUbicacionDaño.text = datos[i].DESCRIPCIONUBICACIONDAÑO;

                  if (
                    !DescripcionUbicacionHfc.querySelector(
                      `option[value="${optionUbicacionDaño.value}"]`
                    )
                  ) {
                    DescripcionUbicacionHfc.add(optionUbicacionDaño);
                  }

                  CodigoCausaHfc.setAttribute("readonly", "readonly");
                }
              }
            }
          }
        });

      break;
    case "HFC|INTERNET":
      fetch("../Json/codigoHfcInternet.json")
        .then((response) => response.json())
        .then((datos) => {
          const btnSearchCausa = document.getElementById("btnSearchCausa");

          const CodigoCausaHfc = document.getElementById("CodigoCausaHfc");

          const CodigoTipoDañoHfc =
            document.getElementById("CodigoTipoDañoHfc");
          const CodigoUbicacionDañoHfc = document.getElementById(
            "CodigoUbicacionDañoHfc"
          );

          const DescripcionCausaDañoHfc = document.getElementById(
            "DescripcionCausaDañoHfc"
          );
          const DescripcionTipoDañoHfc = document.getElementById(
            "DescripcionTipoDañoHfc"
          );
          const DescripcionUbicacionHfc = document.getElementById(
            "DescripcionUbicacionHfc"
          );

          btnSearchCausa.addEventListener("click", function () {
            buscarCodigoHfcInternet();
          });

          CodigoCausaHfc.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
              buscarCodigoHfcInternet();
            }
          });

          function buscarCodigoHfcInternet() {
            if (!CodigoCausaHfc.value) {
              Swal.fire({
                icon: "error",
                title: "Opss...",
                text: "Debe ingresar un código",
                showConfirmButton: false,
                timer: 2000,
              });
              return;
            }

            const codigoBuscado = parseInt(CodigoCausaHfc.value);

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
                  // CODIGO TIPO DAÑO
                  const option1 = document.createElement("option");
                  option1.value = datos[i].CODIGOTIPODAÑO;
                  option1.text = datos[i].CODIGOTIPODAÑO;

                  if (
                    !CodigoTipoDañoHfc.querySelector(
                      `option[value="${option1.value}"]`
                    )
                  ) {
                    CodigoTipoDañoHfc.add(option1);
                  }

                  // CODIGO UBICACION DAÑO
                  const optionUbicacion1 = document.createElement("option");
                  optionUbicacion1.value = datos[i].CODIGOUBICACIONDAÑO;
                  optionUbicacion1.text = datos[i].CODIGOUBICACIONDAÑO;

                  if (
                    !CodigoUbicacionDañoHfc.querySelector(
                      `option[value="${optionUbicacion1.value}"]`
                    )
                  ) {
                    CodigoUbicacionDañoHfc.add(optionUbicacion1);
                  }

                  // DESCRIPCION CAUSA
                  const optionDescripcionCausa =
                    document.createElement("option");
                  optionDescripcionCausa.value = datos[i].DESCRIPCIONCAUSA;
                  optionDescripcionCausa.text = datos[i].DESCRIPCIONCAUSA;

                  if (
                    !DescripcionCausaDañoHfc.querySelector(
                      `option[value="${optionDescripcionCausa.value}"]`
                    )
                  ) {
                    DescripcionCausaDañoHfc.add(optionDescripcionCausa);
                  }

                  // DESCRIPCION TIPO DAÑO
                  const optionTipoDaño = document.createElement("option");
                  optionTipoDaño.value = datos[i].DESCRIPCIONTIPODAÑO;
                  optionTipoDaño.text = datos[i].DESCRIPCIONTIPODAÑO;

                  if (
                    !DescripcionTipoDañoHfc.querySelector(
                      `option[value="${optionTipoDaño.value}"]`
                    )
                  ) {
                    DescripcionTipoDañoHfc.add(optionTipoDaño);
                  }

                  // DESCRIPCION UBICACION DAÑO
                  const optionUbicacionDaño = document.createElement("option");
                  optionUbicacionDaño.value = datos[i].DESCRIPCIONUBICACIONDAÑO;
                  optionUbicacionDaño.text = datos[i].DESCRIPCIONUBICACIONDAÑO;

                  if (
                    !DescripcionUbicacionHfc.querySelector(
                      `option[value="${optionUbicacionDaño.value}"]`
                    )
                  ) {
                    DescripcionUbicacionHfc.add(optionUbicacionDaño);
                  }

                  CodigoCausaHfc.setAttribute("readonly", "readonly");
                }
              }
            }
          }
        });

      break;
    default:
      ResetValueGeneral();
      break;
  }
}

document.addEventListener("DOMContentLoaded", mostrarElementos);
tecnologiaSelect.addEventListener("change", mostrarElementos);
tipoOrdenSelect.addEventListener("change", mostrarElementos);

const btnDeleteCausa = document.getElementById("btnDeleteCausa");
btnDeleteCausa.addEventListener("click", function () {
  ResetValueGeneral();
});

// function init() {
//   const optionDefault = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
//   CodigoTipoDañoHfc.innerHTML = optionDefault;

//   const optionDefaultUbiDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
//   CodigoUbicacionDañoHfc.innerHTML = optionDefaultUbiDaño;

//   const optionDefaultDesDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
//   DescripcionCausaDañoHfc.innerHTML = optionDefaultDesDaño;

//   const optionDefaultDesTipoDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
//   DescripcionTipoDañoHfc.innerHTML = optionDefaultDesTipoDaño;

//   const optionDefaultDescUbicacion = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
//   DescripcionUbicacionHfc.innerHTML = optionDefaultDescUbicacion;
// }
// document.addEventListener("DOMContentLoaded", init);

function ResetValueGeneral() {
  const CodigoCausaHfc = document.getElementById("CodigoCausaHfc");
  const CodigoTipoDañoHfc = document.getElementById("CodigoTipoDañoHfc");
  const CodigoUbicacionDañoHfc = document.getElementById(
    "CodigoUbicacionDañoHfc"
  );

  const DescripcionCausaDañoHfc = document.getElementById(
    "DescripcionCausaDañoHfc"
  );
  const DescripcionTipoDañoHfc = document.getElementById(
    "DescripcionTipoDañoHfc"
  );
  const DescripcionUbicacionHfc = document.getElementById(
    "DescripcionUbicacionHfc"
  );
  //   CodigoCausaHfc.value = "";

  CodigoCausaHfc.removeAttribute("readonly");

  const optionDefault = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  CodigoTipoDañoHfc.innerHTML = optionDefault;

  const optionDefaultUbiDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  CodigoUbicacionDañoHfc.innerHTML = optionDefaultUbiDaño;

  const optionDefaultDesDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionCausaDañoHfc.innerHTML = optionDefaultDesDaño;

  const optionDefaultDesTipoDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionTipoDañoHfc.innerHTML = optionDefaultDesTipoDaño;

  const optionDefaultDescUbicacion = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionUbicacionHfc.innerHTML = optionDefaultDescUbicacion;

  CodigoTipoDañoHfc.value = "";
  CodigoUbicacionDañoHfc.value = "";
  DescripcionCausaDañoHfc.value = "";
  DescripcionTipoDañoHfc.value = "";
  DescripcionUbicacionHfc.value = "";
}

// const form1 = document.getElementById("form1");

// document.addEventListener("DOMContentLoaded", function () {
select_orden.addEventListener("change", function () {
  if (select_orden.value === "TV") {
    ResetValueGeneral();
  } else if (select_orden.value === "LINEA") {
    ResetValueGeneral();
  } else if (select_orden.value === "INTERNET") {
    ResetValueGeneral();
  }
});
// });

// FUNCION PARA RESETEAR VALORES
