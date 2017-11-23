
      var container2 = document.getElementById('visualization2');

       $.getJSON("../js/Json2.php", function(jsonResponse){
       console.log(jsonResponse);

        var items = jsonResponse['items'];

        var dataset = new vis.DataSet(items);
        var options = {
          height: '200px'
        };
        var graph2d1 = new vis.Graph2d(container2, dataset, options);
       });

      

       



