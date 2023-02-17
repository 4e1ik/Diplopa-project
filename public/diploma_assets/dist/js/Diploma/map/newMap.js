function init() {
    let map = new ymaps.Map('map-test', {
        center: [53.90418262984444, 27.56376627880859],
        zoom: 7,
    });
    $.ajax('/test', {
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
// 53.90026025373433,27.566150249553452
//     let placemark = new ymaps.Placemark([53.90988484530737, 27.48204069752266], {}, {
//         draggable: true
//     });

//     let placemark1 = new ymaps.Placemark([53.90026025373433, 27.566150249553452], {}, {
// //             draggable: true
//     });

    // let placemark2 = new ymaps.Placemark([53.909917, 27.496272], {},{
    //     draggable: true
    // });


    // var myMap = new ymaps.Map('map', {
    //     center: [53.909917, 27.496272],
    //     zoom: 9,
    //     controls: []
    // }, {
    //     searchControlProvider: 'yandex#search'
    // });

    // var placemark = new ymaps.Placemark([53.909917, 27.496272], {
    //     // Зададим содержимое заголовка балуна.
    //     balloonContentHeader: '<a href = "#">Рога и копыта</a><br>' +
    //         '<span class="description">Сеть кинотеатров</span>',
    //     // Зададим содержимое основной части балуна.
    //     balloonContentBody: '<img src="img/cinema.jpg" height="150" width="200"> <br/> ' +
    //         '<a href="tel:+7-123-456-78-90">+7 (123) 456-78-90</a><br/>' +
    //         '<b>Ближайшие сеансы</b> <br/> Сеансов нет.',
    //     // Зададим содержимое нижней части балуна.
    //     balloonContentFooter: 'Информация предоставлена:<br/>OOO "Рога и копыта"',
    //     // Зададим содержимое всплывающей подсказки.
    //     hintContent: 'Рога и копыта'
    // });
    // // Добавим метку на карту.
    // myMap.geoObjects.add(placemark);
    // // Откроем балун на метке.
    // placemark.balloon.open();


    // map.geoObjects.add(placemark);
    // map.geoObjects.add(placemark1);
    // map.geoObjects.add(placemark2);

    // ymaps.geocode('Жудро, 6', {
    //     results: 1,
    // }). then(function(res){
    //     var placemark3 = res.geoObjects.get(0);
    //
    //     map.geoObjects.add(placemark3);
    //     console.log(placemark3.getAddressLine());
    // });

//     ymaps.geocode(placemark.geometry.getCoordinates(), {
//         results: 1
//     }).then(function (res) {
//         var newContent = res.geoObjects.get(0) ?
//             console.log(res.geoObjects.get(0).properties.get('name')) :
//             console.log('Не удалось определить адрес.') ;
//     });

    // console.log(placemark.geometry.events.params.context._coordinates[0]);

    // console.log(getAddress(placemark.geometry.getCoordinates()));
    // console.log(placemark.geometry.getCoordinates());

}

ymaps.ready(init);

