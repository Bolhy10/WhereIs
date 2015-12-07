/**
 * Created by terminator10 on 7/11/15.
 */
function pass(password){
    var pass = /(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){7,20}.+$)/;
    return pass.test(password)
}
function  addDivs (n) {
    var arr = [];
    for (i = 1; i <= n; i++) {
        arr.push('<div class="error"></div>');
    }
    return arr;
}
//Create variables Global
var contador = 1;
//End Variables Global
function main () {
    $('.menu_bar').click(function(){
        if (contador == 1) {
            $('nav').animate({
                left: '0'
            });
            $('.menu_bar span').css({
                'background':'rgb(248,248,248)',
            });
            contador = 0;
        } else {
            $('.menu_bar span').css({
                'background':'#fff'
            });
            contador = 1;
            $('nav').animate({
                left: '-100%'
            });

        }
    });
}
$(document).ready(function () {
    main();
    $('#login-button').click(function () {
        var user = document.getElementById('username-email').value;
        var password = document.getElementById('username-password').value;
        var lon = user.length * password.length;
        if($('.error').html() == null){
            $('.login-whereis').before(addDivs(1));
        }else{
            $('.error').show().delay(2000).hide(200);
        }
        if(lon == ""){
            $('.error').html('<div class="alert alert-warning" role="alert"><strong>Advertencia!</strong> Nombre de usuario o contrase&ntilde;a incorrecta o estan vacios.</div>').show().delay(2000).hide(200);
        }else{
            $.ajax({
                type:'POST',
                url:'server/app_server_whereis.php',
                data:{
                    user:user,
                    password:password,
                    wis:'whereis-in'
                },
                success: function (login) {
                    if(login == 'log'){
                        $('#login-button').html('<b>Ingresando</b>')
                        $('.loader').html('<div class="loader-inner ball-pulse"><div></div><div></div><div></div></div>');
                        setTimeout(function () {
                           window.location = "inicio";
                        },2000);
                    }else if(login == 'no-log'){
                        $('.error').html('<div class="alert alert-danger" role="alert"><strong>Alerta!</strong> Nombre de usuario o contrase&ntilde;a incorrecta, Por favor varifique sus datos.</div>').show().delay(2000).hide(200);
                    }
                }
            })
        }
    });
    $('.perfil-user').click(function () {
        if( $('.children').is(":visible") ){
            $('.tou').css({
                'background':'rgba(72, 130, 255, 0.9)'
            });
            $('.children').hide();
        }else{
            $('.tou').css({
                'background':'rgb(248,248,248)'
            });
            $('.children').show();
        }
    });

    $('.info-button').click(function () {
        var formData = new FormData($('#account-username')[0]);
        var ruta = 'server/account_server.php';
        var img = $('#images-user').attr('src');
        $.ajax({
            type:'POST',
            url:ruta,
            data: formData,
            contentType: false,
            processData:false,
            success: function (data) {
                if( $(window).scrollTop(0)){
                    $('.alerta-user').html(data).show().delay(2000).hide(200);
                }
                setTimeout(function () {
                    location.reload();
                },1000)

            }

        });
    });

    $('#file_photo').on('change', function () {
        $('#img-user').html(' ');
        var archivos = document.getElementById('file_photo').files;
        var navegador = window.URL || window.webkitURL;
        for(var x=0; x<archivos.length;x++){

            var size  = archivos[x].size;
            var type = archivos[x].type;
            var name = archivos[x].name;
            var width = archivos[x].width;
            var height = archivos[x].height;

            if(size > 1024*1024){
                $('.llo').append("El archivo "+name+" supera el maximo permitido");
            }else if(type != 'image/jpg' && type != 'image/png' && type != 'image/jpeg'){
                $('.llo').append("El archivo "+name+" no es tipo de imagen permitida.");
            }else if(width > 1000 || height > 1000){
                $(archivos[x]).hide();
            }else{
                var objeto_url = navegador.createObjectURL(archivos[x]);
                $("#img-user").html("<img src="+objeto_url+" width='100%' height='250px' />");
            }
        }
    });

    $('#password-button').click(function () {
        var password = document.getElementById('password').value;
        if(pass(password) == false){
           $('.alerta-user').html("<p class='text-danger'><i class='icon-warning'></i> Utilice al menos una letra mayuscula, numero y siete caracteres.</p>").show().delay(2000).hide(200);
            return false;
        }else{
            $.ajax({
                type:'POST',
                url:'server/app_server_whereis.php',
                data:{
                    change_pass:password,
                    wis:'change-password'
                },
                success: function (data) {
                    $('.alerta-user').html(data).show().delay(3000).hide(300);
                    document.getElementById('password').value="";
                }
            }); //fin del ajax
        }
    });
    $('.places-select').change(function () {
        var places = $(this).val();
        $.ajax({
            type:'POST',
            url:'server/app_server_whereis.php',
            data:{places:places,wis:'change_places'},
            success: function (places) {
                $('.tradeimg').html(places);
            }
        });
    });

    $('#delete-button').click(function () {
       if(confirm("Seguro que quieres borrar permanentemente su cuenta. Esta accion no se puede deshacer")){
           $.ajax({
              type:'POST',
               url:'server/app_server_whereis.php',
               data:{wis:'delete-user'},
               success: function (del) {
                   if(del == 1){
                     location.reload();
                   }else{
                       alert("No se ha podido borrar su cuenta. Intentenlo Nuevamente.");
                   }
               }
           });
       }
    });
    $('.sexo').click(function () {
        var p=document.getElementsByName("sexo");
        // Recorremos todos los valores del radio button para encontrar el
        // seleccionado
        for(var i=0;i<p.length;i++)
        {
            if(p[i].checked)
                var sexo=p[i].value;
        }
        $.ajax({
           type:'POST',
            url:'server/app_server_whereis.php',
            data:{sexo:sexo,wis:'sexo'},
            success: function (sexo){
            }
        });
    });
});

function search_local(){
    var local = document.getElementById('search').value; 
    $.ajax({
       type:'POST',
        url:'server/app_server_whereis.php', 
        data:{
            local:local,
            wis:'search'
        },
        success: function (data) {
                $('.panel-trade').html('<div class="loader"><h2>Buscando<div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div></h2>');
                setTimeout(function () {
                    $('.panel-trade').html(data);
                }, 1000);
        }
    });
}

function people(){
    var people = document.getElementById('people').value;

    if(people.length == ""){
        $('.people-panel').hide();
    }else {
        $.ajax({
            type: 'POST',
            url: 'server/app_server_whereis.php',
            data: {
                people: people,
                wis: 'people'
            },
            success: function (data) {
                $('.people-panel').html(data).show();
            }
        });
    }
}