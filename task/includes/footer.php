<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="tooltipster/dist/js/tooltipster.bundle.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/app.js"></script>

<script>

// loader
var _loading_spinner=setInterval(function(){if(document.readyState=='complete'){
var $page_loading = document.getElementById('page_loading'),
		$body = document.body || document.getElementsByTagName('body')[0],
		speed = 500, delay = 3000;
if((typeof $page_loading != 'undefined') && ($page_loading != null)){
	setTimeout(function(){
		var transition = 'opacity ' + speed.toString() + 'ms ease',
				removeCssClass = function(obj, className){
					obj.className = obj.className.replace(className, '').replace('  ', ' ');
				};
		['-webkit-transition','-moz-transition','transition'].forEach(function(prefix){
			$page_loading.style[prefix] = transition;
		});
		$page_loading.style['opacity'] = '0';
		$page_loading.style['filter']  = 'alpha(opacity=0)';
		removeCssClass($body, 'noscroll');
		setTimeout(function(){
			$page_loading.parentNode.removeChild($page_loading);
		}, speed + 10);
	}, delay);
}
clearInterval(_loading_spinner);
}},10);

// fiter type buttons
$('.widget-filter_item').on ('click', function(){
    var sel = $(this).data('num');
    $('div[name="task_box"] label').hide();

    if (sel != "5"){
       $('div[name="task_box"] label[data-custom-type="'+sel+'"]').show();
			 console.log(sel)
    }
    else {
        $('div[name="task_box"] label').show();
    }
});

</script>

</body>
</html>
