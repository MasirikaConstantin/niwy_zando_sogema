class FingerprintScanner {
    constructor() {
        this.sdk = new Fingerprint.WebApi();
        this.currentImage = null;
        this.rawData = null;
        this.readerId = null;
        this.currentFinger = null;
        this.capturedFingers = {};
        this.initSDK();
        this.bindEvents();
    }

    initSDK() {
        this.sdk.onDeviceConnected = (e) => {
            this.updateStatus("Scanner prêt - Sélectionnez un doigt", 'info');
        };

        this.sdk.onDeviceDisconnected = (e) => {
            this.updateStatus("Scanner déconnecté", 'danger');
        };

        this.sdk.onSamplesAcquired = (sample) => {
            this.handleSample(sample);
        };

        this.sdk.onQualityReported = (quality) => {
            this.updateQuality(quality.quality);
        };
    }

    bindEvents() {
        // Finger selection
        document.querySelectorAll('.finger-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                this.selectFinger(btn.dataset.finger, btn);
            });
        });

        // Start capture
        document.getElementById('start-btn').addEventListener('click', () => {
            if (!this.currentFinger) {
                this.updateStatus("Veuillez sélectionner un doigt", 'warning');
                return;
            }
            this.startCapture();
        });

        // Save fingerprint
        document.getElementById('save-btn').addEventListener('click', () => {
            this.saveFingerprint();
        });

        // Reset
        document.getElementById('reset-btn').addEventListener('click', () => {
            this.resetCapture();
        });
    }

    selectFinger(finger, button) {
        // Reset all buttons
        document.querySelectorAll('.finger-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        // Set active button
        button.classList.add('active');
        
        this.currentFinger = finger;
        document.getElementById('current-finger').textContent = this.getFingerName(finger);
        this.updateStatus(`Prêt à capturer: ${this.getFingerName(finger)}`, 'info');
        
        // If already captured, show the image
        if (this.capturedFingers[finger]) {
            document.getElementById('image-container').style.display = 'block';
            document.getElementById('fingerprint-image').src = this.capturedFingers[finger].image;
            document.getElementById('save-btn').disabled = false;
        } else {
            document.getElementById('image-container').style.display = 'none';
            document.getElementById('save-btn').disabled = true;
        }
    }

    async startCapture() {
        try {
            const readers = await this.sdk.enumerateDevices();
            if (readers.length === 0) {
                throw new Error("Aucun lecteur d'empreintes détecté");
            }

            this.readerId = readers[0];
            await this.sdk.startAcquisition(Fingerprint.SampleFormat.PngImage, this.readerId);
            
            this.updateStatus(`Capture en cours pour ${this.getFingerName(this.currentFinger)}...`, 'warning');
            
        } catch (error) {
            console.error("Erreur de capture:", error);
            this.updateStatus(`Erreur: ${error.message}`, 'danger');
        }
    }

    handleSample(sample) {
        const samples = JSON.parse(sample.samples);
        const imageData = `data:image/png;base64,${Fingerprint.b64UrlTo64(samples[0])}`;
        
        this.currentImage = imageData;
        this.rawData = samples[0];
        
        const imgElement = document.getElementById('fingerprint-image');
        imgElement.src = imageData;
        document.getElementById('image-container').style.display = 'block';
        
        document.getElementById('save-btn').disabled = false;
        
        this.updateStatus(`Empreinte capturée pour ${this.getFingerName(this.currentFinger)}`, 'success');
    }

    updateQuality(qualityCode) {
        const quality = Fingerprint.QualityCode[qualityCode];
        const qualityPercent = Math.min(qualityCode * 10, 100);
        
        const qualityBar = document.getElementById('quality-bar');
        qualityBar.style.width = `${qualityPercent}%`;
        qualityBar.textContent = `${qualityPercent}%`;
        document.getElementById('quality-text').textContent = `Qualité: ${quality}`;
        
        if (qualityCode < 3) {
            qualityBar.className = "progress-bar bg-danger";
        } else if (qualityCode < 7) {
            qualityBar.className = "progress-bar bg-warning";
        } else {
            qualityBar.className = "progress-bar bg-success";
        }
    }

    async saveFingerprint() {
        if (!this.currentImage || !this.rawData || !this.currentFinger) {
            this.updateStatus("Aucune empreinte à enregistrer", 'danger');
            return;
        }

        try {
            document.getElementById('save-btn').disabled = true;
            document.getElementById('save-btn').innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Enregistrement...';

            const formData = new FormData();
            formData.append('finger', this.currentFinger);
            formData.append('image_data', this.currentImage);
            formData.append('raw_data', this.rawData);
            formData.append('vendeur_id', vendeurId);
            formData.append('_token', csrfToken);

            const response = await fetch(saveUrl, {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (response.ok) {
                // Store locally
                this.capturedFingers[this.currentFinger] = {
                    image: this.currentImage,
                    saved: true
                };

                this.updateStatus(`Empreinte ${this.getFingerName(this.currentFinger)} enregistrée!`, 'success');
                this.updateProgress();

                // If all fingers captured, redirect
                if (Object.keys(this.capturedFingers).length === 10) {
                    setTimeout(() => {
                        window.location.href = redirectUrl;
                    }, 2000);
                }
            } else {
                throw new Error(result.message || "Erreur lors de l'enregistrement");
            }
        } catch (error) {
            console.error("Erreur:", error);
            this.updateStatus(`Erreur: ${error.message}`, 'danger');
        } finally {
            document.getElementById('save-btn').disabled = false;
            document.getElementById('save-btn').innerHTML = '<i class="fas fa-save me-2"></i> Enregistrer';
        }
    }

    resetCapture() {
        this.currentImage = null;
        this.rawData = null;
        document.getElementById('image-container').style.display = 'none';
        document.getElementById('save-btn').disabled = true;
        this.updateStatus("Prêt à scanner", 'info');
    }

    updateStatus(message, type) {
        const statusEl = document.getElementById('scanner-status');
        statusEl.textContent = message;
        statusEl.className = `alert alert-${type}`;
    }

    updateProgress() {
        const count = Object.keys(this.capturedFingers).length;
        const progress = (count / 10) * 100;
        
        document.getElementById('global-progress').style.width = `${progress}%`;
        document.getElementById('progress-text').textContent = `${count}/10 doigts enregistrés`;
    }

    getFingerName(field) {
        const names = {
            'doigt_droite1': 'Pouce droit',
            'doigt_droite2': 'Index droit',
            'doigt_droite3': 'Majeur droit',
            'doigt_droite4': 'Annulaire droit',
            'doigt_droite5': 'Auriculaire droit',
            'doigt_gauche1': 'Pouce gauche',
            'doigt_gauche2': 'Index gauche',
            'doigt_gauche3': 'Majeur gauche',
            'doigt_gauche4': 'Annulaire gauche',
            'doigt_gauche5': 'Auriculaire gauche'
        };
        return names[field] || field;
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.fingerprintScanner = new FingerprintScanner();
});