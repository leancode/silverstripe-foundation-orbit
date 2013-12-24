<% if Slides.Exists %>
	<div class="slideshow-wrapper">
  	<div class="preloader"></div>
		<ul data-orbit>
			<% loop $Slides %>
  			<li>
					$SizedImage
    			<% if Title %>
						<div class="orbit-captiont">$Title.RAW</div>
					<% end_if %>
  			</li>
  		<% end_loop %>
		</ul>
	</div>
<% end_if %>