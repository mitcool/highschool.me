{{-- Cookie modal start --}}
<div class="modal fade" id="cookie_modal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="text-justify">
					{!! trans('modals.cookies-description') !!}
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button id="accept_cookies_btn" class="mr-5 p-2" type="button" style="width: initial; height:50px;">
					{{ trans('modals.cookies-accept-button') }}
				</button>  
				<button id="cookie_settings_btn" class="ml-5 p-2" type="button" style="width: initial; height:50px; ">
					{{ trans('modals.cookies-custom-button') }}
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
            <div>{!!trans('modals.settings-heading')!!}</div>
            <div class="row mt-3 mobile-text">
                <div class="col-md-4 mt-4">
                    <b>{!!trans('modals.required-cookies')!!}</b>
                    <div>
                        <div class="wrapper">
                            <span>{!! trans('modals.lang-conversion')!!}</span>
                            <label class="switch mt-3">
                                <input name="lang_conversion" type="checkbox" checked> 
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="settings-descr mt-2">{!!trans('modals.required-cookies-info')!!}</div>
                    </div> 
                </div>
                <div class="col-md-4 mt-4">
                    <b>{!!trans('modals.functional-cookies')!!}</b>
                    <div>
                        <div class="wrapper">
                            <span>{!!trans('modals.youtube')!!}</span>
                            <label class="switch mt-3">
                                <input name="youtube" type="checkbox" checked> 
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="settings-descr mt-2">
                    		{!!trans('modals.youtube-info')!!} 
                    	</div>
                    </div>
                   <div>
                        <div class="wrapper">
                            <span>{!!trans('modals.landbot')!!}</span>
                            <label class="switch mt-3">
                                <input name="landbot" type="checkbox" checked> 
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="settings-descr mt-2">
                        	{!!trans('modals.landbot-info')!!}
                    	</div>
                    </div>
                    <div>
                        <div class="wrapper">
                            <span>{{trans('modals.google-maps')}}</span>
                            <label class="switch mt-3">
                                <input name="google_maps" type="checkbox" checked> 
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="settings-descr mt-2">		           
                            {{trans('modals.google-maps-info')}}
                    	</div>
                    </div>
                </div>
                 <div class="col-md-4 mt-4">
                    <b>{!!trans('modals.tracking')!!}</b>
                    <div class="wrapper">
                        <span>{!!trans('modals.google-ads')!!}</span>
                        <label class="switch mt-3">
                            <input name="google_ads" type="checkbox" checked> 
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="wrapper">
                        <span>{!!trans('modals.facebook')!!}</span>
                        <label class="switch mt-3">
                            <input name="facebook" type="checkbox" checked> 
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="wrapper">
                        <span>{!!trans('modals.google-analitics')!!}</span>
                        <label class="switch mt-3">
                            <input name="google_analytics" type="checkbox" checked> 
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="settings-descr mt-2">    	
                    	{!!trans('modals.tracking-cookies-info')!!}
                	</div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="back_btn" class="mr-5 p-2" type="button">{!!trans('modals.back-to-description')!!}</button>  
            <button id="save_settings_btn" class="mx-5 p-2" type="button">{!!trans('modals.save-all')!!}</button> 
            <button id="accept_all_btn" class="ml-5 p-2" type="button">{!!trans('modals.accept-all')!!}</button> 
        </div>
      </div>
    </div>
</div> 

{{-- Share modal --}}
<div class="modal fade" id="share_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <x-image-component nickname="logo-header" class="logo-header-images" style="width: 150px;"/>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 50px; color:black; margin-bottom: 15px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-12">
                    <div class="d-flex icons justify-content-between">
                        <a rel="nofollow" class="share_social_icons fs-5 d-flex align-items-center justify-content-center" data-value='1'><i class="fab fa-facebook-f p-2"></i></a>
                        <a rel="nofollow" class="share_social_icons fs-5 d-flex align-items-center justify-content-center" data-value='2'><i class="fab fa-twitter p-2"></i></a>
                        <a rel="nofollow" class="share_social_icons fs-5 d-flex align-items-center justify-content-center" data-value='3'><i class="fab fa-linkedin-in p-2"></i></a>
                        <a rel="nofollow" class="share_social_icons fs-5 d-flex align-items-center justify-content-center" data-value='4'><i class="fab fa-instagram p-2"></i></a>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal" style="border-color: transparent !important; ">{!!trans('modals.dismiss')!!}</button>
                    &nbsp;
                    <a id="share_ok_button"  class="btn read-more btn btn-primary text-white btn-lg" style="background:#EE6123; border-color: transparent !important; margin-bottom:0 !important">{!!trans('modals.share')!!}</a>
                    <br>
                </div>
                <div class="col-12 d-flex justify-content-start" style="padding-top:10px;">
                    <p class="page-content">{{trans('modals.text-share-modal')}}</p>
                    
                </div>
                <div class="col-12 d-flex justify-content-start">
                    <div class="input-group mb-3">
                        <input id="receiver" type="text" class="copy-link-input" value=""  readonly>
                        <div>&nbsp;&nbsp;</div>
                        <div class="d-flex icons justify-content-between" style="margin-top: 0px; margin-bottom: 0px;">
                            <a onclick="copyLinkData()" href="#" class="share_social_icons fs-5 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; ">
                            <i class="far fa-copy p-2" style="font-size:20px;"></i></a>
                        </div>
                        
                    </div>
                </div>
            </div>      
      </div>
    </div>
  </div>
</div> 

{{--  Publishing modal --}}
<div class="modal fade p-0" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">{{trans('publishing.button-compare')}}</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:black">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead style="background:#F2F9FF">
                        <tr>
                            <th scope="col" >{{trans('modals.tabel-heading-one')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-one')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-two')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{trans('modals.tabel-row-one')}}</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>					
                        </tr>
                        <tr>
                            <td>{{trans('modals.tabel-row-two')}}</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>{{trans('modals.tabel-row-three')}}</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>{{trans('modals.tabel-row-four')}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{trans('modals.tabel-row-five')}}</td>
                            <td></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                    </tbody>
                    <thead style="background:#F2F9FF">
                        <tr>
                            <th scope="col" >{{trans('modals.tabel-heading-one')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-one')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-two')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Druck der Erstauflage und Folgeauflagen</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>					
                        </tr>
                        <tr>
                            <td>Erstellung eines professionelles Textlayouts</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Gestaltung eines individuellen Buchcovers</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                    </tbody>
                    <thead style="background:#F2F9FF">
                        <tr>
                            <th scope="col" >{{trans('modals.tabel-heading-three')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-one')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-two')}}</th>
                        </tr>
                    </thead>
                    <thead style="background:#F2F9FF">
                        <tr>
                            <th scope="col" >{{trans('modals.tabel-heading-four')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-one')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-two')}}</th>
                        </tr>
                    </thead>
                    <thead style="background:#F2F9FF">
                        <tr>
                            <th scope="col" >{{trans('modals.tabel-heading-five')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-one')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-two')}}</th>
                        </tr>
                    </thead>
                    <thead style="background:#F2F9FF">
                        <tr>
                            <th scope="col" >{{trans('modals.tabel-heading-six')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-one')}}</th>
                            <th scope="col">{{trans('modals.tabel-option-two')}}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
