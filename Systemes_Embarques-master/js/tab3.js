
      var container3 = document.getElementById('visualization3');

       $.getJSON("../js/Json3.php", function(jsonResponse){
       //console.log(jsonResponse);

          var items3 = jsonResponse['items3']; 
           var options = {
              style:'bar',
              barChart: {
                width: '10',
              }, 
              drawPoints: false,
              dataAxis: {
              },
              orientation:'top',
              height: '200px',
          };
          var graph2d2 = new vis.Graph2d(container3, items3, options);
       });

     

       



