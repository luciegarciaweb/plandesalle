
var map = document.querySelector('#map-regions')

var paths = map.querySelectorAll('.map-reg-img a')

var links = map.querySelectorAll('.map-reg-list a')

//Polyfill du foreach
if (NodeList.prototype.forEach === undefined) {
	Noldelist.prototype.forEach = function (callback) {
		[].forEach.call(this. callback)
	}
}

var activeArea = function (id) {

	map.querySelectorAll('.is-active').forEach(function(item){

			item.classList.remove('is-active')

	})

	if(id !== undefined) {
		document.querySelector('#list-' + id).classList.add('is-active')

		document.querySelector('#region-' + id).classList.add('is-active')
	}
}

paths.forEach(function (path) {

	path.addEventListener('mouseenter', function(e){

		var id = this.id.replace('region-','')

		activeArea(id)

	})
})

links.forEach(function (link) {

	link.addEventListener('mouseenter', function(){

		var id = this.id.replace('list-','')

		activeArea(id)

	})
})

map.addEventListener('mouseover', function(){
	activeArea()
})

