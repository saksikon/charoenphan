<div class="slide" id="slide">
    <div id="object1">
        <img src="img_upload/slide/object1.png" class="img-responsive" />
    </div>
    <div id="object2">
        <img src="img_upload/slide/object2.png" class="img-responsive"/>
    </div>
    <div id="object3">
        <img src="img_upload/slide/object3.png" class="img-responsive"/>
    </div>

</div>

<script>

    var object1=$('#object1');
    var object2=$('#object2');
    var object3=$('#object3');
    
    var layer = document;

    $(layer).mousemove(function(e){ 
        var valueX=(e.pageX * -1 / 12); 
        var valueY=(e.pageY * -1 / 30); 
        
        object1.css({
            'transform':'translate3d('+valueX+'px,'+valueY+'px,0) rotate(0deg)'
        });
    });
    
    $(layer).mousemove(function(e){ 
        var valueX=(e.pageX * -1 / 1000); 
        var valueY=(e.pageY * -1 / 20); 
        
        object2.css({
            'transform':'translate3d('+valueX+'px,'+valueY+'px,0)'
        });
    });
    
    $(layer).mousemove(function(e){ 
        var valueX=(e.pageX * -1 / 30); 
        var valueY=(e.pageY * -1 / 15); 
        
        object3.css({
            'transform':'translate3d('+valueX+'px,'+valueY+'px,0) rotate(0deg)'
        });
    });
</script>