

const formInsertProduct = document.querySelector("#form-insert")

formInsertProduct.addEventListener("submit", async (e) => {
    e.preventDefault();

    const data = await fetch(`http://localhost/yourself-project/api/products/insert-products`, {
        method: "POST",
        body: new FormData(formInsertProduct)

    });

    const product = await data.json();
    console.log(product);

});
    
  
//     // DELETA PRODUTOS 
  
    
//     document.getElementById('remove').addEventListener('click', async () => {
//       // Obter o valor do input
//       let productId = document.getElementById('inputId').value;
  
//       // Enviar o ID para o PHP via GET
//       let data = await fetch(`deleta-produtos.php?id=${productId}`).then(res => res.json());
//       console.log(data);
      
//       if(data.error){
//         mensgid.innerHTML = data.error;
//       }
//       else{
//         mensgid.innerHTML = data.success;
//         inputId = ''
//       }
//   });
  
  
  
//   // LOGIN ADM
  
//     let formadm = document.querySelector('#loginForm')
//     let mensagem = document.querySelector('.errorrr')
  
//     formadm.addEventListener('submit', async(e)=>{
//       e.preventDefault();
      
//       const inf = await fetch('adm.php', {
//       method: 'POST',
//       body: new FormData(formadm)
//       }).then(res => res.json());                   
//       console.log(inf);
    
//       if(inf.error == "error"){
//         mensagem.innerHTML = inf.mensagem
//       }
//       else {
//       // Credenciais corretas, ocultar a div e remover o blur
//       document.getElementById('loginOverlay').classList.add('credenciais-corretas');
//   }
    
//       });