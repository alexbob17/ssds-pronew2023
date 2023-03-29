const tecnologia = document.getElementById("tecnologia");
const select_orden = document.getElementById("select_orden");

function DatosReparaciones() {
  let url;
  switch (tecnologia.value + "|" + select_orden.value) {
    case "HFC|TV":
      alert("hola");
      break;

    case "HFC|LINEA":
      url = "../Json/codigoHfcLinea.json";
      break;
    case "HFC|INTERNET":
      url = "../Json/codigoHfcInternet.json";
      break;
    case "GPON|TV":
      url = "../Json/codigoGponTv.json";
      break;
    case "GPON|LINEA":
      url = "../Json/codigoGponLinea.json";
      break;
    case "GPON|INTERNET":
      url = "../Json/codigoGponInternet.json";
      break;
    case "ADSL|INTERNET":
      url = "../Json/codigoAdslInternet.json";
      break;

      url = "../Json/codigoAdslLinea.json";
      break;
    case "COBRE|LINEA":
      url = "../Json/codigoCobreLinea.json";
      break;
      url = "../Json/codigoCobreTv.json";
      break;
    case "DTH|TV":
      url = "../Json/codigoDthTv.json";
      break;
      url = "../Json/codigoDthInternet.json";
      break;
    default:
      return;
  }
}

tecnologia.addEventListener("change", DatosReparaciones);

fetch("../Json/codigoHfcTv.json")
  .then((response) => response.json())
  .then((datos) => {
    const btnSearchCausa = document.getElementById("btnSearchCausa");
    const btnDeleteCausa = document.getElementById("btnDeleteCausa");
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

    btnSearchCausa.addEventListener("click", function () {
      buscarTecnico();
    });

    CodigoCausaHfc.addEventListener("keydown", function (event) {
      if (event.key === "Enter") {
        buscarTecnico();
      }
    });

    function buscarTecnico() {
      if (CodigoCausaHfc.value === "") {
        Swal.fire({
          icon: "warning",
          title: "Ingresa Codigo Causa",
          showConfirmButton: false,
          timer: 2000,
        });
        // window.location.href = window.location.href;
        return;
      }
      Swal.fire({
        icon: "success",
        title: "Codigo Causa Encontrado",
        showConfirmButton: false,
        timer: 1200,
      });
      var codigoBuscado = CodigoCausaHfc.value.toUpperCase();
      var codigoEncontrado = false;
      for (var i = 0; i < datos.length; i++) {
        if (datos[i].CODIGOCAUSA == codigoBuscado) {
          codigoEncontrado = true;
          CodigoTipoDañoHfc.value = datos[i].CODIGOTIPODAÑO;
          CodigoUbicacionDañoHfc.value = datos[i].CODIGOUBICACIONDAÑO;
          DescripcionCausaDañoHfc.value = datos[i].DESCRIPCIONCAUSA;
          DescripcionTipoDañoHfc.value = datos[i].DESCRIPCIONTIPODAÑO;
          DescripcionUbicacionHfc.value = datos[i].DESCRIPCIONUBICACIONDAÑO;

          CodigoCausaHfc.setAttribute("readonly", "readonly");
          CodigoTipoDañoHfc.setAttribute("readonly", "readonly");
          CodigoUbicacionDañoHfc.setAttribute("readonly", "readonly");

          DescripcionCausaDañoHfc.setAttribute("readonly", "readonly");
          DescripcionTipoDañoHfc.setAttribute("readonly", "readonly");
          DescripcionUbicacionHfc.setAttribute("readonly", "readonly");

          break;
        }
      }
      if (!codigoEncontrado) {
        Swal.fire({
          icon: "error",
          title: "Opss...",
          text: "Codigo No Encontrado",
          showConfirmButton: false,
          timer: 2000,
        });
      }
    }
    btnDeleteCausa.disabled = false;
  });

btnDeleteCausa.addEventListener("click", function () {
  ResetValue();
});

// FUNCION PARA RESETEAR VALORES

function ResetValue() {
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

  CodigoCausaHfc.removeAttribute("readonly");

  CodigoCausaHfc.value = "";
  CodigoTipoDañoHfc.value = "";
  CodigoUbicacionDañoHfc.value = "";
  DescripcionCausaDañoHfc.value = "";
  DescripcionTipoDañoHfc.value = "";
  DescripcionUbicacionHfc.value = "";
}
