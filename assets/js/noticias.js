// highlight filtro taxonomia

document.querySelectorAll(".noticias_taxonomias button").forEach((item) => {
  item.classList.remove("noticias_taxonomias__selecionada");
});

document.querySelector(".noticias_taxonomias a").classList.remove("noticias_taxonomias__selecionada");

const hiddenInfo = document.querySelector(".noticias_taxonomias__atual").innerHTML;

const currentId = "#" + hiddenInfo;

if (hiddenInfo) {
  document.querySelector(currentId).classList.add("noticias_taxonomias__selecionada");
} else {
  document.querySelector("#todas").classList.add("noticias_taxonomias__selecionada");
}
