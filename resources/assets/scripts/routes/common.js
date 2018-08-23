export default {
  init() {
    // JavaScript to be fired on all pages
    jQuery(document).ready(function($) {
			$('#productTabs a').click(function(e){
				e.preventDefault();
				$(this).tab('show');
			})
		});
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
