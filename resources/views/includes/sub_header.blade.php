@php
    $properties = App\Models\Property::where('status',0)->get();
@endphp

<div class="col-md-8">
    <div class="top-opt">
        <select name="property_filter" id="property_filter" onchange="graph_filter()">
               <option value="" selected disabled>Properties</option>
            @foreach ($properties as $property)
               <option value="{{ $property->id }}">{{ $property->property_name }}</option>
            @endforeach
        </select> 
        <div class="setting-top">
            <ul class="togg-btn">
                <li><i class="fas fa-cog"></i></li>
                <ul class="togg-drop">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="javascript:;" onclick="document.getElementById('logout').submit();">Log Out</a>
                        <form action="{{ route('logout') }}" id="logout" method="post">@csrf</form>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</div>