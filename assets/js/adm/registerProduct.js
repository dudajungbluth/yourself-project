
import {
    getBackendUrl,
    getBackendUrlApi,
    getFirstName,
    showToast
} from "./../_shared/functions.js";
import {
  userAuth
} from "./../_shared/globals.js";

const formInsertProduct = document.querySelector("#form-insert");

formInsertProduct.addEventListener("submit", async (e) => {
    e.preventDefault();

  
        const response = await fetch(getBackendUrlApi("products/insert-products"), {
            method: "POST",
            body: new FormData(formInsertProduct),
            headers: {
                token: userAuth.token,
            },
        });

        if (!response.ok) {
            throw new Error(`Erro: ${response.statusText}`);
        }

        const data = await response.json(); // Conversão correta do JSON

        
           
        
        if (data.success) {
                showToast(`${data.message}!`);
                return;
              } else {
                showToast(`${data.message}!`);
              }
            
});


// INSERIR CATEGORIA 


const formInsertCategories = document.querySelector("#form-insert-cate");

formInsertCategories.addEventListener("submit", async (e) => {
    e.preventDefault();

    
        const response = await fetch(getBackendUrlApi("categories/insert-category"), {
            method: "POST",
            body: new FormData(formInsertCategories),
            headers: {
                token: userAuth.token,
            },
        });

        if (!response.ok) {
            throw new Error(`Erro: ${response.statusText}`);
        }

        const data = await response.json(); // Converte a resposta para JSON

        if (data.success) {
            showToast(`${data.message}!`);
            return;
          } else {
            showToast(`${data.message}!`);
          }
});

    





// INSERIR ENCOMENDA 

const formInsertOrder = document.querySelector("#form-insert-order")

formInsertOrder.addEventListener("submit", async (e) => {
    e.preventDefault();

    fetch(getBackendUrlApi("orders/insert"), {
        method: "POST",
        body: new FormData(formInsertOrder),
        headers: {
            token: userAuth.token
        }
    }).then((response) => {
        response.json().then((data) => {
            if (data.success) {
                showToast(`${data.message}!`);
                return;
              } else {
                showToast(`${data.message}!`);
              }
        });
    });

});

    




