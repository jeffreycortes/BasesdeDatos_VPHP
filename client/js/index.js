$(function(){
  var l = new Login();
})


class Login {
  constructor() {
    this.submitEvent()
  }

  submitEvent(){
    $('form').submit((event)=>{
      event.preventDefault()
      this.sendForm()
    })

    //Código agregado por Jeffrey Cortés para curso de interacción con bases de datos de next u
    $("#btnCreateUsers").click(()=>{
      $.ajax({
        url: '../server/create_user.php',
        cache: false,
        type: 'POST',
        success: (data) =>{
          $("#TestContent").html(data);
        },
        error: function(){
          alert("error en la comunicación con el servidor");
        }
      })
    });
  }

  sendForm(){
    let form_data = new FormData();
    form_data.append('usr_login', $('#user').val())
    form_data.append('pass', $('#password').val())
    $.ajax({
      url: '../server/check_login.php',
      dataType: "json",
      cache: false,
      processData: false,
      contentType: false,
      data: form_data,
      type: 'POST',
      success: function(php_response){
        if (php_response.msg == "OK") {
          window.location.href = 'main.html';
        }else {
          alert(php_response.msg);
        }
      },
      error: function(){
        alert("error en la comunicación con el servidor");
      }
    })
  }
}
