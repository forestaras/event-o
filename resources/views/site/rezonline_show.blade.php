<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Inline form</h2>
  <p>Make the viewport larger than 768px wide to see that all of the form elements are inline, left aligned, and the labels are alongside.</p>
  <form method='post' action='{{CRUDBooster::mainpath("add-save")}}'>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
      <label for="text">Прізвищ Імя:</label>
      <input type="text" class="form-control" id="name" placeholder="Імя" name="name">
    </div>
    <div class="form-group">
      <label for="pwd">Команда клуб</label>
      <input type="text" class="form-control" id="club" placeholder="Клуб" name="club">
    </div>
    <div class="form-group">
        <label for="sel1">Група:</label>
        <select class="form-control" id="sel1">
          <option>Ч-10</option>
          <option>Ч-12</option>
          <option>Ч-16</option>
          <option>Ж-12</option>
        </select>
      </div>
    <div class="form-group">
        <label for="pwd">Старт</label>
        <input type="text" class="form-control" id="start" placeholder="00 00 00" name="start">
      </div>
      <div class="form-group">
        <label for="pwd">Фініш</label>
        <input type="text" class="form-control" id="finish" placeholder="00 00 00" name="finish">
      </div>

    <button type="submit" class="btn btn-default">Зберегти</button>
  </form>
</div>

</body>
</html>
