jQuery.noConflict();

(function( $ ) {
	$(function() {



		$('.seops_check_file_lists').click(function() {
			$('.seops_permission_folders').slideToggle('fast');
		});


		var total_pages = $('.seops_domain_list').attr('data-total');
		if( typeof total_pages !== 'undefined' && parseInt(total_pages) > 1 )
		{
			$('.seops_domain_list_paginate').twbsPagination({
				totalPages: total_pages,
				visiblePages: 5,
				next: '&raquo;',
				prev: '&laquo;',
				paginationClass: 'seops_paginate',
				onPageClick: function (event, page) {
					$('.seops_domain_list table').hide().eq(page-1).show();
				}
			});
		}

	});
})(jQuery);
