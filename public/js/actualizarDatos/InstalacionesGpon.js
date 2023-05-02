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

document.addEventListener("DOMContentLoaded", function () {
  // GPON
  const tipo_actividadGpon = document.getElementById("tipo_actividadGpon");

  const OrdenInternet_Gpon = document.getElementById("OrdenInternet_Gpon");
  const OrdenTv_Gpon = document.getElementById("OrdenTv_Gpon");
  const OrdenLinea_Gpon = document.getElementById("OrdenLinea_Gpon");
  const equipotvGpon = document.querySelectorAll(".equipotvGpon");
  const EqModenGpon = document.getElementById("EqModenGpon");
  const NumeroGpon = document.getElementById("NumeroGpon");

  OrdenInternet_Gpon.disabled = true;
  OrdenTv_Gpon.disabled = true;
  OrdenLinea_Gpon.disabled = true;

  if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = false;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = false;
    }

    EqModenGpon.disabled = false;
    NumeroGpon.disabled = false;
  } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = true;
    OrdenLinea_Gpon.disabled = false;

    EqModenGpon.disabled = false;
    NumeroGpon.disabled = false;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = true;
    }
  } else if (select_orden.value == "DOBLE - INTERNET + IPTV") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = true;

    EqModenGpon.disabled = false;
    NumeroGpon.disabled = true;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = false;
    }
  } else if (select_orden.value == "LINEA INDIVIDUAL") {
    OrdenInternet_Gpon.disabled = true;
    OrdenTv_Gpon.disabled = true;
    OrdenLinea_Gpon.disabled = false;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = true;
    }

    EqModenGpon.disabled = true;
    NumeroGpon.disabled = false;
  } else if (select_orden.value == "INTERNET INDIVIDUAL") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = true;
    OrdenLinea_Gpon.disabled = true;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = true;
    }

    EqModenGpon.disabled = false;
    NumeroGpon.disabled = true;
  } else if (select_orden.value == "DOBLE - IPTV + LINEA") {
    OrdenInternet_Gpon.disabled = true;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = false;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = false;
    }

    EqModenGpon.disabled = true;
    NumeroGpon.disabled = false;
  } else if (select_orden.value == "IPTV INDIVIDUAL") {
    OrdenInternet_Gpon.disabled = true;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = true;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = false;
    }

    EqModenGpon.disabled = true;
    NumeroGpon.disabled = true;
  }

  select_orden.addEventListener("change", function () {
    if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }

      EqModenGpon.disabled = false;
      NumeroGpon.disabled = false;
    } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = true;
      OrdenLinea_Gpon.disabled = false;

      EqModenGpon.disabled = false;
      NumeroGpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = true;
      }

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].value = "";
      }

      OrdenTv_Gpon.value = "";
    } else if (select_orden.value == "DOBLE - INTERNET + IPTV") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = true;

      EqModenGpon.disabled = false;
      NumeroGpon.disabled = true;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }

      NumeroGpon.value = "";
      OrdenLinea_Gpon.value = "";
    } else if (select_orden.value == "LINEA INDIVIDUAL") {
      OrdenInternet_Gpon.disabled = true;
      OrdenTv_Gpon.disabled = true;
      OrdenLinea_Gpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = true;
      }

      EqModenGpon.disabled = true;
      NumeroGpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].value = "";
      }
      OrdenInternet_Gpon.value = "";
      OrdenTv_Gpon.value = "";
      EqModenGpon.value = "";
    } else if (select_orden.value == "INTERNET INDIVIDUAL") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = true;
      OrdenLinea_Gpon.disabled = true;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = true;
      }

      EqModenGpon.disabled = false;
      NumeroGpon.disabled = true;

      OrdenTv_Gpon.value = "";
      OrdenLinea_Gpon.value = "";
      NumeroGpon.value = "";

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].value = "";
      }
    } else if (select_orden.value == "DOBLE - IPTV + LINEA") {
      OrdenInternet_Gpon.disabled = true;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }

      EqModenGpon.disabled = true;
      NumeroGpon.disabled = false;

      OrdenInternet_Gpon.value = "";
      EqModenGpon.value = "";
    } else if (select_orden.value == "IPTV INDIVIDUAL") {
      OrdenInternet_Gpon.disabled = true;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = true;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }

      EqModenGpon.disabled = true;
      NumeroGpon.disabled = true;

      OrdenLinea_Gpon.value = "";
      OrdenInternet_Gpon.value = "";
      EqModenGpon.value = "";
      NumeroGpon.value = "";
    }
  });

  if (tecnologia.value === "GPON") {
    if (select_orden.value === "INSTALACION DE CLARO HOGAR") {
      OrdenInternet_Gpon.required = true;
      OrdenTv_Gpon.required = true;
      OrdenLinea_Gpon.required = true;
    } else if (select_orden.value === "DOBLE - IPTV + LINEA") {
      OrdenInternet_Gpon.required = false;
      OrdenTv_Gpon.required = true;
      OrdenLinea_Gpon.required = true;
    } else if (select_orden.value === "DOBLE - INTERNET + IPTV") {
      OrdenInternet_Gpon.required = true;
      OrdenTv_Gpon.required = true;
      OrdenLinea_Gpon.required = false;
    } else if (select_orden.value === "DOBLE - INTERNET + LINEA") {
      OrdenInternet_Gpon.required = true;
      OrdenTv_Gpon.required = false;
      OrdenLinea_Gpon.required = true;
    } else if (select_orden.value === "INTERNET INDIVIDUAL") {
      OrdenInternet_Gpon.required = true;
      OrdenTv_Gpon.required = false;
      OrdenLinea_Gpon.required = false;
    } else if (select_orden.value === "IPTV INDIVIDUAL") {
      OrdenInternet_Gpon.required = false;
      OrdenTv_Gpon.required = true;
      OrdenLinea_Gpon.required = false;
    } else if (select_orden.value === "LINEA INDIVIDUAL") {
      OrdenInternet_Gpon.required = false;
      OrdenTv_Gpon.required = false;
      OrdenLinea_Gpon.required = true;
    } else {
      OrdenInternet_Gpon.required = false;
      OrdenTv_Gpon.required = false;
      OrdenLinea_Gpon.required = false;
    }
  }
});
