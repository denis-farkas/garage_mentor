window.onload = () => {
  const form = document.querySelector("form");
  document.querySelectorAll("form input").forEach((input) => {
    input.addEventListener("change", () => {
      const Form = new FormData(form);

      const Params = new URLSearchParams();

      Form.forEach((value, key) => {
        Params.append(key, value);
      });

      const Url = new URL(window.location.href);

      fetch(Url.pathname + "?" + Params.toString() + "&ajax=1", {
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      })
        .then((response) => response.json())
        .then((data) => {
          // On va chercher la zone de contenu
          const content = document.querySelector("#content");

          // On remplace le contenu
          content.innerHTML = data.content;

          // On met à jour l'url
          history.pushState({}, null, Url.pathname + "?" + Params.toString());
        })
        .catch((e) => alert(e));
    });
  });
};
