var jq = document.createElement('script');
jq.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js";
document.querySelector('head').appendChild(jq);

jq.onload = procede;

function procede()
{
	$( '.post' ).click( function( ){
		if ( !$( this ).hasClass( "visible" ) ) {
			$( this ).addClass("visible");
		} else {
			$( this ).removeClass( "visible" );
		}
	});
	var post = document.getElementById('postlist');
	for(var i = 0, bll = post.childNodes.length; i < bll; i++) {
	  post.insertBefore(post.childNodes[i], post.firstChild);
	}
}
