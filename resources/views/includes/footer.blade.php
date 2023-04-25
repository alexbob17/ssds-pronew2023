<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 3.0
    </div>
    <p>Copyright © <b id="year"></b> Claro Nicaragua.</p>
</footer>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const yearEl = document.getElementById("year");
    const year = new Date().getFullYear();
    yearEl.textContent = year;
})
</script>