

//Máscara do campo CPF (criar.php)
("#cpf").mask("000.000.000-00");



//Limitando a quantidade de caracteres cpf
var cpf = document.querySelector("#cpf");

cpf.addEventListener("blur", function () {
    if (cpf.value) cpf.value = cpf.value.match(/.{1,3}/g).join(".").replace(/\.(?=[^.]*$)/, "-");
});

function btdelete(){
    var xmlhttp = new XMLHttpRequest(); //faz a conexão do navegador com o servidor web
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status ==200){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })

              swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '<a chref="excluir.php?<?php echo "id=$row["id"]"?>>Deletar</a>',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                  )
                }
              })

        }
    };
    xmlhttp.open("GET", "excluir.php", true);
    xmlhttp.send();
}