<!DOCTYPE html>
<html>

<body>

    <h2>Експорт</h2>
    <p>Виберіть потрібні параметри.</p>

    <form method="GET" action="/event/registers/pexportmeos/{{$id}}">
        <label for="fname">Дні: вкажіть дні які потрібно експортувати в меос в форматі (1/2/1-3) / використовуйте як розділювач між днями</label><br>
        <input type="text" name="g"><br>
        <input type="radio"  name="c" value="obl">
        <label for="html">Команди по областях</label><br>
        <input type="radio"  name="c" value="all">
        <label for="css">Обєднати область і клуб (Волинська,ЛФСО)</label><br>
        <input type="submit" value="Перейти до експорту">
    </form>


</body>

</html>
