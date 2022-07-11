document.getElementById('formulario').addEventListener('submit', function(e) {
    
    e.preventDefault();

    let formulario = new FormData(document.getElementById('formulario'));

    fetch('registrar.php', {
        method: 'POST',
        body: formulario
    })
    .then(res => res.json())
    .then(data => {
        if(data == 'true') {
            document.getElementById('int_rut').value = '';
            document.getElementById('txt_dv').value = '';
            document.getElementById('txt_nombre').value = '';
            document.getElementById('txt_nombre2').value = '';
            document.getElementById('txt_apellido').value = '';
            document.getElementById('txt_apellido2').value = '';
            alert('El usuario se insertó correctamente.');
        } else {
            console.log(data);
        }
    });

});