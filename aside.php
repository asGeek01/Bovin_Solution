<style>
    .a-li{
        color: black;
        text-decoration: none;
    }
    a:hover{
        color: black;
        text-decoration: none;
    }
    .b-s{
        border: 0;
        box-shadow: none;
    }
    .hide1{
        display: none;
    }
</style>
<aside>
    <h3>Filter Options</h3>
    <div class="my-4 mx-1 px-2">
        <select name="#" id="#" class="px-2 py-2 item_filter">
            <option value="#" selected>Cattle Type</option>
            <option value="#">Location</option>
            <option value="#">Nutrients Levels</option>
        </select>
    </div>
    <div class="my-4 mx-1 px-2">
        <select name="#" id="#" class="px-2 py-2 item_filter">
            <option value="#">Cattle Type</option>
            <option value="#" selected>Location</option>
            <option value="#">Nutrients Levels</option>
        </select>
    </div>
    <div class="my-4 mx-1 px-2">
        <select name="#" id="#" class="px-2 py-2 item_filter">
            <option value="#">Cattle Type</option>
            <option value="#">Location</option>
            <option value="#" selected>Nutrients Levels</option>
        </select>
    </div>
    <div class="my-2 border border-secondary shadow rounded-4 col-12">
        <div class="row mt-3">
            <div class="col-10">
                <p class="text-secondary px-1" id="view1" style="cursor: pointer;">Protein Content</p>
            </div>
            <div class="col-1 px-1">
                <i class="fa fa-angle-up"></i>
            </div>
        </div>
        <div class="row hide1 justify-content-center my-2" id="hide1">
            <div>
                <span class="mx-1 text-dark"><input type="checkbox" name="#" id="#" checked></span>
                <span class="">Energy Boosting</span>
            </div>
            <div>
                <span class="mx-1"><input type="checkbox" name="#" id="#" checked></span>
                <span class="">Natural Ingredients</span>
            </div>
        </div>
    </div>
</aside>