@extends ('layouts.app')


@section ('content')
<div class="container col-10" id='div-margin-top'>
	<!-- carousel -->
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	  	<div class="carousel-inner">
	    	<div class="carousel-item active">
	      		<img class="d-block w-100" src="/image/pub.jpg" alt="First slide">
	    	</div>
		    <div class="carousel-item">
		      	<img class="d-block w-100" src="/image/table.jpg" alt="Second slide">
		    </div>
		    <div class="carousel-item">
		      	<img class="d-block w-100" src="/image/pub.jpg" alt="Third slide">
		    </div>
		</div>
	  	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
	  	</a>
	  	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
	  	</a>
	</div><!-- end carousel -->

	<!-- general card -->
	<div class="row mt-5">	
		<div class="col-sm-6">
			<div class="card">
  				<div class="card-body">
					<h3 class="card-title"><strong>{{$room->name}} de {{$place->name}}</strong></h3>
					<p class="card-text">{{$place->address}}, {{$place->city->zip_code}} {{$place->city->name}}</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
  				<div class="card-body">
					<a type="button" class="bubbly-button ml-3" href="/dessiner/{{$place->slug}}/{{$room->slug}}"><i class="fas fa-pencil-alt"></i>
						Dessiner votre plan de salle </a>
				</div>
			</div>
		</div>
	</div>

	<!-- tab -->
	<div class="row">
		<div class="tabs mt-5">
		  	<div class="tab-button-outer">
		    	<ul id="tab-button">
		      		<li><a href="#presentation">Présentation</a></li>
		      		<li><a href="#amenagement">Aménagement</a></li>
		    	</ul>
		  	</div>
		  	<div class="tab-select-outer">
		    	<select id="tab-select">
			      	<option value="#presentation">Présentation</option>
			      	<option value="#amenagement">Aménagement</option>
			      	<option value="#photos3">Photos</option>
			    </select>
		  	</div>

		 	<div id="presentation" class="tab-contents">
		    	<h4>{{$room->name}}</h4>
				<p class="product-description">{{$place->room->description}}</p>
		  	</div>
		  	<div id="amenagement" class="tab-contents">
				<h4>{{$room->name}}</h4>
	    		<p class="list-group-item-text"></p>
		        <div class="tab-content">
		            <div class="tab-pane active" id="home">
		              	<div class="table-responsive">
			                <table class="table table-hover">
			                  	<thead>
				                    <tr>
			                      		<th>#</th>
					                    <th>Surface en m²</th>
					                    <th>Capacité minimale assise</th>
					                    <th>Capacité maximale assise</th>
					                    <th>Capacité minimale debout</th>
					                    <th>Capacité maximale debout</th>
				                    </tr>
			                  	</thead>
			                  	<tbody id="items">
				                    <tr>
				                        <td>1</td>
				                        <td>{{$room->surface}}</td>
				                        <td>{{$room->min_capacity_seat}} personnes</td>
				                        <td>{{$room->max_capacity_seat}} personnes</td>
				                        <td>{{$room->min_capacity_stand}} personnes</td>
				                        <td>{{$room->max_capacity_stand}} personnes</td>
				                    </tr>
			                  	</tbody>
			                </table>
				    	</div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="{{ asset('js/app.js') }}" ></script>

<script>
$(window).scroll(function(){
    $('.navbar').css("opacity", 1 - $(window).
    scrollTop() / 200)
});
</script>
@endsection