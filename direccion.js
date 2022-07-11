document.getElementById('formulario').addEventListener('submit', function(e) {
    
    e.preventDefault();

    let formulario = new FormData(document.getElementById('formulario'));

    fetch('direccion.php', {
        method: 'POST',
        body: formulario
    })
    .then(res => res.json())
    .then(data => {
        if(data == 'true') {
            document.getElementById('txt_comuna').value = '';
            document.getElementById('txt_direccion').value = '';
            document.getElementById('txt_numerocalle').value = '';
            alert('El usuario se insertó correctamente.');

        } else {
            console.log(data);
        }
    });

});