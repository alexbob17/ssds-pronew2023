// const form = document.getElementById("registro-tecnico-form");
// const data = new FormData(form);

// // Escuchar el evento submit
// form.addEventListener("submit", (event) => {
//   event.preventDefault(); // Evitar que el formulario se envíe

//   fetch("/tecnicos/registro", {
//     method: "POST",
//     headers: {
//       "Content-Type": "application/json",
//       "X-CSRF-TOKEN": document
//         .querySelector('meta[name="csrf-token"]')
//         .getAttribute("content"),
//     },
//     body: JSON.stringify(data),
//   })
//     .then((response) => {
//       if (response.ok) {
//         // Aquí puedes mostrar la alerta de éxito
//         Swal.fire({
//           icon: "success",
//           title: "Técnico registrado correctamente",
//           showConfirmButton: false,
//           timer: 1500,
//         });
//       } else {
//         // Aquí puedes mostrar una alerta de error
//         Swal.fire({
//           icon: "error",
//           title: "Error al registrar técnico",
//           text: "Por favor, intenta de nuevo",
//           confirmButtonText: "Cerrar",
//         });
//       }
//     })
//     .catch((error) => {
//       console.error("Error:", error);
//     });
// });
