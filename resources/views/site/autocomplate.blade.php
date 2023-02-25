  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<input type="text" class="form-control" placeholder="TagName" id="searchname" name="TagName">
<input type="text" class="form-control" placeholder="TagName" id="club" name="TagName">
<input type="text" class="form-control" placeholder="TagName" id="obl" name="TagName">

<script type="text/javascript">
      $('#name').autocomplete({
        source:'/autocomplete',
          minlength:1,
          autoFocus:true,
          select:function(e,ui)
          {
              $('#name').val(ui.item.value);
              $('#club').val(ui.item.club);
              $('#obl').val(ui.item.obl);
          }
      });
</script>