function init() {
    let map = new ymaps.Map('user-map', {
        center: [53.90418262984444, 27.56376627880859],
        zoom: 7,
    });
    $.ajax('/user_map', {
        type: 'GET',  // http method
        // data: { myData: 'This is my data.' },  // data to submit
        success: function (data, status, xhr) {
            data.forEach(function (element) {
                let placemark = new ymaps.Placemark(element, {}, {
                    draggable: false
                })
                map.geoObjects.add(placemark);

                console.log(element)
            })
        },
        error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
        }
    });
}
ymaps.ready(init);
