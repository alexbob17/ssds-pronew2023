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
      case "ADICION|GPON":
        const TipoActividadAdicionGpon = document.getElementById(
          "TipoActividadAdicionGpon"
        ).value;
        const equipostvAdicionGpon1 = document.getElementById(
          "equipostvAdicionGpon1"
        ).value;
        const equipostvAdicionGpon2 = document.getElementById(
          "equipostvAdicionGpon2"
        ).value;
        const equipostvAdicionGpon3 = document.getElementById(
          "equipostvAdicionGpon3"
        ).value;
        const equipostvAdicionGpon4 = document.getElementById(
          "equipostvAdicionGpon4"
        ).value;
        const equipostvAdicionGpon5 = document.getElementById(
          "equipostvAdicionGpon5"
        ).value;
        const NOrdenAdicionGpon =
          document.getElementById("NOrdenAdicionGpon").value;
        const TrabajadoAdicionGpon = document.getElementById(
          "TrabajadoAdicionGpon"
        ).value;
        const ObvsAdicionGpon =
          document.getElementById("ObvsAdicionGpon").value;
        const RecibeAdicionGpon =
          document.getElementById("RecibeAdicionGpon").value;

        if (TipoActividadAdicionGpon === "REALIZADA") {
          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            Select_Postventa === "" ||
            select_orden === "" ||
            dpto_colonia === "" ||
            tecnologia === "" ||
            TipoActividadAdicionGpon === "" ||
            // equipostvAdicionDth1 === "" ||
            // equipostvAdicionDth2 === "" ||
            // equipostvAdicionDth3 === "" ||
            // equipostvAdicionDth4 === "" ||
            // equipostvAdicionDth5 === "" ||
            NOrdenAdicionGpon === "" ||
            TrabajadoAdicionGpon === "" ||
            ObvsAdicionGpon === "" ||
            RecibeAdicionGpon === ""
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
                equipostvAdicionGpon1 === "" &&
                equipostvAdicionGpon2 === "" &&
                equipostvAdicionGpon3 === "" &&
                equipostvAdicionGpon4 === "" &&
                equipostvAdicionGpon5 === ""
              ) {
                errorMensajeTv = "Debes ingresar al menos un Equipo TV";
              }
              if (
                equipostvAdicionGpon1 !== "" &&
                parseInt(equipostvAdicionGpon1.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
              }
              if (
                equipostvAdicionGpon2 !== "" &&
                parseInt(equipostvAdicionGpon2.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
              }
              if (
                equipostvAdicionGpon3 !== "" &&
                parseInt(equipostvAdicionGpon3.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3 .";
              }
              if (
                equipostvAdicionGpon4 !== "" &&
                parseInt(equipostvAdicionGpon4.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
              }
              if (
                equipostvAdicionGpon5 !== "" &&
                parseInt(equipostvAdicionGpon5.length) !== 12
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
          if (parseInt(NOrdenAdicionGpon.length) !== 8) {
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
