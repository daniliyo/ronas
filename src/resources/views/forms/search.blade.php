
<h3 class="mb-4 pb-2 fw-normal">Check the weather forecast</h3>

        <form method="POST" action="{{ route('weather.index') }}">


        <div class="input-group rounded mb-3">
          <input name="location" type="text" class="form-control rounded" placeholder="City" aria-label="Search"
            aria-describedby="search-addon" />
          
            <input type="submit" class="input-group-text border-0 fw-bold" id="search-addon"
              value="Check!">
        
              
          
        </div>
        
        @csrf

        </form>


        


