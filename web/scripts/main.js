
// Замена формы изменения имени кнопкой вызова модального окна
(function (){

    let name = $("div#edit-name input[name*='Presets[name]']").val();

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
    })

});


//удаление программы
$('div#presets').on('click', 'button.delete-preset', function (e) {
    e.preventDefault();
    if (!confirm('Ты уверен, что хочешь удалить программу? Это действие необратимо.')) return false;

    let form_id = $(this).data('form-id');

    let _csrf = $("form#" + form_id + " input[name*='_csrf']").val();
    let preset_id = $("form#" + form_id + " input[name*='Presets[id]']").val();

        $.post('/preset/delete', {
            _csrf:_csrf,
            "Presets[id]": preset_id,
        }).done(function (data) {
                $('#presets').html(data);
        })

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

});


//удалние сета из журнала
$('div#sets-list').on('click', 'button.delete-set', function (e) {
    e.preventDefault();

    if (!confirm('Ты уверен, что хочешь удалить свою тренировку? Это действие необратимо.')) return false;

    let form_id = $(this).data('form-id');

    let _csrf = $("form#" + form_id + " input[name*='_csrf']").val();
    let set_id = $("form#" + form_id + " input[name*='Sets[id]']").val();

    $.post('/set/delete', {
        _csrf: _csrf,
        "Sets[id]": set_id,
        }).done( function (data) {
            $('#sets-list').html(data)
        })
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
        //Создаем новый элемнт
        let div = document.createElement('div');

        //Заполняем его ответом с сервера
        div.innerHTML = data;

        //Скрываем последний вложенный елемент
        div.lastElementChild.style.display = 'none';
        div.lastElementChild.style.opacity = '0';

        //Вставляем новые данные
        let elementChild = $('.working-data-list-' + working_id)
            .html(div.innerHTML)
            .children();

        //Анимированно показываем последний скрытый элемент
        $(elementChild[elementChild.length - 1])
            .show(100)
            .animate({opacity:'1'},200)
    })

});


//удаление итерации из воркинга
$('.delete-iteration').click(function (e) {
    e.preventDefault();

    let form_id = $(this).attr('form');
    
    // Выбираем из формы данные
    let _csrf = $("form#" + form_id + " input[name*='_csrf']").val();
    let working_id = $("input[name*='Working[id]'][form*='" + form_id + "']").val();

    // Отправка запроса
    $.post('/working/delete', {
        _csrf: _csrf,
        "Working[id]": working_id,
    }).done(function (data) {
        // Анимированно скрываем последний элемент, а после вставляем новые данные
        let element =  $('.working-data-list-' + working_id);

        let elementChild = element.children();

        $(elementChild[elementChild.length - 1])
            .animate(
                {opacity: '0'},
                {duration: 200})
            .hide(100, function () {
                element.html(data);
            })
    })

});


//Анимация загрузки Loading Modal Widget, вывод сообщения о ошибке
$(document).ajaxStart(function () {
        $('#loadingModal').modal('show');
    })
    .ajaxStop(function () {
        $('#loadingModal').modal('hide');

        //В случае, когда анимация "show" еще не закончилась - вызов "hide" не срабатывает.
        //Поэтому вызываем повторно с отстрочкой чуть больше установленнго в стиле .fade (0.3с)
        setTimeout(function () {
            $('#loadingModal').modal('hide');
        }, 380)
    })
    .ajaxError(function () {

        $('#errorModal').modal('show');

        //Принудительное скрытие анимации загрузки
        setTimeout(function () {
                $('#loadingModal').modal('hide');
            },2500);

        //Автоматическое скрытие сообщения
        setTimeout(function () {
            $('#errorModal').modal('hide');
        }, 2000)
    });