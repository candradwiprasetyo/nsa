jQuery( function( $ ) {
	$( 'body' ).on( 'change', 'input.rwmb-star-rating', function() {

		var $this = $( this ),
			type = $this.attr( 'type' ),
			selected = $this.is( ':checked' ),
			$parent = $this.parent(),
			$others = $parent.siblings();

		if ( selected ) {

			if ( $parent.hasClass('rating1') ) {
				$others.removeClass( 'rwmb-active' );
			}

			if ( $parent.hasClass('rating2') ) {
				$others.removeClass( 'rwmb-active' );
				$parent.siblings('.rating1').addClass( 'rwmb-active' );
			}

			if ( $parent.hasClass('rating3') ) {
				$others.removeClass( 'rwmb-active' );
				$parent.siblings('.rating1').addClass( 'rwmb-active' );
				$parent.siblings('.rating2').addClass( 'rwmb-active' );
			}

			if ( $parent.hasClass('rating4') ) {

				$others.removeClass( 'rwmb-active' );
				$parent.siblings('.rating1').addClass( 'rwmb-active' );
				$parent.siblings('.rating2').addClass( 'rwmb-active' );
				$parent.siblings('.rating3').addClass( 'rwmb-active' );
			}

			if ( $parent.hasClass('rating5') ) {
				$others.removeClass( 'rwmb-active' );
				$parent.siblings('.rating1').addClass( 'rwmb-active' );
				$parent.siblings('.rating2').addClass( 'rwmb-active' );
				$parent.siblings('.rating3').addClass( 'rwmb-active' );
				$parent.siblings('.rating4').addClass( 'rwmb-active' );
			}

			$parent.addClass( 'rwmb-active' );

		} else {

			if ( $parent.hasClass('rating1') && $parent.hasClass('rwmb-active') ) {
				$others.removeClass( 'rwmb-active' );
			}

			if ( $parent.hasClass('rating2') && $parent.hasClass('rwmb-active') ) {
				$others.removeClass( 'rwmb-active' );
				$parent.siblings('.rating1').removeClass( 'rwmb-active' );
			}

			if ( $parent.hasClass('rating3') && $parent.hasClass('rwmb-active') ) {
				$others.removeClass( 'rwmb-active' );
				$parent.siblings('.rating1').removeClass( 'rwmb-active' );
				$parent.siblings('.rating2').removeClass( 'rwmb-active' );
			}

			if ( $parent.hasClass('rating4') && $parent.hasClass('rwmb-active') ) {
				$others.removeClass( 'rwmb-active' );
				$parent.siblings('.rating1').removeClass( 'rwmb-active' );
				$parent.siblings('.rating2').removeClass( 'rwmb-active' );
				$parent.siblings('.rating3').removeClass( 'rwmb-active' );
			}

			if ( $parent.hasClass('rating5') && $parent.hasClass('rwmb-active') ) {
				$others.removeClass( 'rwmb-active' );
				$parent.siblings('.rating1').removeClass( 'rwmb-active' );
				$parent.siblings('.rating2').removeClass( 'rwmb-active' );
				$parent.siblings('.rating3').removeClass( 'rwmb-active' );
				$parent.siblings('.rating4').removeClass( 'rwmb-active' );
			}

			$parent.removeClass( 'rwmb-active' );
		}
	});

	$( 'input.rwmb-star-rating' ).trigger( 'change' );

});