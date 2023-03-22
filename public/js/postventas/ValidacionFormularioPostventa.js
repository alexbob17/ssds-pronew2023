const form = document.getElementById("form1");

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

  const selectTecnologia = document.querySelector("select[name='tecnologia']");

  switch (selectPostventa.value + "|" + selectTecnologia.value) {
    case "MIGRACION|HFC":
      const TipoActividadMigracionHfc = document.getElementById(
        "TipoActividadMigracionHfc"
      ).value;

      const equipotvmigracion1 =
        document.getElementById("equipotvmigracion1").value;
      const equipotvmigracion2 =
        document.getElementById("equipotvmigracion2").value;
      const equipotvmigracion3 =
        document.getElementById("equipotvmigracion3").value;
      const equipotvmigracion4 =
        document.getElementById("equipotvmigracion4").value;
      const equipotvmigracion5 =
        document.getElementById("equipotvmigracion5").value;
      const NOrdenMigracionHfc =
        document.getElementById("NOrdenMigracionHfc").value;
      const SyrengMigracionHfc =
        document.getElementById("SyrengMigracionHfc").value;
      const SapMigracionHfc = document.getElementById("SapMigracionHfc").value;
      const ObvsMigracionHfc =
        document.getElementById("ObvsMigracionHfc").value;
      const TrabajadoMigracionHfc = document.getElementById(
        "TrabajadoMigracionHfc"
      ).value;
      const RecibeMigracionHfc =
        document.getElementById("RecibeMigracionHfc").value;
      const NodoMigracionHfc =
        document.getElementById("NodoMigracionHfc").value;
      const TapMigracionRealizadaHfc = document.getElementById(
        "TapMigracionRealizadaHfc"
      ).value;
      const PosicionMigracionHfc = document.getElementById(
        "PosicionMigracionHfc"
      ).value;
      const GeorefMigracionHfc =
        document.getElementById("GeorefMigracionHfc").value;
      const MaterialesMigracionHfc = document.getElementById(
        "MaterialesMigracionHfc"
      ).value;

      if (TipoActividadMigracionHfc === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadMigracionHfc === "" ||
          NOrdenMigracionHfc === "" ||
          SyrengMigracionHfc === "" ||
          SapMigracionHfc === "" ||
          ObvsMigracionHfc === "" ||
          TrabajadoMigracionHfc === "" ||
          RecibeMigracionHfc === "" ||
          NodoMigracionHfc === "" ||
          TapMigracionRealizadaHfc === "" ||
          PosicionMigracionHfc === "" ||
          GeorefMigracionHfc === "" ||
          MaterialesMigracionHfc === ""
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

        if (!/^\d{8}$/.test(NOrdenMigracionHfc)) {
          Swal.fire({
            icon: "error",
            title: "El N° de orden debe tener 8 digitos validos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        // VALIDAR POR EQUIPO DE TV

        let errorMensajeTv = "";

        switch (Select_Postventa) {
          case "MIGRACION":
            if (
              equipotvmigracion1 === "" &&
              equipotvmigracion2 === "" &&
              equipotvmigracion3 === "" &&
              equipotvmigracion4 === "" &&
              equipotvmigracion5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (!/^[a-zA-Z0-9]{10}$/.test(equipotvmigracion1)) {
              errorMensajeTv =
                "Debes ingresar 10 caracteres alfanuméricos en Equipo Tv 1.";
            }
            if (!/^[a-zA-Z0-9]{10}$/.test(equipotvmigracion2)) {
              errorMensajeTv =
                "Debes ingresar 10 caracteres alfanuméricos en Equipo Tv 2.";
            }
            if (!/^[a-zA-Z0-9]{10}$/.test(equipotvmigracion3)) {
              errorMensajeTv =
                "Debes ingresar 10 caracteres alfanuméricos en Equipo Tv 3.";
            }
            if (!/^[a-zA-Z0-9]{10}$/.test(equipotvmigracion4)) {
              errorMensajeTv =
                "Debes ingresar 10 caracteres alfanuméricos en Equipo Tv 4.";
            }
            if (!/^[a-zA-Z0-9]{10}$/.test(equipotvmigracion5)) {
              errorMensajeTv =
                "Debes ingresar 10 caracteres alfanuméricos en Equipo Tv 5.";
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
      } else if (TipoActividadMigracionHfc === "OBJETADA") {
        const MotivoMigracionObjHfc = document.getElementById(
          "MotivoMigracionObjHfc"
        ).value;

        const OrdenMigracionHfcObj = document.getElementById(
          "OrdenMigracionHfcObj"
        ).value;

        const TrabajadoMigracionObjHfc = document.getElementById(
          "TrabajadoMigracionObjHfc"
        ).value;

        const ObvsMigracionObjHfc = document.getElementById(
          "ObvsMigracionObjHfc"
        ).value;

        const ComentsMigracionObjHfc = document.getElementById(
          "ComentsMigracionObjHfc"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadMigracionHfc === "" ||
          MotivoMigracionObjHfc === "" ||
          OrdenMigracionHfcObj === "" ||
          TrabajadoMigracionObjHfc === "" ||
          ObvsMigracionObjHfc === "" ||
          ComentsMigracionObjHfc === ""
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

        if (parseInt(OrdenMigracionHfcObj.length) !== 8) {
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
      } else if (TipoActividadMigracionHfc === "ANULACION") {
        const MotivoMigracionAnulada_Hfc = document.getElementById(
          "MotivoMigracionAnulada_Hfc"
        ).value;
        const NOrdenMigracionAnuladaHfc = document.getElementById(
          "NOrdenMigracionAnuladaHfc"
        ).value;
        const TrabajadoMigracionAnulada_Hfc = document.getElementById(
          "TrabajadoMigracionAnulada_Hfc"
        ).value;
        const ComentarioMigracionAnulada_Hfc = document.getElementById(
          "ComentarioMigracionAnulada_Hfc"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadMigracionHfc === "" ||
          MotivoMigracionAnulada_Hfc === "" ||
          NOrdenMigracionAnuladaHfc === "" ||
          TrabajadoMigracionAnulada_Hfc === "" ||
          ComentarioMigracionAnulada_Hfc === ""
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
        if (parseInt(NOrdenMigracionAnuladaHfc.length) !== 8) {
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
      } else if (TipoActividadMigracionHfc === "TRANSFERIDA") {
        const OrdenMigracionTranfHfc = document.getElementById(
          "OrdenMigracionTranfHfc"
        ).value;
        const MotivoTransMigracionHfc = document.getElementById(
          "MotivoTransMigracionHfc"
        ).value;
        const TrabajadoMigracionTransHfc = document.getElementById(
          "TrabajadoMigracionTransHfc"
        ).value;
        const ComentsMigracionTransHfc = document.getElementById(
          "ComentsMigracionTransHfc"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadMigracionHfc === "" ||
          OrdenMigracionTranfHfc === "" ||
          MotivoTransMigracionHfc === "" ||
          TrabajadoMigracionTransHfc === "" ||
          ComentsMigracionTransHfc === ""
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
        if (parseInt(OrdenMigracionTranfHfc.length) !== 8) {
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
    case "RECONEXION / RETIRO|HFC":
      const TipoActividadReconexionHfc = document.getElementById(
        "TipoActividadReconexionHfc"
      ).value;
      const EquipoModemRetiroHfc = document.getElementById(
        "EquipoModemRetiroHfc"
      ).value;

      const OrdenRetiroHfc = document.getElementById("OrdenRetiroHfc").value;
      const TrabajadoRetiroHfc =
        document.getElementById("TrabajadoRetiroHfc").value;
      const ObvsRetiroHfc = document.getElementById("ObvsRetiroHfc").value;
      const RecibeRetiroHfc = document.getElementById("RecibeRetiroHfc").value;
      const MaterialesRetiroHfc = document.getElementById(
        "MaterialesRetiroHfc"
      ).value;

      if (TipoActividadReconexionHfc === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadReconexionHfc === "" ||
          OrdenRetiroHfc === "" ||
          TrabajadoRetiroHfc === "" ||
          ObvsRetiroHfc === "" ||
          RecibeRetiroHfc === "" ||
          MaterialesRetiroHfc === ""
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
        if (parseInt(OrdenRetiroHfc.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "El N° de orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        let errorMensaje = "";

        switch (select_orden) {
          case "RETIRO EQUIPOS":
            if (EquipoModemRetiroHfc === "") {
              errorMensaje = "Debes ingresar el N° Equipo";
            }
            if (
              EquipoModemRetiroHfc !== "" &&
              parseInt(EquipoModemRetiroHfc.length) !== 12
            ) {
              errorMensaje = "Debes ingresar 12 digitos en N° Equipo";
            }

            break;
        }

        if (errorMensaje !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensaje,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReconexionHfc === "OBJETADA") {
        const MotivoObjRetiroHfc =
          document.getElementById("MotivoObjRetiroHfc").value;

        const OrdenRetiroObjHfc =
          document.getElementById("OrdenRetiroObjHfc").value;

        const TrabajadoObjRetiroHfc = document.getElementById(
          "TrabajadoObjRetiroHfc"
        ).value;

        const ObvsObjRetiroHfc =
          document.getElementById("ObvsObjRetiroHfc").value;

        const ComentariosRetiroObjHfc = document.getElementById(
          "ComentariosRetiroObjHfc"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadReconexionHfc === "" ||
          MotivoObjRetiroHfc === "" ||
          OrdenRetiroObjHfc === "" ||
          TrabajadoObjRetiroHfc === "" ||
          ObvsObjRetiroHfc === "" ||
          ComentariosRetiroObjHfc === ""
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

        if (parseInt(OrdenRetiroObjHfc.length) !== 8) {
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
      } else if (TipoActividadReconexionHfc === "ANULACION") {
        const MotivoRetiroAnulada_Hfc = document.getElementById(
          "MotivoRetiroAnulada_Hfc"
        ).value;
        const OrdenRetiroAnulacionHfc = document.getElementById(
          "OrdenRetiroAnulacionHfc"
        ).value;
        const TrabajadoRetiroAnulada_Hfc = document.getElementById(
          "TrabajadoRetiroAnulada_Hfc"
        ).value;
        const ComentsRetiroAnulada_Hfc = document.getElementById(
          "ComentsRetiroAnulada_Hfc"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadReconexionHfc === "" ||
          MotivoRetiroAnulada_Hfc === "" ||
          TrabajadoRetiroAnulada_Hfc === "" ||
          OrdenRetiroAnulacionHfc === "" ||
          ComentsRetiroAnulada_Hfc === ""
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
        if (parseInt(OrdenRetiroAnulacionHfc.length) !== 8) {
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
    case "CAMBIO NUMERO COBRE|COBRE":
      const TipoActividadCambioNumeroCobre = document.getElementById(
        "TipoActividadCambioNumeroCobre"
      ).value;
      const NumeroCobreCambio =
        document.getElementById("NumeroCobreCambio").value;
      const OrdenCambioCobre =
        document.getElementById("OrdenCambioCobre").value;
      const TrabajadoCambioCobre = document.getElementById(
        "TrabajadoCambioCobre"
      ).value;
      const ObvsCambioCobre = document.getElementById("ObvsCambioCobre").value;
      const RecibeCambioCobre =
        document.getElementById("RecibeCambioCobre").value;

      if (TipoActividadCambioNumeroCobre === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadCambioNumeroCobre === "" ||
          NumeroCobreCambio === "" ||
          OrdenCambioCobre === "" ||
          TrabajadoCambioCobre === "" ||
          ObvsCambioCobre === "" ||
          RecibeCambioCobre === ""
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
        if (parseInt(OrdenCambioCobre.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "El N° de orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
        if (parseInt(NumeroCobreCambio.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "El N° de cobre debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadCambioNumeroCobre === "OBJETADA") {
        const MotivoObjCambioCobre = document.getElementById(
          "MotivoObjCambioCobre"
        ).value;
        const OrdenObjCambioCobre = document.getElementById(
          "OrdenObjCambioCobre"
        ).value;
        const TrabajadoObjCambioCobre = document.getElementById(
          "TrabajadoObjCambioCobre"
        ).value;
        const ObvsObjCambioCobre =
          document.getElementById("ObvsObjCambioCobre").value;
        const ComentariosCambioCobre = document.getElementById(
          "ComentariosCambioCobre"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadCambioNumeroCobre === "" ||
          MotivoObjCambioCobre === "" ||
          OrdenObjCambioCobre === "" ||
          TrabajadoObjCambioCobre === "" ||
          ObvsObjCambioCobre === "" ||
          ComentariosCambioCobre === ""
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

        if (parseInt(OrdenObjCambioCobre.length) !== 8) {
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
      } else if (TipoActividadCambioNumeroCobre === "ANULACION") {
        const MotivoAnuladaCambioCobre = document.getElementById(
          "MotivoAnuladaCambioCobre"
        ).value;
        const OrdenAnuladaCambioCobre = document.getElementById(
          "OrdenAnuladaCambioCobre"
        ).value;
        const TrabajadoAnuladaCambioCobre = document.getElementById(
          "TrabajadoAnuladaCambioCobre"
        ).value;
        const ComentarioAnuladaCambioCobre = document.getElementById(
          "ComentarioAnuladaCambioCobre"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadCambioNumeroCobre === "" ||
          MotivoAnuladaCambioCobre === "" ||
          OrdenAnuladaCambioCobre === "" ||
          TrabajadoAnuladaCambioCobre === "" ||
          ComentarioAnuladaCambioCobre === ""
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
        if (parseInt(OrdenAnuladaCambioCobre.length) !== 8) {
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
