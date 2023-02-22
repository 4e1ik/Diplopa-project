@if ($post->place == 1)
<p>Парк</p>
@elseif($post->place == 2)
    <p>Достопримечательность</p>
@elseif($post->place == 3)
    <p>Кафе</p>
@elseif($post->place == 4)
    <p>Ресторан</p>
@elseif($post->place == 5)
    <p>Музей</p>
@elseif($post->place == 6)
    <p>Театр</p>
@elseif($post->place == 7)
    <p>Кинотеатр</p>
@elseif($post->place == 8)
    <p>Другое</p>
@endif
