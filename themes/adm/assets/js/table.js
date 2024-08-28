var nomeprod = document.querySelector('.nomeprod');
var error = document.querySelector('.error');
var precoprod = document.querySelector('.precoprod');
var quantidade = document.querySelector('.quantidade');
var imagemprod = document.querySelector('.imagemprod');
var produtocadastro = document.querySelector('.produtobutton');
var conteiner = document.querySelector('.container'); // Container do html das roupas 
var carrinhoDiv = document.getElementById("carrinho");
var tabeladiv = document.querySelector('.tabelaprodutos')
var remove = document.querySelector('.removeitens')


  let form = document.querySelector(".form-insert");
  let tabela = document.querySelector('.tabela')
  let recarrega = document.querySelector('.carregas')
  let mns = document.querySelector('.mensagem');
  let mensgid = document.querySelector('.mensag');
  let inputId = document.querySelector('#inputId');

  tabeladiv.addEventListener('submit', async(e)=>{
    e.preventDefault();
    
    const data = await fetch('Service.php', {
      method: 'POST',
      body: new FormData(form)
    }).then(res => res.json());                   
    console.log(data);
  
    if(data.status == "sucesso"){
      mns.innerHTML = data.message
    }
  });
  

  
  
  recarrega.addEventListener('click', async () => {
    let produtos = await fetch('Services.php').then(res => res.json());
    console.log(produtos);
  
    tabela.innerHTML = ''; // Limpa a tabela antes de adicionar os novos elementos
  
    produtos.forEach(p => {
      let tr = document.createElement('tr');
      tr.innerHTML = `
          <td class="tabelanome">NOME:          ${p.nome_prod}</td>
          <td class="tabelapreco">PREÇO:         ${p.preco_prod}</td>
          <td class="tabelaid">ID:            ${p.id_prod}</td>
      `;
      console.log(tr);
  
      tabela.appendChild(tr);
    });
  });
  

  // DELETA PRODUTOS 

  
  document.getElementById('remove').addEventListener('click', async () => {
    // Obter o valor do input
    let productId = document.getElementById('inputId').value;

    // Enviar o ID para o PHP via GET
    let data = await fetch(`deleta-produtos.php?id=${productId}`).then(res => res.json());
    console.log(data);
    
    if(data.error){
      mensgid.innerHTML = data.error;
    }
    else{
      mensgid.innerHTML = data.success;
      inputId = ''
    }
});



// LOGIN ADM

  let formadm = document.querySelector('#loginForm')
  let mensagem = document.querySelector('.errorrr')

  formadm.addEventListener('submit', async(e)=>{
    e.preventDefault();
    
    const inf = await fetch('adm.php', {
    method: 'POST',
    body: new FormData(formadm)
    }).then(res => res.json());                   
    console.log(inf);
  
    if(inf.error == "error"){
      mensagem.innerHTML = inf.mensagem
    }
    else {
    // Credenciais corretas, ocultar a div e remover o blur
    document.getElementById('loginOverlay').classList.add('credenciais-corretas');
}
  
    });