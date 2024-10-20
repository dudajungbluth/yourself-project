
import {
  getBackendUrl,
  getBackendUrlApi,
  getFirstName,
  showToast
} from "./../_shared/functions.js";


const loginForm = document.querySelector("#loginForm");
const errorMessage = document.querySelector(".errorrr");

loginForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  fetch(getBackendUrlApi("users/admin"), {
      method: "POST",
      body: new FormData(loginForm)
  }).then((response) => {
      response.json().then((data) => {
          localStorage.setItem("userAuth", JSON.stringify(data.user));
          
          setTimeout(() => {
              window.location.href = getBackendUrl("admin/inicio");
          }, 3000);
      })
  })
});