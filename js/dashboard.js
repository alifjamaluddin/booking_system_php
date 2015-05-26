$('#accordion .panel-heading ul#tabs li a').click(function(){
  $("#accordion .panel-heading ul#tabs li").removeClass('active');
  if ($(this).parent('li').hasClass('active'))
    { $('#collapseOne').collapse('toggle'); }
  else
  {
    $('#collapseOne').collapse({toggle:false});
    $('#collapseOne').collapse('show');
  }
  
});



/* activate sidebar */
$('#sidebar').affix({
  offset: {
    top: 300
  }
});

$(document).ready(function(){
  $("#sec0r").show();
  $("#sec1r").hide();
  $("#sec2r").hide();
  $("#sec3r").hide();
  $("#sec4r").hide();
  $("#sec5r").hide();


  // $("#sec0r").submit();


  $("#sec0").click(function(){
    $("#sec0r").show();
    $("#sec1r").hide();
    $("#sec2r").hide();
    $("#sec3r").hide();
    $("#sec4r").hide();
    $("#sec5r").hide();
  });
  

  $("#sec1").click(function(){
    $("#sec0r").hide();
    $("#sec1r").show();
    $("#sec2r").hide();
    $("#sec3r").hide();
    $("#sec4r").hide();
    $("#sec5r").hide();
  });


  $("#sec2").click(function(){
    $("#sec0r").hide();
    $("#sec1r").hide();
    $("#sec2r").show();
    $("#sec3r").hide();
    $("#sec4r").hide();
    $("#sec5r").hide();
  });


  $("#sec3").click(function(){
    $("#sec0r").hide();
    $("#sec1r").hide();
    $("#sec2r").hide();
    $("#sec3r").show();
    $("#sec4r").hide();
    $("#sec5r").hide();
  });


  $("#sec4").click(function(){
    $("#sec0r").hide();
    $("#sec1r").hide();
    $("#sec2r").hide();
    $("#sec3r").hide();
    $("#sec4r").show();
    $("#sec5r").hide();  

  });  

  $("#sec5").click(function(){
    $("#sec0r").hide();
    $("#sec1r").hide();
    $("#sec2r").hide();
    $("#sec3r").hide();
    $("#sec4r").hide();
    $("#sec5r").show();
  
  });

   var chart = new CanvasJS.Chart("chartContainer", {
        title: {
      text: "ADania"
    },
    data: [
    {
      type: "column",
      dataPoints: [
      { x: 10, y: xdata },
      { x: 20, y: 5 },
      { x: 30, y: 6 },
      { x: 40, y: 7 },
      { x: 50, y: 8 }
      ]
    }
    ]
  });

  chart.render();

});



function printContents(id)
{
    var contents = $("#"+id).html();

    if ($("#printDiv").length == 0)
    {
    var printDiv = null;
    printDiv = document.createElement('div');
    printDiv.setAttribute('id','printDiv');
    printDiv.setAttribute('class','printable');
    $(printDiv).appendTo('body');
    }

    $("#printDiv").html(contents);

    window.print();

    $("#printDiv").remove();


}




