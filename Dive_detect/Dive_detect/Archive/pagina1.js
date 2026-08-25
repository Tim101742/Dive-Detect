const cardBtn = document.getElementById("cardBtn");

if (cardBtn) {
  cardBtn.addEventListener("click", () => {
    cardBtn.classList.add("pulse");
    window.setTimeout(() => cardBtn.classList.remove("pulse"), 160);
  });
}
