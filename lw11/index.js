window.addEventListener('DOMContentLoaded', () => {
    const errorPopup = document.getElementById("error-popup");
    const submit = document.getElementById("form-submit");
    const target1 = document.getElementById("review-btn"); //reg bt review
    const target2 = document.getElementById("main-btn"); //reg btn main
    const elem = document.getElementById("popup"); //popup
    const vector = document.getElementById("vector"); //close btn
    const outside = document.getElementById("back"); //popup background

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
        elem.style.transition = "transform 2s, opacity 2s";
        elem.style.transform = "scale(1)"
        elem.style.opacity = 1;

        outside.style.transition = "background-color 2s, z-index 0.1s";
        outside.style.zIndex = 1;
        outside.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    }

    function close() {
        elem.style.transition = "transform 2s, opacity 2s";
        elem.style.transform = "scale(0.5)"
        elem.style.opacity = 0;

        outside.style.transition = "background-color 2s, z-index 3s";
        outside.style.backgroundColor = 'rgba(0, 0, 0, 0)';
        outside.style.zIndex = -1;
    }

    submit.addEventListener("click", () => {
        const input = document.getElementsByClassName("form__text-place");
        const option = document.getElementsByClassName("form__option");
        const checkbox = document.getElementsByClassName("form__checkbox");

        if (validation(input)) {
            const name = input[0].value;
            const email = input[1].value;
            let agreement = "Нет рассылки";
            if (checkbox[0].checked) {
                agreement = "Есть рассылка";
            }
            let activity = "Нет деятельности";

            for (let element of option) {
                if (element.selected) {
                    activity = element.text;
                }
            }

            let upload = {
                "name": name,
                "email": email,
                "activity": activity,
                "agreement": agreement
            };

            fetch("register.php",
                {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json; charset=utf-8",
                    },
                    body: JSON.stringify(upload)
                })
            .then(response => {
                if (response.ok) {
                    close();
                } else {
                    elem.classList.add("hidden");
                    errorPopup.classList.remove("hidden");
                }
                });
        }
    });

    function validation(input) {
        let isValid = true;
        const name = input[0].value;
        if (!(typeof(name) === 'string' && name.match(/^[a-zа-яё]+$/i))) {
            addClass(input[0]);
            isValid = false;
        }

        const email = input[1].value;
        if (!(email.match(/^[^\s@]+@[^\s@]+\.(com|ru)\b/))) {
            addClass(input[1]);
            isValid = false;
        }

        return isValid;
    }

    function addClass(element) {
        element.classList.add("form__another-border");
        element.addEventListener("click", () => {
            for (const i of element.classList) {
                if (i === "form__another-border") {
                    element.classList.remove("form__another-border");
                }
            }
        });
    }
});