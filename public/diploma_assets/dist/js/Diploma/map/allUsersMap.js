function place(place){
    if (place === 1){
        return 'islands#greedIcon';
    } else if (place === 2){
        return 'islands#blueIcon';
    } else if (place === 3){
        return 'islands#redIcon';
    } else if (place === 4){
        return 'islands#yellowIcon';
    } else if (place === 5){
        return 'islands#orangeIcon';
    } else if (place === 6){
        return 'islands#violetIcon';
    } else if (place === 7){
        return 'islands#brownIcon';
    } else if (place === 8){
        return 'islands#grayIcon';
    }
}

function hintPlace(place){
    if (place === 1){
        return 'Парк'
    } else if (place === 2){
        return 'Достопримечательность'
    } else if (place === 3){
        return 'Кафе'
    } else if (place === 4){
        return 'Ресторан'
    } else if (place === 5){
        return 'Музей'
    } else if (place === 6){
        return 'Театр'
    } else if (place === 7){
        return 'Кинотеатр'
    } else if (place === 8){
        return 'Другое'
    }
}

function init() {
    let map = new ymaps.Map('map', {
        center: [53.90418262984444, 27.56376627880859],
        zoom: 7,
    }, {
        searchControlProvider: 'yandex#search'
    });
    $.ajax('/map', {
        type: 'GET',  // http method
        // data: { myData: 'This is my data.' },  // data to submit
        success: function (data, status, xhr) {
            data.forEach(function (element) {
                let placemark = new ymaps.Placemark([element[0], element[1]], {
                    // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
                    balloonContentHeader:
                        "<div>" +
                            "<h2>"+element[2]+"</h2>"+
                        "</div>",
                    balloonContentBody:
                        "<div>" +
                            "<div style='width: 430px'>"+
                                "<div style='display: flex; flex-direction: row; flex-wrap: wrap'>" +
                                        element[6].map(function (image) {
                                            return "<img class='img-rounded' src='storage/" + image + "' alt='просто'/>";
                                        })+
                                "</div>"+
                            "</div>"+
                            "<div>"+
                                "<div style='width: 400px;' class=' text-justify'>" +
                                    "<p>"+element[3]+"</p>"+
                                "</div>" +
                            "</div>"+
                        "</div>",

                    balloonContentFooter:
                        "<div>"+
                            "<span>Адрес места: "+element[4]+"</span>"+"<br>"+
                            "<span>Координаты места: "+element[0]+", "+element[1]+"</span>"+
                        "</div>",
                    hintContent: hintPlace(element[5]),
                    }, {
                    draggable: false,
                    preset: place(element[5]),
                })
                console.log(element[5])
                map.geoObjects.add(placemark).options.set({
                    balloonMaxWidth: 450,
                });
            })
        },
        error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
        }
    });
}

ymaps.ready(init);

