import {place} from "./helpers/placeHelper.js";

function init() {
    var myCollection = new ymaps.GeoObjectCollection();
    var clusterer = new ymaps.Clusterer({
        /**
         * Через кластеризатор можно указать только стили кластеров,
         * стили для меток нужно назначать каждой метке отдельно.
         * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/option.presetStorage.xml
         */
        preset: 'islands#invertedVioletClusterIcons',
        /**
         * Ставим true, если хотим кластеризовать только точки с одинаковыми координатами.
         */
        groupByCoordinates: false,
        /**
         * Опции кластеров указываем в кластеризаторе с префиксом "cluster".
         * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/ClusterPlacemark.xml
         */
        clusterDisableClickZoom: true,
        clusterHideIconOnBalloonOpen: false,
        geoObjectHideIconOnBalloonOpen: false,
        gridSize: 80,
    });

    let map = new ymaps.Map('user-map', {
        center: [53.90418262984444, 27.56376627880859],
        zoom: 7,
    }, {
        searchControlProvider: 'yandex#search'
    });

    $.ajax('/user_map', {
        type: 'GET',  // http method
        // data: { myData: 'This is my data.' },  // data to submit
        success: function (data, status, xhr) {
            data.forEach(function (element) {
                let placemark = new ymaps.Placemark([element[0], element[1]], {
                    // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
                    balloonContentHeader:
                        "<div>" +
                            "<h2>"+element['title']+"</h2>"+
                        "</div>",
                    balloonContentBody:
                        "<div>" +
                            "<div style='width: 430px'>"+
                                "<div style='display: flex; flex-direction: row; flex-wrap: wrap'>" +
                                    element['images'].map(function (image) {
                                        return "<img class='img-rounded' src='storage/" + image + "' alt='просто'/>";
                                    })+
                                "</div>"+
                            "</div>"+
                            "<div>"+
                                "<div style='width: 400px;' class=' text-justify'>" +
                                    "<p>"+element['content']+"</p>"+
                                "</div>" +
                            "</div>"+
                        "</div>",

                    balloonContentFooter:
                        "<div>"+
                            "<span>Адрес места: "+element['address']+"</span>"+"<br>"+
                            "<span>Координаты места: "+element[0]+", "+element[1]+"</span>"+
                        "</div>",
                    hintContent: place(element['place'])[1],
                }, {
                    draggable: false,
                    preset: place(element['place'])[0],
                });
                // myCollection.add(placemark).options.set({
                //     balloonMaxWidth: 450,
                // });

                clusterer.add(placemark).options.set({
                    balloonMaxWidth: 450,
                });

                // clusterer.add( placemark );

                console.log(place(element['place'])[0])
            })

            // map.geoObjects.add( myCollection );
            // map.setBounds(myCollection.getBounds(),{
            //     checkZoomRange: true
            // });

            // clusterer.add( myCollection );
            map.geoObjects.add(clusterer);
            map.setBounds(clusterer.getBounds(),{
                checkZoomRange: true
            });


        },
        error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
        }
    });
}

ymaps.ready(init);

