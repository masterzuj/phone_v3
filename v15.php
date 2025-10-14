<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <style>
        body { margin: 0; overflow: hidden; background-color: #f0f0f0; }
        #container { position: absolute; width: 100%; height: 100%; }
        #iframeContainer {
            width: 470px;
            height: 820px;
            background-color: white; /* Optional */
        }
		#iframeContainer2 {
            width: 470px;
            height: 820px;
            background-color: white; /* Optional */
        }
		
		#iframeContainer, #iframeContainer2 {
			/* ... andere Styles ... */
			background-color: transparent;
			
		}
    </style>
	
		<script>
		console.log("phone");
	</script>
	
	
    <script type="importmap">
        {
            "imports": {
                "three": "./node_modules/three/build/three.module.js",
                "three/examples/jsm/renderers/CSS3DRenderer.js": "./node_modules/three/examples/jsm/renderers/CSS3DRenderer.js",
                "three/examples/jsm/loaders/GLTFLoader.js": "./node_modules/three/examples/jsm/loaders/GLTFLoader.js",
                "three/examples/jsm/controls/OrbitControls.js": "./node_modules/three/examples/jsm/controls/OrbitControls.js"
            }
        }
    </script>
</head>
<body>
	
	
    <div id="container"></div>
	
	<script>
		
		document.addEventListener('DOMContentLoaded', function() {
		  window.addEventListener('resize', function() {
			location.reload();
		  });
		});

	</script>
	
    <script type="module">
        import * as THREE from 'three';
        import { CSS3DRenderer, CSS3DObject } from 'three/examples/jsm/renderers/CSS3DRenderer.js';
        import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';
        import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';

        // Szene erstellen
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0xf0f0f0);

        // Kamera erstellen
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 5;

        // WebGLRenderer erstellen
        const renderer = new THREE.WebGLRenderer({ alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('container').appendChild(renderer.domElement);

        // CSS3DRenderer erstellen
        const css3dRenderer = new CSS3DRenderer();
        css3dRenderer.setSize(window.innerWidth, window.innerHeight);
        css3dRenderer.domElement.style.position = 'absolute';
        css3dRenderer.domElement.style.top = 0;
        document.getElementById('container').appendChild(css3dRenderer.domElement);
		
		//2
		
		const css3dRenderer2 = new CSS3DRenderer();
        css3dRenderer2.setSize(window.innerWidth, window.innerHeight);
        css3dRenderer2.domElement.style.position = 'absolute';
        css3dRenderer2.domElement.style.top = 0;
        document.getElementById('container').appendChild(css3dRenderer2.domElement);

        // Orbit Controls hinzufügen
        const controls = new OrbitControls(camera, css3dRenderer.domElement); // Verwende den CSS3DRenderer-DOM-Element
        controls.enableDamping = true; // Für sanftere Bewegungen
        controls.dampingFactor = 0.05;
        controls.screenSpacePanning = false; // Panning nur in der Ebene senkrecht zur Kamera
        controls.minDistance = 0.1;
        controls.maxDistance = 900;
		
		
		//2
		const controls2 = new OrbitControls(camera, css3dRenderer2.domElement); // Verwende den CSS3DRenderer-DOM-Element
        controls2.enableDamping = true; // Für sanftere Bewegungen
        controls2.dampingFactor = 0.05;
        controls2.screenSpacePanning = false; // Panning nur in der Ebene senkrecht zur Kamera
        controls2.minDistance = 0.1;
        controls2.maxDistance = 900;
		
		

        // GLTF Loader erstellen
        const gltfLoader = new GLTFLoader();

const textureLoader = new THREE.TextureLoader();

gltfLoader.load('./phone_v3_v2.glb', (gltf) => {
    const model = gltf.scene;
    scene.add(model);
    model.position.set(-262, -425, 0); // xyz
    model.scale.set(6.5, 5.7, 6);       // xyz

   
	
    textureLoader.load('./background/textur2.png', (texture) => {
        
		
        texture.wrapS = THREE.RepeatWrapping;
        texture.wrapT = THREE.RepeatWrapping;

       
		
        texture.repeat.set(10, 10); // Beispiel: Textur wird 2x kleiner (wiederholt sich 2x)

		
        console.log("Texture loaded successfully."); // Added for debugging

        // Durchlaufe alle Meshes im Modell, um das Material zu ändern
        model.traverse((child) => {
            if (child.isMesh && child.material) { // Wichtig: Die Bedingung für child.material.map !== undefined wurde entfernt
                console.log("Applying texture to mesh:", child.name); // Added for debugging
                const newMaterial = new THREE.MeshStandardMaterial({
                    map: texture, // Deine geladene Textur als Basisfarbe
                    transparent: true,
                    opacity: 0.8,
                });

                // Weisen das neue Material dem Mesh zu
                child.material = newMaterial;
                // Wichtig: Setze needsUpdate auf true, wenn du Materialeigenschaften änderst
                child.material.needsUpdate = true;
            }
        });
    },
    // Optional: Progress-Callback für die Texturladung
    undefined,
    // Optional: Error-Callback für die Texturladung
    (error) => {
        console.error('Ein Fehler beim Laden der Textur ist aufgetreten:', error);
    });
    // --- Ende: Textur laden und Material vorbereiten ---

}, undefined, (error) => {
    console.error('Ein Fehler beim Laden des GLB-Modells ist aufgetreten:', error);
});
		
		const ambientLight1 = new THREE.AmbientLight(0xffffff, 1.0); // white light, full intensity
		scene.add(ambientLight1);
		
		
		const directionalLight1 = new THREE.DirectionalLight(0xffffff, 1.0);
		directionalLight1.position.set(1, 1, 1).normalize(); // Position the light
		scene.add(directionalLight1);
		
		
        // Iframe-Element erstellen
        const iframe = document.createElement('iframe');
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.border = '0px';
        iframe.src = './just_phone_v2.php';
		
		//2
		const iframe2 = document.createElement('iframe');
        iframe2.style.width = '100%';
        iframe2.style.height = '100%';
        iframe2.style.border = '0px';
        iframe2.src = './werbung/werbung_v2.php';

        // Container für das Iframe erstellen
        const iframeContainer = document.createElement('div');
        iframeContainer.id = 'iframeContainer';
        iframeContainer.appendChild(iframe);
		
		//2
		
		const iframeContainer2 = document.createElement('div');
        iframeContainer2.id = 'iframeContainer2';
        iframeContainer2.appendChild(iframe2);
		

        // CSS3DObject für das Iframe erstellen
        const iframeObject = new CSS3DObject(iframeContainer);
        iframeObject.position.set(0, 0, 0); //xyz
        iframeObject.rotation.y = Math.PI*2;
        scene.add(iframeObject);
		
		
		//2
		
		const iframeObject2 = new CSS3DObject(iframeContainer2);
        iframeObject2.position.set(500, 0, 0);
        iframeObject2.rotation.y = Math.PI*2;
        scene.add(iframeObject2);

        // Licht hinzufügen
        const ambientLight = new THREE.AmbientLight(0x404040);
        scene.add(ambientLight);

		camera.position.z = 700; 
		
        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
        directionalLight.position.set(1, 1, 1).normalize();
        scene.add(directionalLight);

        // Event Listener für Fenstergrößenänderung
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
            css3dRenderer.setSize(window.innerWidth, window.innerHeight);
        }, false);

        // Animationsschleife
        function animate() {
            requestAnimationFrame(animate);

            controls.update(); // Wichtig für Orbit Controls
			controls2.update();

            renderer.render(scene, camera);
            //css3dRenderer.render(scene, camera);
			css3dRenderer2.render(scene, camera);
			
        }

        animate();
    </script>
</body>
</html>