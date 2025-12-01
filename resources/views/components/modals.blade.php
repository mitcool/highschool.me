{{-- Cookie modal start --}}
<div class="modal fade" id="cookie_modal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="text-justify">
					By clicking on the button, you agree to the use of cookies described here by the platform universitaet.com. At this point you can also object to the use of cookies or revoke your consent. Cookies are used to analyze your use of our websites and to personalize our services. Web cookies from third-party providers also give you personalized advertising, even if you no longer access our website. The storage period for cookies is 90 days.
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button id="accept_cookies_btn" class="mr-5 p-2" type="button" style="width: initial; height:50px;">
					Accept and Continue
				</button>  
				<button id="cookie_settings_btn" class="ml-5 p-2" type="button" style="width: initial; height:50px; ">
					Cookie Settings
				</button> 
			</div>
		</div>
	</div>
</div>

{{--  Settings modal start --}}
 <div class="modal fade" id="settings_modal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          In order to provide various features on our website, better evaluate activities on our website, and always present to you suitable offers, we use cookies. Decide for yourself which cookies you would like to allow. By moving the respective cookie bar to blue and clicking on “Save settings“, you activate the corresponding cookie and agree that the cookie in question may be placed. You can reverse this on this page at any time.
            <div class="row mt-3 mobile-text">
                <div class="col-md-4 mt-4">
                    <b>Required Cookies</b>
                    <div>
                        <div class="wrapper">
                            <span>Language Conversion</span>
                            <label class="switch mt-3">
                                <input name="lang_conversion" type="checkbox" checked> 
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="settings-descr mt-2">To ensure that you can use our website in other languages as well.</div>
                    </div> 
                </div>
                <div class="col-md-4 mt-4">
                    <b>Functional Cookies</b>
                    <div>
                        <div class="wrapper">
                            <span>YouTube</span>
                            <label class="switch mt-3">
                                <input name="youtube" type="checkbox" checked> 
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="settings-descr mt-2">
                    		In order to show you videos on our portal, we use YouTube.
                    	</div>
                    </div>
                   <div>
                        <div class="wrapper">
                            <span>Landbot</span>
                            <label class="switch mt-3">
                                <input name="landbot" type="checkbox" checked> 
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="settings-descr mt-2">
                        	To improve the user experience, we make use of the tool Landbot.
                    	</div>
                    </div>
                    <div>
                        <div class="wrapper">
                            <span>Google Maps</span>
                            <label class="switch mt-3">
                                <input name="google_maps" type="checkbox" checked> 
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="settings-descr mt-2">		           
                            In order for us to display the locations of stakeholders appearing on our portal, we use Google Maps.
                    	</div>
                    </div>
                </div>
                 <div class="col-md-4 mt-4">
                    <b>Tracking & Marketing Cookies</b>
                    <div class="wrapper">
                        <span>Google Ads</span>
                        <label class="switch mt-3">
                            <input name="google_ads" type="checkbox" checked> 
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="wrapper">
                        <span>Facebook</span>
                        <label class="switch mt-3">
                            <input name="facebook" type="checkbox" checked> 
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="wrapper">
                        <span>Google Analytics</span>
                        <label class="switch mt-3">
                            <input name="google_analytics" type="checkbox" checked> 
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="settings-descr mt-2">    	
                    	Anonymized data relating to the use of the website is analyzed in order to further improve the offer on the website.
                	</div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="back_btn" class="mr-5 p-2" type="button">Back To Description</button>  
            <button id="save_settings_btn" class="mx-5 p-2" type="button">Save Custom Settings</button> 
            <button id="accept_all_btn" class="ml-5 p-2" type="button">Accept All Cookies</button> 
        </div>
      </div>
    </div>
</div> 


