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
    case "ADSL|INTERNET":
      fetch("../Json/codigoAdsl.json")
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
    case "COBRE|LINEA":
      fetch("../Json/codigoCobre.json")
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
    case "DTH|TV":
      fetch("../Json/codigoDth.json")
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
    case "GPON|INTERNET":
      fetch("../Json/codigoGponInternet.json")
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
      fetch("../Json/codigoGponLinea.json")
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
      fetch("../Json/codigoGponTv.json")
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
      ResetValueGeneral();
      ResetValueGeneralAdsl();
      ResetValueGeneralGpon();
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

const btnDeleteCausaAdsl = document.getElementById("btnDeleteCausaAdsl");
btnDeleteCausaAdsl.addEventListener("click", function () {
  ResetValueGeneralAdsl();
});

const btnDeleteCausaCobre = document.getElementById("btnDeleteCausaCobre");
btnDeleteCausaCobre.addEventListener("click", function () {
  ResetValueGeneralCobre();
});

const btnDeleteCausaDth = document.getElementById("btnDeleteCausaDth");
btnDeleteCausaDth.addEventListener("click", function () {
  ResetValueGeneralDth();
});

const btnDeleteCausaGpon = document.getElementById("btnDeleteCausaGpon");
btnDeleteCausaGpon.addEventListener("click", function () {
  ResetValueGeneralGpon();
});

function ResetValueGeneral() {
  const CodigoCausaHfc = document.getElementById("CodigoCausaHfc");
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

  const optionDefaultDesDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionCausaDañoHfc.innerHTML = optionDefaultDesDaño;

  const optionDefaultDesTipoDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionTipoDañoHfc.innerHTML = optionDefaultDesTipoDaño;

  const optionDefaultDescUbicacion = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionUbicacionHfc.innerHTML = optionDefaultDescUbicacion;

  DescripcionCausaDañoHfc.value = "";
  DescripcionTipoDañoHfc.value = "";
  DescripcionUbicacionHfc.value = "";
}

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
    ResetValueGeneral();
    ResetValueGeneralAdsl();
    ResetValueGeneralCobre();
    ResetValueGeneralGpon();
  } else if (select_orden.value === "LINEA") {
    ResetValueGeneral();
    ResetValueGeneralAdsl();
    ResetValueGeneralCobre();
    ResetValueGeneralGpon();
  } else if (select_orden.value === "INTERNET") {
    ResetValueGeneral();
    ResetValueGeneralAdsl();
    ResetValueGeneralCobre();
    ResetValueGeneralGpon();
  }
});
// });

// FUNCION PARA RESETEAR VALORES
