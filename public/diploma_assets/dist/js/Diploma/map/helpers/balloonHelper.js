import {place} from "./placeHelper.js";

export function balloon(element) {
    let balloon = {
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
    }

    return balloon;
}
