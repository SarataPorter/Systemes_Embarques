var container1 = document.getElementById('visualization1');

$.getJSON("../js/Json1.php", function(jsonResponse){
       console.log(jsonResponse);

       var items = jsonResponse['items'];

       var dataset = new vis.DataSet(items);
       var options = {
        height: '200px'
      };
      var graph2d0 = new vis.Graph2d(container1, dataset, options);
    });