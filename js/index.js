
function listaNota(){
  $.ajax({
    url: 'functions/lista_nota.php',
    type: 'POST',
    success: function(data) {
      let notas = JSON.parse(data)
      for(let nota of notas){
        let id           = nota.id
        let num_nota     = nota.num_nota
        let data_nota    = nota.data_nota
        let destinatario = nota.destinatario
        let valor_nota   = nota.valor_nota
        $(`#dados-nota`).append(`<tr>
                                      <td>${id}</td>
                                      <td>${num_nota}</td>
                                      <td>${data_nota}</td>
                                      <td>${destinatario}</td>
                                      <td>${formataValor(valor_nota)}</td>
                                    </tr>`);
      }
    }
  })
}


$(document).ready(function(){
  listaNota()
  $('.dropify').dropify({
    messages: {
         'default': 'Importe seu arquvilo XML',
         'replace': 'Reimpote seu arquivo XML para mudar do atual',
         'remove':  'Remover',
         'error':   'Ooops, Algo errado está acontecendo.'
     }
  });
  $(`#form-xml`).hide();
  $(`#novo-xml`).on(`click`,function(){
    $(`#form-xml`).show()
  })
  $('#form-cadastro-xml').submit(function(event) {
  event.preventDefault();
  var formDados = new FormData($(this)[0]);
    let check = true
    let marca          = $(`#xml`).val();
    if(marca =="") {
      check = false
      swal('', 'É necessário importar o xml ', 'warning');
    }
  if(check == true){
    $.ajax({
      url: 'functions/cadnota.php',
      type: 'POST',
      data: formDados,
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
          let retorno = JSON.parse(data);
          let msg      = retorno.msg
          let success  = retorno.success
          let type
          if(success == '1') type = 'success'
          if(success == '0') type = 'warning'
          swal({
            text: msg,
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            type: type,
            confirmButtonText: 'OK',
          }).then(function(result) {
              $(`#form-cadastro-xml`).trigger(`reset`)
              let drEvent = $('.dropify').dropify();
              drEvent = drEvent.data('dropify');
              drEvent.resetPreview();
              drEvent.clearElement();
              $(`#form-xml`).hide();
              listaNota()

          });


      },
      dataType: 'html'
      });
  }

  })
})
