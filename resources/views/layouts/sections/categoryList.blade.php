<div class="full-width bg-white">
    <div class="contain">
        <div class="border-1"></div>
        <div class="head-nav">  
            <ul class="abc">
                <li @if(Route::current()->getName() == 'food') class="active" @endif ><a href="https://lyzz.hcbspro.com/food" style="cursor: pointer!important;">FOOD</a></li>
                <li @if(Route::current()->getName() == 'blog.life') class="active" @endif ><a href="https://lyzz.hcbspro.com/life" style="cursor: pointer!important;">LIFE</a></li>
                <li @if(Route::current()->getName() == 'blog.love') class="active" @endif ><a href="https://lyzz.hcbspro.com/love" style="cursor: pointer!important;">LOVE</a></li>
                <li @if(Route::current()->getName() == 'blog.travel') class="active" @endif ><a href="https://lyzz.hcbspro.com/travel" style="cursor: pointer!important;">TRAVEL</a></li>
                <li @if(Route::current()->getName() == 'blog.wellness') class="active" @endif ><a href="https://lyzz.hcbspro.com/wellness" style="cursor: pointer!important;">WELLNESS</a></li>
                <li @if(Route::current()->getName() == 'blog.silverlinings') class="active" @endif ><a href="https://lyzz.hcbspro.com/silver-linings" style="cursor: pointer!important;">SILVER LININGS</a></li>
            </ul>
        </div>
        <div class="border-1"></div>
    </div>
</div>