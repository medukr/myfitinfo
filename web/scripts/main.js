// $('div#preset-items').on('click', '#add-to-preset', function (e) {
//     e.preventDefault();
//     // var id = $('.id_new_item').val();
//     // var orderId = $(this).data('order');
//
//     $.ajax({
//         url: "/set/add-preset",
//         // data: {id:id, orderId:orderId},
//         type: 'GET',
//         success: function(res){
//             if (!res) alert('Error->.add-to-cart->Ajax:success');
//             // showCart(res);
//             $('div#preset-items').html(res);
//
//         },
//         error: function () {
//             alert ('Error->.add-to-cart->Ajax:error');
//         }
//
//     });
// });

function showCart(cart) {
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}


//Добавление упражнения в программу
$('#add-to-preset').click(function () {
    let preset_id = $('#preset-name').data('id');
    let discipline_id = $('.choose-discipline').val();

    $.ajax({
        url: "/preset/add-item",
        data: {preset_id:preset_id, discipline_id:discipline_id},
        type: 'GET',
        success: function (res) {
            if (!res) alert('Error->Ajax:success');
            $('div#preset-items').html(res);
        },
        error: function () {
            alert('Error->Ajax:error');
        },

    });
});

//удаление программы
$('.delete-preset').click(function (e) {

        let preset_id = $(this).data('id');

        if (!confirm('Are you sure?')) return false;

        $.post('/preset/delete',
            {preset_id:preset_id}, function (data) {
                $('.programs').html(data);
            })
            .done(function () {
                alert('Success!');
            })
            .fail(function () {
                alert('Error');
            });
        e.preventDefault();

    });




//Удаление упражнения из программы
// $('div.programs').on('click', '.delete-preset-item', function (e) {
$('.delete-preset-item').click(function (e) {

    e.preventDefault();

    let discipline_id = $(this).data('id');
    let preset_id = $(this).data('preset-id');

    if (!confirm('Are you sure?')) return false;

    $.post('/preset/delete-item',
        {discipline_id:discipline_id, preset_id:preset_id})
        .done(function (result) {
            $('div#preset-items').html(result);
        })
        .fail(function () {
            alert('Error');
        });
});

//удалние сета из журнала
$('.delete-set').click(function (e) {

    e.preventDefault();

    if (!confirm('Are you sure?')) return false;

    let set_id = $(this).data('id');

    $.post('/set/delete', {set_id:set_id})
        .done( function (data) {
            alert('Тренировка удалена');
            $('.sets-list').html(data)
        })
        .fail(function () {
        alert('Error');
    });

});

//добавление итерации в воркинг
$('.add-iteration').click(function (e) {
    e.preventDefault();

    let id = $(this).data('id');
    let weight = $('#weight-' + id).val();
    let iteration = $('#iteration-' + id).val();

    $.get('/working/add', {
        id:id,
        weight:weight,
        iteration:iteration
    }).done(function (data) {
        $('.working-data-list-' + id).html(data);
    }).fail(function () {
        alert('Error');
    })

});


//удаление итерации из воркинга
$('.delete-iteration').click(function (e) {
    e.preventDefault();

    let id = $(this).data('id');

    $.post('/working/delete', {
        id:id
    }).done(function (data) {
        $('.working-data-list-' + id).html(data);
    }).fail(function () {
        alert('Error');
    })

});

