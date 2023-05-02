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
  // HFC

  const select_orden = document.getElementById("select_orden");
  const tecnologia = document.getElementById("tecnologia");

  const [orden_tv_hfc, orden_internet_hfc, orden_linea_hfc] =
    document.querySelectorAll(
      "#orden_tv_hfc, #orden_internet_hfc, #orden_linea_hfc"
    );

  orden_tv_hfc.disabled = true;
  orden_internet_hfc.disabled = true;
  orden_linea_hfc.disabled = true;

  if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;
  } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;
  } else if (select_orden.value == "DOBLE - TV + INTERNET") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "LINEA INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = false;
  } else if (select_orden.value == "INTERNET INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "TV - DIGITAL INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "TV - BASICO INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "REACTIVACION -DOBLE - TV + INTERNET") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "REACTIVACION -DOBLE - INTERNET + LINEA") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -TV - DIGITAL INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "REACTIVACION -TV - BASICO INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "REACTIVACION -INTERNET INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "REACTIVACION -LINEA INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = false;
  } else if (
    select_orden.value == "REACTIVACION - INSTALACION DE CLARO HOGAR"
  ) {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;
  }

  select_orden.addEventListener("change", function () {
    if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;
    } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      orden_tv_hfc.value = "";
    } else if (select_orden.value == "DOBLE - TV + INTERNET") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      orden_linea_hfc.value = "";
    } else if (select_orden.value == "LINEA INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = false;

      orden_tv_hfc.value = "";
      orden_internet_hfc.value = "";
    } else if (select_orden.value == "INTERNET INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      orden_tv_hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "TV - DIGITAL INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "TV - BASICO INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -DOBLE - TV + INTERNET") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      orden_linea_hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -DOBLE - INTERNET + LINEA") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      orden_tv_hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -TV - DIGITAL INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -TV - BASICO INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -INTERNET INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      orden_tv_hfc.value = "";
      orden_linea_hfc.value = "";
      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }

      hideVoip_Hfc.value = "";
      sapHfc.value = "";
    } else if (select_orden.value == "REACTIVACION -LINEA INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = false;

      orden_tv_hfc.value = "";
      orden_internet_hfc.value = "";
    } else if (
      select_orden.value == "REACTIVACION - INSTALACION DE CLARO HOGAR"
    ) {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;
    }
  });

  if (tecnologia.value === "HFC") {
    if (select_orden.value === "INSTALACION DE CLARO HOGAR") {
      orden_internet_hfc.required = true;
      orden_tv_hfc.required = true;
      orden_linea_hfc.required = true;
    } else if (select_orden.value === "DOBLE - TV + INTERNET") {
      orden_internet_hfc.required = true;
      orden_tv_hfc.required = true;
      orden_linea_hfc.required = false;
    } else if (select_orden.value === "DOBLE - INTERNET + LINEA") {
      orden_internet_hfc.required = true;
      orden_tv_hfc.required = false;
      orden_linea_hfc.required = true;
    } else if (select_orden.value === "TV - BASICO INDIVIDUAL") {
      orden_internet_hfc.required = false;
      orden_tv_hfc.required = true;
      orden_linea_hfc.required = false;
    } else if (select_orden.value === "TV - DIGITAL INDIVIDUAL") {
      orden_internet_hfc.required = false;
      orden_tv_hfc.required = true;
      orden_linea_hfc.required = false;
    } else if (select_orden.value === "INTERNET INDIVIDUAL") {
      orden_internet_hfc.required = true;
      orden_tv_hfc.required = false;
      orden_linea_hfc.required = false;
    } else if (select_orden.value === "LINEA INDIVIDUAL") {
      orden_internet_hfc.required = false;
      orden_tv_hfc.required = false;
      orden_linea_hfc.required = true;
    } else if (select_orden.value === "REFRESH") {
      orden_internet_hfc.required = true;
      orden_tv_hfc.required = true;
      orden_linea_hfc.required = false;
    } else if (select_orden.value === "REACTIVACION -DOBLE - TV + INTERNET") {
      orden_internet_hfc.required = true;
      orden_tv_hfc.required = true;
      orden_linea_hfc.required = false;
    } else if (
      select_orden.value === "REACTIVACION - INSTALACION DE CLARO HOGAR"
    ) {
      orden_internet_hfc.required = true;
      orden_tv_hfc.required = true;
      orden_linea_hfc.required = true;
    } else if (
      select_orden.value === "REACTIVACION -DOBLE - INTERNET + LINEA"
    ) {
      orden_internet_hfc.required = true;
      orden_tv_hfc.required = false;
      orden_linea_hfc.required = true;
    } else if (select_orden.value === "REACTIVACION -TV - BASICO INDIVIDUAL") {
      orden_internet_hfc.required = false;
      orden_tv_hfc.required = true;
      orden_linea_hfc.required = false;
    } else if (select_orden.value === "REACTIVACION -TV - DIGITAL INDIVIDUAL") {
      orden_internet_hfc.required = false;
      orden_tv_hfc.required = true;
      orden_linea_hfc.required = false;
    } else if (select_orden.value === "REACTIVACION -LINEA INDIVIDUAL") {
      orden_internet_hfc.required = false;
      orden_tv_hfc.required = false;
      orden_linea_hfc.required = true;
    } else {
      orden_internet_hfc.required = false;
      orden_tv_hfc.required = false;
      orden_linea_hfc.required = false;
    }
  }
});
