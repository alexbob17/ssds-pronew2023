const tecnologia = document.getElementById("tecnologia");
const checkValid = document.querySelectorAll(".checkValid");
const checkError = document.querySelectorAll(".checkError");
const inputs = document.querySelectorAll("input");
// const checkValid1 = document.getElementById("checkValid1");
// const checkError1 = document.getElementById("checkError1");
const regexCoordenadas =
  /^[-]?[0-9]{1,2}[.]?[0-9]*[,][-]?[0-9]{1,3}[.]?[0-9]*$/;

// Ocultar todos los elementos al principio
checkValid.forEach(function (el) {
  el.style.display = "none";
});
checkError.forEach(function (el) {
  el.style.display = "none";
});

const form = document.getElementById("form1");
const selectElements = form.querySelectorAll("select");

form.addEventListener("submit", function (event) {
  // event.preventDefault();

  const codigo_tecnico = document.getElementById("codigo_tecnico").value;
  const telefono = document.getElementById("telefono").value;
  const tecnico = document.getElementById("tecnico").value;
  const motivo_llamada = document.getElementById("motivo_llamada").value;
  const select_orden = document.getElementById("select_orden").value;
  const dpto_colonia = document.getElementById("dpto_colonia").value;
  switch (
    tecnologia.value // Usamos .value para obtener el valor del campo select
  ) {
    case "HFC":
      const TipoActividadReparacionHfc = document.getElementById(
        "TipoActividadReparacionHfc"
      ).value;

      const CodigoCausaHfc = document.getElementById("CodigoCausaHfc").value;

      const DescripcionCausaDañoHfc = document.getElementById(
        "DescripcionCausaDañoHfc"
      ).value;
      const DescripcionTipoDañoHfc = document.getElementById(
        "DescripcionTipoDañoHfc"
      ).value;
      const DescripcionUbicacionHfc = document.getElementById(
        "DescripcionUbicacionHfc"
      ).value;
      const OrdenHfc = document.getElementById("OrdenHfc").value;
      const syrengHfc = document.getElementById("syrengHfc").value;
      const ObservacionesHfc =
        document.getElementById("ObservacionesHfc").value;
      const RecibeHfc = document.getElementById("RecibeHfc").value;
      const TrabajadoHfcRealizado = document.getElementById(
        "TrabajadoHfcRealizado"
      ).value;

      if (TipoActividadReparacionHfc === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          TipoActividadReparacionHfc === "" ||
          CodigoCausaHfc === "" ||
          DescripcionCausaDañoHfc === "" ||
          DescripcionTipoDañoHfc === "" ||
          DescripcionUbicacionHfc === "" ||
          OrdenHfc === "" ||
          syrengHfc === "" ||
          ObservacionesHfc === "" ||
          RecibeHfc === "" ||
          TrabajadoHfcRealizado === ""
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

        if (parseInt(OrdenHfc.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(syrengHfc.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Syreng debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReparacionHfc === "OBJETADA") {
        const MotivoObjetada_Hfc =
          document.getElementById("MotivoObjetada_Hfc").value;

        const OrdenObjHfc = document.getElementById("OrdenObjHfc").value;
        const TrabajadoReparacionesObjetadaHfc = document.getElementById(
          "TrabajadoReparacionesObjetadaHfc"
        ).value;

        const ComentariosObjetados_Hfc = document.getElementById(
          "ComentariosObjetados_Hfc"
        ).value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          TipoActividadReparacionHfc === "" ||
          MotivoObjetada_Hfc === "" ||
          OrdenObjHfc === "" ||
          TrabajadoReparacionesObjetadaHfc === "" ||
          ComentariosObjetados_Hfc === ""
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
        if (parseInt(OrdenObjHfc.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReparacionHfc === "TRANSFERIDA") {
        const OrdenTransfHfc = document.getElementById("OrdenTransfHfc").value;

        const ObvsTransfHfc = document.getElementById("ObvsTransfHfc").value;
        const ComentarioTransfHfc = document.getElementById(
          "ComentarioTransfHfc"
        ).value;

        const TrabajadoTransfHfc =
          document.getElementById("TrabajadoTransfHfc").value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          TipoActividadReparacionHfc === "" ||
          OrdenTransfHfc === "" ||
          ObvsTransfHfc === "" ||
          ComentarioTransfHfc === "" ||
          TrabajadoTransfHfc === ""
        ) {
          // checkError.style.display = "block";
          // checkError1.style.display = "block";

          Swal.fire({
            icon: "error",
            title: "LOS CAMPOS NO PUEDEN IR VACIOS",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(OrdenTransfHfc.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      }
      break;
    case "GPON":
      const TipoActividadReparacionGpon = document.getElementById(
        "TipoActividadReparacionGpon"
      ).value;

      const CodigoCausaGpon = document.getElementById("CodigoCausaGpon").value;

      const DescripcionCausaDañoGpon = document.getElementById(
        "DescripcionCausaDañoGpon"
      ).value;
      const DescripcionTipoDañoGpon = document.getElementById(
        "DescripcionTipoDañoGpon"
      ).value;
      const DescripcionUbicacionGpon = document.getElementById(
        "DescripcionUbicacionGpon"
      ).value;
      const OrdenRealizadoGpon =
        document.getElementById("OrdenRealizadoGpon").value;
      const syrengGpon = document.getElementById("syrengGpon").value;
      const ObservacionesGpon =
        document.getElementById("ObservacionesGpon").value;
      const RecibeGpon = document.getElementById("RecibeGpon").value;
      const TrabajadoReparacionesGpon = document.getElementById(
        "TrabajadoReparacionesGpon"
      ).value;

      if (TipoActividadReparacionGpon === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          TipoActividadReparacionGpon === "" ||
          CodigoCausaGpon === "" ||
          DescripcionCausaDañoGpon === "" ||
          DescripcionTipoDañoGpon === "" ||
          DescripcionUbicacionGpon === "" ||
          OrdenRealizadoGpon === "" ||
          syrengGpon === "" ||
          ObservacionesGpon === "" ||
          RecibeGpon === "" ||
          TrabajadoReparacionesGpon === ""
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

        if (parseInt(OrdenRealizadoGpon.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(syrengGpon.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Syreng debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReparacionGpon === "OBJETADA") {
        const MotivoObjetada_Gpon = document.getElementById(
          "MotivoObjetada_Gpon"
        ).value;

        const OrdenObjGpon = document.getElementById("OrdenObjGpon").value;
        const TrabajadoObjetadaGpon = document.getElementById(
          "TrabajadoObjetadaGpon"
        ).value;

        const ComentariosObjGpon =
          document.getElementById("ComentariosObjGpon").value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          TipoActividadReparacionGpon === "" ||
          MotivoObjetada_Gpon === "" ||
          OrdenObjGpon === "" ||
          TrabajadoObjetadaGpon === "" ||
          ComentariosObjGpon === ""
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
        if (parseInt(OrdenObjGpon.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReparacionGpon === "TRANSFERIDA") {
        const OrdenTransGpon = document.getElementById("OrdenTransGpon").value;

        const ObvsTransfGpon = document.getElementById("ObvsTransfGpon").value;
        const ComentarioTransfGpon = document.getElementById(
          "ComentarioTransfGpon"
        ).value;

        const TrabajadoTransfGpon = document.getElementById(
          "TrabajadoTransfGpon"
        ).value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          TipoActividadReparacionGpon === "" ||
          OrdenTransGpon === "" ||
          ObvsTransfGpon === "" ||
          ComentarioTransfGpon === "" ||
          TrabajadoTransfGpon === ""
        ) {
          // checkError.style.display = "block";
          // checkError1.style.display = "block";

          Swal.fire({
            icon: "error",
            title: "LOS CAMPOS NO PUEDEN IR VACIOS",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(OrdenTransGpon.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      }
      break;
    case "DTH":
      const TipoActividadReparacionDth = document.getElementById(
        "TipoActividadReparacionDth"
      ).value;

      const CodigoCausaDth = document.getElementById("CodigoCausaDth").value;
      const DescripcionCausaDth = document.getElementById(
        "DescripcionCausaDth"
      ).value;
      const DescripcionTipoDañoDth = document.getElementById(
        "DescripcionTipoDañoDth"
      ).value;
      const DescripcionUbicacionDañoDth = document.getElementById(
        "DescripcionUbicacionDañoDth"
      ).value;
      const OrdenDthRealizada =
        document.getElementById("OrdenDthRealizada").value;
      const syrengDthRealizado =
        document.getElementById("syrengDthRealizado").value;
      const ObservacionesDth =
        document.getElementById("ObservacionesDth").value;
      const RecibeDth = document.getElementById("RecibeDth").value;
      const TrabajadoDth = document.getElementById("TrabajadoDth").value;

      if (TipoActividadReparacionDth === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          TipoActividadReparacionDth === "" ||
          CodigoCausaDth === "" ||
          DescripcionCausaDth === "" ||
          DescripcionTipoDañoDth === "" ||
          DescripcionUbicacionDañoDth === "" ||
          OrdenDthRealizada === "" ||
          syrengDthRealizado === "" ||
          ObservacionesDth === "" ||
          RecibeDth === "" ||
          TrabajadoDth === ""
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

        if (parseInt(OrdenDthRealizada.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(syrengDthRealizado.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Syreng debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReparacionDth === "OBJETADA") {
        const MotivoObjetada_Dth =
          document.getElementById("MotivoObjetada_Dth").value;

        const OrdenObjDth = document.getElementById("OrdenObjDth").value;
        const TrabajadoObjetadaDth = document.getElementById(
          "TrabajadoObjetadaDth"
        ).value;

        const ComentariosObjetadosDth = document.getElementById(
          "ComentariosObjetadosDth"
        ).value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          TipoActividadReparacionDth === "" ||
          MotivoObjetada_Dth === "" ||
          OrdenObjDth === "" ||
          TrabajadoObjetadaDth === "" ||
          ComentariosObjetadosDth === ""
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
        if (parseInt(OrdenObjDth.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReparacionDth === "TRANSFERIDA") {
        const OrdenTransferidoDth = document.getElementById(
          "OrdenTransferidoDth"
        ).value;

        const ObvsTransferidoDth =
          document.getElementById("ObvsTransferidoDth").value;
        const ComentarioTransferidoDth = document.getElementById(
          "ComentarioTransferidoDth"
        ).value;

        const TrabajadoTransferidoDth = document.getElementById(
          "TrabajadoTransferidoDth"
        ).value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          TipoActividadReparacionDth === "" ||
          OrdenTransferidoDth === "" ||
          ObvsTransferidoDth === "" ||
          ComentarioTransferidoDth === "" ||
          TrabajadoTransferidoDth === ""
        ) {
          // checkError.style.display = "block";
          // checkError1.style.display = "block";

          Swal.fire({
            icon: "error",
            title: "LOS CAMPOS NO PUEDEN IR VACIOS",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(OrdenTransferidoDth.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      }
      break;
    case "COBRE":
      const TipoActividadReparacionCobre = document.getElementById(
        "TipoActividadReparacionCobre"
      ).value;

      const CodigoCausaCobre =
        document.getElementById("CodigoCausaCobre").value;

      const DescripcionCausaCobre = document.getElementById(
        "DescripcionCausaCobre"
      ).value;
      const DescripcionTipoDañoCobre = document.getElementById(
        "DescripcionTipoDañoCobre"
      ).value;
      const DescripcionUbicacionDañoCobre = document.getElementById(
        "DescripcionUbicacionDañoCobre"
      ).value;
      const OrdenReparacionCobre = document.getElementById(
        "OrdenReparacionCobre"
      ).value;
      const syrengReparacionCobre = document.getElementById(
        "syrengReparacionCobre"
      ).value;
      const ObservacionesCobre =
        document.getElementById("ObservacionesCobre").value;
      const RecibeCobre = document.getElementById("RecibeCobre").value;
      const TrabajadoReparacionCobre = document.getElementById(
        "TrabajadoReparacionCobre"
      ).value;

      if (TipoActividadReparacionCobre === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          TipoActividadReparacionCobre === "" ||
          CodigoCausaCobre === "" ||
          DescripcionCausaCobre === "" ||
          DescripcionTipoDañoCobre === "" ||
          DescripcionUbicacionDañoCobre === "" ||
          OrdenReparacionCobre === "" ||
          syrengReparacionCobre === "" ||
          ObservacionesCobre === "" ||
          TrabajadoReparacionCobre === "" ||
          RecibeCobre === ""
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

        if (parseInt(OrdenReparacionCobre.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(syrengReparacionCobre.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Syreng debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReparacionCobre === "OBJETADA") {
        const MotivoObjetada_Cobre = document.getElementById(
          "MotivoObjetada_Cobre"
        ).value;

        const OrdenObjReparacionCobre = document.getElementById(
          "OrdenObjReparacionCobre"
        ).value;
        const TrabajadoObjetadaCobre = document.getElementById(
          "TrabajadoObjetadaCobre"
        ).value;

        const ComentariosObjetados_Cobre = document.getElementById(
          "ComentariosObjetados_Cobre"
        ).value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          TipoActividadReparacionCobre === "" ||
          MotivoObjetada_Cobre === "" ||
          OrdenObjReparacionCobre === "" ||
          TrabajadoObjetadaCobre === "" ||
          ComentariosObjetados_Cobre === ""
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
        if (parseInt(OrdenObjReparacionCobre.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReparacionCobre === "TRANSFERIDA") {
        const OrdenTransfCobre =
          document.getElementById("OrdenTransfCobre").value;

        const ObvsCobreTransferido = document.getElementById(
          "ObvsCobreTransferido"
        ).value;
        const ComentarioCobreTransferido = document.getElementById(
          "ComentarioCobreTransferido"
        ).value;

        const TrabajadoCobreTransferido = document.getElementById(
          "TrabajadoCobreTransferido"
        ).value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          TipoActividadReparacionCobre === "" ||
          OrdenTransfCobre === "" ||
          ObvsCobreTransferido === "" ||
          ComentarioCobreTransferido === "" ||
          TrabajadoCobreTransferido === ""
        ) {
          // checkError.style.display = "block";
          // checkError1.style.display = "block";

          Swal.fire({
            icon: "error",
            title: "LOS CAMPOS NO PUEDEN IR VACIOS",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(OrdenTransfCobre.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      }
      break;
    case "ADSL":
      const TipoActividadReparacionAdsl = document.getElementById(
        "TipoActividadReparacionAdsl"
      ).value;

      const CodigoCausaAdsl = document.getElementById("CodigoCausaAdsl").value;
      // const CodigoTipoDañoAdsl =
      //   document.getElementById("CodigoTipoDañoAdsl").value;
      // const CodigoUbicacionDañoAdsl = document.getElementById(
      //   "CodigoUbicacionDañoAdsl"
      // ).value;
      const DescripcionCausaAdsl = document.getElementById(
        "DescripcionCausaAdsl"
      ).value;
      const DescripcionTipoDañoAdsl = document.getElementById(
        "DescripcionTipoDañoAdsl"
      ).value;
      const DescripcionUbicacionDañoAdsl = document.getElementById(
        "DescripcionUbicacionDañoAdsl"
      ).value;
      const OrdenAdslRealizado =
        document.getElementById("OrdenAdslRealizado").value;
      const syrengAdsl = document.getElementById("syrengAdsl").value;
      const ObservacionesAdsl =
        document.getElementById("ObservacionesAdsl").value;
      const RecibeAdsl = document.getElementById("RecibeAdsl").value;
      const TrabajadoAdsl = document.getElementById("TrabajadoAdsl").value;

      if (TipoActividadReparacionAdsl === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          TipoActividadReparacionAdsl === "" ||
          CodigoCausaAdsl === "" ||
          DescripcionCausaAdsl === "" ||
          DescripcionTipoDañoAdsl === "" ||
          DescripcionUbicacionDañoAdsl === "" ||
          OrdenAdslRealizado === "" ||
          syrengAdsl === "" ||
          ObservacionesAdsl === "" ||
          TrabajadoAdsl === "" ||
          RecibeAdsl === ""
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

        if (parseInt(OrdenAdslRealizado.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(syrengAdsl.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Syreng debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReparacionAdsl === "OBJETADA") {
        const MotivoObjetada_Adsl = document.getElementById(
          "MotivoObjetada_Adsl"
        ).value;

        const OrdenObjAdsl = document.getElementById("OrdenObjAdsl").value;
        const TrabajadoObjetadaAdsl = document.getElementById(
          "TrabajadoObjetadaAdsl"
        ).value;

        const ComentsObjAdsl = document.getElementById("ComentsObjAdsl").value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          TipoActividadReparacionAdsl === "" ||
          MotivoObjetada_Adsl === "" ||
          OrdenObjAdsl === "" ||
          TrabajadoObjetadaAdsl === "" ||
          ComentsObjAdsl === ""
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
        if (parseInt(OrdenObjAdsl.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadReparacionAdsl === "TRANSFERIDA") {
        const OrdenTransferidoAdsl = document.getElementById(
          "OrdenTransferidoAdsl"
        ).value;

        const ObvsAdslTransferido = document.getElementById(
          "ObvsAdslTransferido"
        ).value;
        const TrabajadoTransferidoAdsl = document.getElementById(
          "TrabajadoTransferidoAdsl"
        ).value;

        const ComentsTransferidoAdsl = document.getElementById(
          "ComentsTransferidoAdsl"
        ).value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          TipoActividadReparacionAdsl === "" ||
          OrdenTransferidoAdsl === "" ||
          ObvsAdslTransferido === "" ||
          TrabajadoTransferidoAdsl === "" ||
          ComentsTransferidoAdsl === ""
        ) {
          // checkError.style.display = "block";
          // checkError1.style.display = "block";

          Swal.fire({
            icon: "error",
            title: "LOS CAMPOS NO PUEDEN IR VACIOS",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(OrdenTransferidoAdsl.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      }
      break;
  }

  // form.reset();
});
