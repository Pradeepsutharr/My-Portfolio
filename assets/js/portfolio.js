const span = document.querySelector(".typing_txt span");
const textArr = span.getAttribute("data-text").split(", ");
const maxTextIndex = textArr.length;
const sPerChar = 0.15;
const sBetweenWord = 1.5;
let textIndex = 0;

typing(textIndex, textArr[textIndex]);

function typing(textIndex, text) {
  let charIndex = 0;
  const typeInterval = setInterval(() => {
    span.innerHTML += text[charIndex];
    if (charIndex++ === text.length - 1) {
      clearInterval(typeInterval);
      setTimeout(() => deleting(textIndex, text), sBetweenWord * 700);
    }
  }, sPerChar * 300);
}

function deleting(textIndex, text) {
  let charIndex = text.length - 1;
  const typeInterval = setInterval(() => {
    span.innerHTML = text.substring(0, charIndex--);
    if (charIndex < 0) {
      clearInterval(typeInterval);
      textIndex = (textIndex + 1) % maxTextIndex;
      setTimeout(
        () => typing(textIndex, textArr[textIndex]),
        sBetweenWord * 300
      );
    }
  }, sPerChar * 300);
}

// scroll active animation

let sections = document.querySelectorAll("section");
let links = document.querySelectorAll("header ul li a");

window.onscroll = () => {
  sections.forEach((sec) => {
    let top = window.scrollY;
    let offset = sec.offsetTop - 150;
    let height = sec.offsetHeight;
    let id = sec.getAttribute("id");

    if (top >= offset && top < offset + height) {
      links.forEach((link) => {
        link.classList.remove("active");
        document
          .querySelector("header ul li a[href*=" + id + "]")
          .classList.add("active");
      });
    }
  });
};

// -------hamburger----------

const bar = document.querySelector(".menu");
const navbar = document.querySelector("nav");
const navbarli = document.querySelectorAll("nav li");

bar.addEventListener("click", () => {
  bar.classList.toggle("active");
  navbar.classList.toggle("active");
});

let btn = document.querySelector(".menu");
let icon = btn.querySelector(".fa-bars");
btn.onclick = function () {
  if (icon.classList.contains("fa-bars")) {
    icon.classList.replace("fa-bars", "fa-times");
  } else {
    icon.classList.replace("fa-times", "fa-bars");
  }
};

window.addEventListener("scroll", function () {
  // console.log("test");
  let TopScrolled = window.pageYOffset || document.documentElement.scrollTop;
  // console.log(TopScrolled);
  if (TopScrolled > 1) {
    document.querySelector("nav").classList.remove("active");
    icon.classList.replace("fa-times", "fa-bars");
  } else {
    // document.getElementById("main-header").classList.add("fixedmenu");
  }
});

// -----------hamburger-End--------
