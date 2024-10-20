

const formRegister = document.querySelector("#formRegister");
formRegister.addEventListener("submit",async (event) => {

    event.preventDefault();
    const data = await fetch(`http://localhost/yourself-project/api/users`,{
        method: "POST",
        body: new FormData(formRegister)
    });

    const user = await data.json();
    console.log(user);
});
