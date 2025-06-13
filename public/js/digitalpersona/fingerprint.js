class FingerprintScanner {
    constructor(saveUrl, csrfToken) {
        this.sdk = new Fingerprint.WebApi();
        this.currentImage = null;
        this.rawData = null;
        this.readerId = null;
        this.saveUrl = saveUrl;
        this.csrfToken = csrfToken;
        this.initSDK();
        this.bindEvents();
    }

    initSDK() {
        this.sdk.onDeviceConnected = (e) => {
            document.getElementById('scanner-status').textContent = "Scanner prêt - Placez votre doigt";
            document.getElementById('scanner-status').className = "bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded";
        };

        this.sdk.onDeviceDisconnected = (e) => {
            document.getElementById('scanner-status').textContent = "Scanner déconnecté";
            document.getElementById('scanner-status').className = "bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded";
        };

        this.sdk.onSamplesAcquired = (sample) => {
            this.handleSample(sample);
        };

        this.sdk.onQualityReported = (quality) => {
            this.updateQuality(quality.quality);
        };
    }

    bindEvents() {
        document.getElementById('start-btn').addEventListener('click', () => this.startCapture());
        document.getElementById('save-btn').addEventListener('click', () => this.saveFingerprint());
    }

    async startCapture() {
        try {
            const readers = await this.sdk.enumerateDevices();
            if (readers.length === 0) {
                throw new Error("Aucun lecteur d'empreintes détecté");
            }

            this.readerId = readers[0];
            await this.sdk.startAcquisition(Fingerprint.SampleFormat.PngImage, this.readerId);
            
            document.getElementById('scanner-status').textContent = "Capture en cours...";
            document.getElementById('scanner-status').className = "bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded";
            
        } catch (error) {
            console.error("Erreur de capture:", error);
            document.getElementById('scanner-status').textContent = `Erreur: ${error.message}`;
            document.getElementById('scanner-status').className = "bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded";
        }
    }

    handleSample(sample) {
        const samples = JSON.parse(sample.samples);
        const imageData = `data:image/png;base64,${Fingerprint.b64UrlTo64(samples[0])}`;
        
        this.currentImage = imageData;
        this.rawData = samples[0]; // Stocker les données brutes
        
        const imgElement = document.getElementById('fingerprint-image');
        imgElement.src = imageData;
        document.getElementById('image-container').style.display = 'block';
        
        document.getElementById('save-btn').disabled = false;
        
        document.getElementById('scanner-status').textContent = "Empreinte capturée avec succès";
        document.getElementById('scanner-status').className = "bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded";
    }

    updateQuality(qualityCode) {
        const quality = Fingerprint.QualityCode[qualityCode];
        const qualityPercent = Math.min(qualityCode * 10, 100);
        
        document.getElementById('quality-bar').style.width = `${qualityPercent}%`;
        document.getElementById('quality-text').textContent = `Qualité: ${quality} (${qualityPercent}%)`;
        
        const qualityBar = document.getElementById('quality-bar');
        if (qualityCode < 3) {
            qualityBar.className = "h-full bg-red-500 transition-all duration-300";
        } else if (qualityCode < 7) {
            qualityBar.className = "h-full bg-yellow-500 transition-all duration-300";
        } else {
            qualityBar.className = "h-full bg-green-500 transition-all duration-300";
        }
    }

    async saveFingerprint() {
        if (!this.currentImage || !this.rawData) {
            document.getElementById('scanner-status').textContent = "Aucune empreinte à enregistrer";
            document.getElementById('scanner-status').className = "bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded";
            return;
        }

        try {
            document.getElementById('save-btn').disabled = true;
            document.getElementById('save-btn').textContent = "Enregistrement...";

            const response = await fetch(this.saveUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify({
                    image_data: this.currentImage,
                    raw_data: this.rawData,
                    format: 'png'
                })
            });

            const result = await response.json();

            if (response.ok) {
                document.getElementById('scanner-status').textContent = "Empreinte enregistrée avec succès!";
                document.getElementById('scanner-status').className = "bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded";
                setTimeout(() => {
                    window.location.href = result.redirect_url || '/fingerprints';
                }, 2000);
            } else {
                throw new Error(result.message || "Erreur lors de l'enregistrement");
            }
        } catch (error) {
            console.error("Erreur:", error);
            document.getElementById('scanner-status').textContent = `Erreur: ${error.message}`;
            document.getElementById('scanner-status').className = "bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded";
            
            document.getElementById('save-btn').disabled = false;
            document.getElementById('save-btn').textContent = "Enregistrer";
        }
    }
}

// Initialisation avec les paramètres
document.addEventListener('DOMContentLoaded', () => {
    if (typeof saveUrl !== 'undefined' && typeof csrfToken !== 'undefined') {
        window.fingerprintScanner = new FingerprintScanner(saveUrl, csrfToken);
    } else {
        console.error('Variables saveUrl ou csrfToken non définies');
    }
});