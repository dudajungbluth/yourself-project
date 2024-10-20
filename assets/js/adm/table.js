import {
  getBackendUrl,
  getBackendUrlApi,
  getFirstName,
  showToast

} from "./../_shared/functions.js";
import {
  userAuth
} from "./../_shared/globals.js";

var nomeprod = document.querySelector('.nomeprod');
var error = document.querySelector('.error');
var precoprod = document.querySelector('.precoprod');
var quantidade = document.querySelector('.quantidade');
var imagemprod = document.querySelector('.imagemprod');
var produtocadastro = document.querySelector('.produtobutton');
var conteiner = document.querySelector('.container'); // Container do html das roupas 
var carrinhoDiv = document.getElementById("carrinho");
var tabeladiv = document.querySelector('.tabelaprodutos');
var remove = document.querySelector('.removeitens');

let form = document.querySelector(".form-insert");
let tabela = document.querySelector('.tabela');
let recarrega = document.querySelector('.carrega');
let mns = document.querySelector('.mensagem');
let mensgid = document.querySelector('.mensag');
let inputId = document.querySelector('#inputId');
const message = document.querySelector(".toast-container")


fetch(getBackendUrlApi("products/product"), {
     
})
.then((response) => response.json())
.then((products) => {
  
    const tabelaCorpo = document.getElementById("tabela-corpo");
     // Verifique o que está sendo retornado

    products.forEach(product => {
      if (product && product.id && product.name && product.price && product.amount && product.url_products && product.description && product.categories_id) { // Verifica se os dados existem
          const row = document.createElement("tr");
          row.innerHTML = ` 
              <td>${product.id}</td>
              <td>${product.name}</td>
              <td>${product.price}</td>
              <td>${product.amount}</td>
              <td>${product.url_products}</td>
              <td>${product.description}</td>
              <td>${product.categories_id}</td>

              <td><button class="delete-btn"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button></td>
            
          `;
          tabelaCorpo.appendChild(row);
      } else {
          console.warn("Dados do produto incompletos:", product);
      }
  });
  document.querySelectorAll(".delete-btn").forEach((deleteBtn) => {
    deleteBtn.addEventListener("click", async () => {
      const productId = deleteBtn.parentElement.parentElement.querySelector('td:first-child').textContent;
  
        try {
            const response = await fetch(getBackendUrlApi(`products/delete-product/${productId}`), {
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
            console.error("Erro ao excluir produto:", error);
        }
    });
  });
})


const formEditProduct = document.querySelector("#form-edit");

// Manipulando o evento de submissão do formulário de edição
formEditProduct.addEventListener("submit", async (e) => {
    e.preventDefault();

    const productId = formEditProduct.querySelector('input[name="id"]').value;

    const productData = {
        id: productId,
        name: formEditProduct.querySelector('input[name="name"]').value,
        price: parseFloat(formEditProduct.querySelector('input[name="price"]').value),
        amount: parseInt(formEditProduct.querySelector('input[name="amount"]').value),
        url_products: formEditProduct.querySelector('input[name="url_products"]').value,
        description: formEditProduct.querySelector('input[name="description"]').value,
        categories_id: formEditProduct.querySelector('input[name="categories_id"]').value,
    };  
console.log(productData)
    try {
        const response = await fetch(getBackendUrlApi(`products/update-product/${productId}`), {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                token: userAuth.token,
            },
            body: JSON.stringify(productData),
        });

        if (!response.ok) {
            throw new Error(`Erro: ${response.statusText}`);
        }

        const data = await response.json();
        if (data.success) {
          showToast(`${data.message}!`);
            atualizarTabelaProdutos(); // Atualiza a tabela para refletir as alterações
        } else {
          showToast(`${data.message}!`);
        }
    } catch (error) {
        console.error("Erro ao atualizar produto:", error);
     
    }

  
});


document.querySelector(".formSearch").addEventListener("submit", (e) => {
    e.preventDefault();
    const productIdInput = document.querySelector('input[name="product_id"]');
    const productId = productIdInput.value;
  
    fetch(getBackendUrlApi(`products/product/${productId}`), {
      method: 'GET'
    }).then((response) => {
      response.json().then((product) => {
        if (product) {
          const event = product[0]; 
          document.querySelector("tbody").innerHTML = ` 
            <tr>
              <td>${event.id}</td>
              <td><input type="text" name="name" value="${event.name}" disabled></td>
              <td><input type="number" name="value" value="${event.price}" disabled></td>
              <td><input type="text" name="description" value="${event.description}" disabled></td>
              <td><input type="number" name="quantity" value="${event.quantity}" disabled></td>
              <td><input type="text" name="url" value="${event.url}" disabled></td>
              <td><input type="number" name="categories_id" value="${event.categories_id}" disabled></td>
              <td><button class="edit-btn"><i class="fa-solid fa-pen" style="color: #ffffff;"></i></button></td>
              <td><button class="delete-btn"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button></td>
            </tr>`;
        } else {
          document.querySelector(".message-product").innerHTML = `Produto com ID ${productId} não encontrado.`;
        }
      });
    });
  });
  
  document.querySelector('input[name="product_id"]').addEventListener('input', (e) => {
    if (e.target.value === '') {
      location.reload();
    }
  });
  




 



