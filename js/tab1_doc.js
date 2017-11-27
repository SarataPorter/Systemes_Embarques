
      var container1 = document.getElementById('visualization1');
      
      $("#submit").click(function(event){
      var idUser = $('#menu').val();
      console.log(idUser);


       $.getJSON("../js/Json1_doc.php?idUser=" + idUser, function(jsonResponse){
       //console.log(jsonResponse);

        var items = jsonResponse['items'];

        var dataset = new vis.DataSet(items);
        var options = {
          height: '200px'
        };
        var graph2d0 = new vis.Graph2d(container1, dataset, options);
       });
     });

      

       



