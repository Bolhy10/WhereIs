/**
 * Created by terminator10 on 2/11/15.
 */

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
    // Mostramos y ocultamos submenus
    $('.submenu').click(function(){
        $(this).children('.children').slideToggle();
    });
}
/*Funciones para validar usuarios y email*/
function Validador(email){
    var tester = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-]+)\.)+([a-zA-Z0-9]{2,4})+$/;
    return tester.test(email);
}
function caracter(username){
    var caract = /^([a-zA-Z0-9_-])/;
    return caract.test(username)
}
function pass(password){
    var pass = /(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){7,20}.+$)/;
    return pass.test(password)
}

$(document).ready(function(){
    main();
    /*Verificacion de usurios   $(document).ready(main);*/
    /*Validacion el password*/
   document.getElementById('password').addEventListener('blur',function(){
        var password = document.getElementById('password').value;
        if(pass(password) == false){
            $('.password-validate').css({
                'color': '#fff'
            });
            $('.validate-pass').html('<i class="icon-warning"></i>').show();
            $('.validate-pass').css({
                'color': '#b20000'
            });
            return false;
        }else{
            $('.password-validate').css({
                'color': '#8c8c8c'
            });
            $('.validate-pass').html('<i class="icon-checkmark"></i>').show();
            $('.validate-pass').css({
                'color': 'rgba(72, 130, 255, 1)'
            });
        }
    });
    document.getElementById('username').addEventListener('blur',function(){
        var username = document.getElementById('username').value;
        if (username.length > 0) {
            if (caracter(username) == false) {
                $('.loader').html("<i class='icon-user'></i> Nombre de usuario no es válido o ya adoptadas.").show().delay(2000).hide(200);
                $('.validate-user').css({
                    'color': '#b20000'
                });
                $('.validate-user').html('<i class="icon-warning"></i>').show();
                return false;
            }else {
                $('.loader').html('').hide();
                $.ajax({
                    type:'POST',
                    url:'server/app_server_whereis.php',
                    data:{username:username, wis:'verify_user'},
                    success: function (data) {
                        if (data == 0) {
                            $('.validate-user').css({
                                'color': '#b20000'
                            });
                            $('.validate-user').html('<i class="icon-warning"></i>').show();
                            $('.loader').html("<i class='icon-user'></i> Nombre de usuario no es válido o ya adoptadas.").show().delay(2000).hide(200);
                        } else if (data == 1) {
                            $('.validate-user').css({
                                'color': 'rgba(72, 130, 255, 1)'
                            });
                            $('.validate-user').html('<i class="icon-checkmark"></i>').show();
                        }
                    }
                });
            }
        }
    });
    document.getElementById('email').addEventListener('blur',function(){
        var email = document.getElementById('email').value;
        if (email.length > 0) {
            if (Validador(email) == false) {
                $('.loader').html("<i class='icon-mail2'></i> Correo electronico no es válido o ya adoptadas.").show().delay(2000).hide(200);
                $('.validate-email').css({
                    'color': '#b20000'
                });
                $('.validate-email').html('<i class="icon-warning"></i>').show();
                return false;
            } else {
                $('.loader').html('').hide();
                $.ajax({
                    type: 'POST',
                    url: 'server/app_server_whereis.php',
                    data: {email: email, wis: 'verify_email'},
                    success: function (data) {

                        if (data == 0) {
                            $('.validate-email').css({
                                'color': '#b20000'
                            });
                            $('.validate-email').html('<i class="icon-warning"></i>').show();
                            $('.loader').html("<i class='icon-mail2'></i> Correo electronico no es válido o ya adoptadas.").show().delay(2000).hide(200);
                        }else if (data == 1) {
                            $('.validate-email').css({
                                'color': 'rgba(72, 130, 255, 1)'
                            });
                            $('.validate-email').html('<i class="icon-checkmark"></i>').show();
                        }
                    }
                });

            }
        }
    });
});

function login_data_user(){
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var len = username.length * email.length * password.length;
    if(len == "" && Validador(email) == false && caracter(username) == false && pass(password) == false){
        $('.loader').html('<i class="icon-warning"></i> Ohh! Datos introducidos incorrectos o campos estan vacios.').show().delay(2000).hide(200);
        return false;
    }else {
        $.ajax({
            type: 'POST',
            url: 'server/app_server_whereis.php',
            data: {username: username, email: email, password: password, wis: 'login_whereis'},
            success: function (data) {
                if (data == 1) {
                    $('.register-button').html("Creando su cuenta").show();
                    $('.loader').html('<div class="loader-inner ball-pulse-sync"><div></div><div></div><div></div></div>').show();
                    setTimeout(function () {
                        window.location = "inicio";
                    }, 3000);
                } else if (data == 2) {
                    $('.loader').html('<i class="icon-shocked"></i> Ohh! Hubo problemas para crear tu cuenta o datos ya adoptados. ').show().delay(2000).hide(200);
                } else if (data == 3) {
                    $('.loader').html('<i class="icon-sad"></i> Ohh! Asegurate de que tu usuario y email son correctos.').show().delay(2000).hide(200);
                }
            }
        });
    }
}






