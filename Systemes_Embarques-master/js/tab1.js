
      var container = document.getElementById('visualization2');

       $.getJSON("../js/Json.php", function(jsonResponse){
       //console.log(jsonResponse);

          var items = jsonResponse['items']; 
           var options = {
              style:'bar',
              barChart: {width:50, align:'center'}, // align: left, center, right
              drawPoints: false,
              dataAxis: {
                  icons:true
              },
              orientation:'top',
              height: '200px',
              start: '2017-06-11'
          };
          var graph2d2 = new vis.Graph2d(container, items, options);
       });

console.log(items); 

       /*$.getJSON("../js/Json.php", function(jsonResponse){
              console.log(jsonResponse);
              var items = jsonResponse['items'];
              
              timeline = new vis.Timeline(
                document.getElementById('visualization'), 
                items, 
                groups, 
                {
                  clickToUse: true,
                  //stack: false,
                  orientation: 'both'
                }
              );              
            }); */      

       



