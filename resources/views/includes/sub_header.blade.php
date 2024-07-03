<div class="col-md-8">
    <div class="top-opt">
        <select name="" id="">
            <option value="">Property</option>
        </select>
        <select name="" id="">
            <option value="">Portfolio</option>
        </select>
        <select name="" id="">
            <option value="">View As</option>
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