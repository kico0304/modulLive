//add new product show modal
$('.add_modal').click(function () {
    $('.modal_add').show();
});

//add new product close modal
$('.close_new_modal').click(function (e) {
    e.preventDefault();
    $('.modal_add').hide();
});

//edit product show modal
$('.edit_modal').click(function () {
    let id = $(this).data('id');
    $('.edit_modal_' + id).show();
});

//edit product close modal
$('.close_edit_modal').click(function (e) {
    e.preventDefault();
    $('.modal_edit').hide();
});

//language textarea
$('.label_lang').click(function () {
    $(this).next().toggle("slide");
});
