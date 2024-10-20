import {
    getBackendUrl,
    getBackendUrlApi,
    getFirstName,
    showToast
  } from "./../_shared/functions.js";
  import {
    userAuth
  } from "./../_shared/globals.js";
  

  
fetch(getBackendUrlApi("orders/list"), {
     
})
.then((response) => response.json())
.then((orders) => {
  console.log(orders)
    const tabelaCorpo = document.getElementById("tabela-corpo");


    orders.forEach(pedido => {
      
      if (pedido && pedido.id && pedido.total && pedido.quantity && pedido.description && pedido.users_id) { // Verifica se os dados existem
          const row = document.createElement("tr");
          
          row.innerHTML = ` 
              <td>${pedido.id}</td>
              <td>${pedido.total}</td>
              <td>${pedido.quantity}</td>
              <td>${pedido.description}</td>
              <td>${pedido.users_id}</td>
              <td><button class="delete-btn"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button></td>
            
          `;
          tabelaCorpo.appendChild(row);
      } else {
          console.warn("Dados da encomenda incompletos:", product);
      }
  });
  document.querySelectorAll(".delete-btn").forEach((deleteBtn) => {
    deleteBtn.addEventListener("click", async () => {
      const orderId = deleteBtn.parentElement.parentElement.querySelector('td:first-child').textContent;

        try {
            const response = await fetch(getBackendUrlApi(`orders/delete-order/${orderId}`), {
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


const formEditOrder = document.querySelector("#form-edit");

// Manipulando o evento de submissão do formulário de edição
formEditOrder.addEventListener("submit", async (e) => {
    e.preventDefault();

    const orderId = formEditOrder.querySelector('input[name="id"]').value;

    const productData = {
        id: orderId,
        total: formEditOrder.querySelector('input[name="total"]').value,
        quantity: parseFloat(formEditOrder.querySelector('input[name="quantity"]').value),
        description: formEditOrder.querySelector('input[name="description"]').value,
        users_id: formEditOrder.querySelector('input[name="users_id"]').value,
       };  
      console.log(productData)
    try {
        const response = await fetch(getBackendUrlApi(`orders/update-order/${orderId}`), {
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
    } catch (error) {
        console.error("Erro ao atualizar produto:", error);
     
    }

  
});

document.querySelector(".formSearch").addEventListener("submit", async (e) => {
  e.preventDefault();
  
  const orderInput = document.querySelector('input[name="order_id"]');
  const orderId = orderInput.value.trim();

  if (!orderId) {
      document.querySelector(".message-product").innerText = "Por favor, insira um ID válido.";
      return;
  }

  try {
      const response = await fetch(getBackendUrlApi(`orders/list/${orderId}`));
      const product = await response.json();

      if (product && product.length > 0) {
          const event = product[0];  // Assumindo que o backend retorna um array
          document.querySelector("tbody").innerHTML = `
              <tr>
                  <td>${event.id}</td>
                  <td><input type="number" value="${event.total}" disabled></td>
                  <td><input type="number" value="${event.quantity}" disabled></td>
                  <td><input type="text" value="${event.description}" disabled></td>
                  <td><input type="text" value="${event.users_id}" disabled></td>
                  <td><button class="delete-btn"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button></td>
              </tr>`;
      } else {
          document.querySelector(".message-product").innerText = `Produto com ID ${orderId} não encontrado.`;
      }
  } catch (error) {
      console.error("Erro ao buscar produto:", error);
      document.querySelector(".message-product").innerText = "Erro ao buscar produto. Verifique o console.";
  }
});

  
  async function listarTodasCategorias() {
    const tabelaCorpo = document.getElementById("tabela-corpo");
    tabelaCorpo.innerHTML = ''; // Limpa a tabela antes de preencher
  
    try {
        const response = await fetch(getBackendUrlApi("orders/list"));
        const orders = await response.json();
  
        orders.forEach(order => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${order.id}</td>
                <td>${order.total}</td>
                <td>${order.quantity}</td>
                <td>${order.description}</td>
                <td>${order.users_id}</td>
                <td><button class="delete-btn"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button></td>
            `;
            tabelaCorpo.appendChild(row);
        });
    } catch (error) {
        console.error("Erro ao listar categorias:", error);
    }
  }


  document.querySelector('input[name="order_id"]').addEventListener('input', (e) => {
    const tabelaCorpo = document.getElementById("tabela-corpo");
    if (e.target.value === '') {
        tabelaCorpo.innerHTML = ''; 
        listarTodasCategorias(); 
    }
});