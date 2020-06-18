<!-- Advanced search start -->
<div class="widget advanced-search d-none d-xl-block d-lg-block">
    <h3 class="sidebar-title">Advanced Search</h3>
    <div class="s-border"></div>
    <form method="GET">
        <div class="form-group">
            <select class="selectpicker search-fields" name="all-status">
                <option>All Status</option>
                <option>For Sale</option>
                <option>For Rent</option>
            </select>
        </div>
        <div class="form-group">
            <select class="selectpicker search-fields" name="all-type">
                <option>All Type</option>
                <option>Apartments</option>
                <option>Shop</option>
                <option>Restaurant</option>
                <option>Villa</option>
            </select>
        </div>
        <div class="form-group">
            <select class="selectpicker search-fields" name="commercial">
                <option>Commercial</option>
                <option>Residential</option>
                <option>Commercial</option>
                <option>Land</option>
            </select>
        </div>
        <div class="form-group">
            <select class="selectpicker search-fields" name="location">
                <option>location</option>
                <option>United States</option>
                <option>American Samoa</option>
                <option>Belgium</option>
                <option>Canada</option>
            </select>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <select class="selectpicker search-fields" name="bedrooms">
                        <option>Bedrooms</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <select class="selectpicker search-fields" name="bathroom">
                        <option>Bathroom</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <select class="selectpicker search-fields" name="balcony">
                        <option>Balcony</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <select class="selectpicker search-fields" name="garage">
                        <option>Garage</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="range-slider">
            <label>Area</label>
            <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
            <div class="clearfix"></div>
        </div>
        <div class="range-slider">
            <label>Price</label>
            <div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
            <div class="clearfix"></div>
        </div>
        <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
            <i class="fa fa-plus-circle"></i> Other Features
        </a>
        <div id="options-content" class="collapse">
            <h3 class="sidebar-title">Features</h3>
            <div class="s-border"></div>
            <div class="checkbox checkbox-theme checkbox-circle">
                <input id="checkbox2" type="checkbox">
                <label for="checkbox2">
                    Air Condition
                </label>
            </div>
            <div class="checkbox checkbox-theme checkbox-circle">
                <input id="checkbox3" type="checkbox">
                <label for="checkbox3">
                    Places to seat
                </label>
            </div>
            <div class="checkbox checkbox-theme checkbox-circle">
                <input id="checkbox4" type="checkbox">
                <label for="checkbox4">
                    Swimming Pool
                </label>
            </div>
            <div class="checkbox checkbox-theme checkbox-circle">
                <input id="checkbox1" type="checkbox">
                <label for="checkbox1">
                    Free Parking
                </label>
            </div>
            <div class="checkbox checkbox-theme checkbox-circle">
                <input id="checkbox7" type="checkbox">
                <label for="checkbox7">
                    Central Heating
                </label>
            </div>
            <div class="checkbox checkbox-theme checkbox-circle">
                <input id="checkbox5" type="checkbox">
                <label for="checkbox5">
                    Laundry Room
                </label>
            </div>
            <div class="checkbox checkbox-theme checkbox-circle">
                <input id="checkbox6" type="checkbox">
                <label for="checkbox6">
                    Window Covering
                </label>
            </div>
            <div class="checkbox checkbox-theme checkbox-circle">
                <input id="checkbox8" type="checkbox">
                <label for="checkbox8">
                    Alarm
                </label>
            </div>
            <br>
        </div>
        <div class="form-group mb-0">
            <button class="search-button">Search</button>
        </div>
    </form>
</div>
