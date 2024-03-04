<script type="text/javascript">
    // Register Service Worker
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
            .register("<?php echo BASE_ROOT . "service-workers.js" ?>")
            .then((registration) => {
                console.log("Service Worker registered with scope:", registration.scope);
            })
            .catch((error) => {
                console.error("Service Worker registration failed:", error);
            });
    }
</script>