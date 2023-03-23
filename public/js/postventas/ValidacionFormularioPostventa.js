const form = document.getElementById("form1");
const regexCoordenadas =
  /^[-]?[0-9]{1,2}[.]?[0-9]*[,][-]?[0-9]{1,3}[.]?[0-9]*$/;

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
            title: "El N° de orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadAdicionHfc === "OBJETADA") {
        const MotivoObjAdicionHfc = document.getElementById(
          "MotivoObjAdicionHfc"
        ).value;
        const OrdenAdicionObjHfc =
          document.getElementById("OrdenAdicionObjHfc").value;
        const TrabajadoObjAdicionHfc = document.getElementById(
          "TrabajadoObjAdicionHfc"
        ).value;
        const ObvsAdicionObjHfc =
          document.getElementById("ObvsAdicionObjHfc").value;
        const ComentariosObjAdicionHfc = document.getElementById(
          "ComentariosObjAdicionHfc"
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
          TipoActividadAdicionHfc === "" ||
          MotivoObjAdicionHfc === "" ||
          OrdenAdicionObjHfc === "" ||
          TrabajadoObjAdicionHfc === "" ||
          ObvsAdicionObjHfc === "" ||
          ComentariosObjAdicionHfc === ""
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

        if (parseInt(OrdenAdicionObjHfc.length) !== 8) {
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
      } else if (TipoActividadAdicionHfc === "ANULACION") {
        const MotivoAdicionAnulada_Hfc = document.getElementById(
          "MotivoAdicionAnulada_Hfc"
        ).value;
        const NOrdenAdicionAnuladaHfc = document.getElementById(
          "NOrdenAdicionAnuladaHfc"
        ).value;
        const TrabajadoAdicionAnulada_Hfc = document.getElementById(
          "TrabajadoAdicionAnulada_Hfc"
        ).value;
        const ComentarioAdicionAnulada_Hfc = document.getElementById(
          "ComentarioAdicionAnulada_Hfc"
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
          TipoActividadAdicionHfc === "" ||
          MotivoAdicionAnulada_Hfc === "" ||
          NOrdenAdicionAnuladaHfc === "" ||
          TrabajadoAdicionAnulada_Hfc === "" ||
          ComentarioAdicionAnulada_Hfc === ""
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
        if (parseInt(NOrdenAdicionAnuladaHfc.length) !== 8) {
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
      const ObvsAdicionGpon = document.getElementById("ObvsAdicionGpon").value;
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
            title: "El N° de orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadAdicionGpon === "OBJETADA") {
        const MotivoAdicionObjGpon = document.getElementById(
          "MotivoAdicionObjGpon"
        ).value;
        const NOrdenAdicionObjGpon = document.getElementById(
          "NOrdenAdicionObjGpon"
        ).value;
        const TrabajadoAdicionObjGpon = document.getElementById(
          "TrabajadoAdicionObjGpon"
        ).value;
        const ObvsAdicionObjGpon =
          document.getElementById("ObvsAdicionObjGpon").value;
        const ComentariosAdicionObjGpon = document.getElementById(
          "ComentariosAdicionObjGpon"
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
          TipoActividadAdicionGpon === "" ||
          MotivoAdicionObjGpon === "" ||
          NOrdenAdicionObjGpon === "" ||
          TrabajadoAdicionObjGpon === "" ||
          ObvsAdicionObjGpon === "" ||
          ComentariosAdicionObjGpon === ""
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

        if (parseInt(NOrdenAdicionObjGpon.length) !== 8) {
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
      } else if (TipoActividadAdicionGpon === "ANULACION") {
        const MotivoAdicionAnulada_Gpon = document.getElementById(
          "MotivoAdicionAnulada_Gpon"
        ).value;
        const NOrdenAdicionAnuladaGpon = document.getElementById(
          "NOrdenAdicionAnuladaGpon"
        ).value;
        const TrabajadoAdicionAnulada_Gpon = document.getElementById(
          "TrabajadoAdicionAnulada_Gpon"
        ).value;
        const ComentarioAdicionAnulada_Gpon = document.getElementById(
          "ComentarioAdicionAnulada_Gpon"
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
          TipoActividadAdicionGpon === "" ||
          MotivoAdicionAnulada_Gpon === "" ||
          NOrdenAdicionAnuladaGpon === "" ||
          TrabajadoAdicionAnulada_Gpon === "" ||
          ComentarioAdicionAnulada_Gpon === ""
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
        if (parseInt(NOrdenAdicionAnuladaGpon.length) !== 8) {
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
    case "ADICION|DTH":
      const TipoActividadAdicionDth = document.getElementById(
        "TipoActividadAdicionDth"
      ).value;
      const equipostvAdicionDth1 = document.getElementById(
        "equipostvAdicionDth1"
      ).value;
      const equipostvAdicionDth2 = document.getElementById(
        "equipostvAdicionDth2"
      ).value;
      const equipostvAdicionDth3 = document.getElementById(
        "equipostvAdicionDth3"
      ).value;
      const equipostvAdicionDth4 = document.getElementById(
        "equipostvAdicionDth4"
      ).value;
      const equipostvAdicionDth5 = document.getElementById(
        "equipostvAdicionDth5"
      ).value;
      const NOrdenAdicionDth =
        document.getElementById("NOrdenAdicionDth").value;
      const TrabajadoAdicionDth = document.getElementById(
        "TrabajadoAdicionDth"
      ).value;
      const ObvsAdicionDth = document.getElementById("ObvsAdicionDth").value;
      const RecibeAdicionDth =
        document.getElementById("RecibeAdicionDth").value;

      if (TipoActividadAdicionDth === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadAdicionDth === "" ||
          // equipostvAdicionDth1 === "" ||
          // equipostvAdicionDth2 === "" ||
          // equipostvAdicionDth3 === "" ||
          // equipostvAdicionDth4 === "" ||
          // equipostvAdicionDth5 === "" ||
          NOrdenAdicionDth === "" ||
          TrabajadoAdicionDth === "" ||
          ObvsAdicionDth === "" ||
          RecibeAdicionDth === ""
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
              equipostvAdicionDth1 === "" &&
              equipostvAdicionDth2 === "" &&
              equipostvAdicionDth3 === "" &&
              equipostvAdicionDth4 === "" &&
              equipostvAdicionDth5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (
              equipostvAdicionDth1 !== "" &&
              parseInt(equipostvAdicionDth1.length) !== 12
            ) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (
              equipostvAdicionDth2 !== "" &&
              parseInt(equipostvAdicionDth2.length) !== 12
            ) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (
              equipostvAdicionDth3 !== "" &&
              parseInt(equipostvAdicionDth3.length) !== 12
            ) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3 .";
            }
            if (
              equipostvAdicionDth4 !== "" &&
              parseInt(equipostvAdicionDth4.length) !== 12
            ) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (
              equipostvAdicionDth5 !== "" &&
              parseInt(equipostvAdicionDth5.length) !== 12
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
        if (parseInt(NOrdenAdicionDth.length) !== 8) {
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
      } else if (TipoActividadAdicionDth === "OBJETADA") {
        const MotivoObjAdicionDth = document.getElementById(
          "MotivoObjAdicionDth"
        ).value;
        const NOrdenAdicionObjDth = document.getElementById(
          "NOrdenAdicionObjDth"
        ).value;
        const TrabajadoAdicionObjDth = document.getElementById(
          "TrabajadoAdicionObjDth"
        ).value;
        const ObvsAdicionObjDth =
          document.getElementById("ObvsAdicionObjDth").value;
        const ComentariosAdicionObjDth = document.getElementById(
          "ComentariosAdicionObjDth"
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
          TipoActividadAdicionDth === "" ||
          MotivoObjAdicionDth === "" ||
          NOrdenAdicionObjDth === "" ||
          TrabajadoAdicionObjDth === "" ||
          ObvsAdicionObjDth === "" ||
          ComentariosAdicionObjDth === ""
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

        if (parseInt(NOrdenAdicionObjDth.length) !== 8) {
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
      } else if (TipoActividadAdicionDth === "ANULACION") {
        const MotivoAdicionAnulada_Dth = document.getElementById(
          "MotivoAdicionAnulada_Dth"
        ).value;
        const OrdenAdicionAnulada_Dth = document.getElementById(
          "OrdenAdicionAnulada_Dth"
        ).value;
        const TrabajadoAdicionAnulada_Dth = document.getElementById(
          "TrabajadoAdicionAnulada_Dth"
        ).value;
        const ComentarioAdicionAnulada_Dth = document.getElementById(
          "ComentarioAdicionAnulada_Dth"
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
          TipoActividadAdicionDth === "" ||
          MotivoAdicionAnulada_Dth === "" ||
          OrdenAdicionAnulada_Dth === "" ||
          TrabajadoAdicionAnulada_Dth === "" ||
          ComentarioAdicionAnulada_Dth === ""
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
        if (parseInt(OrdenAdicionAnulada_Dth.length) !== 8) {
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
    case "CAMBIO DE EQUIPO|HFC":
      const TipoActividadCambioHfc = document.getElementById(
        "TipoActividadCambioHfc"
      ).value;

      const InstalacionEquipoHfc = document.getElementById(
        "InstalacionEquipoHfc"
      ).value;
      const DesinstalarEquipoHfc = document.getElementById(
        "DesinstalarEquipoHfc"
      ).value;
      const NOrdenEquipoHfc = document.getElementById("NOrdenEquipoHfc").value;
      const ObvsEquipoHfc = document.getElementById("ObvsEquipoHfc").value;
      const RecibeEquipoHfc = document.getElementById("RecibeEquipoHfc").value;
      const TrabajadoEquipoHfc =
        document.getElementById("TrabajadoEquipoHfc").value;

      if (TipoActividadCambioHfc === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadCambioHfc === "" ||
          InstalacionEquipoHfc === "" ||
          DesinstalarEquipoHfc === "" ||
          NOrdenEquipoHfc === "" ||
          ObvsEquipoHfc === "" ||
          RecibeEquipoHfc === "" ||
          TrabajadoEquipoHfc === ""
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
        if (parseInt(NOrdenEquipoHfc.length) !== 8) {
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
        if (parseInt(InstalacionEquipoHfc.length) !== 12) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Equipo a Instalar debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(DesinstalarEquipoHfc.length) !== 12) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "El N° Equipo a Desinstalar debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadCambioHfc === "OBJETADA") {
        const MotivoEquipoObjHfc =
          document.getElementById("MotivoEquipoObjHfc").value;
        const NordenObjEquipoHfc =
          document.getElementById("NordenObjEquipoHfc").value;
        const TrabajadoObjEquipoHfc = document.getElementById(
          "TrabajadoObjEquipoHfc"
        ).value;
        const ObvsObjEquipoHfc =
          document.getElementById("ObvsObjEquipoHfc").value;
        const ComentsEquipoObjHfc = document.getElementById(
          "ComentsEquipoObjHfc"
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
          TipoActividadCambioHfc === "" ||
          MotivoEquipoObjHfc === "" ||
          NordenObjEquipoHfc === "" ||
          TrabajadoObjEquipoHfc === "" ||
          ObvsObjEquipoHfc === "" ||
          ComentsEquipoObjHfc === ""
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

        if (parseInt(NordenObjEquipoHfc.length) !== 8) {
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
      } else if (TipoActividadCambioHfc === "ANULACION") {
        const MotivoEquipoAnulada_Hfc = document.getElementById(
          "MotivoEquipoAnulada_Hfc"
        ).value;
        const OrdenAnuladaEquipoHfc = document.getElementById(
          "OrdenAnuladaEquipoHfc"
        ).value;
        const TrabajadoEquipoAnulada_Hfc = document.getElementById(
          "TrabajadoEquipoAnulada_Hfc"
        ).value;
        const ComentarioAnuladaEquipoHfc = document.getElementById(
          "ComentarioAnuladaEquipoHfc"
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
          TipoActividadCambioHfc === "" ||
          MotivoEquipoAnulada_Hfc === "" ||
          OrdenAnuladaEquipoHfc === "" ||
          TrabajadoEquipoAnulada_Hfc === "" ||
          ComentarioAnuladaEquipoHfc === ""
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
        if (parseInt(OrdenAnuladaEquipoHfc.length) !== 8) {
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
    case "CAMBIO DE EQUIPO|GPON":
      const TipoActividadCambioGpon = document.getElementById(
        "TipoActividadCambioGpon"
      ).value;
      const InstalacionEquipoGpon = document.getElementById(
        "InstalacionEquipoGpon"
      ).value;
      const DesinstalarEquipoGpon = document.getElementById(
        "DesinstalarEquipoGpon"
      ).value;
      const NOrdenEquipoGpon =
        document.getElementById("NOrdenEquipoGpon").value;
      const ObvsEquipoGpon = document.getElementById("ObvsEquipoGpon").value;
      const RecibeEquipoGpon =
        document.getElementById("RecibeEquipoGpon").value;
      const TrabajadoEquipoGpon = document.getElementById(
        "TrabajadoEquipoGpon"
      ).value;

      if (TipoActividadCambioGpon === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadCambioGpon === "" ||
          InstalacionEquipoGpon === "" ||
          DesinstalarEquipoGpon === "" ||
          NOrdenEquipoGpon === "" ||
          ObvsEquipoGpon === "" ||
          RecibeEquipoGpon === "" ||
          TrabajadoEquipoGpon === ""
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
        if (parseInt(NOrdenEquipoGpon.length) !== 8) {
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
        if (parseInt(InstalacionEquipoGpon.length) !== 12) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Equipo a Instalar debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(DesinstalarEquipoGpon.length) !== 12) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "El N° Equipo a Desinstalar debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadCambioGpon === "OBJETADA") {
        const MotivoObjEquipoGpon = document.getElementById(
          "MotivoObjEquipoGpon"
        ).value;
        const NOrdenObjEquipoGpon = document.getElementById(
          "NOrdenObjEquipoGpon"
        ).value;
        const TrabajadoObjEquipoGpon = document.getElementById(
          "TrabajadoObjEquipoGpon"
        ).value;
        const ObvsEquipoObjGpon =
          document.getElementById("ObvsEquipoObjGpon").value;
        const ComentsEquipoObjGpon = document.getElementById(
          "ComentsEquipoObjGpon"
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
          TipoActividadCambioGpon === "" ||
          MotivoObjEquipoGpon === "" ||
          NOrdenObjEquipoGpon === "" ||
          TrabajadoObjEquipoGpon === "" ||
          ObvsEquipoObjGpon === "" ||
          ComentsEquipoObjGpon === ""
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

        if (parseInt(NOrdenObjEquipoGpon.length) !== 8) {
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
      } else if (TipoActividadCambioGpon === "ANULACION") {
        const OrdenEquipoAnuladaGpon = document.getElementById(
          "OrdenEquipoAnuladaGpon"
        ).value;
        const MotivoAnuladaObj_Gpon = document.getElementById(
          "MotivoAnuladaObj_Gpon"
        ).value;
        const TrabajadoEquipoAnulada_Gpon = document.getElementById(
          "TrabajadoEquipoAnulada_Gpon"
        ).value;
        const ComentarioEquipoAnulada_Gpon = document.getElementById(
          "ComentarioEquipoAnulada_Gpon"
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
          TipoActividadCambioGpon === "" ||
          OrdenEquipoAnuladaGpon === "" ||
          TrabajadoEquipoAnulada_Gpon === "" ||
          ComentarioEquipoAnulada_Gpon === "" ||
          MotivoAnuladaObj_Gpon === ""
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
        if (parseInt(OrdenEquipoAnuladaGpon.length) !== 8) {
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
    case "CAMBIO DE EQUIPO|ADSL":
      const TipoActividadCambioAdsl = document.getElementById(
        "TipoActividadCambioAdsl"
      ).value;
      const InstalacionEquipoAdsl = document.getElementById(
        "InstalacionEquipoAdsl"
      ).value;
      const DesinstalarEquipoAdsl = document.getElementById(
        "DesinstalarEquipoAdsl"
      ).value;
      const OrdenEquipoAdsl = document.getElementById("OrdenEquipoAdsl").value;
      const ObvsEquipoAdsl = document.getElementById("ObvsEquipoAdsl").value;
      const RecibeEquipoAdsl =
        document.getElementById("RecibeEquipoAdsl").value;
      const TrabajadoEquipoAdsl = document.getElementById(
        "TrabajadoEquipoAdsl"
      ).value;

      if (TipoActividadCambioAdsl === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadCambioAdsl === "" ||
          InstalacionEquipoAdsl === "" ||
          DesinstalarEquipoAdsl === "" ||
          OrdenEquipoAdsl === "" ||
          ObvsEquipoAdsl === "" ||
          RecibeEquipoAdsl === "" ||
          TrabajadoEquipoAdsl === ""
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
        if (parseInt(OrdenEquipoAdsl.length) !== 8) {
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
        if (parseInt(InstalacionEquipoAdsl.length) !== 12) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Equipo a Instalar debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(DesinstalarEquipoAdsl.length) !== 12) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "El N° Equipo a Desinstalar debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadCambioAdsl === "OBJETADA") {
        const MotivoEquipoObjAdsl = document.getElementById(
          "MotivoEquipoObjAdsl"
        ).value;
        const OrdenEquipoObjAdsl =
          document.getElementById("OrdenEquipoObjAdsl").value;
        const TrabajadoEquipoObjAdsl = document.getElementById(
          "TrabajadoEquipoObjAdsl"
        ).value;
        const ObvsEquipoObjAdsl =
          document.getElementById("ObvsEquipoObjAdsl").value;
        const ComentsEquipoObjAdsl = document.getElementById(
          "ComentsEquipoObjAdsl"
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
          TipoActividadCambioAdsl === "" ||
          MotivoEquipoObjAdsl === "" ||
          OrdenEquipoObjAdsl === "" ||
          TrabajadoEquipoObjAdsl === "" ||
          ObvsEquipoObjAdsl === "" ||
          ComentsEquipoObjAdsl === ""
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

        if (parseInt(OrdenEquipoObjAdsl.length) !== 8) {
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
      } else if (TipoActividadCambioAdsl === "ANULACION") {
        const MotivoEquipoAnulada_Adsl = document.getElementById(
          "MotivoEquipoAnulada_Adsl"
        ).value;
        const OrdenAnuladaEquipoAdsl = document.getElementById(
          "OrdenAnuladaEquipoAdsl"
        ).value;
        const ComentsEquipoAnulada_Adsl = document.getElementById(
          "ComentsEquipoAnulada_Adsl"
        ).value;
        const TrabajadoEquipoAnulada_Adsl = document.getElementById(
          "TrabajadoEquipoAnulada_Adsl"
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
          TipoActividadCambioAdsl === "" ||
          MotivoEquipoAnulada_Adsl === "" ||
          OrdenAnuladaEquipoAdsl === "" ||
          TrabajadoEquipoAnulada_Adsl === "" ||
          ComentsEquipoAnulada_Adsl === ""
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
        if (parseInt(OrdenAnuladaEquipoAdsl.length) !== 8) {
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
    case "CAMBIO DE EQUIPO|DTH":
      const TipoActividadCambioDth = document.getElementById(
        "TipoActividadCambioDth"
      ).value;
      const InstalacionEquipoDth = document.getElementById(
        "InstalacionEquipoDth"
      ).value;
      const DesinstalarEquipoDth = document.getElementById(
        "DesinstalarEquipoDth"
      ).value;
      const OrdenEquipoDth = document.getElementById("OrdenEquipoDth").value;
      const ObvsEquipoDth = document.getElementById("ObvsEquipoDth").value;
      const RecibeEquipoDth = document.getElementById("RecibeEquipoDth").value;
      const TrabajadoEquipoDth =
        document.getElementById("TrabajadoEquipoDth").value;

      if (TipoActividadCambioDth === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          Select_Postventa === "" ||
          select_orden === "" ||
          dpto_colonia === "" ||
          tecnologia === "" ||
          TipoActividadCambioDth === "" ||
          InstalacionEquipoDth === "" ||
          DesinstalarEquipoDth === "" ||
          OrdenEquipoDth === "" ||
          ObvsEquipoDth === "" ||
          RecibeEquipoDth === "" ||
          TrabajadoEquipoDth === ""
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
        if (parseInt(OrdenEquipoDth.length) !== 8) {
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
        if (parseInt(InstalacionEquipoDth.length) !== 12) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N° Equipo a Instalar debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(DesinstalarEquipoDth.length) !== 12) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "El N° Equipo a Desinstalar debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (TipoActividadCambioDth === "OBJETADA") {
        const MotivoObjEquipoDth =
          document.getElementById("MotivoObjEquipoDth").value;
        const OrdenEquipoObjDth =
          document.getElementById("OrdenEquipoObjDth").value;
        const TrabajadoEquipoObjDth = document.getElementById(
          "TrabajadoEquipoObjDth"
        ).value;
        const ObvsEquipoObjDth =
          document.getElementById("ObvsEquipoObjDth").value;
        const ComentsEquipoObjDth = document.getElementById(
          "ComentsEquipoObjDth"
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
          TipoActividadCambioDth === "" ||
          MotivoObjEquipoDth === "" ||
          OrdenEquipoObjDth === "" ||
          TrabajadoEquipoObjDth === "" ||
          ObvsEquipoObjDth === "" ||
          ComentsEquipoObjDth === ""
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

        if (parseInt(OrdenEquipoObjDth.length) !== 8) {
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
      } else if (TipoActividadCambioDth === "ANULACION") {
        const MotivoEquipoAnulada_Dth = document.getElementById(
          "MotivoEquipoAnulada_Dth"
        ).value;
        const OrdenEquipoAnulada_Dth = document.getElementById(
          "OrdenEquipoAnulada_Dth"
        ).value;
        const TrabajadoEquipoAnulada_Dth = document.getElementById(
          "TrabajadoEquipoAnulada_Dth"
        ).value;
        const ComentarioEquipoAnulada_Dth = document.getElementById(
          "ComentarioEquipoAnulada_Dth"
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
          TipoActividadCambioDth === "" ||
          MotivoEquipoAnulada_Dth === "" ||
          OrdenEquipoAnulada_Dth === "" ||
          TrabajadoEquipoAnulada_Dth === "" ||
          ComentarioEquipoAnulada_Dth === ""
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
        if (parseInt(OrdenEquipoAnulada_Dth.length) !== 8) {
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

        if (!/^\d{8}$/.test(SyrengMigracionHfc)) {
          Swal.fire({
            icon: "error",
            title: "El N° Syreng debe tener 8 digitos validos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (!regexCoordenadas.test(GeorefMigracionHfc)) {
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
            if (
              equipotvmigracion1 !== "" &&
              parseInt(equipotvmigracion1.length) !== 12
            ) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (
              equipotvmigracion2 !== "" &&
              parseInt(equipotvmigracion2.length) !== 12
            ) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (
              equipotvmigracion3 !== "" &&
              parseInt(equipotvmigracion3.length) !== 12
            ) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3 .";
            }
            if (
              equipotvmigracion4 !== "" &&
              parseInt(equipotvmigracion4.length) !== 12
            ) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (
              equipotvmigracion5 !== "" &&
              parseInt(equipotvmigracion5.length) !== 12
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
