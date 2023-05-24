$(function () {
  // Initialize Select2 Elements
  $(".select2").select2();

  // Datemask dd/mm/yyyy
  // $("[data-mask]").inputmask();

  // $(".datepicker").datepicker();

  // $("#datepicker").datetimepicker({
  //   format: "yyyy-mm-dd hh:ii",
  // });
});

const MotivoConsulta = document.getElementById("MotivoConsulta");
const TipoMotivoConsulta = document.getElementById("TipoMotivoConsulta");

// OPCIONES DE INPUTS EN BASE A LA SELECCIONEDE LA TECNOLOGIA

document.addEventListener("DOMContentLoaded", function () {
  MotivoConsulta.addEventListener("change", function () {
    if (MotivoConsulta.value === "COMPLETAR GESTION") {
      TipoMotivoConsulta.innerHTML = `
    <option value="">SELECCIONE UNA OPCION</option>
    <option value="TERMINAR PROCESO DE ATENCION VENTA">TERMINAR PROCESO DE ATENCION VENTA</option>
    <option value="TERMINAR PROCESO DE ATENCION DAÑO">TERMINAR PROCESO DE ATENCION DAÑO</option>
    <option value="TERMINAR PROCESO DE ATENCION POSTVENTA">TERMINAR PROCESO DE ATENCION POSTVENTA</option>
    <option value="TERMINAR PROCESO DE ATENCION ANULACION">TERMINAR PROCESO DE ATENCION ANULACION</option>

    <option value="GENERA ORDEN DE CLARO VIDEO">GENERA ORDEN DE CLARO VIDEO</option>
    <option value="INCONSISTENCIA OPEN">INCONSISTENCIA OPEN</option>
    <option value="CONFRIMAR SEÑAL">CONFRIMAR SEÑAL</option>
    <option value="MAL PROCESO ETA">MAL PROCESO ETA</option>
    <option value="PAGO DE MA">PAGO DE MA</option>
    <option value="CANCELAR ETA">CANCELAR ETA</option>
    <option value="SUSPENDER MOVER ETA">SUSPENDER MOVER ETA</option>
    `;
      TipoMotivoConsulta.disabled = false;
    } else if (MotivoConsulta.value === "GESTIÓN DENEGADA") {
      TipoMotivoConsulta.innerHTML = `
    <option value="">SELECCIONE UNA OPCION</option>
    <option value="SOLICITUDES ATENDIDAS EN SISTEMA">SOLICITUDES ATENDIDAS EN SISTEMA</option>
    <option value="CLIENTE NO TIENE DINERO PARA INSTALACION">CLIENTE NO TIENE DINERO PARA INSTALACION</option>
    <option value="CAMBIO DE EQUIPOS">CAMBIO DE EQUIPOS</option>
    <option value="AGENDAR SOLICITUD CON TRANFERENCIA">AGENDAR SOLICITUD CON TRANFERENCIA</option>
    <option value="INFUNDAR SOLICITUD CON TRANFERENCIA">INFUNDAR SOLICITUD CON TRANFERENCIA</option>
    <option value="REAGENDAR CON CITA INCUMPLIDA">REAGENDAR CON CITA INCUMPLIDA</option>
    <option value="DATOS INCOMPLETOS SYREM">DATOS INCOMPLETOS SYREM</option>
    <option value="EQUIPO OCUPADO - NO INVENTARIADO">EQUIPO OCUPADO - NO INVENTARIADO</option>
    <option value="CLIENTE CON DEUDA">CLIENTE CON DEUDA</option>
    <option value="SIN AUTORIZADO DE SUP TECNICO">SIN AUTORIZADO DE SUP TECNICO</option>
    <option value="SKILL ERRONEO - INFUNDADO">SKILL ERRONEO - INFUNDADO</option>
    <option value="TECNICO NO LLAMA DEL ASIGNADO">TECNICO NO LLAMA DEL ASIGNADO</option>

    `;
      TipoMotivoConsulta.disabled = false;
    } else if (MotivoConsulta.value === "DATOS DE CLIENTE") {
      TipoMotivoConsulta.innerHTML = `
    <option value="SELECCIONE UNA OPCION">SELECCIONE UNA OPCION</option>
    <option value="CONTACTOS">CONTACTOS</option>
    <option value="ESTADO DE CUENTA - ESTADO DE SERVICIO">ESTADO DE CUENTA - ESTADO DE SERVICIO</option>
    <option value="DIRECCION">DIRECCION</option>

    `;
      TipoMotivoConsulta.disabled = false;
    } else if (MotivoConsulta.value === "GENERAR DAÑO") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "AUTORIZADO AREA TECNICA") {
      TipoMotivoConsulta.innerHTML = `
    <option value="">SELECCIONE UNA OPCION</option>
    <option value="CAMBIO DE EQUIPOS - ROBO">CAMBIO DE EQUIPOS - ROBO</option>
    <option value="CAMBIO DE EQUIPOS - ROBO/POR CORREO">CAMBIO DE EQUIPOS - ROBO/POR CORREO</option>
    <option value="CAMBIO DE EQUIPOS - EXTRAVIO">CAMBIO DE EQUIPOS - EXTRAVIO</option>
    <option value="CAMBIO DE EQUIPOS - EXTRAVIO/POR ETA">CAMBIO DE EQUIPOS - EXTRAVIO/POR ETA</option>
    <option value="NODO">NODO</option>
    <option value="DESCARGUE EN LINEA">DESCARGUE EN LINEA</option>
    <option value="SIN SYREM">SIN SYREM</option>
    <option value="SIN ETA">SIN ETA</option>
    <option value="SIN CLARO CINEMA">SIN CLARO CINEMA</option>
    <option value="CLARO VIDEO">CLARO VIDEO</option>
    <option value="EQUIPO NO INVENTARIADO EN BODEGA VIRTUAL">EQUIPO NO INVENTARIADO EN BODEGA VIRTUAL</option>
    <option value="EXCEDENTE DE METRAJE">EXCEDENTE DE METRAJE</option>
    <option value="DESCARGUE DE ORDEN CON OTRO TECNICO">DESCARGUE DE ORDEN CON OTRO TECNICO</option>
    `;
      TipoMotivoConsulta.disabled = false;
    } else if (MotivoConsulta.value === "ANTIFRAUDE") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>
      <option value="TRASLADOS">TRASLADOS</option>
      <option value="DAÑOS">DAÑOS</option>
      <option value="MIGRACIONES">MIGRACIONES</option>
      `;
      TipoMotivoConsulta.disabled = false;
    } else if (MotivoConsulta.value === "REFRESH-INICIALIZACION") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>
      <option value="STB">STB</option>
      <option value="MODEM">MODEM</option>
      `;
      TipoMotivoConsulta.disabled = false;
    } else if (MotivoConsulta.value === "INCONSISTENCIA / APLICATIVOS") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>
      <option value="OPEN">OPEN</option>
      <option value="SYREM">SYREM</option>
      <option value="ETA">ETA</option>
      <option value="OTROS">OTROS</option>
      `;
      TipoMotivoConsulta.disabled = false;
    } else if (MotivoConsulta.value === "CONTACTAR A CLIENTE") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "PREVISITAS") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "MIGRACION EXCEDENTE DE CARÁCTER") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>
      <option value="ANULACION DE SOLICITUD">ANULACION DE SOLICITUD</option>
      <option value="CORRECCION DE DIRECCION">CORRECCION DE DIRECCION</option>
      `;
      TipoMotivoConsulta.disabled = false;
    } else if (MotivoConsulta.value === "TECNICO CORTA LLAMADA") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "LLAMADA CORTADA POR ERROR") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "QUITAR IMPEDIMENTOS") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "PROYECTO FITEL") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "FALLA MASIVA EN LA RED") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "CORRECCION DE DIRECCION") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "CORRECCION DE NODO") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "SE GENERA INCIDENTE") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "PENDIENTE POR INCIDENTES") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "CORTE DE ENERGIA COMERCIAL") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "CORRECION DE ELEMENTOS DE RED") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "PENDIENTE POR CICLO DE FACTURACION") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "CLIENTE DESEA INTERNO-CONTRATA") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else if (MotivoConsulta.value === "OTROS") {
      TipoMotivoConsulta.innerHTML = `
      <option value="">SELECCIONE UNA OPCION</option>`;
      TipoMotivoConsulta.disabled = true;
    } else {
      TipoMotivoConsulta.innerHTML = `
    <option value="">SELECCIONE UNA OPCION</option>`;
    }
  });
});
