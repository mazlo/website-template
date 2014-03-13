<!doctype html>
<html lang='de'>
<head>
    <meta charset='UTF-8'>
    <title>TTC Benrath 1983 e.V.</title>

    <link rel='stylesheet' type='text/css' href='{{ url( "ttc_style.css" ) }}' />
	<link rel='stylesheet' type='text/css' href='{{ url( "jquery-ui.css" ) }}' }} />
	
	<!--[if IE]> <link rel='stylesheet' type='text/css' href='ttc_style_ie.css' /> <![endif] -->
	<script type='text/javascript' src='{{ url( "jquery-1.8.2.js" ) }}'></script>
	<script type='text/javascript' src='{{ url( "jquery-ui-1.9.2.custom.js" ) }}'></script>

	<script type='text/javascript'>
		<!-- this is to prevent conflicts with prototype and jquerytools -->
		$jQ = jQuery.noConflict();
	</script>
</head>

<body>

<div class='wrapper'>

	@include( 'header' )

	<div id='content' style=''>

		<ul>
			<li><a href='#index'>Home</a></li>
			<li><a href='#about'>About Us</a></li>
			<li><a href='#training'>Practise Hours</a></li>
			<li><a href='#contact'>Contact</a></li>
			<li><a href='#season'>Regular Season</a></li>
			<li><a href='#impressum'>Disclaimer</a></li>
		</ul>

		<div id='index'>
			@include( 'index' )
		</div>

		<div id='about'>
			@include( 'about' )
		</div>

		<div id='training'>
			@include( 'training' )
		</div>

		<div id='contact'>
			@include( 'contact' )
		</div>

		<div id='season'>
			@include( 'season' )
		</div>

		<div id='impressum'>
			@include( 'impressum' )
		</div>

	</div> {{--  end content --}}

	<div id='footer'>
		@include( 'footer' )
	</div>

</div> {{-- end wrapper --}}

<script type='text/javascript'>

	$jQ( function()
	{
		// global variable to store all tab indices by name
		tabIndexMap = {};
		tabIndexMap[ 'home' ] = 0;
		tabIndexMap[ 'about' ] = 1;
		tabIndexMap[ 'training' ] = 2;
		tabIndexMap[ 'contact' ] = 3;
		tabIndexMap[ 'season' ] = 4;
		tabIndexMap[ 'impressum' ] = 5;
		
		// create the tabs
		$jQ( '#content' ).tabs(
		{
			activate: function( event, ui )
			{
				// after activation -> deselect the tab
				$jQ( ui.newTab ).find( 'a' ).blur();
			}
		});

		// the 6th tab is hidden -> there is content for the impressum
		$jQ( '#content ul li:eq('+ 5 +')' ).hide();
	});
	


	// handle event click on a link
	$jQ( '.tabChange' ).click( function()
	{
		var tabName = $jQ( this ).attr( 'href' );

		// should return false -> a href is not taken seriously
		return changeTab( tabName );
	});

	// changes the tab by name
	var changeTab = function ( tabName ) 
	{
		// looks up the tab index from array
		$jQ( '#content' ).tabs( 'select', tabIndexMap[ tabName ] );

		// return false -> a href is not taken seriously
		return false;
	}

	$jQ( document ).on( 'click', '.contactDialog', function()
	{
		var member = $jQ( this ).attr( 'contact' );

		// get content via ajax
		$jQ.ajax(
		{
			url: '{{ url("contact/form") }}',
			data: { to: member },

			success: function( data )
			{
				$jQ( '#contactDialog' ).html( data );
			}
		});

		// open dialog
		$jQ( '#contactDialog' ).dialog(
		{
			title: 'Contact us!',
			width: 700,
			height: 520,
			modal: true,
			buttons: 
			{
				'Anfrage senden': function()
				{
					// get user input
					var subject = $jQ( '#ssubject' ).val();
					var email = $jQ( '#semail' ).val();
					var text = $jQ( '#stext' ).val();

					// replace single line breaks with html breaks
					text = text.replace( /\r?\n/g, '<br />' );

					// send ajax request to controller
					$jQ.ajax(
					{
						url: '{{ url("contact/form") }}',
						type: 'post',
						data: 
						{ 
							to: member, 
							sbj: subject, 
							eml: email, 
							txt: text 
						},

						success: function()
						{
							alert( 'Thank you!' );
						}
					});

					// always close the dialog after sending
					$jQ( this ).dialog( 'close' );

				},
				'Abbrechen': function()
				{
					$jQ( this ).dialog( 'close' );
				}
			}
		});
	});

</script>

</body>

</html>
