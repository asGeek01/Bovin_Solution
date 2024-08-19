var formulaire = document.querySelector(".formulaire");

formulaire.onsubmit=(e)=>{
    e.preventDefault();
    console.log(formulaire.montant.value);
    openKkiapayWidget({amount:formulaire.montant.value, position: "right", callback: "/success", 
    data: "Test de paiement",
    theme: "#092374",
    sandbox: "true",
    key: "ea194080f5a011ee9f805f907fefa779"
    })
}