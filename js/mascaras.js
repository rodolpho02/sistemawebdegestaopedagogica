$(document).ready(function () {


     $('#celular2').on('input', function() {
    var telefone = $(this).val();
    if (telefone.length === 13) {
      $(this).mask('(00) 0000-0000');
    } else {
      $(this).mask('(00) 00000-0000');
    }

    
  });




    $('#celular').mask('(00) 00000-0000');
    $('#whatsapp').mask('(00) 00000-0000');
    $('#cpf').mask('000.000.000-00');
    $('#cpfresponsavel').mask('000.000.000-00');
    $('#rg').mask('00.000.000-0');
    $('#telefone').mask('(00) 0000-0000');
    $('#cep').mask('00000-000');
});
