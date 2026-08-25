const squares = Array.from(document.querySelectorAll(".square"));

squares.forEach((square) => {
  square.addEventListener("click", () => {
    square.classList.toggle("active");
  });
});
