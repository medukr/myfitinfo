
// Замена формы изменения имени кнопкой вызова модального окна
(function (){

    let name = $("div#edit-name input[name*='Presets[name]']").val();

    let html = "<h3 class=\"page-title\">" + name + "</h3><a href=\"\" class=\"nav-link-icon ml-2\" data-toggle=\"modal\" data-target=\"#editName\"><i class=\"material-icons\">edit</i></a>";
    $('#edit-name').html(html);

   /* //Родительский элемнт
    let html = $(document.createElement('div'));

    let h3 = $(document.createElement('h3')).attr({
        'class':'page-title'
    }).text(name);

    let i = $(document.createElement('i')).attr({
        'class':'material-icons'
    }).text('edit');

    let a = $(document.createElement('a')).attr({
        'href':'',
        'class': 'nav-link-icon ml-2',
        'data-toggle': 'modal',
        'data-target': '#editName'
    }).append(i);

    //Формируем наполнение родительского элемента
    html.append(h3).append(a);
    
    $('#edit-name').html(html.html());*/
}(jQuery));


//Изменения имени пресета
$('button#submitEditPresetName').on('click',function (e) {
    e.preventDefault();
    $('#editName').modal('hide');

    let form_id = $(this).data('form-id');

    let _csrf = $("form#" + form_id + " input[name*='_csrf']").val();
    let preset_id = $("form#" + form_id + " input[name*='Presets[id]']").val();
    let preset_name = $("form#" + form_id + " input[name*='Presets[name]']").val();

    $.post('/preset/update-name',{
        '_csrf': _csrf,
        'Presets[name]': preset_name,
        'Presets[id]': preset_id
    }).done(function (data) {
        $('#edit-name')
            .children('h3')
            .css({'height':'2.25rem'})
                .animate({'opacity': '0'},150)
                .animate({'width':'toggle'},
                    {
                    'duration':150,
                    'complete': function () {
                        $(this).html(data)
                    }})
                .animate({'width':'toggle'}, 150)
                .animate({'opacity': '1'},150)

    })
});


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

        showResponseAddNew(data, "div#preset-items");

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
            successMessageModal('Программа успешно удалена!');
            showResponseRemoveOld(data, '#presets', function () {
                return  $("form#" + form_id).parents('div#preset-' + preset_id);
            });
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
        .done(function (data) {

            showResponseRemoveOld(data, 'div#preset-items', function () {
                return  $("form#" + form_id).parents('div#discipline-list');
            })
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
            // $('#sets-list').html(data)

        successMessageModal('Тренировка успешно удалена!');
        showResponseRemoveOld(data, '#sets-list', function () {
                return  $("form#" + form_id).parents('div#set-' + set_id);
            });
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

        showResponseAddNew(data, '.working-data-list-' + working_id);

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
        showResponseRemoveOld(data, '.working-data-list-' + working_id, function () {
            let elementChild = $('.working-data-list-' + working_id).children();
            return $(elementChild[elementChild.length - 1])
        });

    })

});


//Анимация загрузки Loading Modal Widget, вывод сообщения о ошибке
$(document).ajaxStart(function () {
        loadingModal('show');
    })
    .ajaxStop(function () {
        loadingModal('hide');
    })
    .ajaxError(function () {
        errorMessageModal();

        //Принудительное скрытие анимации загрузки
        setTimeout(function () {
                $('#loadingModal').modal('hide');
            },2500);


    });

function loadingModal(state) {
    let element = $('#loadingModal');

    if (state === 'show' || state === true){
        element.modal('show');
    } else if (state === 'hide' || state === false) {
        element.modal('hide');

        //В случае, когда анимация "show" еще не закончилась - вызов "hide" не срабатывает.
        //Поэтому вызываем повторно с отстрочкой чуть больше установленнго в стиле .fade (0.3с)
        setTimeout(function () {
            element.modal('hide');

            setTimeout(function () {
                element.modal('hide');
            }, 300)

        }, 380);
    }

    return element;
}


//Модальное окно успешного выполнения
function successMessageModal(message) {
    return showModalMessage('#successModal', '#successTextModal', message);
}

//Модальное окно ошибки
function errorMessageModal(message) {
    return showModalMessage('#errorModal', '#errorTextModal', message);
}

function showModalMessage(modalQuery, textModalQuery, message, showTime = 2000){
    //Перезаписываем сообщение, если неебоходимо
    if (textModalQuery !== null && message !== null) $(textModalQuery).text(message);

    let modalElement = $(modalQuery);
    modalElement.modal('show');

    //Автоматическое скрытие сообщения
    setTimeout(function () {
        modalElement.modal('hide');
    }, showTime);

    return modalElement;
}

function showResponseAddNew(data, queryElement){
    let div = document.createElement('div');

    //Заполняем его ответом с сервера
    div.innerHTML = data;

    //Скрываем последний вложенный елемент
    div.lastElementChild.style.display = 'none';
    div.lastElementChild.style.opacity = '0';

    //Вставляем новые данные
    let elementChild = $(queryElement)
        .html(div.innerHTML)
        .children();

    //Анимированно показываем последний скрытый элемент
    $(elementChild[elementChild.length - 1])
        .show(100)
        .animate({opacity:'1'},200)
}


//Скрытие элемента, который неоходимо вернуть из callReturnJQuery,
//далее, по окончанию анимации вставка новых данных data в родитель queryBodyElement
function showResponseRemoveOld(data, queryBodyElement, callReturnJQuery){

    callReturnJQuery()
        .animate(
            {opacity: '0'},
            {duration: 200})
        .hide(100, function () {
            $(queryBodyElement).html(data);
        })
}


