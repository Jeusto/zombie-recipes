// Fonction pour faire une requete ajax pour la recherche de recettes
function showResults() {
  event.preventDefault();
  search = document.getElementById("searchInput").value;
  document.getElementById("searchInput").value = "";
  console.log(search);

  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("recipeList").innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "backend/recipeSearch.php?search=" + search, true);
  xhttp.send(search);
}
