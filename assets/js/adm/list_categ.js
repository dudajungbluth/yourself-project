import {
    getBackendUrl,
    getBackendUrlApi,
    getFirstName,
    showToast
  
  } from "./../_shared/functions.js";
  import {
    userAuth
  } from "./../_shared/globals.js";



fetch(getBackendUrlApi("categories/list"), {
     
})
.then((response) => response.json())
.then((categories) => {
  
    const tabelaCorpo = document.getElementById("tabela-corpo");


    categories.forEach(categorie => {
      if (categorie && categorie.id && categorie.name ) { 
          const row = document.createElement("tr");
          row.innerHTML = ` 
              <td>${categorie.id}</td>
              <td>${categorie.name}</td>
            
              <td><button class="delete-btn"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button></td>
            
          `;
          tabelaCorpo.appendChild(row);
      } else {
          console.warn("Dados do produto incompletos:", categorie);
      }
  });
  document.querySelectorAll(".delete-btn").forEach((deleteBtn) => {
    deleteBtn.addEventListener("click", async () => {
      const categId = deleteBtn.parentElement.parentElement.querySelector('td:first-child').textContent;
  
        try {
            const response = await fetch(getBackendUrlApi(`categories/delete-category/${categId}`), {
                method: "DELETE",
                headers: {
                    token: userAuth.token,
                },
            });
  
            const data = await response.json();
            if (data.success) {
                showToast(`${data.message}!`);
                atualizarTabelaProdutos();
            } else {
                showToast(`${data.message}!`);
            }
        } catch (error) {
            console.error("Erro ao excluir categoria:", error);
        }
    });
  });
})



const formEditCateg = document.querySelector("#form-edit");

//UPDATE
formEditCateg.addEventListener("submit", async (e) => {
    e.preventDefault();

    const categID = formEditCateg.querySelector('input[name="id"]').value;

    const productData = {
        id: categID,
        name: formEditCateg.querySelector('input[name="name"]').value,
    };  
console.log(productData)
  
        const response = await fetch(getBackendUrlApi(`categories/update-category/${categID}`), {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                token: userAuth.token,
            },
            body: JSON.stringify(productData),
        });

        const data = await response.json();
        if (data.success) {
            showToast(`${data.message}!`);
            atualizarTabelaProdutos(); // Atualiza a tabela para refletir as alterações
        } else {
            showToast(`${data.message}!`);
        }
   

  
});


async function listarTodasCategorias() {
  const tabelaCorpo = document.getElementById("tabela-corpo");
  tabelaCorpo.innerHTML = ''; // Limpa a tabela antes de preencher

  try {
      const response = await fetch(getBackendUrlApi("categories/list"));
      const categories = await response.json();

      categories.forEach(categorie => {
          const row = document.createElement("tr");
          row.innerHTML = `
              <td>${categorie.id}</td>
              <td>${categorie.name}</td>
              <td><button class="delete-btn"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button></td>
          `;
          tabelaCorpo.appendChild(row);
      });
  } catch (error) {
      console.error("Erro ao listar categorias:", error);
  }
}


document.querySelector(".formSearch").addEventListener("submit", async (e) => {
  e.preventDefault();
  const categId = document.querySelector('input[name="id_categ"]').value;

  try {
      const response = await fetch(getBackendUrlApi(`categories/list/${categId}`));
      const categ = await response.json();

      if (categ && categ.length > 0) {
          const event = categ[0];
          document.querySelector("tbody").innerHTML = `
              <tr>
                  <td>${event.id}</td>
                  <td><input type="text" name="name" value="${event.name}" disabled></td>
                  <td><button class="delete-btn"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button></td>
              </tr>`;
      } else {
          document.querySelector(".message-product").innerHTML = `Produto com ID ${categId} não encontrado.`;
      }
  } catch (error) {
      console.error("Erro ao buscar categoria:", error);
  }
});

  
  document.querySelector('input[name="id_categ"]').addEventListener('input', (e) => {
    const tabelaCorpo = document.getElementById("tabela-corpo");
    if (e.target.value === '') {
        tabelaCorpo.innerHTML = ''; // Limpa a tabela
        listarTodasCategorias(); // Recarrega todas as categorias
    }
});
