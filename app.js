window.onload = () => {
	// Dossier à modifier
	let tiles = L.tileLayer("./italie/{z}/{x}/{y}.jpg", {
		minZoom: 0,
		maxZoom: 3,
		tms: true,
		noWrap: true,
		attribution: "leaflet-tiles",
	});

	let map = L.map("map", {
		center: [0, 0],
		// maxZoom & minZoom à changer en fonction
		maxZoom: 2,
		minZoom: 0,
		layers: [tiles],
	}).setView([0, 0], 1);

	// A changer en fonction de votre image
	let imgHeight = 1920;
	let imgWidth = 1080;
	// Les bordures sont peut-être à améliorer
	let southWest = map.unproject([0, imgHeight], map.getMaxZoom());
	let northEast = map.unproject([imgWidth, 0], map.getMaxZoom());

	map.setMaxBounds(new L.LatLngBounds(southWest, northEast));
};
