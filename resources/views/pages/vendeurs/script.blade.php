<script>
    //Capture 1
    const video = document.getElementById('video');
	const canvas = document.getElementById('canvas');
	const context = canvas.getContext('2d');
	const imageInput = document.getElementById('image_data');
    const printImage = document.getElementById('printImage');
    const demarrageCamera = document.getElementById('demarrageCamera');
    const capturePhoto = document.getElementById('capturePhoto');

    demarrageCamera.addEventListener('click', function() {
        // Demander l'accès à la webcam
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            video.srcObject = stream;
            //camptureImage.style.display = 'none';
        })
        .catch(function(err) {
            console.log("Erreur d'accès à la caméra: " + err);
            alert("Erreur d'accès à la caméra: " + err);
        });
        //console.log('salut');
    });	

    // Capture de l'image lorsque l'utilisateur clique sur le bouton
    capturePhoto.addEventListener('click', function() {
        // validerImage.innerHTML = "En cours...";
        // validerImage.setAttribute("disabled", true);

        context.drawImage(video, 0, 0, 640, 480);
        const imageData = canvas.toDataURL('image/png');
        printImage.src = imageData;
        imageInput.value = imageData; // On stocke l'image dans un champ caché pour l'envoyer via le formulaire

        // validerImage.innerHTML = "Valider";
        // validerImage.removeAttribute("disabled");
    });

    const getPhotoMyPc = document.getElementById('getPhotoMyPc');
    // customLabel.addEventListener('click', function() {
    //     getPhotoMyPc.click();  // Simuler un clic sur l'input de type file
    // });

    // Événement lorsque l'utilisateur sélectionne un fichier
    getPhotoMyPc.addEventListener('change', function(event) {
        const file = event.target.files[0];

        // Vérifier si un fichier est sélectionné et s'il s'agit bien d'une image
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            // Charger l'image sélectionnée dans l'élément <img>
            reader.onload = function(e) {
                printImage.src = e.target.result; // Mettre à jour l'URL de l'image
                //printImage.style.display = 'block'; // Afficher l'image
            }

            // Lire l'image comme URL de données
            reader.readAsDataURL(file);
        }
        console.log('get Image');
    });

        //Capture 2
    const video2 = document.getElementById('video2');
	const canvas2 = document.getElementById('canvas');
	const context2 = canvas2.getContext('2d');
	const imageInput2 = document.getElementById('image_data2');
    const printImage2 = document.getElementById('printImage2');
    const demarrageCamera2 = document.getElementById('demarrageCamera2');
    const capturePhoto2 = document.getElementById('capturePhoto2');

    demarrageCamera2.addEventListener('click', function() {
        // Demander l'accès à la webcam
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            video2.srcObject = stream;
            //camptureImage.style.display = 'none';
        })
        .catch(function(err) {
            console.log("Erreur d'accès à la caméra: " + err);
            alert("Erreur d'accès à la caméra: " + err);
        });
        //console.log('salut');
    });	

    // Capture de l'image lorsque l'utilisateur clique sur le bouton
    capturePhoto2.addEventListener('click', function() {
        // validerImage.innerHTML = "En cours...";
        // validerImage.setAttribute("disabled", true);

        context2.drawImage(video, 0, 0, 640, 480);
        const imageData2 = canvas2.toDataURL('image/png');
        printImage2.src = imageData2;
        imageInput2.value = imageData2; // On stocke l'image dans un champ caché pour l'envoyer via le formulaire

        // validerImage.innerHTML = "Valider";
        // validerImage.removeAttribute("disabled");
    });

    const getPhotoMyPc2 = document.getElementById('getPhotoMyPc2');
    // customLabel2.addEventListener('click', function() {
    //     getPhotoMyPc2.click();  // Simuler un clic sur l'input de type file
    // });

    // Événement lorsque l'utilisateur sélectionne un fichier
    getPhotoMyPc2.addEventListener('change', function(event) {
        const file = event.target.files[0];

        // Vérifier si un fichier est sélectionné et s'il s'agit bien d'une image
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            // Charger l'image sélectionnée dans l'élément <img>
            reader.onload = function(e) {
                printImage2.src = e.target.result; // Mettre à jour l'URL de l'image
                //printImage.style.display = 'block'; // Afficher l'image
            }

            // Lire l'image comme URL de données
            reader.readAsDataURL(file);
        }
        console.log('get Image');
    });

    //Capture 3
    const video3 = document.getElementById('video3');
	const canvas3 = document.getElementById('canvas');
	const context3 = canvas2.getContext('2d');
	const imageInput3= document.getElementById('image_data3');
    const printImage3 = document.getElementById('printImage3');
    const demarrageCamera3 = document.getElementById('demarrageCamera3');
    const capturePhoto3 = document.getElementById('capturePhoto3');

    demarrageCamera3.addEventListener('click', function() {
        // Demander l'accès à la webcam
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            video3.srcObject = stream;
            //camptureImage.style.display = 'none';
        })
        .catch(function(err) {
            console.log("Erreur d'accès à la caméra: " + err);
            alert("Erreur d'accès à la caméra: " + err);
        });
        //console.log('salut');
    });	

    // Capture de l'image lorsque l'utilisateur clique sur le bouton
    capturePhoto3.addEventListener('click', function() {
        // validerImage.innerHTML = "En cours...";
        // validerImage.setAttribute("disabled", true);

        context3.drawImage(video, 0, 0, 640, 480);
        const imageData3 = canvas3.toDataURL('image/png');
        printImage3.src = imageData3;
        imageInput3.value = imageData3; // On stocke l'image dans un champ caché pour l'envoyer via le formulaire

        // validerImage.innerHTML = "Valider";
        // validerImage.removeAttribute("disabled");
    });

    const getPhotoMyPc3 = document.getElementById('getPhotoMyPc3');
    // customLabel2.addEventListener('click', function() {
    //     getPhotoMyPc2.click();  // Simuler un clic sur l'input de type file
    // });

    // Événement lorsque l'utilisateur sélectionne un fichier
    getPhotoMyPc3.addEventListener('change', function(event) {
        const file = event.target.files[0];

        // Vérifier si un fichier est sélectionné et s'il s'agit bien d'une image
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            // Charger l'image sélectionnée dans l'élément <img>
            reader.onload = function(e) {
                printImage3.src = e.target.result; // Mettre à jour l'URL de l'image
                //printImage.style.display = 'block'; // Afficher l'image
            }

            // Lire l'image comme URL de données
            reader.readAsDataURL(file);
        }
        console.log('get Image');
    });
</script>