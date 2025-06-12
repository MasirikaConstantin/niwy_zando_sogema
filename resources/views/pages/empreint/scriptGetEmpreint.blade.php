<script>
    // const imageEmpreintGif = document.getElementById('imageEmpreintGif');
    // const successLoard = document.getElementById('successLoard');
    // document.getElementById('captureEmpreint').addEventListener('click', function(e){
    //     imageEmpreintGif.style.display = 'block';
    //     setTimeout(() => {
    //         imageEmpreintGif.style.display = 'none';
    //         successLoard.style.display = 'block';
    //         // successLoard
    //         setTimeout(function() {
    //             successLoard.style.display = 'none'; // Appel d'une autre fonction ici
    //         }, 4000);
    //     }, "5000");
    // });

    var myDoigt = '';
    document.getElementById('ModalFingerprintGetImages').addEventListener('click', function(e){
        var ws_protocol = 'ws';
        var ws_hostname = '127.0.0.1';
        var ws_port     = '8888';
        var ws_endpoint = '';

        openWSConnection(ws_protocol, ws_hostname, ws_port, ws_endpoint);

        // document.getElementById('doigt').addEventListener('click', function(e){
            
        // });
    });

    //-------------------------- FUNCTIONS

    /**
     * Event handler for clicking on button "Disconnect"
     */
    function onDisconnectClick() {
        webSocket.close();
    }

    /**
     * Open a new WebSocket connection using the given parameters
     */
    function openWSConnection(protocol, hostname, port, endpoint) {
        var webSocketURL = protocol + "://" + hostname + ":" + port + endpoint;
        console.log("openWSConnection::Connecting to: " + webSocketURL);
        
        try {
            webSocket = new WebSocket(webSocketURL);
            
            webSocket.onopen = function(openEvent) {
                console.log("WebSocket OPEN: " + JSON.stringify(openEvent, null, 4));
            };

            webSocket.onclose = function(closeEvent) {
                console.log("WebSocket CLOSE: " + JSON.stringify(closeEvent, null, 4));
            };

            webSocket.onerror = function(errorEvent) {
                console.log("WebSocket ERROR: " + JSON.stringify(errorEvent, null, 4));
            };

            webSocket.onmessage = function(messageEvent) {
                var wsMsg = messageEvent.data;
                //console.log("WebSocket MESSAGE: " + wsMsg);
                
                switch(wsMsg.substring(0,2)) {
                    case 'Fp':
                        //console.log("Fp_-");
                        //-- si success Finger
                        var LongFP = parseInt(wsMsg.length),
                            FP = wsMsg.substring(2, LongFP);
                        //var CEAN_id = $('#CEAN_PERSONNE').val().trim(),
                            //doigt = $('#doigt_').val().trim(),
                            //operation = $('#operation').val().trim();
                           // envoie_template_svr(FP, CEAN_id, doigt, operation); //-- envoie echantillon vers le serveur
                        //demarrerProcessCaptureAuthenticiteFingerprint(CEAN);
                        //console.log("Fp_: " + FP);
                        sendEmpreintInput(FP, myDoigt);
                        //console.log('doit caputuré_ '+ myDoigt);
                    break;

                    case 'Fs':
                        //-- si reception de l'empreinte pour l'identification
                        var LongFP = parseInt(wsMsg.length),
                            FP = wsMsg.substring(2, LongFP);
                        //envoie_template_svr_pour_identification(FP); //-- envoyer FP vers serveur pour l'identification
                        console.log("Fs_--");
                    break;

                    case 'Em':
                        console.log("Em");
                        //-- si comparaison fini (Verification)
                        var response = wsMsg.trim();
                        var v_attribut_class = (response === 'Empreintes digitales verifié') ? 'alert alert-success' : 'alert alert-danger';
                        //$('#FingerMessage').removeAttr('class').addClass(v_attribut_class);
                        //$('.FingerReponse').text(response);
                        //$('#FingerMessage').show();
                        
                    break;

                    case 'En':
                        console.log("En debut");
                        //-- si debut de la capture d'empreinte
                        $('.FingerReponse').text('Debut de l\'enrolement, Verifiez dans la barre des taches!!!');
                        //$('#FingerMessage').show();
                    break;

                    case 'Ve':
                        console.log("Ve");
                        //-- si debut de la verification
                        $('.FingerReponse').text('Debut de la verification, Verifiez dans la barre des taches!!!');
                        //$('#FingerMessage').show();
                    break;

                    case 'Id':
                        console.log("Id");
                        //-- si debut de l'identifcation
                    $('.FingerReponseId').text('Debut de l\'Identification, Verifiez dans la barre des taches!!!');
                    //$('#FingerMessageId').show();
                    break;

                    case 'CE':
                        console.log("CE");
                        //-- si correspondance FP trouvée
                        var LongCEAN = parseInt(wsMsg.length) - 4,
                            CEAN_PERSONNE = wsMsg.substring(4, LongFP);
                        //$('#CEAN').val(cean_ben); //-- affiche CEAN
                    break;

                    default:
                        // handle other cases
                    break;
                }
            };
        } catch (exception) {
            console.error(exception);
        }
    }

    
    $('#resultatFingerprint').delegate('.capturer', 'click', function(event) {
        //alert('c bon')
        var doigt=$(this).attr('id'); //-- recupere le nom du doigt à capturer
            //$('#doigt_').val(doigt);
        myDoigt = doigt;
        //console.log('my Doigt '+ doigt);

            

        if (webSocket.readyState != WebSocket.OPEN) {
            //alert("Clique");
            //alert(webSocket.readyState);
            return false;
            console.error("webSocket is not open: " + webSocket.readyState);
            return;
        }

        /**
         * display design 
         */
        //$('#FingerMessage').removeAttr('class');
        //$('#FingerMessage').addClass('alert alert-warning');
        var msg_send = 'ENROLLMENT';
        webSocket.send(msg_send);
    });


    /**
     * Function to send template to the server for registration
     */
    function envoie_template_svr(empreinte, CEAN_id, doigt, operation) {
        $.ajax({
            url: "",
            type: 'POST',
            async: false,
            data: {
                'EnregistrerFingerprint': 1,
                'CEAN': CEAN,
                'FP': template_client,
                'doigt': doigt,
                'operation': operation
            },
            success: function(a) {
                $('#FingerMessage').removeAttr('class').addClass('alert alert-success');
                $('.FingerReponse').text(a);
                $('#FingerMessage').show();
            }
        });
        console.log('empreint' +empreinte);
        console.log('id' +CEAN_id);
        console.log('doit' +doigt);
        console.log('operation' +operation);
    }

    function sendEmpreintInput(empreinte, doigt) {
        console.log("emp__ "+empreinte)
        console.log("doigt__ "+doigt)

        if(doigt == "doigt_droite1"){
            document.getElementById('doigt_droite1_input').value = empreinte;
            document.getElementById('doigt_droite1').style.color = "#1572e8";
           // 
        }
        if(doigt == "doigt_droite2"){
            document.getElementById('doigt_droite2_input').value = empreinte;
            document.getElementById('doigt_droite2').style.color = "#1572e8";
        }
        if(doigt == "doigt_droite3"){
            document.getElementById('doigt_droite3_input').value = empreinte;
            document.getElementById('doigt_droite3').style.color = "#1572e8";
        }
        if(doigt == "doigt_droite4"){
            document.getElementById('doigt_droite4_input').value = empreinte;
            document.getElementById('doigt_droite4').style.color = "#1572e8";
        }
        if(doigt == "doigt_droite5"){
            document.getElementById('doigt_droite5_input').value = empreinte;
            document.getElementById('doigt_droite5').style.color = "#1572e8";
        }

        if(doigt == "doigt_gauche1"){
            document.getElementById('doigt_gauche1_input').value = empreinte;
            document.getElementById('doigt_gauche1').style.color = "#1572e8";
        }
        if(doigt == "doigt_gauche2"){
            document.getElementById('doigt_gauche2_input').value = empreinte;
            document.getElementById('doigt_gauche2').style.color = "#1572e8";
        }
        if(doigt == "doigt_gauche3"){
            document.getElementById('doigt_gauche3_input').value = empreinte;
            document.getElementById('doigt_gauche3').style.color = "#1572e8";
        }
        if(doigt == "doigt_gauche4"){
            document.getElementById('doigt_gauche4_input').value = empreinte;
            document.getElementById('doigt_gauche4').style.color = "#1572e8";
        }
        if(doigt == "doigt_gauche5"){
            document.getElementById('doigt_gauche5_input').value = empreinte;
            document.getElementById('doigt_gauche5').style.color = "#1572e8";
        }
    }
    
</script>