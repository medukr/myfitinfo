
// Замена формы изменения имени кнопкой вызова модального окна
(function (){

    let name = $("div#edit-name input[name*='Presets[name]']").val()

    let html = "<h3 class=\"page-title\">" + name + "</h3><a href=\"\" class=\"nav-link-icon ml-2\" data-toggle=\"modal\" data-target=\"#editName\"><i class=\"material-icons\">edit</i></a>";

    $('#edit-name').html(html);
}(jQuery));


// Добавление упражнения в программу
$('#add-to-preset').click(function (e) {
    e.preventDefault();

    let form_id = $(this).data('form-id');

    let _csrf = $("form#" + form_id + " input[name*='_csrf']").val();
    let preset_id = $("form#" + form_id + " input[name*='PresetsDisciplines[preset_id]']").val();
    let discipline_id = $("form#" + form_id + " select[name*='PresetsDisciplines[discipline_id]']").val();

    $.post('/preset/add-item', {
        _csrf:_csrf,
        "PresetsDisciplines[preset_id]": preset_id,
        "PresetsDisciplines[discipline_id]": discipline_id,

    }).done(function (data) {
        $('div#preset-items').html(data);
    }).fail(function () {
        alert('Ошибка :(');
    });

});




//удаление программы
$('div#presets').on('click', 'button.delete-preset', function (e) {
    e.preventDefault();
    if (!confirm('Are you sure?')) return false;

    let form_id = $(this).data('form-id');

    let _csrf = $("form#" + form_id + " input[name*='_csrf']").val();
    let preset_id = $("form#" + form_id + " input[name*='Presets[id]']").val();

        $.post('/preset/delete', {
            _csrf:_csrf,
            "Presets[id]": preset_id,
        }).done(function (data) {
                $('#presets').html(data);
        }).fail(function () {
                alert('Error');
        });

    });




// Удаление упражнения из программы
$('div#preset-items').on('click', 'button.delete-preset-item', function (e) {
    e.preventDefault();

    let form_id = $(this).data('form-id');

    let _csrf = $("form#" + form_id + " input[name*='_csrf']").val();
    let preset_id = $("form#" + form_id + " input[name*='PresetsDisciplines[preset_id]']").val();
    let discipline_id = $("form#" + form_id + " input[name*='PresetsDisciplines[discipline_id]']").val();

    if (!confirm('Are you sure?')) return false;

    $.post('/preset/delete-item', {
            _csrf: _csrf,
            "PresetsDisciplines[preset_id]": preset_id,
            "PresetsDisciplines[discipline_id]": discipline_id
        })
        .done(function (result) {
            $('div#preset-items').html(result);
        })
        .fail(function () {
            alert('Error');
        });
});




//удалние сета из журнала
$('div#sets-list').on('click', 'button.delete-set', function (e) {
    e.preventDefault();

    if (!confirm('Are you sure?')) return false;

    let form_id = $(this).data('form-id');

    let _csrf = $("form#" + form_id + " input[name*='_csrf']").val();
    let set_id = $("form#" + form_id + " input[name*='Sets[id]']").val();

    $.post('/set/delete', {
        _csrf: _csrf,
        "Sets[id]": set_id,
        }).done( function (data) {
            $('div#sets-list').html(data)
        }).fail(function () {
            alert('Error');
    });

});




// добавление итерации в воркинг

$('.add-iteration').click(function (e) {
    e.preventDefault();

    let form_id = $(this).attr('form');

    let _csrf = $("form#" + form_id + " input[name*='_csrf']").val();

    let working_id = $("input[name*='WorkingData[working_id]'][form*='" + form_id + "']").val();
    let weight = $("select[name*='WorkingData[weight]'][form*='" + form_id + "']").val();
    let iteration = $("select[name*='WorkingData[iteration]'][form*='" + form_id + "']").val();


    $.post('/working/add', {
        _csrf: _csrf,
        "WorkingData[working_id]": working_id,
        "WorkingData[weight]": weight,
        "WorkingData[iteration]": iteration,
    }).done(function (data) {
        $('.working-data-list-' + working_id).html(data);
    }).fail(function () {
        alert('Error');
    })

});




//удаление итерации из воркинга
$('.delete-iteration').click(function (e) {
    e.preventDefault();
    e.preventDefault();

    let form_id = $(this).attr('form');

    let _csrf = $("form#" + form_id + " input[name*='_csrf']").val();
    let working_id = $("input[name*='Working[id]'][form*='" + form_id + "']").val();

    $.post('/working/delete', {
        _csrf: _csrf,
        "Working[id]": working_id,
    }).done(function (data) {
        $('.working-data-list-' + working_id).html(data);
    }).fail(function () {
        alert('Error');
    })

});

