<script>
    document.addEventListener("contextmenu", function(e) {
        e.preventDefault();
    });

    document.addEventListener("keydown", function(e) {
        if (e.key === "F12" ||
            (e.ctrlKey && e.shiftKey && (e.key === "I" || e.key === "J")) ||
            (e.ctrlKey && e.key === "U")) {
            e.preventDefault();
        }
    });
</script>
