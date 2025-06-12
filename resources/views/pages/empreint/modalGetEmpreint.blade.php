<!-- Capture fingerprint -->
{{-- <div class="modal fade" id="ModalFingerprint" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2682C4; color:#fff; background-image: url(../../multimedias/pictures/background_two.svg);">
                <i style="font-size:14px;">Enrôlement et vérification empreinte</i>
                <span class="fa fa-window-close pull-right ferme" style="cursor:pointer; color:white;" title="Fermer" onClick="CloseCaptureFingerprint()"></span>
            </div>
            
            <div class="modal-body">
                <br>
                <!-- Bloc fingerprint -->

                <div style="display:none;" id="FingerMessage" class="alert alert-warning">
                    <span class="fa fa-fingerprint"></span>
                    <span style="margin-left:15px; font-family: calibri; font-size: 14px;" class="FingerReponse"></span>
                    <span class="fa fa-close pull-right" style="color:#ffffff; cursor: pointer" onClick="FermerMessageFinger();"></span>
                </div>

                <br>

                <div id="resultatFingerprint" class="col-sm-12 text-center">
                    <!-- Résultat de la recherche -->
                    <!-- End résultat de la recherche -->
                </div>
                <!-- End bloc fingerprint -->
            </div>
        </div>
    </div>
</div> --}}
<!-- End capture fingerprint -->

<div class="modal custom-modal fade" id="ModalFingerprint" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2682C4; color:#fff;">
                <i style="font-size:14px;">Enrôlement et vérification empreinte</i>
                <span class="fa fa-window-close pull-right ferme" style="cursor:pointer; color:white;" title="Fermer" href="javascript:void(0);" data-dismiss="modal"></span>
            </div>

            <div class="modal-body">
                <div class="form-header text-center">
                    <span style="margin-left:15px; font-family: calibri; font-size: 14px;" class="FingerReponse bg-warning"></span>
                </div>
                <br />
                {{-- {{ route('article.store') }} --}}
                <div class="modal-btn delete-action">
                    <div id="resultatFingerprint" class="row justify-content-center text-center">
                        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                            <div>
                                <span class="fas fa-fingerprint capturer" id="doigt_gauche1" title="Cliquez pour Enroler" style="font-size: 25px; cursor: pointer;"></span>
                                <span class="fas fa-fingerprint capturer" id="doigt_gauche2" title="Cliquez pour Enroler" style="font-size: 25px; cursor: pointer;"></span>
                                <span class="fas fa-fingerprint capturer" id="doigt_gauche3" title="Cliquez pour Enroler" style="font-size: 25px; cursor: pointer;"></span>
                                <span class="fas fa-fingerprint capturer" id="doigt_gauche4" title="Cliquez pour Enroler" style="font-size: 25px; cursor: pointer;"></span>
                                <span class="fas fa-fingerprint capturer" id="doigt_gauche5" title="Cliquez pour Enroler" style="font-size: 25px; cursor: pointer;"></span>
                            </div>
                            <!-- ../../multimedias/pictures/hand_gauche.jpg -->
                            <img src="{{asset('assets/img/hand_gauche.jpg')}}" title="Main Droite" class="imgM">
                        </div>
                        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                            <div>
                                <span class="fas fa-fingerprint capturer" id="doigt_droite1" title="Cliquez pour Enroler" style="font-size: 25px; cursor: pointer;"></span>
                                <span class="fas fa-fingerprint capturer" id="doigt_droite2" title="Cliquez pour Enroler" style="font-size: 25px; cursor: pointer;"></span>
                                <span class="fas fa-fingerprint capturer" id="doigt_droite3" title="Cliquez pour Enroler" style="font-size: 25px; cursor: pointer;"></span>
                                <span class="fas fa-fingerprint capturer" id="doigt_droite4" title="Cliquez pour Enroler" style="font-size: 25px; cursor: pointer;"></span>
                                <span class="fas fa-fingerprint capturer" id="doigt_droite5" title="Cliquez pour Enroler" style="font-size: 25px; cursor: pointer;"></span>
                            </div>
                            <img src="{{asset('assets/img/hand_droite.jpg')}}" title="Main Gauche" class="imgM">
                        </div>
                    </div>

                    {{-- <div class="row">
                        <input type="hidden" id="operation" value="0" /> <br />
                        <!-- id du vendeur -->
                        <input type="hidden" id="CEAN_PERSONNE" value="" /> <br />
                        <div class="col-sm-12">
                            <input type="text" name="doigt_droite1_input" id="doigt_droite1_input" class="form-control" placeholder="doigt_droite1" />
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="doigt_droite2_input" id="doigt_droite2_input" class="form-control" placeholder="doigt_droite2" />
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="doigt_droite3_input" id="doigt_droite3_input" class="form-control" placeholder="doigt_droite3" />
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="doigt_droite4_input" id="doigt_droite4_input" class="form-control" placeholder="doigt_droite4" />
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="doigt_droite5_input" id="doigt_droite5_input" class="form-control" placeholder="doigt_droite5" />
                        </div>

                        <div class="col-sm-12">
                            <input type="text" name="doigt_gauche1_input" id="doigt_gauche1_input" class="form-control" placeholder="doigt_gauche1" />
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="doigt_gauche2_input" id="doigt_gauche2_input" class="form-control" placeholder="doigt_gauche2" />
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="doigt_gauche3_input" id="doigt_gauche3_input" class="form-control" placeholder="doigt_gauche3" />
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="doigt_gauche4_input" id="doigt_gauche4_input" class="form-control" placeholder="doigt_gauche4" />
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="doigt_gauche5_input" id="doigt_gauche5_input" class="form-control" placeholder="doigt_gauche5" />
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
