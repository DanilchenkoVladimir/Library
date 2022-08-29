<div class="sign-in">
      <header class="sign-in__header">



    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) { 
            if (document.querySelector(".alert")) {
                document.querySelector(".alert").style.display = 'none';
            }

            document.querySelector('.first-step-registration__mobile-notification').addEventListener("click", (e) => {
                let moreText = document.querySelector(".first-step-registration__mobile-notification-more-text");
                if (moreText.style.display == 'none') {
                    moreText.style.display = 'block';
                    document.querySelector(".first-step-registration__right-arrow").style.transform = 'rotate(90deg)';
                } else {
                    moreText.style.display = 'none';
                    document.querySelector(".first-step-registration__right-arrow").style.transform = 'rotate(0deg)';
                }
            });

            function triggerEvent(el, type){
               if ('createEvent' in document) {
                    // modern browsers, IE9+
                    var e = document.createEvent('HTMLEvents');
                    e.initEvent(type, false, true);
                    el.dispatchEvent(e);
                } else {
                    // IE 8
                    var e = document.createEventObject();
                    e.eventType = type;
                    el.fireEvent('on'+e.eventType, e);
                }
            }

            function validateNameOfUser(name, confirmEmpty) {
                var confirmLetters = /^[A-Za-z А-Яа-я\-]+$/;
                var response = {};
                response.isEmpty = false;

                if (name.match(confirmLetters) || (confirmEmpty && name == '')) {
                    response.isValid = true;
                } else {
                    response.isValid = false;
                }

                if (name == '') {
                    response.isEmpty = true;
                }
                
                return response;
            }

            triggerEvent(document.querySelector("#lastName"), 'keyup');

            document.querySelectorAll('#lastName, #firstName, #middleName').forEach(elem => {
                elem.addEventListener("keyup", (e) => {
                    if (document.querySelector("#lastName").value != '' && document.querySelector("#firstName").value != '') {
                        document.querySelector(".first-step-registration__to-next-step").disabled = false;
                    }

                    elem.classList.remove("input_is_failed");
                    document.querySelector('.first-step-registration__exception-' + elem.id).innerHTML = '';
                });
            });

            document.querySelector(".first-step-registration__to-next-step").addEventListener("click", (e) => {
                e.preventDefault();

                var lastnameValue = document.querySelector("#lastName").value.trim();
                var firstnameValue = document.querySelector("#firstName").value.trim();
                var middlenameValue = document.querySelector("#middleName").value.trim();

                var lastnameValidateResult = validateNameOfUser(lastnameValue, false);
                var firstnameValidateResult = validateNameOfUser(firstnameValue, false);
                var middlenameValidateResult = validateNameOfUser(middlenameValue, true);

                if (lastnameValidateResult.isValid && firstnameValidateResult.isValid && middlenameValidateResult.isValid) {
                    window.scrollTo(0, 0);
                    document.querySelector(".first-step-registration").style.display = 'none';
                    document.querySelector(".second-step-registration").style.display = 'flex';
                } else {
                    if (! lastnameValidateResult.isValid) {
                        document.querySelector("#lastName").classList.add("input_is_failed");
                        if (lastnameValidateResult.isEmpty) {
                            document.querySelector('.first-step-registration__exception-lastName').innerHTML = 'Пожалуйста, введите фамилию';
                        } else {
                            document.querySelector('.first-step-registration__exception-lastName').innerHTML = 'Ошибка! Недопустимые символы';
                        }
                    }

                    if (! firstnameValidateResult.isValid) {
                        document.querySelector("#firstName").classList.add("input_is_failed");
                        if (firstnameValidateResult.isEmpty) {
                            document.querySelector('.first-step-registration__exception-firstName').innerHTML = 'Пожалуйста, введите имя';
                        } else {
                            document.querySelector('.first-step-registration__exception-firstName').innerHTML = 'Ошибка! Недопустимые символы';
                        }
                    }
                    
                    if (! middlenameValidateResult.isValid) {
                        document.querySelector("#middleName").classList.add("input_is_failed");
                        document.querySelector('.first-step-registration__exception-middleName').innerHTML = 'Ошибка! Недопустимые символы';
                    }
                }
                return false;
            });

            document.querySelectorAll('#accept, #accept2, #accept3').forEach(acceptCheckbox => 
                acceptCheckbox.addEventListener("click", (e) => {
                    if (document.querySelector('#accept').checked && document.querySelector('#accept2').checked && document.querySelector('#accept3').checked) {
                        document.querySelector(".second-step-registration__register").disabled = false;
                    } else {
                        document.querySelector(".second-step-registration__register").disabled = true;
                    }
                })
            );

            document.querySelectorAll('#email, #password, #password-confirm').forEach(elem => 
                elem.addEventListener("keyup", (e) => {
                    elem.classList.remove("input_is_failed");
                    document.querySelector('.second-step-registration__exception-' + elem.id).innerHTML = '';
                })
            );

            function validateEmail(email) {
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            document.getElementById('kc-register-form').addEventListener('submit', (e) => {
                e.preventDefault();

                var isEmailValid = true;
                var isPasswordValid = true;
                var isConfirmPasswordValid = true;

                var emailField = document.getElementById("email");
                if (emailField.value.trim() == '') {
                    emailField.classList.add("input_is_failed");
                    document.querySelector('.second-step-registration__exception-email').innerHTML = 'Пожалуйста, введите электронную почту';
                    isEmailValid = false;
                } else if (! validateEmail(emailField.value)) {
                    emailField.classList.add("input_is_failed");
                    document.querySelector('.second-step-registration__exception-email').innerHTML = 'Ошибка! Неверный формат';
                    isEmailValid = false;
                }

                if (document.getElementById("password").value.length < 6) {
                    document.getElementById('password').classList.add("input_is_failed");
                    document.querySelector('.second-step-registration__exception-password').innerHTML = 'Пароль должен содержать не менее 6 символов';
                    isPasswordValid =false;

                }

                if (document.getElementById("password").value != document.getElementById("password-confirm").value) {
                    document.getElementById('password-confirm').classList.add("input_is_failed");
                    document.querySelector('.second-step-registration__exception-password-confirm').innerHTML = 'Подтверждение пароля не совпадает';
                    isConfirmPasswordValid = false;
                }


                if (isEmailValid && isPasswordValid && isConfirmPasswordValid) {
                    document.getElementById('kc-register-form').submit();
                }
            });


            if (! document.querySelector(".first-step-registration__to-next-step").disabled) {
                document.querySelector(".first-step-registration__to-next-step").click();
            }
            
        });
    </script>
      </header>
      <div>
        <div id="kc-content-wrapper">


        <form id="kc-register-form" class="" action="https://passport.rusneb.ru/auth/realms/RSL/login-actions/registration?session_code=mcK4q0ynUEEdevYb4dH_VeRZut-10GcPYVCRtsY0njY&amp;execution=62883e9e-98eb-4c46-9e0f-9e1c3a2ccf8c&amp;client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o" method="post">
            <div class="first-step-registration">
                <div class="first-step-registration__content">
                    <div class="first-step-registration__header">
                        <div class="first-step-registration__header-text">Регистрация</div>
                        <a class="first-step-registration__header-link" href="/auth/realms/RSL/login-actions/authenticate?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o">Я уже зарегистрирован(а)</a>
                    </div>
                    <div class="first-step-registration__mobile-notification">
                        <span class="first-step-registration__mobile-notification-text">У меня есть читательский билет РГБ
                            <svg class="first-step-registration__right-arrow" width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5448 6.5L0.333155 11.4749L0 13L7 6.52513L6.97368 6.5L7 6.47487L0 0L0.333155 1.52513L5.5448 6.5Z" fill="#031933"></path>
                            </svg>
                        </span>
                        <p class="first-step-registration__mobile-notification-more-text" style="display: none;">Вам не нужна регистрация! Вы можете войти в систему, используя в качестве логина номер читательского билета.
                            Паролем по умолчанию является дата вашего рождения в формате ДДММГГГГ
                            <br><br>
                            <a class="first-step-registration__navigate-to-auth" href="/auth/realms/RSL/login-actions/authenticate?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o">Перейти на страницу входа</a>
                        </p>
                    </div>
                    <div class="first-step-registration__notification">
                        <span class="first-step-registration__headline">У меня уже есть читательский билет РГБ</span>
                        <p class="first-step-registration__notification-text">Вам не нужна регистрация! Вы можете войти в систему, используя в качестве логина номер читательского билета.
                            Паролем по умолчанию является дата вашего рождения в формате ДДММГГГГ
                        </p>
                        <a class="first-step-registration__navigate-to-auth" href="/auth/realms/RSL/login-actions/authenticate?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o">Перейти на страницу входа</a>
                    </div>
                    <div class="first-step-registration__alternative-enterence">
                        <div class="first-step-registration__alternative-enterence-text">Войти при помощи</div>
                        <div class="first-step-registration__services">
                                <a href="/auth/realms/RSL/broker/esia/login?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o&amp;session_code=mcK4q0ynUEEdevYb4dH_VeRZut-10GcPYVCRtsY0njY" id="social-esia" class="social esia" title="esia">
                                    <img class="first-step-registration__service-type" src="/auth/resources/0x53g/login/NEB/svg/esia.svg">
                                </a>
                                <a href="/auth/realms/RSL/broker/vk/login?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o&amp;session_code=mcK4q0ynUEEdevYb4dH_VeRZut-10GcPYVCRtsY0njY" id="social-vk" class="social vk" title="VK">
                                    <img class="first-step-registration__service-type" src="/auth/resources/0x53g/login/NEB/svg/vk.svg">
                                </a>
                                <a href="/auth/realms/RSL/broker/yandex/login?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o&amp;session_code=mcK4q0ynUEEdevYb4dH_VeRZut-10GcPYVCRtsY0njY" id="social-yandex" class="social yandex" title="Yandex">
                                    <img class="first-step-registration__service-type" src="/auth/resources/0x53g/login/NEB/svg/yandex.svg">
                                </a>
                                <a href="/auth/realms/RSL/broker/ok/login?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o&amp;session_code=mcK4q0ynUEEdevYb4dH_VeRZut-10GcPYVCRtsY0njY" id="social-ok" class="social ok" title="OK">
                                    <img class="first-step-registration__service-type" src="/auth/resources/0x53g/login/NEB/svg/ok.svg">
                                </a>
                                <a href="/auth/realms/RSL/broker/mailru/login?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o&amp;session_code=mcK4q0ynUEEdevYb4dH_VeRZut-10GcPYVCRtsY0njY" id="social-mailru" class="social mailru" title="MailRu">
                                    <img class="first-step-registration__service-type" src="/auth/resources/0x53g/login/NEB/svg/mailru.svg">
                                </a>
                        </div>
                    </div>
                    <div class="first-step-registration__step-block">
                        <div class="first-step-registration__step">Шаг 1 из 2. Основные данные</div>
                        <div class="first-step-registration__mandatory-fields">* - обязательные поля</div>
                    </div>
                    <div class="first-step-registration__form">
                        <div class="first-step-registration__form-field">
                            <label class="first-step-registration__label-field" for="lastName">Фамилия *</label>
                            <input type="text" id="lastName" class="first-step-registration__input-field" name="lastName" value="">
                            <div class="first-step-registration__exception first-step-registration__exception-lastName"></div>
                        </div>
                        <div class="first-step-registration__form-field">
                            <label class="first-step-registration__label-field" for="firstName">Имя *</label>
                            <input type="text" id="firstName" class="first-step-registration__input-field " name="firstName" value="">
                            <div class="first-step-registration__exception first-step-registration__exception-firstName"></div>
                        </div>
                        <div class="first-step-registration__form-field">
                            <label class="first-step-registration__label-field" for="middleName">Отчество (при наличии)</label>
                            <input type="text" id="middleName" class="first-step-registration__input-field " name="user.attributes.middleName" value="">
                            <div class="first-step-registration__exception first-step-registration__exception-middleName"></div>
                        </div>
                    </div>
                    <div class="first-step-registration__action">
                        <button class="first-step-registration__to-next-step" disabled="disabled">Продолжить</button>
                        <a class="first-step-registration__login" href="/auth/realms/RSL/login-actions/authenticate?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o">Войти в аккаунт</a>
                    </div>
                </div>
            </div>

            <div class="second-step-registration">
                <div class="second-step-registration__content">
                    <div class="second-step-registration__header">
                        <div class="second-step-registration__header-text">Регистрация</div>
                        <a class="second-step-registration__header-link" href="/auth/realms/RSL/login-actions/authenticate?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o">Я уже зарегистрирован(а)</a>
                    </div>
                    <div class="second-step-registration__step-block">
                        <div class="second-step-registration__step">Шаг 2 из 2. Данные для входа</div>
                        <div class="second-step-registration__mandatory-fields">* - обязательные поля</div>
                    </div>
                    <div class="second-step-registration__form">
                        <div class="second-step-registration__form-field">
                            <label class="second-step-registration__label-field" for="email">Электронная почта (используется для входа) *</label>
                            <input type="text" id="email" class="second-step-registration__input-field " name="email" value="" autocomplete="email" placeholder="example@email.ru">
                            <div class="second-step-registration__exception second-step-registration__exception-email"></div>
                        </div>
                        <div class="second-step-registration__form-field">
                            <label class="second-step-registration__label-field" for="password">Пароль (не менее 6 символов) *</label>
                            <input type="password" id="password" class="second-step-registration__input-field " name="password" autocomplete="new-password">
                            <div class="second-step-registration__exception second-step-registration__exception-password"></div>
                        </div>
                        <div class="second-step-registration__form-field">
                            <label class="second-step-registration__label-field" for="password-confirm">Повторить пароль *</label>
                            <input type="password" id="password-confirm" class="second-step-registration__input-field " name="password-confirm">
                            <div class="second-step-registration__exception second-step-registration__exception-password-confirm"></div>
                        </div>
                    </div>
                    <div class="second-step-registration__rules" style="margin-top: 20px;">
                        <div style="padding-bottom: 15px; display: flex; align-items: baseline;">
                            <input type="checkbox" name="accept" id="accept">
                            <label style="padding-left: 10px;" for="accept">Соглашаюсь с <a target="_blank" class="second-step-registration__rules-link" href="https://www.rsl.ru/photo/!_ORS/1-O-BIBLIOTEKE/7-documenty/obshie/consent_to_personal_data_processing.pdf"> обработкой персональных данных</a></label>
                        </div>
                        <div style="padding-bottom: 15px; display: flex;">
                            <input type="checkbox" name="accept2" id="accept2">
                            <label style="padding-left: 10px;" for="accept2">Ознакомлен с <a target="_blank" class="second-step-registration__rules-link" href="https://www.rsl.ru/photo/!_ORS/1-O-BIBLIOTEKE/7-documenty/obshie/personal_data_protection_policy.pdf">политикой в отношении защиты персональных данных</a></label>
                        </div>
                        <div style="display: flex;">
                            <input type="checkbox" name="accept3" id="accept3">
                            <label style="padding-left: 10px;" for="accept3">Принимаю <a target="_blank" class="second-step-registration__rules-link" href="https://www.rsl.ru/photo/!_ORS/1-O-BIBLIOTEKE/7-documenty/4readers/3_1_rules-rgb.pdf">правила пользования Российской государственной библиотекой</a></label>
                        </div>    
                    </div>
                    <div class="second-step-registration__action">
                        <input type="submit" class="second-step-registration__register" value="Зарегистрироваться" disabled="disabled">
                        <a class="second-step-registration__login" href="/auth/realms/RSL/login-actions/authenticate?client_id=rsl.ru&amp;tab_id=rh1_EgaJO1o">Войти в аккаунт</a>
                    </div>
                </div>
            </div>
        </form>


    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) { 
            if (document.querySelector(".alert")) {
                document.querySelector(".alert").style.display = 'none';
            }

            document.querySelector('.first-step-registration__mobile-notification').addEventListener("click", (e) => {
                let moreText = document.querySelector(".first-step-registration__mobile-notification-more-text");
                if (moreText.style.display == 'none') {
                    moreText.style.display = 'block';
                    document.querySelector(".first-step-registration__right-arrow").style.transform = 'rotate(90deg)';
                } else {
                    moreText.style.display = 'none';
                    document.querySelector(".first-step-registration__right-arrow").style.transform = 'rotate(0deg)';
                }
            });

            function triggerEvent(el, type){
               if ('createEvent' in document) {
                    // modern browsers, IE9+
                    var e = document.createEvent('HTMLEvents');
                    e.initEvent(type, false, true);
                    el.dispatchEvent(e);
                } else {
                    // IE 8
                    var e = document.createEventObject();
                    e.eventType = type;
                    el.fireEvent('on'+e.eventType, e);
                }
            }

            function validateNameOfUser(name, confirmEmpty) {
                var confirmLetters = /^[A-Za-z А-Яа-я\-]+$/;
                var response = {};
                response.isEmpty = false;

                if (name.match(confirmLetters) || (confirmEmpty && name == '')) {
                    response.isValid = true;
                } else {
                    response.isValid = false;
                }

                if (name == '') {
                    response.isEmpty = true;
                }
                
                return response;
            }

            triggerEvent(document.querySelector("#lastName"), 'keyup');

            document.querySelectorAll('#lastName, #firstName, #middleName').forEach(elem => {
                elem.addEventListener("keyup", (e) => {
                    if (document.querySelector("#lastName").value != '' && document.querySelector("#firstName").value != '') {
                        document.querySelector(".first-step-registration__to-next-step").disabled = false;
                    }

                    elem.classList.remove("input_is_failed");
                    document.querySelector('.first-step-registration__exception-' + elem.id).innerHTML = '';
                });
            });

            document.querySelector(".first-step-registration__to-next-step").addEventListener("click", (e) => {
                e.preventDefault();

                var lastnameValue = document.querySelector("#lastName").value.trim();
                var firstnameValue = document.querySelector("#firstName").value.trim();
                var middlenameValue = document.querySelector("#middleName").value.trim();

                var lastnameValidateResult = validateNameOfUser(lastnameValue, false);
                var firstnameValidateResult = validateNameOfUser(firstnameValue, false);
                var middlenameValidateResult = validateNameOfUser(middlenameValue, true);

                if (lastnameValidateResult.isValid && firstnameValidateResult.isValid && middlenameValidateResult.isValid) {
                    window.scrollTo(0, 0);
                    document.querySelector(".first-step-registration").style.display = 'none';
                    document.querySelector(".second-step-registration").style.display = 'flex';
                } else {
                    if (! lastnameValidateResult.isValid) {
                        document.querySelector("#lastName").classList.add("input_is_failed");
                        if (lastnameValidateResult.isEmpty) {
                            document.querySelector('.first-step-registration__exception-lastName').innerHTML = 'Пожалуйста, введите фамилию';
                        } else {
                            document.querySelector('.first-step-registration__exception-lastName').innerHTML = 'Ошибка! Недопустимые символы';
                        }
                    }

                    if (! firstnameValidateResult.isValid) {
                        document.querySelector("#firstName").classList.add("input_is_failed");
                        if (firstnameValidateResult.isEmpty) {
                            document.querySelector('.first-step-registration__exception-firstName').innerHTML = 'Пожалуйста, введите имя';
                        } else {
                            document.querySelector('.first-step-registration__exception-firstName').innerHTML = 'Ошибка! Недопустимые символы';
                        }
                    }
                    
                    if (! middlenameValidateResult.isValid) {
                        document.querySelector("#middleName").classList.add("input_is_failed");
                        document.querySelector('.first-step-registration__exception-middleName').innerHTML = 'Ошибка! Недопустимые символы';
                    }
                }
                return false;
            });

            document.querySelectorAll('#accept, #accept2, #accept3').forEach(acceptCheckbox => 
                acceptCheckbox.addEventListener("click", (e) => {
                    if (document.querySelector('#accept').checked && document.querySelector('#accept2').checked && document.querySelector('#accept3').checked) {
                        document.querySelector(".second-step-registration__register").disabled = false;
                    } else {
                        document.querySelector(".second-step-registration__register").disabled = true;
                    }
                })
            );

            document.querySelectorAll('#email, #password, #password-confirm').forEach(elem => 
                elem.addEventListener("keyup", (e) => {
                    elem.classList.remove("input_is_failed");
                    document.querySelector('.second-step-registration__exception-' + elem.id).innerHTML = '';
                })
            );

            function validateEmail(email) {
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            document.getElementById('kc-register-form').addEventListener('submit', (e) => {
                e.preventDefault();

                var isEmailValid = true;
                var isPasswordValid = true;
                var isConfirmPasswordValid = true;

                var emailField = document.getElementById("email");
                if (emailField.value.trim() == '') {
                    emailField.classList.add("input_is_failed");
                    document.querySelector('.second-step-registration__exception-email').innerHTML = 'Пожалуйста, введите электронную почту';
                    isEmailValid = false;
                } else if (! validateEmail(emailField.value)) {
                    emailField.classList.add("input_is_failed");
                    document.querySelector('.second-step-registration__exception-email').innerHTML = 'Ошибка! Неверный формат';
                    isEmailValid = false;
                }

                if (document.getElementById("password").value.length < 6) {
                    document.getElementById('password').classList.add("input_is_failed");
                    document.querySelector('.second-step-registration__exception-password').innerHTML = 'Пароль должен содержать не менее 6 символов';
                    isPasswordValid =false;

                }

                if (document.getElementById("password").value != document.getElementById("password-confirm").value) {
                    document.getElementById('password-confirm').classList.add("input_is_failed");
                    document.querySelector('.second-step-registration__exception-password-confirm').innerHTML = 'Подтверждение пароля не совпадает';
                    isConfirmPasswordValid = false;
                }


                if (isEmailValid && isPasswordValid && isConfirmPasswordValid) {
                    document.getElementById('kc-register-form').submit();
                }
            });


            if (! document.querySelector(".first-step-registration__to-next-step").disabled) {
                document.querySelector(".first-step-registration__to-next-step").click();
            }
            
        });
    </script>


        </div>
      </div>

  </div>