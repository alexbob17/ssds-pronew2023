document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form1");
  const regexCoordenadas =
    /^[-]?[0-9]{1,2}[.]?[0-9]*[,][-]?[0-9]{1,3}[.]?[0-9]*$/;

  $(function () {
    // Initialize Select2 Elements
    $(".select2").select2();
  });

  fetch("http://localhost/ssd-claroProd/public/Json/Localizaciones.json")
    .then((response) => response.json())
    .then((datos) => {
      var select_dpto = document.getElementById("dpto_colonia");
      for (var i = 0; i < datos.length; i++) {
        var option = document.createElement("option");
        option.value = datos[i].DEPTO + datos[i].COLONIA;
        option.text = datos[i].DEPTO + datos[i].COLONIA;
        select_dpto.add(option);
      }
    });

  form.addEventListener("submit", function (event) {
    const codigo_tecnico = document.getElementById("codigo_tecnico").value;
    const telefono = document.getElementById("telefono").value;
    const tecnico = document.getElementById("tecnico").value;
    const motivo_llamada = document.getElementById("motivo_llamada").value;
    const select_orden = document.getElementById("select_orden").value;
    const tecnologia = document.getElementById("tecnologia").value;
    const dpto_colonia = document.getElementById("dpto_colonia").value;
    const Select_Postventa = document.getElementById("Select_Postventa").value;

    // OBTENEMOS EL SELECT POSTVENTA
    const selectPostventa = document.querySelector(
      "select[name='Select_Postventa']"
    );

    const selectTecnologia = document.querySelector(
      "select[name='tecnologia']"
    );

    switch (selectPostventa.value + "|" + selectTecnologia.value) {
      case "ADICION|HFC":
        const TipoActividadAdicionHfc = document.getElementById(
          "TipoActividadAdicionHfc"
        ).value;
        const equipostvAdicionHfc1 = document.getElementById(
          "equipostvAdicionHfc1"
        ).value;
        const equipostvAdicionHfc2 = document.getElementById(
          "equipostvAdicionHfc2"
        ).value;
        const equipostvAdicionHfc3 = document.getElementById(
          "equipostvAdicionHfc3"
        ).value;
        const equipostvAdicionHfc4 = document.getElementById(
          "equipostvAdicionHfc4"
        ).value;
        const equipostvAdicionHfc5 = document.getElementById(
          "equipostvAdicionHfc5"
        ).value;
        const NOrdenAdicionHfc =
          document.getElementById("NOrdenAdicionHfc").value;
        const TrabajadoAdicionHfc = document.getElementById(
          "TrabajadoAdicionHfc"
        ).value;
        const obvsAdicionHfc = document.getElementById("obvsAdicionHfc").value;
        const RecibeAdicionHfc =
          document.getElementById("RecibeAdicionHfc").value;

        if (TipoActividadAdicionHfc === "REALIZADA") {
          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            Select_Postventa === "" ||
            select_orden === "" ||
            dpto_colonia === "" ||
            tecnologia === "" ||
            TipoActividadAdicionHfc === "" ||
            NOrdenAdicionHfc === "" ||
            TrabajadoAdicionHfc === "" ||
            obvsAdicionHfc === "" ||
            RecibeAdicionHfc === ""
          ) {
            Swal.fire({
              icon: "error",
              title: "LOS CAMPOS NO PUEDEN IR VACIOS",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }

          let errorMensajeTv = "";

          switch (Select_Postventa) {
            case "ADICION":
              if (
                equipostvAdicionHfc1 === "" &&
                equipostvAdicionHfc2 === "" &&
                equipostvAdicionHfc3 === "" &&
                equipostvAdicionHfc4 === "" &&
                equipostvAdicionHfc5 === ""
              ) {
                errorMensajeTv = "Debes ingresar al menos un Equipo TV";
              }
              if (
                equipostvAdicionHfc1 !== "" &&
                parseInt(equipostvAdicionHfc1.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
              }
              if (
                equipostvAdicionHfc2 !== "" &&
                parseInt(equipostvAdicionHfc2.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
              }
              if (
                equipostvAdicionHfc3 !== "" &&
                parseInt(equipostvAdicionHfc3.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3 .";
              }
              if (
                equipostvAdicionHfc4 !== "" &&
                parseInt(equipostvAdicionHfc4.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
              }
              if (
                equipostvAdicionHfc5 !== "" &&
                parseInt(equipostvAdicionHfc5.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
              }
              break;
          }

          if (errorMensajeTv !== "") {
            Swal.fire({
              icon: "error",
              title: errorMensajeTv,
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }
          if (parseInt(NOrdenAdicionHfc.length) !== 8) {
            // checkError.style.display = "block";
            Swal.fire({
              icon: "error",
              title: "El N° Orden debe tener 8 digitos",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }
        }
        break;
    }
  });
});
