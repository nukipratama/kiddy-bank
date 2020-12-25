$('.content-title').html(function () {
    return this.innerText.split(' ').map(function (e, i) {
        return $('<span />', {
            class: 'title' + i,
            text: e + ' '
        });
    });
});