<section class="row section"  style="padding-top:20px; background-color:#E9580C;padding-bottom:30px;" id="contact-section">
    <div class="col-md-8 offset-md-2">
        <div>
            <div style="padding:2rem 1rem" class="text-white text-center">
                <h2 class="section-headings text-white">Sign up for updates</h2>  
            </div>
            <form action="{{ route('contact') }}" method="POST" id="free-fact-form" class="text-white">
                {{ csrf_field() }}
                <label class="ohnohoney" for="name"></label>
                <input class="ohnohoney" autocomplete="off" type="text" id="user_name" name="name" placeholder="{{trans('modals.cookies-accept-button')}}">
                <label class="ohnohoney" for="email"></label>
                <input class="ohnohoney" autocomplete="off" type="text" id="user_email" name="address" placeholder="{{trans('modals.cookies-accept-button')}}">
                <input type="hidden" name="age">
                <div class="row">
                    <div class="col-md-12">
                        {{-- <div  class="row p-3"> 
                            <div class="col-md">
                                <input type="radio" value="Ms." id="free-fact-female" name="gender" required> <label for="free-fact-female">{{ trans('welcome.contact-form-woman-option') }}</label> 
                                <input type="radio" value="Mr." id="free-fact-male" name="gender"> <label for="free-fact-male">{{ trans('welcome.contact-form-man-option') }}</label> 
                            </div>
                        </div> --}}
                        <div class="row px-3">
                            <div class="col-md-12 p-3">
                                <label for="free-fact-firstname">{{ trans('welcome.contact-form-first-name') }}</label>
                                <input  value="{{ old('firstname') }}" type="text" class="form-control @error('firstname') is-invalid @enderror"  required name="firstname" id="free-fact-firstname">
                                    @error('firstname') <span class="validation-error">{{ $errors->first('firstname') }}</span> @enderror
                            </div>
                          
                        </div>
                        <div class="row px-3">
                            <div class="col-md-12 p-3">
                                <label for="free-fact-email">{{ trans('welcome.contact-form-email') }}</label>
                                <input id="free-fact-email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"  required name="email" />
                                    @error('email') <span class="validation-error">{{ $errors->first('email') }}</span> @enderror
                            </div>
                      
                       
                            <div class="col-md-12">
                              <label for="free-fact-email">Message</label>
                                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                                   </div>
								
                            </div>
                        <div class="row p-3">
                            <div class="col-md">
                               <div class="d-flex w-100">  
								   <div><input name="checkbox_one" value="on" type="checkbox" required  /></div>
								   <div class="requestInformationMainPage"> &nbsp;{!! trans('welcome.contact-form-checkbox-one') !!}</div> 
								</div>
                               </div>
                        </div>
                    </div>
                    
                        
                    </div>
                    <div class="input-group mt-2 mb-3">
                    
                        @if(config('services.recaptcha.key'))
                            <div class="g-recaptcha"
                            data-sitekey="{{config('services.recaptcha.key')}}" style="margin: 0 auto;">
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12 text-center">
                        
                        <button class="btn" style="background-color:#025297;color:white;margin:30px;padding-left:30px;padding-right:30px;">Send</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</section>
