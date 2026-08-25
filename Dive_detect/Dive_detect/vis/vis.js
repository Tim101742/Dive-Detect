let backgrounds = [
    "url('images/level1.jpg')",
    "url('images/level2.jpg')",
    "url('images/level3.jpg')"
];

let arrowUp = document.getElementById("arrowUp");
let arrowDown = document.getElementById("arrowDown");
arrowUp.style.display = "none";

let container = document.getElementById("container");

let currentSet = 0;
let items = itemSets[currentSet];

function updateArrows() {
    arrowUp.style.display = currentSet === 0 ? "none" : "inline";
    arrowDown.style.display = currentSet === itemSets.length - 1 ? "none" : "inline";
}

function cubeClick(naam, element) {
    fetch("vis_verwerk.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `naam=${naam}`
    })
        .then(res => res.text())
        .then(data => console.log(data));

    showCatch(naam);
    element.remove();
}

function showCatch(naam) {
    let popup = document.createElement("div");
    popup.classList.add("catch-popup");
    popup.textContent = `Je hebt een ${naam} gevangen`;

    document.body.appendChild(popup);

    setTimeout(() => {
        popup.classList.add("show");
    }, 10);

    setTimeout(() => {
        popup.classList.remove("show");
        setTimeout(() => popup.remove(), 300);
    }, 2000);
}

function loadSet(index) {
    currentSet = index;
    items = itemSets[currentSet];

    updateArrows();
    document.body.style.backgroundImage = backgrounds[currentSet];
    document.body.style.backgroundSize = "cover";
    document.body.style.backgroundPosition = "center";
    container.innerHTML = "";

    items.sort(() => Math.random() - 0.5);

    items.forEach((item, i) => {
        let delay = Math.random() * 10000 + i * 50000;

        setTimeout(() => {
            spawnCube(item);
        }, delay);
    });
}

function spawnCube(item) {
    let cube = document.createElement("img");
    cube.src = item.img;
    cube.classList.add("cube");

    cube.onerror = () => {
        console.log("Image failed:", item.img);
    };

    let headerHeight = document.querySelector(".header").offsetHeight;
    let cubeSize = 100;

    let maxX = window.innerWidth - cubeSize;
    let maxY = window.innerHeight - cubeSize - headerHeight;

    let randomX = Math.random() * maxX;
    let randomY = Math.random() * maxY + headerHeight;

    cube.style.transition = "none";
    cube.style.transform = `translate(${randomX}px, ${randomY}px)`;

    cube.addEventListener("pointerdown", (e) => {
        e.preventDefault();
        cubeClick(item.naam, cube);
    });

    container.appendChild(cube);

    cube.offsetHeight;
    cube.style.transition = "transform 2.5s linear";

    moveContinuously(cube);
}

function moveContinuously(cube) {
    let maxX = window.innerWidth - 60;
    let maxY = window.innerHeight - 60;

    function move() {
        let randomX = Math.random() * maxX;
        let randomY = Math.random() * maxY;

        cube.style.transform = `translate(${randomX}px, ${randomY}px)`;
    }

    move();
    cube.addEventListener("transitionend", move);
}

document.getElementById("arrowUp").onclick = (e) => {
    e.preventDefault();

    let newIndex = currentSet - 1;
    if (newIndex < 0) newIndex = itemSets.length - 1;

    loadSet(newIndex);
};

document.getElementById("arrowDown").onclick = (e) => {
    e.preventDefault();

    let newIndex = currentSet + 1;
    if (newIndex >= itemSets.length) newIndex = 0;

    loadSet(newIndex);
};

loadSet(0);