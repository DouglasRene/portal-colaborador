let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");
let btBaseDeDados = document.querySelector(".bx-coin-stack")
let cesta = document.querySelector(".bx-basket")

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  //menuBtnChange();//calling the function(optional)
});

searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
  sidebar.classList.toggle("open");
  //menuBtnChange(); //calling the function(optional)
});

function myFunction(x) {
  if (x.matches) { 
    sidebar.classList.toggle("open");
  }
}

var x = window.matchMedia("(max-width: 500px)")
myFunction(x) // Call listener function at run time




