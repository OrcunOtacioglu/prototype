$(document).ready(function () {
    $('#register-form').formValidation({
        framework: "bootstrap",
        locale: 'tr_TR',
        fields: {
            registerName: {
                validators: {
                    notEmpty: {
                        message: 'Ad alanını doldurmak zorunludur.'
                    },
                    stringLength: {
                        min: 3,
                        max: 100
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/
                    }
                }
            },
            registerSurname: {
                validators: {
                    notEmpty: {
                        message: 'Soyad alanını doldurmak zorunludur.'
                    },
                    stringLength: {
                        min: 2,
                        max: 100
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/
                    }
                }
            },
            registerEmail: {
                validator: {
                    notEmpty: {
                        message: 'Email alanını doldurmak zorunludur.'
                    },
                    emailAddress: {
                        message: 'Lütfen geçerli bir email adresi giriniz.'
                    },
                    stringLength: {
                        min: 6,
                        max: 100
                    },
                    regexp: {
                        regexp: /([a-zA-Z0-9])\w+/
                    }
                }
            },
            registerPhone: {
                validator: {
                    notEmpty: {
                        message: 'Telefon numarası alanını doldurmak zorunludur.'
                    },
                    stringLength: {
                        min: 10,
                        max: 25
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Lütfen geçerli bir telefon numarası giriniz.'
                    }
                }
            },
            registerPassword: {
                validator: {
                    identical: {
                        field: 'registerPassword_confirmation',
                        message: 'Parolalar uyuşmuyor'
                    },
                    stringLength: {
                        min: 6,
                        max: 25,
                        message: 'Parola en az 6 karakterden oluşmalıdır.'
                    }
                }
            },
            registerPassword_confirmation: {
                validator: {
                    identical: {
                        field: 'registerPassword',
                        message: 'Parolalar uyuşmuyor'
                    },
                    stringLength: {
                        min: 6,
                        max: 25
                    }
                }
            }
        }
    });

    console.log('Working!');
});

new Formatter(document.getElementById('registerPhone'), {
    'pattern': '({{999}}) {{999}} {{9999}}',
    'persistent': true
});