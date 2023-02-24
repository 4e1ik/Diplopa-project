import {place} from "./helpers/placeHelper.js";
import {cluster} from "./helpers/clustererHelper.js";
import {balloon} from "./helpers/balloonHelper.js";

function init() {
    var clusterer = new ymaps.Clusterer(cluster());

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
                let placemark = new ymaps.Placemark([element[0], element[1]], balloon(element), {
                    draggable: false,
                    preset: place(element['place'])[0],
                });

                clusterer.add(placemark).options.set({
                    balloonContentLayoutHeight: 400,
                    balloonContentLayoutWidth: 580,
                });
            })

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

