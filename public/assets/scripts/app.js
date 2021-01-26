const voteDivs = document.querySelectorAll("div.votes");

voteDivs.forEach((voteDiv) => {
  const smileButton = voteDiv.querySelector("button.smile");
  const id = smileButton.dataset.id;
  const numberOfSmiles = voteDiv.querySelector("span.smiles");

  smileButton.addEventListener("click", () => {
    const form = new FormData();
    form.append("post_id", id);
    fetch("/public/back/posts/smiles.php", {
      method: "post",
      body: form,
    })
      .then((response) => response.json())
      .then((smiles) => {
        numberOfSmiles.textContent = smiles;
      });
  });
});
