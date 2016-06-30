$(document).ready(function(){

    $("#registerform").validate({

       rules:{

            username:{
                required: true,
                minlength: 4,
                maxlength: 16,
            },

            password:{
                required: true,
                minlength: 4,
                maxlength: 16,
            },

            email: {
              required: true,
              email: true,
            },

       },

       messages:{

            username:{
                required: "Это поле обязательно для заполнения",
                minlength: "Логин должен быть минимум 4 символа",
                maxlength: "Максимальное число символов - 16",
            },

            password:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 4 символа",
                maxlength: "Пароль должен быть максимум 16 символов",
            },

            email: {
              required: "Это поле обязательно для заполнения",
              email: "Введите корректный mail",
            },

       }

    });

});
