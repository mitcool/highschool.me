<section class="row p-2">
    @foreach ($companies  as $company )
        <div class="col-md-2 col-sm-6">
            <img src="{{ asset('companies') }}/{{ $company->image }}"  
                 class="w-100" style="padding:14px;" alt="{{request()->segment(1) == 'de' ? $company->alt_de : $company->alt }}" 
                 title="{{request()->segment(1) == 'de' ? $company->title_de : $company->title }}"/>
        </div>
    @endforeach
</section>