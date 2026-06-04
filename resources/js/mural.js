const input = document.getElementById("buscador");
const cards = document.querySelectorAll(".edital-card");

//pega o que esta na area de busca e compara com as letras do titulo do card se tiver mantem ativado se nao tiver desativa

input.addEventListener("keyup", function () {
    const valorInput = input.value.toLowerCase();

    cards.forEach(function (card) {
        const nomeCard = card
            .querySelector(".edital")
            .textContent.toLowerCase();

        if (nomeCard.includes(valorInput)) {
            card.style.display = "flex";
        } else {
            card.style.display = "none";
        }
    });
});

//////filtro-click//////

const filtro = document.querySelector(".filtro");
const opcoes = document.querySelector(".containerPesquisa .opcoes");

filtro.addEventListener("click", () => {
    if (opcoes.style.display === "flex") {
        opcoes.style.display = "none";
    } else {
        opcoes.style.display = "flex";
    }
});

//////filtro//////

const alternativas = document.querySelector(
    ".containerPesquisa .opcoes button",
);

const opcao = document.querySelectorAll(".containerPesquisa .opcoes .opcao");
const container = document.querySelector(".mural-cards");

opcao.forEach((botao) => {
    botao.addEventListener("click", () => {
        const cards = Array.from(container.querySelectorAll(".edital-card"));

        cards.sort((a, b) => {
            const dateA = new Date(a.dataset.date);
            const dateB = new Date(b.dataset.date);

            if (botao.dataset.order === "recentes") {
                return dateB - dateA;
            } else {
                return dateA - dateB;
            }
        });

        cards.forEach((card) => container.appendChild(card));
    });
});
