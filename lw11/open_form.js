window.addEventListener('DOMContentLoaded', () => {
    const field = document.getElementById("data");
    const target = document.getElementById("btn");
    const url = "/open_form.php";

    target.addEventListener("click", getSurvey);

    async function getSurvey() {
        const response = await fetch(url);
        if (response.ok) {
            let json = await response.json();
            if (Object.keys(json).length === 0) {
                const notFound = document.createElement('p');
                notFound.innerHTML = 'Нет данных';
                notFound.classList.add('text')
                field.appendChild(notFound);
            }
            for (let i = 0; i < Object.keys(json).length; i++) {

                const div = document.createElement('div');
                field.appendChild(div);
                div.classList.add('survey');

                const img = document.createElement('img');
                img.src  = '/images/Group3.svg'
                div.appendChild(img)
                img.classList.add('survey__image');

                const name = document.createElement('p');
                name.innerHTML = json[i]["name"];
                name.classList.add('survey__text')
                div.appendChild(name);

                const email = document.createElement('p');
                email.innerHTML = json[i]["email"];
                email.classList.add('survey__text')
                div.appendChild(email);

                const activity = document.createElement('p');
                activity.innerHTML = json[i]["activity"];
                activity.classList.add('survey__text')
                div.appendChild(activity);

                const agreement = document.createElement('p');
                agreement.innerHTML = json[i]["agreement"];
                agreement.classList.add('survey__text')
                div.appendChild(agreement);
            }
        }
        target.removeEventListener("click", getSurvey);
    }
});