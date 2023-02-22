export function place(place) {
    if (place === 1) {
        return [
            ['islands#greedIcon', 'Парк']
        ];
    } else if (place === 2) {
        return [
            ['islands#blueIcon', 'Достопримечательность']
        ];
    } else if (place === 3) {
        return [
            ['islands#redIcon', 'Кафе']
        ];
    } else if (place === 4) {
        return [
            ['islands#yellowIcon', 'Ресторан']
        ];
    } else if (place === 5) {
        return [
            ['islands#orangeIcon', 'Музей']
        ];
    } else if (place === 6) {
        return [
            ['islands#violetIcon', 'Театр']
        ];
    } else if (place === 7) {
        return [
            ['islands#brownIcon', 'Кинотеатр']
        ];
    } else if (place === 8) {
        return [
            ['islands#grayIcon', 'Другое']
        ];
    }
}

