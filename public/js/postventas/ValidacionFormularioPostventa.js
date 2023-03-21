const form = document.getElementById("form1");

form.addEventListener("submit", function (event) {
  const codigo_tecnico = document.getElementById("codigo_tecnico").value;
  const telefono = document.getElementById("telefono").value;
  const tecnico = document.getElementById("tecnico").value;
  const motivo_llamada = document.getElementById("motivo_llamada").value;
  const select_orden = document.getElementById("select_orden").value;
  const dpto_colonia = document.getElementById("dpto_colonia").value;
  const Select_Postventa = document.getElementById("Select_Postventa").value;

  // OBTENEMOS EL SELECT POSTVENTA
  const selectPostventa = document.querySelector(
    "select[name='Select_Postventa']"
  );

  const selectTecnologia = document.querySelector("select[name='tecnologia']");

  switch (selectPostventa.value + "|" + selectTecnologia.value) {
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
      } else if (TipoActividadCambioNumeroCobre === "OBJETADA") {
        const MotivoObjTrasladoCobre = document.getElementById(
          "MotivoObjTrasladoCobre"
        ).value;
        const OrdenTrasladoObjCobres = document.getElementById(
          "OrdenTrasladoObjCobres"
        ).value;
        const TrabajadoTrasladoObjCobre = document.getElementById(
          "TrabajadoTrasladoObjCobre"
        ).value;
        const ObsObjTrasladoCobre = document.getElementById(
          "ObsObjTrasladoCobre"
        ).value;
        const ComentariosObjTrasladoCobre = document.getElementById(
          "ComentariosObjTrasladoCobre"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          TipoActividadCambioNumeroCobre === "" ||
          MotivoObjTrasladoCobre === "" ||
          OrdenTrasladoObjCobres === "" ||
          TrabajadoTrasladoObjCobre === "" ||
          ObsObjTrasladoCobre === "" ||
          ComentariosObjTrasladoCobre === ""
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
      }
      break;
  }
});
