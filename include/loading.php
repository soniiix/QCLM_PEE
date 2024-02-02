<div class="loader" id="loader">
    <div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<style>
    .loader {
        backdrop-filter: blur(40px);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.2s;
    }

    .loader--hidden {
        opacity: 0;
        visibility: hidden;
    }
</style>