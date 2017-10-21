$(document).ready(function () {
    $('#update-account').formValidation({
        framework: 'bootstrap',
        locale: 'tr_TR',
        button: {
            selector: '#update-account-button',
            disabled: 'disabled'
        },
        fields: {
            name: {
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
            surname: {
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
            email: {
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
            },
            phone: {
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
            password: {
                validator: {
                    notEmpty: {
                        message: 'Parola alanını doldurmak zorunludur.'
                    },
                    identical: {
                        field: 'password_confirmation',
                        message: 'Parolalar uyuşmuyor'
                    },
                    stringLength: {
                        min: 6,
                        max: 25,
                        message: 'Parola en az 6 karakterden oluşmalıdır.'
                    }
                }
            },
            password_confirmation: {
                validator: {
                    notEmpty: {
                        message: 'Parola alanını doldurmak zorunludur.'
                    },
                    identical: {
                        field: 'password',
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
});

new Formatter(document.getElementById('phone'), {
    'pattern': '({{999}}) {{999}} {{9999}}',
    'persistent': true
});