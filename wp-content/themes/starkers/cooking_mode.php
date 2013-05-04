<?php
/*
Template Name: Cooking Mode
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="disp" style="display:none;"><canvas id="comp"></canvas></div>
		<video id="video" autoplay width="300" style="display:none"></video>
		<canvas id="canvas" style="width:300px;display:none;"></canvas>
  <div class="container">
  	<div id="slides-header">
  		<div id="cook-title">
        	<h3>Pad Thai</h3>
            <div style="color:#f26659;font-style:italic;font-family:Times New Roman;font-size: 30px;margin-top: -13px;">Thai</div>
        </div>
        <div id="music-player">
        	<object type="application/x-shockwave-flash" data="<?php echo get_stylesheet_directory_uri(); ?>/dewplayer-multi.swf" width="280" height="20" id="dewplayer" name="dewplayer"> <param name="wmode" value="transparent" />
            <param name="movie" value="<?php echo get_stylesheet_directory_uri(); ?>/dewplayer-multi.swf" /> 
            <param name="flashvars" value="autostart=1&amp;autoreplay=1&amp;showtime=1&amp;randomplay=1&amp;xml=<?php echo get_stylesheet_directory_uri(); ?>/playlist.xml" /> 
            </object>
        </div>
    </div>
    <div id="slides">
      <div class="step-detail">
      	<h3>STEP 1</h3>
        <div class="picandwords">
        	<img class="step-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/noodles.png"></img>
            <p class="step-words">Place rice noodle in a large bowl and cover with several inches of room temperature water. Let it soak for 30-45 minutes . Drain. </p>
        </div>
      </div>
      <div class="step-detail">
      	<h3>STEP 2</h3>
        <div class="picandwords">
        	<img class="step-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/noodles.png"></img>
            <p class="step-words">Place rice noodle in a large bowl and cover with several inches of room temperature water. Let it soak for 30-45 minutes . Drain. </p>
        </div>
      </div>
      <div class="step-detail">
      	<h3>STEP 3</h3>
        <div class="picandwords">
        	<img class="step-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/noodles.png"></img>
            <p class="step-words">Place rice noodle in a large bowl and cover with several inches of room temperature water. Let it soak for 30-45 minutes . Drain. </p>
        </div>
      </div>
      <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left"></i></a>
      <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right"></i></a>
    </div>
  </div>
  <script>
  
  video=document.getElementById('video')
canvas=document.getElementById('canvas')
_=canvas.getContext('2d')
ccanvas=document.getElementById('comp')
c_=ccanvas.getContext('2d')
navigator.webkitGetUserMedia({audio:true,video:true},function(stream){
	s=stream
	video.src=window.webkitURL.createObjectURL(stream)
	video.addEventListener('play',
		function(){setInterval(dump,1000/25)}
	)
},function(){
	console.log('OOOOOOOH! DEEEEENIED!')
})
compression=5
width=height=0
function dump(){
	if(canvas.width!=video.videoWidth){
		width=Math.floor(video.videoWidth/compression)
		height=Math.floor(video.videoHeight/compression)
		canvas.width=ccanvas.width=width
		canvas.height=ccanvas.height=height
	}
	_.drawImage(video,width,0,-width,height)
	draw=_.getImageData(0,0,width,height)
	//c_.putImageData(draw,0,0)
	test()	
}
last=false
thresh=150
down=false
wasdown=false
function test(){
	delt=_.createImageData(width,height)
	if(last!==false){
		var totalx=0,totaly=0,totald=0,totaln=delt.width*delt.height
		,dscl=0
		,pix=totaln*4;while(pix-=4){
			var d=Math.abs(
				draw.data[pix]-last.data[pix]
			)+Math.abs(
				draw.data[pix+1]-last.data[pix+1]
			)+Math.abs(
				draw.data[pix+2]-last.data[pix+2]
			)
			if(d>thresh){
				delt.data[pix]=160
				delt.data[pix+1]=255
					delt.data[pix+2]=
				delt.data[pix+3]=255
				totald+=1
				totalx+=((pix/4)%width)
				totaly+=(Math.floor((pix/4)/delt.height))
			}
			else{
				delt.data[pix]=
					delt.data[pix+1]=
					delt.data[pix+2]=0
				delt.data[pix+3]=0
			}
		}
	}
	//slide.setAttribute('style','display:initial')
	//slide.value=(totalx/totald)/width
	if(totald){
		down={
			x:totalx/totald,
			y:totaly/totald,
			d:totald
		}
		handledown()
	}
	//console.log(totald)
	last=draw
	c_.putImageData(delt,0,0)
}
movethresh=2
brightthresh=300
overthresh=1000
function calibrate(){
	wasdown={
		x:down.x,
		y:down.y,
		d:down.d
	}
}
avg=0
state=0//States: 0 waiting for gesture, 1 waiting for next move after gesture, 2 waiting for gesture to end
function handledown(){
	avg=0.9*avg+0.1*down.d
	var davg=down.d-avg,good=davg>brightthresh
	//console.log(davg)
	switch(state){
		case 0:
			if(good){//Found a gesture, waiting for next move
				state=1
				calibrate()
			}
			break
		case 2://Wait for gesture to end
			if(!good){//Gesture ended
				state=0
			}
			break;
		case 1://Got next move, do something based on direction
			var dx=down.x-wasdown.x,dy=down.y-wasdown.y
			var dirx=Math.abs(dy)<Math.abs(dx)//(dx,dy) is on a bowtie
			//console.log(good,davg)
			if(dx<-movethresh&&dirx){
				//console.log('right')
				onRight();
			}
			else if(dx>movethresh&&dirx){
				//console.log('left')
				onLeft();
			}
			state=2
			break
	}
}

  	function onRight(){
		var e = jQuery.Event("click");
		jQuery(".slidesjs-next").trigger(e);
		}
	function onLeft(){
		var e = jQuery.Event("click");
		jQuery(".slidesjs-previous").trigger(e);
		}
    $(function() {
      $('#slides').slidesjs({
        width: 924,
        height: 640,
        navigation: false
      });
    });
  </script>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>