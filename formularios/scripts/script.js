$('#user').submit(function(e){
//e.preventDefault();

var p_nome = $('#nome').val();

var u_nome = $('#apelido').val();

var u_senha = $('#senha').val();

var u_email = $('#email').val();

var u_sexo = $('#sexo').val();

//Console log

$.ajax({
url: 'http://localhost/KING/formularios/processos.php',
method: 'POST',
data: {nome: p_nome, apelido:u_nome, senha: u_senha, email:u_email, sexo: u_sexo},
dataType:'json'

}).done(function(result){
    console.log(result);
});

});