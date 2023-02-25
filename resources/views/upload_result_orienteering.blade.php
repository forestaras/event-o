
<html>
    <head>
        <title>Upload File</title>
        <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        @section('content')
        @parent
        <form method="post" action="{{ route('upload_file') }}" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="formGroupExampleInput">Верхні рядки (як правило організації які проводять.)</label>
    <input name="r1" type="text" class="form-control" id="formGroupExampleInput" placeholder="Верхній рядок 1">
    <br>
    <input name="r2" type="text" class="form-control" id="formGroupExampleInput" placeholder="Верхній рядок 2">
    <br>
    <input name="r3" type="text" class="form-control" id="formGroupExampleInput" placeholder="Верхній рядок 3">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput">Назва </label>
    <input name="n1" type="text" class="form-control" id="formGroupExampleInput" placeholder="Назва 1">
    <br>
    <input name="n2" type="text" class="form-control" id="formGroupExampleInput" placeholder="Назва 2">
    <br>
    <input name="n3" type="text" class="form-control" id="formGroupExampleInput" placeholder="Назва 3">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput">Назва дистанції(спринтерська,довга,середня .і.т.д) </label>
    <input name="nd" type="text" class="form-control" id="formGroupExampleInput" placeholder="Назва дистанції">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput">Інформація </label>
    <input name="i1" type="text" class="form-control" id="formGroupExampleInput" placeholder="Дата проведення">
    <br>
    <input name="i2" type="text" class="form-control" id="formGroupExampleInput" placeholder="Місце проведення">
    <br>
    <input name="i3" type="text" class="form-control" id="formGroupExampleInput" placeholder="Начальник дистанції">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput">Судді </label>
    <input name="s1" type="text" class="form-control" id="formGroupExampleInput" placeholder="Головний суддя">
    <br>
    <input name="s2" type="text" class="form-control" id="formGroupExampleInput" placeholder="Головний секретар">
    <br>
    <input name="s3" type="text" class="form-control" id="formGroupExampleInput" placeholder="Контролер">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput">Клас дистанції </label>
    <input name="kd1" type="text" class="form-control" id="formGroupExampleInput" placeholder="Для дітей">
    <br>
    <input name="kd2" type="text" class="form-control" id="formGroupExampleInput" placeholder="Для дорослих">
  </div>
            
            <div class="form-group">
    <label for="exampleFormControlFile1">Виберіть CSV файл</label>
    <input type="file" multiple name="file[]">
    </div>
            
            <button type="submit">Показати протокол</button>
        </form>

    </body>
</html>