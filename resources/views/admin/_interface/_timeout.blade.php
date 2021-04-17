                                <div id="idle-timeout-dialog" data-backdrop="static" class="modal opacity-0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Votre session va expirer</h4>
                                                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <i class="fa fa-warning font-red"></i> Votre session sera fermée dans <span id="idle-timeout-counter"></span> secondes.</p>
                                                <p> Souhaitez-vous rester connecté ? </p>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button id="idle-timeout-dialog-keepalive" type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" data-dismiss="modal">Oui, je bosse moi !</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

