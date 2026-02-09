@extends('admin_template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/apexcharts.css') }}">
@endsection

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    

   <form action="{{ route('find-subscriber') }}" class="my-3">
      <div class="input-group mb-3">
        <input name="search" type="text" class="form-control" placeholder="Search subscriber" aria-label="Seacr" aria-describedby="basic-addon2" required>
        <div class="input-group-append">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
      </div>
    </form>
      @if(request()->route()->getName() == 'find-subscriber')
        <div class="text-right">
            <a href="{{ route('admin-newsletter-stats') }}">Clear search</a>
        </div>
      @endif
      <div class="row">
         <div class="col-md-6">
          <h3 class="text-center">List of active subcribers:</h3>
          @foreach($subscribers as $subscriber)
              <li class="list-group-item d-flex justify-content-between align-items-center">{{ $subscriber->name }} ({{ $subscriber->email }}) 
                <form action="{{ route('update-subscribtion', $subscriber->id) }}" class="d-inline" method="POST">
                  {{ csrf_field() }}
                  <button class="btn btn-secondary">Unubscribe</button>
                </form>
              </li>
          @endforeach
          <div>{{ $subscribers->links() }}</div>
      </div>
      <div class="col-md-6">
        <h3 class="text-center">List of unsubscribed users:</h3>
        @foreach($unsubscribed_users as $user)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $user->name }} ({{ $user->email }}) 
              <form action="{{ route('update-subscribtion', $user->id) }}" class="d-inline" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-warning">Subscribe</button>
              </form>
            </li>
        @endforeach
        <div>{{ $unsubscribed_users->links() }}</div>
    </div>
    <div class="col-md-12">
      <hr>
      <h2 class="text-center">Add subscriber</h2>
      <form action="{{ route('add-subscriber') }}" method="POST">
        {{ csrf_field() }}
        <input type="text" name="name" class="form-control my-2" required placeholder="Name">
        <input type="email" name="email" class="form-control my-2" required placeholder="Email">
        <select name="lang" id="" class="form-control my-2" required>
            <option value="0">German</option>
            <option value="1">English</option>
        </select>
        <div class="text-center">
          <button class="btn btn-success mx-auto">Add subscriber</button>
        </div>
      </form>
    </div>
      <div class="col-md-12">
          <h3>Statistics</h3>
      </div>
      <div class="col-md-6">
          <hr>
          <h6 class="font-weight-bold font-italic">All active and past subscribers</h6>
          <div id="chart" ></div>
      </div>
      <div class="col-md-6">
          <hr>
          <h6 class="font-weight-bold font-italic">Reasons to unsubscribe</h6>
          <div id="chart-reasons"></div>
      </div>
      </div>
 </div>
  
          
  
  
     
       
@endsection

@section('scripts')

<script src="{{ asset('js/apexcharts.js') }}"></script>
<script>

    //Left chart
    var subscribers_count = {{ $subscribers_count }};
    var unsubscribed_users_count =  {{ $unsubscribed_users_count }};
     var options = {
          series: [subscribers_count, unsubscribed_users_count],
          chart: {
          type: 'pie',
        },
        labels: ['Subscribers', 'Unsubscribed users'],
        legend: {
          show:true,
          position: 'bottom',
          floating: false,
          verticalAlign: 'bottom',
          align:'center',
          offsetY:10,
          height:35
        },
        plotOptions: {
            pie: {
                dataLabels: {
                offset: -10,
                }, 
            }
        },
        theme: {
            mode: 'light', 
            palette: 'palette6', 
            monochrome: {
                enabled: false,
                color: '#255aee',
                shadeTo: 'light',
                shadeIntensity: 0.65
            },
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            
          }
        }]
        };
        

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        //Right chart
        var unsubscribed_reasons =  @json($unsubscibe_reasons) ;
        var reasons = Object.keys(unsubscribed_reasons);
        var numbers_array = Object.values(unsubscribed_reasons);
        var numbers = [];
        for (const number  of numbers_array) {
            numbers.push(number.length);
        }
       
        var options_reasons = {
          series: [...numbers],
          chart: {
          type: 'pie',
        },
        labels: [...reasons],
        legend: {
            show:true,
          position: 'bottom',
          floating: false,
          verticalAlign: 'bottom',
          align:'center',
          offsetY:10,
          height:35
          
        },
        theme: {
            mode: 'light', 
            palette: 'palette6', 
            monochrome: {
                enabled: false,
                color: '#255aee',
                shadeTo: 'light',
                shadeIntensity: 0.65
            },
        },
        plotOptions: {
            pie: {
                dataLabels: {
                offset: -10,
                }, 
            }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom',
              floating: true
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart-reasons"), options_reasons);
        chart.render();
</script>

@endsection