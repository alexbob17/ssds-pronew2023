document.addEventListener("DOMContentLoaded", function () {
  const form1 = document.getElementById("form1");
  const form2 = document.getElementById("form2");
  const form3 = document.getElementById("form3");
  const form4 = document.getElementById("form4");
  const form5 = document.getElementById("form5");
  const form6 = document.getElementById("form6");
  const btn_show = document.getElementById("btn-save");

  const select = document.querySelector("select[name='tecnologia']");

  form2.style.display = "none";
  form3.style.display = "none";
  form4.style.display = "none";
  form5.style.display = "none";
  form6.style.display = "none";
  btn_show.style.display = "none";

  form1.style.display = "block";

  select.addEventListener("change", function () {
    form2.style.display = "none";
    form3.style.display = "none";
    form4.style.display = "none";
    form5.style.display = "none";
    form6.style.display = "none";
    btn_show.style.display = "none";

    switch (select.value) {
      case "HFC":
        form2.style.display = "block";
        btn_show.style.display = "block";
        break;
      case "ADSL":
        form3.style.display = "block";
        btn_show.style.display = "block";
        break;
      case "DTH":
        form4.style.display = "block";
        btn_show.style.display = "block";
        break;
      case "COBRE":
        form5.style.display = "block";
        btn_show.style.display = "block";
        break;
      case "GPON":
        form6.style.display = "block";
        btn_show.style.display = "block";
        break;
    }
  });
});
