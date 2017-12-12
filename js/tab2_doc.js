
      var container2 = document.getElementById('visualization2');

      $("#submit").click(function(event){
      var idUser = $('#menu').val();

      console.log(idUser);

       $.getJSON("../js/Json2_doc.php?idUser=" + idUser, function(jsonResponse){
       console.log(jsonResponse);

        var items = jsonResponse['items'];

        var dataset = new vis.DataSet(items);
        var options = {
          height: '200px'
        };
        var graph2d1 = new vis.Graph2d(container2, dataset, options);
       });
      });
      

       



