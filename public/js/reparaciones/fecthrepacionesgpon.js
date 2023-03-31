const tecnologiaSelect2 = document.getElementById("tecnologia");
const tipoOrdenSelect2 = document.getElementById("select_orden");

function mostrarElementos() {
  switch (tecnologiaSelect2.value + "|" + tipoOrdenSelect2.value) {
    case "GPON|INTERNET":
      GponInternetFectch();
      break;
    case "GPON|TV":
      GponTvFectch();
      break;
    case "GPON|LINEA":
      GponLineaFectch();
      break;
    default:
      ResetValueGeneralGpon();
      break;
  }
}

document.addEventListener("DOMContentLoaded", mostrarElementos);
tecnologiaSelect2.addEventListener("change", mostrarElementos);
tipoOrdenSelect2.addEventListener("change", mostrarElementos);

const btnDeleteCausaGpon = document.getElementById("btnDeleteCausaGpon");
btnDeleteCausaGpon.addEventListener("click", function () {
  ResetValueGeneralGpon();
});

select_orden.addEventListener("change", function () {
  if (select_orden.value === "TV") {
    ResetValueGeneralGpon();
  } else if (select_orden.value === "LINEA") {
    ResetValueGeneralGpon();
  } else if (select_orden.value === "INTERNET") {
    ResetValueGeneralGpon();
  }
});

function ResetValueGeneralGpon() {
  //   GPON
  const CodigoCausaGpon = document.getElementById("CodigoCausaGpon");

  const CodigoTipoDañoGpon = document.getElementById("CodigoTipoDañoGpon");
  const CodigoUbicacionDañoGpon = document.getElementById(
    "CodigoUbicacionDañoGpon"
  );

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

  const optionDefaultGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  CodigoTipoDañoGpon.innerHTML = optionDefaultGpon;

  const optionDefaultUbiDañoGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  CodigoUbicacionDañoGpon.innerHTML = optionDefaultUbiDañoGpon;

  const optionDefaultDesDañoGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionCausaDañoGpon.innerHTML = optionDefaultDesDañoGpon;

  const optionDefaultDesTipoDañoGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionTipoDañoGpon.innerHTML = optionDefaultDesTipoDañoGpon;

  const optionDefaultDescUbicacionGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionUbicacionGpon.innerHTML = optionDefaultDescUbicacionGpon;

  CodigoTipoDañoGpon.value = "";
  CodigoUbicacionDañoGpon.value = "";
  DescripcionCausaDañoGpon.value = "";
  DescripcionTipoDañoGpon.value = "";
  DescripcionUbicacionGpon.value = "";
}

function GponInternetFectch() {
  fetch("../Json/codigoGponInternet.json")
    .then((response) => response.json())
    .then((datos) => {
      const btnSearchCausaGpon = document.getElementById("btnSearchCausaGpon");

      const CodigoCausaGpon = document.getElementById("CodigoCausaGpon");

      const CodigoTipoDañoGpon = document.getElementById("CodigoTipoDañoGpon");
      const CodigoUbicacionDañoGpon = document.getElementById(
        "CodigoUbicacionDañoGpon"
      );

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
                !CodigoTipoDañoGpon.querySelector(
                  `option[value="${option1.value}"]`
                )
              ) {
                CodigoTipoDañoGpon.add(option1);
              }

              // CODIGO UBICACION DAÑO
              const optionUbicacion1 = document.createElement("option");
              optionUbicacion1.value = datos[i].CODIGOUBICACIONDAÑO;
              optionUbicacion1.text = datos[i].CODIGOUBICACIONDAÑO;

              if (
                !CodigoUbicacionDañoGpon.querySelector(
                  `option[value="${optionUbicacion1.value}"]`
                )
              ) {
                CodigoUbicacionDañoGpon.add(optionUbicacion1);
              }

              // DESCRIPCION CAUSA
              const optionDescripcionCausa = document.createElement("option");
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
}

function GponTvFectch() {
  fetch("../Json/codigoGponTv.json")
    .then((response) => response.json())
    .then((datos) => {
      const btnSearchCausaGpon = document.getElementById("btnSearchCausaGpon");

      const CodigoCausaGpon = document.getElementById("CodigoCausaGpon");

      const CodigoTipoDañoGpon = document.getElementById("CodigoTipoDañoGpon");
      const CodigoUbicacionDañoGpon = document.getElementById(
        "CodigoUbicacionDañoGpon"
      );

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
        buscarCodigoGponTv();
      });

      CodigoCausaGpon.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
          buscarCodigoGponTv();
        }
      });

      function buscarCodigoGponTv() {
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
                !CodigoTipoDañoGpon.querySelector(
                  `option[value="${option1.value}"]`
                )
              ) {
                CodigoTipoDañoGpon.add(option1);
              }

              // CODIGO UBICACION DAÑO
              const optionUbicacion1 = document.createElement("option");
              optionUbicacion1.value = datos[i].CODIGOUBICACIONDAÑO;
              optionUbicacion1.text = datos[i].CODIGOUBICACIONDAÑO;

              if (
                !CodigoUbicacionDañoGpon.querySelector(
                  `option[value="${optionUbicacion1.value}"]`
                )
              ) {
                CodigoUbicacionDañoGpon.add(optionUbicacion1);
              }

              // DESCRIPCION CAUSA
              const optionDescripcionCausa = document.createElement("option");
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
}

function GponLineaFectch() {
  fetch("../Json/codigoGponLinea.json")
    .then((response) => response.json())
    .then((datos) => {
      const btnSearchCausaGpon = document.getElementById("btnSearchCausaGpon");

      const CodigoCausaGpon = document.getElementById("CodigoCausaGpon");

      const CodigoTipoDañoGpon = document.getElementById("CodigoTipoDañoGpon");
      const CodigoUbicacionDañoGpon = document.getElementById(
        "CodigoUbicacionDañoGpon"
      );

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
                !CodigoTipoDañoGpon.querySelector(
                  `option[value="${option1.value}"]`
                )
              ) {
                CodigoTipoDañoGpon.add(option1);
              }

              // CODIGO UBICACION DAÑO
              const optionUbicacion1 = document.createElement("option");
              optionUbicacion1.value = datos[i].CODIGOUBICACIONDAÑO;
              optionUbicacion1.text = datos[i].CODIGOUBICACIONDAÑO;

              if (
                !CodigoUbicacionDañoGpon.querySelector(
                  `option[value="${optionUbicacion1.value}"]`
                )
              ) {
                CodigoUbicacionDañoGpon.add(optionUbicacion1);
              }

              // DESCRIPCION CAUSA
              const optionDescripcionCausa = document.createElement("option");
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
}
