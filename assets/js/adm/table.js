import {
  getBackendUrl,
  getBackendUrlApi,
  getFirstName,
  showToast
} from "./../_shared/functions.js";

import { userAuth } from "./../_shared/globals.js";

let message = document.querySelector(".message-product");

// Função para listar todos os produtos
fetch(getBackendUrlApi("products/product"))
  .then((response) => response.json())
  .then((products) => {
    products.forEach((event) => {
      document.querySelector("tbody").innerHTML += `
        <tr>
          <td>${event.id}</td>
          <td><input type="text" name="name" value="${event.name}" disabled></td>
          <td><input type="number" name="value" value="${event.price}" disabled></td>
          <td><input type="text" name="description" value="${event.description}" disabled></td>
          <td><input type="number" name="quantity" value="${event.amount}" disabled></td>
          <td><input type="text" name="url" value="${event.url_products}" disabled></td>
          <td><input type="number" name="categories_id" value="${event.categories_id}" disabled></td>
          <td><button class="edit-btn"><i class="fa-solid fa-pen" style="color: #ffffff;"></i></button></td>
          <td><button class="delete-btn"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button></td>
        </tr>`;
    });


    document.querySelectorAll(".edit-btn").forEach((btnEdit) => {
      btnEdit.addEventListener("click", () => {
        const inputs = btnEdit.parentElement.parentElement.querySelectorAll('input');
        const productId = btnEdit.parentElement.parentElement.querySelector('td:first-child').textContent;
        const isDisabled = inputs[0].disabled;

        if (isDisabled) {
          inputs.forEach(input => input.disabled = false);
        } else {
          const update = {
            id: productId,
            name: inputs[0].value,
            price: parseFloat(inputs[1].value),
            description: inputs[2].value,
            amount: parseInt(inputs[3].value),
            url_products: inputs[4].value,
            categories_id: inputs[5].value
          };

          fetch(getBackendUrlApi(`products/update-product/${productId}`), {
            method: 'PUT',
            headers: {
              token: userAuth.token,
              'Content-type': 'application/json'
            },
            body: JSON.stringify(update)
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              inputs.forEach(input => input.disabled = true);
              showToast(`${data.message}!`);
            } else {
              showToast(`${data.message}!`);
            }
          });
        }
      });
    });

    // Adiciona eventos de exclusão aos botões
    document.querySelectorAll(".delete-btn").forEach((deleteBtn) => {
      deleteBtn.addEventListener("click", () => {
        const productId = deleteBtn.parentElement.parentElement.querySelector('td:first-child').textContent;

        fetch(getBackendUrlApi(`products/delete-product/${productId}`), {
          method: 'DELETE',
          headers: { token: userAuth.token }
        })
        .then(response => response.json())
        .then(data => {
          showToast(`${data.message}!`);
        })
        .catch(error => console.error("Erro ao excluir produto:", error));
      });
    });
  });

// Evento de busca por produto pelo ID
document.querySelector(".formSearch").addEventListener("submit", (e) => {
  e.preventDefault();
  const productIdInput = document.querySelector('input[name="product_id"]');
  const productId = productIdInput.value;

  fetch(getBackendUrlApi(`products/product/${productId}`), { method: 'GET' })
    .then((response) => response.json())
    .then((product) => {
      if (product) {
        const event = product[0];
        document.querySelector("tbody").innerHTML = `
          <tr>
            <td>${event.id}</td>
            <td><input type="text" name="name" value="${event.name}" disabled></td>
            <td><input type="number" name="value" value="${event.price}" disabled></td>
            <td><input type="text" name="description" value="${event.description}" disabled></td>
            <td><input type="number" name="quantity" value="${event.amount}" disabled></td>
            <td><input type="text" name="url" value="${event.url_products}" disabled></td>
            <td><input type="number" name="categories_id" value="${event.categories_id}" disabled></td>
            <td><button class="edit-btn"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></button></td>
            <td><button class="delete-btn"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button></td>
          </tr>`;
      } else {
        message.innerHTML = `Produto com ID ${productId} não encontrado.`;
      }
    });
});

// Recarga da página ao limpar a busca
document.querySelector('input[name="product_id"]').addEventListener('input', (e) => {
  if (e.target.value === '') location.reload();
});

// Renderização da estrutura HTML da tabela
document.querySelector(".container-table").innerHTML = `
  <div class="list">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Valor</th>
          <th>Descrição</th>
          <th>Quantidade</th>
          <th>URL</th>
          <th>Categoria</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>`;
