/*
 * HOMEFRONT ONLINE GAME CLIENT
 * (c) 2015 - Homefront Online. All rights reserved.
 * Developed by Brunno Pleffken Hosti
 *
 * ../libraries/Economy.js
 */

$(document).ready(function() {
	"use strict";

	planetRender("planet-preview", "hoth.png");
});

/*
 * --------------------------------------------------------------------
 * RENDER 3D PLANET USING WEBGL
 * --------------------------------------------------------------------
 */
function planetRender(_containerId, _textureName) {

	// THIS IS THE PLANET! :)
	var sphere;

	// Create scene and camera
	var scene = new THREE.Scene();
	var camera = new THREE.PerspectiveCamera(75, 1, 0.1, 1000);

	// Initialize WebGL renderer
	var renderer = new THREE.WebGLRenderer({ alpha: true });
	renderer.setSize(250, 250);
	document.getElementById(_containerId).appendChild(renderer.domElement);

	// Load texture and create sphere (a.k.a. planet)
	var loader = new THREE.TextureLoader();
	loader.load("assets/textures/" + _textureName, function(texture) {
		var geometry = new THREE.SphereGeometry(1, 30, 30);
		var material = new THREE.MeshPhongMaterial({ map: texture });

		sphere = new THREE.Mesh(geometry, material);
		sphere.overdraw = true;
		scene.add(sphere);
	});

	// Add subtle ambient lighting
	var ambientLight = new THREE.AmbientLight(0x000000);
	scene.add(ambientLight);

	// Directional lighting
	var directionalLight = new THREE.DirectionalLight(0xffffff);
	directionalLight.position.set(2, 1, 1).normalize();
	scene.add(directionalLight);

	// Define camera distance (Z-axis)
	camera.position.z = 1.7;

	// Render and animate
	var render = function() {
		requestAnimationFrame(render);
		sphere.rotation.y -= 0.001;
		renderer.render(scene, camera);
	};

	// Run!
	render();

}
