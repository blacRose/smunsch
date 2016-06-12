var jq = document.createElement('script');
jq.src = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js';
document.querySelector('head').appendChild(jq);

jq.onload = procede;

function procede()
{
	$link = true;
	$( '.check' ).click( function( ) {
		if ( $link ) {
			$link = false;
			$( this ).html('My title <em>links to</em> the post.');
			$( '.visible' ).each(function( ) {
				$( this ).removeClass( 'visible' );
			})
		} else {
			$link = true;
			$( this ).html('My title <em>shows</em> the post.');
		}
	})
	$( '.post' ).click( function( ) {
		if ( $link ) {
			event.preventDefault();
			if ( !$( this ).hasClass( 'visible' ) ) {
				$( this ).addClass('visible');
			} else {
				$( this ).removeClass( 'visible' );
			}
		}
	});
	var post = document.getElementById('postlist');
	for(var i = 0, bll = post.childNodes.length; i < bll; i++) {
	  post.insertBefore(post.childNodes[i], post.firstChild);
	}
}
