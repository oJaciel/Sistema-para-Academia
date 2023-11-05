//Máscara do campo Telefone (criar.php)
    $("#telefone").mask("(00) 0 0000-0000");

//Máscara do campo CPF (criar.php)
    $("#cpf").mask("000.000.000-00");



//Limitando a quantidade de caracteres cpf
var cpf = document.querySelector("#cpf");

cpf.addEventListener("blur", function() {
    if (cpf.value) cpf.value = cpf.value.match(/.{1,3}/g).join(".").replace(/\.(?=[^.]*$)/, "-");
});