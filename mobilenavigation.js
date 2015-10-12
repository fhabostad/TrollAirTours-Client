  function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }    
    
    
  function toggle_visibilitydual(id,id2) {
       var e = document.getElementById(id);
       var f = document.getElementById(id2);
       e.style.display = 'none';
       f.style.display = 'block';
  }   
  
  function showmenuopen() {
       var e = document.getElementById('opennav');
       var f = document.getElementById('closenav');
       if(e.style.display == 'none')
          e.style.display = 'block';
          f.style.display = 'none';
       
    }    
    
     function imagebig(image) {
       var e = document.getElementById('overlay');
       document.getElementById("imgoverlay").src=image;
       e.style.display = 'block';
       
    }     
     function closeimg() {
       var e = document.getElementById('overlay'); 
       e.style.display = 'none';
       
    }
    
    function toggle_visibilityQuad(id,id2,id3,id4) {
       var e = document.getElementById(id);
       var f = document.getElementById(id2);
       var g = document.getElementById(id3);
       var h = document.getElementById(id4);
       var bg = document.getElementById("main-top");
       e.style.display = 'block';
       f.style.display = 'none';
       g.style.display = 'none';
       h.style.display = 'none';
       if(id == 'briksdalen-info')
        
          document.getElementById('main-top').style.backgroundImage = "url('style/briksdalen.png')";
        //  document.getElementById('briksdalen-marked').style.borderTop = "2px solid greenyellow";

       if(id == 'geiranger-info')
          document.getElementById('main-top').style.backgroundImage = "url('style/geiranger5.png')";
     // document.getElementById('geiranger-marked').style.borderTop = "2px solid greenyellow";
       if(id == 'Aakneset-info')
          document.getElementById('main-top').style.backgroundImage = "url('style/bolgen.png')";
        //  document.getElementById('Aakneset-marked').style.borderTop = "2px solid greenyellow";
       if(id == 'egendefinert-info')
          document.getElementById('main-top').style.backgroundImage = "url('style/geiranger.png')";
     // document.getElementById('egendefinert-marked').style.borderTop = "2px solid greenyellow";
  
             
         
  }   
