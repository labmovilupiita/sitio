$(document).ready(function(){

    const today = new Date();

    $('.datepicker').datepicker({
        autoClose: true,
        format: 'dd mmmm yyyy',
        defaultDate: new Date(),
        setDefaultDate: true,
        maxDate: new Date(),
        maxYear: today.getFullYear(),
        maxMonth: today.getMonth(),
        yearRange: 100,
        i18n: {
            cancel: 'Cancelar',
            done: 'Seleccionar',
            months: [
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre'
            ],
            monthsShort: [
                'Ene',
                'Feb',
                'Mar',
                'Abr',
                'May',
                'Jun',
                'Jul',
                'Ago',
                'Sep',
                'Oct',
                'Nov',
                'Dic'
            ],
            weekdays: [
                'Domingo',
                'Lunes',
                'Martes',
                'Miércoles',
                'Jueves',
                'Viernes',
                'Sábado'
            ],
            weekdaysShort: [
                'Dom',
                'Lun',
                'Mar',
                'Mie',
                'Jue',
                'Vie',
                'Sab'
            ],
            weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
        }
    });

    $('select').formSelect();

    getWorkshops();
});

function getWorkshops() {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://ec2-18-217-13-5.us-east-2.compute.amazonaws.com/api/workshop",
        "method": "GET"
    };

    $.ajax(settings).done(function (response) {
        $.each(response.data, function (index, item) {
            $('#workshops').append(newWorkshopItem(item));
            $('.loader').hide();
        })
    });
}

function newWorkshopItem(workshop) {
    return `<li class="collection-item"><p>
                <label>
                    <input 
                        id="${workshop.id}" 
                        type="checkbox" 
                        class="filled-in" 
                        name="workshop">
                    <span class="workshop-detail">
                        ${workshop.name}
                    </span>
                </label>
                <a href="http://ec2-18-217-13-5.us-east-2.compute.amazonaws.com${workshop.program}" target="_blank" class="waves-effect waves-light btn-small right"><i class="material-icons">attachment</i></a>
            </p></li>`;
}

function register() {

    const requiredMessage = 'Campo requerido';

    $("#register").validate({
        rules: {
            first_name: {
                required: true,
                minlength: 5
            },
            last_name: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email:true
            },
            dob: {
                required: true
            },
            gender: {
                required: true
            },
            institute: {
                required: true
            },
            career: {
                required: true
            }
        },
        //For custom messages
        messages: {
            first_name: {
                required: requiredMessage
            },
            last_name: {
                required: requiredMessage
            },
            email: {
                required: requiredMessage
            },
            dob: {
                required: requiredMessage
            },
            gender: {
                required: requiredMessage
            },
            institute: {
                required: requiredMessage
            },
            career: {
                required: requiredMessage
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });

    if ($('#register').valid()) {
        $('.loader').show();
        const first_name = $('#first_name').val();
        const last_name = $('#last_name').val();
        const email = $('#email').val();
        const institute = $('#institute').val();
        const career = $('#career').val();
        const dob = M.Datepicker.getInstance(document.getElementById('dob'));
        const dob_value = dob.date.toISOString().split('T')[0];
        const gender = $('#gender').val();
        const workshops = $('input[type=checkbox][name=workshop]:checked');

        const formData = new FormData();
        formData.append('first_name', first_name);
        formData.append('last_name', last_name);
        formData.append('email', email);
        formData.append('institute', institute);
        formData.append('career', career);
        formData.append('dob', dob_value);
        formData.append('gender', gender);

        $.each(workshops, function (index, item) {
            formData.append('workshop', item.id);
        });

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "http://ec2-18-217-13-5.us-east-2.compute.amazonaws.com/api/attendant",
            "method": "POST",
            "processData": false,
            "contentType": false,
            "mimeType": "multipart/form-data",
            "data": formData
        };

        $.ajax(settings).done(function (response) {
            if (JSON.parse(response).success) {
                M.toast({html: 'Registro completado', displayLength: 2000});
                $('#register')[0].reset()
            } else {
                M.toast({html: 'Correo previamente registrado', displayLength: 2000});
            }
            $('.loader').hide();
        }).fail(function (response) {
            console.log(JSON.parse(response.responseText));
            console.log(response.message);
            M.toast({html: 'Correo previamente registrado', displayLength: 2000});
            $('.loader').hide();
        });


    } else {
        M.toast({html: 'Llene todos los campos', displayLength: 2000});
        $('.loader').hide();
    }
}

function openDatepicker() {
    const dob = M.Datepicker.getInstance(document.getElementById('dob'));
    if (!dob.isOpen) {
        dob.open();
    }
}