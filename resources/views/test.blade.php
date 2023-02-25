  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script> 
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



<script type="text/javascript">
      $('#searchname').autocomplete({
        source:'/autocomplete',
          minlength:1,
          autoFocus:true,
          select:function(e,ui)
          {
              $('#searchname').val(ui.item.value);
              $('#peopleid').val(ui.item.peopleid);
              $('#club').val(ui.item.club);
              $('#obl').val(ui.item.obl);

              $('#trener').val(ui.item.trener);
              $('#si').val(ui.item.si);
              $('#grup').val(ui.item.grup);
              $('#rik').val(ui.item.rik);
              $('#data').val(ui.item.data);
              $('#roz').val(ui.item.roz);
          }
      });
     $('#club').autocomplete({
        source:'/autocomplete2',
          minlength:1,
          autoFocus:true,
          select:function(e,ui)
          {
              $('#club').val(ui.item.value);
              $('#clubid').val(ui.item.clubid);
              


          }
      });

      $('#obl').autocomplete({
        source:'/autocomplete3',
          minlength:1,
          autoFocus:true,
          select:function(e,ui)
          {
              $('#obl').val(ui.item.value);
              $('#oblid').val(ui.item.oblid);


          }
      });
</script>