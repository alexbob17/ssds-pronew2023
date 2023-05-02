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
  const hideVoip_Hfc = document.getElementById("numeroVoip_hfc");
  const EquipoModem_Hfc = document.getElementById("EquipoModem_Hfc");
  const equipotvHfc = document.querySelectorAll(".equipotvHfc");
  const sapHfc = document.getElementById("sapHfc");
  const syrengHfc = document.getElementById("syrengHfc");
  const GeorefHfc = document.getElementById("GeorefHfc");
  const RecibeHfc = document.getElementById("RecibeHfc");
  const NodoHfc = document.getElementById("NodoHfc");
  const TapHfc = document.getElementById("TapHfc");
  const PosicionHfc = document.getElementById("PosicionHfc");
  const MaterialesHfc = document.getElementById("MaterialesHfc");

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

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    hideVoip_Hfc.disabled = false;
    EquipoModem_Hfc.disabled = false;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;

    hideVoip_Hfc.disabled = false;
    sapHfc.disabled = false;
    EquipoModem_Hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "DOBLE - TV + INTERNET") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;

    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = false;
    EquipoModem_Hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "LINEA INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = false;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "INTERNET INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    EquipoModem_Hfc.disabled = false;
    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
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
  } else if (select_orden.value == "REACTIVACION -DOBLE - TV + INTERNET") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    hideVoip_Hfc.disabled = true;
    EquipoModem_Hfc.disabled = false;
    sapHfc.disabled = true;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -DOBLE - INTERNET + LINEA") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    hideVoip_Hfc.disabled = false;
    sapHfc.disabled = true;
    EquipoModem_Hfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -TV - DIGITAL INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = true;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }
  } else if (select_orden.value == "REACTIVACION -TV - BASICO INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = true;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    sapHfc.disabled = true;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -INTERNET INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    EquipoModem_Hfc.disabled = false;
    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = true;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -LINEA INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = false;
    sapHfc.disabled = true;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (
    select_orden.value == "REACTIVACION - INSTALACION DE CLARO HOGAR"
  ) {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    hideVoip_Hfc.disabled = false;
    EquipoModem_Hfc.disabled = false;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  }

  select_orden.addEventListener("change", function () {
    if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      hideVoip_Hfc.disabled = false;
      EquipoModem_Hfc.disabled = false;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;
    } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = false;
      EquipoModem_Hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }
    } else if (select_orden.value == "DOBLE - TV + INTERNET") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = false;
      EquipoModem_Hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      hideVoip_Hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "LINEA INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      orden_internet_hfc.value = "";
      EquipoModem_Hfc.value = "";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }
    } else if (select_orden.value == "INTERNET INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      EquipoModem_Hfc.disabled = false;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      orden_linea_hfc.value = "";
      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }

      hideVoip_Hfc.value = "";
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

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
      EquipoModem_Hfc.value = "";
      hideVoip_Hfc.value = "";
    } else if (select_orden.value == "TV - BASICO INDIVIDUAL") {
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

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
      EquipoModem_Hfc.value = "";
      hideVoip_Hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -DOBLE - TV + INTERNET") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      hideVoip_Hfc.disabled = true;
      EquipoModem_Hfc.disabled = false;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      hideVoip_Hfc.value = "";
      orden_linea_hfc.value = "";
      sapHfc.value = "";
    } else if (select_orden.value == "REACTIVACION -DOBLE - INTERNET + LINEA") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = true;
      EquipoModem_Hfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      sapHfc.value = "";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }
    } else if (select_orden.value == "REACTIVACION -TV - DIGITAL INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
      EquipoModem_Hfc.value = "";
      hideVoip_Hfc.value = "";
      sapHfc.value = "";
    } else if (select_orden.value == "REACTIVACION -TV - BASICO INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      sapHfc.disabled = true;
      MaterialesHfc.disabled = false;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
      EquipoModem_Hfc.value = "";
      hideVoip_Hfc.value = "";
      sapHfc.value = "";
    } else if (select_orden.value == "REACTIVACION -INTERNET INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      EquipoModem_Hfc.disabled = false;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

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

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      orden_internet_hfc.value = "";
      sapHfc.value = "";
      EquipoModem_Hfc.value = "";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
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
    } else if (
      select_orden.value == "REACTIVACION - INSTALACION DE CLARO HOGAR"
    ) {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      hideVoip_Hfc.disabled = false;
      EquipoModem_Hfc.disabled = false;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;
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

  function resetValues() {
    const EquipoModem_Hfc = document.getElementById("EquipoModem_Hfc");
    const equipotvHfc = document.querySelectorAll(".equipotvHfc");
    const sapHfc = document.getElementById("sapHfc");
    const orden_tv_hfc = document.getElementById("orden_tv_hfc");
    const orden_internet_hfc = document.getElementById("orden_internet_hfc");
    const orden_linea_hfc = document.getElementById("orden_linea_hfc");
    const hideVoip_Hfc = document.getElementById("numeroVoip_hfc");

    EquipoModem_Hfc.value = "";
    orden_internet_hfc.value = "";
    orden_tv_hfc.value = "";
    orden_linea_hfc.value = "";
    hideVoip_Hfc.value = "";
    syrengHfc.value = "";
    GeorefHfc.value = "";
    RecibeHfc.value = "";
    NodoHfc.value = "";
    TapHfc.value = "";
    PosicionHfc.value = "";
    MaterialesHfc.value = "";
    sapHfc.value = "";

    equipotvHfc.forEach((equipotv) => {
      equipotv.value = "";
    });
  }
});
