let $map = document.querySelector('#map')

class LeafletMap {

	constructor() {
		this.map = null
		this.bounds = []
	}
	/**
	* load map on one item
	* @param {HTMLElement} element
	*/
	async load (element) {
		return new Promise((resolve, reject)=>{
			$script('https://unpkg.com/leaflet@1.3.4/dist/leaflet.js', () => {
				this.map = L.map(element, {scrollWheelZoom: false})
				/*.setView([47.824905, 2.618787], 8)*/
				
				L.tileLayer('//{s}.tile.osm.org/{z}/{x}/{y}.png', {
				    attribution: 'donn&eacute;es &copy; <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
				    maxZoom: 12,
				}).addTo(this.map);
				/*
				this.map.addLayer(new L.StamenTileLayer('watercolor', {
					//enable to change color
					detectRetina: true
				}))*/
				resolve()
			})
		})
	}	

	addMarker(lat, lng, text) {
		let point = [lat, lng]
		this.bounds.push(point)
		return new LeafletMarker(point, this.map)
		
	}
	
	center () {
		this.map.fitBounds(this.bounds)
	}
}

class LeafletMarker {
	constructor (point, map){
		this.marker = L.marker({
			
		})
		.setLatLng(point)
		.addTo(map)
	}

	setActive() {
		this.marker.getElement().classList.add('is-active')
	}

	unsetActive() {
		this.marker.getElement().classList.remove('is-active')
	}

	addEventListener (event, cb){
		this.marker.addEventListener('add', () => {
			this.marker.getElement().addEventListener(event, cb)
		})
	}

}


const initMap = async function() {
	let map = new LeafletMap()
	let hoverMarker = null
	await map.load($map)
	Array.from(document.querySelectorAll('.js-marker')).forEach((item) => {
		let marker = map.addMarker(item.dataset.lat, item.dataset.lng)
			item.addEventListener('mouseover', function(){
				if(hoverMarker !== null) {
					hoverMarker.unsetActive()
				}
				marker.setActive()
				hoverMarker = marker
			})
			item.addEventListener('mouseleave', function() {
				if(hoverMarker !== null) {
					hoverMarker.unsetActive()
				}
			})
		})
	map.center()
}


if ($map !== null) {
	initMap()
}		

