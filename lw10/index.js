window.addEventListener('DOMContentLoaded', () => {
    const target1 = document.getElementById("review-btn");
    const target2 = document.getElementById("main-btn");
    const elem = document.getElementById("popup");
    const vector = document.getElementById("vector");
    const outside = document.getElementById("back");

    target1.addEventListener("click", open);
    target2.addEventListener("click", open);
    outside.addEventListener("click", function (event) {
        if (event.target === outside || event.target === vector) {
            close();
        }
    });
    document.addEventListener('keydown', function(event) {
        if (event.code === 'Escape' && outside.style.zIndex === '1') {
            close();
        }
    });

    function open() {
        elem.style.transition = "transform 1s, opacity 2s";
        elem.style.transform = "scale(1)"
        elem.style.opacity = 1;

        outside.style.transition = "background-color 0.5s, z-index 0.1s";
        outside.style.zIndex = 1;
        outside.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    }

    function close() {
        elem.style.transition = "transform 0.5s, opacity 0.5s";
        elem.style.transform = "scale(0.5)"
        elem.style.opacity = 0;

        outside.style.transition = "background-color 0.5s, z-index 3s";
        outside.style.backgroundColor = 'rgba(0, 0, 0, 0)';
        outside.style.zIndex = -1;
    }
});