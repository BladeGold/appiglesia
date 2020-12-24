@extends('layouts.app')
@section('content')
    


    

    <!-- Bootstrap CSS -->
    
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style2.css"  /> 
    <!-- Responsive CSS -->
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




    
    



    <!-- Start Banner -->
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row center">
                <div style="width: 85%">
                <div class="pogoSlider" id="js-main-slider" >
                    <div class="pogoSlider-slide" style="background-image:url(img/carrusel/banner_principal.png); backgroud-size:50% 50%">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text white_fonts">
                                        
                                        <br>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" style="background-image:url(img/carrusel/opcion1.jpg); background-size:100% 90%" >
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text white_fonts">
                                        
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .pogoSlider -->
            </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    <div class="section">
        <hr color="gray" size="10" width="88%">
    </div
	<!-- section -->
    <div class="section">
        <div class="container">
            <div class="row" style="background-image: url('img/banners/banner_fondo.png'); background-size: cover; box-shadow:10px -10px #e90808ce">
                <div class="col-md-6">
                    <div class="full text_align_center_img" style="margin-top: 150px">
                        <img src="img/logo iglesia.png" alt="#"  height="450px" class=""/>
                    </div>
                </div>
                <div class="col-md-6 layout_padding" >
                    <div class="full paddding_left_15">
                        <div class="heading_main text_align_left" style="margin-top: 150px;">
						   <h2 style="font-size:60px"><span class="theme_color">Bienvenido</span> a     {{ config('app.name') }}</h2>	
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    
    <div class="section">
        <hr color="gray" size="10" width="88%">
    </div>

    <!-- section -->
    <div class="section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                           <h2><span class="theme_color"></span> {{ config('app.name')}}</h2>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row center">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="full services_blog">
                       <img class="img-responsive" src="img/banners/banner_s1.png" alt="#" />
                       <h4> <a href="#"/> ¿Quienes Somos?</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="full services_blog">
                        <img class="img-responsive" src="img/banners/banner_s2.png" alt="#" />
                        <h4> <a href="#"/> Nuestra Historia</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="full services_blog">
                        <img class="img-responsive" src="img/banners/banner_s3.png" alt="#" />
                        <h4> <a href="#"/> Contáctanos</h4>
                    </div>
                </div>
               
            </div>
            
        </div>
    </div>
    <!-- end section -->
    <div class="section">
        <hr color="gray" size="10" width="88%">
    </div>
	
	<!-- section -->
    <div class="section layout_padding padding_top_0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                           <h2><span class="theme_color"></span>Noticias</h2>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row center">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="full news_blog">
                       <img class="img-responsive" src="imgprofile/default.png" alt="#" />
                       <div class="overlay"><a class="main_bt transparent" href="#">Ver</a></div>
                       <div class="blog_details">
                         <h3>No posee Noticias</h3>
                         </div>
                    </div>
                </div>
               
             </div>
        </div>
    </div>
    <!-- end section -->
    
  
    

    

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

   
    <!-- ALL PLUGINS -->
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery.pogo-slider.min.js')}}"></script>
    <script src="{{asset('js/slider-index.js')}}"></script>
    <script src="{{asset('js/smoothscroll.js')}}"></script>
    <script src="{{asset('js/form-validator.min.js')}}"></script>
    <script src="{{asset('js/contact-form-script.js')}}"></script>
    <script src="{{asset('js/isotope.min.js')}}"></script>
    <script src="{{asset('js/images-loded.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
	<script>
	/* counter js */

(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
	</script>


@endsection