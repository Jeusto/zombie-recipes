addBtn = document.getElementById("addBtn");
deleteBtn = document.getElementById("deleteBtn");
ingrediantsDiv = document.getElementById("formIngrediants");

// On cree un input ingrediant en cliquant sur un bouton
addBtn.addEventListener("click", function () {
  const div = document.createElement("div");
  var numberOfIngrediants = getCount(ingrediantsDiv, false);
  if (numberOfIngrediants >= 15) {
    alert("Too many ingrediants, 15 max :)");
    return;
  }
  div.className = "form__ingrediant";
  div.innerHTML =
    `
    <input
      class="form__ingrediant-name"
      type="text"
      name="ingrediantName` +
    (numberOfIngrediants + 1) +
    `"
      placeholder=""
      maxlength="40"
    />
    <input
      class="form__ingrediant-quantity"
      type="text"
      name="ingrediantQuantity` +
    (numberOfIngrediants + 1) +
    `"
      placeholder=""
      maxlength="25"
    /> 
  `;
  ingrediantsDiv.appendChild(div);
});

// On supprime un input ingrediant en cliquant sur un bouton
deleteBtn.addEventListener("click", function () {
  if (getCount(ingrediantsDiv, false) > 1) {
    ingrediantsDiv.removeChild(ingrediantsDiv.lastChild);
  } else {
    return;
  }
});

// Fonction pour lire le nombre d'inputs 'ingrediant'
function getCount(parent, getChildrensChildren) {
  var relevantChildren = 0;
  var children = parent.childNodes.length;
  for (var i = 0; i < children; i++) {
    if (parent.childNodes[i].nodeType != 3) {
      if (getChildrensChildren) relevantChildren += getCount(parent.childNodes[i], true);
      relevantChildren++;
    }
  }
  return relevantChildren;
}
