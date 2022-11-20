function init() {
    let map = new ymaps.Map('map', {
        center: [53.91023943313116,27.56153159490292],
        zoom: 8,
    })

    let placemark = new ymaps.Placemark([53.91023943313116,27.56153159490292], {}, {

    });

    map.geoObjects.add(placemark);

    let placemark1 = new ymaps.Placemark([53.91023943313116,27.66153159490292], {}, {

    });

    map.geoObjects.add(placemark1);

}

ymaps.ready(init);
