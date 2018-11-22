<h3>Settings</h3>


    <div class="row">
        <nav class="col-sm-3 col-4" id="myScrollspy">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    @for($i = 0; $i < 20; $i++)
                    <a class="nav-link active" href="#section{{ $i }}">Section {{ $i }}</a>
                    @endfor
                </li>
            </ul>
        </nav>

        <div class="col-sm-9 col-8" data-spy='scroll' data-target='#myScrollspy' data-offset='1' style="overflow:auto; max-height:800px;">

            @for($i = 0; $i < 20; $i++)
            <div id="section{{ $i }}"> 
                <h1>Section {{ $i }}</h1>
                <p>Try to scroll this page and look at the menu while scrolling!</p>
            </div>
            @endfor
        </div>
    </div>
