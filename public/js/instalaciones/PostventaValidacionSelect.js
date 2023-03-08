$(function () {
  // Initialize Select2 Elements
  $(".select2").select2();
});

// Obtenemos los forms generales a ocultar de traslados
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

const btn_submit = document.getElementById("btn-submit");
btn_submit.style.display = "none";

// Obtenemos los forms generales a ocultar de adicion

// POSTVENTA TRASLADO HFC

const RealizadaTrasladoHfc = document.getElementById("RealizadaTrasladoHfc");
const ObjetadaTrasladoHfc = document.getElementById("ObjetadaTrasladoHfc");
const AnuladaTrasladoHfc = document.getElementById("AnuladaTrasladoHfc");

// TIPO ACTIVIDAD

const TipoActividadTrasladoHfc = document.getElementById(
  "TipoActividadTrasladoHfc"
);

const TipoActividadTrasladoGpon = document.getElementById(
  "TipoActividadTrasladoGpon"
);
const TipoActividadTrasladoAdsl = document.getElementById(
  "TipoActividadTrasladoAdsl"
);
const TipoActividadTrasladoCobre = document.getElementById(
  "TipoActividadTrasladoCobre"
);
const TipoActividadTrasladoDth = document.getElementById(
  "TipoActividadTrasladoDth"
);

// POSTVENTA TRASLADO GPON

const RealizadaTrasladoGpon = document.getElementById("RealizadaTrasladoGpon");
const ObjetadaTrasladoGpon = document.getElementById("ObjetadaTrasladoGpon");
const AnuladaTrasladoGpon = document.getElementById("AnuladaTrasladoGpon");

// POSTVENTA TRASLADO ADSL

const RealizadaTrasladoAdsl = document.getElementById("RealizadaTrasladoAdsl");
const ObjetadaTrasladoAdsl = document.getElementById("ObjetadaTrasladoAdsl");
const AnuladaTrasladoAdsl = document.getElementById("AnuladaTrasladoAdsl");

// POSTVENTA TRASLADO COBRE
const RealizadaTrasladoCobre = document.getElementById(
  "RealizadaTrasladoCobre"
);
const ObjetadaTrasladoCobre = document.getElementById("ObjetadaTrasladoCobre");
const AnuladaTrasladoCobre = document.getElementById("AnuladaTrasladoCobre");

// POSTVENTA TRASLADO DTH
const RealizadaTrasladoDth = document.getElementById("RealizadaTrasladoDth");
const ObjetadaTrasladoDth = document.getElementById("ObjetadaTrasladoDth");
const AnuladaTrasladoDth = document.getElementById("AnuladaTrasladoDth");

// Obtenemos los selects
const selectPostventa = document.querySelector(
  "select[name='Select_Postventa']"
);
const selectTecnologia = document.querySelector("select[name='tecnologia']");

// Obtenemos los divs RealizadoObjetadoAnulado de cada Postventa
const TrasladoHfcHidden = document.querySelectorAll(".TrasladoHfcHidden");
const TrasladoGponHidden = document.querySelectorAll(".TrasladoGponHidden");
const TrasladoAdslHidden = document.querySelectorAll(".TrasladoAdslHidden");
const TrasladoCobreHidden = document.querySelectorAll(".TrasladoCobreHidden");
const TrasladoDthHidden = document.querySelectorAll(".TrasladoDthHidden");

// Creamos una función que muestre u oculte los elementos según los valores de los selects
function mostrarElementos() {
  // Los ocultamos al principio
  postventaTrasladosHfc.style.display = "none";
  postventaTrasladosGpon.style.display = "none";
  postventaTrasladosAdsl.style.display = "none";
  postventaTrasladosCobre.style.display = "none";
  postventaTrasladosDth.style.display = "none";

  //POSTVENTA ADICION
  PostventaAdicionHfc.style.display = "none";
  btn_submit.style.display = "none";

  switch (selectPostventa.value + "|" + selectTecnologia.value) {
    case "POSTVENTA TRASLADO|HFC":
      // MOSTRAR FORMS EN BASE A LA SELECCION
      postventaTrasladosHfc.style.display = "block";

      //MOSTRAR VALORES RESET DEL TIPO ACTIVIDAD AL CAMBIAR DE TECNOLOGIA
      TipoActividadTrasladoHfc.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoGpon.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoAdsl.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoCobre.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoDth.value = "SELECCIONE UNA OPCION";

      //   OCULTA GPON/ADSL/COBRE/DTH
      for (let i = 0; i < TrasladoHfcHidden.length; i++) {
        TrasladoHfcHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoGponHidden.length; i++) {
        TrasladoGponHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoAdslHidden.length; i++) {
        TrasladoAdslHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoCobreHidden.length; i++) {
        TrasladoCobreHidden[i].style.display = "none";
      }

      for (let i = 0; i < TrasladoDthHidden.length; i++) {
        TrasladoDthHidden[i].style.display = "none";
      }

      break;
    case "POSTVENTA TRASLADO|GPON":
      //MOSTRAR VALORES RESET DEL TIPO ACTIVIDAD AL CAMBIAR DE TECNOLOGIA
      TipoActividadTrasladoHfc.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoGpon.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoAdsl.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoCobre.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoDth.value = "SELECCIONE UNA OPCION";

      // OCULTA HFC/ADSL/COBRE/DTH
      for (let i = 0; i < TrasladoHfcHidden.length; i++) {
        TrasladoHfcHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoGponHidden.length; i++) {
        TrasladoGponHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoAdslHidden.length; i++) {
        TrasladoAdslHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoCobreHidden.length; i++) {
        TrasladoCobreHidden[i].style.display = "none";
      }

      for (let i = 0; i < TrasladoDthHidden.length; i++) {
        TrasladoDthHidden[i].style.display = "none";
      }
      postventaTrasladosGpon.style.display = "block";

      break;
    case "POSTVENTA TRASLADO|ADSL":
      // OCULTA HFC/GPON/COBRE/DTH

      //MOSTRAR VALORES RESET DEL TIPO ACTIVIDAD AL CAMBIAR DE TECNOLOGIA
      TipoActividadTrasladoHfc.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoGpon.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoAdsl.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoCobre.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoDth.value = "SELECCIONE UNA OPCION";

      for (let i = 0; i < TrasladoHfcHidden.length; i++) {
        TrasladoHfcHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoGponHidden.length; i++) {
        TrasladoGponHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoAdslHidden.length; i++) {
        TrasladoAdslHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoCobreHidden.length; i++) {
        TrasladoCobreHidden[i].style.display = "none";
      }

      for (let i = 0; i < TrasladoDthHidden.length; i++) {
        TrasladoDthHidden[i].style.display = "none";
      }
      postventaTrasladosAdsl.style.display = "block";
      postventaTrasladosHfc.style.display = "none";
      postventaTrasladosGpon.style.display = "none";
      postventaTrasladosCobre.style.display = "none";
      postventaTrasladosDth.style.display = "none";

      break;
    case "POSTVENTA TRASLADO|COBRE":
      //MOSTRAR VALORES RESET DEL TIPO ACTIVIDAD AL CAMBIAR DE TECNOLOGIA
      TipoActividadTrasladoHfc.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoGpon.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoAdsl.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoCobre.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoDth.value = "SELECCIONE UNA OPCION";

      // OCULTA HFC/GPON/ADSL/DTH
      for (let i = 0; i < TrasladoHfcHidden.length; i++) {
        TrasladoHfcHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoGponHidden.length; i++) {
        TrasladoGponHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoAdslHidden.length; i++) {
        TrasladoAdslHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoCobreHidden.length; i++) {
        TrasladoCobreHidden[i].style.display = "none";
      }

      for (let i = 0; i < TrasladoDthHidden.length; i++) {
        TrasladoDthHidden[i].style.display = "none";
      }
      postventaTrasladosCobre.style.display = "block";

      break;
    case "POSTVENTA TRASLADO|DTH":
      //MOSTRAR VALORES RESET DEL TIPO ACTIVIDAD AL CAMBIAR DE TECNOLOGIA
      TipoActividadTrasladoHfc.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoGpon.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoAdsl.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoCobre.value = "SELECCIONE UNA OPCION";
      TipoActividadTrasladoDth.value = "SELECCIONE UNA OPCION";

      // OCULTA HFC/GPON/ADSL/COBRE
      for (let i = 0; i < TrasladoHfcHidden.length; i++) {
        TrasladoHfcHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoGponHidden.length; i++) {
        TrasladoGponHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoAdslHidden.length; i++) {
        TrasladoAdslHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoCobreHidden.length; i++) {
        TrasladoCobreHidden[i].style.display = "none";
      }

      for (let i = 0; i < TrasladoDthHidden.length; i++) {
        TrasladoDthHidden[i].style.display = "none";
      }
      postventaTrasladosDth.style.display = "block";

      break;
    case "POSTVENTA ADICION|HFC":
      PostventaAdicionHfc.style.display = "block";
      break;
    default:
      // OCULTA TODOS
      for (let i = 0; i < TrasladoHfcHidden.length; i++) {
        TrasladoHfcHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoGponHidden.length; i++) {
        TrasladoGponHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoAdslHidden.length; i++) {
        TrasladoAdslHidden[i].style.display = "none";
      }
      for (let i = 0; i < TrasladoCobreHidden.length; i++) {
        TrasladoCobreHidden[i].style.display = "none";
      }

      for (let i = 0; i < TrasladoDthHidden.length; i++) {
        TrasladoDthHidden[i].style.display = "none";
      }
      postventaTrasladosGpon.style.display = "none";
      postventaTrasladosHfc.style.display = "none";
      postventaTrasladosAdsl.style.display = "none";
      postventaTrasladosCobre.style.display = "none";
      postventaTrasladosDth.style.display = "none";

      break;
  }
}

// Llamamos la función para que se ejecute al inicio y cada vez que cambie un select
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
      document.getElementById("AnuladaTrasladoAdsl"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadTrasladoCobre']"),
    forms: [
      document.getElementById("RealizadaTrasladoCobre"),
      document.getElementById("ObjetadaTrasladoCobre"),
      document.getElementById("AnuladaTrasladoCobre"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadTrasladoDth']"),
    forms: [
      document.getElementById("RealizadaTrasladoDth"),
      document.getElementById("ObjetadaTrasladoDth"),
      document.getElementById("AnuladaTrasladoDth"),
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

// CAMBIAR TIPO DE ORDEN EN BASE TIPO POSTVENTA Y TECNOLOGIA

const select_orden = document.getElementById("select_orden");

// FUNCION PARA ACTUALIZAR LAS OPCIONES DE TIPO ORDEN
function actualizarOpciones() {
  switch (selectPostventa.value + "|" + selectTecnologia.value) {
    case "POSTVENTA TRASLADO|HFC":
      select_orden.innerHTML = `
        <option value="">SELECCIONE UNA OPCION</option>
        <option value="TRASLADO INDIVIDUAL">TRASLADO INDIVIDUAL</option>
        <option value="TRASLADO DOBLE"> TRASLADO DOBLE</option>
        <option value="TRASLADO TRIPLE">TRASLADO TRIPLE</option>
      `;
      break;

    case "POSTVENTA TRASLADO|GPON":
      select_orden.innerHTML = `
        <option value="">SELECCIONE UNA OPCION</option>
        <option value="TRASLADO INDIVIDUAL">TRASLADO INDIVIDUAL</option>
        <option value="TRASLADO DOBLE"> TRASLADO DOBLE</option>
        <option value="TRASLADO TRIPLE">TRASLADO TRIPLE</option>
      `;
      break;
    case "POSTVENTA TRASLADO|ADSL":
      select_orden.innerHTML = `
        <option value="">SELECCIONE UNA OPCION</option>
        <option value="TRASLADO">TRASLADO</option>
      `;
      break;
    case "POSTVENTA TRASLADO|COBRE":
      select_orden.innerHTML = `
          <option value="">SELECCIONE UNA OPCION</option>
          <option value="TRASLADO">TRASLADO</option>
        `;
      break;
    case "POSTVENTA TRASLADO|DTH":
      select_orden.innerHTML = `
          <option value="">SELECCIONE UNA OPCION</option>
          <option value="TRASLADO">TRASLADO</option>
        `;
      break;
    // AQUI PODRIAS AGREGAR MAS CASOS PARA DIFERENTES COMBINACIONES DE VALORES
    default:
      select_orden.innerHTML = `<option value="">SELECCIONE UNA OPCION</option>`;
  }
}

// ACTUALIZAR LAS OPCIONES CUANDO CAMBIA selectPostventa O selectTecnologia
selectPostventa.addEventListener("change", actualizarOpciones);
selectTecnologia.addEventListener("change", actualizarOpciones);

// FETCH LOCALIZACIONES

fetch("../Json/Localizaciones.json")
  .then((response) => response.json())
  .then((datos) => {
    var select_dpto = document.getElementById("dpto_colonia");
    select_dpto.innerHTML = "<option value=''>Seleccione una opción</option>";
    for (var i = 0; i < datos.length; i++) {
      var option = document.createElement("option");
      option.value = datos[i].DEPTO + datos[i].COLONIA;
      option.text = datos[i].DEPTO + datos[i].COLONIA;
      select_dpto.add(option);
    }
  });
