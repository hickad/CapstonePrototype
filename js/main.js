     //
     // The magic code to add show/hide custom event triggers
     //
    (function ($) {
      $.each(['show', 'hide'], function (i, ev) {
        var el = $.fn[ev];
        $.fn[ev] = function () {
          this.trigger(ev);
          return el.apply(this, arguments);
        };
      });
     })(jQuery);
     
     
	//
	// Formats the number to US currency.
	//
	function toDollarAmount(value)
	{
		return '$' + parseFloat(value, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
	}

	
	//
	// Input spinner functionality
	//
	(function ($) {
	  $('.spinner .btn:first-of-type').on('click', function() {
		$('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
	  });
	  $('.spinner .btn:last-of-type').on('click', function() {
		$('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
	  });
	})(jQuery);
	
	
	 function createDropDown(id, items)
	 {	 
		 for(var i=0; i<items.length; i++)
		 {
			$("#"+id).append("<option value='"+i+"'>" + items[i] + "</option>");
		 }
	 }
	 