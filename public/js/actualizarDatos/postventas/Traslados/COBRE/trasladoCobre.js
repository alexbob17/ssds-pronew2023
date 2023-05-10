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
      case "TRASLADO|COBRE":
        const TipoActividadTrasladoCobre = document.getElementById(
          "TipoActividadTrasladoCobre"
        ).value;

        const OrdenTrasladoCobre =
          document.getElementById("OrdenTrasladoCobre").value;
        const GeorefTrasladoCobre = document.getElementById(
          "GeorefTrasladoCobre"
        ).value;
        const MaterialesTrasladoCobre = document.getElementById(
          "MaterialesTrasladoCobre"
        ).value;
        const TrabajadoTrasladoCobre = document.getElementById(
          "TrabajadoTrasladoCobre"
        ).value;
        const ObvsTrasladoCobre =
          document.getElementById("ObvsTrasladoCobre").value;
        const RecibeTrasladoCobre = document.getElementById(
          "RecibeTrasladoCobre"
        ).value;

        if (TipoActividadTrasladoCobre === "REALIZADA") {
          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            Select_Postventa === "" ||
            select_orden === "" ||
            dpto_colonia === "" ||
            tecnologia === "" ||
            TipoActividadTrasladoCobre === "" ||
            OrdenTrasladoCobre === "" ||
            GeorefTrasladoCobre === "" ||
            MaterialesTrasladoCobre === "" ||
            TrabajadoTrasladoCobre === "" ||
            ObvsTrasladoCobre === "" ||
            RecibeTrasladoCobre === ""
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

          if (parseInt(OrdenTrasladoCobre.length) !== 8) {
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

          if (!regexCoordenadas.test(GeorefTrasladoCobre)) {
            // checkError.style.display = "block";
            Swal.fire({
              icon: "error",
              title:
                "Las coordenadas deben estar en el formato latitud, longitud",
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
