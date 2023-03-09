$(function () {
  // Initialize Select2 Elements
  $(".select2").select2();
});

// OBTENEMOS LOS FORMS GENERALES A OCULTAR DE POSVENTA TRASLADOS
const postventaTrasladosHfc = document.getElementById("PostventaTrasladosHfc");
const postventaTrasladosGpon = document.getElementById(
  "PostventaTrasladosGpon"
);
const postventaTrasladosAdsl = document.getElementById(
  "PostventaTrasladosAdsl"
);
const postventaTrasladosCobre = document.getElementById(
  "PostventaTrasladosCobre"
);
const postventaTrasladosDth = document.getElementById("PostventaTrasladosDth");

// OBTENEMOS LOS FORMS GENERALES DE POSTVENTA ADICION
const PostventaAdicionHfc = document.getElementById("PostventaAdicionHfc");
const PostventaAdicionGpon = document.getElementById("PostventaAdicionGpon");
const PostventaAdicionDth = document.getElementById("PostventaAdicionDth");

// OBTENEMOS LOS FORMS GENERALES POSTVENTA CAMBIO EQUIPO
const PostventaCambioHfc = document.getElementById("PostventaCambioHfc");
const PostventaCambioGpon = document.getElementById("PostventaCambioGpon");
const PostventaCambioAdsl = document.getElementById("PostventaCambioAdsl");
const PostventaCambioDth = document.getElementById("PostventaCambioDth");
const PostventaCambioCobre = document.getElementById("PostventaCambioCobre");

// OBTENEMOS LOS FORMS GENERALES DE POSTVENTA MIGRACION
const PostventaMigracionHfc = document.getElementById("PostventaMigracionHfc");

// OBTENEMOS EL BOTON DEL FORM Y LO OCULTAMOS
const btn_submit = document.getElementById("btn-submit");
btn_submit.style.display = "none";

// FORMS GENERALES A OCULTAR
const elementsToHide = [
  postventaTrasladosHfc,
  postventaTrasladosGpon,
  postventaTrasladosAdsl,
  postventaTrasladosCobre,
  postventaTrasladosDth,
  PostventaAdicionHfc,
  PostventaAdicionGpon,
  PostventaAdicionDth,
  PostventaCambioHfc,
  PostventaCambioGpon,
  PostventaCambioAdsl,
  PostventaCambioCobre,
  PostventaCambioDth,
  PostventaMigracionHfc,
  btn_submit,
];

// OBTENEMOS LOS TIPO ACTIVIDAD

const tiposActividad = [
  "TipoActividadTrasladoHfc",
  "TipoActividadTrasladoGpon",
  "TipoActividadTrasladoAdsl",
  "TipoActividadTrasladoCobre",
  "TipoActividadTrasladoDth",
  "TipoActividadAdicionHfc",
  "TipoActividadAdicionGpon",
  "TipoActividadAdicionDth",
  "TipoActividadCambioHfc",
  "TipoActividadCambioGpon",
  "TipoActividadCambioAdsl",
  "TipoActividadCambioDth",
  "TipoActividadCambioCobre",
  "TipoActividadMigracionHfc",
];

// OBTENEMOS EL SELECT POSTVENTA
const selectPostventa = document.querySelector(
  "select[name='Select_Postventa']"
);

// OCULTAR LOS CAMPOS DE CADA ACTIVIDAD AL CAMBIAR DE TECNOLOGIA
const selectTecnologia = document.querySelector("select[name='tecnologia']");

function ocultarElementos(elementos) {
  for (let i = 0; i < elementos.length; i++) {
    elementos[i].style.display = "none";
  }
}

// POSTVENTAS TRASLADOS
const elementosPostventTraslado = [
  ...document.querySelectorAll(".TrasladoHfcHidden"),
  ...document.querySelectorAll(".TrasladoGponHidden"),
  ...document.querySelectorAll(".TrasladoAdslHidden"),
  ...document.querySelectorAll(".TrasladoCobreHidden"),
  ...document.querySelectorAll(".TrasladoDthHidden"),
];

// POSTVENTA ADICION
const elementosPostventaAdicion = [
  ...document.querySelectorAll(".PostventaAdicionHfcHidden"),
  ...document.querySelectorAll(".PostventaAdicionGponHidden"),
  ...document.querySelectorAll(".PostventaAdicionDthHidden"),
];

// POSTVENTA CAMBIO EQUIPO
const elementosPostventaCambioEquipo = [
  ...document.querySelectorAll(".PostventaCambioHfcHidden"),
  ...document.querySelectorAll(".PostventaCambioGponHidden"),
  ...document.querySelectorAll(".PostventaCambioAdslHidden"),
  ...document.querySelectorAll(".PostventaCambioCobreHidden"),
  ...document.querySelectorAll(".PostventaCambioDthHidden"),
];

// POSTVENTA MIGRACION
const elementosPostventaMigracion = [
  ...document.querySelectorAll(".PostventaMigracionHfcHidden"),
];

function mostrarElementos() {
  // OCULTANDO TODOS LOS ELEMENTOS
  elementsToHide.forEach((element) => {
    element.style.display = "none";
  });

  switch (selectPostventa.value + "|" + selectTecnologia.value) {
    case "POSTVENTA TRASLADO|HFC":
      //  MUESTRA EL DIV CORRESPONDIENTE
      postventaTrasladosHfc.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA TRASLADO|GPON":
      //  MUESTRA EL DIV CORRESPONDIENTE
      postventaTrasladosGpon.style.display = "block";
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA TRASLADO|ADSL":
      //  MUESTRA EL DIV CORRESPONDIENTE
      postventaTrasladosAdsl.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA TRASLADO|COBRE":
      postventaTrasladosCobre.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA TRASLADO|DTH":
      //  MUESTRA EL DIV CORRESPONDIENTE

      postventaTrasladosDth.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA ADICION|HFC":
      PostventaAdicionHfc.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA ADICION|GPON":
      //  MUESTRA EL DIV CORRESPONDIENTE

      PostventaAdicionGpon.style.display = "block";

      // RESET VALUES SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA ADICION|DTH":
      //  MUESTRA EL DIV CORRESPONDIENTE

      PostventaAdicionGpon.style.display = "block";

      // RESET VALUES SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA CAMBIO DE EQUIPO|HFC":
      //  MUESTRA EL DIV CORRESPONDIENTE
      PostventaCambioHfc.style.display = "block";

      // RESET VALUES SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;

    case "POSTVENTA CAMBIO DE EQUIPO|GPON":
      //  MUESTRA EL DIV CORRESPONDIENTE
      PostventaCambioGpon.style.display = "block";

      // RESET VALUES SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA CAMBIO DE EQUIPO|ADSL":
      //  MUESTRA EL DIV CORRESPONDIENTE
      PostventaCambioAdsl.style.display = "block";

      // RESET VALUES SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA CAMBIO DE EQUIPO|COBRE":
      //  MUESTRA EL DIV CORRESPONDIENTE
      PostventaCambioCobre.style.display = "block";

      // RESET VALUES SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA CAMBIO DE EQUIPO|DTH":
      //  MUESTRA EL DIV CORRESPONDIENTE
      PostventaCambioDth.style.display = "block";

      // RESET VALUES SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    case "POSTVENTA MIGRACION|HFC":
      //  MUESTRA EL DIV CORRESPONDIENTE
      PostventaMigracionHfc.style.display = "block";

      // RESET VALUES SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      break;
    default:
      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosPostventTraslado);
      ocultarElementos(elementosPostventaAdicion);
      ocultarElementos(elementosPostventaCambioEquipo);
      ocultarElementos(elementosPostventaMigracion);

      // OCULTANDO TODOS LOS ELEMENTOS
      elementsToHide.forEach((element) => {
        element.style.display = "none";
      });

      selectTecnologia.value = "SELECCIONE";

      break;
  }
}

// SE MUESTRAN LOS ELEMENTOS
document.addEventListener("DOMContentLoaded", mostrarElementos);
selectPostventa.addEventListener("change", mostrarElementos);
selectTecnologia.addEventListener("change", mostrarElementos);

// Seleccionar correspondiente al tipo actividad
const formTypes = [
  {
    select: document.querySelector("select[name='TipoActividadTrasladoHfc']"),
    forms: [
      document.getElementById("RealizadaTrasladoHfc"),
      document.getElementById("ObjetadaTrasladoHfc"),
      document.getElementById("AnuladaTrasladoHfc"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadTrasladoGpon']"),
    forms: [
      document.getElementById("RealizadaTrasladoGpon"),
      document.getElementById("ObjetadaTrasladoGpon"),
      document.getElementById("AnuladaTrasladoGpon"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadTrasladoAdsl']"),
    forms: [
      document.getElementById("RealizadaTrasladoAdsl"),
      document.getElementById("ObjetadaTrasladoAdsl"),
      //   document.getElementById("AnuladaTrasladoAdsl"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadTrasladoCobre']"),
    forms: [
      document.getElementById("RealizadaTrasladoCobre"),
      document.getElementById("ObjetadaTrasladoCobre"),
      //   document.getElementById("AnuladaTrasladoCobre"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadTrasladoDth']"),
    forms: [
      document.getElementById("RealizadaTrasladoDth"),
      document.getElementById("ObjetadaTrasladoDth"),
      //   document.getElementById("AnuladaTrasladoDth"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadAdicionHfc']"),
    forms: [
      document.getElementById("RealizadaAdicionHfc"),
      document.getElementById("ObjetadaAdicionHfc"),
      //   document.getElementById("AnuladaAdicionHfc"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadAdicionGpon']"),
    forms: [
      document.getElementById("RealizadaAdicionGpon"),
      document.getElementById("ObjetadaAdicionGpon"),
      //   document.getElementById("AnuladaAdicionGpon"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadCambioHfc']"),
    forms: [
      document.getElementById("RealizadaCambioHfc"),
      document.getElementById("ObjetadaCambioHfc"),
      //   document.getElementById("AnuladaCambioHfc"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadCambioGpon']"),
    forms: [
      document.getElementById("RealizadaCambioGpon"),
      document.getElementById("ObjetadaCambioGpon"),
      //   document.getElementById("AnuladaCambioGpon"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadCambioAdsl']"),
    forms: [
      document.getElementById("RealizadaCambioAdsl"),
      document.getElementById("ObjetadaCambioAdsl"),
      //   document.getElementById("AnuladaCambioAdsl"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadCambioCobre']"),
    forms: [
      document.getElementById("RealizadaCambioCobre"),
      document.getElementById("ObjetadaCambioCobre"),
      //   document.getElementById("AnuladaCambioCobre"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadCambioDth']"),
    forms: [
      document.getElementById("RealizadaCambioDth"),
      document.getElementById("ObjetadaCambioDth"),
      //   document.getElementById("AnuladaCambioDth"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadMigracionHfc']"),
    forms: [
      document.getElementById("RealizadaMigracionHfc"),
      document.getElementById("ObjetadaMigracionHfc"),
      document.getElementById("AnuladaMigracionHfc"),
    ],
  },
];

formTypes.forEach(({ select, forms }) => {
  forms.forEach((form) => {
    form.style.display = "none";
  });

  select.addEventListener("change", () => {
    forms.forEach((form) => {
      form.style.display = "none";
    });

    if (!select.value) {
      // si no se ha seleccionado ninguna opción
      forms.forEach((form) => {
        form.disabled = true;
      });
      btn_submit.style.display = "none";
    } else {
      // si se ha seleccionado una opción válida
      const selectedOption = select.value;
      let selectedForm = null;

      if (selectedOption === "REALIZADA") {
        selectedForm = forms[0];
      } else if (selectedOption === "OBJETADA") {
        selectedForm = forms[1];
      } else if (selectedOption === "TRANSFERIDA") {
        selectedForm = forms[2];
      }

      if (selectedForm) {
        selectedForm.style.display = "block";
        selectedForm.disabled = false;
        btn_submit.style.display = "block";
      } else {
        btn_submit.style.display = "none";
      }
    }
  });
});

// ELIMINAR OPCION TRANSFERIDA DEL SELECT EN TRASLADO

function removeOptionFromSelector(selectorName, optionValue) {
  const select = document.querySelector(`select[name='${selectorName}']`);
  const option = select.querySelector(`option[value='${optionValue}']`);
  if (option) {
    option.remove();
  }
}

removeOptionFromSelector("TipoActividadTrasladoAdsl", "TRANSFERIDA");
removeOptionFromSelector("TipoActividadTrasladoCobre", "TRANSFERIDA");
removeOptionFromSelector("TipoActividadTrasladoDth", "TRANSFERIDA");
removeOptionFromSelector("TipoActividadAdicionHfc", "TRANSFERIDA");
removeOptionFromSelector("TipoActividadAdicionGpon", "TRANSFERIDA");
removeOptionFromSelector("TipoActividadAdicionDth", "TRANSFERIDA");
removeOptionFromSelector("TipoActividadCambioHfc", "TRANSFERIDA");
removeOptionFromSelector("TipoActividadCambioGpon", "TRANSFERIDA");
removeOptionFromSelector("TipoActividadCambioAdsl", "TRANSFERIDA");
removeOptionFromSelector("TipoActividadCambioCobre", "TRANSFERIDA");
removeOptionFromSelector("TipoActividadCambioDth", "TRANSFERIDA");

// CAMBIAR TIPO DE ORDEN EN BASE TIPO POSTVENTA Y TECNOLOGIA

const select_orden = document.getElementById("select_orden");

// FUNCION PARA ACTUALIZAR LAS OPCIONES DE TIPO ORDEN
function actualizarOpciones() {
  switch (selectPostventa.value + "|" + selectTecnologia.value) {
    case "POSTVENTA TRASLADO|HFC":
      select_orden.innerHTML = `
        <option value="">SELECCIONE</option>
        <option value="TRASLADO INDIVIDUAL">TRASLADO INDIVIDUAL</option>
        <option value="TRASLADO DOBLE"> TRASLADO DOBLE</option>
        <option value="TRASLADO TRIPLE">TRASLADO TRIPLE</option>
      `;
      break;

    case "POSTVENTA TRASLADO|GPON":
      select_orden.innerHTML = `
        <option value="">SELECCIONE</option>
        <option value="TRASLADO INDIVIDUAL">TRASLADO INDIVIDUAL</option>
        <option value="TRASLADO DOBLE"> TRASLADO DOBLE</option>
        <option value="TRASLADO TRIPLE">TRASLADO TRIPLE</option>
      `;
      break;
    case "POSTVENTA TRASLADO|ADSL":
      select_orden.innerHTML = `
        <option value="">SELECCIONE</option>
        <option value="TRASLADO">TRASLADO</option>
      `;
      break;
    case "POSTVENTA TRASLADO|COBRE":
      select_orden.innerHTML = `
          <option value="">SELECCIONE</option>
          <option value="TRASLADO">TRASLADO</option>
        `;
      break;
    case "POSTVENTA TRASLADO|DTH":
      select_orden.innerHTML = `
          <option value="">SELECCIONE</option>
          <option value="TRASLADO">TRASLADO</option>
        `;
      break;
    case "POSTVENTA ADICION|HFC":
      select_orden.innerHTML = `
          <option value="">SELECCIONE</option>
          <option value="ADICION ANALOGAS">ADICION ANALOGAS</option>
          <option value="ADICION DTA">ADICION DTA</option>
          <option value="ADICION DIGITAL">ADICION DIGITAL</option>

        `;
      break;
    case "POSTVENTA ADICION|GPON":
      select_orden.innerHTML = `
            <option value="">SELECCIONE</option>
            <option value="ADICION IPTV">ADICION IPTV</option>
  
          `;
      break;
    case "POSTVENTA ADICION|DTH":
      select_orden.innerHTML = `
            <option value="">SELECCIONE</option>
            <option value="ADICION DTH">ADICION DTH</option>
  
          `;
      break;
    case "POSTVENTA CAMBIO DE EQUIPO|HFC":
      select_orden.innerHTML = `
            <option value="">SELECCIONE</option>
            <option value="CAMBIO EQUIPO TV">CAMBIO EQUIPO TV</option>
            <option value="CAMBIO EQUIPO INTERNET">CAMBIO EQUIPO INTERNET</option>
  
          `;
      break;
    case "POSTVENTA CAMBIO DE EQUIPO|GPON":
      select_orden.innerHTML = `
            <option value="">SELECCIONE</option>
             <option value="CAMBIO EQUIPO TV">CAMBIO EQUIPO TV</option>
            <option value="CAMBIO EQUIPO INTERNET">CAMBIO EQUIPO INTERNET</option>
  
          `;
      break;
    case "POSTVENTA CAMBIO DE EQUIPO|DTH":
      select_orden.innerHTML = `
            <option value="">SELECCIONE</option>
             <option value="CAMBIO EQUIPO TV">CAMBIO EQUIPO TV</option>
            <option value="CAMBIO EQUIPO INTERNET">CAMBIO EQUIPO INTERNET</option>
  
          `;
      break;
    case "POSTVENTA CAMBIO DE EQUIPO|ADSL":
      select_orden.innerHTML = `
            <option value="">SELECCIONE</option>
             <option value="CAMBIO EQUIPO TV">CAMBIO EQUIPO TV</option>
            <option value="CAMBIO EQUIPO INTERNET">CAMBIO EQUIPO INTERNET</option>
  
          `;
      break;
    case "POSTVENTA CAMBIO DE EQUIPO|COBRE":
      select_orden.innerHTML = `
            <option value="">SELECCIONE</option>
             <option value="CAMBIO EQUIPO TV">CAMBIO EQUIPO TV</option>
            <option value="CAMBIO EQUIPO INTERNET">CAMBIO EQUIPO INTERNET</option>
  
          `;
      break;
    // AQUI PODRIAS AGREGAR MAS CASOS PARA DIFERENTES COMBINACIONES DE VALORES
    default:
      select_orden.innerHTML = `<option value="">SELECCIONE</option>`;
  }
}

selectPostventa.addEventListener("change", actualizarOpciones);
selectTecnologia.addEventListener("change", actualizarOpciones);

//   OCULTAR TECNOLOGIA SI SE SELECCIONA POSTVENTA ADICION
const postventaSelect = document.getElementById("Select_Postventa");
const tecnologiaSelect = document.getElementById("tecnologia");

postventaSelect.addEventListener("change", function () {
  // Verificar si la opción "POSTVENTA ADICION" ha sido seleccionada
  if (postventaSelect.value === "POSTVENTA ADICION") {
    // Si es así, ocultar las opciones "ADSL" y "COBRE" del select de tecnología
    const adslOption = tecnologiaSelect.querySelector('option[value="ADSL"]');
    const cobreOption = tecnologiaSelect.querySelector('option[value="COBRE"]');
    adslOption.style.display = "none";
    cobreOption.style.display = "none";
    tecnologiaSelect.value = "SELECCIONE";
    PostventaAdicionHfc.style.display = "none";
    PostventaAdicionGpon.style.display = "none";
    PostventaAdicionDth.style.display = "none";
  }
  if (postventaSelect.value === "POSTVENTA MIGRACION") {
    // Si es así, ocultar las opciones "ADSL" y "COBRE" del select de tecnología

    const adslOption = tecnologiaSelect.querySelector('option[value="ADSL"]');
    const cobreOption = tecnologiaSelect.querySelector('option[value="COBRE"]');
    const dthOption = tecnologiaSelect.querySelector('option[value="DTH"]');
    const gponOption = tecnologiaSelect.querySelector('option[value="GPON"]');

    adslOption.style.display = "none";
    cobreOption.style.display = "none";
    dthOption.style.display = "none";
    gponOption.style.display = "none";

    tecnologiaSelect.value = "SELECCIONE";
    PostventaMigracionHfc.style.display = "none";
  } else {
    // Si no, mostrar las opciones "ADSL" y "COBRE" del select de tecnología
    const adslOption = tecnologiaSelect.querySelector('option[value="ADSL"]');
    const cobreOption = tecnologiaSelect.querySelector('option[value="COBRE"]');
    const dthOption = tecnologiaSelect.querySelector('option[value="DTH"]');
    const gponOption = tecnologiaSelect.querySelector('option[value="GPON"]');
    adslOption.style.display = "block";
    cobreOption.style.display = "block";
    dthOption.style.display = "none";
    gponOption.style.display = "none";
  }
});

// FETCH LOCALIZACIONES

fetch("../Json/Localizaciones.json")
  .then((response) => response.json())
  .then((datos) => {
    var select_dpto = document.getElementById("dpto_colonia");
    select_dpto.innerHTML = "<option value=''>SELECCIONE UNA OPCION</option>";
    for (var i = 0; i < datos.length; i++) {
      var option = document.createElement("option");
      option.value = datos[i].DEPTO + datos[i].COLONIA;
      option.text = datos[i].DEPTO + datos[i].COLONIA;
      select_dpto.add(option);
    }
  });
