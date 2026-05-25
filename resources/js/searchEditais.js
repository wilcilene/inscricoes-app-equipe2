console.log("FUNCIONOU");
const input = document.getElementById("buscador");
const cards = document.querySelectorAll(".card");

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
